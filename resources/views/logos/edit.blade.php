@extends('admin_layout.master')

@section('content')
    @push('title')
        Logo |ZentoStores
    @endpush


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Logo
                </h3>
            </div>
            <div class="card">
                <div class="card-header">
                    <b>Logo</b>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <p>{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('logos.update', ['id' => 1]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="name"><b>Name:</b></label>
                            <input type="text" name="name" class="form-control" value="{{ $logos->name ?? '' }}" >
                        </div>


                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="category_id" class="form-label"><h5><b>Image:</b></h5></label>
                            <input type="file" name="logo" class="form-control">
                            @if(isset($logos->logo))
                                <img src="{{ asset('/image/'.$logos->logo) }}" width="90px" height="70px">
                            @else
                                <img src="{{ asset('/image') }}" width="90px" height="70px">

                            @endif
                                 alt="Image">
                        </div>




                        <input type="submit" name="update" value="Update" class="btn btn-info">
                    </form>

                </div>
            </div>
@endsection

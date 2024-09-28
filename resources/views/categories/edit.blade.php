
@extends('admin_layout.master')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Edit Category
                </h3>
            </div>
            <div class="card">
                <div class="card-header">
                    <div style="float: right">
                        <a class="btn btn-success" href="{{ route('categories.index') }}"> Back</a>
                    </div>
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
                    <form action="{{ route('categories.update',$categories->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}
                        <div class="form-group" style="margin-top: 10px">
                            <label for="name"><b>Name</b></label>
                            <input class="form-control" placeholder="Name" value="{{$categories->name}}" type="text"
                                   name="name" required>
                        </div>


                        <div class="form-group">
                            <label for="Categories"><b>Choose parent category:</b></label>
                            <select name="parent_id" class="form-control">
                                <option value="">Parent</option>
                                @foreach($category as $cat)
                                    <option value="{{ $cat['id'] }}"
                                            @if($categories->parent_id == $cat['id']) selected @endif>
                                        {{ $cat['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


{{--                        <div class="form-group">--}}
{{--                            <label>URL</label>--}}
{{--                            <input type="text" class="form-control" name="url" value="{{$categories->url}}" required>--}}
{{--                        </div>--}}

                        <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                            <label for="imageInput" class="form-label"><h5><b>Image:</b></h5></label>
                            <input type="file" id="image" name="image" class="form-control"/>
                            <img src="{{ asset('/image/'.$categories->image) }}" width="70px" height="70px"
                                 alt="Image">
                        </div>


                        <div class="form-group" style="margin-top: 10px">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

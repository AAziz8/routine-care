
@extends('admin_layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Create New Category
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

                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="margin-top: 10px">
                            <label for="name"><b>Name</b></label>
                            <input class="form-control" placeholder="Name" type="text" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="parent_category"><b>Parent Category:</b></label>
                            <select class="form-control" name="parent_id">
                                <option value="">Select a category</option>
                                <option value="{{'parent_id' == null}}">Parent</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('parent_category') }}</span>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label>URL</label>--}}
{{--                            <input type="text" class="form-control" name="url" value="detail" required>--}}
{{--                        </div>--}}


                        <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                            <label for="imageInput" class="form-label"><h5><b>Image:</b></h5></label>
                            <input type="file" id="image" name="image" class="form-control"/>

                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-top: 10px">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

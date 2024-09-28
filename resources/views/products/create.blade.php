@extends('admin_layout.master')
@section('content')
    <style> .ck-editor__editable_inline {
            min-height: 400px;
        }</style>
@push('title')
    create | products
@endpush

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Create New Product
                </h3>
            </div>
            <div class="card">
                <div class="card-header">
                    <div style="float: right">
                        <a class="btn btn-success" href="{{ route('products.index') }}"> Back</a>
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
                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <label for="meta_code">Meta Code:</label>
                                <textarea name="meta_code" id="meta_code" rows="2" class="form-control"></textarea>
                            </div>



                            <div class="col-lg-12 col-sm-12" style="margin-top: 20px">
                                <label for="status" class="form-label"><h5><b>Name</b></h5></label>
                                <input type="text" class="form-control" name="name" style="height: 40px">
                            </div>

                            <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                                <label for="category_id" class="form-label"><h5><b>Category:</b></h5></label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        @if($category->parent_id === null)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                                <label><b>Sub-Category</b></label>
                                <select class="browser-default custom-select" name="subcategory_id" id="subcategory_id"></select>
                            </div>

                            <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                                <label for="images" class="form-label">
                                    <h5><b>Images:</b></h5>
                                </label>
                                <input type="file" id="images" name="images[]" class="form-control" multiple />
                                @error('images')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                                <label for="alt" class="form-label"><h5><b>Alt:</b></h5></label>
                                <input type="text" id="alt" name="alt" class="form-control">
                            </div>

                            <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                                <label for="time" class="form-label"><h5><b>Time & Date:</b></h5></label>
                                <input type="datetime-local" class="form-control" id="time" name="time">
                            </div>

                            <div class="col-lg-12 col-sm-12" style="margin-top: 20px">
                                <label for="detail" class="form-label"><h5><b>Description:</b></h5></label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>

                            <div class="col-lg-6 col-sm-6" style="margin-top: 20px">
                                <label for="status" class="form-label"><h5><b>Price</b></h5></label>
                                <input type="number" class="form-control" name="price" style="height: 40px">
                            </div>


                            <div class="col-lg-12 col-sm-6" style="margin-top: 20px">
                                <label for="status" class="form-label"><h5><b>Status:</b></h5></label>
                                <select class="form-control" id="status" name="status">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="col-lg-12 col-sm-12 mt-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

@endsection
{{--    <script src="{{ asset('assets/vendors/ckeditor5/build/ckeditor.js') }}"></script>--}}


@push('js')

            <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    CKEDITOR.replace('description', {
                        extraPlugins: 'uploadimage',
                        filebrowserUploadUrl: '{{route('upload').'?_token='.csrf_token()}}'
                    });
                });
            </script>




            <script>
                // Initialize CodeMirror with material-darker theme
                var editor = CodeMirror.fromTextArea(document.getElementById('meta_code'), {
                    lineNumbers: true,
                    mode: 'javascript',
                    theme: 'material-darker',
                    autofocus: true,
                });
            </script>

{{--        for subcat--}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {

            $('#category_id').on('change', function () {
                var cat_id = $(this).val();
                $.ajax({
                    url: "{{ route('categories.parent') }}",
                    type: "POST",
                    data: {
                        cat_id: cat_id
                    },
                    dataType: 'json',
                    success: function (data) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append('<option value="">Please select</option>');
                        $.each(data.subcategories, function (index, category) {
                            $('#subcategory_id').append('<option value="' + category.id + '">' + category.name + '</option>');
                        });
                    }
                })
            });
        });
    </script>



@endpush

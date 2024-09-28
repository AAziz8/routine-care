
@extends('admin_layout.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Dashboard/Categories
                </h3>
            </div>
            <div class="card" style="margin-top: 30px">
                <div class="card-header">
                    <div style="float: right">
                        <a class="btn btn-success" href="{{ route('categories.create') }}"> <i class="fa fa-plus"
                                                                                               aria-hidden="true"
                                                                                               style="margin-right: 5px"></i>Add
                            Category</a>
                    </div>
                </div>
                <div class="card-body">
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
                            <div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
                                <p>{{ $message }}</p>
                            </div>
                            <script>
                                setTimeout(function () {
                                    $('#success-alert').fadeOut('slow');
                                }, 2000);
                            </script>
                        @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th width="100px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Table body content goes here -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection

@push('js')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('categories.getcategory') }}",
                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},

                    {data: 'name', name: 'Name'},

                    {
                        data: 'parent_id',
                        name: 'Name',
                        render:function (data,type,row) {
                            return data === null ? 'parent' : data;

                        }
                    },

                    {data: 'action', name: 'Action', orderable: false, searchable: false},
                ]
            });
        });

    </script>


{{--        for delete--}}

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '#deletecategorybutton', function () {
                var category_id = $(this).data('id');
                var url = '<?= route("delete.category")?>';

                swal.fire({
                    title: "Are you sure?",
                    html: '<h3>you want to delete this category?</h3>',
                    showCancelButton: true,
                    // showCloseButton: true,
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Yes Delete',
                    cancelButtonColor: '#000000',
                    confirmButtonColor: '#FF0000',
                    allowOutsideClick: false
                }).then(function (result) {
                    if (result.value) {
                        $.post(url, {category_id: category_id}, function (data) {
                            if (data.code == 1) {
                                swal.fire({
                                    title: 'Deleted!',
                                    html: '<b>Category has been deleted</b>',
                                    icon: 'success',
                                    timer: 2000, // Show success message for 2 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false
                                });
                                $('.data-table').DataTable().ajax.reload();

                            } else {
                                swal.fire({
                                    title: 'Error',
                                    text: 'An error occurred while deleting the category.',
                                    icon: 'error',
                                    timer: 2000, // Show error message for 2 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false
                                });
                            }
                        }, 'json');
                    }
                });
            });
        });
    </script>

@endpush

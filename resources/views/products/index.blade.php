@extends('admin_layout.master')

@section('content')
@push('title')
    products | list
@endpush

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Dashboard/Product
                </h3>
            </div>
            <div class="card" style="margin-top: 30px">
                <div class="card-header">
                    <div class="" style="float: right">
                        @can('role-create')
                            <a class="btn btn-success" href="{{ route('products.create') }}"> <i class="fa fa-plus"
                                                                                              aria-hidden="true"
                                                                                              style="margin-right: 5px"></i>Add
                                Products</a>
                        @endcan
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
                                }, 3000);
                            </script>
                        @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped data-table ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Posted_Time</th>
                                <th >Post By</th>
                                <th width="100px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
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
                ajax: "{{ route('products.getproduct') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'category_name', name: 'category_name'},

                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data) {
                            // Format the date using a JavaScript library like Moment.js
                            var formattedDate = moment(data).format('YYYY-MM-DD');
                            return formattedDate;
                        }
                    },

                    {data: 'user_name', name: 'user_name'},

                    {data: 'action', name: 'Action', orderable: false, searchable: false},
                ],
            });
        });

    </script>


    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '#deleteproductbutton', function () {

                var product_id = $(this).data('id');

                var url = '<?= route("delete.product")?>';

                swal.fire({
                    title: "Are you sure?",
                    html: '<h3>you want to delete this Product?</h3>',
                    showCancelButton: true,
                    // showCloseButton: true,
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Yes Delete',
                    cancelButtonColor: '#000000',
                    confirmButtonColor: '#FF0000',
                    allowOutsideClick: false
                }).then(function (result) {
                    if (result.value) {
                        $.post(url, {product_id: product_id}, function (data) {
                            if (data.code == 1) {
                                swal.fire({
                                    title: 'Deleted!',
                                    text: 'Product has been deleted.',
                                    icon: 'success',
                                    timer: 1000, // Show success message for 1 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false
                                });
                                $('.data-table').DataTable().ajax.reload();

                            } else {
                                swal.fire({
                                    title: 'Error',
                                    text: 'An error occurred while deleting the role.',
                                    icon: 'error',
                                    timer: 1000, // Show error message for 1 seconds
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

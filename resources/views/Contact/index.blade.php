@extends('admin_layout.master')

@section('content')
    @push('title')
        Contacts
    @endpush

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Contact Form Submissions
                </h3>
            </div>
            <div class="card" style="margin-top: 30px">
                <div class="card-body">
                    <div class="table-responsive">

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

                        @if ($successMessage)
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <p>{{ $successMessage }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Comment</th>
                                <th>Posted Time&Day</th>
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
    {{--for datatable--}}

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
                ajax: "{{ route('contacts.getcontact') }}",
                columns: [

                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},

                    {data: 'name', name: 'Name'},

                    {data: 'email', name: 'email'},

                    {data: 'phone_number', name: 'phone_number'},

                    {data: 'message', name: 'message'},

                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function (data) {
                            // Format the date using a JavaScript library like Moment.js
                            var formattedDate = moment(data).format('YYYY-MM-DD HH:mm:ss');
                            return formattedDate;
                        }
                    },

                    {data: 'action', name: 'Action', orderable: false, searchable: false},
                ]
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

    </script>

    {{--    for delete--}}

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '#deletecontactbutton', function () {
                var contact_id = $(this).data('id');
                var url = '<?= route("delete.contact") ?>';

                swal.fire({
                    title: "Are you sure?",
                    html: '<h3>you want to delete this contact?</h3>',
                    showCancelButton: true,
                    // showCloseButton: true,
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Yes Delete',
                    cancelButtonColor: '#000000',
                    confirmButtonColor: '#FF0000',
                    allowOutsideClick: false
                }).then(function (result) {
                    if (result.value) {
                        $.post(url, {contact_id: contact_id}, function (data) {
                            if (data.code == 1) {
                                swal.fire({
                                    title: 'Deleted!',
                                    text: 'Contact has been deleted.',
                                    icon: 'success',
                                    timer: 1000, // Show success message for 2 seconds
                                    timerProgressBar: true,
                                    showConfirmButton: false
                                });
                                $('.data-table').DataTable().ajax.reload();

                            } else {
                                swal.fire({
                                    title: 'Error',
                                    text: 'An error occurred while deleting the Contact.',
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

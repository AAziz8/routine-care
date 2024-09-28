@extends('admin_layout.master')
@section('content')
    @push('title')
        Transactions
    @endpush

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    Dashboard/Orders
                </h3>
            </div>
            <div class="card" style="margin-top: 30px">
                <div class="card-header">
                    <a href="{{url('order-history')}}" class="btn btn-inverse-primary">Order History</a>
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
                                <th>Created_at</th>
                                <th>total</th>
                                <th>status</th>
                                <th width="100px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $index = 1 @endphp
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $index++ }}</td>
                                <td>{{date('d-m-y' ,strtotime($order->created_at))}}</td>
                                <td>{{$order->total}}</td>
                                <td>{{$order->status == '0' ? 'pending' : 'completed'}}</td>
                                <td>
                                    <a href="{{ url('admin/view-order', ['id' => $order->id]) }}" class="btn btn-success">View</a>
                                </td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')

@endpush



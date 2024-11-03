@extends('admin_layout.master') 
@section('content')
@push('title')
    Order | Details
@endpush

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Dashboard/Orders
            </h3>
        </div>
        <div class="container mt-4">
            <div class="row">
                <!-- Form Section -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Order Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="phone_number"><b>Name:</b></label>
                                <input type="text" class="form-control" value="{{$orders->user->name}}" name="name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone_number"><b>Phone Number:</b></label>
                                <input type="text" class="form-control" value="{{$orders->phone_number}}" name="phone_number" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email"><b>Email:</b></label>
                                <input type="text" class="form-control" name="email" value="{{$orders->user->email}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="city"><b>City:</b></label>
                                <input type="text" class="form-control" name="city" value="{{$orders->city}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Address"><b>Address:</b></label>
                                <textarea cols="4" rows="4" class="form-control" readonly>{{$orders->address}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Payment Method</label>
                                <input class="form-control" type="text" value="{{ $orders->payment_method }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderItems as $orderItem)
                                        @if($orderItem->product)
                                            <tr>
                                                <td>{{ $orderItem->product->name }}</td>
                                                <td>${{ $orderItem->product->price }}</td>
                                                <td>{{ $orderItem->quantity }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="3">Product not found</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-control">
                                <h5>Total = {{$orders->total}}</h5>
                            </div>
                            <label for="orderstatus" style="margin-top: 10px"><b>Order Status</b></label>
                            <form action="{{ url('update-order/' . $orders->id) }}" method="post">
                                @csrf
                                @method('put')
                                <select class="form-select form-control" name="order_status">
                                    <option value="0" {{ $orders->status == 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ $orders->status == 1 ? 'selected' : '' }}>Completed</option>
                                </select>
                                <button type="submit" class="btn btn-behance mt-4">Update Status</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
        // Ensure only one submenu is open at a time
        document.querySelectorAll('.nav-link[data-toggle="collapse"]').forEach(link => {
            link.addEventListener('click', function() {
                const collapseId = this.getAttribute('href');
                const otherCollapses = document.querySelectorAll('.collapse.show');

                otherCollapses.forEach(collapse => {
                    if (collapse.id !== collapseId.replace('#', '')) {
                        collapse.classList.remove('show');
                    }
                });
            });
        });
    </script>
@endpush

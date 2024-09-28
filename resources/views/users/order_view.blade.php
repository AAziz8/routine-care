@extends('weblayouts.app')
@section('title', 'Orders')

@section('content')

    <img src="{{ asset('images/list_p.jpg') }}" style="width: 100%;height: 500px">

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="container mt-4">
                <div class="row">
                    <!-- Form Section -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order view
                                <a href="{{url('orders')}}" type="button" class="btn btn-warning" style="float: right">Back</a>
                                </h4>

                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="phone_number"><b>Name:</b></label>

                                    <input type="text" class="form-control" value="{{$orders->user->name}}" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="phone_number"><b>Phone Number:</b></label>
                                    <input type="text" class="form-control" value="{{$orders->phone_number}}"
                                           name="phone_number">
                                </div>
                                <div class="form-group">
                                    <label for="email"><b>Email:</b></label>
                                    <input type="text" class="form-control" name="email"
                                           value="{{$orders->user->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="zip_code"><b>Zip Code:</b></label>
                                    <input type="text" class="form-control" name="zip_code"
                                           value="{{$orders->zip_code}}">
                                </div>


                                <div class="form-group">
                                    <label for="city"><b>City:</b></label>
                                    <input type="text" class="form-control" name="city" value="{{$orders->city}}">
                                </div>


                                <div class="form-group">
                                    <label for="Address"><b>Address:</b></label>
                                    <textarea cols="4" rows="4" class="form-control">{{$orders->address}}</textarea>
                                </div>

                                </form>
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
                                        <th>Product Image</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders->orderItems as $orderItem)

                                        @if($orderItem->product)

                                            <tr>
                                                <td>{{ $orderItem->product->name }}</td>
                                                <td>${{ $orderItem->product->price }}</td>
                                                <td>{{ $orderItem->quantity }}</td>
                                                <td>
                                                @php
                                                    $images = json_decode($orderItem->product->image, true);
                                                @endphp
                                                <img
                                                     src="{{ asset($images[0]) }}"  style="width: 60px;height: 60px">
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="4">Product not found</td>
                                            </tr>
                                        @endif
                                    @endforeach


                                    </tbody>
                                </table>
                                <div class="form-control">

                                    <h5>Total = {{$orders->total}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('weblayouts.app')
@section('title', 'Cart')

@section('content')

    <img src="{{ asset('images/cart_img.jpg') }}" style="width: 100%;height: 500px">
    <div class="container mt-5 mb-10">
        <div class="card shadow-sm border-0 mb-20">
            <div class="card-body p-4">
                @if (is_array($cartItems) ? count($cartItems) > 0 : $cartItems->count() > 0)
                    <div class="table-responsive">
                        <table id="cart" class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:20%" class="text-center">Subtotal</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $total = 0 @endphp
                            @foreach($cartItems as $item)
                                @php
                                    $subtotal = $item->product->price * $item->quantity;
                                    $total += $subtotal;
                                @endphp
                                <tr data-id="{{ $item->id }}" data-session-id="{{ session('cart')[$item->id]['session_id'] ?? '' }}">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-3">
                                                @if ($item->product->image)
                                                    @php
                                                        $images = json_decode($item->product->image, true);
                                                    @endphp
                                                    @if (!empty($images) && is_array($images) && count($images) > 0)
                                                        <img src="{{ asset($images[0]) }}" alt="Product Image" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="ml-3">
                                                <h6 class="mb-1 text-primary">{{ $item->product->name }}</h6>
                                                <small class="text-muted">Product ID: {{ $item->product->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>${{ $item->product->price }}</td>
                                    <td>
                                        <input type="number" value="{{ $item->quantity }}" class="form-control quantity cart_update" min="1" style="width: 70px;">
                                    </td>
                                    <td class="text-center">${{ $subtotal }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm cart_remove rounded-pill">
                                            <i class="fa fa-trash"></i> <span class="d-none d-md-inline">Delete</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end mt-4">
                        <h4><strong>Total: ${{ $total }}</strong></h4>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Continue Shopping
                        </a>
                        <a href="{{ route('checkout') }}" class="btn btn-success">
                            <i class="fa fa-credit-card"></i> Proceed to Checkout
                        </a>
                    </div>
                @else
                    <div class="alert alert-info text-center" role="alert">
                        <i class="fa fa-shopping-cart"></i> Your cart is currently empty.
                    </div>
                    <div class="text-end mt-4">
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <script type="text/javascript">

        $(".cart_update").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

     $(document).on('click', '.cart_remove', function (e) {
    e.preventDefault();

    var ele = $(this);

    if (confirm("Do you really want to remove?")) {
        // Get both the database cart ID and the session cart ID
        var cartItemId = ele.parents("tr").attr("data-id");
        var sessionCartId = ele.parents("tr").attr("data-session-id");

        $.ajax({
            url: '{{ route('remove_from_cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}',
                id: cartItemId,  
                session_id: sessionCartId 
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
});



    </script>


@endsection

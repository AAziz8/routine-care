@extends('weblayouts.app')
@section('title', 'Cart')

@section('content')

    <img src="{{ asset('images/cart_img.jpg') }}" style="width: 100%;height: 500px">

    <div class="container mt-4" >
        <div class="card">
            <div class="card-body">
                @if (is_array($cartItems) ? count($cartItems) > 0 : $cartItems->count() > 0)
                <table id="cart" class="table table-bordered table-responsive ">
                    <thead class="table-light">
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
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
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs">


                                        @if ($item->product->image)
                                            @php
                                                $images = json_decode($item->product->image, true);
                                            @endphp

                                            @if (!empty($images) && is_array($images) && count($images) > 0)
                                                <img src="{{ asset($images[0]) }}" width="100" height="100" class="img-responsive">
                                            @endif
                                        @endif


                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $item->product->name }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{ $item->product->price }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $item->quantity }}" class="form-control quantity cart_update" min="1"/>
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                ${{ $subtotal }}
                            </td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach

                    <tfoot class="table-light">
                    <tr>
                        <td colspan="5" style="text-align:right;">
                            <h3><strong>Total ${{ $total }}</strong></h3>
                        </td>
                    </tr>
                    </tfoot>

                    <tr>
                        <td colspan="5" style="text-align:right;">

                            <a href="{{ url('/') }}" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Continue Shopping
                            </a>

                            <a href="{{ route('checkout') }}" class="btn btn-success">
                                <i class="fa fa-money"></i> Checkout
                            </a>

                        </td>
                    </tr>
                    </tfoot>
                </table>
                @else
                    <table id="cart" class="table table-bordered table-responsive ">
                        <tbody>
                        <div class="card">
                           <div class="card-body">
                               <i class="fa fa-shopping-cart"></i> Your Cart is empty

                           </div>
                        </div>

                        <tfoot class="table-light">

                        <tr>
                            <td colspan="5" style="text-align:right;">

                                <a href="{{ url('/') }}" class="btn btn-danger">
                                    <i class="fa fa-arrow-left"></i> Continue Shopping
                                </a>

                            </td>
                        </tr>
                        </tfoot>
                    </table>
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

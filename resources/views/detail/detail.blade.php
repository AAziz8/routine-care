@extends('weblayouts.app')
@section('title', 'detail')

@section('content')
 
<style>
    .img-fluid{
        height : 300px !important;

    }
</style>
<?php
$latest_products = App\helpers::latest();
$categories = \App\helpers::cate();

?>
<style>
.add-to-cart-button {
    background-color: #D3D3D3; 
    border: none;
    color: black;
    padding: 10px 20px; 
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px; 
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px; 
}

.add-to-cart-button:hover {
    background-color: #A9A9A9; 
}

    .image-container {
        position: relative;
    }

    .breadcrumb-contentnhy {
        position: absolute;
        bottom: 0; /* Adjusted to position at the bottom */
        left: 0;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
        box-sizing: border-box;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
        color: #fff; /* Text color */
    }

    .breadcrumb-contentnhy h2 {
        margin: 0;
        font-size: 24px; /* Adjust the font size as needed */
    }

    .breadcrumb-contentnhy ol {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .breadcrumb-contentnhy ol li {
        display: inline;
        margin-right: 5px;
    }

    .breadcrumb-contentnhy ol li:last-child {
        margin-right: 0;
    }

    .breadcrumb {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* Style for breadcrumb items */
    .breadcrumb li {
        display: inline;
        margin-right: 5px;
    }

    /* Style for the separator (double angle right icon) */
    .breadcrumb li span.fa-angle-double-right {
        margin: 0 5px;
    }
    
    
     .card-container {
            display: flex;
            align-items: flex-start; /* Align items at the start */
            justify-content: space-between;
        }
        .card-thumbnail {
            display: flex;
            flex-direction: column; /* Display images vertically */
            align-items: center; /* Align images at the center */
            gap: 10px; /* Add gap between images */
            width: 100px; /* Adjust thumbnail container width */
        }
        .card-thumbnail img {
            width: 80px; /* Adjust thumbnail image width */
            cursor: pointer;
            border-radius: 5px; /* Apply border radius */
        }
        .card-details {
            flex-grow: 1;
            margin-left: 20px;
        }
        .card-details img {
            width: 100%; /* Set main image width to fill its container */
            border-radius: 5px; /* Apply border radius */
            margin-bottom: 10px; /* Add margin bottom to separate image from text */
        }
        .custom-eco-buttons,
        .custom-caption,
        .custom-desc_single {
            margin-top: 10px; /* Adjust margin top */
        }
    
</style>


{{--    <div class="image-container">--}}
{{--        <img src="{{ asset('image/'.$details->image) }}" style="max-height: 400px; width: 100%; height: auto;">--}}
{{--        <div class="breadcrumb-contentnhy">--}}
{{--            <div class="container">--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <h2 class="hny-title text-center">{{$details->name}}</h2>--}}

{{--                </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<img src="{{ asset('images/list_p.jpg') }}" style="width: 100%;height: 400px">


    <section class="w3l-ecommerce-main-inn">
        <!--/ecommerce-single-->
        <div class="ecomrhny-content-inf py-5">
            <div class="container py-lg-5">
   <div class="card-container">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card-thumbnail">
            @if ($details->image)
                @php
                    $images = json_decode($details->image, true);
                @endphp
                @foreach ($images as $index => $image)
                    <img src="{{ $image }}" alt="Thumbnail {{ $index }}" onclick="changeImage(this)">
                @endforeach
            @endif
            </div>
             <img src="{{ $images[0] }}" id="mainImage" alt="Main Image" class="idimage">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card-details">
                
                <div class="card-info">
                    <h3>{!! $details->name !!}</h3>
                    <h1>{!! $details->name !!}</h1>
                    <div class="priced">RS {!! $details->price !!}</div>
                    <i class="fa-solid fa  fa-star"></i>
                    <i class="fa-solid fa fa-star"></i>
                    <i class="fa-solid fa  fa-star"></i>
                    <i class="fa-solid fa fa-star"></i>
                    <i class="fa-solid fa fa-star-half-stroke"></i>

                    <h3>Brand : {!! $details->category->name !!}</h3>
                    <h4>Description</h4>
                    <p><i class="fa fa-angle-right"></i> {!! $details->description !!}</p>
                    <!--<p><i class="fa fa-angle-right"></i>Partner OfferPurchase now & get a surprise cashback coupon for January / February 2023</p>-->
                    <!--<p><i class="fa fa-angle-right"></i>Partner OfferSign up for Flipkart Pay Later and get Flipkart Gift Card worth up to ₹1000*</p>-->
                    <!--<p><i class="fa fa-angle-right"></i>Bank Offer5% Cashback on Flipkart Axis Bank</p>-->

{{--                    <td data-th="Quantity">--}}
{{--                        <div class="plusmins">--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="button" value="-" class="button-minus btn btn-outline-secondary" data-field="quantity">--}}
{{--                                <input type="number" step="1" min="1" max="" value="1" name="quantity" class="quantity-field cart_update form-control text-center" style="width: 60px;">--}}
{{--                                <input type="button" value="+" class="button-plus btn btn-outline-secondary" data-field="quantity">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </td>--}}


                    <!--<a href="{{ route('add_to_cart', ['id' => $details->id]) }}" type = "button">Add To Cart</a>-->
                    <a type="button" href="{{ route('add_to_cart', ['id' => $details->id]) }}" class="add-to-cart-button">
    Add To Cart
</a>

                    <!--<a type = "button" href ="{{ route('add_to_cart', ['id' => $details->id]) }}">Add To Cart</a>-->
                    <!--<button class="buynow">Buy Now</button>-->
                    <a href="https://wa.me/00923302065791" target="_blank" class="watsappicon"><img src="webassets/images/whatsapp.png" /></a>
                </div>
            </div>
        </div>

        
        
    </div>

    
            </div>
            <!--//row1-->
        </div>
        <!--//ecommerce-single-->
    </section>
    <!-- //content-6-section -->
    <section class="w3l-ecommerce-main" style="background: #f1f1f1;">
        <!-- /products-->
        <div class="ecom-contenthny py-5">
            <div class="container py-lg-5">
                <h3 class="hny-title mb-0 text-center">Featured <span>Products</span></h3>
                <p class="text-center">New Collections Shop With Us</p>
                <!-- /row-->
                <div class="ecom-products-grids row mt-lg-5 mt-3">
                    @foreach($latest_products as $product)
                    <div class="col-lg-3 col-6 product-incfhny mt-4">
                        <div class="product-grid2 transmitv">
                            <div class="product-image2">
                                <a href="{{route('detail',['slug' => $product->slug] )}}">
                                    @if ($product->image)
                                        @php
                                            $images = json_decode($product->image, true);
                                        @endphp

                                        @if (!empty($images) && is_array($images))
                                            <img class="pic-1  img-fluid"
                                                 src="{{ asset($images[0]) }}" alt="{{ $product->alt }}" style="width: 255px; height: 220px" >
                                            <img class="pic-2  img-fluid"
                                                 src="{{ asset($images[0])  }}" alt="{{$product->alt}}" style="width: 255px; height: 220px">
                                        @endif
                                    @endif
                                </a>
                                <div class="transmitv single-item">
                                    <a href="{{ route('add_to_cart', ['id' => $product->id]) }}" class="transmitv-cart ptransmitv-cart add-to-cart">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="{{route('detail',['slug' => $product->slug] )}}">{{$product->name}} </a></h3>
                                <span class="price">Rs {{$product->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- //row-->
            </div>
        </div>
    </section>
    <!-- //products-->
<script>
    function redirectToCart(id) {
        window.location.href = "{{ route('add_to_cart', ['id' => ':id']) }}".replace(':id', id);
    }
</script>

   <script>
        function changeImage(thumbnail) {
            var mainImage = document.getElementById("mainImage");
            mainImage.src = thumbnail.src;
        }
    </script>
    
        

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        function updateCart(ele) {
            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity-field").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }

        $(".cart_update").change(function (e) {
            e.preventDefault();
            var ele = $(this);
            updateCart(ele);
        });

        $(".button-plus").click(function (e) {
            e.preventDefault();
            var inputField = $(this).siblings(".quantity-field");
            var currentValue = parseInt(inputField.val());

            if (!isNaN(currentValue)) {
                inputField.val(currentValue + 1);
                inputField.change(); // Trigger the change event for AJAX update
            }
        });

        $(".button-minus").click(function (e) {
            e.preventDefault();
            var inputField = $(this).siblings(".quantity-field");
            var currentValue = parseInt(inputField.val());

            if (!isNaN(currentValue) && currentValue > 1) {
                inputField.val(currentValue - 1);
                inputField.change(); // Trigger the change event for AJAX update
            }
        });
    });
</script>

@endsection



<!doctype html>
<html lang="{{ app()->getLocale() }}">

<?php
$categories = \App\helpers::cate();
$socials = \App\helpers::social_icons();
$logos = App\helpers::logo();

?>

<style>
   /*.w3l-banner-slider-main .navbar-expand-lg .navbar-nav .dropdown-menu{*/
   /*    transform: translateX(50px) !important;*/
   /*}*/
   /*body, body a, body li, body p, .btn, input{*/
   /*    text-align: center !important;*/
   /*}*/
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Fully Featured Application">

    <title>@yield('title', config('app.name')) | {{config('app.name')}}</title>
    <!-- Favicon-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
    <link rel="icon" type="image/x-icon" href="{{asset('images/upperlogo.png')}}">
    <link rel="stylesheet" href="{{ asset('public/webassets/css/style-liberty.css') }}">
    <style>
        .table-bordered tbody tr {
            border: 1px solid #ccc;
        }

        .table-bordered tbody td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .table-bordered thead th {
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f5f5f5;
        }

        .table-bordered .text-right {
            text-align: right;
        }

        .btn-view-all {
            margin-top: 10px;
        }
    </style>
</head>

<!-- Latest compiled JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

 <script>
        @if(session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
    
<body>
<section class="w3l-banner-slider-main">
    <div class="breadcrumb-infhny">

        <div class="top-header-content">

            <header class="tophny-header">
                <div class="subheader">
                <div class="container">
                    <div class="top-right-strip row">
                        <!--/left-->
                        <div class="top-hny-left-content col-lg-6 pl-lg-0 ">
                            <h6 style='margin-left:10px !important;'> Upto 30% off on All styles, <a href="{{ url('contact') }}" target="_blank"> click here
                                    for <span
                                        class="fa fa-hand-o-right hand-icon" aria-hidden="true"></span> <span
                                        class="hignlaite">more
                    details</span></a></h6>
                        </div>
                        <!--//left-->
                        <!--/right-->
                        <ul class="top-hnt-right-content col-lg-6">
                            @if(\Illuminate\Support\Facades\Auth::user())
                                <li class="menu-item">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); this.closest('form').submit();"
                                           class="menu-link">
                                            <i class="bx bx-power-off me-2"></i>
                                            <div data-i18n="Basic">Logout</div>
                                        </a>
                                    </form>
                                </li>
                            @else
                                <li class="button-log usernhy">
                                    <a class="btn-open" href="{{url('adminlogin786')}}">
                                        <span class="fa fa-user" aria-hidden="true"></span>
                                    </a>
                                </li>
                            @endif
                            <li class="transmitvcart galssescart2 cart cart box_1">
                                <div class="dropdown">
                                    <button id="dLabel" type="button" class="top_transmitv_cart"
                                            data-bs-toggle="dropdown">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                                        <span class="badge bg-danger">{{ $cartCount }}</span>
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dLabel">

                                        <div class="container mt-3">
                                            <h6 class="mb-3">Your Shopping Cart</h6>

                                            <!-- Cart Items -->
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cartItems as $item)
                                                        <tr>
                                                            <td>
                                                                <div class="product-info">
                                                                    <h6>{{ @$item->product->name }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>${{ @$item->product->price }}</td>
                                                            <td>{{ @$item->quantity }}</td>
                                                            <td>${{ @$item->quantity * @$item->product->price }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                <div class="text-center mt-3">
                                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-lg btn-block">
                                                        <i class="fa fa-shopping-cart mr-2"></i> View All Items
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </ul>
                    </div>
                </div>
            </div>
                <!--/nav-->

            

                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container serarc-fluid">

                        <a class="navbar-brand" href="{{ url('home') }}">
                            <img src="{{asset('images/logo-h.svg')}}" alt="zentostore-logo" title="zentostore"
                          style="height:60px;"/>
                        </a>
                        <!--/search-right-->
                        
                        <!--//search-right-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon fa fa-bars"> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a href="{{ url('/') }}" class="nav-link">Home</a>--}}
                                {{--                                </li>--}}
                               @foreach ($categories as $category)
    @if ($category->parent_id === null)
        @php $hasSubcategories = count($category->subcategories) > 0; @endphp
        <li class="nav-item home {{ $hasSubcategories ? 'dropdown' : '' }}">
            @if ($hasSubcategories)
                <a href="{{ route('list', ['id' => $category->id, 'slug' => $category->slug]) }}"
                   class="nav-link dropdown-toggle" id="navbarDropdown{{ $category->id }}" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $category->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $category->id }}">
                    @foreach ($categories as $subcategory)
                        @if ($subcategory->parent_id === $category->id)
                            <li>
                                <a href="{{ route('list', ['id' => $subcategory->id, 'slug' => $subcategory->slug]) }}"
                                   class="dropdown-item">{{ $subcategory->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <a href="{{ route('list', ['id' => $category->id, 'slug' => $category->slug]) }}"
                   class="nav-link">{{ $category->name }}</a>
            @endif
        </li>
    @endif
@endforeach

                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a href="{{ url('/about') }}" class="nav-link">About Us</a>--}}
                                {{--                                </li>--}}

                                {{--                                <li class="nav-item">--}}
                                {{--                                    <a href="{{ url('/privacypolicy') }}" class="nav-link">Privacy Policy</a>--}}
                                {{--                                </li>--}}

                                <li class="nav-item">
                                    <a href="{{ url('/orders') }}" class="nav-link">Orders</a>
                                </li>


                            </ul>
                        </div>
                        <div class="search-right">

                            <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span>
                                <!--<span class="search-text">Search here</span>--></a>
                            <!-- search popup -->


                            <div id="search" class="pop-overlay">
                                <div class="popup">

                                    <form action="{{ route('search') }}" method="get" class="search-box">
                                        <input type="search" placeholder="Keyword" name="search" required="required"
                                               autofocus="">
                                        <button type="submit" class="btn">Search</button>
                                    </form>

                                </div>

                                <a class="close" href="#">×</a>
                            </div>
                            <!-- /search popup -->
                        </div>
                    </div>
                </nav>
                <!--//nav-->
            </header>

            @yield('content')

            <section class="w3l-footer-22">
                <!-- footer-22 -->
                <div class="footer-hny py-5">
                    <div class="container">
                        <div class="text-txt w3l-footer-22 row">
                            <div class="left-side col-lg-3 sub-two-right">


                                <!--<a class="navbar-brand" href="{{ url('home') }}">
@if(isset($logos->logo))
                                    <img src="{{asset('image/'.$logos->logo ?? '')}}" alt="zentostore-logo" title="zentostore"
                                         style="height:100px;"/>
                                    @endif
                                </a>-->
                                <h6>Follow Us</h6>
                                
                                <ul class="social-footerhny">

                                    <li><a class="facebook" href="{!! $socials->facebook ?? '' !!}}"><span class="fa fa-facebook"
                                                                                                aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="twitter" href="{!! $socials->twitter ?? ''!!}"><span class="fa fa-twitter"
                                                                                              aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="google" href="{!! $socials->google ?? '' !!}"><span class="fa fa-google-plus"
                                                                                            aria-hidden="true"></span></a>
                                    </li>
                                    <li><a class="instagram" href="{{$ocials->instagram ?? ''}}"><span
                                                class="fa fa-instagram"
                                                aria-hidden="true"></span></a>
                                    </li>
                                </ul>
                            </div>


                            <div class="right-side col-lg-3">
                                
                                <div class="sub-columns">
                                    <div class="sub-one-left">
                                        <h6>Useful Links</h6>
                                        <div class="footer-hny-ul">
                                            <ul>
                                                <li><a href="{{ url('home') }}">Home</a></li>
                                                <li><a href="{{ url('about') }}">About</a></li>
                                                <li><a href="{{ url('contact') }}">Customer Care</a></li>

                                            </ul>
                                            <ul>
                                                <li><a href="{{ url('privacypolicy') }}">Privacy Policy</a></li>
                                                <li><a href="{{ url('contact') }}">Support</a></li>
                                            </ul>


                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                             <div class="right-side col-lg-3">
                                <div class="sub-two-right">
                                        <h6>Our Store</h6>
                                        <p class="mb-5">Our Range Of Hair And Face Products Ensures You Feel Beautiful And Confident Every Day.</p>
                                        </div>
                             </div>
                             <div class="right-side col-lg-3">
                                <div class="sub-two-right">
                                        
                                        <h6>We accept:</h6>

                                        <!-- <ul> -->

<!--   <li>
    <a class="pay-method" href="#">
      <img src="images/cash-on-delivery.png" alt="Cash on Delivery" width="50" height="30">
    </a>
  </li>
  <li>
    <a class="pay-method" href="#">
      <img src="images/bank-transfer.png" alt="Bank Transfer" width="40" height="40">
    </a>
  </li>
  <li>
    <a class="pay-method" href="#">
      <img src="images/jazzcash.png" alt="JazzCash" width="60" height="25">
    </a>
  </li>
</ul> -->







                                        <ul>
                                            <li><a class="pay-method" href="#"><span class="fa fa-cc-visa"
                                                                                     aria-hidden="true"></span></a>
                                            </li>
                                            <li><a class="pay-method" href="#"><span class="fa fa-cc-mastercard"
                                                                                     aria-hidden="true"></span></a>
                                            </li>
                                            <li><a class="pay-method" href="#"><span class="fa fa-cc-paypal"
                                                                                     aria-hidden="true"></span></a>
                                            </li>
                                            <li><a class="pay-method" href="#"><span class="fa fa-cc-amex"
                                                                                     aria-hidden="true"></span></a>
                                            </li>
                                        </ul> 
                                    </div>
                            </div>
                        </div>
                        <div class="below-section row">
                            {{--                            <div class="columns col-lg-6">--}}
                            {{--                                <ul class="jst-link">--}}
                            {{--                                    <li><a href="{{ url('privacypolicy') }}">Privacy Policy </a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            <div class="columns col-lg-12 text-lg-center ">
                                <p>©Routine Care. All rights reserved.
                                </p>
                            </div>
                            <button onclick="topFunction()" id="movetop" title="Go to top">
                                <span class="fa fa-angle-double-up"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- //titels-5 -->
                <!-- move top -->

                <script>
                    // When the user scrolls down 20px from the top of the document, show the button
                    window.onscroll = function () {
                        scrollFunction()
                    };

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            document.getElementById("movetop").style.display = "block";
                        } else {
                            document.getElementById("movetop").style.display = "none";
                        }
                    }

                    // When the user clicks on the button, scroll to the top of the document
                    function topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    }
                </script>
                <!-- FlexSlider -->

                <!-- /move top -->
            </section>


            <script src="{{ asset('webassets/js/jquery-3.3.1.min.js') }}"></script>
            <script src="{{ asset('webassets/js/jquery-2.1.4.min.js') }}"></script>

            <!--/login-->
            <script>
                $(document).ready(function () {
                    $(".button-log a").click(function () {
                        $(".overlay-login").fadeToggle(200);
                        $(this).toggleClass('btn-open').toggleClass('btn-close');
                    });
                });
                $('.overlay-close1').on('click', function () {
                    $(".overlay-login").fadeToggle(200);
                    $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
                    open = false;
                });
            </script>
            <!--//login-->
            <script>
                // optional
                $('#customerhnyCarousel').carousel({
                    interval: 5000
                });
            </script>

            <script src="{{ asset('webassets/js/jquery.flexslider.js') }}"></script>
            <!-- single -->
            <script src="{{ asset('webassets/js/imagezoom.js') }}"></script>
            <script>
                // Can also be used with $(document).ready()
                $(window).load(function () {
                    $('.flexslider1').flexslider({
                        animation: "slide",
                        controlNav: "thumbnails"
                    });
                });
            </script>
            <!-- cart-js -->

            <!-- //cart-js -->
            <!--pop-up-box-->
            <script src="{{ asset('webassets/js/jquery.magnific-popup.js') }}"></script>
            <!--//pop-up-box-->
            <script>
                $(document).ready(function () {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                });
            </script>
            <!--//search-bar-->
            <!-- disable body scroll which navbar is in active -->

            <script>
                $(function () {
                    $('.navbar-toggler').click(function () {
                        $('body').toggleClass('noscroll');
                    })
                });
            </script>
            <!--/login-->

            <!--//login-->
            <script>
                // optional
                $('#customerhnyCarousel').carousel({
                    interval: 5000
                });
            </script>
            <!-- cart-js -->
            <script>
                transmitv.render();

                transmitv.cart.on('transmitv_checkout', function (evt) {
                    var items, len, i;

                    if (this.subtotal() > 0) {
                        items = this.items();

                        for (i = 0, len = items.length; i < len; i++) {
                        }
                    }
                });
            </script>
            <script src="{{ asset('webassets/js/jquery-ui.js') }}"></script>
            <script>
                //<![CDATA[
                $(window).load(function () {
                    $("#slider-range").slider({
                        range: true,
                        min: 0,
                        max: 9000,
                        values: [50, 6000],
                        slide: function (event, ui) {
                            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                        }
                    });
                    $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

                }); //]]>
            </script>
            <!-- //price range (top products) -->
            <!-- disable body scroll which navbar is in active -->

            <script>
                $(function () {
                    $('.navbar-toggler').click(function () {
                        $('body').toggleClass('noscroll');
                    })
                });
            </script>

            <!-- disable body scroll which navbar is in active -->
            <script src="{{ asset('webassets/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('webassets/js/minicart.js') }}"></script>
            <script>
                transmitv.render();

                transmitv.cart.on('transmitv_checkout', function (evt) {
                    var items, len, i;

                    if (this.subtotal() > 0) {
                        items = this.items();

                        for (i = 0, len = items.length; i < len; i++) {
                        }
                    }
                });

            </script>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var navLinks = document.querySelectorAll(".nav-link");
                    var currentUrl = window.location.href;

                    for (var i = 0; i < navLinks.length; i++) {
                        if (navLinks[i].href === currentUrl) {
                            navLinks[i].parentNode.classList.add("active");
                        } else {
                            navLinks[i].parentNode.classList.remove("active");
                        }
                    }
                });
            </script>
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

                $(".cart_remove").click(function (e) {
                    e.preventDefault();

                    var ele = $(this);

                    if(confirm("Do you really want to remove?")) {
                        $.ajax({
                            url: '{{ route('remove_from_cart') }}',
                            method: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}',
                                id: ele.parents("tr").attr("data-id")
                            },
                            success: function (response) {
                                window.location.reload();
                            }
                        });
                    }
                });

            </script>
            
            <!--<script>-->
            <!--     $(document).ready(function () {-->
            <!--        $('.home').on('click',function(){-->
            <!--            $("dropdown-item").show();-->
            <!--        });-->
                    
            <!--        $(".nav-item home dropdown open").on('click',function(){-->
            <!--          $("dropdown-item").hide();    -->
            <!--        });   -->
            <!--     });-->
            <!--</script>-->

        </div>
    </div>
</section>
</body>
</html>

@extends('weblayouts.app')
@section('title', 'List')

@section('content')



        <meta name="csrf-token" content="{{ csrf_token() }}">


    <style>
        .product-image {
            width: 180px;
            height: 200px !important;
        }

        .pagination {
            display: flex;
        !important;
            justify-content: center;
        !important;
            margin-top: 20px;
        !important;
        }

    </style>
    <?php

    $categories = \App\helpers::cate();

    ?>

{{--    <img src="{{ asset('image/'.$category_image->image) }}" style="max-height: 400px; width: 100%; height: auto;">--}}
    <img src="{{ asset('images/search.jpg') }}" style="width: 100%;height: 50%">

    <section class="w3l-ecommerce-main-inn">
        <!--/mag-content-->
        <div class="ecomrhny-content-inf py-5">
            <div class="container py-lg-5">
                <!--/row1-->
                <div class="ecommerce-grids row">
                    <div class="ecommerce-left-hny col-lg-4">
                        <!--/ecommerce-left-hny-->
                        <aside>
                            <div class="sider-bar">
                                <div class="single-gd mb-5">

                                    <h4>Search <span>here</span></h4>
                                    <form action="{{ route('search') }}" method="get" class="search-trans-form">
                                        @csrf
                                        <input class="form-control" type="search" name="search"
                                               placeholder="Search here...">
                                        <button class="btn read-2">
                                            <span class="fa fa-search"></span>
                                        </button>

                                    </form>
                                </div>
                                <!-- /Gallery-imgs -->

                                <div class="single-gd mb-5">
                                    <h4>Product <span>Categories</span></h4>
                                    <ul class="list-group single">
                                        @foreach ($categories as $category)
                                            @if($category->parent_id == 0)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $category->name }}
                                                    <span
                                                        class="badge badge-primary badge-pill">{{ $category->product->count() }}</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>
                        <!--//ecommerce-left-hny-->
                    </div>
                    @if($prod->isNotEmpty())

                    <div class="ecommerce-right-hny col-lg-8">
                        <div class="row ecomhny-topbar">
                            <div class="col-6 ecomhny-result">
                                <h4 class="ecomhny-result-count"> Showing all {{$products->count() }} Results</h4>
                            </div>
                            <div class="col-6 ecomhny-topbar-ordering">

                                {{--                            <div class="ecom-ordering-select d-flex">--}}
                                {{--                                <span class="fa fa-angle-down" aria-hidden="true"></span>--}}
                                {{--                                <select>--}}
                                {{--                                    <option value="menu_order" selected="selected">Default Sorting</option>--}}
                                {{--                                    <option value="popularity">Sort by Popularity</option>--}}
                                {{--                                    <option value="rating">Sort by Average rating</option>--}}
                                {{--                                    <option value="date">Sort by latest</option>--}}
                                {{--                                    <option value="price">Sort by Price: low to high</option>--}}
                                {{--                                    <option value="price-desc">Sort by Price: high to low</option>--}}
                                {{--                                </select>--}}
                                {{--                            </div>--}}

                            </div>
                        </div>
                        <!-- /row-->
                        <div class="ecom-products-grids row">
                            @foreach($products as $product)
                            <div class="col-lg-4 col-6 product-incfhny mb-4">
                                <div class="product-grid2 transmitv">
                                    <div class="product-image2">
                                        <a href="{{route('detail', ['slug' => $product->slug]) }}">



                                            @if ($product->image)
                                                @php
                                                    $images = json_decode($product->image, true);
                                                @endphp

                                                @if (!empty($images) && is_array($images) && count($images) > 0)

                                                    <img class="pic-1 product-image img-fluid"
                                                         src="{{ asset($images[0]) }}">
                                                    <img class="pic-2 product-image img-fluid"
                                                         src="{{ asset($images[0]) }}">

                                                @endif
                                            @endif
                                        </a>
                                        <div class="transmitv single-item">
                                            <a href="{{ route('add_to_cart', ['id' => $product->id]) }}"
                                               class="transmitv-cart ptransmitv-cart add-to-cart">
                                                Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="title"><a href="">{{$product->name}} </a>
                                        </h3>
                                        <span class="price">${{$product->price}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- //row-->
                        <!--/row2-->
                        <div class="ecom-slider-hny">
                            <div class="ecommerce-banv covers-9">
                                <div class="csslider infinity" id="slider1">
                                    <input type="radio" name="slides" checked="checked" id="slides_1"/>
                                    <input type="radio" name="slides" id="slides_2"/>
                                    <input type="radio" name="slides" id="slides_3"/>

                                    <ul class="banner_slide_bg">
                                        <li>
                                            <div class="wrapper">
                                                <div class="cover-top-center-9">
                                                    <div class="w3ls_cover_txt-9">
                                                        <h6 class="tag-cover-9">30% Off</h6>
                                                        <h3 class="title-cover-9">Men's Suit</h3>

                                                        <div class="read-more-button">
                                                            <a href="ecommerce-single.html" class="read-btn btn">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="wrapper">
                                                <div class="cover-top-center-9">
                                                    <div class="w3ls_cover_txt-9">
                                                        <h6 class="tag-cover-9">50% Off</h6>
                                                        <h3 class="title-cover-9">Men's Footerwear</h3>

                                                        <div class="read-more-button">
                                                            <a href="ecommerce-single.html" class="read-btn btn">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="wrapper">
                                                <div class="cover-top-center-9">
                                                    <div class="w3ls_cover_txt-9">
                                                        <h6 class="tag-cover-9">50% Off</h6>
                                                        <h3 class="title-cover-9">Women's Footwear</h3>

                                                        <div class="read-more-button">
                                                            <a href="ecommerce-single.html" class="read-btn btn">Shop
                                                                Now</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--//row22-->
                </div>
            </div>
            <!--//row1-->

            <!--/pagination-->
            <div class="pagination">

                @if($prod->total() > 9)
                    {!! $prod->links('pagination::bootstrap-5') !!}
                @endif
            </div>
            <!--//pagination-->



            @endif


        </div>

        <!--//mag-content-->
    </section>

@endsection
@push('js')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        $(function () {
            // Add this code to include the CSRF token in AJAX headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var slider = $("#slider-range");
            var amount = $("#amount");
            var productList = $('#filtered-products');

            // Retrieve slider values from local storage
            var sliderValues = JSON.parse(localStorage.getItem('sliderValues')) || [50, 6000];

            // Initialize the slider with onchange event
            slider.slider({
                range: true,
                min: 0,
                max: 1000,
                values: sliderValues, // Set values from local storage
                slide: function (event, ui) {
                    amount.val("$" + ui.values[0] + " - $" + ui.values[1]);
                },
                change: function (event, ui) {
                    filterProducts(ui.values[0], ui.values[1]);

                    // Save slider values to local storage when changed
                    localStorage.setItem('sliderValues', JSON.stringify(ui.values));
                }
            });

            // Set initial value for the 'amount' input
            amount.val("$" + slider.slider("values", 0) + " - $" + slider.slider("values", 1));

            // Function to filter products
            function filterProducts(minPrice, maxPrice) {
                $.ajax({
                    url: '/products/filter',
                    type: 'GET',
                    data: {
                        minPrice: minPrice,
                        maxPrice: maxPrice
                    },
                    success: function (response) {
                        // Update the product list with filtered products
                        displayFilteredProducts(response);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }

            // Function to display filtered products
            function displayFilteredProducts(products) {
                productList.empty();

                $.each(products, function (index, product) {
                    productList.append('<div class="product">' +
                        '<h2>' + product.name + '</h2>' +
                        '<p>Price: $' + product.price + '</p>' +
                        '</div>');
                });
            }
        });
    </script>

@endpush

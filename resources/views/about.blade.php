@extends('weblayouts.app')
@section('title', 'AboutUs')

@section('content')
    <img src="{{ asset('images/cart_img.jpg') }}" style="width: 100%;height: 500px">
    <section class="w3l-wecome-content-6">
        <!-- /content-6-section -->
        <div class="ab-content-6-mian py-5">
            <div class="container py-lg-5">
                <div class="welcome-grids row">
                    <div class="col-lg-6 mb-lg-0 mb-5">
                        <h3 class="hny-title">
                            About Our Spry<span>Store</span></h3>
                        <p class="my-4">Our journey began with a simple idea: to create an online shopping platform that brings together the best products, curated with care, and delivered with a personal touch. Founded by a team of dedicated individuals, ZentoStores is the result of our shared vision for an e-commerce experience that's not only convenient but also enjoyable..</p>
                        <div class="read">
                            <a href="{{url('/')}}" class="read-more btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 welcome-image">
                        <img src="webassets/images/2.jpg" class="img-fluid" alt=""/>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- //content-6-section -->


    <section class="w3l-specification-6">
        <!-- /specification-6-->
        <div class="specification-6-mian py-5">
            <div class="container py-lg-5">
                <div class="row story-6-grids text-left">
                    <div class="col-lg-5 story-gd">
                        <img src="webassets/images/left2.jpg" class="img-fluid" alt="/">
                    </div>
                    <div class="col-lg-7 story-gd pl-lg-4">
                        <h3 class="hny-title">What We <span>Offer</span></h3>
                        <p>At ZentoStores, we believe that shopping should be more than just a transaction; it should be an experience. We're not just an e-commerce website; we're a community of like-minded individuals who share a passion for quality products and exceptional service.</p>

                        <div class="row story-info-content mt-md-5 mt-4">

                            <div class="col-md-6 story-info">
                                <h5><a href="{{url('/')}}">01. Visit Store</a></h5>
                                <p>When you visit ZentoStores, you're embarking on a journey through a world of carefully curated products. Our digital shelves are stocked with the finest items that have been handpicked to cater to your needs and desires. We invite you to explore our online store, where you can browse, discover, and find the perfect products that will make your life better, more stylish, and more convenient..</p>


                            </div>
                            <div class="col-md-6 story-info">
                                <h5><a href="{{url('/')}}">02. Add To Cart</a></h5>
                                <p>Shopping at ZentoStores is a breeze. With just a few clicks, you can add your favorite items to your cart, creating a personalized shopping experience. Our user-friendly interface and secure checkout process ensure that your items are only a cart away from becoming a part of your life. So, go ahead, start adding to your cart and make your wish list a reality.</p>
                            </div>
                            <div class="col-md-6 story-info">
                                <h5><a href="#">03. Gift Cards</a></h5>
                                <p>Looking for the perfect gift but not sure what to choose? ZentoStores offers gift cards that are the ideal solution for any occasion. Give the gift of choice and let your loved ones explore our vast selection to find something they'll truly cherish. Our gift cards are a thoughtful and convenient way to make someone's day special..</p>
                            </div>
                            <div class="col-md-6 story-info">
                                <h5><a href="#">04. Unique shop</a></h5>
                                <p>At ZentoStores, we take pride in being a unique online shopping destination. Our collection of products is distinctive and tailored to suit a variety of tastes and needs. You won't find mass-produced, run-of-the-mill items here. We're on a constant quest to bring you products that stand out, whether in terms of design, quality, or functionality. Explore our unique shop, and discover the extraordinary..</p>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- //specification-6-->

{{--    <section class="w3l-services-6">--}}
{{--        <!-- /content-6-section -->--}}
{{--        <div class="services-grids-6 py-5">--}}
{{--            <div class="container py-lg-5">--}}
{{--                <div class="row w3-icon-grid-gap1">--}}
{{--                    <div class="col-md-6 w3-icon-grid1">--}}
{{--                        <a href="#link">--}}
{{--                            <span class="fa fa-codepen" aria-hidden="true"></span>--}}
{{--                            <h3>Let your footwear do the talking</h3>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu--}}
{{--                            ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in--}}
{{--                            culpa quis. Phasellus lacinia.</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 w3-icon-grid1">--}}
{{--                        <a href="#link">--}}
{{--                            <span class="fa fa-mobile" aria-hidden="true"></span>--}}
{{--                            <h3>Trendy celebrity collections</h3>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu--}}
{{--                            ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in--}}
{{--                            culpa quis. Phasellus lacinia.</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 w3-icon-grid1">--}}
{{--                        <a href="#link">--}}
{{--                            <span class="fa fa-hourglass" aria-hidden="true"></span>--}}
{{--                            <h3>Animation</h3>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu--}}
{{--                            ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in--}}
{{--                            culpa quis. Phasellus lacinia.</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 w3-icon-grid1">--}}
{{--                        <a href="#link">--}}
{{--                            <span class="fa fa-modx" aria-hidden="true"></span>--}}
{{--                            <h3>Vast collection of Sports shoes</h3>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu--}}
{{--                            ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in--}}
{{--                            culpa quis. Phasellus lacinia.</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 w3-icon-grid1">--}}
{{--                        <a href="#link">--}}
{{--                            <span class="fa fa-bar-chart" aria-hidden="true"></span>--}}
{{--                            <h3>Uniquely designed collection</h3>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu--}}
{{--                            ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in--}}
{{--                            culpa quis. Phasellus lacinia.</p>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 w3-icon-grid1">--}}
{{--                        <a href="#link">--}}
{{--                            <span class="fa fa-shopping-bag" aria-hidden="true"></span>--}}
{{--                            <h3>--}}
{{--                                High Quality Footwear</h3>--}}
{{--                            <div class="clearfix"></div>--}}
{{--                        </a>--}}
{{--                        <p>Lorem sint occaecat non proident, sunt in culpa quis. Phasellus lacinia id erat eu--}}
{{--                            ullamcorper. Nunc id ipsum fringilla, gravida felis vitae. Phasellus lacinia id, sunt in--}}
{{--                            culpa quis. Phasellus lacinia.</p>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- //content-6-section -->
    <section class="features-4">
        <div class="features4-block py-5">
            <div class="container py-lg-5">
                <h6>We are the best</h6>
                <h3 class="hny-title text-center">What We <span>Offering</span></h3>

                <div class="features4-grids text-center row mt-5">
                    <div class="col-lg-3 col-md-6 features4-grid">
                        <div class="features4-grid-inn">
                            <span class="fa fa-bullhorn icon-fea4" aria-hidden="true"></span>
                            <h5><a href="#URL">Call Us Anytime</a></h5>
                            <p>We're here 24/7 to assist you with any questions or concerns. Your satisfaction is our priority..</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 features4-grid sec-features4-grid">
                        <div class="features4-grid-inn">
                            <span class="fa fa-truck icon-fea4" aria-hidden="true"></span>
                            <h5><a href="#URL">Free Shipping</a></h5>
                            <p>Enjoy worry-free shopping with free shipping on all orders. No hidden costs, just great products delivered to your doorstep..</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 features4-grid">
                        <div class="features4-grid-inn">
                            <span class="fa fa-recycle icon-fea4" aria-hidden="true"></span>
                            <h5><a href="#URL">Free Returns</a></h5>
                            <p>Shop confidently with our hassle-free return policy. If you're not satisfied, we've got you covered..</p>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 features4-grid">
                        <div class="features4-grid-inn">
                            <span class="fa fa-money icon-fea4" aria-hidden="true"></span>
                            <h5><a href="#URL">Secured Payments</a></h5>
                            <p>Your online security is our top priority. Shop with peace of mind knowing your payments are protected by state-of-the-art encryption technology..</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features-4 -->

@endsection

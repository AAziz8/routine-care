@extends('weblayouts.app')
@section('title', 'Category')

@section('content')
    <div class="breadcrumb-contentnhy">
        <div class="container">
          <nav aria-label="breadcrumb">
            <h2 class="hny-title text-center">Ecommerce</h2>
            <ol class="breadcrumb mb-0">
              <li><a href="index.html">Home</a>
                <span class="fa fa-angle-double-right"></span></li>
              <li class="active">Shop</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
</section>
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
								<form action="#" method="post" class="search-trans-form">
									<input class="form-control" type="search" name="search" placeholder="Search here..."
										required="">
									<button class="btn read-2">
										<span class="fa fa-search"></span>
									</button>

								</form>
							</div>
							<!-- /Gallery-imgs -->

							<div class="single-gd mb-5">
								<h4>Product <span>Categories</span></h4>
								<ul class="list-group single">
									<li class="list-group-item d-flex justify-content-between align-items-center">
										Accessories
										<span class="badge badge-primary badge-pill">14</span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										Suits
										<span class="badge badge-primary badge-pill">18</span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										Footwear
										<span class="badge badge-primary badge-pill">12</span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
											Blazers
										<span class="badge badge-primary badge-pill">10</span>
									</li>
								</ul>
							</div>
							<div class="single-gd mb-5">
								<h4>Filter by <span>Price</span></h4>

								<ul class="dropdown-vjm-transitu6">
									<li>

										<div id="slider-range"
											class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
											<div class="ui-slider-range ui-widget-header"
												style="left: 0.555556%; width: 18.5556%;"></div><a
												class="ui-slider-handle ui-state-default ui-corner-all" href="#"
												style="left: 0.555556%;"></a><a
												class="ui-slider-handle ui-state-default ui-corner-all" href="#"
												style="left: 19.1111%;"></a>
										</div>
										<input type="text" id="amount"
											style="border: 0; color: #ffffff; font-weight: normal;">
									</li>
								</ul>


								<!--//Gallery-imgs-->
							</div>

							<div class="single-gd mb-5">
								<h4>Discount </h4>
								<div classes="box-hny">
									<label class="containerhny-checkbox">15% or More
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
									<label class="containerhny-checkbox">20% or More
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
									<label class="containerhny-checkbox">35% or More
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
									<label class="containerhny-checkbox">55% or More
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>

									<label class="containerhny-checkbox">65% or More
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>
									<label class="containerhny-checkbox">75% or More
										<input type="checkbox">
										<span class="checkmark"></span>
									</label>

								</div>

							</div>
							<div class="single-gd customer-rev left-side mb-5">
								<h4>Customer <span>Color</span></h4>

								<ul class="product-color">
									<li>
										<input type="checkbox" name="color-check" id="redcheck" checked="checked" />
										<label for="redcheck" style="background-color:red;"></label>
									</li>
									<li>
										<input type="checkbox" name="color-check" id="#A2C2C9check" checked="checked" />
										<label for="#A2C2C9check" style="background-color:#A2C2C9;"></label>
									</li>
									<li>
										<input type="checkbox" name="color-check" id="#EFDBD4check" checked="checked" />
										<label for="#EFDBD4check" style="background-color:#EFDBD4;"></label>
									</li>
									<li>
										<input type="checkbox" name="color-check" id="#2196F3check" checked="checked" />
										<label for="#2196F3check" style="background-color:#2196F3;"></label>
									</li>
									<li>
										<input type="checkbox" name="color-check" id="#4CAF50check" checked="checked" />
										<label for="#4CAF50check" style="background-color:#4CAF50;"></label>
									</li>
									<li>
										<input type="checkbox" name="color-check" id="#00BCD4check" checked="checked" />
										<label for="#00BCD4check" style="background-color:#00BCD4;"></label>
									</li>
								</ul>
							</div>
							<div class="single-gd left-side mb-5">
								<h4>Customer Ratings</h4>
								<ul class="ratingshyny">
									<li>
										<a href="#">
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span>5.0</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star-o" aria-hidden="true"></span>
											<span>4.0</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star-half-o" aria-hidden="true"></span>
											<span class="fa fa-star-o" aria-hidden="true"></span>
											<span>3.5</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star-o" aria-hidden="true"></span>
											<span class="fa fa-star-o" aria-hidden="true"></span>
											<span>3.0</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star" aria-hidden="true"></span>
											<span class="fa fa-star-half-o" aria-hidden="true"></span>
											<span class="fa fa-star-o" aria-hidden="true"></span>
											<span class="fa fa-star-o" aria-hidden="true"></span>
											<span>2.5</span>
										</a>
									</li>
								</ul>
							</div>

							<div class="single-gd mb-5 border-0">
								<h4>Recent <span>Products</span></h4>
								<div class="row special-sec1 mt-4">
									<div class="col-4 img-deals">
										<a href="{{ url('product') }}"><img src="webassets/images/shop-88.jpg"
												class="img-fluid" alt=""></a>
									</div>
									<div class="col-8 img-deal1">
										<h5 class="post-title">
											<a href="{{ url('product') }}">Blue Sweater</a> </h5>

										<a href="{{ url('product') }}" class="price-right">$499.00</a>
									</div>

								</div>
								<div class="row special-sec1 mt-4">
									<div class="col-4 img-deals">
										<a href="{{ url('product') }}"><img src="webassets/images/shop-77.jpg"
												class="img-fluid" alt=""></a>
									</div>
									<div class="col-8 img-deal1">
										<h5 class="post-title">
											<a href="{{ url('product') }}">White T-Shirt</a> </h5>
										<a href="{{ url('product') }}" class="price-right">$575.00</a>
									</div>

								</div>

							</div>
						</div>
					</aside>
					<!--//ecommerce-left-hny-->
				</div>
				<div class="ecommerce-right-hny col-lg-8">
					<div class="row ecomhny-topbar">
						<div class="col-6 ecomhny-result">
							<h4 class="ecomhny-result-count"> Showing all 9 Results</h4>
						</div>
						<div class="col-6 ecomhny-topbar-ordering">

								<div class="ecom-ordering-select d-flex">
										<span class="fa fa-angle-down" aria-hidden="true"></span>
										<select>
												<option value="menu_order" selected="selected">Default Sorting</option>
												<option value="popularity">Sort by Popularity</option>
												<option value="rating">Sort by Average rating</option>
												<option value="date">Sort by latest</option>
												<option value="price">Sort by Price: low to high</option>
												<option value="price-desc">Sort by Price: high to low</option>
										</select>
									</div>
		
						</div>
					</div>
					<!-- /row-->
					<div class="ecom-products-grids row">
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2 transmitv">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-1.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-11.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Women Maroon Top">
											<input type="hidden" name="amount" value="899.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Women Maroon Top </a>
									</h3>
									<span class="price"><del>$975.00</del>$899.99</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-2.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-22.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Men's Pink Shirt">
											<input type="hidden" name="amount" value="599.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Men's Pink Shirt </a>
									</h3>
									<span class="price"><del>$775.00</del>$599.99</span>
								</div>
							</div>

						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-3.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-33.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Dark Blue Top">
											<input type="hidden" name="amount" value="799.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Dark Blue Top </a></h3>
									<span class="price"><del>$875.00</del>$799.99</span>
								</div>
							</div>

						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-4.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-44.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Women Tunic">
											<input type="hidden" name="amount" value="399.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Women Tunic </a></h3>
									<span class="price"><del>$475.00</del>$399.99</span>
								</div>
							</div>

						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-5.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-55.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Yellow T-Shirt">
											<input type="hidden" name="amount" value="299.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Yellow T-Shirt</a></h3>
									<span class="price"><del>$575.00</del>$299.99</span>
								</div>
							</div>

						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-6.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-66.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Straight Kurta">
											<input type="hidden" name="amount" value="699.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Straight Kurta </a></h3>
									<span class="price"><del>$775.00</del>$699.99</span>
								</div>
							</div>

						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-7.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-77.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="White T-Shirt">
											<input type="hidden" name="amount" value="599.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">White T-Shirt </a></h3>
									<span class="price"><del>$675.00</del>$599.99</span>
								</div>
							</div>

						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-8.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-88.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Blue Sweater">
											<input type="hidden" name="amount" value="499.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Blue Sweater</a></h3>
									<span class="price"><del>$575.00</del>$499.99</span>
								</div>
							</div>

						</div>
						<div class="col-lg-4 col-6 product-incfhny mb-4">
							<div class="product-grid2 transmitv">
								<div class="product-image2">
									<a href="{{ url('product') }}">
										<img class="pic-1 img-fluid" src="webassets/images/shop-1.jpg">
										<img class="pic-2 img-fluid" src="webassets/images/shop-11.jpg">
									</a>
									<ul class="social">
										<li><a href="#" data-tip="Quick View"><span
													class="fa fa-eye"></span></a></li>

										<li><a href="ecommerce.html" data-tip="Add to Cart"><span
													class="fa fa-shopping-bag"></span></a>
										</li>
									</ul>
									<div class="transmitv single-item">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="transmitv_item" value="Women Maroon Top">
											<input type="hidden" name="amount" value="899.99">
											<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart">
												Add to Cart
											</button>
										</form>
									</div>
								</div>
								<div class="product-content">
									<h3 class="title"><a href="{{ url('product') }}">Women Maroon Top </a>
									</h3>
									<span class="price"><del>$975.00</del>$899.99</span>
								</div>
							</div>
						</div>

					</div>
					<!-- //row-->
					<!--/row2-->
					<div class="ecom-slider-hny">
						<div class="ecommerce-banv covers-9">
							<div class="csslider infinity" id="slider1">
								<input type="radio" name="slides" checked="checked" id="slides_1" />
								<input type="radio" name="slides" id="slides_2" />
								<input type="radio" name="slides" id="slides_3" />

								<ul class="banner_slide_bg">
									<li>
										<div class="wrapper">
											<div class="cover-top-center-9">
												<div class="w3ls_cover_txt-9">
													<h6 class="tag-cover-9">30% Off</h6>
													<h3 class="title-cover-9">Men's Suit</h3>

													<div class="read-more-button">
														<a href="{{ url('product') }}" class="read-btn btn">Shop
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
														<a href="{{ url('product') }}" class="read-btn btn">Shop
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
														<a href="{{ url('product') }}" class="read-btn btn">Shop
															Now</a>
													</div>
												</div>
											</div>
										</div>
									</li>

								</ul>
								<div class="arrows">
									<label for="slides_1"></label>
									<label for="slides_2"></label>
									<label for="slides_3"></label>

								</div>
								<div class="navigation">
									<div>
										<label for="slides_1"></label>
										<label for="slides_2"></label>
										<label for="slides_3"></label>

									</div>
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
				<ul>
					<li class="prev"><a href="#page-number"><span class="fa fa-angle-double-left"></span></a></li>
					<li><a href="#page-number" class="active">1</a></li>
					<li><a href="#page-number">2</a></li>
					<li><a href="#page-number">3</a></li>

					<li class="next"><a href="#page-number"><span class="fa fa-angle-double-right"></span></a></li>
				</ul>
			</div>
			<!--//pagination-->

		</div>
	</div>
	<!--//mag-content-->
</section>
 

 @endsection

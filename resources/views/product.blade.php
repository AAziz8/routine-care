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
					<li class="active">Shop Single</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
</section>
<section class="w3l-ecommerce-main-inn">
	<!--/ecommerce-single-->
	<div class="ecomrhny-content-inf py-5">
		<div class="container py-lg-5">
			<!--/row1-->
			<div class="sp-store-single-page row">
				<div class="col-lg-5 single-right-left">
					<div class="flexslider1">

						<ul class="slides">
							<li data-thumb="webassets/images/cart1.jpg">
								<div class="thumb-image"> <img src="webassets/images/cart1.jpg" data-imagezoom="true"
									class="img-fluid" alt=" "> </div>
								</li>
								<li data-thumb="webassets/images/cart2.jpg">
									<div class="thumb-image"> <img src="webassets/images/cart2.jpg" data-imagezoom="true"
										class="img-fluid" alt=" "> </div>
									</li>
									<li data-thumb="webassets/images/cart3.jpg">
										<div class="thumb-image"> <img src="webassets/images/cart3.jpg" data-imagezoom="true"
											class="img-fluid" alt=" "> </div>
										</li>
										<li data-thumb="webassets/images/cart4.jpg">
											<div class="thumb-image"> <img src="webassets/images/cart4.jpg" data-imagezoom="true"
												class="img-fluid" alt=" "> </div>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="eco-buttons mt-5">

										<div class="transmitv single-item">
											<form action="#" method="post">
												<input type="hidden" name="cmd" value="_cart">
												<input type="hidden" name="add" value="1">
												<input type="hidden" name="transmitv_item" value="Yellow T-Shirt">
												<input type="hidden" name="amount" value="599.99">
												<button type="submit" class="transmitv-cart ptransmitv-cart add-to-cart read-2">
													Add to Cart
												</button>
											</form>
										</div>
										<div class="buyhny-now"> <a href="#buy" class="action btn">Buy Now </a></div>

									</div>
								</div>
								<div class="col-lg-7 single-right-left pl-lg-4">
									<h3>Striped Men Round Neck Yellow T-Shirt
									</h3>
									<div class="caption">

										<ul class="rating-single">
											<li>
												<a href="#">
													<span class="fa fa-star yellow-star" aria-hidden="true"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fa fa-star yellow-star" aria-hidden="true"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fa fa-star yellow-star" aria-hidden="true"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fa fa-star-half-o yellow-star" aria-hidden="true"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fa fa-star-half yellow-star" aria-hidden="true"></span>
												</a>
											</li>
										</ul>

										<h6>
											<span class="item_price">$575</span>
											<del>$1,199</del> Free Delivery
										</h6>
									</div>
									<div class="desc_single my-4">
										<ul class="emi-views">
											<li><span>Special Price</span> Get extra 5% off (price inclusive of discount)</li>
											<li><span>Bank Offer</span> 5% Unlimited Cashback on Flipkart Axis Bank Credit Card</li>
											<li><span>Bank Offer</span> 5% Cashback* on HDFC Bank Debit Cards</li>
											<li><span>Bank Offer</span> Extra 5% off* with Axis Bank Buzz Credit Card</li>
										</ul>
									</div>
									<div class="desc_single mb-4">
										<h5>Description:</h5>
										<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facere, ratione et ipsam velit
											explicabo deleniti obcaecati a, numquam, unde quisquam quas quae accusamus eveniet magni.
										Nobis iure et porro aut..</p>
									</div>
									<div class="description-apt d-grid mb-4">
										<div class="occasional">
											<h5 class="sp_title mb-3">Highlights:</h5>
											<ul class="single_specific">
												<li>
												Neck : Round Neck</li>
												<li>
												Fit : Regular</li>

												<li> Sleeve : Half Sleeve
												</li>
												<li> Material : Pure Cutton</li>

											</ul>

										</div>

										<div class="color-quality">
											<h5 class="sp_title">Services:</h5>
											<ul class="single_serv">
												<li>
													<a href="#">30 Day Return Policy</a>
												</li>
												<li class="gap">
													<a href="#">Cash on Delivery available</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="description mb-4">
										<h5>Check delivery, payment options and charges at your location</h5>
										<form action="#" class="d-flex" method="post">
											<input type="text" placeholder="Enter pincode" required>
											<button class="submit btn" type="submit">Check</button>
										</form>
									</div>

								</div>
							</div>
						</div>
						<!--//row1-->
					</div>
					<!--//ecommerce-single-->
				</section>

				<!-- //content-6-section -->
				<section class="w3l-ecommerce-main">
					<!-- /products-->
					<div class="ecom-contenthny py-5">
						<div class="container py-lg-5">
							<h3 class="hny-title mb-0 text-center">Featured <span>Products</span></h3>
							<p class="text-center">New Collections Shop With Us</p>
							<!-- /row-->
							<div class="ecom-products-grids row mt-lg-5 mt-3">
								<div class="col-lg-3 col-6 product-incfhny mt-4">
									<div class="product-grid2 transmitv">
										<div class="product-image2">
											<a href="{{ url('product') }}">
												<img class="pic-1 img-fluid" src="webassets/images/shop-1.jpg">
												<img class="pic-2 img-fluid" src="webassets/images/shop-11.jpg">
											</a>
											<ul class="social">
												<li><a href="{{ url('product') }}" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>


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
											<h3 class="title"><a href="{{ url('product') }}">Women Maroon Top </a></h3>
											<span class="price"><del>$975.00</del>$899.99</span>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-6 product-incfhny mt-4">
									<div class="product-grid2">
										<div class="product-image2">
											<a href="{{ url('product') }}">
												<img class="pic-1 img-fluid" src="webassets/images/shop-2.jpg">
												<img class="pic-2 img-fluid" src="webassets/images/shop-22.jpg">
											</a>
											<ul class="social">
												<li><a href="{{ url('product') }}" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>


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
											<h3 class="title"><a href="{{ url('product') }}">Men's Pink Shirt </a></h3>
											<span class="price"><del>$775.00</del>$599.99</span>
										</div>
									</div>

								</div>
								<div class="col-lg-3 col-6 product-incfhny mt-4">
									<div class="product-grid2">
										<div class="product-image2">
											<a href="{{ url('product') }}">
												<img class="pic-1 img-fluid" src="webassets/images/shop-3.jpg">
												<img class="pic-2 img-fluid" src="webassets/images/shop-33.jpg">
											</a>
											<ul class="social">
												<li><a href="{{ url('product') }}" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>


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
								<div class="col-lg-3 col-6 product-incfhny mt-4">
									<div class="product-grid2">
										<div class="product-image2">
											<a href="{{ url('product') }}">
												<img class="pic-1 img-fluid" src="webassets/images/shop-4.jpg">
												<img class="pic-2 img-fluid" src="webassets/images/shop-44.jpg">
											</a>
											<ul class="social">
												<li><a href="{{ url('product') }}" data-tip="Quick View"><span class="fa fa-eye"></span></a></li>


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
							</div>
							<!-- //row-->
						</div>
					</div>
				</section>
				<!-- //products-->


			


				@endsection

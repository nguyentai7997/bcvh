<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php echo $dataCamp[0]['title'];?> - teemarket</title>

	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="teemarket">
	<meta name="author" content="SW-THEMES">

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?= base_url()?>assets/images/icons/favicon-teemarket.ico">

	<script type="text/javascript">
		WebFontConfig = {
			google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
		};
		(function(d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = '<?= base_url()?>assets/js/webfont.js';
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
	</script>

	<!-- Plugins CSS File -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">

	<!-- Main CSS File -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/style.min.css">

	<!-- Thu vien thong bao -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/toastr.min.css">

	<!-- Custom CSS File -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/teemarket.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/product_details.css">

</head>
<body>
<div class="page-wrapper">
	<?php include("home_header_view.php") ?>

	<main class="main">
		<div class="container">
			<div class="row" style="margin-top: 1.5rem;">
				<div class="col-lg-12">
					<div class="product-single-container product-single-default">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="product-single-gallery">
									<div class="product-slider-container product-item" style="height: 630px">
										<?php for ($i = 0; $i < count($campaign_color); $i++) { ?>
										<div class="image <?php if ($i == 0) { echo "active";} ?>" id="<?php echo $campaign_color[$i]['color']; ?>"  style="position: absolute;">
											<img src="<?php echo $campaign_color[$i]['image_link'];?>">
										</div>
										<?php } ?>
									</div>
								</div><!-- End .product-single-gallery -->
							</div><!-- End .col-lg-6 -->

							<div class="col-lg-6 col-md-6">
								<div class="product-single-details border">
									<h1 class="product-title"><?php echo $dataCamp[0]['title'];?></h1>

									<div class="price-box">
										<span class="product-price" style="color: #fb8c00;font-weight: 400">$<?php echo number_format($dataCamp[0]['price'],2);?></span>
									</div><!-- End .price-box -->

									<div class="product-desc">
										<p>Unisex Cotton Tee.</p>
									</div><!-- End .product-desc -->

									<div class="product-filters-container">
										<div class="product-single-filter">
											<label>Colors:</label>
											<ul class="config-swatch-list">
												<?php for ($i = 0; $i < count($campaign_color); $i++) { ?>
													<li class="bg-colors <?php if ($i == 0){echo "active ";} echo $campaign_color[$i]['color'];?>" onclick="activeColor(this)">
														<a style="background-color: <?php echo $campaign_color[$i]['color_code']; ?>"></a>
													</li>
												<?php } ?>
											</ul>
										</div><!-- End .product-single-filter -->
										<div class="error size-required" style="margin-left: 52px">Choose a size.</div>
										<div class="product-single-filter">
											<label>Sizes:</label>
											<ul class="config-size-list">
												<li class="size-s"><a>S</a></li>
												<li class="size-m"><a>M</a></li>
												<li class="size-l"><a>L</a></li>
												<li class="size-xl"><a>XL</a></li>
												<li class="size-2xl"><a>2XL</a></li>
												<li class="size-3xl"><a>3XL</a></li>
												<li class="size-4xl"><a>4XL</a></li>
												<li class="size-5xl"><a>5XL</a></li>
											</ul>
										</div><!-- End .product-single-filter -->
									</div><!-- End .product-filters-container -->

									<div class="product-action">
										<div class="product-single-qty">
											<input class="horizontal-quantity form-control" type="text">
											<input class="product-id" value="<?php echo $dataCamp[0]['id'];?>" style="display: none">
										</div><!-- End .product-single-qty -->

										<?php if ($dataCamp[0]['status'] == 'active') { ?>
											<a class="paction add-cart" title="Add to Cart">
												<span>Add to Cart</span>
											</a>
										<?php } else { ?>
											<button class="paction add-cart ended" title="Add to Cart" disabled>
												<span>ENDED</span>
											</button>
										<?php } ?>
									</div><!-- End .product-action -->
								</div><!-- End .product-single-details -->
							</div><!-- End .col-lg-6 -->
						</div><!-- End .row -->
					</div><!-- End .product-single-container -->
					<div class="product-single-tabs">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="false">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
							</li>

						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
								<div class="product-desc-content">
									<p><?php echo $dataCamp[0]['description'];?></p>
								</div><!-- End .product-desc-content -->
							</div><!-- End .tab-pane -->

							<div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
								<div class="product-size-content">
									<div class="row">
										<div class="col-md-4">
											<img src="<?= base_url()?>assets/images/products/single/body-shape.png" alt="body shape">
										</div><!-- End .col-md-4 -->

										<div class="col-md-8">
											<table class="table table-size">
												<thead>
												<tr>
													<th>SIZE</th>
													<th>CHEST (in.)</th>
													<th>WAIST (in.)</th>
													<th>HIPS (in.)</th>
												</tr>
												</thead>
												<tbody>
												<tr>
													<td>XS</td>
													<td>34-36</td>
													<td>27-29</td>
													<td>34.5-36.5</td>
												</tr>
												<tr>
													<td>S</td>
													<td>36-38</td>
													<td>29-31</td>
													<td>36.5-38.5</td>
												</tr>
												<tr>
													<td>M</td>
													<td>38-40</td>
													<td>31-33</td>
													<td>38.5-40.5</td>
												</tr>
												<tr>
													<td>L</td>
													<td>40-42</td>
													<td>33-36</td>
													<td>40.5-43.5</td>
												</tr>
												<tr>
													<td>XL</td>
													<td>42-45</td>
													<td>36-40</td>
													<td>43.5-47.5</td>
												</tr>
												<tr>
													<td>XLL</td>
													<td>45-48</td>
													<td>40-44</td>
													<td>47.5-51.5</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div><!-- End .row -->
								</div><!-- End .product-size-content -->
							</div><!-- End .tab-pane -->

						</div><!-- End .tab-content -->
					</div><!-- End .product-single-tabs -->
				</div><!-- End .col-lg-12 -->

				<div class="sidebar-overlay"></div>
				<div class="sidebar-toggle"><i class="icon-sliders"></i></div>
			</div><!-- End .row -->

			<div class="mb-lg-4"></div><!-- margin -->
		</div><!-- End .container -->
	</main><!-- End .main -->

	<?php include("home_footer_view.php") ?>
</div><!-- End .page-wrapper -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
	<div class="mobile-menu-wrapper">
		<span class="mobile-menu-close"><i class="icon-cancel"></i></span>
		<nav class="mobile-nav">
			<ul class="mobile-menu">
				<li class="active"><a href="index-2.html">Home</a></li>
				<li>
					<a href="category.html">Categories</a>
					<ul>
						<li><a href="category-banner-full-width.html">Full Width Banner</a></li>
						<li><a href="category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
						<li><a href="category-banner-boxed-image.html">Boxed Image Banner</a></li>
						<li><a href="category-sidebar-left.html">Left Sidebar</a></li>
						<li><a href="category-sidebar-right.html">Right Sidebar</a></li>
						<li><a href="category-flex-grid.html">Product Flex Grid</a></li>
						<li><a href="category-horizontal-filter1.html">Horizontal Filter 1</a></li>
						<li><a href="category-horizontal-filter2.html">Horizontal Filter 2</a></li>
						<li><a href="#">Product List Item Types</a></li>
						<li><a href="category-infinite-scroll.html">Ajax Infinite Scroll<span class="tip tip-new">New</span></a></li>
						<li><a href="category-3col.html">3 Columns Products</a></li>
						<li><a href="category-4col.html">4 Columns Products</a></li>
						<li><a href="category-5col.html">5 Columns Products</a></li>
						<li><a href="category-6col.html">6 Columns Products</a></li>
						<li><a href="category-7col.html">7 Columns Products</a></li>
						<li><a href="category-8col.html">8 Columns Products</a></li>
					</ul>
				</li>
				<li>
					<a href="product.html">Products</a>
					<ul>
						<li>
							<a href="#">Variations</a>
							<ul>
								<li><a href="product.html">Horizontal Thumbnails</a></li>
								<li><a href="product-full-width.html">Vertical Thumbnails<span class="tip tip-hot">Hot!</span></a></li>
								<li><a href="product.html">Inner Zoom</a></li>
								<li><a href="product-addcart-sticky.html">Addtocart Sticky</a></li>
								<li><a href="product-sidebar-left.html">Accordion Tabs</a></li>
							</ul>
						</li>
						<li>
							<a href="#">Variations</a>
							<ul>
								<li><a href="product-sticky-tab.html">Sticky Tabs</a></li>
								<li><a href="product-simple.html">Simple Product</a></li>
								<li><a href="product-sidebar-left.html">With Left Sidebar</a></li>
							</ul>
						</li>
						<li>
							<a href="#">Product Layout Types</a>
							<ul>
								<li><a href="product.html">Default Layout</a></li>
								<li><a href="product-extended-layout.html">Extended Layout</a></li>
								<li><a href="product-full-width.html">Full Width Layout</a></li>
								<li><a href="product-grid-layout.html">Grid Images Layout</a></li>
								<li><a href="product-sticky-both.html">Sticky Both Side Info<span class="tip tip-hot">Hot!</span></a></li>
								<li><a href="product-sticky-info.html">Sticky Right Side Info</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
					<ul>
						<li><a href="cart.html">Shopping Cart</a></li>
						<li>
							<a href="#">Checkout</a>
							<ul>
								<li><a href="checkout-shipping.html">Checkout Shipping</a></li>
								<li><a href="checkout-shipping-2.html">Checkout Shipping 2</a></li>
								<li><a href="checkout-review.html">Checkout Review</a></li>
							</ul>
						</li>
						<li><a href="about.html">About</a></li>
						<li><a href="#" class="login-link">Login</a></li>
						<li><a href="forgot-password.html">Forgot Password</a></li>
					</ul>
				</li>
				<li><a href="blog.html">Blog</a>
					<ul>
						<li><a href="single.html">Blog Post</a></li>
					</ul>
				</li>
				<li><a href="contact.html">Contact Us</a></li>
				<li><a href="#">Special Offer!<span class="tip tip-hot">Hot!</span></a></li>
				<li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
			</ul>
		</nav><!-- End .mobile-nav -->

		<div class="social-icons">
			<a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
			<a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
			<a href="#" class="social-icon" target="_blank"><i class="icon-instagram"></i></a>
		</div><!-- End .social-icons -->
	</div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Add Cart Modal -->
<div class="modal fade" id="addCartModal" tabindex="-1" role="dialog" aria-labelledby="addCartModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body add-cart-box text-center">
				<p>You've just added this product to the<br>cart:</p>
				<h4 id="productTitle"></h4>
				<img src="#" id="productImage" width="100" height="100" alt="adding cart image">
				<div class="btn-actions">
					<a href="cart.html"><button class="btn-primary">Go to cart page</button></a>
					<a href="#"><button class="btn-primary" data-dismiss="modal">Continue</button></a>
				</div>
			</div>
		</div>
	</div>
</div>

<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

<!-- Plugins JS File -->
<script src="<?= base_url()?>assets/js/jquery.min.js"></script>
<script src="<?= base_url()?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/js/plugins.min.js"></script>

<!-- Main JS File -->
<script src="<?= base_url()?>assets/js/main.min.js"></script>
<script src="<?= base_url()?>assets/js/toastr.min.js"></script>
<script src="<?= base_url()?>assets/js/teemarket.js"></script>

</body>

</html>

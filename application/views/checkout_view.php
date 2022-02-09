<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Checkout - teemarket</title>

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

	<!-- Custom CSS File -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/teemarket.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/vendor/fontawesome-free/css/all.min.css">

</head>
<body class="animsition">
<div class="page-wrapper">
	<?php include("home_header_view.php") ?>

	<main class="main">
		<div class="mt-6"></div><!-- margin -->
		<div class="container">
			<div class="text-center">
				<ul class="checkout-progress-bar">
					<li>
						<span>Shopping Cart</span>
					</li>
					<li class="active">
						<span>Checkout</span>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-1"></div>
				<div class="col-lg-5">
					<div class="order-summary">
						<h3>Order Summary</h3>
						<h4><a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section"><?php echo count($_SESSION['product'])?> products in Cart</a></h4>

						<div class="collapse show" id="order-cart-section">
							<table class="table table-mini-cart">
								<tbody>
								<?php $total = 0;
								foreach ($_SESSION['product'] as $key => $value) { ?>
									<input class="sr-only id" value="<?php echo $value['id']?>">
									<input class="sr-only size" value="<?php echo $value['size'];?>">
									<input class="sr-only id-color" value="<?php echo $value['id_color'];?>">
									<input class="sr-only quantity" value="<?php echo $value['quantity'];?>">
									<tr>
										<td class="product-col">
											<figure class="product-image-container">
												<span class="product-image">
													<img id="image" src="<?php echo $value['image_link'];?>">
												</span>
											</figure>
											<div>
												<h2 class="product-title">
													<p><?php echo $value['title'];?></p>
													<p><?php echo (ucfirst($value['color'])) . ' - ' . $value['size'];?></p>
												</h2>
											</div>
										</td>
										<td class="price-col" style="text-align: right">
											<span><?php echo $value['quantity'] . ' x $' . $value['price'];?></span>
										</td>
									</tr>
								<?php $total += $value['quantity'] * $value['price'];
								}?>
								</tbody>
								<tfoot>
									<tr>
										<td><h3>Total</h3></td>
										<td style="color: #fb8c00;font-size: 20px;text-align: right"><span>$<?php echo $total;?></span></td>
									</tr>
								</tfoot>
							</table>
						</div><!-- End #order-cart-section -->
					</div><!-- End .order-summary -->

					<div class="checkout-info-box">
						<h3 class="step-title">How long will it take to receive my order?</h3>
						<p>Your order will arrive 7-21 days after the end of the campaign!</p>
					</div><!-- End .checkout-info-box -->

				</div><!-- End .col-lg-4 -->

				<div class="col-lg-6 order-lg-first">
					<div class="checkout-payment">
						<h2 class="step-title">Contact Address</h2>

						<div id="new-checkout-address" class="show">
							<form>
								<div class="form-group required-field">
									<label>Email </label>
									<input type="text" class="form-control email" required>
									<div class="error email-required">The email field is required.</div>
									<div class="error email-invalid">The email field must be a valid email.</div>
								</div><!-- End .form-group -->

								<div class="form-group required-field">
									<label>Full Name </label>
									<input type="text" class="form-control fullname" required>
									<div class="error fn-required">The full name field is required.</div>
								</div><!-- End .form-group -->

								<div class="form-group required-field">
									<label>Address </label>
									<input type="text" class="form-control address" required>
									<div class="error address-required">The address field is required.</div>
								</div><!-- End .form-group -->

								<div class="form-group">
									<div class="row">
										<div class="col-4">
											<label>Country</label>
											<div class="select-custom">
												<select name="country" class="countries form-control" id="countryId">
													<option value="">Select Country</option>
												</select>
											</div><!-- End .select-custom -->
											<div class="error country-required">The country field is required.</div>
										</div>
										<div class="col-4">
											<label>State / Province</label>
											<div class="select-custom">
												<select name="state" class="states form-control" id="stateId">
													<option value="">Select State</option>
												</select>
											</div><!-- End .select-custom -->
											<div class="error state-required">The state / province / region field is required.</div>
										</div>
										<div class="col-4">
											<label>City / Town</label>
											<div class="select-custom">
												<select name="city" class="cities form-control" id="cityId">
													<option value="">Select City</option>
												</select>
											</div><!-- End .select-custom -->
											<div class="error city-required">The city / town field is required.</div>
										</div>
									</div>
								</div><!-- End .form-group -->

								<div class="form-group required-field">
									<label>Zip / Postal Code </label>
									<input type="text" class="form-control zip" required>
									<div class="error zip-required">The zip / postal code field is required.</div>
									<div class="error zip-invalid">Please input a valid zip code.</div>
								</div><!-- End .form-group -->

								<div class="form-group-custom-control">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="address-save">
										<label class="custom-control-label" for="address-save">I want to save address for next time</label>
									</div><!-- End .custom-checkbox -->
								</div><!-- End .form-group -->
							</form>
						</div><!-- End #new-checkout-address -->

						<div class="clearfix">
							<h2 class="step-title">Payment</h2>
						</div><!-- End .clearfix -->
						<!-- PayPal Logo -->
						<table border="0" cellpadding="10" cellspacing="0">
							<tr>
								<td align="center">
									<a class="complete-order" title="Complete Order">
										<img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_SbyPP_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">
									</a>
								</td>
							</tr>
						</table><!-- PayPal Logo -->
					</div><!-- End .checkout-payment -->
				</div><!-- End .col-lg-8 -->
			</div><!-- End .row -->
		</div><!-- End .container -->

		<div class="mb-6"></div><!-- margin -->

	</main><!-- End .main -->

	<!-- Modal -->
	<div class="modal fade modal-primary" id="exampleModalPrimary" aria-hidden="true"
		 aria-labelledby="exampleModalPrimary" role="dialog" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title">Order Success</h2>
				</div>
				<div class="modal-body">
					<p>Thank you for your order! Your order will arrive 7-21 days after the end of the campaign!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default close-modal" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<?php include("home_footer_view.php") ?>
</div><!-- End .page-wrapper -->

<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
	<div class="mobile-menu-wrapper">
		<span class="mobile-menu-close"><i class="icon-cancel"></i></span>
		<nav class="mobile-nav">
			<ul class="mobile-menu">
				<li><a href="index-2.html">Home</a></li>
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

<!-- Country, State, City Dropdowms List -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//geodata.solutions/includes/countrystatecity.js"></script>

<!-- Main JS File -->
<script src="<?= base_url()?>assets/js/main.min.js"></script>
<script src="<?= base_url()?>assets/js/toastr.min.js"></script>
<script src="<?= base_url()?>assets/js/teemarket.js"></script>
</body>

</html>

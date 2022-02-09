<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Marketplace - teemarket</title>

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

</head>
<body>
<div class="page-wrapper">
	<?php include("home_header_view.php") ?>

	<main class="main">
		<div class="mt-6"></div><!-- margin -->
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<?php if (isset($allData)) { ?>
						<nav class="toolbox">
							<div class="toolbox-left">
								<div class="toolbox-item toolbox-sort">
									<label>Sort By:</label>
									<div class="select-custom">
										<select name="orderby" class="form-control">
											<option value="lowest" selected="selected">Lowest Price First</option>
											<option value="highest">Highest Price First</option>
										</select>
									</div><!-- End .select-custom -->

								</div><!-- End .toolbox-item -->
							</div><!-- End .toolbox-left -->
						</nav>
					<?php } ?>

					<div class="row row-sm product">
						<?php foreach ($allData as $key => $value) { ?>
						<div class="col-6 col-md-4" style="padding-right: 13px;padding-left: 13px;">
							<div class="product-default inner-quickview inner-icon">
								<figure>
									<a href="<?php echo base_url().$value['publicname'].'/'.$value['url']?>">
										<img id="image" src="<?php echo $value['image_link'];?>">
									</a>
								</figure>
								<div class="product-details text-center">
									<h2 class="product-title">
										<a href="<?php echo base_url().$value['publicname'].'/'.$value['url']?>"><?php echo $value['title']?></a>
									</h2>
									<div class="price-box">
										<span class="product-price" style="color: #fb8c00;font-weight: 400">$<?php echo number_format($value['price'],2);?></span>
									</div><!-- End .price-box -->
								</div><!-- End .product-details -->
							</div>
						</div><!-- End .col-xl-3 -->
						<?php } ?>
					</div>

					<?php if (isset($allData)) { ?>
						<nav class="toolbox toolbox-pagination">
							<ul class="pagination">
								<?php for( $i=0 ; $i<$countPage; $i++ ){ ?>
									<li class="page-item <?php if ($i == 0){echo 'active';}?>" onclick="getPage(this)"><a class="page-link"><?php echo $i+1; ?></a></li>
								<?php } ?>
							</ul>
						</nav>
					<?php } ?>
				</div><!-- End .col-lg-9 -->

				<aside class="sidebar-shop col-lg-3 order-lg-first">
					<div class="sidebar-wrapper">
						<div class="widget">
							<h3 class="widget-title">
								<a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1">Trend</a>
							</h3>

							<div class="collapse show" id="widget-body-1">
								<div class="widget-body">
									<?php foreach ($category as $key => $value) { ?>
										<input type="radio" id="<?php  echo $value['id'] ?>" class="category" name="category" value="<?php  echo $value['category']  ?>">
										<label for="<?php  echo $value['category']  ?>"><?php  echo ucfirst($value['category'])?></label><br>
									<?php } ?>
								</div><!-- End .widget-body -->
							</div><!-- End .collapse -->
						</div><!-- End .widget -->

					</div><!-- End .sidebar-wrapper -->
				</aside><!-- End .col-lg-3 -->
			</div><!-- End .row -->
		</div><!-- End .container -->

		<div class="mb-5"></div><!-- margin -->
	</main><!-- End .main -->

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
<script src="<?= base_url()?>assets/js/nouislider.min.js"></script>

<!-- Main JS File -->
<script src="<?= base_url()?>assets/js/main.min.js"></script>
<script src="<?= base_url()?>assets/js/teemarket.js"></script>
</body>

</html>

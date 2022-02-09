<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>teemarket - Setup New Campaign</title>

	<link rel="apple-touch-icon" href="<?= base_url()?>assets1/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?= base_url()?>assets1/images/favicon-teemarket.ico">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap-extend.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/site.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/seller.css?">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/design.css?">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/animsition/animsition.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/asscrollable/asScrollable.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/switchery/switchery.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/intro-js/introjs.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/slidepanel/slidePanel.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/flag-icon-css/flag-icon.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/waves/waves.minfd53.css?v4.0.1">

	<!-- Plugins For This Page -->
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/toastr/toastr.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/nprogress/nprogress.minfd53.css?v4.0.1">

	<!-- Page -->
	<link rel="stylesheet" href="<?= base_url()?>assets1/examples/css/advanced/animation.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/examples/css/advanced/toastr.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/examples/css/uikit/modals.minfd53.css?v4.0.1">

	<!--Cloudinary-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<!-- Fonts -->
	<link rel="stylesheet" href="<?= base_url()?>global/fonts/material-design/material-design.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/fonts/ionicons/ionicons.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/fonts/font-awesome/font-awesome.minfd53.css">
	<link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700">

	<!--[if lt IE 9]>
	<script src="<?= base_url()?>global/vendor/html5shiv/html5shiv.min.js?v4.0.1"></script>
	<![endif]-->

	<!--[if lt IE 10]>
	<script src="<?= base_url()?>global/vendor/media-match/media.match.min.js?v4.0.1"></script>
	<script src="<?= base_url()?>global/vendor/respond/respond.min.js?v4.0.1"></script>
	<![endif]-->

	<!-- Scripts -->
	<script src="<?= base_url()?>global/vendor/breakpoints/breakpoints.minfd53.js?v4.0.1"></script>
	<script>
		Breakpoints();
	</script>
</head>
<body class="animsition dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<?php include("seller_header_view.php") ?>

<div class="site-menubar site-menubar-light site-menubar-dark">
	<div class="site-menubar-body">
		<div>
			<div>
				<ul class="site-menu" data-plugin="menu">
					<li class="site-menu-item">
						<a class="_dashboard">
							<i class="site-menu-icon fa-dashboard" aria-hidden="true"></i>
							<span class="site-menu-title">DASHBOARD</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="campaigns">
							<i class="site-menu-icon ion-ios-shirt" aria-hidden="true"></i>
							<span class="site-menu-title">CAMPAIGNS</span>
						</a>
					</li>
					<li class="site-menu-item active">
						<a class="create-campaign">
							<i class="site-menu-icon fa-pencil-square" aria-hidden="true"></i>
							<span class="site-menu-title">CREATE</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="orders">
							<i class="site-menu-icon fa-shopping-cart" aria-hidden="true"></i>
							<span class="site-menu-title">ORDERS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="payouts">
							<i class="site-menu-icon fa-money" aria-hidden="true"></i>
							<span class="site-menu-title">PAYOUTS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="settings">
							<i class="site-menu-icon ion-md-settings" aria-hidden="true"></i>
							<span class="site-menu-title">SETTINGS</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Page -->
<div class="page">
	<div class="page-content container-fluid">
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-lg-12">
				<div class="panel-body container-fluid bg-white border">
				<!-- Example Default -->
				<div class="example-wrap">
					<div class="example">
						<div class="pearls row">
							<div class="pearl current col-4">
								<div class="pearl-icon"><i class="icon ion-ios-shirt" aria-hidden="true"></i></div>
								<span class="pearl-title">Design</span>
							</div>
							<div class="pearl col-4">
								<div class="pearl-icon"><i class="icon fa-tags" aria-hidden="true"></i></div>
								<span class="pearl-title">Pricing & Products</span>
							</div>
							<div class="pearl col-4">
								<div class="pearl-icon"><i class="icon fa-rocket" aria-hidden="true"></i></div>
								<span class="pearl-title">Launch</span>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<div class="box-upload mt-40">
									<h4>Upload Image</h4>
									<input id="file-upload" type="file">
									<div class="example">
										<?php if(!empty($_SESSION['campaign']['src_image'])){ ?>
											<button class="remove-image" style="cursor: pointer"><i class="icon ion-ios-trash"></i></button> Image
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div id="view-front" class="labView m-auto">
									<div class="product-design designer-style-front " style="background-color: rgb(252, 252, 252);">
										<img class="front-tshirt" src="<?= base_url() ?>global/portraits/mens-crew-front-new.png" alt="">
									</div>
									<div class="design-area design-area-front" style="height: 368px; width: 218px; left: 156px; top: 115px; z-index: 1; overflow: hidden;">
										<div class="image_design" style="width: 216px; height: 366px">
											<div class="result">
												<?php if(empty($_SESSION['campaign']['src_image'])){ ?>
												<img src="" id="img-preview"/>
												<?php }else { ?>
												<img id="img-preview" src="<?php echo $_SESSION['campaign']['src_image']?>">
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="dg-box profile-usermenu">
									<div class="product-info">
										<div class="form-group product-fields custom-form-group product-color-container">
											<label for="fields">Choose Product Color</label>
										</div>
										<div class="list-colors product-color-list" id="product-list-colors">
											<?php foreach ($colors as $key => $value) { ?>
											<span class="bg-colors <?php echo $value['color'] ?> <?php if (isset($_SESSION['campaign'])) {
												if($_SESSION['campaign']['color'][0] == $value['color_code']) {echo 'active';}
											} else {
												if($value['color_code'] == "rgb(252, 252, 252)") {echo 'active';}
											} ?>" onclick="activeColor(this)" onmouseover="hoverColor(this)" onmouseout="mouseOutColor(this)" style="background-color: <?php echo $value['color_code'] ?>;"></span>
											<?php } ?>
										</div>
										<div class="product-prices text-center">
											<div id="product-price">
												<h3 class="product-price-title">
													Base Cost
												</h3>
												<div class="clearfix">
													<div class="product-price-list">
														<span id="product-price-sale" class="text-success font-lg bold">
															<span class="price-sale-number">$7.50</span>
														</span>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-md next-step" style="background-color: #fb8c00; color: white">
												<i class="fa fa-arrow-right"></i> Next
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
				<!-- End Example Default -->
			</div>
		</div>
	</div>

</div>
<!-- End Page -->

<!--Modal Loading-->
<div class="modal fade modal-loading" aria-hidden="true" role="dialog" tabindex="-1">
	<div class="modal-box" style="position:fixed;top: 50%;left: 50%;z-index: 1700">
		<div class="loader loader-circle" style="border-left: .125em solid #fff;margin: unset;"></div>
		<div class="text-loading" style="color: #fff;float: right;position: relative;top: 9px;left: 10px;">LOADING...</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Invalid Image -->
<div class="modal fade modal-warning invalid-image" id="exampleModalWarning" aria-hidden="true"
	 aria-labelledby="exampleModalWarning" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<p>The File that you have selected isn't an allowed file format. <br> Allowed Formats - png, jpg, eps.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close-modal" data-dismiss="modal" style="width: 100%;background-color: #fb8c00;color: #fff">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Invalid Size Image -->
<div class="modal fade modal-warning invalid-size" id="exampleModalWarning" aria-hidden="true"
	 aria-labelledby="exampleModalWarning" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<p>	Images must be over 800px for quality prints, over 1000px is best</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close-modal" data-dismiss="modal" style="width: 100%;background-color: #fb8c00;color: #fff">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal Not Image -->
<div class="modal fade modal-warning not-image" id="exampleModalWarning" aria-hidden="true"
	 aria-labelledby="exampleModalWarning" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<p>Unfortunately, you can't sell a blank item. You need to add text or art before you can continue.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close-modal" data-dismiss="modal" style="width: 100%;background-color: #fb8c00;color: #fff">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<?php include("seller_footer_view.php") ?>

<!-- Core  -->
<script data-cfasync="false" src="<?= base_url()?>cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url()?>global/vendor/babel-external-helpers/babel-external-helpersfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/jquery/jquery.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/popper-js/umd/popper.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/bootstrap/bootstrap.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/animsition/animsition.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/mousewheel/jquery.mousewheel.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/asscrollbar/jquery-asScrollbar.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/asscrollable/jquery-asScrollable.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/ashoverscroll/jquery-asHoverScroll.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/waves/waves.minfd53.js?v4.0.1"></script>

<!-- Plugins -->
<script src="<?= base_url()?>global/vendor/switchery/switchery.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/intro-js/intro.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/screenfull/screenfull.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/slidepanel/jquery-slidePanel.minfd53.js?v4.0.1"></script>

<!-- Plugins For This Page -->
<script src="<?= base_url()?>global/vendor/toastr/toastr.minfd53.js?v4.0.1"></script>

<!-- Scripts -->
<script src="<?= base_url()?>global/js/State.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Component.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Base.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Config.minfd53.js?v4.0.1"></script>

<script src="<?= base_url()?>assets1/js/Section/Menubar.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/Section/Sidebar.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/Section/PageAside.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/Plugin/menu.minfd53.js?v4.0.1"></script>

<!-- Config -->
<script src="<?= base_url()?>global/js/config/colors.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/config/tour.minfd53.js?v4.0.1"></script>
<script>
	Config.set('<?= base_url()?>assets1', '<?= base_url()?>assets1');
</script>

<!-- Page -->
<script src="<?= base_url()?>assets1/js/Site.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/asscrollable.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/slidepanel.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/switchery.minfd53.js?v4.0.1"></script>

<script src="<?= base_url()?>global/js/Plugin/toastr.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/examples/js/pages/faq.minfd53.js?v4.0.1"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<!--nguyentai's js-->
<script src="<?= base_url()?>assets1/js/seller.js"></script>
<script src="<?= base_url()?>assets1/js/design.js"></script>

</body>

</html>

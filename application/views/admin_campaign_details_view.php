<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>teemarket Admin | Campaign Details</title>

	<link rel="apple-touch-icon" href="<?= base_url()?>assets1/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?= base_url()?>assets1/images/favicon-teemarket.ico">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap-extend.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/site.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/admin.css?">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/animsition/animsition.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/asscrollable/asScrollable.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/switchery/switchery.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/intro-js/introjs.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/slidepanel/slidePanel.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/flag-icon-css/flag-icon.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/waves/waves.minfd53.css?v4.0.1">

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
<body class="animsition">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<?php include("admin_header_view.php") ?>

<div class="site-menubar site-menubar-light">
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
					<li class="site-menu-item active">
						<a class="campaigns">
							<i class="site-menu-icon ion-ios-shirt" aria-hidden="true"></i>
							<span class="site-menu-title">CAMPAIGNS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="mockups">
							<i class="site-menu-icon md-palette" aria-hidden="true"></i>
							<span class="site-menu-title">MOCKUPS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="categories">
							<i class="site-menu-icon md-widgets" aria-hidden="true"></i>
							<span class="site-menu-title">CATEGORIES</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="orders">
							<i class="site-menu-icon fa-shopping-cart" aria-hidden="true"></i>
							<span class="site-menu-title">ORDERS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="users">
							<i class="site-menu-icon fa-users" aria-hidden="true"></i>
							<span class="site-menu-title">USERS</span>
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
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
			<div class="col-xl-8 col-md-6 col-sm-8">
				<!-- Pagination With Gap -->
				<div class="mt-20 mb-50">
					<ul class="pagination pagination-gap justify-content-center">
						<li class="page-item settings_payouts"><a class="page-link" href="#">Analytics</a></li>
						<li class="active page-item settings_account"><a class="page-link" href="campaign_details">Details</a></li>
						<li class="page-item settings_payment"><a class="page-link" href="#">Orders</a></li>
					</ul>
				</div>
				<!-- End Example Pagination With Gap -->
			</div>
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
		</div>

		<div class="mb-10"><div class="alert_message text-center">!--- Editing is Disabled ---!</div></div>
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-md-12 col-lg-12">
				<div class="panel-body container-fluid bg-white">
					<!-- Example Basic Form Without Label -->
					<div class="example-wrap">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="float-left">
									<button type="button" class="btn btn-dark back">
										<i class="fa fa-arrow-left"></i> Back
									</button>
								</div>
							</div>
						</div>
						<hr>
						<form>
							<span class="sr-only id"><?php echo $campaign[0]['id']; ?></span>
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="image" style="width: 534px;margin: auto">
										<img src="<?php echo $image_link; ?>" alt="" width="534px">
									</div>

								</div>

								<div class="col-md-6 col-lg-6">
									<div class="form-group required-field">
										<label style="color: #424242">URL</label>
										<div>
											<a href="<?= base_url() . $campaign[0]['publicname'] . '/' . $campaign[0]['url'] ?>" target="_blank" class="url" style="color: #fb8c00">
												<?= base_url() . $campaign[0]['publicname'] . '/' . $campaign[0]['url'] ?>
											</a>
										</div>
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label style="color: #424242">Design</label>
										<div>
											<a href="<?php echo $campaign[0]['design']; ?>" target="_blank" class="url" style="color: #fb8c00;word-break: break-all;">
												<?php echo $campaign[0]['design']; ?>
											</a>
										</div>
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label style="color: #424242">Title</label>
										<input type="text" class="form-control title" required maxlength="80" disabled value="<?php echo $campaign[0]['title']; ?>">
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label style="color: #424242">Price</label>
										<input type="text" class="form-control title" required maxlength="80" disabled value="<?php echo '$'.$campaign[0]['price']; ?>">
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label style="color: #424242">Description</label>
										<textarea class="border description" rows="7" disabled style="width: 100%" maxlength="300"><?php echo $campaign[0]['description']; ?></textarea>
									</div><!-- End .form-group -->

									<div class="form-group required-field">
										<label style="color: #424242">Category Your Campaign</label>
										<div class="select-custom">
											<select class="form-control" disabled title='Choose one of the following...' name="category">
												<option value="0" selected>Please Choose...</option>
												<?php foreach ($category as $key => $value) {
													if ($campaign[0]['id_category'] == $value['id']) { ?>
														<option value="<?php echo $value['id']; ?>" selected><?php echo strtoupper($value['category']); ?></option>
													<?php } else { ?>
														<option value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['category']); ?></option>
													<?php } ?>
												<?php } ?>
											</select>
										</div><!-- End .select-custom -->
									</div><!-- End .form-group -->

								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- End Example Basic Form Without Label -->
			</div>
		</div>

	</div>
</div>
<!-- End Page -->

<?php include("admin_footer_view.php") ?>

<!-- Core  -->
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

<script src="<?= base_url()?>assets1/examples/js/pages/faq.minfd53.js?v4.0.1"></script>

<!--nguyentai's js-->
<script src="<?= base_url()?>assets1/js/admin.js"></script>

</body>

</html>

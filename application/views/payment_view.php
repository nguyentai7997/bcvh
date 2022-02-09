<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>teemarket - Payment</title>

	<link rel="apple-touch-icon" href="<?= base_url()?>assets1/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?= base_url()?>assets1/images/favicon-teemarket.ico">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap-extend.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/site.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/seller.css?">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/animsition/animsition.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/asscrollable/asScrollable.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/switchery/switchery.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/intro-js/introjs.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/slidepanel/slidePanel.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/flag-icon-css/flag-icon.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/waves/waves.minfd53.css?v4.0.1">

	<!-- Plugins For This Page -->
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/jquery-wizard/jquery-wizard.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/formvalidation/formValidation.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/toastr.min.css">

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
					<li class="site-menu-item">
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
					<li class="site-menu-item active">
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
<div class="page" style="min-height: 600px">
	<div class="page-content container-fluid">
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
			<div class="col-xl-8 col-md-6 col-sm-8">
				<!-- Pagination With Gap -->
				<div class="mt-20 mb-50">
					<ul class="pagination pagination-gap justify-content-center">
						<li class="page-item settings_account"><a class="page-link" href="account">Account</a></li>
						<li class="active page-item settings_payment"><a class="page-link" href="payment">Payment</a></li>
						<li class="page-item settings_payouts"><a class="page-link" href="payouts">Payouts</a></li>
					</ul>

				</div>
				<!-- End Example Pagination With Gap -->
			</div>
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
		</div>
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
				<div class="panel-body container-fluid bg-white border">
					<!-- Example Basic Form Without Label -->
					<div class="example-wrap">
						<h3 class="example-title">Payment Settings</h3>
						<div class="example">
							<!-- Example Wizard Accordion -->
							<div class="mb-30">
								<div class="panel-group" id="exampleWizardAccordion" aria-multiselectable="true"
									 role="tablist">
									<div class="panel border">
										<div class="panel-heading" id="exampleHeading1" role="tab">
											<a class="panel-title" data-toggle="collapse" href="#exampleCollapse1" data-parent="#exampleWizardAccordion"
											   aria-expanded="false" aria-controls="exampleCollapse1">
												<table border="0" cellpadding="10" cellspacing="0" >
													<tr>
														<td align="center">
															<a href="#" title="How PayPal Works">
																<img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo">
															</a>
														</td>
													</tr>
												</table>
											</a>
										</div>
										<div class="panel-collapse collapse show" id="exampleCollapse1" aria-labelledby="exampleHeading1"
											 role="tabpanel">
											<div class="panel-body">
												<form class="mt-25">
													<div class="form-group required-field">
														<div class="input-group input-group-icon">
															<span class="input-group-addon">
															  <span class="icon md-email" aria-hidden="true"></span>
															</span>
															<input type="text" class="form-control paypal" placeholder="Email"
																   value="<?php if (!empty($payment[0]['paypal'])){ echo $payment[0]['paypal']; }?>">
														</div>
														<div class="error paypal-invalid">The email field must be a valid email.</div>
													</div>
													<div class="form-group float-right">
														<button type="button" class="btn btn-primary save">
															<i class="icon fa-save"></i>Save
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="panel border">
										<div class="panel-heading" id="exampleHeading2" role="tab">
											<a class="panel-title" data-toggle="collapse" href="#exampleCollapse2"
											   data-parent="#exampleWizardAccordion" aria-expanded="false" aria-controls="exampleCollapse2">
												<table border="0" cellpadding="10" cellspacing="0" >
													<tr>
														<td align="center">
															<a href="#" title="How PayPal Works">
																<img src="<?= base_url()?>assets1/images/payoneer.png" border="0" alt="Payoneer Logo">
															</a>
														</td>
													</tr>
												</table>
											</a>
										</div>
										<div class="panel-collapse collapse" id="exampleCollapse2" aria-labelledby="exampleHeading2"
											 role="tabpanel">
											<div class="panel-body">
												<form class="mt-25">
													<div class="form-group required-field">
														<div class="input-group input-group-icon">
															<span class="input-group-addon">
															  <span class="icon md-email" aria-hidden="true"></span>
															</span>
															<input type="text" class="form-control payoneer" placeholder="Email"
																   value="<?php if (!empty($payment[0]['payoneer'])){ echo $payment[0]['payoneer']; }?>">
														</div>
														<div class="error payoneer-invalid">The email field must be a valid email.</div>
													</div>
													<div class="form-group float-right">
														<button type="button" class="btn btn-primary save">
															<i class="icon fa-save"></i>Save
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Example Wizard Accordion -->
			</div>
		</div>

	</div>
</div>
<!-- End Page -->

<?php include("seller_footer_view.php") ?>

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

<!-- Plugins For This Page -->
<script src="<?= base_url()?>global/vendor/formvalidation/formValidation.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/formvalidation/framework/bootstrap.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/matchheight/jquery.matchHeight-minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/jquery-wizard/jquery-wizard.minfd53.js?v4.0.1"></script>

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

<script src="<?= base_url()?>global/js/Plugin/jquery-wizard.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/matchheight.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/input-group-file.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/examples/js/pages/faq.minfd53.js?v4.0.1"></script>

<script src="<?= base_url()?>assets/js/toastr.min.js"></script>

<!--nguyentai's js-->
<script src="<?= base_url()?>assets1/js/seller.js"></script>
<script src="<?= base_url()?>assets1/js/payment.js"></script>

</body>

</html>

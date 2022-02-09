<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>teemarket - Account</title>

	<link rel="apple-touch-icon" href="<?= base_url()?>assets1/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?= base_url()?>assets1/images/favicon-teemarket.ico">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap-extend.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/site.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/seller.css">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/account.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/animsition/animsition.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/asscrollable/asScrollable.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/switchery/switchery.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/intro-js/introjs.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/slidepanel/slidePanel.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/flag-icon-css/flag-icon.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/waves/waves.minfd53.css?v4.0.1">

	<!-- Page -->
	<link rel="stylesheet" href="<?= base_url()?>assets1/examples/css/uikit/modals.minfd53.css?v4.0.1">
	<!-- Thu vien thong bao -->
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
<body class="animsition site-menubar-unfold">
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
<div class="page">
	<div class="page-content container-fluid">
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
			<div class="col-xl-8 col-md-6 col-sm-8">
				<!-- Pagination With Gap -->
				<div class="mt-20 mb-50">
					<ul class="pagination pagination-gap justify-content-center">
						<li class="active page-item settings_account"><a class="page-link" href="account">Account</a></li>
						<li class="page-item settings_payment"><a class="page-link" href="payment">Payment</a></li>
						<li class="page-item settings_payouts"><a class="page-link" href="payouts">Payouts</a></li>
					</ul>

				</div>
				<!-- End Example Pagination With Gap -->
			</div>
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
		</div>
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-md-8 col-lg-8">
				<div class="panel-body container-fluid bg-white">
					<!-- Example Basic Form Without Label -->
					<div class="example-wrap">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<h3 class="example-title">INFORMATION</h3>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="float-right">
									<button type="button" class="btn btn-primary save-info">
										<i class="icon fa-save"></i> Save
									</button>
								</div>
							</div>
						</div>
						<hr>
						<div class="example">
							<form>
								<div class="form-group required-field">
									<label style="color: #424242">Email</label>
									<input type="text" class="form-control email" placeholder="Email" value="<?php echo $info[0]['email'] ?>" disabled>
								</div><!-- End .form-group -->
								<div class="form-group required-field">
									<label style="color: #424242">Public Name</label>
									<input type="text" class="form-control publicname" placeholder="Public Name" value="<?php echo $info[0]['publicname'] ?>">
									<div class="error pn-required">The public name field is required.</div>
									<div class="error pn-error">Public name is already taken.</div>
									<div class="error pn-invalid">The public name field must be a valid public name.</div>
								</div><!-- End .form-group -->
								<div class="form-group required-field">
									<label style="color: #424242">Full Name</label>
									<input type="text" class="form-control fullname" placeholder="Full Name" value="<?php echo $info[0]['fullname'] ?>">
									<div class="error fn-required">The full name field is required.</div>
								</div>
								<div class="form-group required-field">
									<label style="color: #424242">Address</label>
									<input type="text" class="form-control address" name="address" placeholder="Address" value="<?php echo $info[0]['address'] ?>">
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-4">
											<label style="color: #424242">Country</label>
											<div class="select-custom">
												<select name="" class="countries form-control" id="countryId">
													<option value="<?php echo $info[0]['country'] ?>">
														<?php if($info[0]['country'] == "") { echo "Select Country"; } else{ echo $info[0]['country']; } ?>
													</option>
												</select>
											</div><!-- End .select-custom -->
										</div>
										<div class="col-4">
											<label style="color: #424242">State / Province</label>
											<div class="select-custom">
												<select name="state" class="states form-control" id="stateId">
													<option value="<?php echo $info[0]['state'] ?>">
														<?php if($info[0]['state'] == "") { echo "Select State"; } else{ echo $info[0]['state']; } ?>
													</option>
												</select>
											</div><!-- End .select-custom -->
										</div>
										<div class="col-4">
											<label style="color: #424242">City / Town</label>
											<div class="select-custom">
												<select name="city" class="cities form-control" id="cityId">
													<option value="<?php echo $info[0]['city'] ?>">
														<?php if($info[0]['city'] == "") { echo "Select City"; } else{ echo $info[0]['city']; } ?>
													</option>
												</select>
											</div><!-- End .select-custom -->
										</div>
									</div>
								</div><!-- End .form-group -->
								<div class="row">
									<div class="form-group required-field col-md-4">
										<label style="color: #424242">ZIP / Postal Code</label>
										<input type="text" class="form-control zip" placeholder="ZIP / Postal Code" value="<?php echo $info[0]['zip'] ?>">
									</div>
									<div class="form-group required-field col-md-8">
										<label style="color: #424242">Phone Number</label>
										<input type="text" class="form-control phone" placeholder="Phone Number"value="<?php echo $info[0]['phone'] ?>">
									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- End Example Basic Form Without Label -->
				</div>
			</div>
			<div class="col-md-4 col-lg-4">
				<div class="panel-body container-fluid bg-white">
					<!-- Example Basic Form Without Label -->
					<div class="example-wrap">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<h3 class="example-title">PASSWORD</h3>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="float-right">
									<button type="button" class="btn btn-primary change-password">
										<i class="icon fa-save"></i> Save
									</button>
								</div>
							</div>
						</div>
						<hr>
						<div class="example">
							<form>
								<div class="form-group required-field">
									<label style="color: #424242">Current Password</label>
									<input type="password" class="form-control" id="current-pass" placeholder="Current Password" autocomplete="off" />
									<div class="error current-pass-required">The password field is required.</div>
								</div>
								<div class="form-group required-field">
									<label style="color: #424242">New Password</label>
									<input type="password" class="form-control" id="new-pass" placeholder="New Password" autocomplete="off" />
									<div class="error new-pass-required">The new password field is required.</div>
									<div class="error new-pass-error">The password field must contain 8 characters including at least one number and at least one alphabetic character.</div>
								</div>
								<div class="form-group required-field">
									<label style="color: #424242">Confirm New Passwor</label>
									<input type="password" class="form-control" id="cf-pass" placeholder="Confirm New Password" autocomplete="off" />
									<div class="error cf-pass-required">The password field is required.</div>
									<div class="error cf-pass-error">The password confirmation does not match.</div>
								</div>
							</form>
						</div>
					</div>
					<!-- End Example Basic Form Without Label -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Page -->

<!-- Modal -->
<div class="modal fade modal-success" id="exampleModalSuccess" aria-hidden="true"
	 aria-labelledby="exampleModalSuccess" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Success</h4>
			</div>
			<div class="modal-body">
				<p>You have successfully changed your password</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

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
<script src="<?= base_url()?>assets/js/toastr.min.js"></script>
<!-- Country, State, City Dropdowms List -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
<!--nguyentai's js-->
<script src="<?= base_url()?>assets1/js/seller.js"></script>
<script src="<?= base_url()?>assets1/js/account.js"></script>

</body>

</html>

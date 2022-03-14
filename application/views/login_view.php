<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vietlott</title>
	<link rel="icon" href="<?= base_url()?>assets/images/vietlott_icon.png">
	<!-- Page -->
	<link href="<?= base_url()?>assets/css/login-v3.minfd53.css?v4.0.1" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/site.minfd53.css?v4.0.1" rel="stylesheet" type="text/css">

	<link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/bootstrap-extend.minfd53.css?v4.0.1" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	<!-- Thu vien thong bao -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/toastr.min.css">
	<script src="<?= base_url()?>assets/js/toastr.min.js"></script>

	<!-- NguyenTai's js -->
	<script type="text/javascript" src="<?= base_url()?>assets/js/login.js"></script>

	<style>
		.error{
			color: #f23f01;
			display: none;
		}
	</style>
</head>

<body class="animsition page-login-v3 layout-full">

<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out" style="background-color: #cacaca">
	<div class="page-content vertical-align-middle">
		<div class="panel">
			<div class="panel-body">
				<div class="brand">
					<img class="brand-img" src="<?= base_url()?>assets/images/vietlott_logo_white.jpg" alt="..." style="width: 250px">
				</div>
				<form>
					<div class="form-group form-material" data-plugin="formMaterial">
						<input type="text" class="form-control" id="usernameSignIn"/>
						<div class="text-left error username-required">Tên đăng nhập là bắt buộc.</div>
						<label class="floating-label">Tên đăng nhập</label>
					</div>
					<div class="form-group form-material" data-plugin="formMaterial">
						<input type="password" class="form-control" id="passwordSignIn"/>
						<div class="text-left error password-required">Mật khẩu là bắt buộc.</div>
						<label class="floating-label">Mật khẩu</label>
					</div>

					<button type="button" class="btn btn-primary btn-block btn-lg mt-40 signin" style="background-color: #fc000d;border-color: #fc000d">Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Page -->

</body>

</html>

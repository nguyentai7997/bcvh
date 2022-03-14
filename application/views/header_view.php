<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<ul class="nav navbar-nav navbar-left-custom">
				<li class="user dropdown">
					<a><img src="<?= base_url()?>assets/images/vietlott_logo.png" alt=""></a>
				</li>
			</ul>
		</div>
		<ul class="nav navbar-nav navbar-right collapse" id="navbar-right">
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?= base_url()?>assets/images/demo/users/face6.png" alt="">
					<span><?php echo $_SESSION['user']['username']; ?></span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu">
					<li><a class="logout"><i class="fa fa-mail-forward"></i> Đăng xuất</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- /navbar -->

<!-- Page header -->
<div class="container-fluid">
	<div class="page-header"></div>
</div>
<!-- /page header -->

<header class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-right">
				<div class="header-dropdown dropdown-expanded">
					<a href="#">Links</a>
					<div class="header-menu">
						<ul>
							<?php if (empty($_SESSION['user']) && empty($_SESSION['admin'])) {?>
							<li><a href="<?= base_url()?>register">SIGN UP</a></li>
							<li><a href="<?= base_url()?>login">SIGN IN</a></li>
							<?php } else if (isset($_SESSION['user'])) { ?>
							<li><a href="<?= base_url()?>seller/dashboard">DASHBOARD</a></li>
							<li><a href="<?= base_url()?>seller/logout">SIGN OUT</a></li>
							<?php } else if (isset($_SESSION['admin'])) {?>
							<li><a href="<?= base_url()?>admin/dashboard">DASHBOARD</a></li>
							<li><a href="<?= base_url()?>admin/logout">SIGN OUT</a></li>
							<?php } ?>
						</ul>
					</div><!-- End .header-menu -->
				</div><!-- End .header-dropown -->
			</div><!-- End .header-right -->
		</div><!-- End .container -->
	</div><!-- End .header-top -->

	<div class="header-middle sticky-header" style="border-bottom: 1px solid #eee;">
		<div class="container">
			<div class="header-left">

				<div class="header-search">
					<a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
					<div class="header-search-wrapper">
						<form>
							<input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
							<button class="btn search" type="button"><i class="icon-search"></i></button>
						</form>
					</div><!-- End .header-search-wrapper -->
				</div><!-- End .header-search -->
			</div><!-- End .header-left -->

			<div class="header-center">
				<a href="<?= base_url()?>" class="logo">
					<img src="<?= base_url()?>assets/images/teemarket.png" alt="Porto Logo">
				</a>
			</div><!-- End .headeer-center -->

			<div class="header-right">
				<div class="header-dropdowns" style="padding-right: 10px">
					<div class="header-dropdown">
						<a>SHOP BY</a>
						<div class="header-menu">
							<ul>
								<?php foreach ($category as $key => $value) { ?>
									<li><a href="<?= base_url()?>marketplace/category/<?php echo $value['category'] ?>"><?php echo $value['category'] ?></a></li>
								<?php } ?>
							</ul>
						</div><!-- End .header-menu -->
					</div><!-- End .header-dropown -->
				</div><!-- End .header-dropdowns -->
				<div class="dropdown cart-dropdown">
					<a href="<?= base_url() ?>cart" class="dropdown-toggle">
                        <span class="cart-count"><?php if(isset($_SESSION['product'])){echo count($_SESSION['product']);} else {echo "0";} ?></span>
					</a>
				</div>
				<!-- End .dropdown -->
			</div><!-- End .header-right -->
		</div><!-- End .container -->
	</div><!-- End .header-middle -->
</header><!-- End .header -->

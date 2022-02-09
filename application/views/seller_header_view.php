<nav class="site-navbar navbar navbar-default navbar-inverse navbar-fixed-top navbar-mega bg-orange-600" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
				data-toggle="menubar">
			<span class="sr-only">Toggle navigation</span>
			<span class="hamburger-bar"></span>
		</button>
		<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
				data-toggle="collapse">
			<a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
			   data-animation="scale-up" role="button">
				<span class="avatar avatar-online">
					<img src="<?= base_url()?>global/portraits/avatar.jpg" alt="...">
					<i></i>
				</span>
			</a>
			<div class="dropdown-menu" role="menu">
				<a class="dropdown-item"> <?php echo $_SESSION['user']['fullname']; ?> <br> <?php echo $_SESSION['user']['email']; ?> </a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item logout" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
			</div>
		</button>
		<div class="navbar-brand navbar-brand-center">
			<img class="navbar-brand-logo" src="<?= base_url()?>assets1/images/logoteemarket.png" title="teemarket">
			<span class="navbar-brand-text hidden-xs-down"> teemarket</span>
		</div>
	</div>

	<div class="navbar-container container-fluid">
		<!-- Navbar Collapse -->
		<div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
			<!-- Navbar Toolbar -->
			<ul class="nav navbar-toolbar">
				<li class="nav-item hidden-float" id="toggleMenubar">
					<a class="nav-link" data-toggle="menubar" role="button">
						<i class="icon hamburger hamburger-arrow-left">
							<span class="sr-only">Toggle menubar</span>
							<span class="hamburger-bar"></span>
						</i>
					</a>
				</li>
			</ul>
			<!-- End Navbar Toolbar -->

			<!-- Navbar Toolbar Right -->
			<ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link navbar-avatar" data-toggle="dropdown" aria-expanded="false"
					   data-animation="scale-up" role="button">
					  	<span class="avatar avatar-online">
							<img src="<?= base_url()?>global/portraits/avatar.jpg" alt="...">
							<i></i>
					  	</span>
					</a>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item"> <?php echo $_SESSION['user']['fullname']; ?> <br> <?php echo $_SESSION['user']['email']; ?> </a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item logout" role="menuitem"><i class="icon fa-power-off" aria-hidden="true"></i> Logout</a>
					</div>
				</li>
				<?php if (isset($_SESSION['admin'])) { ?>
				<li class="nav-item dropdown">
					<a class="nav-link admin" data-toggle="dropdown" title="Notifications"
					   aria-expanded="false" data-animation="scale-up" role="button">
						<i class="icon fa-exchange" aria-hidden="true"></i>
					</a>
				</li>
				<?php } ?>
			</ul>
			<!-- End Navbar Toolbar Right -->
		</div>
		<!-- End Navbar Collapse -->
	</div>
</nav>

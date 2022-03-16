<!-- Sidebar -->
<div class="sidebar collapse">
	<ul class="navigation">
		<?php if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2){ ?>
			<li class="<?php if ($_SERVER['REQUEST_URI'] == '/bcvh/dashboard'){echo 'active';}?>">
				<a href="<?= base_url()?>"><i class="fa fa-calendar"></i> Tổng quan</a>
			</li>
			<li class="<?php if (($_SERVER['REQUEST_URI'] == '/bcvh/problem') || ($_SERVER['REQUEST_URI'] == '/bcvh/addProblem') || ($_SERVER['REQUEST_URI'] == '/bcvh/search_result') || (strpos($_SERVER['REQUEST_URI'], '/bcvh/editProlem')!== false) ){echo 'active';}?>">
				<a href="<?= base_url()?>problem"><i class="fa fa-table"></i> Sự cố</a>
			</li>
			<li class="<?php if ($_SERVER['REQUEST_URI'] == '/bcvh/report'){echo 'active';}?>">
				<a href="<?= base_url()?>report"><i class="fa fa-file-text"></i> Báo cáo tổng hợp</a>
			</li>
			<li class="<?php if ($_SERVER['REQUEST_URI'] == '/bcvh/bgt_report'){echo 'active';}?>">
				<a href="<?= base_url()?>bgt_report"><i class="fa fa-file"></i> Báo cáo BGT</a>
			</li>
<!--			--><?php //if ($_SESSION['user']['role'] == 1){ ?>
<!--				<li class="--><?php //if ($_SERVER['REQUEST_URI'] == '/bcvh/user'){echo 'active';}?><!--">-->
<!--					<a href="--><?//= base_url()?><!--user"><i class="fa fa fa-user"></i> Người dùng</a>-->
<!--				</li>-->
<!--			--><?php //} ; ?>
		<?php } else { ?>
			<li class="<?php if ($_SERVER['REQUEST_URI'] == '/bcvh/dashboard'){echo 'active';}?>">
				<a href="<?= base_url()?>"><i class="fa fa-calendar"></i> Tổng quan</a>
			</li>
			<li class="<?php if ($_SERVER['REQUEST_URI'] == '/bcvh/problem'){echo 'active';}?>">
				<a href="<?= base_url()?>problem"><i class="fa fa-table"></i> Sự cố</a>
			</li>
		<?php } ; ?>
	</ul>
</div>
<!-- /sidebar -->

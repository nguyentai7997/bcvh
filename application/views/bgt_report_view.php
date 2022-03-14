<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vietlott</title>
	<link rel="icon" href="<?= base_url()?>assets/images/vietlott_icon.png">

	<link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/brain-theme.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
	<link href="<?= base_url()?>assets/css/main.css" rel="stylesheet" type="text/css">
	<!--	Nguyen Tai' css-->
	<link href="<?= base_url()?>assets/css/customize.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/inputmask.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/autosize.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/inputlimit.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/listbox.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/tags.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/uploader/plupload.full.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/uploader/plupload.queue.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/forms/wysihtml5/toolbar.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/prettify.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/fancybox.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/colorpicker.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/timepicker.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/fullcalendar.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/plugins/interface/collapsible.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/js/application.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets/js/main.js"></script>
	<!--	NguyenTai's js-->
	<script type="text/javascript" src="<?= base_url()?>assets/js/bcvh.js"></script>

	<style>

		body {
			margin: 40px 10px;
			padding: 0;
			font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
			font-size: 14px;
		}

	</style>
</head>

<body>

<?php include("header_view.php") ?>

<!-- Page container -->
<div class="page-container container-fluid">

	<?php include("sidebar_view.php") ?>

	<!-- Page content -->
	<div class="page-content">

		<!-- Page title -->
		<div class="page-title">
			<h5><i class="fa fa-file-text"></i> Báo cáo tổng hợp</h5>
		</div>
		<!-- /page title -->

		<!-- Basic inputs -->
		<div class="panel panel-default">
			<div class="panel-body">
				<?php if ($_SESSION['user']['role'] == 1){ ?>
					<!-- Form components -->
					<form class="form-horizontal" role="form" action="<?= base_url()?>uploadBGTReport" enctype="multipart/form-data" method="post">
						<div class="form-group">
							<div class="col-sm-4">
								<input type="file" id="unstyled-file" name="file">
							</div>
							<div class="col-sm-2">
								<input type="submit" name="submit" value="Upload">
							</div>
						</div>
					</form>
					<!-- /form components -->
				<?php } ?>
				<ul class="icons-list">
					<li><a data-toggle="collapse" data-target="#collapsible-submenu"><i class="fa fa-folder-open" style="margin-top: 2px"></i> Năm 2022</a>
						<ul id="collapsible-submenu" class="collapse in">
							<?php foreach ($report as $key => $value) { ?>
								<li><a href="<?= base_url().'reports/'.$value['filename']?>" target="_blank"><?= $value['filename'] ?></a></li>
							<?php } ?>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- /basic inputs -->

		<?php include("footer_view.php") ?>

	</div>
</div>

</body>

</html>

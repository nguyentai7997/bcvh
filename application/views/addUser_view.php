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
	<!--	Nguyen Tai css-->
	<link href="<?= base_url()?>assets/css/customize.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/plugins/charts/flot.js"></script>-->
	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/plugins/charts/flot.orderbars.js"></script>-->
	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/plugins/charts/flot.pie.js"></script>-->
	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/plugins/charts/flot.time.js"></script>-->
	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/plugins/charts/flot.animator.min.js"></script>-->
	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/plugins/charts/excanvas.min.js"></script>-->
	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/plugins/charts/flot.resize.min.js"></script>-->

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

	<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/js/charts/simple_graph.js"></script>-->
	<!--	NguyenTai's js-->
	<script type="text/javascript" src="<?= base_url()?>assets/js/main.js"></script>

	<style>

		body {
			margin: 40px 10px;
			padding: 0;
			font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
			font-size: 14px;
		}

		#calendar {
			max-width: 1100px;
			margin: 0 auto;
		}

	</style>
</head>

<body>

<?php include("header_view.php") ?>

<!-- Page container -->
<div class="page-container container-fluid">
	<!-- Sidebar -->
	<div class="sidebar collapse">
		<ul class="navigation">
			<li class=""><a href="<?= base_url()?>"><i class="fa fa-laptop"></i> Bảng điều khiển</a></li>
			<li class=""><a href="<?= base_url()?>problem"><i class="fa fa-table"></i> Danh sách sự cố</a></li>
			<li class="active"><a href="<?= base_url()?>user"><i class="fa fa fa-tasks"></i> Phân quyền</a></li>
		</ul>
	</div>
	<!-- /sidebar -->

	<!-- Page content -->
	<div class="page-content">

		<!-- Page title -->
		<div class="page-title">
			<h5><i class="fa fa-plus"></i> Thêm mới người dùng</h5>
		</div>
		<!-- /page title -->

		<!-- Form components -->
		<form class="form-horizontal" role="form" action="#">

			<!-- Basic inputs -->
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="form-group">
						<label class="col-sm-3 control-label">Username: </label>
						<div class="col-sm-9">
							<input type="text" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Password: </label>
						<div class="col-sm-9">
							<input type="password" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Quản lý phần mềm: </label>
						<div class="col-sm-9">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled" checked="checked">
									Báo cáo thông minh
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled">
									Cổng thông tin điện tử
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled">
									Hỗ trợ kinh doanh
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled">
									Quản trị doanh nghiệp
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled">
									Quản trị nhân sự
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled">
									Trang thiết bị
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled">
									Văn phòng điện tử
								</label>
							</div>

						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Xem toàn bộ báo cáo: </label>
						<div class="col-sm-9">
							<label class="radio-inline">
								<input type="radio" name="inline-radio" class="styled">
								Có
							</label>
							<label class="radio-inline">
								<input type="radio" name="inline-radio" class="styled" checked="checked">
								Không
							</label>
						</div>
					</div>

					<div class="form-actions text-right">
						<button type="submit" class="btn btn-danger">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>

				</div>
			</div>
			<!-- /basic inputs -->

		</form>
		<!-- /form components -->

		<!-- Footer -->
		<?php include("footer_view.php") ?>
		<!-- /footer -->

	</div>
</div>

</body>

</html>

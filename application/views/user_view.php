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

	<?php include("sidebar_view.php") ?>

	<!-- Page content -->
	<div class="page-content">

		<!-- Page title -->
		<div class="page-title">
			<h5><i class="fa fa-table"></i> Danh sách người dùng</h5>
		</div>
		<!-- /page title -->

		<!-- Basic inputs -->
		<div class="panel panel-default">
			<div class="panel-body">
				<a class="btn btn-primary" href="addUser" style="color: white; float: right"> Thêm người dùng</a>
			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>STT</th>
						<th>Tên người dùng</th>
						<th style="width: 50%">Phân quyền</th>
						<th class="text-center">Chức năng</th>
					</tr>
					</thead>
					<tbody>
<!--					<tr>-->
<!--						<td>3</td>-->
<!--						<td>Văn phòng điện tử</td>-->
<!--						<td>Đề nghị các Cán bộ nhân viên tại Trụ sở Chính khi nhận hóa đơn, hồ sơ thanh toán tra lại danh mục của hàng hóa dịch vụ đã mua với các mã ngành nghề không được giảm thuế Giá trị gia tăng tại các Phụ lục ban hành Theo Nghị định số 15/2022/NĐ-CP để thực hiện xuất hóa đơn theo đúng quy định.</td>-->
<!--						<td>-->
<!--							<div class="table-controls">-->
<!--								<a href="#" class="btn btn-success btn-icon btn-xs tip" title="Sửa"><i class="fa fa-pencil"></i></a>-->
<!--								<a href="#" class="btn btn-danger btn-icon btn-xs tip" title="Xoá"><i class="fa fa-trash-o"></i></a>-->
<!--							</div>-->
<!--						</td>-->
<!--					</tr>-->
					<tr>
						<td>2</td>
						<td>phamngocquang</td>
						<td>
							<select class="select select-disabled" multiple="multiple" tabindex="2">
								<option selected="selected">Văn phòng điện tử</option>
								<option selected="selected">Hỗ trợ kinh doanh</option>
								<option selected="selected">Quản trị nhân sự</option>
							</select>
						</td>
						<td>
							<div class="table-controls">
								<a href="#" class="btn btn-success btn-icon btn-xs tip" title="Print"><i class="fa fa-link"></i></a>
								<a href="#" class="btn btn-danger btn-icon btn-xs tip" title="Export"><i class="fa fa-inbox"></i></a>
							</div>
						</td>
					</tr>
					<tr>
						<td>3</td>
						<td>nguyenthephong</td>
						<td>
							<select class="select select-disabled" multiple="multiple" tabindex="2">
								<option selected="selected">ERP</option>
								<option selected="selected">Quản trị doanh nghiệp FAST</option>
								<option selected="selected">Cổng thông tin Vietlott</option>
								<option selected="selected">Báo cáo thông minh</option>
							</select>
						</td>
						<td>
							<div class="table-controls">
								<a href="#" class="btn btn-success btn-icon btn-xs tip" title="Print"><i class="fa fa-link"></i></a>
								<a href="#" class="btn btn-danger btn-icon btn-xs tip" title="Export"><i class="fa fa-inbox"></i></a>
							</div>
						</td>
					</tr>
					</tbody>
				</table>
				<div class="table-footer">

					<ul class="pagination">
						<li><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li class="active"><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">Next</a></li>
					</ul>
				</div>
			</div>
			<!-- /basic inputs -->
		</div>

		<!-- Footer -->
		<?php include("footer_view.php") ?>
		<!-- /footer -->

	</div>
</div>

</body>

</html>

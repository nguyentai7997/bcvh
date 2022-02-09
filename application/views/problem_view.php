<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vietlott</title>
	<link rel="icon" href="<?= base_url()?>assets2/images/vietlott_icon.png">

	<link href="<?= base_url()?>assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets2/css/brain-theme.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets2/css/styles.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets2/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
	<link href="<?= base_url()?>assets2/css/main.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url()?>assets2/css/customize.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="<?= base_url()?>assets2/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/charts/flot.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/charts/flot.orderbars.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/charts/flot.pie.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/charts/flot.time.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/charts/flot.animator.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/charts/excanvas.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/charts/flot.resize.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/uniform.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/select2.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/inputmask.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/autosize.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/inputlimit.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/listbox.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/multiselect.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/validate.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/tags.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/uploader/plupload.full.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/uploader/plupload.queue.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/forms/wysihtml5/toolbar.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/jgrowl.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/datatables.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/prettify.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/fancybox.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/colorpicker.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/timepicker.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/fullcalendar.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/plugins/interface/collapsible.min.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/application.js"></script>

	<script type="text/javascript" src="<?= base_url()?>assets2/js/charts/simple_graph.js"></script>
<!--	NguyenTai's js-->
	<script type="text/javascript" src="<?= base_url()?>assets2/js/main.js"></script>

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
			<li class=""><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-laptop"></i> Bảng điều khiển</a></li>
			<li class="active"><a href="<?= base_url()?>admin/problem"><i class="fa fa-table"></i> Danh sách sự cố</a></li>
			<li class=""><a href="<?= base_url()?>admin/user"><i class="fa fa fa-tasks"></i> Phân quyền</a></li>
		</ul>
	</div>
	<!-- /sidebar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Page title -->
		<div class="page-title">
			<h5><i class="fa fa-table"></i> Danh sách sự cố </h5>
			<div class="btn-group">
				<a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">One more line</a></li>
				</ul>
			</div>
		</div>
		<!-- /page title -->

		<!-- Datatable with custom sortable columns -->
		<div class="panel panel-default">
			<div class="panel-heading"><h6 class="panel-title"><i class="icon-table"></i> Custom columns sorting</h6></div>
			<div class="datatable-custom-sort">
				<table class="table">
					<thead>
					<tr>
						<th>Phần mềm</th>
						<th>Nội dung sự cố</th>
						<th>Thời gian</th>
						<th>Trạng thái</th>
						<th>Dẫn chứng</th>
						<th>Công cụ</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>1</td>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /datatable with custom sortable columns -->

		<?php include("footer_view.php") ?>

	</div>
</div>

</body>

</html>

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
			<h5><i class="fa fa-table"></i> Danh s??ch ng?????i d??ng</h5>
		</div>
		<!-- /page title -->

		<!-- Basic inputs -->
		<div class="panel panel-default">
			<div class="panel-body">
				<a class="btn btn-primary" href="addUser" style="color: white; float: right"> Th??m ng?????i d??ng</a>
			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>STT</th>
						<th>T??n ng?????i d??ng</th>
						<th style="width: 50%">Ph??n quy???n</th>
						<th class="text-center">Ch???c n??ng</th>
					</tr>
					</thead>
					<tbody>
<!--					<tr>-->
<!--						<td>3</td>-->
<!--						<td>V??n ph??ng ??i???n t???</td>-->
<!--						<td>????? ngh??? c??c C??n b??? nh??n vi??n t???i Tr??? s??? Ch??nh khi nh???n h??a ????n, h??? s?? thanh to??n tra l???i danh m???c c???a h??ng h??a d???ch v??? ???? mua v???i c??c m?? ng??nh ngh??? kh??ng ???????c gi???m thu??? Gi?? tr??? gia t??ng t???i c??c Ph??? l???c ban h??nh Theo Ngh??? ?????nh s??? 15/2022/N??-CP ????? th???c hi???n xu???t h??a ????n theo ????ng quy ?????nh.</td>-->
<!--						<td>-->
<!--							<div class="table-controls">-->
<!--								<a href="#" class="btn btn-success btn-icon btn-xs tip" title="S???a"><i class="fa fa-pencil"></i></a>-->
<!--								<a href="#" class="btn btn-danger btn-icon btn-xs tip" title="Xo??"><i class="fa fa-trash-o"></i></a>-->
<!--							</div>-->
<!--						</td>-->
<!--					</tr>-->
					<tr>
						<td>2</td>
						<td>phamngocquang</td>
						<td>
							<select class="select select-disabled" multiple="multiple" tabindex="2">
								<option selected="selected">V??n ph??ng ??i???n t???</option>
								<option selected="selected">H??? tr??? kinh doanh</option>
								<option selected="selected">Qu???n tr??? nh??n s???</option>
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
								<option selected="selected">Qu???n tr??? doanh nghi???p FAST</option>
								<option selected="selected">C???ng th??ng tin Vietlott</option>
								<option selected="selected">B??o c??o th??ng minh</option>
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

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

<!--	Thư viện chọn ngày-->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
<!--	<script type="text/javascript" src="--><?//= base_url()?><!--assets/ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>-->

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
	<script type="text/javascript" src="<?= base_url()?>assets/js/problem.js"></script>
<!--	 Thu vien thong bao -->
<!--	<link rel="stylesheet" href="--><?//= base_url()?><!--assets/css/toastr.min.css">-->
<!--	<script src="--><?//= base_url()?><!--assets/js/toastr.min.js"></script>-->

	<style>

		body {
			margin: 40px 10px;
			padding: 0;
			font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
			font-size: 14px;
		}

		.daterangepicker.ltr.show-calendar.openscenter{
			top: 140px !important;
		}

	</style>

</head>

<body class="wysihtml5-supported">

<?php include("header_view.php") ?>

<!-- Page container -->
<div class="page-container container-fluid">

	<?php include("sidebar_view.php") ?>

	<!-- Page content -->
	<div class="page-content">

		<!-- Page title -->
		<div class="page-title">
			<h5><i class="fa fa-table"></i> Danh sách sự cố</h5>
			<?php if ($_SESSION['user']['role'] == 3 || $_SESSION['user']['role'] == 1){ ?>
			<div class="btn-group">
				<a href="#" class="btn btn-link btn-lg btn-icon dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i><span class="caret"></span></a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="<?= base_url()?>addProblem">Thêm mới sự cố</a></li>
				</ul>
			</div>
			<?php } ; ?>
		</div>
		<!-- /page title -->

		<!-- Basic inputs -->
		<div class="panel panel-default">
			<!-- Form components -->
			<div class="panel-body">
				<div class="form-group">
					<div class="row">
						<form class="form-horizontal" role="form" action="<?= base_url()?>search_result" enctype="multipart/form-data" method="post">
							<div class="col-md-3">
								<input type="text" class="form-control keyword" name="keyword" placeholder="Điền từ khoá lọc...">
							</div>

							<div class="col-md-3">
								<input type="text" class="form-control dates" placeholder="Từ ngày đến ngày" name="datefilter" value="">
							</div>

							<div class="col-md-3">
								<select class="form-control software" name="software">
									<option value="" selected>Chọn phần mềm/hệ thống</option>
									<?php foreach ($dataSoftware as $key => $value) { ?>
										<option value="<?php echo $value['id_software'];?>"><?php echo $value['software'];?></option>
									<?php } ?>
								</select>
							</div>

							<div class="col-md-3 text-right">
								<button type="submit" class="btn btn-info search" name="submit">Tìm kiếm</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Default modal -->
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>STT</th>
						<th>Phần mềm</th>
						<th style="width: 50%">Nội dung sự cố</th>
						<th>Thời gian</th>
						<th class="text-center">Chức năng</th>
					</tr>
					</thead>
					<tbody class="data">
					<?php foreach ($dataProblem as $key => $value) { ?>
					<tr>
						<td><?php echo $key+1;?></td>
						<td><?php echo $value['software'];?></td>
						<td><?php echo $value['problem_detail'];?></td>
						<td><?php echo date("m/d/Y", strtotime($value['time_start']));?></td>

						<td>
							<div class="table-controls">
								<button class="btn btn-info btn-icon btn-xs tip" title="Xem">
									<i class="fa fa-eye viewEvent" aria-hidden="true">
										<input type="text" value="<?php echo $value['id_problem']?>" class="sr-only">
									</i>
								</button>
								<?php if ($_SESSION['user']['role'] == 3 || $_SESSION['user']['role'] == 1){ ?>
								<a href="<?= base_url().'editProlem/'.$value['id_problem']?>" class="btn btn-success btn-icon btn-xs tip" title="Sửa"><i class="fa fa-pencil"></i></a>
								<button class="btn btn-danger btn-icon btn-xs tip" title="Xoá">
									<i class="fa fa-trash-o deleteProblem" aria-hidden="true">
										<input type="text" value="<?php echo $value['id_problem']?>" class="sr-only">
									</i>
								</button>
								<?php } ; ?>
							</div>
						</td>
					</tr>
					<?php } ?>
					</tbody>
				</table>

				<div class="table-footer">
					<?php if ($dataProblem != null) { ?>
						<ul class="pagination">
							<?php for($i=0; $i<$countPage; $i++){ ?>
							<li class="page-item <?php if ($i == 0){echo 'active';}?>" onclick="getPage(this)"><a style="cursor: pointer"><?php echo $i+1; ?></a></li>
							<?php } ?>
						</ul>
					<?php } else { ?>
						<ul class="pagination">
							<li class="page-item active"><button class="btn btn-primary btn-xs">1</button></li>
						</ul>
					<?php } ?>
				</div>

			</div>
		<!-- /basic inputs -->
		</div>

		<div id="default_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;background: rgb(0 0 0 / 50%);">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h5 class="modal-title">Chi tiết sự cố</h5>
					</div>

					<div class="modal-body has-padding modal-view"></div>

					<div class="modal-footer">
						<button type="button" class="btn btn-primary close-modal" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /default modal -->

		<!-- Small modal -->
		<div id="small_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;background: rgb(0 0 0 / 50%);">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h5 class="modal-title">Xoá sự cố</h5>
					</div>

					<div class="modal-body has-padding modal-delete">
						<p>Bạn có chắc chắn muốn xoá không?</p>
					</div>

					<div class="modal-footer">
						<button class="btn btn-warning close-modal" data-dismiss="modal">Không</button>
						<button class="btn btn-primary btnDelete">Có</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /small modal -->

		<?php include("footer_view.php") ?>

	</div>
</div>

</body>

</html>

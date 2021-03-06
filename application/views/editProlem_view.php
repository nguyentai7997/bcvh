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
			<h5><i class="fa fa-pencil"></i> Ch???nh s???a s??? c???</h5>
		</div>
		<!-- /page title -->

		<!-- Form components -->
		<form class="form-horizontal" role="form" action="<?php echo base_url().'updateProblem/'.$problem[0]['id_problem']?>" enctype="multipart/form-data" method="post">

			<!-- Basic inputs -->
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="form-group">
						<label class="col-sm-2 control-label">Ch???n ph???n m???m: </label>
						<div class="col-sm-10">
							<select class="form-control software" name="software" required>
								<option value="" disabled selected>Ch???n m???t ph???n m???m...</option>
								<?php foreach ($software as $key => $value) {
									if($value['id_software'] == $problem[0]['id_software']) {?>
										<option value="<?php echo $value['id_software'];?>" selected><?php echo $value['software'];?></option>
									<?php }else { ?>
										<option value="<?php echo $value['id_software'];?>"><?php echo $value['software'];?></option>
									<?php }
									?>

								<?php } ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Chi ti???t s??? c???: </label>
						<div class="col-sm-10">
							<textarea rows="5" cols="5" class="limited form-control problemDetail" name="problemDetail" placeholder="Limited to 100 characters" required><?php echo $problem[0]['problem_detail']; ?></textarea>
							<span class="help-block" id="limit-text">Field limited to 100 characters.</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Bi???n ph??p x??? l??: </label>
						<div class="col-sm-10">
							<textarea rows="5" cols="5" class="limited form-control solution" name="solution" placeholder="Limited to 100 characters"><?php echo $problem[0]['solution']; ?></textarea>
							<span class="help-block" id="limit-text">Field limited to 100 characters.</span>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">???nh trao ?????i: </label>
						<div class="col-sm-10">
							<input type="file" id="unstyled-file" name="file">
							<div class="thumbnail">
								<div class="thumb">
									<img alt="" src="<?php echo base_url().'uploads/'.$problem[0]['image']?>">
									<div class="thumb-options">
                                    <span>
                                        <button type="button" class="btn btn-icon btn-default removeImage"><i class="fa fa-times"></i></button>
                                    </span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Ng??y ph??t sinh: </label>
						<div class="col-sm-10">
							<input class="form-control dateStart" type="date" name="dateStart" required value="<?php echo $problem[0]['time_start']; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Ng??y ho??n th??nh: </label>
						<div class="col-sm-10">
							<input class="form-control dateEnd" type="date" name="dateEnd" value="<?php echo $problem[0]['time_end']; ?>">
						</div>
					</div>

					<div class="form-actions text-right">
						<button type="button" class="btn btn-danger cancelForm">Cancel</button>
						<button type="submit" class="btn btn-primary" name="submit">Submit</button>
					</div>

				</div>
			</div>
			<!-- /basic inputs -->

		</form>
		<!-- /form components -->

		<?php include("footer_view.php") ?>

	</div>
</div>

</body>

</html>

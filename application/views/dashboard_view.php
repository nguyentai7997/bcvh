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
	<script type="text/javascript" src="<?= base_url()?>assets/js/bcvh.js"></script>
	<script>

		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');

			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
			var yyyy = today.getFullYear();

			today = yyyy + '-' + mm + '-' + dd;
			// document.write(today);
			$.ajax({
				url: 'http://localhost:8012/bcvh/getEvents',
				type: 'post',
				data: {
					code : 'nguyentai17',
				},success:function(res) {
					var obj = JSON.parse(res);
					var eventsArray = [];
					for (i=0; i < obj.length; i++){
						eventsArray.push({
							id:obj[i]['id_problem'],
							title:obj[i]['software'],
							start:obj[i]['time_start'],
						})
					}

					var calendar = new FullCalendar.Calendar(calendarEl, {
						headerToolbar: {
							left: 'prev,next today',
							center: 'title',
							right: 'dayGridMonth,timeGridWeek,timeGridDay'
						},
						initialDate: today,
						navLinks: true, // can click day/week names to navigate views
						selectable: true,
						selectMirror: true,
						// select: function(arg) {
						// console.log("them su co vao day");
						// var title = prompt('Event Title:');
						// if (title) {
						// 	calendar.addEvent({
						// 		title: title,
						// 		start: arg.start,
						// 		end: arg.end,
						// 		allDay: arg.allDay
						// 	})
						// }
						// calendar.unselect()
						// },
						eventClick: function(info) {
							var idEvent = info.event.id;
							$('#default_modal').addClass('in');
							$('#default_modal').css('display','block');
							$('.wysihtml5-supported').addClass('modal-open');
							$.ajax({
								url: 'http://localhost:8012/bcvh/viewEvent',
								type: 'post',
								data: {
									idEvent : idEvent,
								}, success: function (res) {
									var obj = JSON.parse(res);
									console.log(obj);
									var html = "";
									$('.modal-body').empty();

									html +=						'<div class="row">'
									html +=							'<label class="col-sm-3" style="font-weight: bold;">Phần mềm: </label>'
									html +=							'<div class="col-sm-9">'+obj[0]['software']+'</div>'
									html +=						'</div>'

									html +=						'<div class="row">'
									html +=							'<label class="col-sm-3" style="font-weight: bold;">Chi tiết sự cố: </label>'
									html +=							'<div class="col-sm-9">'+obj[0]['problem_detail']+'</div>'
									html +=						'</div>'

									html +=						'<div class="row">'
									html +=							'<label class="col-sm-3" style="font-weight: bold;">Biện pháp xử lý: </label>'
									html +=							'<div class="col-sm-9">'+obj[0]['solution']+'</div>'
									html +=						'</div>'

									html +=						'<div class="row">'
									html +=							'<label class="col-sm-3" style="font-weight: bold;">Ảnh trao đổi: </label>'
									html +=							'<div class="col-sm-9">'
									html +=								'<div class="thumbnail">'
									html +=									'<div class="thumb">'
									html +=										'<img alt="" src="http://localhost:8012/bcvh/uploads/'+obj[0]['image']+'">'
									html +=									'</div>'
									html +=								'</div>'
									html +=							'</div>'
									html +=						'</div>'

									html +=						'<div class="row">'
									html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày phát sinh: </label>'
									html +=							'<div class="col-sm-9">'+obj[0]['time_start']+'</div>'
									html +=						'</div>'

									html +=						'<div class="row">'
									html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày khắc phục: </label>'
									html +=							'<div class="col-sm-9">'+obj[0]['time_end']+'</div>'
									html +=						'</div>'

									$('.modal-body').append(html);

								}, error: function (res) {
									console.log("Ajax call error.");
								}
							})
						},
						editable: true,
						dayMaxEvents: true, // allow "more" link when too many events
						events: eventsArray,
					});
					calendar.render();
				},error:function(){
					console.log("Ajax call error.");
				}
			});
			$(".close-modal").click(function () {
				$('#default_modal').removeClass('in');
				$('#default_modal').css('display','none');
				$('.wysihtml5-supported').removeClass('modal-open');
				$('.modal-body').empty();
			})
		});

	</script>
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

<body class="wysihtml5-supported">

<?php include("header_view.php") ?>

<!-- Page container -->
<div class="page-container container-fluid">

	<?php include("sidebar_view.php") ?>

	<!-- Page content -->
	<div class="page-content">

		<!-- Page title -->
		<div class="page-title">
			<h5><i class="fa fa-calendar"></i> Tổng quan <small>Các sự cố hiển thị tại bảng bên dưới, bấm vào từng sự cố để xem chi tiết</small></h5>
		</div>
		<!-- /page title -->

		<!-- Calendar -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div id='calendar'></div>
			</div>
		</div>
		<!-- /calendar -->

		<!-- Default modal -->
		<div id="default_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;background: rgb(0 0 0 / 50%);">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close close-modal" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h5 class="modal-title">Chi tiết sự cố</h5>
					</div>

					<div class="modal-body has-padding"></div>

					<div class="modal-footer">
						<button type="button" class="btn btn-primary close-modal" data-dismiss="modal">Đóng</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /default modal -->

		<?php include("footer_view.php") ?>

	</div>
</div>

</body>

</html>

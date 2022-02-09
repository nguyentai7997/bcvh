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
	<script type="text/javascript" src="<?= base_url()?>assets2/js/main.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets2/js/dashboard.js"></script>
	<script>

		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');

			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
			var yyyy = today.getFullYear();

			today = yyyy + '-' + mm + '-' + dd;
			// document.write(today);

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
				select: function(arg) {
					console.log("them su co vao day");
					// var title = prompt('Event Title:');
					// if (title) {
					// 	calendar.addEvent({
					// 		title: title,
					// 		start: arg.start,
					// 		end: arg.end,
					// 		allDay: arg.allDay
					// 	})
					// }
					calendar.unselect()
				},
				eventClick: function(arg) {
					if (confirm('Are you sure you want to delete this event?')) {
						arg.event.remove()
					}
				},
				editable: true,
				dayMaxEvents: true, // allow "more" link when too many events
				events: [
					{
						title: 'All Day Event',
						start: '2020-09-01'
					},
					{
						title: 'Long Event',
						start: '2020-09-07',
						end: '2020-09-10'
					},
					{
						groupId: 999,
						title: 'Repeating Event',
						start: '2020-09-09T16:00:00'
					},
					{
						groupId: 999,
						title: 'Repeating Event',
						start: '2020-09-16T16:00:00'
					},
					{
						title: 'Conference',
						start: '2020-09-11',
						end: '2020-09-13'
					},
					{
						title: 'Meeting',
						start: '2020-09-12T10:30:00',
						end: '2020-09-12T12:30:00'
					},
					{
						title: 'Lunch',
						start: '2020-09-12T12:00:00'
					},
					{
						title: 'Meeting',
						start: '2020-09-12T14:30:00'
					},
					{
						title: 'Happy Hour',
						start: '2020-09-12T17:30:00'
					},
					{
						title: 'Dinner',
						start: '2020-09-12T20:00:00'
					},
					{
						title: 'Birthday Party',
						start: '2020-09-13T07:00:00'
					},
					{
						title: 'Click for Google',
						url: 'http://google.com/',
						start: '2020-09-28'
					}
				]
			});

			calendar.render();
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

<body>

<!-- Navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<ul class="nav navbar-nav navbar-left-custom">
				<li class="user dropdown">
					<a><img src="<?= base_url()?>assets2/images/vietlott_logo.png" alt=""></a>
				</li>
			</ul>
		</div>
		<ul class="nav navbar-nav navbar-right collapse" id="navbar-right">
			<li class="user dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?= base_url()?>assets2/images/demo/users/face6.png" alt="">
					<span>Nguyen Tai</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
					<li><a href="#"><i class="fa fa-tasks"></i> Tasks</a></li>
					<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
					<li><a href="#"><i class="fa fa-mail-forward"></i> Logout</a></li>
				</ul>
			</li>
		</ul>

	</div>
</div>
<!-- /navbar -->


<!-- Page header -->
<div class="container-fluid">
	<div class="page-header">
<!--		<div class="logo"><a href="index.html" title=""><img src="--><?//= base_url()?><!--assets2/images/vietlott_logo.png" alt=""></a></div>-->
<!--		<ul class="middle-nav">-->
<!--			<li><a href="#" class="btn btn-default"><i class="fa fa-comments-o"></i> <span>Support tickets</span></a><div class="label label-info">9</div></li>-->
<!--			<li><a href="#" class="btn btn-default"><i class="fa fa-bars"></i> <span>Statistics</span></a></li>-->
<!--			<li><a href="#" class="btn btn-default"><i class="fa fa-male"></i> <span>User list</span></a></li>-->
<!--			<li><a href="#" class="btn btn-default"><i class="fa fa-money"></i> <span>Billing panel</span></a></li>-->
<!--		</ul>-->
	</div>
</div>
<!-- /page header -->


<!-- Page container -->
<div class="page-container container-fluid">

	<!-- Sidebar -->
	<div class="sidebar collapse">
		<ul class="navigation">
			<li class="active"><a href="<?= base_url()?>admin/dashboard"><i class="fa fa-laptop"></i> Bảng điều khiển</a></li>
			<li class=""><a href="<?= base_url()?>admin/problem"><i class="fa fa-table"></i> Danh sách sự cố</a></li>
			<li class=""><a href="<?= base_url()?>admin/user"><i class="fa fa fa-tasks"></i> Phân quyền</a></li>
		</ul>
	</div>
	<!-- /sidebar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Page title -->
		<div class="page-title">
			<h5><i class="fa fa-bars"></i> Dashboard <small>Welcome, Eugene!</small></h5>
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


		<!-- Statistics -->
		<ul class="row stats">
			<li class="col-xs-3"><a href="#" class="btn btn-default">52</a> <span>new pending tasks</span></li>
			<li class="col-xs-3"><a href="#" class="btn btn-default">520</a> <span>pending orders</span></li>
			<li class="col-xs-3"><a href="#" class="btn btn-default">14</a> <span>new opened tickets</span></li>
			<li class="col-xs-3"><a href="#" class="btn btn-default">48</a> <span>new user registrations</span></li>
		</ul>
		<!-- /statistics -->

		<!-- Calendar -->
		<div class="panel panel-default">
			<div class="panel-heading"><h5 class="panel-title">Charts</h5></div>
			<div class="panel-body">
<!--				<div class="fullcalendar"></div>-->
				<div id='calendar'></div>
			</div>
		</div>
		<!-- /calendar -->

		<!-- Footer -->
		<div class="footer">
			&copy; Copyright 2022. All rights reserved. Vietlott admin theme by <a href="#" title="">Nguyen Tai</a>
		</div>
		<!-- /footer -->

	</div>
</div>

</body>

</html>

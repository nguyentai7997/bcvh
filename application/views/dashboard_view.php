<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>teemarket - Dashboard</title>

	<link rel="apple-touch-icon" href="<?= base_url()?>assets1/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?= base_url()?>assets1/images/favicon-teemarket.ico">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/css/bootstrap-extend.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/site.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/seller.css?">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/animsition/animsition.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/asscrollable/asScrollable.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/switchery/switchery.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/intro-js/introjs.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/slidepanel/slidePanel.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/flag-icon-css/flag-icon.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/vendor/waves/waves.minfd53.css?v4.0.1">

	<!-- Page -->
	<link rel="stylesheet" href="<?= base_url()?>assets1/examples/css/dashboard/v1.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>assets1/css/daterangepicker.css?">

	<!-- Fonts -->
	<link rel="stylesheet" href="<?= base_url()?>global/fonts/material-design/material-design.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/fonts/ionicons/ionicons.minfd53.css?v4.0.1">
	<link rel="stylesheet" href="<?= base_url()?>global/fonts/font-awesome/font-awesome.minfd53.css">
	<link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700">

	<!--[if lt IE 9]>
	<script src="<?= base_url()?>global/vendor/html5shiv/html5shiv.min.js?v4.0.1"></script>
	<![endif]-->

	<!--[if lt IE 10]>
	<script src="<?= base_url()?>global/vendor/media-match/media.match.min.js?v4.0.1"></script>
	<script src="<?= base_url()?>global/vendor/respond/respond.min.js?v4.0.1"></script>
	<![endif]-->

	<!-- Scripts -->
	<script src="<?= base_url()?>global/vendor/breakpoints/breakpoints.minfd53.js?v4.0.1"></script>
	<script>
		Breakpoints();
	</script>
</head>
<body class="animsition dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<?php include("seller_header_view.php") ?>

<div class="site-menubar site-menubar-light site-menubar-dark">
	<div class="site-menubar-body">
		<div>
			<div>
				<ul class="site-menu" data-plugin="menu">
					<li class="site-menu-item active">
						<a class="_dashboard">
							<i class="site-menu-icon fa-dashboard" aria-hidden="true"></i>
							<span class="site-menu-title">DASHBOARD</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="campaigns">
							<i class="site-menu-icon ion-ios-shirt" aria-hidden="true"></i>
							<span class="site-menu-title">CAMPAIGNS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="create-campaign">
							<i class="site-menu-icon fa-pencil-square" aria-hidden="true"></i>
							<span class="site-menu-title">CREATE</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="orders">
							<i class="site-menu-icon fa-shopping-cart" aria-hidden="true"></i>
							<span class="site-menu-title">ORDERS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="payouts">
							<i class="site-menu-icon fa-money" aria-hidden="true"></i>
							<span class="site-menu-title">PAYOUTS</span>
						</a>
					</li>
					<li class="site-menu-item">
						<a class="settings">
							<i class="site-menu-icon ion-md-settings" aria-hidden="true"></i>
							<span class="site-menu-title">SETTINGS</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Page -->
<div class="page">
	<div class="page-content container-fluid">
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
			<div class="col-xl-8 col-md-6 col-sm-8">
				<!-- Pagination With Gap -->
				<div class="mt-20 mb-50">
					<ul class="pagination pagination-gap justify-content-center">
						<li class="active page-item today"><a class="page-link">Today<span class="sr-only">(current)</span></a></li>
						<li class="page-item yesterday"><a class="page-link">Yesterday</a></li>
						<li class="page-item days7"><a class="page-link">Last 7 Days</a></li>
						<li class="page-item days30"><a class="page-link">Last 30 Days</a></li>
						<li class="page-item alltime"><a class="page-link">All time</a></li>
						<li class="page-item customday"><a class="page-link">Custom</a></li>
					</ul>
				</div>
				<!-- End Example Pagination With Gap -->
			</div>
			<div class="col-xl-2 col-md-3 col-sm-2"></div>
		</div>
		<div class="row" data-plugin="matchHeight" data-by-row="true">
			<div class="col-xl-4 col-md-6">
				<!-- Widget Linearea One-->
				<div class="card card-shadow" id="widgetLineareaOne">
					<div class="card-block bg-green-500 p-20 pt-10">
						<div class="clearfix text-white">
							<div class="float-right">
								<i class="icon fa-money font-size-40"></i>
							</div>
							<div class="font-size-20 font-weight-600">PROFIT</div>
							<div class="font-size-20 profits">$0.00</div>
						</div>

					</div>
				</div>
				<!-- End Widget Linearea One -->
			</div>

			<div class="col-xl-4 col-md-6">
				<!-- Widget Linearea Two-->
				<div class="card card-shadow" id="widgetLineareaTwo">
					<div class="card-block bg-cyan-500 p-20 pt-10">
						<div class="clearfix text-white">
							<div class="float-right">
								<i class="icon fa-shopping-cart font-size-40"></i>
							</div>
							<div class="font-size-20 font-weight-600">ORDERS/UNITS</div>
							<div class="font-size-20 orders-units">0/0</div>
						</div>
					</div>
				</div>
				<!-- End Widget Linearea Two -->
			</div>

			<div class="col-xl-4 col-md-6">
				<!-- Widget Linearea Three-->
				<div class="card card-shadow" id="widgetLineareaOne">
					<div class="card-block bg-orange-600 p-20 pt-10">
						<div class="clearfix text-white">
							<div class="float-right">
								<i class="icon ion-ios-shirt font-size-40"></i>
							</div>
							<div class="font-size-20 font-weight-600">ALL CAMPAIGNS</div>
							<div class="font-size-20">Active/Ended : <span class="active-ended"></span></div>
						</div>
					</div>
				</div>
				<!-- End Widget Linearea Three -->
			</div>

			<div class="col-lg-12">
				<div class="example-wrap bg-white pt-20 mt-50">
					<div id="chartdiv"></div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- End Page -->

<!--Modal Loading-->
<div class="modal fade modal-loading" aria-hidden="true" role="dialog" tabindex="-1">
	<div class="modal-box" style="position:fixed;top: 50%;left: 50%;z-index: 1700">
		<div class="loader loader-circle" style="border-left: .125em solid #fff;margin: unset;"></div>
		<div class="text-loading" style="color: #fff;float: right;position: relative;top: 9px;left: 10px;">LOADING...</div>
	</div>
</div>
<!-- End Modal -->

<?php include("seller_footer_view.php") ?>

<!-- Core  -->
<script data-cfasync="false" src="<?= base_url()?>cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url()?>global/vendor/babel-external-helpers/babel-external-helpersfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/jquery/jquery.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/popper-js/umd/popper.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/bootstrap/bootstrap.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/animsition/animsition.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/mousewheel/jquery.mousewheel.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/asscrollbar/jquery-asScrollbar.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/asscrollable/jquery-asScrollable.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/ashoverscroll/jquery-asHoverScroll.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/waves/waves.minfd53.js?v4.0.1"></script>

<!-- Plugins -->
<script src="<?= base_url()?>global/vendor/switchery/switchery.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/intro-js/intro.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/screenfull/screenfull.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/vendor/slidepanel/jquery-slidePanel.minfd53.js?v4.0.1"></script>

<!-- Scripts -->
<script src="<?= base_url()?>global/js/State.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Component.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Base.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Config.minfd53.js?v4.0.1"></script>

<script src="<?= base_url()?>assets1/js/Section/Menubar.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/Section/Sidebar.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/Section/PageAside.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/Plugin/menu.minfd53.js?v4.0.1"></script>

<!-- Config -->
<script src="<?= base_url()?>global/js/config/colors.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>assets1/js/config/tour.minfd53.js?v4.0.1"></script>
<script>
	Config.set('<?= base_url()?>assets1', '<?= base_url()?>assets1');
</script>

<!-- Page -->
<script src="<?= base_url()?>assets1/js/Site.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/asscrollable.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/slidepanel.minfd53.js?v4.0.1"></script>
<script src="<?= base_url()?>global/js/Plugin/switchery.minfd53.js?v4.0.1"></script>

<script src="<?= base_url()?>assets1/examples/js/pages/faq.minfd53.js?v4.0.1"></script>

<!--nguyentai's js-->
<script src="<?= base_url()?>assets1/js/seller.js"></script>
<script src="<?= base_url()?>assets1/js/dashboard.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.0/moment.min.js"></script>
<script src="<?= base_url()?>assets1/js/moment.min.js"></script>
<script src="<?= base_url()?>assets1/js/daterangepicker.js"></script>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script>
	$('.customday').daterangepicker({
		maxDate: moment(),
		opens: 'left',
	}, function(start, end, label) {
		$(".today").removeClass("active");
		$(".yesterday").removeClass("active");
		$(".days7").removeClass("active");
		$(".days30").removeClass("active");
		$(".alltime").removeClass("active");
		$(".customday").addClass("active");

		var dateStart = moment(start).format("YYYY-MM-DD");
		var dateEnd = moment(end).format("YYYY-MM-DD");

		$(".animsition").addClass("modal-open");
		$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
		$(".modal-loading").addClass("show");
		$(".modal-loading").css("display","block");

		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/get_orders_custom_day',
			type: 'post',
			data: {
				dateStart : dateStart,
				dateEnd : dateEnd,
			},success:function(res) {
				var obj = JSON.parse(res);
				var time = [];
				var orders = [];
				var units = [];
				var profits = [];
				for (i=0; i < obj.length-2; i++){
					orders.push(obj[i][obj[i].length-1]['COUNT(DISTINCT info_customer.id)']);
					if (obj[i].length > 2) {
						units.push(obj[i][obj[i].length-4]);
						profits.push(obj[i][obj[i].length-3]-7.50*obj[i][obj[i].length-4]);
						time.push(obj[i][obj[i].length-2]);
					} else {
						units.push("0");
						profits.push("0");
						time.push(obj[i][obj[i].length-2]);
					}
				}

				var totalProfits = 0;
				for (i = 0; i < obj.length-2; i++){
					totalProfits -= -profits[i];
				}
				$(".profits").html('$'+totalProfits.toFixed(2));

				var totalOrders = 0;
				for (i = 0; i < obj.length-2; i++){
					totalOrders -= -orders[i];
				}
				var totalUnits = 0;
				for (i = 0; i < obj.length-2; i++){
					totalUnits -= -units[i];
				}
				$(".orders-units").html(totalOrders + '/' + totalUnits);

				$(".active-ended").html(obj[obj.length-2] + '/' + obj[obj.length-1]);

				var arrayDays = new Array();
				for (var i = 0; i < time.length; i++){
					arrayDays.push(moment(time[i]).format('YYYY, M, D'));
				}
				arrayDays.push(moment(new Date()).format('YYYY, M, D'));//Push today to arrayDays

				var allData =[];
				for (i = 0; i < obj.length-2; i++){
					var data = {
						"time": new Date(arrayDays[i]),
						"orders": orders[i],
						"units": units[i],
						"profits": profits[i]
					};
					allData.push(data);
				}

				// Themes begin
				am4core.useTheme(am4themes_kelly);
				am4core.useTheme(am4themes_animated);
				// Themes end

				var chart = am4core.create("chartdiv", am4charts.XYChart);
				var title = chart.titles.create();
				title.text = moment(arrayDays[0]).format('LL') + ' - ' + moment(arrayDays[obj.length-3]).format('LL');
				title.fontSize = 20;
				title.marginBottom = 20;
				chart.data = allData;

				// chart.dateFormatter.inputDateFormat = "";
				var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
				dateAxis.renderer.minGridDistance = 60;
				dateAxis.startLocation = 0.5;
				dateAxis.endLocation = 0.5;
				dateAxis.baseInterval = {
					timeUnit: "day",
					count: 1
				}

				var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
				valueAxis.tooltip.disabled = true;

				var series = chart.series.push(new am4charts.LineSeries());
				series.dataFields.dateX = "time";
				series.name = "Orders";
				series.dataFields.valueY = "orders";
				series.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>Orders: {valueY.value}</b></span>";
				series.tooltipText = "[#000]{valueY.value}[/]";
				series.tooltip.background.fill = am4core.color("#FFF");
				series.tooltip.getStrokeFromObject = true;
				series.tooltip.background.strokeWidth = 3;
				series.tooltip.getFillFromObject = false;
				series.fillOpacity = 0.6;
				series.strokeWidth = 2;
				series.stacked = true;

				var series2 = chart.series.push(new am4charts.LineSeries());
				series2.name = "Units";
				series2.dataFields.dateX = "time";
				series2.dataFields.valueY = "units";
				series2.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>Units: {valueY.value}</b></span>";
				series2.tooltipText = "[#000]{valueY.value}[/]";
				series2.tooltip.background.fill = am4core.color("#FFF");
				series2.tooltip.getFillFromObject = false;
				series2.tooltip.getStrokeFromObject = true;
				series2.tooltip.background.strokeWidth = 3;
				series2.sequencedInterpolation = true;
				series2.fillOpacity = 0.6;
				series2.stacked = true;
				series2.strokeWidth = 2;

				var series3 = chart.series.push(new am4charts.LineSeries());
				series3.name = "Profits";
				series3.dataFields.dateX = "time";
				series3.dataFields.valueY = "profits";
				series3.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>Profits: ${valueY.value}</b></span>";
				series3.tooltipText = "[#000]{valueY.value}[/]";
				series3.tooltip.background.fill = am4core.color("#FFF");
				series3.tooltip.getFillFromObject = false;
				series3.tooltip.getStrokeFromObject = true;
				series3.tooltip.background.strokeWidth = 3;
				series3.sequencedInterpolation = true;
				series3.fillOpacity = 0.6;
				series3.defaultState.transitionDuration = 1000;
				series3.stacked = true;
				series3.strokeWidth = 2;

				chart.cursor = new am4charts.XYCursor();
				chart.cursor.xAxis = dateAxis;
				// chart.scrollbarX = new am4core.Scrollbar();

				// Add a legend
				chart.legend = new am4charts.Legend();
				chart.legend.position = "bottom";

				$(".modal-loading").removeClass("show");
				$(".modal-loading").css("display","none");
				$(".modal-backdrop").remove();
				$(".animsition").removeClass("modal-open");
			},error:function(){
				console.log("Ajax call error.");
			}
		});
	}
	);
</script>
</body>

</html>

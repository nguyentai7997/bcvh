$( ".animsition").ready(function() {
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_orders_today',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var orders = [];
			var units = [];
			var profits = [];
			for (i=0; i < obj.length-2; i++){
				orders.push(obj[i][obj[i].length-1]['COUNT(DISTINCT info_customer.id)']);
				if (obj[i].length > 1) {
					units.push(obj[i][obj[i].length-3]);
					profits.push(obj[i][obj[i].length-2]-7.50*obj[i][obj[i].length-3]);
				} else {
					units.push("0");
					profits.push("0");
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

			var today = moment(new Date()).format('YYYY, M, D');
			var part = today.split(",")
			var allData =[];
			for (i = 0; i < obj.length-2; i++){
				var data = {
					"time": new Date(part[0],part[1],part[2],i,0),
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
			title.text = moment(new Date()).format("LL");
			title.fontSize = 20;
			title.marginBottom = 20;
			chart.data = allData;

			chart.dateFormatter.inputDateFormat = "H";
			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.minGridDistance = 60;
			dateAxis.startLocation = 0.5;
			dateAxis.endLocation = 0.5;
			dateAxis.baseInterval = {
				timeUnit: "hour",
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

			// axis ranges
			// var range = dateAxis.axisRanges.create();
			// range.date = new Date(2001, 0, 1);
			// range.endDate = new Date(2003, 0, 1);
			// range.axisFill.fill = chart.colors.getIndex(7);
			// range.axisFill.fillOpacity = 0.2;
			//
			// range.label.text = "Fines for speeding increased";
			// range.label.inside = true;
			// range.label.rotation = 90;
			// range.label.horizontalCenter = "right";
			// range.label.verticalCenter = "bottom";
			//
			// var range2 = dateAxis.axisRanges.create();
			// range2.date = new Date(2007, 0, 1);
			// range2.grid.stroke = chart.colors.getIndex(7);
			// range2.grid.strokeOpacity = 0.6;
			// range2.grid.strokeDasharray = "5,2";
			//
			//
			// range2.label.text = "Motorcycle fee introduced";
			// range2.label.inside = true;
			// range2.label.rotation = 90;
			// range2.label.horizontalCenter = "right";
			// range2.label.verticalCenter = "bottom";
		},error:function(){
			console.log("Ajax call error.");
		}
	});
}); // end animision.ready()
$('.today').click(function(event) {
	$(".today").addClass("active");
	$(".yesterday").removeClass("active");
	$(".days7").removeClass("active");
	$(".days30").removeClass("active");
	$(".alltime").removeClass("active");
	$(".customday").removeClass("active");

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_orders_today',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var orders = [];
			var units = [];
			var profits = [];
			for (i=0; i < obj.length-2; i++){
				orders.push(obj[i][obj[i].length-1]['COUNT(DISTINCT info_customer.id)']);
				if (obj[i].length > 1) {
					units.push(obj[i][obj[i].length-3]);
					profits.push(obj[i][obj[i].length-2]-7.50*obj[i][obj[i].length-3]);
				} else {
					units.push("0");
					profits.push("0");
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

			var today = moment(new Date()).format('YYYY, M, D');
			var part = today.split(",")
			var allData =[];
			for (i = 0; i < obj.length-2; i++){
				var data = {
					"time": new Date(part[0],part[1],part[2],i,0),
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
			title.text = moment(new Date()).format("LL");
			title.fontSize = 20;
			title.marginBottom = 20;
			chart.data = allData;

			chart.dateFormatter.inputDateFormat = "H";
			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.minGridDistance = 60;
			dateAxis.startLocation = 0.5;
			dateAxis.endLocation = 0.5;
			dateAxis.baseInterval = {
				timeUnit: "hour",
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
});
$('.yesterday').click(function(event) {
	$(".today").removeClass("active");
	$(".yesterday").addClass("active");
	$(".days7").removeClass("active");
	$(".days30").removeClass("active");
	$(".alltime").removeClass("active");
	$(".customday").removeClass("active");

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_orders_yesterday',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var orders = [];
			var units = [];
			var profits = [];
			for (i=0; i < obj.length-2; i++){
				orders.push(obj[i][obj[i].length-1]['COUNT(DISTINCT info_customer.id)']);
				if (obj[i].length > 1) {
					units.push(obj[i][obj[i].length-3]);
					profits.push(obj[i][obj[i].length-2]-7.50*obj[i][obj[i].length-3]);
				} else {
					units.push("0");
					profits.push("0");
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

			var yesterday = moment(Date.today().add(-1).days()).format('YYYY, M, D');
			var part = yesterday.split(",");
			var allData =[];
			for (i = 0; i < obj.length-2; i++){
				var data = {
					"time": new Date(part[0],part[1],part[2],i,0),
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
			title.text = moment(Date.today().add(-1).days()).format("LL");
			title.fontSize = 20;
			title.marginBottom = 20;
			chart.data = allData;

			chart.dateFormatter.inputDateFormat = "H";
			var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
			dateAxis.renderer.minGridDistance = 60;
			dateAxis.startLocation = 0.5;
			dateAxis.endLocation = 0.5;
			dateAxis.baseInterval = {
				timeUnit: "hour",
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
});
$('.days7').click(function(event) {
	$(".today").removeClass("active");
	$(".yesterday").removeClass("active");
	$(".days7").addClass("active");
	$(".days30").removeClass("active");
	$(".alltime").removeClass("active");
	$(".customday").removeClass("active");

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");

	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_orders_7_days_left',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var orders = [];
			var units = [];
			var profits = [];
			for (i=0; i < obj.length-2; i++){
				orders.push(obj[i][obj[i].length-1]['COUNT(DISTINCT info_customer.id)']);
				if (obj[i].length > 1) {
					units.push(obj[i][obj[i].length-3]);
					profits.push(obj[i][obj[i].length-2]-7.50*obj[i][obj[i].length-3]);
				} else {
					units.push("0");
					profits.push("0");
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
			for (var i = 7; i > 0; i--){
				arrayDays.push(moment(Date.today().add(-i).days()).format('YYYY, M, D'));
			}

			var allData =[];
			for (i = 0; i < obj.length-2; i++){
				if (obj[i].length == 0){
					var data = {
						"time": new Date(arrayDays[i]),
						"orders": orders[i],
						"units": 0,
						"profits": 0
					};
					allData.push(data);
				} else {
					var data = {
						"time": new Date(arrayDays[i]),
						"orders": orders[i],
						"units": units[i],
						"profits": profits[i]
					};
					allData.push(data);
				}
			}

			// Themes begin
			am4core.useTheme(am4themes_kelly);
			am4core.useTheme(am4themes_animated);
			// Themes end

			var chart = am4core.create("chartdiv", am4charts.XYChart);
			var title = chart.titles.create();
			title.text = moment(Date.today().add(-7).days()).format("LL") + ' - ' + moment(Date.today().add(-1).days()).format("LL");
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
});
$('.days30').click(function(event) {
	$(".today").removeClass("active");
	$(".yesterday").removeClass("active");
	$(".days7").removeClass("active");
	$(".days30").addClass("active");
	$(".alltime").removeClass("active");
	$(".customday").removeClass("active");

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	var arrayDays = new Array();
	for (var i = 30; i > 0; i--){
		arrayDays.push(moment(Date.today().add(-i).days()).format('YYYY, M, D'));
	}

	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_orders_30_days_left',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var orders = [];
			var units = [];
			var profits = [];
			for (i=0; i < obj.length-2; i++){
				orders.push(obj[i][obj[i].length-1]['COUNT(DISTINCT info_customer.id)']);
				if (obj[i].length > 1) {
					units.push(obj[i][obj[i].length-3]);
					profits.push(obj[i][obj[i].length-2]-7.50*obj[i][obj[i].length-3]);
				} else {
					units.push("0");
					profits.push("0");
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
			title.text = moment(Date.today().add(-30).days()).format("LL") + ' - ' + moment(Date.today().add(-1).days()).format("LL");
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
});
$('.alltime').click(function(event) {
	$(".today").removeClass("active");
	$(".yesterday").removeClass("active");
	$(".days7").removeClass("active");
	$(".days30").removeClass("active");
	$(".alltime").addClass("active");
	$(".customday").removeClass("active");

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_orders_all_time',
		type: 'post',
		data: {
			code : 'nguyentai17',
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
			title.text = "All time";
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
});





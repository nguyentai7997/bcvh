$(document).ready(function() {
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_payouts_available',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var allData =[];
			for (i = 0; i < obj.length; i++){
				var data = [
					obj[i]['time'],
					obj[i]['title'],
					'$'+(obj[i]['quantity']*(obj[i]['price']-7.50)).toFixed(2),
					'PENDING',
				];
				allData.push(data);
			}
			$(".count").html(obj.length);
			$('.panel-body').append('<table class=\"table table-hover dataTable table-striped w-full text-center\" id=\"example\"></table>');
			$('#example').DataTable( {
				data: allData,
				"columns": [
					{ "title": "Time" },
					{ "title": "Campaign" },
					{ "title": "Amount" },
					{ "title": "Status" },
				],
				dom: 'Bfrtip',
				buttons: [
					'csvHtml5',
				]
			} );
		},error:function(){
			console.log("Ajax call error.");
		}
	});
} );
$('.available').click(function(event) {
	$(".available").addClass("active");
	$(".requested").removeClass("active");
	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_payouts_available',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var allData =[];
			for (i = 0; i < obj.length; i++){
				var data = [
					obj[i]['time'],
					obj[i]['title'],
					'$'+(obj[i]['quantity']*(obj[i]['price']-7.50)).toFixed(2),
					'PENDING',
				];
				allData.push(data);
			}
			$(".count").html(obj.length);
			$('#example_wrapper').remove();
			$('.panel-body').append('<table class=\"table table-hover dataTable table-striped w-full text-center\" id=\"example\"></table>');
			$('#example').DataTable( {
				data: allData,
				"columns": [
					{ "title": "Time" },
					{ "title": "Campaign" },
					{ "title": "Amount" },
					{ "title": "Status" },
				],
				dom: 'Bfrtip',
				buttons: [
					'csvHtml5',
				]
			} );
			$(".modal-loading").removeClass("show");
			$(".modal-loading").css("display","none");
			$(".modal-backdrop").remove();
			$(".animsition").removeClass("modal-open");
		},error:function(){
			console.log("Ajax call error.");
		}
	});
});
$('.requested').click(function(event) {
	$(".available").removeClass("active");
	$(".requested").addClass("active");
	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_payouts_requested',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			var obj = JSON.parse(res);
			var allData =[];
			for (i = 0; i < obj.length; i++){
				var data = [
					obj[i]['time'],
					'$'+obj[i]['payout_requested'],
					obj[i]['payment_mode'].toUpperCase(),
					obj[i]['status'].toUpperCase(),
				];
				allData.push(data);
			}
			$(".count").html(obj.length);
			$('#example_wrapper').remove();
			$('.panel-body').append('<table class=\"table table-hover dataTable table-striped w-full text-center\" id=\"example\"></table>');
			$('#example').DataTable( {
				data: allData,
				"columns": [
					{ "title": "Time" },
					{ "title": "Amount" },
					{ "title": "Payment Mode" },
					{ "title": "Status" },
				],
				dom: 'Bfrtip',
				buttons: [
					'csvHtml5',
				]
			} );
			$(".modal-loading").removeClass("show");
			$(".modal-loading").css("display","none");
			$(".modal-backdrop").remove();
			$(".animsition").removeClass("modal-open");
		},error:function(){
			console.log("Ajax call error.");
		}
	});
});

$('.total-payout').click(function (event) {
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/check_payment_method',
		type: 'post',
		data: {
			code : 'nguyentai17',
		},success:function(res) {
			if (res == 0) { //Neu khong co phuong thuc thanh toan nao
				$(".animsition").addClass("modal-open");
				$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
				$(".modal-incomplete-payment").addClass("show");
				$(".modal-incomplete-payment").css("display","block");
				$(".add").click(function () {
					$(".modal-incomplete-payment").removeClass("show");
					$(".modal-incomplete-payment").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");
					window.location.href = 'http://localhost:8012/teemarket/seller/payment'
				})
				$(".cancel").click(function () {
					$(".modal-incomplete-payment").removeClass("show");
					$(".modal-incomplete-payment").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");
				})
			} else { //Neu co 1 trong 2 loai phuong thuc thanh toan
				var obj = JSON.parse(res);
				if (obj[0]['paypal'] != '' && obj[0]['payoneer'] != ''){
					$(".form-control").append('<option value="0" selected>Select Payment Method...</option>');
					$(".form-control").append('<option value="paypal">Paypal</option>');
					$(".form-control").append('<option value="payoneer">Payoneer</option>');
				} else if (obj[0]['paypal'] != ''){
					$(".form-control").append('<option value="0" selected>Select Payment Method...</option>');
					$(".form-control").append('<option value="paypal">Paypal</option>');
				} else if (obj[0]['payoneer'] != ''){
					$(".form-control").append('<option value="0" selected>Select Payment Method...</option>');
					$(".form-control").append('<option value="payoneer">Payoneer</option>');
				}
				$(".animsition").addClass("modal-open");
				$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
				$(".modal-request").addClass("show");
				$(".modal-request").css("display","block");
				$(".request").click(function () {
					var request = $(".payouts-request").val();
					var payment_mode = $('select[name=payment] option').filter(':selected').val();
					var request_time = moment(new Date()).format('YYYY-MM-D HH:mm:ss');

					if (payment_mode == 0){
						$('.payment-required').css('display','block');
					} else {
						$(".modal-loading").addClass("show");
						$(".modal-loading").css("display","block");
						$.ajax({
							url: 'http://localhost:8012/teemarket/seller/insert_request',
							type: 'post',
							data: {
								request : request,
								payment_mode : payment_mode,
								request_time : request_time,
							},
							success:function(res){
								if (res == 1){
									$(".modal-loading").removeClass("show");
									$(".modal-loading").css("display","none");
									$(".modal-request").removeClass("show");
									$(".modal-request").css("display","none");
									$(".request-success").addClass("show");
									$(".request-success").css("display","block");
									$(".close-modal").click(function () {
										$(".request-success").removeClass("show");
										$(".request-success").css("display","none");
										$(".modal-backdrop").remove();
										$(".animsition").removeClass("modal-open");
										window.location.href = 'http://localhost:8012/teemarket/seller/payouts';
									})
								} else {
									console.log("Insert fail");
								}
							},
							error:function(res){
								console.log("Ajax call error.");
							}
						});
					}
				})
				$(".cancel").click(function () {
					$(".form-control option").remove();
					$(".modal-request").removeClass("show");
					$(".modal-request").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");
				})
			}
		},error:function(){
			console.log("Ajax call error.");
		}
	})
})

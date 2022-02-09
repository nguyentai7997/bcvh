$(document).ready(function() {
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'csvHtml5',
		]
	} );
} );

$('.seller-request').click(function(event) {
	$('#example_wrapper').remove();
	var id_user = $('.id').val();
	$(".seller-request").addClass("active");
	$(".seller-orders").removeClass("active");

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	$.ajax({
		url: 'http://localhost:8012/teemarket/admin/get_requestes_of_seller',
		type: 'post',
		data: {
			id_user : id_user,
		},success:function(res) {
			var obj = JSON.parse(res);
			var allData =[];
			for (i = 0; i < obj.length; i++){
				var data = [
					obj[i]['id'],
					obj[i]['time'],
					'$'+obj[i]['payout_requested'],
					obj[i]['payment_mode'],
					obj[i][0],
					obj[i]['status'].toUpperCase(),
					obj[i]['pay_time'],
					'<i class="icon fa-money font-size-20 pay" style="color: #3f51b5;cursor: pointer;" aria-hidden="true"><input type="text" class="sr-only" value="'+obj[i]['id']+'/'+obj[i]['payout_requested']+'/'+obj[i]['id_seller']+'"></i>'
				];
				allData.push(data);
			}

			$(".count").html(obj.length);
			$('.panel-body').append('<table class=\"table table-hover dataTable table-striped w-full text-center\" id=\"example\"></table>');
			$('#example').DataTable( {
				data: allData,
				"columns": [
					{ "title": "ID Request" },
					{ "title": "Time Request" },
					{ "title": "Payout Request" },
					{ "title": "Payment Mode" },
					{ "title": "Payment Method" },
					{ "title": "Status" },
					{ "title": "Pay time" },
					{ "title": "Pay" },
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

$('.seller-orders').click(function(event) {
	$('#example_wrapper').remove();
	var id_user = $('.id').val();
	$(".seller-request").removeClass("active");
	$(".seller-orders").addClass("active");
	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-loading").addClass("show");
	$(".modal-loading").css("display","block");
	$.ajax({
		url: 'http://localhost:8012/teemarket/admin/get_orders_of_seller',
		type: 'post',
		data: {
			id_user : id_user,
		},success:function(res) {
			var obj = JSON.parse(res);
			var allData =[];
			for (i = 0; i < obj.length; i++){
				var data = [
					obj[i]['time'],
					obj[i]['title'],
					obj[i]['id'],
					obj[i]['email'],
					obj[i]['country'],
					obj[i]['quantity'],
					'$'+(obj[i]['quantity']*(obj[i]['price'])).toFixed(2),
					'$7.50',
					'$'+(obj[i]['quantity']*(obj[i]['price']-7.50)).toFixed(2),
					obj[i]['status'],
				];
				allData.push(data);
			}
			$(".count").html(obj.length);
			$('.panel-body').append('<table class=\"table table-hover dataTable table-striped w-full text-center\" id=\"example\"></table>');
			$('#example').DataTable( {
				data: allData,
				"columns": [
					{ "title": "Date" },
					{ "title": "CName" },
					{ "title": "OrderID" },
					{ "title": "Email" },
					{ "title": "Country" },
					{ "title": "Items" },
					{ "title": "Subtotal" },
					{ "title": "Cost" },
					{ "title": "Profit" },
					{ "title": "Flag" },
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

$(document).on('click', '.pay', function(){
	var str = $(this).children().val();
	var res = str.split("/");
	var id = res[0];
	var amount = res[1];
	var id_seller = res[2];

	$(".amount").html(amount);

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-pay").addClass("show");
	$(".modal-pay").css("display","block");

	$('.cancel').click(function () {
		$(".modal-pay").removeClass("show");
		$(".modal-pay").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	})

	$('.yes').click(function () {
		$(".modal-pay").removeClass("show");
		$(".modal-pay").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");

		$(".animsition").addClass("modal-open");
		$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
		$(".modal-loading").addClass("show");
		$(".modal-loading").css("display","block");

		var pay_time = moment(new Date()).format('YYYY-MM-D HH:mm:ss');

		$.ajax({
			url: 'http://localhost:8012/teemarket/admin/pay',
			type: 'post',
			data: {
				id: id,
				pay_time : pay_time
			},
			success:function(res){
				if (res == 1) {
					$(".modal-loading").removeClass("show");
					$(".modal-loading").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");

					$(".animsition").addClass("modal-open");
					$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
					$(".pay-success").addClass("show");
					$(".pay-success").css("display","block");

					$(".close-modal").click(function () {
						$(".pay-success").removeClass("show");
						$(".pay-success").css("display","none");
						$(".modal-backdrop").remove();
						$(".animsition").removeClass("modal-open");
						window.location.href = 'http://localhost:8012/teemarket/admin/user_details/'+id_seller;
					});
				} else {
					console.log("Pay Error");
				}
			},
			error:function(res){
				console.log("Ajax call error.");
			}
		});
	})
})

// Check Email Input
$(".paypal").change(function(event){
	var paypal  = $('.paypal').val();
	var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (regEmail.exec(paypal)){
		$('.paypal-invalid').css('display', 'none');
	} else {
		$('.paypal-invalid').css('display', 'block');
	}
});
$(".payoneer").change(function(event){
	var payoneer  = $('.payoneer').val();
	var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (regEmail.exec(payoneer)){
		$('.payoneer-invalid').css('display', 'none');
	} else {
		$('.payoneer-invalid').css('display', 'block');
	}
});
$(".save").click(function (event) {
	var paypal = $('.paypal').val();
	var payoneer = $('.payoneer').val();
	var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (regEmail.exec(paypal) && payoneer == "") {
		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/insert_payment',
			type: 'post',
			data: {
				paypal 		: paypal,
				payoneer 	: payoneer
			},
			success:function(res){
				if(res == 0){
					window.location.href = 'http://localhost:8012/teemarket/seller/payment';
				}
				else {
					console.log("Add payment error");
					return;
				}
			},
			error:function(res){
				console.log("Ajax call error");
				return;
			}
		});
		return;
	}
	if (paypal == "" && regEmail.exec(payoneer)) {
		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/insert_payment',
			type: 'post',
			data: {
				paypal 		: paypal,
				payoneer 	: payoneer
			},
			success:function(res){
				if(res == 0){
					window.location.href = 'http://localhost:8012/teemarket/seller/payment';
				}
				else {
					console.log("Add payment error");
					return;
				}
			},
			error:function(res){
				console.log("Ajax call error");
				return;
			}
		});
		return;
	}
	if (regEmail.exec(paypal) && regEmail.exec(payoneer)) {
		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/insert_payment',
			type: 'post',
			data: {
				paypal 		: paypal,
				payoneer 	: payoneer
			},
			success:function(res){
				if(res == 0){
					window.location.href = 'http://localhost:8012/teemarket/seller/payment';
				}
				else {
					console.log("Add payment error");
					return;
				}
			},
			error:function(res){
				console.log("Ajax call error");
				return;
			}
		});
		return;
	}
	if (!regEmail.exec(paypal) || !regEmail.exec(payoneer)) {
		toastr.error("The email field must be a valid email.");
		return;
	}
})

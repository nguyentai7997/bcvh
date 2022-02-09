$( document ).ready(function() {
	var obj = document.getElementsByClassName('selected-color');
	var myClass = obj[0].className;
	var replace1 = myClass.replace('bg-colors ','');
	var myColor = replace1.replace(' active selected-color','');
	// console.log(myColor);

	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_color_code',
		type: 'post',
		data: {
			myColor : myColor,
		},
		success:function(res){
			var object = JSON.parse(res);
			$(".designer-style-front").css("background-color",object[0]['color_code']);
		},
		error:function(res){
			console.log("Ajax call error.");
		}
	});
});
function toggleColor(color) {
	if (color.className.includes('active')){
		color.classList.remove('active');
	} else {
		color.classList.add('active');
	}
}

function hoverColor(color) {
	var myClass = color.className;
	var replace1 = myClass.replace('bg-colors ','');
	var replace2 = replace1.replace(' ','');
	var myColor = replace2.replace('active','');

	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_color_code',
		type: 'post',
		data: {
			myColor : myColor,
		},
		success:function(res){
			var object = JSON.parse(res);
			$(".designer-style-front").css("background-color",object[0]['color_code']);
		},
		error:function(res){
			console.log("Ajax call error.");
		}
	});
}

function mouseOutColor(color) {
	var obj = document.getElementsByClassName('selected-color');
	var myClass = obj[0].className;
	var replace1 = myClass.replace('bg-colors ','');
	var myColor = replace1.replace(' active selected-color','');
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_color_code',
		type: 'post',
		data: {
			myColor : myColor,
		},
		success:function(res){
			var object = JSON.parse(res);
			$(".designer-style-front").css("background-color",object[0]['color_code']);
		},
		error:function(res){
			console.log("Ajax call error.");
		}
	});
}

$('.back-step').click(function (event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/design';
});

function count_dot(str){
	var count = 0;
	for (var position = 0; position < str.length; position++)
	{
		if (str.charAt(position) == ".")
		{
			count += 1;
		}
	}
	return count;
}

//Check input price
$(".price").keydown(function(event) {
	var regExp = /^[.]{1}$/;
	if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 190 || event.keyCode == 110) {
		// Allow normal operation
		$(".price").keyup(function (event) {
			if (regExp.exec($(".price").val())) {
				$(".profit-item").html(-7.50);
			} else if (count_dot($(".price").val()) < 2) {
				//Estimate Profit
				var price = Math.round($(".price").val() * 100) / 100
				var estimate = price - 7.50;
				$(".profit-item").html(estimate.toFixed(2));
			}
		})
	} else {
		// Prevent the rest
		event.preventDefault();
	}
})

$(".price").change(function (event) {
	var price = Math.round($(".price").val() * 100) / 100;
	$(".price").val(price.toFixed(2));
	if (price < 7.50) {
		$(".price").val('7.50');
		$(".profit-item").html('0.00');

		$(".animsition").addClass("modal-open");
		$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
		$(".low-price").addClass("show");
		$(".low-price").css("display","block");
		$(".close-modal").click(function (event) {
			$(".low-price").removeClass("show");
			$(".low-price").css("display","none");
			$(".modal-backdrop").remove();
			$(".animsition").removeClass("modal-open");
			$(".price").focus();
		});
	}
	if (price > 28.00) {
		$(".price").val('28.00');
		$(".profit-item").html('20.50');
		$(".animsition").addClass("modal-open");
		$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
		$(".high-price").addClass("show");
		$(".high-price").css("display","block");
		$(".close-modal").click(function (event) {
			$(".high-price").removeClass("show");
			$(".high-price").css("display","none");
			$(".modal-backdrop").remove();
			$(".animsition").removeClass("modal-open");
			$(".price").focus();
		});
	}
	if (!$.isNumeric($(".price").val())) {
		$(".price").val('21.99');
		$(".profit-item").html('14.49');
		$(".animsition").addClass("modal-open");
		$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
		$(".invalid-price").addClass("show");
		$(".invalid-price").css("display","block");
		$(".close-modal").click(function (event) {
			$(".invalid-price").removeClass("show");
			$(".invalid-price").css("display","none");
			$(".modal-backdrop").remove();
			$(".animsition").removeClass("modal-open");
			$(".price").focus();
		});
	}
})

$('.next-step').click(function (event) {
	var product_color_list =  document.getElementById("product-color-list").getElementsByClassName("active");
	var price = $('.price').val();
	var resultColors = [];
	for (var i = 0; i < product_color_list.length; i++) {
		var res = product_color_list[i].style.backgroundColor;
		resultColors.push(res);
	}
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/get_product',
		type: 'post',
		data: {
			resultColors : resultColors,
			price : price
		},
		success:function(res){
			window.location.href = 'http://localhost:8012/teemarket/seller/launch';
		},
		error:function(res){
			console.log("Ajax call error.");
		}
	});
});















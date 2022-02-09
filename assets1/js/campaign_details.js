$(".back").click(function (event) {
	window.history.back();
});

// Check Title Input
$(".title").change(function(event){
	var title  = $('.title').val();
	var regExp = /\S/;
	if (!regExp.exec(title)) {
		$(".title-required").css("display","block");
	} else {
		$(".title-required").css("display","none");
	}
});

//Check Description Input
$(".description").change(function (event) {
	var description = $(".description").val();
	var regExp = /\S/;
	if (!regExp.exec(description)){
		$('.description-required').css('display','block');
	} else {
		$('.description-required').css('display','none');
	}
});

$('.save').click(function (event) {
	var id = $(".id").text();
	var title = $('.title').val();
	var description = $('.description').val();
	var category= $('select[name=category] option').filter(':selected').val();
	var regExp = /\S/;

	if (!regExp.exec(title)) {
		$(".title-required").css("display","block");
	}

	if (!regExp.exec(description)) {
		$('.description-required').css('display','block');
	}

	if (!regExp.exec(title) || !regExp.exec(description)) {
		return;
	}

	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/update_campaign',
		type: 'post',
		data: {
			id 			: id,
			title 		: title,
			description : description,
			category 	: category,
		},
		success:function(res){
			window.location.href = '';
		},
		error:function(res){
			console.log("Ajax call error.");
		}
	});
});

$(".end-campaign").click(function (event) {
	console.log("stat")
	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-warning").addClass("show");
	$(".modal-warning").css("display","block");
	$(".end").click(function (event) {
		$(".modal-warning").removeClass("show");
		$(".modal-warning").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
		var id = $(".id").text();
		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/end_campaign',
			type: 'post',
			data: {
				id : id,
			},
			success:function(res){
				window.location.href = '';
			},
			error:function(res){
				console.log("Ajax call error.");
			}
		});
	});
	$(".cancel").click(function (event) {
		$(".modal-warning").removeClass("show");
		$(".modal-warning").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	})
})

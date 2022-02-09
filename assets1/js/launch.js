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

//Check URL input
$(".url").change(function (event) {
	var url = $(".url").val().toLowerCase();
	var regExp = /^[a-z0-9--]{4,100}$/;
	if (!regExp.exec(url)){
		$('.url-invalid').css('display','block');
		$('.url-error').css('display','none');
	} else {
		$('.url-invalid').css('display','none');

		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/check_url',
			type: 'post',
			data: {
				url : url
			},
			success:function(res){
				if(res == 0){
					$('.url-error').css('display','none');
				}
				else {
					$('.url-error').css('display','block');
				}
			},
			error:function(res){
				console.log('Ajax call error.');
			}
		});
	}
});

$('.back-step').click(function (event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/product';
});

$('.next-step').click(function (event) {
	var title = $('.title').val();
   	var description = $('.description').val();
   	var url = $('.url').val().toLowerCase();
   	var category= $('select[name=category] option').filter(':selected').val();
	var regExp = /\S/;
	var regURL = /^[a-z0-9--]{4,100}$/;

	if (!regExp.exec(title)) {
		$(".title-required").css("display","block");
	}

	if (!regExp.exec(description)) {
		$('.description-required').css('display','block');
	}

	if (!regURL.exec(url)) {
		$('.url-invalid').css('display','block');
	}

	if (!regExp.exec(title) || !regExp.exec(description) || !regURL.exec(url)) {
		return;
	}

	if (regURL.exec(url)){
		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/check_url',
			type: 'post',
			data: {
				url : url
			},
			success:function(res){
				if(res == 0){
					$(".animsition").addClass("modal-open");
					$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
					$(".modal-loading").addClass("show");
					$(".modal-loading").css("display","block");
					$.ajax({
						url: 'http://localhost:8012/teemarket/seller/get_launch',
						type: 'post',
						data: {
							title : title,
							description : description,
							url : url,
							category : category,
						},
						success:function(kq){
							var obj = JSON.parse(kq);
							$(".modal-loading").removeClass("show");
							$(".modal-loading").css("display","none");
							$(".modal-backdrop").remove();
							$(".animsition").removeClass("modal-open");
							window.location.href = 'http://localhost:8012/teemarket/seller/campaign_details/'+obj;
						},
						error:function(res){
							console.log("Ajax call error 1.");
						}
					});
				}
				else {
					toastr.error('URL is already taken.');
					return;
				}
			},
			error:function(res){
				console.log('Ajax call error 2.');
				return;
			}
		});
	} else {
		toastr.error('Invalid characters in the URL. The length of the URL should be between 4-100 characters. Words may be separated by "-".');
		return;
	}
});



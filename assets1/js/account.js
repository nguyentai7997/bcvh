//Check current password input
$('#current-pass').change(function(event) {
	var current_pass = $('#current-pass').val();
	var regPass = /\S/;
	if (!regPass.exec(current_pass)){
		$('.current-pass-required').css('display','block');
	} else{
		$('.current-pass-required').css('display','none');
	}
});

//Check new password input
$('#new-pass').change(function(event) {
	var new_pass = $('#new-pass').val();
	var regPass1 = /\S/;
	var regPass2 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
	if (!regPass1.exec(new_pass)){
		$('.new-pass-required').css('display','block');
		$('.new-pass-error').css('display','none');
		if (new_pass == ""){
			$('.cf-pass-required').css('display', 'none');
			$('.cf-pass-error').css('display', 'none');
		}
	} else{
		$('.new-pass-required').css('display','none');
		if (regPass2.exec(new_pass)){
			$('.new-pass-error').css('display','none');
			$('.cf-pass-required').css('display', 'none');
			var cf_pass = $('#cf-pass').val();
			if (cf_pass == "" || cf_pass == new_pass){
				$('.cf-pass-error').css('display', 'none');
			} else {
				$('.cf-pass-error').css('display', 'block');
			}
		} else {
			$('.new-pass-error').css('display','block');
			$('.cf-pass-error').css('display', 'none');
		}
	}
});

//Check confirm password input
$('#cf-pass').change(function(event) {
	var new_pass = $('#new-pass').val();
	var cf_pass = $('#cf-pass').val();
	if (new_pass == '' || new_pass == cf_pass){
		$('.cf-pass-required').css('display', 'none');
		$('.cf-pass-error').css('display', 'none');
	} else {
		if(cf_pass == '') {
			$('.cf-pass-required').css('display', 'block');
			$('.cf-pass-error').css('display', 'none');
		} else {
			$('.cf-pass-required').css('display', 'none');
			$('.cf-pass-error').css('display', 'block');
		}
	}
});

//Click Change Password
$('.change-password').click(function(event) {
	var current_pass = $('#current-pass').val();
	var new_pass = $('#new-pass').val();
	var cf_pass = $('#cf-pass').val();

	var regExp = /\S/;
	var regPass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

	if (!regExp.exec(current_pass)){
		$('.current-pass-required').css('display','block');
	}
	if (!regExp.exec(new_pass)){
		$('.new-pass-required').css('display','block');
	}
	if (!regExp.exec(cf_pass)){
		$('.cf-pass-required').css('display','block');
	}
	if (!regExp.exec(current_pass) || !regExp.exec(new_pass) || !regExp.exec(cf_pass)){
		return;
	}

	if (!regPass.exec(new_pass)){
		return;
	}

	if (cf_pass != new_pass){
		return;
	}

	//Check current password and update password
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/change_password',
		type: 'post',
		// dataType: 'json',
		data: {
			current_pass: current_pass,
			new_pass	: new_pass,
		},success:function(res) {
			if(res == 0) {
				$(".animsition").addClass("modal-open");
				$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
				$(".modal-success").addClass("show");
				$(".modal-success").css("display","block");
				$(".close-modal").click(function (event) {
					$(".modal-success").removeClass("show");
					$(".modal-success").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");
					window.location.href = 'http://localhost:8012/teemarket/seller/account';
				});
			} if (res == 2) {
				toastr.error("Incorrect current password provided.");
			}
		},error:function(res){
			console.log("Ajax call error.");
		}
	});
});

//Check Public Name
$(".publicname").change(function(event){
	var publicname  = $('.publicname').val().toLowerCase();
	var regPN1 = /\S/;
	var regPN2 = /^[a-z0-9]{3,40}$/;
	if(!regPN1.exec(publicname)) { //Th public name chi toan khoang trang
		$('.pn-required').css('display','block');
		$('.pn-error').css('display','none');
		$('.pn-invalid').css('display', 'none');
		$('.public-name').text('public-name');
		$('.public-name').css('color','unset');
	} else {
		$('.pn-required').css('display','none');
		if (regPN2.exec(publicname)){
			$('.pn-invalid').css('display', 'none');
			if (publicname == 'seller' || publicname == 'admin') {
				$('.pn-error').css('display', 'block');
				$('.public-name').text('public-name');
				$('.public-name').css('color','unset');
				toastr.error('Public name is already taken.');
			} else {
				$.ajax({
					url: 'http://localhost:8012/teemarket/check_public_name',
					type: 'post',
					data: {
						publicname : publicname
					},
					success:function(res){
						if(res == 0){
							$('.pn-error').css('display','none');
							$('.public-name').text(publicname);
							$('.public-name').css('color','#fb8c00');
						}
						else {
							$('.pn-error').css('display', 'block');
							$('.public-name').text('public-name');
							$('.public-name').css('color','unset');
							toastr.error('Public name is already taken.');
						}
					},
					error:function(res){
						console.log('Ajax call error.');
					}
				});
			}
		} else {
			$('.pn-error').css('display','none');
			$('.pn-invalid').css('display', 'block');
			$('.public-name').text('public-name');
			$('.public-name').css('color','unset');
			toastr.error('Invalid public name provided. Public names must be between 3 and 40 alphanumeric characters excluding special characters and spaces.');
		}
	}
});

//Check Full Name Input
$('.fullname').change(function (event) {
	var fullname = $('.fullname').val();
	var regFN = /\S/; //Ký tự không phải khoảng trắng
	if (!regFN.exec(fullname)){ //TH Full Name chỉ toàn khoảng trắng
		$('.fn-required').css('display','block');
	} else {
		$('.fn-required').css('display','none');
	}
});

$(".save-info").click(function (event) {
	var publicname  = $('.publicname').val().toLowerCase();
	var fullname = $('.fullname').val();
	var address = $('.address').val();
	var countries = $('.countries').val();
	var states = $('.states').val();
	var cities = $('.cities').val();
	var zip = $('.zip').val();
	var phone = $('.phone').val();

	var regExp = /\S/;
	var regPN = /^[a-z0-9]{3,40}$/;

	if (!regExp.exec(publicname)){
		$('.pn-required').css('display','block');
	}
	if (!regExp.exec(fullname)){
		$('.fn-required').css('display','block');
	}
	if (!regExp.exec(fullname) || !regExp.exec(publicname)){
		return;
	}

	if (regPN.exec(publicname)){
		if (publicname == 'seller' || publicname == 'admin') {
			toastr.error('Public name is already taken.');
			return;
		} else {
			$.ajax({
				url: 'http://localhost:8012/teemarket/check_public_name',
				type: 'post',
				data: {
					publicname : publicname
				},
				success:function(res){
					if(res == 0){
					}
					else {
						toastr.error('Public name is already taken.');
						return;
					}
				},
				error:function(res){
					console.log('Ajax call error.');
					return;
				}
			});
		}
	} else {
		toastr.error('Invalid public name provided. Public names must be between 3 and 40 alphanumeric characters excluding special characters and spaces.');
		return;
	}

	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/update_info',
		type: 'post',
		dataType: 'json',
		data: {
			fullname	: fullname,
			publicname	: publicname,
			address		: address,
			countries	: countries,
			states		: states,
			cities		: cities,
			zip			: zip,
			phone		: phone,
		},success:function(res) {
			if(res == 0) {
				window.location.href = 'http://localhost:8012/teemarket/seller/account';
			} else {
				console.log("Insert error.");
			}
		},error:function(res){
			console.log("Ajax call error.");
		}
	});
})

if ($("#countryId option").val() != ""){
	console.log($("#countryId option").val());
	$("#countryId option").innerHTML = "Viet Nam";
}


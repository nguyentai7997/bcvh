$(document).ready(function(){
	//Check Email Sign In
	$("#usernameSignIn").change(function(event){
		var usernameSignIn  = $('#usernameSignIn').val();
		var regusernameSignIn = /\S/;
		if (!regusernameSignIn.exec(usernameSignIn)) {//TH username chi toan khoang trang
			$('.username-required').css('display', 'block');
		} else {
			$('.username-required').css('display', 'none');
		}
	});

	// Check Password Sign In
	$("#passwordSignIn").change(function (event) {
		var passwordSignIn = $('#passwordSignIn').val();
		var regPasswordSignIn = /\S/;
		if (!regPasswordSignIn.exec(passwordSignIn)){ //TH Password chi toan khoang trang
			$('.password-required').css('display','block');
		} else{
			$('.password-required').css('display','none');
		}
	});

	//Click button Sign In
	$('.signin').click(function(event) {
		var usernameSignIn  = $('#usernameSignIn').val();
		var passwordSignIn  = $('#passwordSignIn').val();

		var regExp = /\S/;

		if (!regExp.exec(usernameSignIn)){
			$('.username-required').css('display','block');
		}
		if (!regExp.exec(passwordSignIn)){
			$('.password-required').css('display','block');
		}

		if (!regExp.exec(usernameSignIn) || !regExp.exec(passwordSignIn)){
			return;
		}

		$.ajax({
			url: 'http://localhost:8012/bcvh/check_sign_in',
			type: 'post',
			data: {
				usernameSignIn	: usernameSignIn,
				passwordSignIn	: passwordSignIn
			},success:function(res) {
				if(res == 0) {
					window.location.href = 'http://localhost:8012/bcvh';
				} else {
					toastr.error('Thông tin đăng nhập không chính xác, vui lòng thử lại.');
				}
			},error:function(res){
				console.log("Ajax call error.");
			}
		})
	});
});




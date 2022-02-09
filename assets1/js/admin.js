//Check Email Sign In
$("#inputEmail").change(function(event){
	var emailSignIn  = $('#inputEmail').val();
	var regEmailSignIn1 = /\S/;
	var regEmailSignIn2 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (!regEmailSignIn1.exec(emailSignIn)) {//TH Email chi toan khoang trang
		$('.email-required').css('display', 'block');
		$('.email-invalid').css('display', 'none');
	} else {
		$('.email-required').css('display', 'none');
		if (regEmailSignIn2.exec(emailSignIn)){
			$('.email-invalid').css('display', 'none');
		} else {
			$('.email-invalid').css('display', 'block');
		}
	}
});

// Check Password Sign In
$("#inputPassword").change(function (event) {
	var passwordSignIn = $('#inputPassword').val();
	var regPasswordSignIn = /\S/;
	if (!regPasswordSignIn.exec(passwordSignIn)){ //TH Password chi toan khoang trang
		$('.password-required').css('display','block');
		$('.password-error').css('display','none');
	} else{
		$('.password-required').css('display','none');
		if (passwordSignIn.length < 8){
			$('.password-error').css('display','block');
		} else {
			$('.password-error').css('display','none');
		}
	}
});

//Click button Sign In
$('.signin').click(function(event) {
	var emailSignIn  = $('#inputEmail').val();
	var passwordSignIn  = $('#inputPassword').val();

	var regEmailSignIn = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var regExp = /\S/;

	if (!regExp.exec(emailSignIn)){
		$('.email-required').css('display','block');
	}
	if (!regExp.exec(passwordSignIn)){
		$('.password-required').css('display','block');
	}

	if (!regExp.exec(emailSignIn) || !regExp.exec(passwordSignIn)){
		return;
	}

	if (!regEmailSignIn.exec(emailSignIn)){
		return;
	}

	if (passwordSignIn.length < 8){
		return;
	}

	$.ajax({
		url: 'http://localhost:8012/vhht/admin/check_sign_in',
		type: 'post',
		data: {
			emailSignIn		: emailSignIn,
			passwordSignIn	: passwordSignIn
		},success:function(res) {
			if(res == 0) {
				window.location.href = 'http://localhost:8012/vhht/admin/dashboard';
			} else {
				toastr.error('Incorrect login information, please try again.');
				toastr.error('Invalid credentials provided.');
			}
		},error:function(res){
			console.log("Ajax call error.");
		}
	})
});

$('.seller').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/seller/dashboard';
});
$('._dashboard').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/admin/dashboard';
});
$('.campaigns').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/admin/campaigns';
});
$('.mockups').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/admin/mockups';
});
// $('.categories').click(function(event) {
// 	window.location.href = 'http://localhost:8012/vhht/admin/categories';
// });
$('.orders').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/admin/orders';
});
$('.payouts').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/admin/payouts';
});
$('.users').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/admin/users';
});
$('.logout').click(function(event) {
	window.location.href = 'http://localhost:8012/vhht/admin/logout';
});
$(".back").click(function (event) {
	window.history.back();
});

//Page Campaigns
$(".more").click(function (event) {
	var id = $(this).children().val();
	window.location.href = 'http://localhost:8012/vhht/admin/campaign_details/'+id;
})

//Page Orders
// $(".edit-order").click(function (event) {
// 	var data = $(this).children().val();
// 	var order_id = data.substr(0, data.indexOf('-'));
// 	var temp_status = data.substr(data.indexOf("-") + 1);
// 	$(".order-id").html(order_id);
//
// 	$(".animsition").addClass("modal-open");
// 	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
// 	$(".modal-edit").addClass("show");
// 	$(".modal-edit").css("display","block");
//
// 	$(".cancel-edit").click(function () {
// 		$(".modal-edit").removeClass("show");
// 		$(".modal-edit").css("display","none");
// 		$(".modal-backdrop").remove();
// 		$(".animsition").removeClass("modal-open");
// 		$("option").remove();
// 	})
//
// 	if (temp_status == 'pending'){
// 		$(".form-control").append('<option value="pending" selected>PENDING</option>');
// 		$(".form-control").append('<option value="requested">REQUESTED</option>');
// 		$(".form-control").append('<option value="cancelled">CANCELLED</option>');
// 	} else if (temp_status == 'requested'){
// 		$(".form-control").append('<option value="pending">PENDING</option>');
// 		$(".form-control").append('<option value="requested" selected>REQUESTED</option>');
// 		$(".form-control").append('<option value="cancelled">CANCELLED</option>');
// 	} else if (temp_status == 'cancelled'){
// 		$(".form-control").append('<option value="pending">PENDING</option>');
// 		$(".form-control").append('<option value="requested">REQUESTED</option>');
// 		$(".form-control").append('<option value="cancelled" selected>CANCELLED</option>');
// 	}
//
// 	$('.edit').click(function (event) {
// 		var status = $('select[name=status] option').filter(':selected').val();
// 		$.ajax({
// 			url: 'http://localhost:8012/vhht/admin/update_order',
// 			type: 'post',
// 			data: {
// 				order_id : order_id,
// 				status : status,
// 			},
// 			success:function(res){
// 				if (res == 1){
// 					$(".modal-edit").removeClass("show");
// 					$(".modal-edit").css("display","none");
// 					$(".edit-success").addClass("show");
// 					$(".edit-success").css("display","block");
// 					$(".close-modal").click(function () {
// 						$(".edit-success").removeClass("show");
// 						$(".edit-success").css("display","none");
// 						$(".modal-backdrop").remove();
// 						$(".animsition").removeClass("modal-open");
// 						window.location.href = 'http://localhost:8012/vhht/admin/orders';
// 					})
// 				} else {
// 					console.log("Update fail");
// 				}
// 			},
// 			error:function(res){
// 				console.log("Ajax call error.");
// 			}
// 		});
// 	})
// })

//Page Mockups
$(".create-mockup").click(function (event) {
	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-create").addClass("show");
	$(".modal-create").css("display","block");

	$(".close-modal").click(function () {
		$(".modal-create").removeClass("show");
		$(".modal-create").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	});

	//Thay doi ten mockup
	$(".color-name").change(function () {
		var color_name = $('.color-name').val();
		var regExp = /\S/; //Ký tự không phải khoảng trắng
		if (!regExp.exec(color_name)){ //TH color name chỉ toàn khoảng trắng
			$('.color-name-required').css('display','block');
		} else {
			$('.color-name-required').css('display','none');
		}
	})

	//Check input up image mockup
	$('#file-upload').change(function (event) {
		var fi = document.getElementById('file-upload');
		if (fi.files.length > 0) {      // FIRST CHECK IF ANY FILE IS SELECTED.
			for (var i = 0; i <= fi.files.length - 1; i++) {
				var fileName, fileExtension;

				// FILE NAME AND EXTENSION.
				fileName = fi.files.item(i).name;
				fileExtension = fileName.replace(/^.*\./, '');

				// CHECK IF ITS AN IMAGE FILE.
				// TO GET THE IMAGE WIDTH AND HEIGHT, WE'LL USE fileReader().
				if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') {
					readImageFile(fi.files.item(i));             // GET IMAGE INFO USING fileReader().
					$('.file-invalid').css('display','none');
				}
				else {
					// IF THE FILE IS NOT AN IMAGE.
					$('.file-invalid').css('display','block');
					return;
				}
			}
		}
	})

	// GET THE IMAGE WIDTH AND HEIGHT USING fileReader() API.
	function readImageFile(file) {
		var reader = new FileReader(); // CREATE AN NEW INSTANCE.
		reader.readAsDataURL(file);
		reader.onload = function (e) {
			var img = new Image();
			img.src = e.target.result;

			img.onload = function () {
				var w = this.width;
				var h = this.height;

				if (w < 530 || h < 630) { // If width and height too small
					$('.file-error').css('display','block');
					return;
				} else {
					$('.file-error').css('display','none');
					var CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/vhht/upload';
					var CLOUDINARY_UPLOAD_PRESET = 'dfr3fs5c';

					var imgPreview = document.getElementById('img-preview');
					var formData = new FormData();
					formData.append('file',file);
					formData.append('upload_preset',CLOUDINARY_UPLOAD_PRESET);

					$(".animsition").addClass("modal-open");
					$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
					$(".modal-loading").addClass("show");
					$(".modal-loading").css("display","block");

					axios({
						url : CLOUDINARY_URL,
						method : 'POST',
						headers: {
							'CONTENT-TYPE' : 'application/x-www-form-urlencoded'
						},
						data : formData
					}).then(function (res) {
						imgPreview.src = res.data.secure_url;
						$(".modal-loading").removeClass("show");
						$(".modal-loading").css("display","none");
					}).catch(function (err) {
						console.error(err);
					});
				}
			}
		};
	}

	$(".create").click(function () {
		var color_name = $('.color-name').val();
		var color_code = $('#favcolor').val();
		var src_image= $('#img-preview').attr('src');
		var regExp = /\S/;

		if (!regExp.exec(color_name)){
			$('.color-name-required').css('display','block');
			return;
		}

		if (src_image != ''){
			$.ajax({
				url: 'http://localhost:8012/vhht/admin/create_mockup',
				type: 'post',
				data: {
					color_name : color_name,
					color_code : color_code,
					src_image : src_image
				},
				success:function(res){
					if (res == 1) {
						$(".modal-create").removeClass("show");
						$(".modal-create").css("display","none");
						$(".modal-backdrop").remove();
						$(".animsition").removeClass("modal-open");

						$(".animsition").addClass("modal-open");
						$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
						$(".create-success").addClass("show");
						$(".create-success").css("display","block");

						$(".close-modal").click(function () {
							$(".create-success").removeClass("show");
							$(".create-success").css("display","none");
							$(".modal-backdrop").remove();
							$(".animsition").removeClass("modal-open");
							window.location.href = 'http://localhost:8012/vhht/admin/mockups';
						});
					} else {
						console.log("Insert Error");
					}
				},
				error:function(res){
					console.log("Ajax call error.");
				}
			});
		} else {
			$('.file-required').css('display','block');
			return;
		}
	})

})

$('.edit-mockup').click(function () {
	var data = $(this).children().val();
	var res = data.split("/");
	var color_id = res[0];
	var color_name = res[1];
	var color_code = res[2];//theo rgb

	function RGBToHex(rgb) {
		// Choose correct separator
		let sep = rgb.indexOf(",") > -1 ? "," : " ";
		// Turn "rgb(r,g,b)" into [r,g,b]
		rgb = rgb.substr(4).split(")")[0].split(sep);

		let r = (+rgb[0]).toString(16),
			g = (+rgb[1]).toString(16),
			b = (+rgb[2]).toString(16);

		if (r.length == 1)
			r = "0" + r;
		if (g.length == 1)
			g = "0" + g;
		if (b.length == 1)
			b = "0" + b;

		return "#" + r + g + b;
	}

	var hexColor = RGBToHex(color_code);

	$(".mockup-id").html(color_id);
	$(".color-name-edit").val(color_name);
	$("#modal-favcolor").val(hexColor);

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-edit").addClass("show");
	$(".modal-edit").css("display","block");

	$(".close-modal").click(function () {
		$(".modal-edit").removeClass("show");
		$(".modal-edit").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	})

	//Thay doi ten mockup
	$(".color-name-edit").change(function () {
		var color_name = $('.color-name-edit').val();
		var regExp = /\S/; //Ký tự không phải khoảng trắng
		if (!regExp.exec(color_name)){ //TH color name chỉ toàn khoảng trắng
			$('.color-name-required').css('display','block');
		} else {
			$('.color-name-required').css('display','none');
		}
	})

	$(".edit").click(function () {
		var color_name = $('.color-name-edit').val();
		var color_code = $('#modal-favcolor').val();

		var regExp = /\S/;
		if (!regExp.exec(color_name)){
			$('.color-name-required').css('display','block');
			return;
		} else {
			$.ajax({
				url: 'http://localhost:8012/vhht/admin/update_mockup',
				type: 'post',
				data: {
					color_id: color_id,
					color_name : color_name,
					color_code : color_code,
				},
				success:function(res){
					if (res == 1) {
						$(".modal-edit").removeClass("show");
						$(".modal-edit").css("display","none");
						$(".modal-backdrop").remove();
						$(".animsition").removeClass("modal-open");

						$(".animsition").addClass("modal-open");
						$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
						$(".edit-success").addClass("show");
						$(".edit-success").css("display","block");

						$(".close-modal").click(function () {
							$(".edit-success").removeClass("show");
							$(".edit-success").css("display","none");
							$(".modal-backdrop").remove();
							$(".animsition").removeClass("modal-open");
							window.location.href = 'http://localhost:8012/vhht/admin/mockups';
						});
					} else {
						console.log("Update Error");
					}
				},
				error:function(res){
					console.log("Ajax call error.");
				}
			});
		}
	})
})

$(".delete-mockup").click(function (event) {
	var id = $(this).children().val();
	console.log($(this).children());
	$(".mockup-id").html(id);

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-delete").addClass("show");
	$(".modal-delete").css("display","block");

	$(".cancel-delete").click(function () {
		$(".modal-delete").removeClass("show");
		$(".modal-delete").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	})

	$('.delete').click(function (event) {
		$(".modal-delete").removeClass("show");
		$(".modal-delete").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
		$.ajax({
			url: 'http://localhost:8012/vhht/admin/delete_mockup',
			type: 'post',
			data: {
				id : id,
			},
			success:function(res){
				if (res == 0){
					window.location.href = 'http://localhost:8012/vhht/admin/mockups';
				} else if (res == 1){
					$(".mockup-id").html(id);
					$(".animsition").addClass("modal-open");
					$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
					$(".modal-delete-error").addClass("show");
					$(".modal-delete-error").css("display","block");

					$(".close-modal").click(function () {
						$(".modal-delete-error").removeClass("show");
						$(".modal-delete-error").css("display","none");
						$(".modal-backdrop").remove();
						$(".animsition").removeClass("modal-open");
						window.location.href = 'http://localhost:8012/vhht/admin/mockups';
					})
				}
			},
			error:function(res){
				console.log("Ajax call error.");
			}
		});
	})
})

//Page Categories
$(".create-category").click(function (event) {
	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-create").addClass("show");
	$(".modal-create").css("display","block");

	$(".close-modal").click(function () {
		$(".modal-create").removeClass("show");
		$(".modal-create").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	});

	//Thay doi ten mockup
	$(".category-name").change(function () {
		var category_name = $('.category-name').val();
		var regExp = /\S/; //Ký tự không phải khoảng trắng
		if (!regExp.exec(category_name)){ //TH color name chỉ toàn khoảng trắng
			$('.category-name-required').css('display','block');
		} else {
			$('.category-name-required').css('display','none');
		}
	})

	$(".create").click(function () {
		var category_name = $('.category-name').val();
		var regExp = /\S/;

		if (!regExp.exec(category_name)){
			$('.category-name-required').css('display','block');
			return;
		}

		$.ajax({
			url: 'http://localhost:8012/vhht/admin/create_category',
			type: 'post',
			data: {
				category_name : category_name,
			},
			success:function(res){
				if (res == 1) {
					$(".modal-create").removeClass("show");
					$(".modal-create").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");

					$(".animsition").addClass("modal-open");
					$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
					$(".create-success").addClass("show");
					$(".create-success").css("display","block");

					$(".close-modal").click(function () {
						$(".create-success").removeClass("show");
						$(".create-success").css("display","none");
						$(".modal-backdrop").remove();
						$(".animsition").removeClass("modal-open");
						window.location.href = 'http://localhost:8012/vhht/admin/categories';
					});
				} else {
					console.log("Insert Error");
				}
			},
			error:function(res){
				console.log("Ajax call error.");
			}
		});
	})

})

$('.edit-category').click(function () {
	var data = $(this).children().val();
	var res = data.split("/");
	var category_id = res[0];
	var category = res[1];

	$(".category-id").html(category_id);
	$(".category-name-edit").val(category);

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-edit").addClass("show");
	$(".modal-edit").css("display","block");

	$(".close-modal").click(function () {
		$(".modal-edit").removeClass("show");
		$(".modal-edit").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	})

	//Thay doi ten mockup
	$(".category-name-edit").change(function () {
		var category = $('.category-name-edit').val();
		var regExp = /\S/; //Ký tự không phải khoảng trắng
		if (!regExp.exec(category)){ //TH color name chỉ toàn khoảng trắng
			$('.category-name-required').css('display','block');
		} else {
			$('.category-name-required').css('display','none');
		}
	})

	$(".edit").click(function () {
		var category_name = $('.category-name-edit').val();

		var regExp = /\S/;
		if (!regExp.exec(category_name)){
			$('.category-name-required').css('display','block');
			return;
		} else {
			$.ajax({
				url: 'http://localhost:8012/vhht/admin/update_category',
				type: 'post',
				data: {
					category_id: category_id,
					category_name : category_name,
				},
				success:function(res){
					if (res == 1) {
						$(".modal-edit").removeClass("show");
						$(".modal-edit").css("display","none");
						$(".modal-backdrop").remove();
						$(".animsition").removeClass("modal-open");

						$(".animsition").addClass("modal-open");
						$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
						$(".edit-success").addClass("show");
						$(".edit-success").css("display","block");

						$(".close-modal").click(function () {
							$(".edit-success").removeClass("show");
							$(".edit-success").css("display","none");
							$(".modal-backdrop").remove();
							$(".animsition").removeClass("modal-open");
							window.location.href = 'http://localhost:8012/vhht/admin/categories';
						});
					} else {
						console.log("Update Error");
					}
				},
				error:function(res){
					console.log("Ajax call error.");
				}
			});
		}
	})
})

$(".delete-category").click(function (event) {
	var id = $(this).children().val();
	$(".category-id").html(id);

	$(".animsition").addClass("modal-open");
	$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
	$(".modal-delete").addClass("show");
	$(".modal-delete").css("display","block");

	$(".cancel-delete").click(function () {
		$(".modal-delete").removeClass("show");
		$(".modal-delete").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
	})

	$('.delete').click(function (event) {
		$(".modal-delete").removeClass("show");
		$(".modal-delete").css("display","none");
		$(".modal-backdrop").remove();
		$(".animsition").removeClass("modal-open");
		$.ajax({
			url: 'http://localhost:8012/vhht/admin/delete_category',
			type: 'post',
			data: {
				id : id,
			},
			success:function(res){
				window.location.href = 'http://localhost:8012/vhht/admin/categories';
			},
			error:function(res){
				console.log("Ajax call error.");
			}
		});
	})
})

//Page Users
$(".view-user").click(function (event) {
	var id = $(this).children().val();
	window.location.href = 'http://localhost:8012/vhht/admin/user_details/'+id;
})



//Check input up design
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
			}
			else {
				// IF THE FILE IS NOT AN IMAGE.
				$(".animsition").addClass("modal-open");
				$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
				$(".invalid-image").addClass("show");
				$(".invalid-image").css("display","block");
				$(".close-modal").click(function (event) {
					$("input[type='file']").val('');
					$(".invalid-image").removeClass("show");
					$(".invalid-image").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");
				});
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

			if (w < 800 || h < 800) { // If width and height too small
				$(".animsition").addClass("modal-open");
				$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
				$(".invalid-size").addClass("show");
				$(".invalid-size").css("display","block");
				$(".close-modal").click(function (event) {
					$("input[type='file']").val('');
					$(".invalid-size").removeClass("show");
					$(".invalid-size").css("display","none");
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");
				});
			} else {
				var CLOUDINARY_URL = 'https://api.cloudinary.com/v1_1/teemarket/upload';
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
					$(".modal-backdrop").remove();
					$(".animsition").removeClass("modal-open");
				}).catch(function (err) {
					console.error(err);
				});
			}
		}
	};
}

//Click button remove image
$('.remove-image').click(function (event) {
	$.ajax({
		url: 'http://localhost:8012/teemarket/seller/remove_design',
		type: 'post',
		success:function(res){
			window.location.href = 'http://localhost:8012/teemarket/seller/design';
		},
		error:function(res){
			console.log("Ajax call error.");
		}
	});
});

$('.next-step').click(function(event) {
	var src_image= $('#img-preview').attr('src');
	var color_design = $('.bg-colors.active').css('background-color');
	if (src_image != ''){
		$.ajax({
			url: 'http://localhost:8012/teemarket/seller/get_design',
			type: 'post',
			data: {
				src_image : src_image,
				color_design : color_design
			},
			success:function(res){
				window.location.href = 'http://localhost:8012/teemarket/seller/product';
			},
			error:function(res){
				console.log("Ajax call error.");
			}
		});
	} else {
		$(".animsition").addClass("modal-open");
		$(".animsition").append("<div class=\"modal-backdrop fade show\"></div>");
		$(".not-image").addClass("show");
		$(".not-image").css("display","block");
		$(".close-modal").click(function (event) {
			$(".not-image").removeClass("show");
			$(".not-image").css("display","none");
			$(".modal-backdrop").remove();
			$(".animsition").removeClass("modal-open");
		});
	}
});

function activeColor(color) {
	var obj = document.getElementsByClassName('bg-colors');
	for (i = 0; i<obj.length; i++){
		obj[i].classList.remove('active');
	}
	color.classList.add('active');

	var myClass = color.className;
	var replace1 = myClass.replace('bg-colors ','');
	var myColor = replace1.replace(' active','');

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
	var obj = document.getElementsByClassName('bg-colors active');
	var myClass = obj[0].className;
	var replace1 = myClass.replace('bg-colors ','');
	var myColor = replace1.replace(' active','');

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



























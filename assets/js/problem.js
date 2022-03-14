$(document).ready(function(){
	$('.dates').daterangepicker({
			maxDate: moment(),
			opens: 'center',
			autoUpdateInput: false,
		}, function(start, end, label) {
			var dateStart = moment(start).format("YYYY-MM-DD");
			var dateEnd = moment(end).format("YYYY-MM-DD");
		}
	);
	$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
		$(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
		// var dates = $('.dates').val();
		// console.log(dates);
	});
	$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
		$(this).val('');
	});

	$(".search").click(function(){
		var keyword = $('.keyword').val();
		var dates = $('.dates').val();
		var id_software = $('.software').val();

		var myArray = dates.split(" - ");
		var startDate = myArray[0];
		var endDate = myArray[1];

		if (keyword == '' && dates == '' && id_software == null) {
			toastr.error('Nhập dữ liệu để tìm kiếm.');
		}
		// else {
		// 	$.ajax({
		// 		url: 'http://localhost:8012/bcvh/search',
		// 		type: 'post',
		// 		data: {
		// 			keyword 	: keyword,
		// 			startDate 	: startDate,
		// 			endDate 	: endDate,
		// 			id_software : id_software,
		// 		}, success: function (res) {
		// 			var obj = JSON.parse(res);
		// 			console.log(obj);
		// 			var html = "";
		// 			$('.data').empty();
		//
		// 			html +=						'<div class="row">'
		// 			html +=							'<label class="col-sm-3" style="font-weight: bold;">Phần mềm: </label>'
		// 			html +=							'<div class="col-sm-9">'+obj[0]['software']+'</div>'
		// 			html +=						'</div>'
		//
		// 			html +=						'<div class="row">'
		// 			html +=							'<label class="col-sm-3" style="font-weight: bold;">Chi tiết sự cố: </label>'
		// 			html +=							'<div class="col-sm-9">'+obj[0]['problem_detail']+'</div>'
		// 			html +=						'</div>'
		//
		// 			html +=						'<div class="row">'
		// 			html +=							'<label class="col-sm-3" style="font-weight: bold;">Biện pháp xử lý: </label>'
		// 			html +=							'<div class="col-sm-9">'+obj[0]['solution']+'</div>'
		// 			html +=						'</div>'
		//
		// 			html +=						'<div class="row">'
		// 			html +=							'<label class="col-sm-3" style="font-weight: bold;">Ảnh trao đổi: </label>'
		// 			html +=							'<div class="col-sm-9">'
		// 			html +=								'<div class="thumbnail">'
		// 			html +=									'<div class="thumb">'
		// 			html +=										'<img alt="" src="http://localhost:8012/bcvh/uploads/'+obj[0]['image']+'">'
		// 			html +=									'</div>'
		// 			html +=								'</div>'
		// 			html +=							'</div>'
		// 			html +=						'</div>'
		//
		// 			html +=						'<div class="row">'
		// 			html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày phát sinh: </label>'
		// 			html +=							'<div class="col-sm-9">'+obj[0]['time_start']+'</div>'
		// 			html +=						'</div>'
		//
		// 			html +=						'<div class="row">'
		// 			html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày khắc phục: </label>'
		// 			html +=							'<div class="col-sm-9">'+obj[0]['time_end']+'</div>'
		// 			html +=						'</div>'
		//
		// 			$('.modal-body').append(html);
		// 		}, error: function (res) {
		// 			console.log("Ajax call error.");
		// 		}
		// 	})
		// }
	});


});
function getPage(page) {
	var obj = document.getElementsByClassName('page-item');
	for (i = 0; i<obj.length; i++){
		obj[i].classList.remove('active');
	}
	page.classList.add('active');
	var str = page.innerHTML;
	var matches = str.match(/(\d+)/);
	var pageNumber = matches[0];
	console.log(pageNumber);
	$.ajax({
		url: 'http://localhost:8012/bcvh/pagination_problem',
		type: 'post',
		data: {
			pageNumber: pageNumber
		}, success: function (res) {
			var obj = JSON.parse(res);
			var html = "";
			$('.product').empty();
			for (var i = 0; i < obj.length; i++) {
				html += '<div class="col-6 col-md-4" style="padding-right: 13px;padding-left: 13px;">'
				html += '<div class="product-default inner-quickview inner-icon">'
				html += '<figure>'
				html += '<a href="http://localhost:8012/teemarket/' + obj[i]['publicname'] + '/' + obj[i]['url'] + '">'
				html += '<img id="image" src="' + obj[i]['image_link'] + '">'
				html += '</a>'
				html += '</figure>'
				html += '<div class="product-details text-center">'
				html += '<h2 class="product-title">'
				html += '<a href="http://localhost:8012/teemarket/' + obj[i]['publicname'] + '/' + obj[i]['url'] + '">' + obj[i]['title'] + '</a>'
				html += '</h2>'
				html += '<div class="price-box">'
				html += '<span class="product-price" style="color: #fb8c00;font-weight: 400">$' + obj[i]['price'] + '</span>'
				html += '</div>'
				html += '</div>'
				html += '</div>'
				html += '</div>'
			}
			$('.product').append(html);
		}, error: function (res) {
		}
	})
}

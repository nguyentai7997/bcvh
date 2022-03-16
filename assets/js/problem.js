$(document).ready(function(){
	//Xem sự cố ở problem_view
	$(".viewEvent").click(function(){
		var idEvent = $(this).children().val();
		console.log(idEvent);
		$('#default_modal').addClass('in');
		$('#default_modal').css('display','block');
		$('.wysihtml5-supported').addClass('modal-open');
		$.ajax({
			url: 'http://10.96.3.52:8012/bcvh/viewEvent',
			type: 'post',
			data: {
				idEvent : idEvent,
			}, success: function (res) {
				var obj = JSON.parse(res);
				var html = "";
				$('.modal-view').empty();
				var dateStart = new Date(obj[0]['time_start']);
				var dateEnd = new Date(obj[0]['time_end']);
				html +=						'<div class="row">'
				html +=							'<label class="col-sm-3" style="font-weight: bold;">Phần mềm: </label>'
				html +=							'<div class="col-sm-9">'+obj[0]['software']+'</div>'
				html +=						'</div>'

				html +=						'<div class="row">'
				html +=							'<label class="col-sm-3" style="font-weight: bold;">Chi tiết sự cố: </label>'
				html +=							'<div class="col-sm-9">'+obj[0]['problem_detail']+'</div>'
				html +=						'</div>'

				html +=						'<div class="row">'
				html +=							'<label class="col-sm-3" style="font-weight: bold;">Biện pháp xử lý: </label>'
				html +=							'<div class="col-sm-9">'+obj[0]['solution']+'</div>'
				html +=						'</div>'

				html +=						'<div class="row">'
				html +=							'<label class="col-sm-3" style="font-weight: bold;">Ảnh trao đổi: </label>'
				html +=							'<div class="col-sm-9">'
				html +=								'<div class="thumbnail">'
				html +=									'<div class="thumb">'
				html +=										'<img alt="" src="http://10.96.3.52:8012/bcvh/uploads/'+obj[0]['image']+'">'
				html +=									'</div>'
				html +=								'</div>'
				html +=							'</div>'
				html +=						'</div>'

				html +=						'<div class="row">'
				html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày phát sinh: </label>'
				html +=							'<div class="col-sm-9">'+((dateStart.getMonth() > 8) ? (dateStart.getMonth() + 1) : ('0' + (dateStart.getMonth() + 1))) + '/' + ((dateStart.getDate() > 9) ? dateStart.getDate() : ('0' + dateStart.getDate())) + '/' + dateStart.getFullYear()+'</div>'
				html +=						'</div>'

				html +=						'<div class="row">'
				html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày khắc phục: </label>'
				html +=							'<div class="col-sm-9">'+((dateEnd.getMonth() > 8) ? (dateEnd.getMonth() + 1) : ('0' + (dateEnd.getMonth() + 1))) + '/' + ((dateEnd.getDate() > 9) ? dateEnd.getDate() : ('0' + dateEnd.getDate())) + '/' + dateEnd.getFullYear()+'</div>'
				html +=						'</div>'

				$('.modal-view').append(html);

			}, error: function (res) {
				console.log("Ajax call error.");
			}
		})
		$(".close-modal").click(function () {
			$('#default_modal').removeClass('in');
			$('#default_modal').css('display','none');
			$('.wysihtml5-supported').removeClass('modal-open');
			$('.modal-view').empty();
		})
	});

	//Xoa su co ở problem_view
	$(".deleteProblem").click(function(){
		idProblem = $(this).children().val();
		$('#small_modal').addClass('in');
		$('#small_modal').css('display','block');
		$('.wysihtml5-supported').addClass('modal-open');
		$(".close-modal").click(function () {
			$('#small_modal').removeClass('in');
			$('#small_modal').css('display','none');
			$('.wysihtml5-supported').removeClass('modal-open');
			delete idProblem; //return true
		});

		$(".btnDelete").click(function () {
			$.ajax({
				url: 'http://10.96.3.52:8012/bcvh/deleteProblem',
				type: 'post',
				data: {
					idProblem : idProblem,
				}, success: function (res) {
					window.location.href = 'http://10.96.3.52:8012/bcvh/problem';
				}, error: function (res) {
					console.log("Ajax call error.");
				}
			});
		});

	});

	//Xoá ảnh ở editProblem_view
	$(".removeImage").click(function(){
		$(".thumbnail").remove();
	});

	//Quay lại problem_view
	$(".cancelForm").click(function(){
		window.location.href = 'http://10.96.3.52:8012/bcvh/problem';
	});

	$('.dates').daterangepicker({ //Xổ bảng lịch để chọn
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
});

function getPage(page) {//Chọn trang tại problem
	var obj = document.getElementsByClassName('page-item');
	for (i = 0; i<obj.length; i++){
		obj[i].classList.remove('active');
	}
	page.classList.add('active');
	var str = page.innerHTML;
	var matches = str.match(/(\d+)/);
	var pageNumber = matches[0];
	$.ajax({
		url: 'http://10.96.3.52:8012/bcvh/pagination_problem',
		type: 'post',
		data: {
			pageNumber: pageNumber
		}, success: function (res) {
			var obj = JSON.parse(res);
			var html = "";
			$('.data').empty();
			for (var i = 1; i < obj.length; i++) {
				var date = new Date(obj[i]['time_start']);
				html +=	'<tr>'
				html +=		'<td>'+i+'</td>'
				html +=		'<td>'+obj[i]['software']+'</td>'
				html +=		'<td>'+obj[i]['problem_detail']+'</td>'
				html +=		'<td>'+((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear()+'</td>'
				html +=		'<td>'
				html +=			'<div class="table-controls">'
				html +=				'<button class="btn btn-info btn-icon btn-xs tip" title="Xem">'
				html +=					'<i class="fa fa-eye viewEvent" aria-hidden="true">'
				html +=						'<input type="text" value="'+obj[i]['id_problem']+'" class="sr-only">'
				html +=					'</i>'
				html +=				'</button>'
				if (obj[0] == '3' || obj[0] == '1') {
				html +=				'<a href="http://10.96.3.52:8012/bcvh/editProlem/'+obj[i]['id_problem']+'" class="btn btn-success btn-icon btn-xs tip" style="margin: 0 4px" title="Sửa"><i class="fa fa-pencil"></i></a>'
				html +=				'<button class="btn btn-danger btn-icon btn-xs tip" title="Xoá">'
				html +=					'<i class="fa fa-trash-o deleteProblem" aria-hidden="true">'
				html +=						'<input type="text" value="'+obj[i]['id_problem']+'" class="sr-only">'
				html +=					'</i>'
				html +=				'</button>'
				}
				html +=			'</div>'
				html +=		'</td>'
				html +=	'</tr>'
				}
			$('.data').append(html);

			$(document).ready(function(){
				//Xem sự cố ở problem_view
				$(".viewEvent").click(function(){
					var idEvent = $(this).children().val();
					console.log(idEvent);
					$('#default_modal').addClass('in');
					$('#default_modal').css('display','block');
					$('.wysihtml5-supported').addClass('modal-open');
					$.ajax({
						url: 'http://10.96.3.52:8012/bcvh/viewEvent',
						type: 'post',
						data: {
							idEvent : idEvent,
						}, success: function (res) {
							var obj = JSON.parse(res);
							var html = "";
							$('.modal-view').empty();

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Phần mềm: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['software']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Chi tiết sự cố: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['problem_detail']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Biện pháp xử lý: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['solution']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Ảnh trao đổi: </label>'
							html +=							'<div class="col-sm-9">'
							html +=								'<div class="thumbnail">'
							html +=									'<div class="thumb">'
							html +=										'<img alt="" src="http://10.96.3.52:8012/bcvh/uploads/'+obj[0]['image']+'">'
							html +=									'</div>'
							html +=								'</div>'
							html +=							'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày phát sinh: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['time_start']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày khắc phục: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['time_end']+'</div>'
							html +=						'</div>'

							$('.modal-view').append(html);

						}, error: function (res) {
							console.log("Ajax call error.");
						}
					})
					$(".close-modal").click(function () {
						$('#default_modal').removeClass('in');
						$('#default_modal').css('display','none');
						$('.wysihtml5-supported').removeClass('modal-open');
						$('.modal-view').empty();
					})
				});

				//Xoa su co ở problem_view
				$(".deleteProblem").click(function(){
					idProblem = $(this).children().val();
					$('#small_modal').addClass('in');
					$('#small_modal').css('display','block');
					$('.wysihtml5-supported').addClass('modal-open');
					$(".close-modal").click(function () {
						$('#small_modal').removeClass('in');
						$('#small_modal').css('display','none');
						$('.wysihtml5-supported').removeClass('modal-open');
						delete idProblem; //return true
					});

					$(".btnDelete").click(function () {
						$.ajax({
							url: 'http://10.96.3.52:8012/bcvh/deleteProblem',
							type: 'post',
							data: {
								idProblem : idProblem,
							}, success: function (res) {
								window.location.href = 'http://10.96.3.52:8012/bcvh/problem';
							}, error: function (res) {
								console.log("Ajax call error.");
							}
						});
					});

				});

			});
		}, error: function (res) {
			console.log("Ajax call error.");
		}
	})
}

function getPageSearch(page) {//Chọn trang tại search reusult
	var obj = document.getElementsByClassName('page-item');
	for (i = 0; i<obj.length; i++){
		obj[i].classList.remove('active');
	}
	page.classList.add('active');
	var str = page.innerHTML;
	var matches = str.match(/(\d+)/);
	var pageNumber = matches[0];

	var keyword = $('.keyword').val();
	var dates = $('.dates').val();
	var id_software = $('.software').val();

	var myArray = dates.split(" - ");
	var startDate = myArray[0];
	var endDate = myArray[1];

	$.ajax({
		url: 'http://10.96.3.52:8012/bcvh/pagination_search_problem',
		type: 'post',
		data: {
			pageNumber	: pageNumber,
			keyword		: keyword,
			startDate	: startDate,
			endDate		: endDate,
			id_software	: id_software,
		}, success: function (res) {
			var obj = JSON.parse(res);
			var html = "";
			$('.data').empty();
			for (var i = 1; i < obj.length; i++) {
				var date = new Date(obj[i]['time_start']);
				html +=	'<tr>'
				html +=		'<td>'+i+'</td>'
				html +=		'<td>'+obj[i]['software']+'</td>'
				html +=		'<td>'+obj[i]['problem_detail']+'</td>'
				html +=		'<td>'+((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear()+'</td>'
				html +=		'<td>'
				html +=			'<div class="table-controls">'
				html +=				'<button class="btn btn-info btn-icon btn-xs tip" title="Xem">'
				html +=					'<i class="fa fa-eye viewEvent" aria-hidden="true">'
				html +=						'<input type="text" value="'+obj[i]['id_problem']+'" class="sr-only">'
				html +=					'</i>'
				html +=				'</button>'
				if (obj[0] == '3' || obj[0] == '1') {
					html +=				'<a href="http://10.96.3.52:8012/bcvh/editProlem/'+obj[i]['id_problem']+'" class="btn btn-success btn-icon btn-xs tip" style="margin: 0 4px" title="Sửa"><i class="fa fa-pencil"></i></a>'
					html +=				'<button class="btn btn-danger btn-icon btn-xs tip" title="Xoá">'
					html +=					'<i class="fa fa-trash-o deleteProblem" aria-hidden="true">'
					html +=						'<input type="text" value="'+obj[i]['id_problem']+'" class="sr-only">'
					html +=					'</i>'
					html +=				'</button>'
				}
				html +=			'</div>'
				html +=		'</td>'
				html +=	'</tr>'
			}
			$('.data').append(html);

			$(document).ready(function(){
				//Xem sự cố ở problem_view
				$(".viewEvent").click(function(){
					var idEvent = $(this).children().val();
					console.log(idEvent);
					$('#default_modal').addClass('in');
					$('#default_modal').css('display','block');
					$('.wysihtml5-supported').addClass('modal-open');
					$.ajax({
						url: 'http://10.96.3.52:8012/bcvh/viewEvent',
						type: 'post',
						data: {
							idEvent : idEvent,
						}, success: function (res) {
							var obj = JSON.parse(res);
							var html = "";
							$('.modal-view').empty();

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Phần mềm: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['software']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Chi tiết sự cố: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['problem_detail']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Biện pháp xử lý: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['solution']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Ảnh trao đổi: </label>'
							html +=							'<div class="col-sm-9">'
							html +=								'<div class="thumbnail">'
							html +=									'<div class="thumb">'
							html +=										'<img alt="" src="http://10.96.3.52:8012/bcvh/uploads/'+obj[0]['image']+'">'
							html +=									'</div>'
							html +=								'</div>'
							html +=							'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày phát sinh: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['time_start']+'</div>'
							html +=						'</div>'

							html +=						'<div class="row">'
							html +=							'<label class="col-sm-3" style="font-weight: bold;">Ngày khắc phục: </label>'
							html +=							'<div class="col-sm-9">'+obj[0]['time_end']+'</div>'
							html +=						'</div>'

							$('.modal-view').append(html);

						}, error: function (res) {
							console.log("Ajax call error.");
						}
					})
					$(".close-modal").click(function () {
						$('#default_modal').removeClass('in');
						$('#default_modal').css('display','none');
						$('.wysihtml5-supported').removeClass('modal-open');
						$('.modal-view').empty();
					})
				});

				//Xoa su co ở problem_view
				$(".deleteProblem").click(function(){
					idProblem = $(this).children().val();
					$('#small_modal').addClass('in');
					$('#small_modal').css('display','block');
					$('.wysihtml5-supported').addClass('modal-open');
					$(".close-modal").click(function () {
						$('#small_modal').removeClass('in');
						$('#small_modal').css('display','none');
						$('.wysihtml5-supported').removeClass('modal-open');
						delete idProblem; //return true
					});

					$(".btnDelete").click(function () {
						$.ajax({
							url: 'http://10.96.3.52:8012/bcvh/deleteProblem',
							type: 'post',
							data: {
								idProblem : idProblem,
							}, success: function (res) {
								window.location.href = 'http://10.96.3.52:8012/bcvh/problem';
							}, error: function (res) {
								console.log("Ajax call error.");
							}
						});
					});

				});

			});
		}, error: function (res) {
			console.log("Ajax call error.");
		}
	})
}


$(document).ready(function(){
	//Xem sự cố ở problem_view
	$(".viewEvent").click(function(){
		var idEvent = $(this).children().val();
		$('#default_modal').addClass('in');
		$('#default_modal').css('display','block');
		$('.wysihtml5-supported').addClass('modal-open');
		$.ajax({
			url: 'http://localhost:8012/bcvh/viewEvent',
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
				html +=										'<img alt="" src="http://localhost:8012/bcvh/uploads/'+obj[0]['image']+'">'
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
				url: 'http://localhost:8012/bcvh/deleteProblem',
				type: 'post',
				data: {
					idProblem : idProblem,
				}, success: function (res) {
					window.location.href = 'http://localhost:8012/bcvh/problem';
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
		window.location.href = 'http://localhost:8012/bcvh/problem';
	});

	//Log Out
	$('.logout').click(function() {
		console.log("abc");
		window.location.href = 'http://localhost:8012/bcvh/logout';
	});
});




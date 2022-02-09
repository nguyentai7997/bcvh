$(".admin").click(function (event) {
	window.location.href = 'http://localhost:8012/teemarket/admin/dashboard';
})
$('._dashboard').click(function(event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/dashboard';
});
$('.campaigns').click(function(event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/campaigns';
});
$('.create-campaign').click(function(event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/design';
});
$('.orders').click(function(event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/orders';
});
$('.payouts').click(function(event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/payouts';
});
$('.settings').click(function(event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/account';
});
//Log Out
$('.logout').click(function(event) {
	window.location.href = 'http://localhost:8012/teemarket/seller/logout';
});
$(".more").click(function (event) {
	var id = $(this).children().val();
	window.location.href = 'http://localhost:8012/teemarket/seller/campaign_details/'+id;
})



/*$(document).ready(function() {
	$('#add').click(function() {
		var $lefty = $('#notes');

		$lefty.animate({
			left: parseInt($lefty.css('left'),10) == 0 ? -$lefty.outerWidth() : 0
		});
	});
});*/

$(document).ready(function() {
	$('#add').click(function() {
        $('#notes').animate({left: "-100%"});
        $('#main').css("visibility","visible");
        $('#content').css("visibility","hidden");
	});
});


$('#name').focus(function(){
    $('#new').css("display","none");
});
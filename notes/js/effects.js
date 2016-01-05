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
    
    $('#cancel').click(function() {
        $('#notes').animate({left: "0px"});
        $('#main').css("visibility","hidden");
        //$('#content').css("visibility","visible");
	});
    
    $('#ready').click(function() {
        $('#notes').animate({left: "0px"});
        $('#main').animate({left: "100px"});
        //$('#main').css("visibility","hidden");
        //$('#content').css("visibility","visible");
	});
});


$('#name').focus(function(){
    $('#new').css("display","none");
});

/*var count_click = 0;
function Add(){  
    count_click++;
    var parent = document.getElementById('scroll');  
    var div = document.createElement('div'); 
    div = parent.appendChild(div);  
    div.innerHTML = 'Hello World!'; 
    $(div).attr('id','note'+count_click);
    $(div).addClass('left_notes');
}*/ 
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


function get_cookie ( cookie_name )
{
  var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
  if ( results )
    return ( unescape ( results[2] ) );
  else
    return null;
}
var count_click = 0;
//$(document).ready(
    function Add() {    
    count_click++;
    var parent = document.getElementById('scroll');  
    var div = document.createElement('div'); 
    //var a = get_cookie('name');
    div = parent.appendChild(div);
    //$.session.set('counter',0);
    div.innerHTML = $('#enter').val(); 
    $(div).attr('id','note'+count_click);
    $(div).addClass('left_notes');
    $('#text').css("display","none");
}//);

/*$('#myForm').onsubmit(function(){
    //e.preventDefault();
    var form_data = $('#myForm').serializeArray;
   
    $.ajax({
      url: "notes.php",
      type: "POST",
      data: form_data      
    });
});*/
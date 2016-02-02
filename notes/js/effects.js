$(document).ready(function() {
	$('#add').click(function() {
        $('#notes').animate({left: "-100%"});
        $('#main').css("visibility","visible");
        $('#content').css("visibility","hidden");
	});
    
    $('#cancel').click(function() {
        $('#notes').animate({left: "0px"});
        $('#main').css("visibility","hidden");
	});
    
    $('#ready').click(function() {
        $('#notes').animate({left: "0px"});
        $('#main').animate({left: "100px"});
	});
});


$('#name').focus(function(){
    $('#new').css("display","none");
});

$('#name').focusout(function(){
    var name_val = $('#name').val();
    if (name_val==''){        
        $('#new').css("display","block");
    }
});

 

var parent = document.getElementById('scroll');

$('input[name="save"]').on('click',function (){
     var name = $('input[name="name"]').val();
     var content = $('textarea[name="content"]').val();
     $.ajax({
         url:'save.php',
         method:'POST',
         data:'name='+name+'&'+'content='+content,
         type: 'Json',
         success: function(data){
             data = jQuery.parseJSON(data);
             var div = document.createElement('div');
             var name = document.createElement('div');
             var content = document.createElement('div');
             div = parent.appendChild(div);
             name.innerHTML = data.name;
             content.innerHTML = data.content;
             div.appendChild(name);
             div.appendChild(content);
             div.setAttribute('data-id',data.id_note);
             $(div).addClass('left_notes');
             $('#text').css("display","none");
         }
     });
    
    $('#name').val('');
    $('#new').css("display","block");
    $('#enter').val('');
});

$('input[name="delete"]').on('click',function (){
    var act = $('#scroll').find('.active');
    var id = act.data('id');
    $.ajax({
        url:'delete.php',
        method:'POST',
        data: 'id_note='+id,
        type: 'Json',
        success: function(data){
            data = jQuery.parseJSON(data);
            if(data.status=='success'){                
                act.remove();
                var childs = parent.getElementsByClassName('left_notes');
                if(childs.length==0){
                    $('#text').css("display","block");
                }
            }
        }
    });
});

$(document).on('click','.left_notes',function(){
    $('#scroll').find('.active').removeClass('active');
    $(this).addClass('active');
    var name = $(this).find('div:first').text();
    var content = $(this).find('div:last').text();
    $('input[name="name"]').val(name);
    $('textarea[name="content"]').val(content);
    $('#new').css("display","none");
});


$('input[name=edit]').on('click',function(){
    var name = $('input[name=name]').val();
    var content = $('textarea[name=content]').val();
    var id = $('#scroll').find('.active').data('id');
    $.ajax({
        url:'edit.php',
        method:'POST',
        data:'name='+name+'&'+'content='+content+'&'+'id_note='+id,
        type:'Json',
        success:function(data){
            data = jQuery.parseJSON(data);
            if(data.status=='success'){    
                $('#scroll').find('.active').empty();
                $('#scroll').find('.active').append("<div>" + name + "</div><div>" + content + "</div>");
                $('#name').val('');
                $('#new').css("display","block");
                $('#enter').val('');
            }
        }
    });
});

var childs = parent.getElementsByClassName('left_notes');
if(childs.length==0){
    $('#text').css("display","block");
}
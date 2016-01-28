<?php 
    session_start();

    $name = $_POST['name'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];
    //$_SESSION['counter']=0;

    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('notes');
    
    //if (isset($_POST['submit'])){
       
        //$_SESSION['counter']++;
        
        //$user_id = $_COOKIE['user_id'];
        
        setcookie('name',$name); //название заметки
        setcookie('content',$content); //текст заметки
        //$_COOKIE['name']=$name;
        //$_COOKIE['content']=$content;
        
        $_SESSION['name'] = $name;
        $_SESSION['content'] = $content;
        mysql_query("SET NAMES utf8");
        mysql_query("INSERT INTO note VALUES ('','$name','$content','$user_id')") or die(mysql_error());

        //$counter = $_SESSION['counter'];
        //echo $counter;
        
        //echo("<script>$('note1').html('$name'.'/n'.'$content')</script>");
   //}  
?>
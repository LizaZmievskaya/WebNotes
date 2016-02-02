<?php 
    session_start();

    $name = $_POST['name'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('notes');
        
          
    //$_SESSION['name'] = $name;
    //$_SESSION['content'] = $content;

    mysql_query("SET NAMES utf8");
        
    mysql_query("INSERT INTO note VALUES ('','$name','$content','$user_id')");
    $record=mysql_fetch_array(mysql_query("SELECT * FROM note WHERE (id_users=". $user_id .") AND (content=\"". $content ."\")"));
    echo json_encode($record);
    
    die;
        
?>
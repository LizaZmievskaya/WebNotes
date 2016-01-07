<?php
    session_start();

    //$_SESSION['counter']=0;

    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('notes');
    
    if (isset($_POST['submit'])){
        $name = $_POST['note_name'];
        $content = $_POST['note_content'];
        $user_id = $_SESSION['user_id'];
       
        //$_SESSION['counter']++;
        
        //$user_id = $_COOKIE['user_id'];
        
        setcookie('name',$name); //название заметки
        setcookie('content',$content); //текст заметки
        //$_COOKIE['name']=$name;
        //$_COOKIE['content']=$content;
        
        $_SESSION['name'] = $name;
        $_SESSION['content'] = $content;
       
        mysql_query("INSERT INTO note VALUES ('','$name','$content','$user_id')") or die(mysql_error());
        
        //$counter = $_SESSION['counter'];
        //echo $counter;
        
        //echo("<script>$('note1').html('$name'.'/n'.'$content')</script>");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/notes_style.css">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery.session.js"></script>

</head>

<body>
    <div id="notes">
        <div id="title">
            <div id="center">Заметки</div>
            <!-- <div id="add"></div> -->
        </div>
        <div id="scroll">
            <div id="text">Введите название и текст, затем нажмите кнопку "Готово" для добавления заметки.</div>
        </div>
    </div>
        
    <div id="content"> 
       <form method="post" action="notes.php" id="myForm" target="myIFR">
           <div id="logout"></div>
            <div id="new">Дайте название заметке</div>
            <input name="note_name" id="name" type="text" role="presentation">
            <textarea name="note_content" id="enter" placeholder="Просто начните печатать текст заметки"></textarea>
            <div id="btns">
                <input class="button" type="button" value="Отмена" id="cancel">
                <input name="submit" class="button" type="submit" value="Готово" id="ready" onclick="Add()">
            </div>
        </form>   
        <iframe name="myIFR" style="display: none"></iframe>
    </div>
    
<script src="js/effects.js"></script>
</body>
</html>
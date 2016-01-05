<?php
    session_start();

    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('notes');
    
    if (isset($_POST['submit'])){
        $name = $_POST['note_name'];
        $content = $_POST['note_content'];
        
        $user_id = $_SESSION['user_id'];
       
        mysql_query("UPDATE note SET name='$name', content='$content' WHERE id_users='$user_id'") or die(mysql_error());
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/notes_style.css">
    <script src="js/jquery-2.1.4.min.js"></script>

</head>

<body>
    <div id="main">
        <form method="post" action="notes.php">
            <div id="new">Дайте название заметке</div>
            <input name="note_name" id="name" type="text" role="presentation">
            <!--<div id="type">Просто начните печатать текст заметки</div>
            <input id="enter" type="text" role="presentation">-->
            <textarea name="note_content" id="enter" placeholder="Просто начните печатать текст заметки"></textarea>
            <div id="btns">
                <input class="button" type="button" value="Отмена">
                <input name="submit" class="button" type="submit" value="Готово">
            </div>
        </form>
    </div>
    <div id="notes">
        <div id="title">
            <div id="center">Заметки</div>
            <div id="add"></div>
        </div>
        <div id="scroll">
            <div id="text">Нажмите <img id="add1" src="img/add1.png" height="45">, 
            чтобы добавить заметку.</div>
        </div>
    </div>
    <div id="content">    
        <img id="stik" src="img/stiker.png">
    </div>
    
<script src="js/effects.js"></script>
</body>
</html>
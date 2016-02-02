<?php

    session_start();
    
    $user_id = mysql_real_escape_string($_SESSION['user_id']);

    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('notes');

    mysql_query("SET NAMES utf8");

    $query = mysql_query("SELECT * FROM note  WHERE id_users=$user_id");
    
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
        </div>
        <div id="scroll">
            <div id="text">Введите название и текст, затем нажмите кнопку "Добавить" для добавления заметки.</div>
            <?php while($row=mysql_fetch_assoc($query)){ ?>
            <div data-id="<?=$row['id_note']?>" class="left_notes"><div><?=$row['name']?></div><div><?=$row['content']?></div></div><?php } ?>
        </div>
    </div>
        
    <div id="content">        
        <form action="" method="post">
            <input name="out" type="button" src="img/logout.png" id="logout" value="" onclick="location.href='http://localhost:8080/notes/index.php'">
            <div id="new">Дайте название заметке</div>
            <input name="name" id="name" type="text">
            <textarea name="content" id="enter" placeholder="Просто начните печатать текст заметки"></textarea>
            <div id="btns">
                <input name="save" class="button" type="button" value="Добавить">
                <input name="delete" class="button" type="button" value="Удалить">
                <input name="edit" class="button" type="button" value="Редактировать">
            </div>  
        </form>        
    </div>
    
<script src="js/effects.js"></script>
</body>
</html>
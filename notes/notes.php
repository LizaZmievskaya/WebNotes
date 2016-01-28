<?php
      
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
        </div>
    </div>
        
    <div id="content">        
            <input name="out" type="button" src="img/logout.png" id="logout" value="" onclick="location.href='http://localhost:8080/notes/index.php'">
            <div id="new">Дайте название заметке</div>
            <input name="name" id="name" type="text" role="presentation">
            <textarea name="content" id="enter" placeholder="Просто начните печатать текст заметки"></textarea>
            <div id="btns">
                <input name="save" class="button" type="button" value="Сохранить" onclick="Add()">
                <input class="button" type="button" value="Удалить" id="cancel">
            </div>          
    </div>
    
<script src="js/effects.js"></script>
</body>
</html>
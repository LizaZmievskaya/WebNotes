<?php
    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('notes');
    
    if (isset($_POST['submit'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $password = md5($password);
       
        $query = mysql_query("INSERT INTO users VALUES ('','$login','$password')") or die(mysql_error());
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <form method="post" action="register.php" id="form">
        <div class="center">
            <h1>Создать аккаунт</h1><br>        
            <input type="text" name="login" placeholder="Логин или E-mail" required><br>        
            <input type="password" name="password" placeholder="Пароль" required><br>
            <input type="submit" name="submit" value="Создать аккаунт" id="button"><br>
        </div>
        <p>Уже есть аккаунт?</p>
        <div class="center"><a href="index.php" id="create">Войти</a></div>   
    </form>
</body>
</html>
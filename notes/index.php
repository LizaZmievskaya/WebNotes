<?php
    session_start();
    
    //$_SESSION['counter']=0;
    
    //setcookie('name'); //название заметки
    //setcookie('content'); //текст заметки

    $connect = mysql_connect('localhost','root','') or die(mysql_error());
    mysql_select_db('notes');
    
    if (isset($_POST['submit'])){
        $login = $_POST['login'];
        $password = md5($_POST['password']);
            
        $query = mysql_query("SELECT * FROM users WHERE login='$login'") or die(mysql_error());
        $user_data = mysql_fetch_array($query);
        
        $user_id = $user_data['id_users'];
        $_SESSION['user_id'] = $user_id;
        
        //setcookie('user_id',$user_id); //id пользователя
        
        if($user_data['password'] == $password){
            //echo $user_id;
            //include('notes.php');
            //$check = true;
            //echo (file_get_contents('notes.php'));
            header('Location: notes.php');
        }
        else {echo "Wrong password or login";} //сделать норм уведомление, красненькое
        
        //mysql_query("INSERT INTO note VALUES ('','','','$user_id')") or die(mysql_error());        
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
    <form method="post" action="index.php" id="form">
        <div class="center">
            <h1>Войти в систему</h1><br>        
            <input type="text" name="login" placeholder="Логин или E-mail" required><br>        
            <input type="password" name="password" placeholder="Пароль" required><br>
            <input type="submit" name="submit" value="Войти" id="button"><br>
        </div>        
        <a id="forgot" href="#">Забыли пароль?</a>  
        <p>У вас нет аккаунта?</p>
        <div class="center"><a href="register.php" id="create">Создать аккаунт</a></div>   
    </form>
</body>
</html>
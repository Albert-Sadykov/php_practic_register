<?php

$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

$db = mysqli_connect("localhost", "root", "", "users_db");
$count = mysqli_query($db, "SELECT COUNT(id) AS 'count' FROM `users` WHERE `username` = '$name'");
$count = mysqli_fetch_assoc($count);

if (!$count["count"]){
    echo "Пользователи с таким именем не найдены.<br> <a href=\"/\">Назад</a>";
    exit();
}

$password_db = mysqli_query($db, "SELECT `password` FROM `users` WHERE `username` = '$name'");
$password_db_result = mysqli_fetch_assoc($password_db);
$password = md5($password);
$password_db = $password_db_result["password"];

if ($password != $password_db) {
    echo "Пароли не совпадают.<br> <a href=\"/\">Назад</a>";
    exit();
}

setcookie('user', $name, time() + 300, "register.ru");

if ($name == 'albert') {
    echo "Здравствуйте мой повелитель <br>";
    echo "Вы успешно вошли.<br> <a href=\"sign_out.php\">Выйти</a>";

} else {
    echo "Вы успешно вошли.<br> <a href=\"sign_out.php\">Выйти</a>";  
}


$db->close();
?>
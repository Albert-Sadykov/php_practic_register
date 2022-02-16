<?php

$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);

if(mb_strlen($name) < 2 || mb_strlen($name) > 15) {
    echo "Длина имени недопустима";
    exit();
} else if (mb_strlen($email) < 9 || mb_strlen($email) > 50) {
    echo "Длина email недопустима";
    exit();
} else if (mb_strlen($password) < 8) {
    echo "В пароле должно быть минимум 8 символов";
    exit();
}

$password = md5($password);

$db = mysqli_connect("localhost", "root", "", "users_db");

$db_count = mysqli_query($db, "SELECT COUNT(id) AS 'count' FROM `users` WHERE `username` = \"$name\"");
$names_result = mysqli_fetch_assoc($db_count);

if ($names_result['count'] != 0){
    echo "Пользователь с таким именем уже имеется";
    header('Location: /');
    exit();
} 

$db->query("INSERT INTO `users` (`username`, `email`, `password`) VALUES (\"$name\", \"$email\", \"$password\")");

$db->close();
echo "<a href=\"/\">Вход</a>"

?>
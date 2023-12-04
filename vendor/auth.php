<?php

session_start();

require_once 'connect.php';

$login = $_POST['login'];
$password = md5($_POST['password']);

$query_a = "SELECT * FROM `admins` WHERE `login` = '$login' and `password` = '$password'";
$result_u = mysqli_query($connect, $query_a);

if (mysqli_num_rows($result_u) == 0){
    header('Location: ../index.php');
}else{
    $admin = mysqli_fetch_array($result_u);
    $_SESSION['admin'] = [
        'login'=> $admin['username']
    ];
    header('Location: ../admin.php');
    $_SESSION['message'] = 'Успех';
};

$sql_u = "SELECT * FROM users WHERE login='$login'";
$sql_p = "SELECT * FROM users WHERE password='$password'";
$log_u = mysqli_query($connect, $sql_u);
$log_p = mysqli_query($connect, $sql_p);

$checkUser = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if (mysqli_num_rows($log_u) == 0) {
    $_SESSION['message']='Неверный логин';
        header('Location:../index.php');  
}else {
    if (mysqli_num_rows($log_p) == 0) {
        $_SESSION['message']='Неверный пароль';
        header('Location:../index.php'); 
    } else {
        if(mysqli_num_rows($checkUser) > 0){
            $user = mysqli_fetch_assoc($checkUser);

            $_SESSION['user'] = [
                "id" => $user['id'],
                "username" => $user['username'],
                "email" => $user['email'],
                "phonenum" => $user["phonenum"],
                "login" => $user["login"]
            ];
            header('Location: ../profile.php');
        } else {
            $_SESSION['message']='Непредвиденная ошибка';
            header('Location:../index.php'); 
        }
    }
}

?>
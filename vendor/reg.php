<?php

session_start();

require_once 'connect.php';

$username = $_POST['username'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$phonenum = $_POST['phonenum'];

$sql_u = "SELECT * FROM users WHERE username='$username'";
$sql_e = "SELECT * FROM users WHERE email='$email'";
$res_u = mysqli_query($connect, $sql_u);
$res_e = mysqli_query($connect, $sql_e);
$checkUserLogin = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
$checkUserMail = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

if ((mysqli_num_rows($res_u) > 0) and (mysqli_num_rows($res_e) > 0)) {
    $_SESSION['message'] = 'Такой пользователь уже существует!';
    header('Location:../formaReg.php');
} else {
    if (preg_match("/^[а-яА-ЯёЁ ]+$/u", $username)) {
        if (preg_match("/^[0-9]{11}$/", $phonenum)) {
            if (mysqli_num_rows($checkUserMail) > 0) { #Проверка на уникальность email
                $_SESSION['message'] = 'Такой email уже зарегистрирован!';
                header('Location:../formaReg.php');
            } else {
                if (mysqli_num_rows($checkUserLogin) > 0) { #Проверка на уникальность логина
                    $_SESSION['message'] = 'Такой логин занят!';
                    header('Location:../formaReg.php');
                } else {
                    if (preg_match("/^[a-zA-Z]+$/u", $login)) {
                        $_SESSION['message'] = 'Логин только латиницей!';
                        header('Location:../formaReg.php');
                    } else {
                        if (strlen($password) >= 4) {
                            if ($password == $passwordConfirm) {
                                $password = md5($password);

                                mysqli_query($connect, "INSERT INTO `users` (`id`,`username`, `email`, `phonenum`, `login`, `password`) VALUES (NULL, '$username', '$email', '$phonenum', '$login', '$password')");

                                $_SESSION['message'] = 'Регистрация Успешна!';
                                header('Location:../index.php');

                            } else {
                                $_SESSION['message'] = 'Пароли не совпадают!';
                                header('Location:../formaReg.php');
                            }
                        } else {
                            $_SESSION['message'] = 'Пароль должен быть минимум 6 символов!';
                            header('Location:../formaReg.php');
                        }
                    }

                }
            }
        } else {
            $_SESSION['message'] = 'Телефон должен быть лишь цифрами и не менее 11 символов!';
            header('Location:../formaReg.php');
        }
    } else {
        $_SESSION['message'] = 'Имя должно быть Кирилицой и без цифр!';
        header('Location:../formaReg.php');
    }



}

?>
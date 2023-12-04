<?php

session_start();
if (isset($_SESSION["user"])) {
    header("Location: profile.php");
}
if (isset($_SESSION["admin"])) {
    header("Location:admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="my-custom-bg-class">

    <div class="flex flex-col items-center justify-center h-screen">
        <div class="text-3xl mb-8">Нарушениям.Нет</div>
        <form
            class="flex flex-col justify-center items-center border-4 border-x-[#030716] h-[400px] w-[700px] max-[500px]: w-[360px]"
            action='vendor/auth.php' method="POST" enctype='multipart/form-data'>
            <div class="flex flex-col justify-evenly text-2xl h-full">
                <div class="self-center" >
                    <h2 >Авторизация</h2>
                </div>
                <div>
                    <input class="w-96 h-12 bg-[#cccccc] border-4 border-b-[#030716] outline-none max-[500px]: w-full" type="text" placeholder="Логин" required="yes" name="login">
                </div>
                <div>
                    <input class="w-96 h-12 bg-[#cccccc]  border-4 border-b-[#030716] outline-none max-[500px]: w-full"  type="password" placeholder="Пароль" required="yes" name="password">
                </div>
                <div class="self-center" >
                    <button class="rounded-lg border-2 border-black  bg-[#030716] w-80 h-10 text-white" type="submit">Войти</button>
                </div>
                <div><a href="formaReg.php">Нет аккаунта? - <span class="underline decoration-solid">Зарегистрироваться</span></a></div>
            </div>

            <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="msg">' . $_SESSION['message'] . '</div>';
            }
            unset($_SESSION['message']);
            ?>

        </form>
    </div>
</body>

</html>
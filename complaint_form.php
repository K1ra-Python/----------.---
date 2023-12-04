<?php

session_start();
if (!isset($_SESSION["user"])) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.min.css" type="text/css">
    <link href="output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="my-custom-bg-class">
    <div class="flex justify-evenly p-12 border-2 border-b-[#030716] items-center max-[500px]: p-4 flex-wrap">
        <button class="w-38 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5
                    text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-600 dark:focus:ring-gray-800"
            onclick="document.location='profile.php'">Проверить статус жалобы</button>
        <div><button class="w-36 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5
                    text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-600 dark:focus:ring-gray-800"
                onclick="document.location='vendor/logout.php'">Выйти</button></div>
    </div>
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="text-3xl mb-8 mt-6">Опишите свою жалобу</div>
        <form class="flex flex-col justify-center items-center border-4 border-x-[#030716] h-full mt-6 w-[800px] max-[500px]:h-full w-[350px]"
            action='vendor/complaint.php' method="POST" enctype='multipart/form-data'>
            <div class="flex flex-col justify-evenly text-2xl h-full max-[500px]: text-base">
                <div class="self-center">
                    <input class="w-[455px] h-12 bg-[#cccccc] border-4 border-b-[#030716] outline-none max-[500px]:w-[340px]" type="text"
                        placeholder="Государственный номер регистрации автомобиля" required="yes" name="car_state_num">
                </div>
                <div class="self-center">
                    <textarea class="w-[455px] break-words h-full bg-[#cccccc] border-4 border-b-[#030716] outline-none max-[500px]:w-[340px]"
                        placeholder="Описание нарушения" required="yes" name="violation_desc"></textarea>
                </div>
                <div class="self-center">
                    <button class="rounded-lg border-2 border-black  bg-[#030716] w-[455px] h-10 text-white max-[500px]:w-[340px]"
                        type="submit">Отправить</button>
                </div>
                <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="w-16">' . $_SESSION['message'] . '</div>';
            }
            unset($_SESSION['message']);
            ?>
            </div>
        </form>
    </div>
</body>

</html>
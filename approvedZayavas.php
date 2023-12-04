<?php

session_start();
if (!isset($_SESSION["admin"])) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css" type="text/css">
    
    <title>Document</title>
</head>

<body class="my-custom-bg-class">
<h1>Админская Панель</h1>
<div class="flex justify-evenly p-12 border-2 border-b-[#030716] items-center max-[500px]: p-4 flex-wrap">
        <div><button class="w-42 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-xl text-lg px-5 py-2.5
                    text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-600 dark:focus:ring-gray-800"
                onclick="document.location='admin.php'">Необработанные заявления</button></div>
        <div><button class="w-42 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-xl text-lg px-5 py-2.5
                    text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-600 dark:focus:ring-gray-800"
                onclick="document.location='notApprovedZayavas.php'">Отклонённые заявления</button></div>
        <div><button class="w-36 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5
                    text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-600 dark:focus:ring-gray-800"
                onclick="document.location='vendor/logout.php'">Выйти</button></div>
    </div>
    <div class="flex justify-evenly flex-wrap p-12 border-2 border-b-[#030716] items-center">
            <?php
            require_once("vendor/connect.php");

            $query = mysqli_query($connect, "SELECT * FROM approved");

            while ($row = mysqli_fetch_assoc($query)) {

                echo ("<div class = 'flex flex-col justify-center items-center border-4 border-[#030716] rounded-2xl h-[1000px] mt-6 w-[500px] max-[500px]:h-full w-[350px] mt-6 mb-8'>");
                echo ("<div class='flex flex-col justify-evenly text-xl h-full text-2xl content-center p-[10%]'>");
                echo( "<div class='border-2 border-t-[#030716] p-[20px]'>" . $row['username'] . "<input type='hidden' name='username' value='" . $row['username'] . "'>" . "</div>");
                echo( "<div class='break-words border-2 border-t-[#030716] p-[20px] object-fill'>" . $row['vi_de'] . "<input type='hidden' name='vi_de' value='" . $row['vi_de'] . "'>" . "</div>");
                echo( "<div class='border-2 border-t-[#030716] p-[20px]'>" . $row['c_s_n'] . "<input type='hidden' name='c_s_n' value='" . $row['c_s_n'] . "'>" . "</div>");
                echo( "</div>");
                echo( "</div>");

            }
            ?>
            <?php
            if(isset($_SESSION['message'])){
                echo '<div class="msg">' . $_SESSION['message'] .'</div>';
            }
            unset($_SESSION['message']);
            ?>
    </div>
</body>

</html>
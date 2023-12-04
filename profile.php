<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location:index.php");
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
    <div class="site">
        <div class="flex justify-evenly p-12 border-2 border-b-[#030716] items-center max-[500px]: p-4 flex-wrap">
            <div class="user_info">
                <div class="class='font-bold text-xl">Добро пожаловать,
                    <?= $_SESSION['user']['username'] ?>
                </div>

                <?php
                if (isset($_SESSION['message'])) {
                    echo '<div class="msg">' . $_SESSION['message'] . '</div>';
                }
                unset($_SESSION['message']);
                ?>

            </div>
            <div><button class="w-38 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-xl text-lg px-5 py-2.5
                    text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-600 dark:hover:text-white
                    dark:hover:bg-gray-600 dark:focus:ring-gray-800"
                    onclick="document.location='complaint_form.php'">Написать жалобу о дтп</button></div>
            <div><button class="w-36 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900
                    focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xl px-5 py-2.5
                    text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-600 dark:hover:text-white
                    dark:hover:bg-red-600 dark:focus:ring-gray-800"
                    onclick="document.location='vendor/logout.php'">Выйти</button></div>
        </div>
        <div class="flex max-[500px]:flex-col justify-evenly">
            <div class="block1">
                <p class='font-bold text-3xl mt-6'>Необработанные заявления</p>
                <div class="flex flex-col-reverse max-[500px]:items-center">
                    <?php
                    require_once("vendor/connect.php");
                    $user_session = $_SESSION["user"]['username'];
                    $login_session = $_SESSION["user"]['login'];
                    $query = mysqli_query($connect, "SELECT * FROM complaints  WHERE `username` ='$user_session' AND `login` = '$login_session'");
                    if (mysqli_num_rows($query) > 0) {

                    }
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo ("<div class = 'flex flex-col justify-center items-center border-4 border-[#030716] rounded-2xl h-full mt-6 w-[500px] max-[500px]:h-full w-[350px]'>");
                        echo ("<div class='flex flex-col justify-evenly text-xl h-full text-2xl content-center p-[10%]'>");
                        echo ("<div class='border-2 border-t-[#030716]'>" . $row['username'] . "<input type='hidden' name='username' value='" . $row['username'] . "'>" . "</div>");
                        echo ("<div class='break-words border-2 border-t-[#030716]'>" . $row['violation_desc'] . "<input type='hidden' name='vi_de' value='" . $row['violation_desc'] . "'>" . "</div>");
                        echo ("<div class='border-2 border-t-[#030716]'>" . $row['car_state_num'] . "<input type='hidden' name='c_s_n' value='" . $row['car_state_num'] . "'>" . "</div>");
                        echo ("</div>");
                        echo ("</div>");
                    }
                    ?>
                </div>
            </div>
            <div class="block2">
                <p class='font-bold text-3xl mt-6'>Отклонённые заявления</p>
                <div class="flex flex-col-reverse max-[500px]:items-center">
                    <?php
                    require_once("vendor/connect.php");
                    $user_session = $_SESSION["user"]['username'];
                    $login_session = $_SESSION["user"]['login'];
                    $query = mysqli_query($connect, "SELECT * FROM nApproved  WHERE `username` ='$user_session' AND `login` = '$login_session'");

                    if (mysqli_num_rows($query) > 0) {
                    }

                    while ($row = mysqli_fetch_assoc($query)) {
                        echo ("<div class = 'flex flex-col justify-center items-center border-4 border-[#030716] rounded-2xl h-full mt-6 w-[500px] max-[500px]:h-full w-[350px]'>");
                        echo ("<div class='flex flex-col justify-evenly text-xl h-full text-2xl content-center p-[10%]'>");
                        echo ("<div class='border-2 border-t-[#030716]'>" . $row['username'] . "<input type='hidden' name='username' value='" . $row['username'] . "'>" . "</div>");
                        echo ("<div class='break-words border-2 border-t-[#030716]'>" . $row['vi_de'] . "<input type='hidden' name='vi_de' value='" . $row['vi_de'] . "'>" . "</div>");
                        echo ("<div class='border-2 border-t-[#030716]'>" . $row['c_s_n'] . "<input type='hidden' name='c_s_n' value='" . $row['c_s_n'] . "'>" . "</div>");
                        echo ("</div>");
                        echo ("</div>");
                    }
                    ?>
                </div>
            </div>
            <div class="block3">
                <p class='font-bold text-3xl mt-6'>Принятые заявления</p>
                <div class="flex flex-col-reverse max-[500px]:items-center">
                    <?php
                    require_once("vendor/connect.php");
                    $user_session = $_SESSION["user"]['username'];
                    $login_session = $_SESSION["user"]['login'];
                    $query = mysqli_query($connect, "SELECT * FROM approved  WHERE `username` ='$user_session' AND `login` = '$login_session'");

                    if (mysqli_num_rows($query) > 0) {
                    }

                    while ($row = mysqli_fetch_assoc($query)) {
                        echo ("<div class = 'flex flex-col justify-center items-center border-4 border-[#030716] rounded-2xl h-full mt-6 w-[500px] max-[500px]:h-full w-[350px]'>");
                        echo ("<div class='flex flex-col justify-evenly text-xl h-full text-2xl p-[10%]'>");
                        echo ("<div class='border-2 border-t-[#030716]'>" . $row['username'] . "<input type='hidden' name='username' value='" . $row['username'] . "'>" . "</div>");
                        echo ("<div class='break-words border-2 border-t-[#030716]'>" . $row['vi_de'] . "<input type='hidden' name='vi_de' value='" . $row['vi_de'] . "'>" . "</div>");
                        echo ("<div class='border-2 border-t-[#030716]'>" . $row['c_s_n'] . "<input type='hidden' name='c_s_n' value='" . $row['c_s_n'] . "'>" . "</div>");
                        echo ("</div>");
                        echo ("</div>");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
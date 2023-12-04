<?php

session_start();

require_once 'connect.php';

$car_state_num = $_POST['car_state_num'];
$violation_desc = $_POST['violation_desc'];
$username = $_SESSION['user']['username'];
$login_session = $_SESSION['user']['login'];
$phone_session = $_SESSION['user']['phone'];
$email_session = $_SESSION['user']['email'];

if(mb_strlen($violation_desc) >= 601) {
    $_SESSION['message']='Количество символов в жалобе превышено 600.';
    header('Location:../complaint_form.php');
} else {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    mysqli_query($connect,"INSERT INTO `complaints` (`id`,`car_state_num`, `violation_desc`, `username`, `login`, `email`) VALUES (NULL, 
    '$car_state_num', '$violation_desc', '$username','$login_session','$email_session')");
    
    $_SESSION['message']='Жалоба Отправлена!';
    header('Location:../profile.php');
}


?>
<?php

session_start();

require_once 'connect.php';

$username_s = $_SESSION['user']['username'];
$login_session = $_SESSION["user"]['login'];
$email_session = $_SESSION["user"]['email'];
$sql_com_u = "SELECT * FROM complaints WHERE `username`='$username_s' AND `login` = '$login_session' AND `phone` = '$phone_session' AND `email` = '$email_session'";
$s_u = mysqli_query($connect, $sql_com_u);

$getComplaintQuery = "SELECT * FROM complaints WHERE username='$username_s' AND `login` = '$login_session' AND `phone` = '$phone_session' AND `email` = '$email_session'";
$getComplaint = mysqli_query($connect, $getComplaintQuery);

if (mysqli_num_rows($s_u) == 0) {
    $_SESSION['message']='Ошибка сессии';
        header('Location:../profile.php');  
} else {
    $_SESSION['violation_creator']=$username_s;
    while($row = mysqli_fetch_array($getComplaint)) {
        $_SESSION['violation_desc']=$row[2];
        $_SESSION['violation_id']=$row[1];
    }
}

header('Location: ../profile.php');

?>
<?php
session_start();
require_once "connect.php";
$username = $_POST["username"];
$vi_de = $_POST["vi_de"];
$c_s_n = $_POST["c_s_n"];
$approved = $_POST["apvd"];
$query = mysqli_query($connect, "SELECT * FROM complaints");

if ($query->num_rows > 0) {
    while($field = mysqli_fetch_assoc($query)) {
        $login = $field["login"];
        $email = $field["email"];
    }
}

if ($approved == "Принять") {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    mysqli_query($connect, "INSERT INTO `approved` (`id`, `username` , `vi_de`, `c_s_n`, `login`, `email`) VALUES (NULL ,'$username' , '$vi_de', '$c_s_n',
    '$login','$email')");
    mysqli_query($connect, "DELETE FROM `complaints` WHERE violation_desc = '$vi_de' AND username = '$username';");
    header("Location: ../admin.php");

    /*     

    На случай если зачем-то нужно будет выводить сообщение о том, что мы уже одобряли заяву 

    $res = mysqli_query($connect,"SELECT * FROM `approved` WHERE vi_de = '$vi_de' AND username = '$username';");
        if(mysqli_num_rows($res)>0){
            $_SESSION['message'] = 'Вы уже одобрили такую заявку';
            header("Location: ../admin.php");
        }else{
            mysqli_query($connect, "INSERT INTO `approved` (`id`, `username` , `vi_de`, `c_s_n`) VALUES (NULL ,'$username' , '$vi_de', '$c_s_n')");
            mysqli_query($connect,"DELETE FROM `complaints` WHERE violation_desc = '$vi_de' AND username = '$username';");
            header("Location: ../admin.php");
        }*/

} else {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    mysqli_query($connect, "INSERT INTO `nApproved` (`id`, `username` , `vi_de`, `c_s_n`, `login`, `email`) VALUES (NULL ,'$username' , '$vi_de' ,'$c_s_n' ,
    '$login' ,'$email')");
    mysqli_query($connect, "DELETE FROM `complaints` WHERE violation_desc = '$vi_de' AND username = '$username';");
    header("Location: ../admin.php");
}


?>
<?php
date_default_timezone_set('Asia/Tehran');
$server = 'localhost';
$username_server = 'root';
$DB = mysqli_connect($server, $username_server, '', 'mydb'); //DB data base
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['con-pass'])) {
        $user = htmlspecialchars($_POST['user'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['pass'], ENT_QUOTES);
        $con_password = htmlspecialchars($_POST['conpass'], ENT_QUOTES);
        $date = date('Y-m-d-H-i-s');
        if ($DB) {
            if (
                strlen($user) > 2 && strlen($user) < 30
                && strlen($password) < 8 && strlen($password) > 20
                && $con_password === $password
                ) {
                    mysqli_query($DB,"INSERT INTO `user`(`user_name`, `email`, `password`, `created_at`) VALUES ('$user','$email','$password','$date')");
            }
        } else {
            die("Couldn't Connect");
        }
    }
}

header('location: index.html');

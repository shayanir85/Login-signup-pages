<!DOCTYPE html>
<html lang="en">
<?php
session_start();
date_default_timezone_set('Asia/Tehran');
$server = 'localhost';
$username_server = 'root';
$dbpass = '';
$DB = mysqli_connect($server, $username_server, $dbpass, 'mydb'); //DB data base

if (isset($_COOKIE['user']) && isset($_SESSION['user']) && $_SESSION['user'] == $_COOKIE['user']) {
    header('location:index.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['con-pass'])) {

            $user = htmlspecialchars($_POST['user'], ENT_QUOTES);
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
            $password = htmlspecialchars($_POST['pass'], ENT_QUOTES);
            $con_password = htmlspecialchars($_POST['conpass'], ENT_QUOTES);
            $date = date('Y-m-d-H-i-s');

            if ($DB) {

                if (
                    strlen($user) > 2 || strlen($user) < 30
                    && strlen($password) < 8 || strlen($password) > 20
                    && $con_password === $password
                ) {
                    mysqli_query($DB, "INSERT INTO `user`(`user_name`, `email`, `password`, `created_at`) VALUES ('$user','$email','$password','$date')");
                    setcookie("user", $user, time() + (30 * 24 * 60 * 60), "/");
                    $_SESSION['user'] = $user;
                    header('location:index.php');
                    die('connected');
                }
            } else {

                die("Couldn't Connect");
            }
        } else {

            header('location: signIn.php');
        }
    }
}
?>

<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="items-center">
        <form class="form-control " action="signIn.php" method="POST">
            <h1 class="text-center">Sign In</h1>

            <label class="form-label" for="user-name">User:</label><br>
            <input class="form-input" name="user" id="user-name" type="text">

            <label class="form-label" for="user-email">Email:</label><br>
            <input class="form-input" name="email" id="user-email" type="email">

            <label class="form-label" for="user-pass">Password:</label><br>
            <input class="form-input" name="pass" id="user-pass" type="password">

            <label class="form-label" for="user-conpass">Confirm Password:</label><br>
            <input class="form-input" name="con-pass" id="user-conpass" type="password">

            <button type="submit" class="btn-submit">
                signup
            </button>
            <a href="logIn.php" class="text-center m-2 form-label">i already have a account</a>
        </form>
        <br>
    </section>
</body>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="js/app.js"></script>

</html>
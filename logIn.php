<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (isset($_COOKIE['user']) && isset($_SESSION['user']) && $_SESSION['user'] == $_COOKIE['user']) {
    header('location:index.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['user']) && isset($_POST['pass'])) {
            $user = htmlspecialchars($_POST['user'], ENT_QUOTES);
            $password = htmlspecialchars($_POST['pass'], ENT_QUOTES);
            $DB = mysqli_connect('localhost', 'root', '', 'mydb');
            if ($DB) {
                if (mysqli_query($DB, "SELECT `user_name`, `password`FROM `user` WHERE `user_name`='$user'AND `password`='$password'")) {
                    setcookie("user", $user, time() + (30 * 24 * 60 * 60), "/");
                    $_SESSION['user'] = $user;
                    header("location:index.php");
                    die();
                } else {
                    setcookie("password is wrong", "couldn't Connect", time() + 3600, '/');
                }
            }
            header("location:logIn.php");
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
        <form class="form-control " action="logIn.php" method="POST">
            <h1 class="text-center">Log In</h1>

            <label class="form-label" for="user-name">User:</label><br>
            <input class="form-input" name="user" id="user-name" type="text">

            <label class="form-label" for="user-pass">Password:</label><br>
            <input class="form-input" name="pass" id="user-pass" type="password">


            <button type="submit" class="btn-submit">
                Login
            </button>
            <a href="signIn.php" class="text-center m-2 form-label">i don't have account</a>
        </form>
        <br>
    </section>
</body>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="js/app.js"></script>

</html>
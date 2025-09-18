<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        if (isset($_SESSION["user"]) && isset($_COOKIE["user"]) && $_COOKIE["user"] == $_SESSION["user"]) {
            (isset($_COOKIE["user"]))? $user = $_COOKIE["user"]: $user = '';
            $log = "you are logged in $user";
        }else{
            (isset($_COOKIE['user']))? header('Location:logIn.php') :header('Location:signIn.php');
        }
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            setcookie("user", "", time() - 0,"/");
         }
    ?>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width='device-width', initial-scale=1.0">
    <title>homepage</title>
</head>
<body>
    <form method="post" action="index.php">
        <button>logOut</button>
    </form>
    <h1 class="text-center"> mainpage</h1>
    <span class="text-center"><?= $log ?></span>
</body>
</html>
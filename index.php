<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <script src="app.js"></script>
    <title>Document</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo '<p>works</p>';
    if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['con-pass'])) {
    }
}
?>

<body>
    <section class="items-center">
        <form class="form-control">
            <label class="form-label" for="user-name">User:</label><br>
            <input class="form-input" name="user" id="user-name" type="text">
            <br>
            <label class="form-label" for="user-email">Email:</label><br>
            <input class="form-input" name="email" id="user-email" type="email">
            <br>
            <label class="form-label" for="user-pass">Password:</label><br>
            <input class="form-input" name="pass" id="user-pass" type="password">
            <br>
            <label class="form-label" for="user-conpass">Confirm Password:</label><br>
            <input class="form-input" name="con-pass" id="user-conpass" type="password">
        </form>
        <br>
        <button onclick="ajax()" class="btn-submit">
            signup
        </button>
    </section>
</body>
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="js/app.js"></script>
<script src="js/ajax.js"></script>

</html>
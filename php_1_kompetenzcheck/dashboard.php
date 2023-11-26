<?php

session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])){
    header('Location: http://localhost/php_1_kompetenzcheck/index.php');
} else {
    $savedUser = $_SESSION['username'];
    echo("Hello $savedUser, welcome to your dashboard!");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php"><button>Log out</button></a>
</body>
</html>

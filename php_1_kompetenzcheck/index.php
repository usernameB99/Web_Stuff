<?php
    session_start();
    session_destroy();
    session_unset();
    $_SESSION = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Kontaktformularisations Dingsi</p>
    <form action="login.php" method="post">
        <p>Name: <input name="name" required></p>
        <p>Password: <input type="password" name="password" required></p>
        <p><input type="submit"></p>
    </form>
</body>
</html>


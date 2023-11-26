<?php
    session_start();

    $name = htmlentities($_POST["name"]);
    $password = htmlentities($_POST["password"]);
//db data
    $savedUser = 'Ducky';
    $savedPassword = '123';

    if($savedUser === $name && $password === $savedPassword){
        $_SESSION['username'] = $name;
        echo "password is correct <br>";
            $_SESSION['username'] = $savedUser;
            header('Location: http://localhost/php_1_kompetenzcheck/dashboard.php');

    } else {
        echo 'bla bla bla wrong passworrrrd';
        
        $GLOBALS['error'] = "Ungültiger Benutzername oder Passwort.";
        
        header('Location: http://localhost/php_1_kompetenzcheck/index.php');
        echo ("$error");
    }

     echo "<br> name: $name, password: $password";


     /* $username = ["$savedUser" => "$savedPassword"];
     echo($username); */

     
     


?>


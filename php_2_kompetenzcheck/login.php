<?php
    session_start();
    session_destroy();
    session_unset();
    $_SESSION = [];
    require 'db-connection.php';

//  if(isset($_SESSION['username']) && !empty($_SESSION['username'])){                      //überprüfung ob eingabe gemacht wurde und die daten nicht leer sind
//        // header('Location: http://localhost/php_2_kompetenzcheck/loginScreen.php');
//     } else {
        


    $name = htmlentities($_POST["name"]);
    $password = htmlentities($_POST["password"]);



    $sql = "SELECT * FROM users WHERE name = :name /* AND password = :password */";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
        /* $stmt->bindParam(':password', $password); */
        $stmt->execute();

        $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $DataBaseHashedPassword = $loginData['password'];

        if ($stmt->rowCount() > 0 && password_verify($password,$DataBaseHashedPassword)) {
            echo "<h1>Login erfolgreich.</h1>";
            echo '<a href="http://localhost/php_2_kompetenzcheck/dashboardScreen.php"><button type="button">go to dashboard</button></a>';
            session_start();
            $_SESSION['user_id'] = $loginData['user_id'];
            $_SESSION['name'] = $loginData['name'];
        } else {
            echo "Name oder Passwort nix korrekt diese.";
            echo '<a href="http://localhost/php_2_kompetenzcheck/loginScreen.php"><button type="button">back to login</button></a>';
        }



    /* $savedUser = 'Ducky';
    $savedPassword = '123';

    if($savedUser === $name && $password === $savedPassword){  //anpassen für abfrage aus datenbank
        $_SESSION['username'] = $name;
        echo "password is correct <br>";
            $_SESSION['username'] = $savedUser;
            header('Location: http://localhost/php_1_kompetenzcheck/dashboard.php');

    } else {
        echo 'bla bla bla wrong passworrrrd';
        
        $GLOBALS['error'] = "Ungültiger Benutzername oder Passwort.";
        
        header('Location: http://localhost/php_2_kompetenzcheck/loginScreen.php');
        echo ("$error");
    }

     echo "<br> name: $name, password: $password"; */
    
    // }














     ?>
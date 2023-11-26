<?php
require 'db-connection.php';

    $name = htmlentities($_POST["name"]);
    $password = htmlentities($_POST["password"]);
    $email = htmlentities($_POST["email"]);


    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->execute() && $stmt->rowCount() > 0) {
        echo "<h1>Daten sind bereits in der Datenbank vorhanden.</h1>";
        // echo '<a href="http://localhost/php_2_kompetenzcheck/loginScreen.php"><button type="button">back to login</button></a>';
    } else {

        echo "Daten nix Datenbank innen.";
        /*  $sql = $pdo->query("INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$password')"); */


    $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (:name, :email, :password)";

        $hashedPassWord = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt1 = $pdo->prepare($sql);
        $stmt1->bindParam(':name', $name);
        $stmt1->bindParam(':password', $hashedPassWord);
        $stmt1->bindParam(':email', $email);
        //$stmt1->execute();  -> wird in der if abfrage ausgeführt

        if ($stmt1->execute()) {
                echo " <h1> Daten wurden erfolgreich hinzugefügt. </h1> ";
                
                
            } else {
                echo "Fehler beim Hinzufügen der Daten: " . $stmt->errorInfo()[2];
            
            }
    }

    echo '<a href="http://localhost/php_2_kompetenzcheck/loginScreen.php"><button type="button">back to login</button></a>';

/*   if ($stmt->execute() && $stmt->rowCount() > 0) {
    echo "Daten sind bereits in der Datenbank vorhanden.";
} else {


company_id 	company_name 	contact_person 	phone 	adress 	created_by 	created_at 	edited_at 	



}
header('Location: http://localhost/php_2_kompetenzcheck/loginScreen.php'); */





?>
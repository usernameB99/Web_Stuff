<?php
session_start();
require 'db-connection.php';

if(!isset($_SESSION['name']) && empty($_SESSION['name'])){                      //überprüfung ob eingabe gemacht wurde und die daten nicht leer sind
    echo 'no work dis';
    header('Location: http://localhost/php_2_kompetenzcheck/dashboardScreen.php');          // back to login screen
} else {

    $companyName = htmlentities($_POST["companyName"]);
    $contactPerson = htmlentities($_POST["contactPerson"]);
    $phone = htmlentities($_POST["phone"]);
    $adress = htmlentities($_POST["address"]);
    $createdBy = $_SESSION['user_id'];
    $createdAt = htmlentities($_POST["createdAt"]);
    $editedAt = htmlentities($_POST["editedAt"]);


    $sql = "INSERT INTO `clients`(`company_name`, `contact_person`, `phone`, `address`, `created_by`, `created_at`, `edited_at`) 
    VALUES (:companyName, :contactPerson, :phone, :adress, :createdBy, :createdAt, :editedAt)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':companyName', $companyName);
    $stmt->bindParam(':contactPerson', $contactPerson);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':adress', $adress);
    $stmt->bindParam(':createdBy', $createdBy);
    $stmt->bindParam(':createdAt', $createdAt);
    $stmt->bindParam(':editedAt', $editedAt);

    if ($stmt->execute()) {
        echo " <h1> Daten wurden erfolgreich hinzugefügt. </h1> ";
        
    } else {
        echo "Fehler beim Hinzufügen der Daten: " . $stmt->errorInfo()[2];
    
    }

    echo '<a href="http://localhost/php_2_kompetenzcheck/dashboardScreen.php"><button type="button">back dashboard</button></a>';
}
?>
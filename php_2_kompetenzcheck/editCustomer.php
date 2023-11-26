<?php
session_start();
require 'db-connection.php';

if(!isset($_SESSION['name']) && empty($_SESSION['name'])){                      //überprüfung ob eingabe gemacht wurde und die daten nicht leer sind
    echo 'no work dis';
    header('Location: http://localhost/php_2_kompetenzcheck/dashboardScreen.php');          // back to login screen
} else {


$user_id = $_SESSION['user_id'];
$company_id = intval($_GET['customerId']);

$companyName = htmlentities($_POST["companyName"]);
$contactPerson = htmlentities($_POST["contactPerson"]);
$phone = htmlentities($_POST["phone"]);
$adress = htmlentities($_POST["address"]);
$editedAt = htmlentities($_POST["editedAt"]);

$sql = "UPDATE `clients` SET 
                `company_name` = :companyName, 
                `contact_person` = :contactPerson, 
                `phone` = :phone, 
                `address` = :address, 
                `edited_at` = :editedAt 
            WHERE 
                company_id = :companyId";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':companyName', $companyName);
$stmt->bindParam(':contactPerson', $contactPerson);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':address', $adress);
$stmt->bindParam(':editedAt', $editedAt);
$stmt->bindParam(':companyId', $company_id);

if ($stmt->execute()) {
    echo " <h1> Daten wurden erfolgreich geändert. </h1> ";
    
} else {
    echo "Fehler beim ändern der Daten: " . $stmt->errorInfo()[2];

}

echo '<a href="http://localhost/php_2_kompetenzcheck/dashboardScreen.php"><button type="button">back dashboard</button></a>';
}
?>
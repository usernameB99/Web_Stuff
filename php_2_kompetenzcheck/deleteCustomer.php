<?php
session_start();
require 'db-connection.php';

$user_id = $_SESSION['user_id'];

$company_id = intval($_GET['customerId']);

$sql = "DELETE FROM clients WHERE `created_by` = :userId AND `company_id` = :companyId;";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userId', $user_id);
$stmt->bindParam(':companyId', $company_id);

if ($stmt->execute()) {
    echo " <h1> Data deleted. </h1> ";
    
} else {
    echo "Fehler beim Hinzufügen der Daten: " . $stmt->errorInfo()[2];

}

echo '<a href="http://localhost/php_2_kompetenzcheck/dashboardScreen.php"><button type="button">back dashboard</button></a>';



?>
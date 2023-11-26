<?php
session_start();
require 'db-connection.php';

$company_id = intval($_GET['customerId']);

$sql = "SELECT * FROM `clients` WHERE company_id = :companyId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':companyId', $company_id);

$stmt->execute();
$customerData = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
var_dump($customerData);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <title>Edit Customer Page</title>
</head>
<body style="background-color: #D3D3D3;">
  <section class="hero is-primary">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Management Systems / Edit Customer</h1>
      </div>
    </div>
  </section>

  <section class="section">
  <div class="container">
    <div class="card">
      <div class="card-content">
        <h2 class="title is-3">Edit Client</h2>
        <h3 class="subtitle">
          Here you can <strong>edit</strong> the client.
        </h3>

        <form action="editCustomer.php?customerId=<?php echo $customerData['company_id'];?>" method="post">
          <div class="field">
            <label class="label">Company Name</label>
            <div class="control">
              <input class="input" type="text" name="companyName" value="<?php echo $customerData['company_name'];?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Contact Person</label>
            <div class="control">
              <input class="input" type="text" name="contactPerson" value="<?php echo $customerData['contact_person'];?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Phone</label>
            <div class="control">
              <input class="input" type="text" name="phone" value="<?php echo $customerData['phone'];?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Address</label>
            <div class="control">
              <input class="input" type="text" name="address" value="<?php echo $customerData['address'];?>" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Edited At</label>
            <div class="control">
              <input class="input" type="date" name="editedAt" value="<?php echo $customerData['edited_at'];?>" required>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


</body>
</html>




 
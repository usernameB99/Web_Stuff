<?php
session_start();
require 'db-connection.php';

echo "hallo dis is dashboard " . $_SESSION['name'] . ' your id is ' . $_SESSION['user_id'];


$user_id = $_SESSION['user_id'];

/* $stmt = $pdo->prepare('SELECT * FROM USERS WHERE user_id = ?');
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC); */

$stmt2 = $pdo->prepare('SELECT * FROM clients');
$stmt2->execute();
$clients = $stmt2->fetchAll();

var_dump($clients);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
  <title>Document</title>
</head>

<body style="background-color: #D3D3D3;">
  <section class="hero is-primary" >
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Management Systems / Dashboard</h1>
      </div>
    </div>
  </section>

  <section class="section">
    <?php foreach ($clients as $client): ?>
      <div class="box">
        <p><strong>Company ID:</strong> <?php echo $client['company_id']; ?></p>
        <p><strong>Contact Person:</strong> <?php echo $client['contact_person']; ?></p>
        <p><strong>Phone:</strong> <?php echo $client['phone']; ?></p>
        <p><strong>Address:</strong> <?php echo $client['address']; ?></p>
        <?php if($user_id === $client['created_by']): ?>
          <a href="editCustomerScreen.php?customerId=<?php echo $client['company_id']; ?>" class="button is-link">Edit Customer</a>
          <a href="deleteCustomer.php?customerId=<?php echo $client['company_id']; ?>" class="button is-danger">Delete Customer</a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </section>

  <section class="section">
  <div class="container">
    <div class="card">
      <div class="card-content">
        <h2 class="title">Create Client</h2>
        <h3 class="subtitle">
          Here you can <strong>create</strong> a client.
        </h3>

        <form action="createCustomer.php" method="post">
          <div class="field">
            <label class="label">Company Name</label>
            <div class="control">
              <input class="input" type="text" name="companyName" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Contact Person</label>
            <div class="control">
              <input class="input" type="text" name="contactPerson" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Phone</label>
            <div class="control">
              <input class="input" type="text" name="phone" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Address</label>
            <div class="control">
              <input class="input" type="text" name="address" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Created At</label>
            <div class="control">
              <input class="input" type="date" name="createdAt" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Edited At</label>
            <div class="control">
              <input class="input" type="date" name="editedAt" required>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Create Client</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


  <section class="section">
    <div class="container">
      <a href="http://localhost/php_2_kompetenzcheck/loginScreen.php" class="button is-danger">Logout</a>
    </div>
  </section>

</body>

</html>






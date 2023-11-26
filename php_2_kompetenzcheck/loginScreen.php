<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login / Register Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>

<body style="background-color: #D3D3D3;">
  <section class="hero is-primary">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">Management Systems / Login & Register Page</h1>
      </div>
    </div>
  </section>

  <section class="section">
  <div class="container">
    <div class="card">
      <div class="card-content">
        <h2 class="title">Login</h2>
        <h3 class="subtitle">
          If you already have an account, <strong>login</strong> to access the dashboard.
        </h3>

        <form action="login.php" method="post">
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input class="input" type="text" name="name" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Password</label>
            <div class="control">
              <input class="input" type="password" name="password" required>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="card">
      <div class="card-content">
        <h2 class="title">Register</h2>
        <h3 class="subtitle">
          If you don't have an account, <strong>register</strong> to create one and log in.
        </h3>

        <form action="register.php" method="post">
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input class="input" type="text" name="name" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Password</label>
            <div class="control">
              <input class="input" type="password" name="password" required>
            </div>
          </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control">
              <input class="input" type="email" name="email" required>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button class="button is-primary" type="submit">Register</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>




</body>

</html>


<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Login</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .alert.success {
      background-color: #d4edda;
      color: #155724;
      padding: 15px;
      margin: 10px auto;
      width: 80%;
      border-radius: 5px;
    }
    .alert.error {
      background-color: #f8d7da;
      color: #721c24;
      padding: 15px;
      margin: 10px auto;
      width: 80%;
      border-radius: 5px;
    }
  </style>
  <script>
    setTimeout(() => {
      const alert = document.querySelector(".alert");
      if (alert) alert.remove();
    }, 3000);
  </script>
</head>
<body>
  <?php
  if (isset($_SESSION['logout_success'])) {
    echo "<div class='alert success'>You have been logged out successfully.</div>";
    unset($_SESSION['logout_success']);
  }
  ?>

  <div class="form-container">
    <form method="POST">
      <h2>Login to Your Account</h2>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
      <p><a href="forgot_password.php">Forgot Password?</a></p>
    </form>
  </div>

  <?php
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['Password'])) {
      $_SESSION['user_id'] = $user['Id'];
      echo "<script>window.location.href='profile.php';</script>";
      exit;
    } else {
      echo "<div class='alert error'>Incorrect email or password!</div>";
    }
  }
  ?>
</body>
</html>
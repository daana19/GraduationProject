<?php
session_start();
include 'db.php';

$error = '';

if (isset($_POST['email'])) {
  $email = trim($_POST['email']);
  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  if ($user) {
    $_SESSION['reset_email'] = $email;
    $_SESSION['reset_code'] = rand(100000, 999999);

    // Debug only: Show the code (simulate email sending)
    $_SESSION['debug_code_shown'] = true;

    header("Location: verify_code.php");
    exit;
  } else {
    $error = "Email address not found!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .alert.error {
      background-color: #f8d7da;
      color: #721c24;
      padding: 15px;
      margin: 10px auto;
      width: 80%;
      border-radius: 5px;
      text-align: center;
    }
  </style>
  <script>
    setTimeout(() => {
      const alert = document.querySelector(".alert.error");
      if (alert) alert.remove();
    }, 3000);
  </script>
</head>
<body>
  <?php if ($error): ?>
    <div class="alert error"><?= $error ?></div>
  <?php endif; ?>

  <div class="form-container">
    <form method="POST">
      <h2>Forgot Your Password?</h2>
      <input type="email" name="email" placeholder="Enter your email" required>
      <button type="submit">Send Code</button>
    </form>
  </div>
</body>
</html>

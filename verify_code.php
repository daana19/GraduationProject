<?php
session_start();
include 'db.php';

if (!isset($_SESSION['reset_email'], $_SESSION['reset_code'])) {
  header("Location: forgot_password.php");
  exit;
}

$error = '';

if (isset($_POST['code'], $_POST['new_password'])) {
  if ($_POST['code'] == $_SESSION['reset_code']) {
    $email = $_SESSION['reset_email'];
    $new_pass = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $stmt->execute([$new_pass, $email]);

    // Auto-login after reset
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['welcome'] = true;

    unset($_SESSION['reset_email'], $_SESSION['reset_code']);

    header("Location: profile.php");
    exit;
  } else {
    $error = "Incorrect code!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Verify Code</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <?php if ($error): ?>
    <div class="alert error"><?= $error ?></div>
  <?php endif; ?>

  <?php if (isset($_SESSION['reset_code'])): ?>
    <div class="alert success">Test Code: <strong><?= $_SESSION['reset_code'] ?></strong></div>
  <?php endif; ?>

  <div class="form-container">
    <form method="POST">
      <h2>Reset Your Password</h2>
      <input type="text" name="code" placeholder="Enter code sent to your email" required>
      <input type="password" name="new_password" placeholder="New Password" required>
      <button type="submit">Reset Password</button>
    </form>
  </div>
</body>
</html>

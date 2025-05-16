<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Registration</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
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
      const alert = document.querySelector(".alert.error");
      if (alert) alert.remove();
    }, 3000);
  </script>
</head>
<body>
  <div class="form-container">
    <form method="POST" enctype="multipart/form-data">
      <h2>Create Account</h2>
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="text" name="phone" placeholder="Phone Number" required>
      <input type="file" name="profile_image" accept="image/*" required>
      <button type="submit" name="register">Register</button>
    </form>
  </div>

  <?php
  if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = trim($_POST['phone']);

    if (!preg_match('/^[0-9]{8,15}$/', $phone)) {
      echo "<div class='alert error'>Invalid phone number! Must be 8-15 digits.</div>";
      return;
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR phone = ?");
    $stmt->execute([$email, $phone]);

    if ($stmt->rowCount() > 0) {
      echo "<div class='alert error'>Email or phone number already exists!</div>";
      return;
    }

    $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    $target = 'images/' . $img_name;
    move_uploaded_file($tmp_name, $target);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, profile_image) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $password, $phone, $img_name]);

    // Auto-login + welcome
    $lastId = $conn->lastInsertId();
    $_SESSION['user_id'] = $lastId;
    $_SESSION['welcome'] = true;

    header("Location: profile.php");
    exit;
  }
  ?>
</body>
</html>

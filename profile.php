<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .alert.success {
      background-color: #d4edda;
      color: #6e432f;
      padding: 15px;
      margin: 10px auto;
      width: 80%;
      border-radius: 5px;
      text-align: center;
    }
    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin: 10px 5px;
      background-color: #6e432f;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    .btn.danger {
      background-color: #f44336;
    }
  </style>
  <script>
    setTimeout(() => {
      const alert = document.querySelector(".alert.success");
      if (alert) alert.remove();
    }, 3000);
  </script>
</head>
<body>
  <?php if (isset($_SESSION['welcome'])): ?>
    <div class="alert success">Welcome, <?= htmlspecialchars($user['Name']) ?>!</div>
    <?php unset($_SESSION['welcome']); ?>
  <?php endif; ?>

  <div class="profile-box">
    <img src="images/<?= htmlspecialchars($user['Profile_image']) ?>" alt="Profile Picture" class="profile-img">
    <h2><?= htmlspecialchars($user['Name']) ?></h2>
    <p><strong>Email:</strong> <?= htmlspecialchars($user['Email']) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($user['Phone']) ?></p>
    <p><strong>Registered On:</strong> <?= htmlspecialchars($user['created_at'] ?? 'N/A') ?></p>

    <a class="btn" href="edit_profile.php">Edit Profile</a>
    <a class="btn" href="web1.php">Back to Home</a> <!-- Back to home button -->
    <a class="btn danger" href="logout.php">Logout</a>
  </div>
</body>
</html>
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

$error = '';

if (isset($_POST['update'])) {
  $name = trim($_POST['Name']);
  $phone = trim($_POST['Phone']);

  if (!preg_match('/^[0-9]{8,15}$/', $phone)) {
    $error = "Invalid phone number!";
  } else {
    if ($_FILES['profile_image']['error'] === 0 && $_FILES['profile_image']['size'] > 0) {
      $img_name = $_FILES['profile_image']['name'];
      $tmp_name = $_FILES['profile_image']['tmp_name'];
      $target = 'images/' . $img_name;

      if (move_uploaded_file($tmp_name, $target)) {
        $stmt = $pdo->prepare("UPDATE users SET Name = ?, Phone = ?, Profile_image = ? WHERE id = ?");
        $stmt->execute([$name, $phone, $img_name, $_SESSION['user_id']]);
      }
    } else {
      $stmt = $pdo->prepare("UPDATE users SET Name = ?, Phone = ? WHERE id = ?");
      $stmt->execute([$name, $phone, $_SESSION['user_id']]);
    }

    $_SESSION['welcome'] = true;
    header("Location: profile.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
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
</head>
<body>
  <?php if ($error): ?>
    <div class="alert error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <div class="form-container">
    <form method="POST" enctype="multipart/form-data">
      <h2>Edit Your Profile</h2>
      <input type="text" name="Name" value="<?= htmlspecialchars($user['Name']) ?>" required>
      <input type="text" name="Phone" value="<?= htmlspecialchars($user['Phone']) ?>" required>
      <input type="file" name="profile_image" accept="image/*">
      <button type="submit" name="update">Save Changes</button>
    </form>
  </div>
</body>
</html>
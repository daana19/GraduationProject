<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = $_POST['item_id'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("DELETE FROM cart WHERE Id = ? AND user_id = ?");
    $stmt->execute([$item_id, $user_id]);

    header('Location: cart.php');
    exit();
} else {
    header('Location: cart.php');
    exit();
}
?>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = uniqid();  // unique key for each item
    $name = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][$id] = [
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $image
    ];

    header('Location: cart.php');
    exit;
}
?>
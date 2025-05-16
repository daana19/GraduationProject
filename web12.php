<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Electric Kettle - Tools</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('backgroundimg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      margin: 0;
      padding: 20px;
    }
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: rgba(26, 26, 26, 0);
      color: rgb(215, 213, 209);
      scroll-behavior: smooth;
      padding-top: 100px;
    }

    .navbar {
      display: flex;
      justify-content: flex-start;
      background: rgba(163, 162, 162, 0.68);
      padding: 37px 10px;
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }

    .navbar a {
      margin: 0 30px;
      text-decoration: none;
      color: rgb(42, 42, 42);
      font-size: 23px;
    }

    .navbar a.cart-icon i {
      font-size: 23px;
    }

    .title {
      text-align: center;
      font-size: 32px;
      color: rgb(248, 248, 248);
    }

    .title span {
      color: rgb(249, 247, 246);
    }

    .products {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
      flex-wrap: wrap;
    }

    .card {
      background-color: #2e1d1b;
      color: white;
      border-radius: 20px;
      padding: 20px;
      width: 200px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card img {
      width: 100%;
      height: 160px;
      object-fit: cover;
      border-radius: 10px;
    }

    .name {
      font-size: 20px;
      font-weight: bold;
      margin: 15px 0 10px;
      text-transform: capitalize;
      color: #6e432f;
    }

    .details {
      font-size: 14px;
      margin-bottom: 10px;
      min-height: 60px;
    }

    .price {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .cart-button {
      background-color: lightgray;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    .cart-button:hover {
      background-color: #ccc;
    }

    .cart-icon {
      font-size: 18px;
    }
  </style>
</head>
<body>

<h1 class="title">Electric <span>Kettle</span></h1>

<div class="products">
<?php
$products = [
    [
        "name" => "Electric Kettle",
        "image" => "kettle.jpg",
        "details" => [
            "Specially designed V60 coffee pot gives you precise control over the water flow."
        ],
        "price" => 120
    ],
    [
        "name" => "Medium Grind",
        "image" => "medium grind.jpg",
        "details" => [
            "Has a balanced, rich flavor with moderate strength and smoothness."
        ],
        "price" => 75
    ],
    [
        "name" => "Soft Grind",
        "image" => "soft grind.jpg",
        "details" => [
            "Delivers a bold, concentrated flavor with a velvety texture that extracts quickly."
        ],
        "price" => 75
    ]
];

foreach (array_slice($products, 0, 1) as $product) {
    echo '<div class="card">';
    echo '<img src="' . htmlspecialchars($product["image"]) . '" alt="' . htmlspecialchars($product["name"]) . '">';
    echo '<div class="name">' . htmlspecialchars($product["name"]) . '</div>';
    echo '<div class="details">';
    foreach ($product["details"] as $line) {
        echo htmlspecialchars($line) . '<br>';
    }
    echo '</div>';
    echo '<div class="price">' . $product["price"] . ' SAR</div>';
    echo '<form method="post" action="add_to_cart.php">';
    echo '<input type="hidden" name="item_name" value="' . htmlspecialchars($product["name"]) . '">';
    echo '<input type="hidden" name="price" value="' . $product["price"] . '">';
    echo '<input type="hidden" name="quantity" value="1">';
    echo '<input type="hidden" name="image" value="' . htmlspecialchars($product["image"]) . '">';
    echo '<button type="submit" class="cart-button">';
    echo '<i class="fas fa-shopping-cart"></i>';
    echo '</button>';
    echo '</form>';
    echo '</div>';
}
?>
</div>

<div class="navbar">
    <a href="cart.php" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
    <a href="web1.php#about">About Us</a>
    <a href="web5.php">Beans</a>
    <a href="web6.php">Tools</a>
    <a href="login.php">Profile</a>
</div>

</body>
</html>
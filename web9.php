<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Colombian - Coffee</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-image: url('backgroundimg.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    color: rgb(215, 213, 209);
    padding-top: 100px;
}

.navbar {
    display: flex;
    justify-content: flex-start;
    background: rgba(163, 162, 162, 0.68);
    padding: 15px 20px;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 1000;
}

.navbar a {
    margin-right: 30px;
    text-decoration: none;
    color: rgb(42, 42, 42);
    font-size: 20px;
}

h1.title {
    text-align: center;
    font-size: 32px;
    color: white;
    margin-bottom: 40px;
}

h1.title span {
    color: rgb(249, 247, 246);
}

.products {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 0 20px;
}

.card {
    background-color: rgba(46, 29, 27, 0.9);
    color: white;
    border-radius: 15px;
    padding: 20px;
    width: 220px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    display: flex;
    flex-direction: column;
}

.card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.name {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    text-transform: capitalize;
    color: #f1d3b9;
}

.details {
    font-size: 14px;
    margin-bottom: 10px;
    min-height: 50px;
}

.price {
    font-size: 20px;
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

<div class="navbar">
    <a href="cart.php" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
    <a href="web1.php">Home</a>
    <a href="web1.php#about">About Us</a>
    <a href="web5.php">Beans</a>
    <a href="web6.php">Tools</a>
    <a href="login.php">Profile</a>
</div>

<h1 class="title">Ethyopian <span>Coffee</span></h1>

<div class="products">
<?php
$products = [
    [
        "name" => "Ethyopian coffee Coarse grind",
        "image" => "coarse grind.jpg",
        "details" => [
            "Mild, smooth flavor with low bitterness and a light body.",
        ],
        "price" => 75
    ],
    [
        "name" => "Ethyopian coffee Medium grind",
        "image" => "medium grind.jpg",
        "details" => [
            "Balanced, rich flavor with moderate strength and smoothness."
        ],
        "price" => 75
    ],
    [
        "name" => "Ethyopian coffee Soft grind",
        "image" => "soft grind.jpg",
        "details" => [
            "Bold, concentrated flavor with a velvety texture."
        ],
        "price" => 75
    ]
];

foreach ($products as $product) {
    echo '<div class="card">';
    echo '<img src="' . htmlspecialchars($product["image"]) . '" alt="' . htmlspecialchars($product["name"]) . ' Coffee">';
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

</body>
</html>
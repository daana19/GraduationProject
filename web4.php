<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Best Sales - Coffee</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">

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
    <style>
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
      color:rgb(248, 248, 248);
    }

    .title span {
      color:rgb(249, 247, 246);
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
    }

    .card img {
      width: 100%;
      border-radius: 10px;
    }

    .name {
      font-size: 20px;
      font-weight: bold;
      margin: 15px 0;
      text-transform: capitalize;
      color: #6e432f;
    }

    .details {
      font-size: 14px;
      margin-bottom: 10px;
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

  <h1 class="title">best <span>sales</span></h1>

  <div class="products">
    <?php
      $products = [
        [
          "name" => "colombian",
          "image" => "colombian.jpg",
          "details" => [
            "Famous for its high quality",
            "Its balanced flavor",
            "Its moderate acidity"
          ],
          "price" => 75
        ],
        [
          "name" => "brazilian",
          "image" => "brazilian.jpg",
          "details" => [
            "Famous for its high quality",
            "Its balanced flavor",
            "Its moderate acidity"
          ],
          "price" => 75
        ],
        [
          "name" => "ethiopian",
          "image" => "ethiopian.jpg",
          "details" => [
            "Famous for its high quality",
            "Its balanced flavor",
            "Its moderate acidity"
          ],
          "price" => 75
        ]
      ];

      foreach ($products as $product) {
        echo '<div class="card">';
        echo '<img src="' . $product["image"] . '" alt="' . $product["name"] . ' Coffee">';
        echo '<div class="name">' . $product["name"] . '</div>';
        echo '<div class="details">';
        foreach ($product["details"] as $line) {
          echo $line . '<br>';
        }
        echo '</div>';
        echo '<div class="price">' . $product["price"] . '</div>';
        echo '<button class="cart-button" onclick="addToCart(\'' . $product["name"] . '\')">';
        echo '<span class="cart-icon">🛒</span>';
        echo '</button>';
        echo '</div>';
      }
    ?>
  </div>

  <script>
    function addToCart(product) {
      alert("تم إضافة " + product + " إلى السلة!");
    }
  </script>
  <div class="navbar">
    <a href="cart.php" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
    <a href="web1.php#about">About Us</a>
    <a href="web5.php">Beans</a>
    <a href="web6.php">Tools</a>
    <a href="login.php">Profile</a>
</div>

</body>
</html>
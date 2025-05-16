<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tools</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('backgroundimg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #333;
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


        h1 {
            text-align: center;
            padding: 30px;
            color: #fff;
            text-shadow: 2px 2px 5px #000;
        }

        .bean-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
        }

        .bean-card {
            text-align: center;
            padding: 15px;
            border-radius: 15px;
            background-color: rgba(221, 159, 134, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 220px;
        }

        img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        a {
            text-decoration: none;
            color: #5c3d00;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Tools</h1>

    <div class="bean-container">
        <?php
        $beans = [
            ['name' => 'filters', 'image' => 'filters.jpg', 'link' => 'web10.php'],
            ['name' => 'coffee maker', 'image' => 'coffee maker.jpg', 'link' => 'web11.php'],
            ['name' => 'electric kettle', 'image' => 'electric.jpg', 'link' => 'web12.php']
        ];

        foreach ($beans as $bean) {
            echo '<div class="bean-card">';
            echo '<a href="' . $bean['link'] . '">';
            echo '<img src="' . $bean['image'] . '" alt="' . $bean['name'] . '"><br>';
            echo strtolower($bean['name']);
            echo '</a>';
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
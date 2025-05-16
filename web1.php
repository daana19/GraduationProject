<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <?php
    session_start();
    ?>
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

        .container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 100vh;
            background-image: url('firstfoto-0001.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
        }

        #about {
            height: 100vh;
            background-image: url('second.png');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 100px;
        }

        .title {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content {
            max-width: 70%;
            font-size: 40px;
            line-height: 1.5;
            margin-top: 100px;
        }

        #home {
            height: 100vh;
            background-image: url('second.png');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 120px;
        }

        #home h1 {
            font-size: 50px;
            background: rgba(0, 0, 0, 0);
            padding: 20px;
            border-radius: 10px;
        }

        #home h2 {
            font-size: 40px;
            background: rgba(0, 0, 0, 0);
            margin: 5px 0;
        }

        .coffee-card {
            margin: 20px;
            text-align: center;
        }

        .coffee-card img {
            width: 200px;
            height: auto;
            border-radius: 10px;
        }

        .coffee-card p {
            font-size: 18px;
            margin-top: 10px;
            color: #fff;
        }

        .coffee-card a {
            text-decoration: none;
            color: rgb(215, 213, 209);
        }

        .coffee-card a:hover p {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- شريط التنقل -->
    <div class="navbar">
        <a href="cart.php" class="cart-icon"><i class="fas fa-shopping-cart"></i></a>
        <a href="#about">About Us</a>
        <a href="web5.php">Beans</a>
        <a href="web6.php">Tools</a>
        <a href="login.php">Profile</a>
    
    </div>

    <!-- الصفحة الرئيسية -->
    <div class="container" id="screen1">
    </div>

    <!-- واجهة About Us -->
    <div id="about">
        <h1 class="title">About Our Vero</h1>
        <p class="content">Vero is a black coffee website that offers the best and finest types of coffee beans</p>
    </div>

    <!-- الواجهة الثالثة تظهر بعد التمرير -->
    <div class="container" id="home">
        <h1>Home</h1>
        <h2>Best Sales</h2>

        <div class="coffee-card colombian">
            <a href="web7.php">
                <img src="third.jpeg" alt="Colombian Coffee">
                <p>Colombian</p>
            </a>
        </div>

        <div class="coffee-card brazilian">
            <a href="web8.php">
                <img src="third.jpeg" alt="Brazilian Coffee">
                <p>Brazilian</p>
            </a>
        </div>
    </div>

</body>
</html>

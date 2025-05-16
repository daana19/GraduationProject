<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Coffee Shop</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('img/site-bg.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    .index-box {
      max-width: 600px;
      margin: 80px auto;
      background: rgba(255, 247, 241, 0.95);
      padding: 40px;
      text-align: center;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    .index-box h1 {
      color: #7a4b28;
      margin-bottom: 10px;
    }
    .index-box p {
      margin-bottom: 25px;
      color: #5e4937;
    }
    .index-box a {
      display: inline-block;
      margin: 0 10px;
      padding: 12px 20px;
      background-color: #7a4b28;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      transition: 0.3s;
    }
    .index-box a:hover {
      background-color: #5a321d;
    }

    .contact-section {
      background: url('background5.jpg') no-repeat center center;
      background-size: cover;
      color: white;
      text-align: center;
      padding: 50px 0;
      margin-top: 50px;
    }
    .contact-section h2 {
      font-size: 28px;
      margin-bottom: 20px;
    }
    .contact-info {
  display: inline-block;
  background-color: #7a4b28; /* بني */
  padding: 20px 40px;
  border-radius: 10px;
  color: white;
}
.contact-info span {
  font-weight: bold;
  color: #fff;
}

    .contact-info div {
      margin: 15px 0;
      font-size: 18px;
      text-align: center;
    }
    .contact-info span {
      font-weight: bold;
      display: inline-block;
      width: 90px;
    }
  </style>
</head>
<body>

  <div class="index-box">
    <h1>Welcome to Coffee Shop ☕️</h1>
    <p>Buy premium coffee beans directly from our farm to your cup.</p>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
  </div>

  <!-- Contact Section -->
  <div class="contact-section">
    <h2>to contact with us</h2>
    <div class="contact-info">
      <div><span>Phone 1:</span> +966 055 764 6523</div>
      <div><span>Phone 2:</span> +966 055 436 8765</div>
      <div><span>Email:</span> verosite@gmail.com</div>
    </div>
  </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vero Coffee</title>
    <?php
    session_start();
    ?>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('second.png'); /* تأكد من وجود الصورة */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color:rgb(215, 213, 209);
        }

        .title {
            margin-top: 50px; /* يبعد العنوان عن الحافة العلوية */
            font-size: 40px;
            font-weight: bold;
        }

        .content {
            margin-top: 150px; /* يجعل النص في المنتصف */
            max-width: 70%;
            font-size: 30px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1 class="title">About Our Vero</h1>
    <p class="content">Vero is a black coffee website that offers the best and finest types of coffee beans</p>
</body>
</html>  
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        unset($_SESSION['cart'][$delete_id]);
    }
    if (isset($_POST['clear_cart'])) {
        unset($_SESSION['cart']);
    }
    if (isset($_POST['checkout'])) {
        $checkout_details = [];
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $checkout_details[] = $item['name'];
            $total += $item['price'] * $item['quantity'];
        }
        $_SESSION['checkout'] = [
            'items' => $checkout_details,
            'total_price' => $total
        ];
        $show_popup = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Your Cart</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-image: url('backgroundimg.jpg');
    background-size: cover;
    color: white;
    padding: 30px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

.cart-item {
    background: rgba(0,0,0,0.7);
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 10px;
    display: flex;
    align-items: center;
}

.cart-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 10px;
    margin-right: 20px;
}

.cart-item .info {
    flex-grow: 1;
}

.buttons-row {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 30px;
    flex-wrap: wrap;
}

button,
a.button-link {
    background: #6e432f;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    font-size: 16px;
}

button:hover,
a.button-link:hover {
    opacity: 0.85;
}

button.delete-button {
    background: red;
}

button.clear-cart {
    background: #6e432f;
}

.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, 0.95);
    color: white;
    padding: 30px;
    border-radius: 10px;
    width: 300px;
    text-align: center;
    z-index: 999;
}

.popup.show {
    display: block;
}
</style>
</head>
<body>

<h1>Your Cart</h1>

<?php if (!empty($_SESSION['cart'])): ?>
    <?php foreach ($_SESSION['cart'] as $id => $item): ?>
        <div class="cart-item">
            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>">
            <div class="info">
                <h3><?= htmlspecialchars($item['name']) ?></h3>
                <p>Price: <?= htmlspecialchars($item['price']) ?> SAR</p>
                <p>Quantity: <?= htmlspecialchars($item['quantity']) ?></p>
            </div>
            <form method="POST" action="cart.php">
                <input type="hidden" name="delete_id" value="<?= $id ?>">
                <button class="delete-button" type="submit">Delete</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>

<div class="buttons-row">
    <form method="POST" action="cart.php">
        <button class="clear-cart" name="clear_cart" type="submit">Clear Cart</button>
    </form>

    <form method="POST" action="cart.php">
        <button type="submit" name="checkout">Checkout</button>
    </form>

    <a href="web1.php" class="button-link">Continue Shopping</a>
</div>

<?php if (isset($show_popup) && $show_popup): ?>
    <div class="popup show">
        <h2>Checkout Successful</h2>
        <p>Items: <?= implode(', ', $_SESSION['checkout']['items']) ?></p>
        <p>Total Price: <?= $_SESSION['checkout']['total_price'] ?> SAR</p>
        <form method="POST" action="cart.php">
            <button type="submit" name="clear_cart">Continue Shopping</button>
        </form>
    </div>
<?php endif; ?>

</body>
</html>
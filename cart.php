<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <ul>
        <?php
        // Start or resume the session
        session_start();

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                echo '<li>' . $item['name'] . ' - $' . number_format($item['price'], 2) . '</li>';
            }
        } else {
            echo '<li>Your cart is empty.</li>';
        }
        ?>
    </ul>
</body>
</html>

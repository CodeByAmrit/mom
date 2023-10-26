<?php
// Start or resume the session
session_start();

// Check if the item ID and name are set
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Check if the cart exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the item is already in the cart
    $itemInCart = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $id) {
            $itemInCart = true;
            $item['quantity']++;
        }
    }

    // If the item is not in the cart, add it
    if (!$itemInCart) {
        array_push($_SESSION['cart'], array('id' => $id, 'name' => $name, 'price' => $price, 'quantity' => 1));
    }
}

// Redirect back to the main page or cart page
header("Location: index.html"); // Change to your main page or cart page
?>

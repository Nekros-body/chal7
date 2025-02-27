<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'])) {
    $productId = intval($_POST['product_id']);

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$productId])) {
        // If it exists, update the quantity
        $_SESSION['cart'][$productId]['quantity'] += 1;
        echo "Product quantity updated in cart.";
    } else {
        // If it doesn't exist, add it to the cart with quantity 1
        $_SESSION['cart'][$productId] = ['quantity' => 1];
        echo "Product added to cart.";
    }
} else {
    echo "Error: Product ID not set.";
}
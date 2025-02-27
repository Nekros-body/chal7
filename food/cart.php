<?php
session_start();
include '../login/db.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User  not logged in.";
    exit;
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product name and quantity from the POST data
    $productName = $_POST['product'];
    $quantity = intval($_POST['quantity']);
    $price = 2.00; // Assuming a fixed price for all products; you can adjust this as needed

    // Check if the product is already in the cart for this user
    $stmt = $conn->prepare("SELECT * FROM carts WHERE user_id = ? AND product_name = ?");
    $stmt->bind_param("is", $userId, $productName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If it exists, update the quantity
        $stmt = $conn->prepare("UPDATE carts SET quantity = quantity + ? WHERE user_id = ? AND product_name = ?");
        $stmt->bind_param("iis", $quantity, $userId, $productName);
        $stmt->execute();
        echo "Product quantity updated in cart.";
    } else {
        // If it doesn't exist, add it to the cart
        $stmt = $conn->prepare("INSERT INTO carts (user_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isid", $userId, $productName, $quantity, $price);
        $stmt->execute();
        echo "Product added to cart.";
    }

    $stmt->close();
    exit;
}
?>
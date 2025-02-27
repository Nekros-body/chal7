<?php
session_start();
include '../login/db.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Process the checkout (e.g., save order details to the database)
// Here you would typically handle payment processing and order creation

// Clear the cart after checkout
$stmt = $conn->prepare("DELETE FROM carts WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();

// Optionally, you can provide a success message or redirect to a confirmation page
echo "<h1>Thank you for your order!</h1>";
echo "<p>Your order has been placed successfully.</p>";

?>
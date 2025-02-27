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

// Fetch cart items for the user
$stmt = $conn->prepare("SELECT * FROM carts WHERE user_id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<h1>Your Cart is Empty</h1>";
    exit();
}

echo "<h1>Your Cart</h1>";
$totalPrice = 0;

while ($item = $result->fetch_assoc()) {
    $quantity = $item['quantity'];
    $price = $item['price'];
    $totalPrice += $price * $quantity;

    echo "<div>";
    echo "<h2>" . htmlspecialchars($item['product_name']) . "</h2>";
    echo "<p>Price: € " . number_format($price, 2) . "</p>";
    echo "<p>Quantity: " . $quantity . "</p>";
    echo "</div>";
}

echo "<h2>Total Price: € " . number_format($totalPrice, 2) . "</h2>";
echo "<a href='checkout.php'>Proceed to Checkout</a>"; // Link to checkout page

$stmt->close();
$conn->close();
?>
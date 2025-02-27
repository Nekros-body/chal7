<?php
session_start();
include '../login/db.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'User  not logged in.']);
    exit;
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];



// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $productName = isset($_POST['product']) ? trim($_POST['product']) : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;

    // Basic validation
    if (empty($productName) || $quantity <= 0 || $price <= 0) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid product data.']);
        exit;
    }

    // Check if the product is already in the cart for this user
    $stmt = $conn->prepare("SELECT * FROM carts WHERE user_id = ? AND product_name = ?");
    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
        exit;
    }
    
    $stmt->bind_param("is", $userId, $productName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If it exists, update the quantity
        $stmt = $conn->prepare("UPDATE carts SET quantity = quantity + ? WHERE user_id = ? AND product_name = ?");
        if (!$stmt) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
            exit;
        }
        
        $stmt->bind_param("iis", $quantity, $userId, $productName);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Product quantity updated in cart.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update product quantity.']);
        }
    } else {
        // If it doesn't exist, add it to the cart
        $stmt = $conn->prepare("INSERT INTO carts (user_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $conn->error]);
            exit;
        }
        
        $stmt->bind_param("isid", $userId, $productName, $quantity, $price);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Product added to cart.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add product to cart.']);
        }
    }

    $stmt->close();
    exit;
}

// If the request method is not POST, return an error
echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
?>
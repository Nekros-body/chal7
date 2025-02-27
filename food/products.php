<?php
session_start();
include '../login/db.php'; // Your database connection

// Fetch products from the database
$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$result = $stmt->get_result();

echo "<h1>Products</h1>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h2>" . $row['name'] . "</h2>";
    echo "<p>Price: $" . $row['price'] . "</p>";
    echo "<button class='add-to-cart' data-product-id='" . $row['id'] . "'>Add to Cart</button>";
    echo "</div>";
}

$stmt->close();
$conn->close();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        var productId = $(this).data('product-id');

        $.ajax({
            url: 'add_to_cart.php',
            type: 'POST',
            data: { product_id: productId },
            success: function(response) {
                alert(response); // You can handle the response as needed
            }
        });
    });
});
</script>
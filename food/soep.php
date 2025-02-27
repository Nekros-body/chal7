<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productpagina</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .product-container {
            display: flex;
            margin: 40px;
            gap: 20px;
        }

        .shit {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }


        .product {
            position: relative;
            border: 1px solid #ccc;
            padding: 10px;
            background: #f9f9f9;
            text-align: center;
            width: 15vw;
            height: 50vh;

        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .product h2 {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .product p {
            margin: 5px 0;
        }
        .buy-form {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        input[type="number"] {
            width: 60px;
            padding: 5px;
            text-align: center;
        }
        button {
            padding: 8px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;

        }
        button:hover {
            background-color: #218838;
        }

        .menu-container {
            position: relative;
        }
        .hamburger {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
            z-index: 1000;
        }
        .bar {
            width: 30px;
            height: 4px;
            background-color: #333;
            margin: 6px 0;
            transition: 0.4s;
        }
        .menu {
            position: fixed;
            top: 0;
            left: -260px;
            width: 250px;
            height: 100vh;
            background: #333;
            color: black;
            padding-top: 60px;
            transition: 0.4s;
            background: white;
            z-index: 10;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5);
        }
        .menu a {
            display: block;
            color: black;
            text-decoration: none;
            padding: 15px;
            font-size: 18px;
        }
        .menu a:hover {
            background: grey;
        }
        .menu.active {
            left: 0;
        }
        .hamburger.active .bar:nth-child(1) {
            transform: translateY(10px) rotate(45deg);
        }
        .hamburger.active .bar:nth-child(2) {
            opacity: 0;
        }
        .hamburger.active .bar:nth-child(3) {
            transform: translateY(-10px) rotate(-45deg);
        }
    </style>
</head>
<body>
<header>
    <div class="menu-container">
        <div class="hamburger" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <nav class="menu" id="menu">
            <a href="index.php">Home</a>
            <a href="../Over ons, Contact & diensten/diensten.php">Diensten</a>
            <a href="../Over ons, Contact & diensten/OverOns.php">Over</a>
            <a href="../Over ons, Contact & diensten/contact.php">Contact</a>
            <a href="../login/logout.php">logout</a>
        </nav>
    </div>
    <a href="index.php" style="display: inline-block; margin: 0; padding: 0;"> <http://localhost/chal7/food/index.php#></http:></a>
    <img src='../img/meeslogo.png' alt="foto">
    </header>

    
<div class="product-container">
    <div class="product">
        <img src= '../img/romige.jpg' alt="Championsoep">
        <div class="shit">
        <h2>Championsoep</h2>
        <p>Geniet van deze heerlijke championsoep.</p>
        <p>Prijs: € 2,50</p>
        <form action="cart.php" method="POST" class="buy-form">
            <input type="hidden" name="product" value="Championsoep">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Koop</button>
        </form>
    </div>
    </div>

    <div class="product">
        <img src= '../img/tomaatsoep.jpg' alt="Tomatensoep">
        <div class="shit">
        <h2>Tomatensoep</h2>
        <p>Geniet van deze heerlijke Tomatensoep</p>
        <p>Prijs: € 2,50</p>
        <form action="cart.php" method="POST" class="buy-form">
            <input type="hidden" name="product" value="Tomatensoep">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Koop</button>
        </form>
        </div>
    </div>
</div>

<script>
        function toggleMenu() {
            const menu = document.getElementById("menu");
            const hamburger = document.querySelector(".hamburger");
            menu.classList.toggle("active");
            hamburger.classList.toggle("active");
        }
    </script>

<footer>
<p>&copy; 2025 Mees Catering. Alle rechten voorbehouden.</p>
<a href="view_cart.php"><img id="cart" src='../img/winkelwagen.png' alt="foto"></a>

</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.buy-form').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        var form = $(this);
        var productName = form.find('input[name="product"]').val();
        var quantity = form.find('input[name="quantity"]').val();

        $.ajax({
            url: 'cart.php', // The PHP file that handles adding to the cart
            type: 'POST',
            data: {
                product: productName,
                quantity: quantity
            },
            success: function(response) {
                // Display a success message
                alert(response); // You can customize this to show a message on the page instead
            },
            error: function() {
                alert('An error occurred while adding the product to the cart.');
            }
        });
    });
});
</script>
</body>
</html>

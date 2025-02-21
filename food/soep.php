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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .product {
            border: 1px solid #ccc;
            padding: 10px;
            max-width: 300px;
            background: #f9f9f9;
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
    </style>
</head>
<body>

<div class="product">
    <img src= '../img/championsoep.png' alt="Championsoep">
    <h2>Championsoep</h2>
    <p>Geniet van deze heerlijke championsoep.</p>
    <p>Prijs: € 2,50</p>
</div>

<div class="product">
    <img src= '../img/meeslogo.png' alt="tomaatsoep">
    <h2>Championsoep</h2>
    <p>Hier is een korte beschrijving van het product. Vermeld hier de belangrijkste kenmerken.</p>
    <p>Prijs: € 2,50</p>
</div>
</body>
</html>

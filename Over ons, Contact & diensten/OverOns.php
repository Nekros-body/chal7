<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
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
<div class="inhoud">
<h1>Over ons</h1>

    <ul>
     Bij Vista College Heerlen staat de student centraal. Onze cateringservice biedt een breed scala aan verse en smakelijke opties om de dagelijkse eetbehoeften van onze studenten te vervullen. Wij geloven dat goed eten bijdraagt aan een betere leerervaring en een gezonde levensstijl.
      Onze broodjes worden dagelijks bereid met de beste ingrediënten en zijn verkrijgbaar in een groot assortiment. Of je nu zin hebt in een klassiek belegde broodje, een gezond alternatief of een snel ontbijt voor onderweg, wij hebben voor ieder wat wils. We streven ernaar om onze producten regelmatig te vernieuwen en aan te passen aan de wensen van onze studenten, inclusief dieetopties zoals glutenvrij en veganistisch.
     Naast onze broodjeservice bieden we ook diverse snacks en dranken om je dag op school compleet te maken. Ons team van enthousiaste medewerkers staat altijd klaar om je te helpen en te adviseren bij je keuze.
     Bij Vista College Heerlen willen we een gezellige en gastvrije omgeving creëren waar studenten kunnen genieten van een goede maaltijd en elkaar kunnen ontmoeten. Kom gerust langs in onze kantine, bestel online of neem een kijkje op ons menu!

     </ul>
    
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
</footer>
</body>
</html>
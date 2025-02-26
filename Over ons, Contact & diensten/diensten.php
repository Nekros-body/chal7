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
            left: -250px;
            width: 250px;
            height: 100vh;
            background: #333;
            color: black;
            padding-top: 60px;
            transition: 0.4s;
            background: white;
            z-index: 10;
        }
        .menu a {
            display: block;
            color: black;
            text-decoration: none;
            padding: 15px;
            font-size: 18px;
        }
        .menu a:hover {
            background: #1f4952;
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
            <a href="#">Diensten</a>
            <a href="#">Over</a>
            <a href="#">Contact</a>
            <a href="../login/logout.php">logout</a>
        </nav>
    </div>
    <a href="index.php" style="display: inline-block; margin: 0; padding: 0;"> <http://localhost/chal7/food/index.php#></http:></a>
    <img src='../img/meeslogo.png' alt="foto">
</header>
<div class="inhoud">
    <p>Diensten van Vista College Heerlen Catering
1. Broodjes Bestellen en Ophalen
•	Groot Assortiment: Kies uit een divers aanbod van verse broodjes, waaronder:
o	Belegde Broodjes: Variërend van klassieke kaas en ham tot luxe beleg met vis of vegetarische opties.
o	Zorgvuldig Geselecteerde Ingrediënten: Alle broodjes worden bereid met verse, hoogwaardige ingrediënten.
o	Speciale Dieetopties: Inclusief glutenvrije en veganistische keuzes.
2. Ontbijtservice
•	Ontbijt Broodjes: Start je dag goed met onze lekkere ontbijtopties, zoals croissants en luxe belegde broodjes.
3. Snacks en Dranken
•	Tussendoortjes: Naast broodjes bieden we een selectie van snacks, zoals fruit, noten en zoetigheden.
•	Dranken: Kies uit een assortiment van koffie, thee, sappen en frisdranken om je bestelling compleet te maken.
4. Groepsbestellingen
•	Voor Evenementen: Ideaal voor vergaderingen, evenementen of andere gelegenheden waarbij je met een groep bent. Plaats eenvoudig een grote bestelling en haal deze op.
5. Openingstijden
•	Flexibele Afhaalopties: Onze service is beschikbaar tijdens de schooluren, zodat je altijd snel een maaltijd kunt ophalen tussen de lessen door.
6. Bestelinformatie
•	Eenvoudig Bestellen: Plaats je bestelling online of ter plaatse, en haal je favoriete broodjes op het afgesproken tijdstip op.

</p>
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
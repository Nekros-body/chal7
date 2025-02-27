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
<h1>Diensten van Vista College Heerlen Catering</h1>
    
    <h2>1. Broodjes Bestellen en Ophalen</h2>
    <ul>
        <li><strong>Groot Assortiment:</strong> Kies uit een divers aanbod van verse broodjes, waaronder:
            <ul>
                <li><strong>Belegde Broodjes:</strong> Variërend van klassieke kaas en ham tot luxe beleg met vis of vegetarische opties.</li>
                <li><strong>Zorgvuldig Geselecteerde Ingrediënten:</strong> Alle broodjes worden bereid met verse, hoogwaardige ingrediënten.</li>
                <li><strong>Speciale Dieetopties:</strong> Inclusief glutenvrije en veganistische keuzes.</li>
            </ul>
        </li>
    </ul>
    
    <h2>2. Ontbijtservice</h2>
    <ul>
        <li><strong>Ontbijt Broodjes:</strong> Start je dag goed met onze lekkere ontbijtopties, zoals croissants en luxe belegde broodjes.</li>
    </ul>
    
    <h2>3. Snacks en Dranken</h2>
    <ul>
        <li><strong>Tussendoortjes:</strong> Naast broodjes bieden we een selectie van snacks, zoals fruit, noten en zoetigheden.</li>
        <li><strong>Dranken:</strong> Kies uit een assortiment van koffie, thee, sappen en frisdranken om je bestelling compleet te maken.</li>
    </ul>
    
    <h2>4. Groepsbestellingen</h2>
    <ul>
        <li><strong>Voor Evenementen:</strong> Ideaal voor vergaderingen, evenementen of andere gelegenheden waarbij je met een groep bent. Plaats eenvoudig een grote bestelling en haal deze op.</li>
    </ul>
    
    <h2>5. Openingstijden</h2>
    <ul>
        <li><strong>Flexibele Afhaalopties:</strong> Onze service is beschikbaar tijdens de schooluren, zodat je altijd snel een maaltijd kunt ophalen tussen de lessen door.</li>
    </ul>
    
    <h2>6. Bestelinformatie</h2>
    <ul>
        <li><strong>Eenvoudig Bestellen:</strong> Plaats je bestelling online of ter plaatse, en haal je favoriete broodjes op het afgesproken tijdstip op.</li>
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
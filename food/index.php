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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            color: white;
            padding-top: 60px;
            transition: 0.4s;
            background: #FF4B4B;
        }
        .menu a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px;
            font-size: 18px;
        }
        .menu a:hover {
            background: #575757;
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
            <a href="#">Home</a>
            <a href="#">Diensten</a>
            <a href="#">Over</a>
            <a href="#">Contact</a>
            <a href="../login/logout.php">logout</a>
        </nav>
    </div>
        <h6>Mees Cathering</h6>
        <nav>
            <a href="#">home</a>
        </nav>
    </header>
    <div class="inhoud">
    <?php
        $producten = array('image.png', 'soep.png', "snacks.png", 'gebak.png','broodjes.png' );

        foreach($producten as $key => $value) {
            print "<div class='item$key'><img src='../img/$value'></div>";
        }
?>
    </div>
    <script>
        function toggleMenu() {
            const menu = document.getElementById("menu");
            const hamburger = document.querySelector(".hamburger");
            menu.classList.toggle("active");
            hamburger.classList.toggle("active");
        }
    </script>
</body>
</html>
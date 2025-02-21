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
            background: #d35705a;
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
    <a href="index.php" style="display: inline-block; margin: 0; padding: 0;"> <http://localhost/chal7/food/index.php#></http:>
    <img src="https://vistaict.gitbook.io/~gitbook/image?url=https%3A%2F%2F939967589-files.gitbook.io%2F%7E%2Ffiles%2Fv0%2Fb%2Fgitbook-x-prod.appspot.com%2Fo%2Fspaces%252FSrg7DVCyL5uVwXDLTq92%252Fuploads%252FZC79ikHRPi66QiXt13nf%252Fimage.png%3Falt%3Dmedia%26token%3De9df67e7-a8be-4b9e-86d2-16dec79e9de0&width=400&dpr=3&quality=100&sign=daea5554&sv=2" alt="foto">
    </header>
    <div class="inhoud">
    <?php
        $producten = array('image.png', 'soep.png', "snacks.png", 'gebak.png','broodjes.png' );

        foreach($producten as $key => $value) {
            print "<div class='item$key'><img src='../img/$value'></div>";
        }
?>

<footer>
<p>&copy; 2025 Mees Catering. Alle rechten voorbehouden.</p>
</footer>

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
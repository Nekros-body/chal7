<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        echo "Registratie succesvol. <a href='login.php'>Log in</a>";
    } else {
        echo "Er is een fout opgetreden.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="kak">

            <div class= shit>
            <img src="../img/logo-vista.png">
            <form method="POST">
                <p>Gebruikersnaam: </p><input id="input" type="text" name="username" required><br>
                <p>Wachtwoord: </p><input id="input" type="password" name="password" required><br>
                <button type="submit">Registreer</button>
                <p> al een account? klik <a href="login.php"> hier</a></p>
            </form>
            </div>
        </div>
    </main>
</body>
</html>


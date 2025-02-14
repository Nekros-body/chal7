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
</head>
<body>
<form method="POST">
    Gebruikersnaam: <input type="text" name="username" required>
    Wachtwoord: <input type="password" name="password" required>
    <button type="submit">Registreer</button>
</form>
</body>
</html>


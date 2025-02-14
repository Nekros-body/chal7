<?php
include 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Ongeldige inloggegevens.";
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
    <button type="submit">Login</button>
    <p> nog geen account? klik dan<a href="register.php"> hier</a></p>
</form>
</body>
</html>


<?php 
include 'db.php';
session_start();
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

    
        <img id="man" src="../img/mees.png">
        <div class="shit">

            <form method="POST">
                <p>Gebruikersnaam:</p><input id="input"type="text" name="username" required><br>
                <p>Wachtwoord:</p><input id="input" type="password" name="password" required><br>
                <button type="submit">Login</button>
                <p> nog geen account? klik dan<a href="register.php"> hier</a></p>

            </form>
            <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Prepare and execute the SQL statement using mysqli
                    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
                    $stmt->bind_param("s", $username); // Bind the username parameter
                    $stmt->execute();
                    $result = $stmt->get_result(); // Get the result set from the executed statement
                    $user = $result->fetch_assoc(); // Fetch the user data as an associative array

                    if ($user && password_verify($password, $user['password'])) {
                        // Successful login
                        $_SESSION['user_id'] = $user['id'];
                        header("Location: ../food/index.php");
                        exit;
                    } else {
                        // Invalid credentials
                        echo "Ongeldige inloggegevens.";
                    }
                }
                ?>
                        </div>

    </main>
</body>
</html>


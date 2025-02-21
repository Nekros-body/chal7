
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="particles-js"></div>

            <div class= shit>
            <img src="../img/logo-vista.png">
            <form method="POST">
                <p>Gebruikersnaam: </p><input id="input" type="text" name="username" required><br>
                <p>Wachtwoord: </p><input id="input" type="password" name="password" required><br>
                <button type="submit">Registreer</button>
                <p> al een account? klik <a href="login.php"> hier</a></p>
            </form>
                                <?php
                    include 'db.php';

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $username = $_POST['username'];
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        // Check if the username already exists
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
                        $stmt->execute([$username]);
                        $userExists = $stmt->fetchColumn();

                        if ($userExists) {
                            echo "Deze gebruikersnaam is al in gebruik.";
                        } else {
                            // Insert new user
                            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                            if ($stmt->execute([$username, $password])) {
                                header("Location: login.php");
                                exit();
                            } else {
                                echo "Er is een fout opgetreden.";
                            }
                        }
                    }
                    ?>

            </div>

<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="script.js"></script>
</body>
</html>


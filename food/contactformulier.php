<?php
// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "jouwemail@example.com"; // Vervang dit met je eigen e-mail
    $subject = "Nieuw bericht van je contactformulier";
    $headers = "From: $email";

    $mailBody = "Naam: $name\nE-mail: $email\n\nBericht:\n$message";

    if (mail($to, $subject, $mailBody, $headers)) {
        $successMessage = "Bedankt! Je bericht is verzonden.";
    } else {
        $errorMessage = "Er is iets misgegaan. Probeer het opnieuw.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactformulier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label, input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input, textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <form action="" method="POST">
        <h2>Contactformulier</h2>

        <!-- Toon succes- of foutmelding -->
        <?php if (!empty($successMessage)): ?>
            <p class="success"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        
        <?php if (!empty($errorMessage)): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <label for="name">Naam:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Bericht:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Verzenden</button>
    </form>

</body>
</html>


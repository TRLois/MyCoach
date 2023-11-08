<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <title>Connexion</title>
</head>
<body>
    <div class="wrapper">
        <div class="login">
            <h1>Se connecter</h1>
            <form method="POST" action="../include/connexionSite.php">
                <p for="username">Nom d'utilisateur:</p>
                <input type="text" name="username" id="username" required>
                <br>
                <p for="password">Mot de passe:</p>
                <input type="password" name="password" id="password" required>
                <br>
                <input type="submit" value="Se connecter">
            </form>
            <?php
            if (isset($errorMessage)) {
                echo "<p class='error'>$errorMessage</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
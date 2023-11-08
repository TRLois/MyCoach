<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <title>Inscription</title>
</head>
<body>
    <div class="wrapper">
        <div class="login">
            <h1>S'inscrire</h1>
            <form method="POST" action="../include/inscriptionSite.php">
                <p for="username">Nom d'utilisateur :</p>
                <input type="text" name="username" id="username" required>
                <br>
                <p for="mail">Adresse mail :</p>
                <input type="text" name="mail" id="mail" required>
                <p for="password">Mot de passe :</p>
                <input type="password" name="password" id="password" required>
                <br>
                <input type="submit" value="S'inscrire">
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
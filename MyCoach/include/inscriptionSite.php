<?php
    ob_start();
    include("../include/connexionBDD.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['mail']; // Ajout de l'e-mail

        try {
            // Vérifiez si le nom d'utilisateur est déjà pris
            $checkUsernameQuery = "SELECT id FROM users WHERE username = :username";
            $checkUsernameStmt = $connexion->prepare($checkUsernameQuery);
            $checkUsernameStmt->bindParam(':username', $username);
            $checkUsernameStmt->execute();

            if ($checkUsernameStmt->rowCount() > 0) {
                // Le nom d'utilisateur est déjà pris, affichez un message d'erreur
                $errorMessage = "Ce nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
            } else {
                // Hachez le mot de passe avant de le stocker en base de données
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Inscrivez l'utilisateur dans la base de données avec le nom d'utilisateur et l'e-mail
                $insertUserQuery = "INSERT INTO users (username, password, mail) VALUES (:username, :password, :mail)";
                $insertUserStmt = $connexion->prepare($insertUserQuery);
                $insertUserStmt->bindParam(':username', $username);
                $insertUserStmt->bindParam(':password', $hashedPassword);
                $insertUserStmt->bindParam(':mail', $email);

                if ($insertUserStmt->execute()) {
                    // L'inscription a réussi, redirigez l'utilisateur vers la page de connexion
                    header('Location: ../php/seance.php');
                    exit();
                } else {
                    $errorMessage = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
                    header('Location: ../index.php');
                }
            }
        } catch (PDOException $e) {
            // Gestion des erreurs de la base de données
            echo "Erreur de base de données : " . $e->getMessage();
        }
    }

    $connexion = null;
?>


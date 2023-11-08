<?php
session_start();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou toute autre page appropriée
header('Location: ../index.php'); // Remplacez 'login.php' par l'URL de votre page de connexion ou une autre page de votre choix
exit();
?>

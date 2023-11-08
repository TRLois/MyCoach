<?php
    ob_start();
    include("../include/connexionBDD.php");

    $nomSaisi = $_POST['username'];
    $mdpSaisi = $_POST['password'];

    $sql = "SELECT password FROM users WHERE username = :username";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':username', $nomSaisi);
    $stmt->execute();
    $ligne = $stmt->fetch();
    $mdpBDD = $ligne['password'];

    if (password_verify($mdpSaisi, $mdpBDD)) {
        $sql = "SELECT id FROM users WHERE username = :username";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':username', $nomSaisi);
        $stmt->execute();
        $ligne = $stmt->fetch();
        session_start();
        
        $_SESSION['user_id'] = $ligne;
        $_SESSION['user_name'] = $nomSaisi;
        
        header('Location: ../php/index.php');
        exit;
    } else {
        header("Location: ../index.php");
        exit;
    }

    $connexion = null;
?>


<?php
// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // Utilisateur connecté
    $connectButtonText = "Se déconnecter";
    $connectLink = "../include/logout.php"; // Le script de déconnexion
    $inscriptionButtonText = "S'inscrire"; // Ne pas afficher le bouton "Mon profil" lorsqu'on est connecté
} else {
    // Utilisateur non connecté
    $connectButtonText = "Se connecter";
    $connectLink = "../php/login.php"; // Le script de connexion
    $inscriptionButtonText = "S'inscrire"; // Le texte du bouton "S'inscrire" lorsqu'on n'est pas connecté
}
?>

<header>
    <div class="wrapper">
        <h1>My Coach<span class="orange">.</span></h1>
            <nav>
                <ul>
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="../php/seance.php">Mes séances</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="<?php echo $connectLink; ?>"><?php echo $connectButtonText; ?></a></li>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                    <li><a href="../php/inscription.php"><?php echo $inscriptionButtonText; ?></a></li>
                    <?php endif; ?>
                </ul>
            </nav>
    </div>
</header>

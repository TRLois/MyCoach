<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleHeader.css">
    <link rel="stylesheet" href="css/styleFooter.css"> <!-- Lien vers la feuille de style CSS externe -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> <!-- Lien vers une police Google Fonts -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Coach</title> <!-- Titre de la page -->
</head>
<body>

   <?php
        include("include/header.php"); // Inclusion du contenu de l'en-tête depuis un fichier externe
   ?>
    
    <section id="presentation">
        <div class="wrapper">
            <h1>BIENVENUE SUR MON SITE</h1>
            <p class="coach">
                Passionné de santé et de forme physique depuis de nombreuses années, je suis Dan Stranger, votre coach sportif certifié dévoué à vous aider à atteindre vos objectifs de condition physique. 
                Mon approche du coaching est centrée sur vous en tant qu'individu unique, et je suis là pour vous guider à chaque étape de votre voyage vers une meilleure santé et une meilleure forme physique.
                Avec plus de 4 années d'expérience dans le domaine ainsi qu'avec ma grande pratique sportif, j'ai travaillé avec une variété de clients, de tous âges et de tous niveaux de forme physique. Que vous souhaitiez perdre du poids, gagner en muscle, améliorer votre endurance, ou simplement adopter un mode de vie plus actif, 
                je suis là pour créer un programme d'entraînement personnalisé qui réponde à vos besoins spécifiques. 
                J'interviens un peu partout sur Toulouse et vous pourrez aussi retrouver quelques cours en ligne 
            </p>
            <div class="clear"></div>
            <a href="#" class="button-1">Me découvrir</a>
        </div>
    </section>

    <section id="activities">
        <div class="wrapper">
            <h3>Les différentes activités que je propose</h3>
                <ul>
                    <li>
                        <h3>Le yoga</h3>
                        <p>Je propose des séances de yoga pour vous relaxer et découvrir les bienfaits pour votre corps.</p>
                        <a href="#" class="button-2">En savoir plus</a>
                    </li>

                    <li>
                        <h3>Le step</h3>
                        <p>Je propose des séances de step pour vous relaxer et découvrir les bienfaits pour votre corps.</p>
                        <a href="#" class="button-2">En savoir plus</a>
                    </li>

                    <li>
                        <h3>Cardio training</h3>
                        <p>Je propose des séances de cardio training pour vous relaxer et découvrir les bienfaits pour votre corps.</p>
                        <a href="#" class="button-2">En savoir plus</a>
                    </li>

                    <li>
                        <h3>Musculation</h3>
                        <p>Je propose des séances de musculation pour vous relaxer et découvrir les bienfaits pour votre corps.</p>
                        <a href="#" class="button-2">En savoir plus</a>
                    </li>

                    <li>
                        <h3>Fitness</h3>
                        <p>Je propose des séances de fitness pour vous relaxer et découvrir les bienfaits pour votre corps.</p>
                        <a href="#" class="button-2">Voir mes séances</a>
                    </li>
                </ul>
        </div>
    </section>
    
    <?php
        include("include/footer.php"); // Inclusion du contenu du pied de page depuis un fichier externe
    ?>
</body>
</html>

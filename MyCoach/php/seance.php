<?php

    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
    exit();
}

    include("../include/connexionBDD.php");

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="stylesheet" href="../css/styleSeance.css">
            <link rel="stylesheet" href="../css/styleHeader.css">
            <link rel="stylesheet" href="../css/styleFooter.css">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mes séances</title>
        </head>
        <body>

            <?php
                    // Inclusion du header sur la page
                   include("../include/header.php")
            ?>

            <section id="seances">
                <div class="wrapper">
                    <h3> Mes différentes séances </h3>
                <div class="tableau">

                <?php
                        
                    try {
                        // Requete pour récupérer les éléments de la BDD
                        $reqSQL = "SELECT libelleActivite, libelleNiveau, nom, adresse, ville, cp, jour, heureDebut, heureFin
                        FROM activite A, niveau N, salle S, seance SE
                        WHERE SE.activiteSeance = A.idAct AND SE.salleSeance = S.idSalle AND SE.niveauSeance = N.idNiveau
                        ORDER BY DAYOFWEEK(jour)";

                        // Exécution de la requête 
                        $result = $connexion->query($reqSQL);

                        // Vérifier les résultats
                        if ($result !== false && $result->rowCount() > 0) {
                            // Création du tableau HTML
                            echo "<table border='1'>
                            <tr>
                                <th>Sport</th>
                                <th>Niveau de difficulté</th>
                                <th>Nom de la salle</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Code postal</th>
                                <th>Jour</th>
                                <th>Heure début</th>
                                <th>Heure fin</th>
                            </tr>";

                            // Parcourir les résultats et afficher les lignes du tableau
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>
                                    <td>".$row["libelleActivite"]."</td>
                                    <td>".$row["libelleNiveau"]."</td>
                                    <td>".$row["nom"]."</td>
                                    <td>".$row["adresse"]."</td>
                                    <td>".$row["ville"]."</td>
                                    <td>".$row["cp"]."</td>
                                    <td>".$row["jour"]."</td>
                                    <td>".$row["heureDebut"]."</td>
                                    <td>".$row["heureFin"]."</td>  
                                </tr>";
                            }

                            echo "</table>";
                        } 
                        else {
                            echo "Aucun résultat trouvé dans la table";
                        }
            
                    } 
                    
                    catch (PDOException $e) {
                        // En cas d'erreur dans la requête, afficher un message d'erreur
                        echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
                    }

                    // Fermer la connexion à la base de données
                    $connexion = null;
                ?>

            </section>

            <?php
                    // Inclusion du header sur la page
                   include("../include/footer.php")
            ?>
        </body>
    </html>
</DOCTYPE html>
<?php
include("../include/connexionBDD.php");
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/styleSeance.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Coach</title>
    </head>
    <body>

        <header>
            <div class="wrapper">
                <h1>My Coach<span class="orange">.</span></h1>
                <nav>
                    <ul>
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="presentation">Qui suis-je ?</a></li>
                        <li><a href="seance.php">Mes séances</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="seances">
        <div class="wrapper">
            <h3> Mes différentes séances </h3>

            <div class="tableau">

            <?php

                // Requete pour récupérer les éléments de la BDD
                $reqSQL = "SELECT libelleActivite, libelleNiveau, nom, adresse, ville, cp, jour, heureDebut, heureFin
                FROM activite A, niveau N, salle S, seance SE
                WHERE SE.activiteSeance = A.idAct AND SE.salleSeance = S.idSalle AND SE.niveauSeance = N.idNiveau
                ORDER BY DAYOFWEEK(jour)" ; 

                // Exécution de la requête 
                $result = $connexion->query($reqSQL);

                // Vérifier les résultats

                if ($result ->rowCount() > 0) {
                    // Création du tableau HTML

                    echo "<table border1'>
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
            } else {
                echo "Aucun résultat trouvé dans la table";
            }

            $connexion = null;
            ?>

            </div>
        </div>

        </section>
    </body>
</html>
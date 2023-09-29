<?php
	// Définitions de constantes pour la connexion à MySQL
	$hote= "localhost";
	$login= "root";
	$mdp= "";
	$nombd= "mycoach_bdd";

	// Connection au serveur
	try {
			$connexion = new PDO("mysql:host=$hote;dbname=$nombd",$login,$mdp);
	} catch ( Exception $e ) { 
		// Envoie d'un message d'erreur si la connexion est impossible à la base de données
		  die("\n Connexion à '$hote' impossible : ".$e->getMessage());
	}
?>

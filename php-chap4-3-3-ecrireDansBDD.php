<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Exo PHP - Accès base de données</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="tuto.css">
	</head>

	<body>
		<?php include("navbar.html"); ?>

		<h1 style="margin-top: 70px">
			Exo PHP - Ecriture dans la BDD :
		</h1>

		<!-- Connexion à la base de données -->
		<?php
			try {
			$bdd = new PDO('mysql:host=localhost; dbname=test; charset=utf8', 'root', 'root');
			} catch (Exception $e) {
				echo 'Une erreur a été rencontrée :<br>';
				die('Erreur : ' . $e ->getMessage());
			}
		?>

		<!-- Insertion d'une ligne dans la table jeux_video -->
 	 	<?php
 	 		echo '<h2>Insertions dans la base de données :</h2>';
	 		$bdd -> exec('insert into jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires) values (\'Final Fantasy IX\', \'Walid\', \'PS\', 15, 1, \'Dernier FF sur PS1. Scenario abouti, très bon jeu !\')');
	 		echo "Ligne ajoutée avec succès."
	 	?>

	 	<!-- Insertion d'une ligne grâce à $_GET -->
	 	<?php
	 		echo '<h2>Insertions dans la base de données (avec variables et marqueurs nominatifs) :</h2>';
	 		if (isset($_GET['nom']) AND isset($_GET['console']) AND isset($_GET['prix']) AND isset($_GET['nb_max'])) {

	 			$nom = strip_tags((string) $_GET['nom']);
	 			$console = strip_tags((string) $_GET['console']);
	 			$prix = strip_tags((int) $_GET['prix']);
	 			$nb_max_joueurs = strip_tags((int) $_GET['nb_max']);
	 			
	 			echo $nom . ' - ' . $console . ' - ' . $prix . ' - ' . $nb_max_joueurs . '<br>'; 

		 		$reponse = $bdd -> prepare('INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES (:nom, :possesseur, :console, :prix, :nb_max_joueurs, :commentaires)');
		 		$reponse -> execute(array(
		 			'nom' => $nom,
		 			'possesseur' => "Walid",
		 			'console' => $console,
		 			'prix' => $prix,
		 			'nb_max_joueurs' => $nb_max_joueurs,
		 			'commentaires' => "Commentaires desactivés avec cette méthode d'insertion"
		 		));
		 		echo "Ligne ajoutée avec succès.";
	 		} else {
	 			echo "Un ou plusieurs paramètres sont absents.";
	 		}
		?>

		<!-- UPDATE de lignes -->
		<?php 
			$bdd -> exec('UPDATE jeux_video SET nom = \'Final Fantasy VII\' WHERE ID = 52');
			$bdd -> exec('UPDATE jeux_video SET nbre_joueurs_max = 1 WHERE ID = 52');
			$bdd -> exec('UPDATE jeux_video SET possesseur = \'Florient\' WHERE possesseur = \'Michel\'');
		?>


		<!-- SUPR de lignes -->
		<?php 
			$bdd -> exec('DELETE FROM jeux_video WHERE ID > 52');
		?>
	</body>	
</html>
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
			Exo PHP - Requetes SQL avec variables :
		</h1>
		<h2>
			Afficher toute la table :
		</h2>

		<!-- Connexion à la base de données -->
		<?php 
			try {
			$bdd = new PDO('mysql:host=localhost; dbname=test; charset=utf8', 'root', 'root');
			} catch (Exception $e) {
				echo 'Une erreur a été rencontrée :<br>';
				die('Erreur : ' . $e ->getMessage());
			}
		?>

		<!-- Liste des jeux appartenant à Patrick (sans variable) -->
	 	<?php
	 		$reponse = $bdd -> query('Select * from jeux_video where possesseur = "Patrick"');

			echo '<h2>Liste des jeux appartenant à Patrick :</h2><ul>';
			while ($donnees = $reponse -> fetch()) {
				echo (
					'<li>' . $donnees['ID'] . ' - ' . $donnees['nom'] . ' (' . $donnees['console'] . ')' .
					'</li>'
				);
			}
			echo '</ul>';
			$reponse -> closeCursor();
		?>

		<!-- Liste des jeux appartenant à X (avec variable) -->
	 	<?php
	 		if (isset($_GET['nom'])) {
	 			$nom = strip_tags((string) $_GET['nom']);
	 			$reponse = $bdd -> prepare('Select * from jeux_video where possesseur = ? ');
	 			$reponse -> execute(array($nom));

				echo '<h2>Liste des jeux appartenant à ' . $nom . ' (avec variable) :</h2><ul>';
				while ($donnees = $reponse -> fetch()) {
					echo (
						'<li>' . $donnees['ID'] . ' - ' . $donnees['nom'] . ' (' . $donnees['console'] . ')' .
						'</li>'
					);
				}
				echo '</ul>';
				$reponse -> closeCursor();
			} else {
				echo 'Veuillez entrer un nom en paramètre.';
			}
		?>

		<!-- Liste des jeux appartenant à X (avec variable et marqueur nominatif ) -->
	 	<?php
	 		if (isset($_GET['nom2'])) {
	 			$nom2 = strip_tags((string) $_GET['nom2']);
	 			$reponse = $bdd -> prepare('Select * from jeux_video where possesseur = :nom2 ');
	 			$reponse -> execute(array('nom2' => $nom2));

				echo '<h2>Liste des jeux appartenant à ' . $nom2 . ' (avec variable et marqueur nominatif) :</h2><ul>';
				while ($donnees = $reponse -> fetch()) {
					echo (
						'<li>' . $donnees['ID'] . ' - ' . $donnees['nom'] . ' (' . $donnees['console'] . ')' .
						'</li>'
					);
				}
				echo '</ul>';
				$reponse -> closeCursor();
			} else {
				echo 'Veuillez entrer un nom en paramètre.';
			}
		?>
	</body>	
</html>
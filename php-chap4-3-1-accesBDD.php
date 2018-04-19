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
			Exo PHP - Accès base de données :
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

		<!-- Aficher la table jeux_vidéo en entier -->
	 	<?php
			$reponse = $bdd->query('select * from jeux_video');
			$donnees = $reponse->fetch();
			echo '<p>';
			while ($donnees) {
				echo (
					'<hr>' .
						'<strong>Jeu : </strong>' . $donnees['nom'] . '<br>' .
						'<strong>Proprio : </strong>' . $donnees['possesseur'] . '<br>' .
						'<strong>Console : </strong>' . $donnees['console'] . '<br>' .
						'<strong>Prix de revente : </strong>' . $donnees['prix'] . ' euros<br>' .
						'<strong>Nombre max de joueur : </strong>' . $donnees['nbre_joueurs_max'] . '<br>' .
						'<strong>Commentaire : </strong>' . $donnees['commentaires']
				);
				$donnees = $reponse->fetch();
			}
			echo '</p>';
			$reponse -> closeCursor();
		?>

		<!-- Afficher tous les jeux sous PS2 -->
		<?php 
			$reponse = $bdd -> query('select * from jeux_video where console="PS2"');

			echo '<h2>Afficher la liste des jeux sous PS2 :</h2><ul>';

			while ($donnees = $reponse -> fetch()) {
				echo (
					'<li>' .
						$donnees['ID'] . ' - ' .
						$donnees['nom'] .
					'</li>'
				);
			}

			echo '</ul>';

			$reponse -> closeCursor();
		?>

		<!-- Afficher les 15 premiers jeux de la table -->
		<?php 
			$reponse = $bdd->query('select * from jeux_video limit 0, 15');
			$donnees = $reponse -> fetch();

			echo '<h2>Afficher une plage de resultat d\'une table :</h2><h3>Affichers les 15 premier resultats :</h2><ul>';
			while($donnees) {
				echo (
					'<li>' .
						$donnees['ID'] . ' - ' . $donnees['nom'] .
					'</li>'
				);
				$donnees = $reponse -> fetch();
			}
			echo '</ul>';
			$reponse -> closeCursor();
		?>
		<?php 
			$reponse = $bdd->query('select * from jeux_video limit 15, 15');
			$donnees = $reponse -> fetch();

			echo '<h3>Afficher les 15 resultats suivants :</h3><ul>';
			while($donnees) {
				echo (
					'<li>' .
						$donnees['ID'] . ' - ' . $donnees['nom'] .
					'</li>'
				);
				$donnees = $reponse -> fetch();
			}
			echo '</ul>';
			$reponse -> closeCursor();
		?>

	</body>	
</html>
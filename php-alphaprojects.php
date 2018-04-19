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
		<h1 style="margin-top: 70px">Exo PHP - Accès base de données (ap2) :</h1>
		<h2>1. Liste des utilisateurs :</h2>
		<?php
			try {
				$bdd = new PDO('mysql:host=localhost; dbname=ap2; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				$reponse = $bdd->query('select * from user');
			} catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
			
			while ($donnees = $reponse->fetch()) {
				echo(
					'<strong>id : </strong>' . $donnees['id'] . '<br>' .
					'<strong>Nom prénom: </strong>' . $donnees['Nom'] . ' ' . $donnees['Prenom'] . '<br>' .
					'<strong>Pseudo : </strong>' . $donnees['Pseudo'] . '<br>' .
					'<strong>Mail : </strong>' . $donnees['Mail'] . '<br>' .
					'<strong>Genre : </strong>' . $donnees['Genre'] . '<br>' .
					'<strong>Ville : </strong>' . $donnees['Ville'] . '<br>' .
					'<strong>Date de naissance : </strong>' . $donnees['Date_Naissance'] . '<br>' .
					'<strong>Date de création du compte : </strong>' . $donnees['Date_Creation'] . '<br><br>'
				);
			}
			$reponse->closeCursor();
		?>
		<h2>2. Liste des posts :</h2>
		<?php
			$reponse = $bdd->query('select * from post order by Date_post desc limit 0, 7');

			while ($donnees = $reponse->fetch()) {
				echo(
					'<strong>Id du post : </strong>' . $donnees['id'] . '<br>' .
					'<strong>Id de l\'auteur : </strong>' . $donnees['Auteur'] . '<br>' .
					'<strong>Titre : </strong>' . $donnees['Titre'] . '<br>' .
					'<strong>Contenu : </strong><em>' . $donnees['Contenu'] . '</em><br>' .
					'<strong>Date de publication: </strong>' . $donnees['Date_post'] . '<br>' .
					'<strong>Id du projet ou du profil concerné : </strong>' . $donnees['Id_projet'] . $donnees['Id_user'] . '<br><br>'
				);
			}
			$reponse->closeCursor();
		?>
		<h2>3. Requete SQL avec variable(s) :</h2>
		<h3>3.1. Afficher les infos des utilisateurs dont le nom est "Sellami" (sans variables) :</h3>
		<?php 
			$reponse = $bdd->query('select * from user where Nom="Sellami"');
			while ($donnees = $reponse->fetch()) {
				echo(
					'<strong>id : </strong>' . $donnees['id'] . '<br>' .
					'<strong>Nom prénom: </strong>' . $donnees['Nom'] . ' ' . $donnees['Prenom'] . '<br>' .
					'<strong>Pseudo : </strong>' . $donnees['Pseudo'] . '<br>' .
					'<strong>Mail : </strong>' . $donnees['Mail'] . '<br>' .
					'<strong>Genre : </strong>' . $donnees['Genre'] . '<br>' .
					'<strong>Ville : </strong>' . $donnees['Ville'] . '<br>' .
					'<strong>Date de naissance : </strong>' . $donnees['Date_Naissance'] . '<br>' .
					'<strong>Date de création du compte : </strong>' . $donnees['Date_Creation'] . '<br><br>'
				);
			}
			$reponse->closeCursor();
		?>
		<h3>	3.2. Afficher les infos des utilisateurs dont le nom est "Sellami" (avec variable) :</h3>
		<?php 
			$nom = 'Sellami';
			$reponse = $bdd->prepare('SELECT * FROM user WHERE Nom= ?');
			$reponse->execute(array($nom));

			while ($donnees = $reponse->fetch()) {
				echo(
					'<strong>id : </strong>' . $donnees['id'] . '<br>' .
					'<strong>Nom prénom: </strong>' . $donnees['Nom'] . ' ' . $donnees['Prenom'] . '<br>' .
					'<strong>Pseudo : </strong>' . $donnees['Pseudo'] . '<br>' .
					'<strong>Mail : </strong>' . $donnees['Mail'] . '<br>' .
					'<strong>Genre : </strong>' . $donnees['Genre'] . '<br>' .
					'<strong>Ville : </strong>' . $donnees['Ville'] . '<br>' .
					'<strong>Date de naissance : </strong>' . $donnees['Date_Naissance'] . '<br>' .
					'<strong>Date de création du compte : </strong>' . $donnees['Date_Creation'] . '<br><br>'
				);
			}
			$reponse->closeCursor();
		?>
		<h3>	3.2. Afficher les infos des utilisateurs de sexe masculin dont le nom est "Sellami" (avec variables) :</h3>
		<?php 
			$nom = 'Sellami';
			$genre = 'M';
			$reponse = $bdd->prepare('SELECT * FROM user WHERE Nom= ? AND Genre = ?');
			$reponse->execute(array($nom, $genre));

			while ($donnees = $reponse->fetch()) {
				echo(
					'<strong>id : </strong>' . $donnees['id'] . '<br>' .
					'<strong>Nom prénom: </strong>' . $donnees['Nom'] . ' ' . $donnees['Prenom'] . '<br>' .
					'<strong>Pseudo : </strong>' . $donnees['Pseudo'] . '<br>' .
					'<strong>Mail : </strong>' . $donnees['Mail'] . '<br>' .
					'<strong>Genre : </strong>' . $donnees['Genre'] . '<br>' .
					'<strong>Ville : </strong>' . $donnees['Ville'] . '<br>' .
					'<strong>Date de naissance : </strong>' . $donnees['Date_Naissance'] . '<br>' .
					'<strong>Date de création du compte : </strong>' . $donnees['Date_Creation'] . '<br><br>'
				);
			}
			$reponse->closeCursor();
		?>
		<h3 id="3.4">
			3.4. Afficher les infos d'un utilisateur d'après un formulaire :
		</h3>
		<form method="get" action="#">
			<input type="text" name="Nom" placeholder="Nom à rechercher">
			<input type="submit" value="Search !">
		</form>
		<?php
			if (!$_GET) {
				echo "";
			} else {
				$nom = $_GET['Nom'];
				$reponse = $bdd->prepare('SELECT * FROM user WHERE Nom= ?');
				$reponse->execute(array($nom));
				$date = date('Y/m/d');

				$heure = date('H:i:s');
				echo "Informations telles qu'enregistrées dans la base de données le $date à $heure :<br>";
				while ($donnees = $reponse->fetch()) {
					
					echo(
						'<br>' . '<strong>id : </strong>' . $donnees['id'] . '<br>' .
						'<strong>Nom prénom: </strong>' . $donnees['Nom'] . ' ' . $donnees['Prenom'] . '<br>' .
						'<strong>Pseudo : </strong>' . $donnees['Pseudo'] . '<br>' .
						'<strong>Mail : </strong>' . $donnees['Mail'] . '<br>' .
						'<strong>Genre : </strong>' . $donnees['Genre'] . '<br>' .
						'<strong>Ville : </strong>' . $donnees['Ville'] . '<br>' .
						'<strong>Date de naissance : </strong>' . $donnees['Date_Naissance'] . '<br>' .
						'<strong>Date de création du compte : </strong>' . $donnees['Date_Creation']
					);
				}
			}
			$reponse->closeCursor();
		?>
		<script src="bootstrap/js/jquery-3.1.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
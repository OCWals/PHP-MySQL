<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Exo PHP - Accès base de données</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="tuto.css">
	</head>

	<body>
		<h1>
			Exo PHP - Lire et écrire dans un fichier :
		<h1>
		
		<?php 
			$fichierTestEcriture = fopen('testsEcritures.txt', 'r+');
			// Ouverture du fichier 'testsEcritures.txt' et permession de le lire/écrire (a+)

			$compte = fgets($fichierTestEcriture);
			// Lecture et stockage de la premiere ligne du fichier dans la variable $compte - Le curseur PHP se trouve maintenant à la fin de la 1ere ligne
			
			fputs($fichierTestEcriture, "Texte à écrire à partir de la position du curseur php");
																		
			fseek($fichierTestEcriture, 0);
			// Deplacement du curseur à la position 0

			fputs($fichierTestEcriture, "Texte à écrire par dessus l'ancien, à partir de la position du curseur PHP (ici 0)");

			ftruncate($fichierTestEcriture, 0);
			fseek($fichierTestEcriture, 0);
			// Troncature du fichier à partir de la position 0. Tous les carracteres apres la position 0 sont éffacés mais le pointeurs reste à sa position, je le replace donc en position 0.

			fputs($fichierTestEcriture, "Nouveau texte...");

			fclose($fichierTestEcriture);
			// Fermeture le fichier


			$fichierCompteur = fopen('compteur.txt', 'r+');
			$compte = 1 + fgets($fichierCompteur);

			fseek($fichierCompteur, 0);
			fputs($fichierCompteur, $compte);
		?>

		<p>
			Cette page a été consultée : <?php echo $compte ?> fois.
		</p>
	</body>
</html>
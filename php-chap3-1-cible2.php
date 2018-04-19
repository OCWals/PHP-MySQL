<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Exo PHP - Cible 2</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="tuto.css">
	</head>

	<body>
		<p>
			<?php

				if (isset($_FILES['fichierEnvoye'])) {
					echo "Fichier recu :<br>";
					print_r($_FILES['fichierEnvoye']);
				} else {
					echo "Aucun fichier recu<br>";
					print_r($_FILES);
				}

				
			?>
		</p>
	</body>
</html>
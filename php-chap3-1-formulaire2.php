<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Exo PHP - Formulaire21</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<!-- <link rel="stylesheet" type="text/css" href="tuto.css"> -->
	</head>

	<body>
		<p>
			<form type="submit" action="php-chap3-1-cible2.php" enctype="multipart/form-data">
				<label for="titreFichier">
					Titre du fichier :<br>
					<input type="texte" name="titreFichier" id="titreFichier">
				</label><br>

				<label for="descriptionFichier">
					Déscription du fichier :<br>
					<textarea placeholder="Déscription..."></textarea>
				</label><br>

				<label for="icone">
					Icône du fichier (ICO, JPG, JPEG, PNG, GIF | max. 15 Ko) :
					<input type="file" name="icone" id="icone">
				</label><br>

				<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
				<label for="fichierEnvoye">
					Fichier (JPG, JPEG, PNG, GIF | max. 1.5 Mo) :
					<input type="file" name="fichierEnvoye" id="fichierEnvoye">
				</label><br>

				<input type="submit" name="Go !">
			</form>
		</p>
	</body>
</html>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Exo PHP - Cible</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="tuto.css">
	</head>

	<body>
		<p>
			<?php		// Champs texte (pseudo + description) :
				if (isset($_POST['pseudo']) && isset($_POST['description'])) {
					$pseudo = strip_tags((string) $_POST['pseudo']);			// Transformation en string et suppression des tag HTML
					echo '<p>';
						echo "Bonjour, c'est vous " . $pseudo . " !? Content de vous voir ! :)<br>";
					echo '</p>';
					echo '<p>';
						echo "Alors c'est donc comme ca que vous vous definissez :<br><em>\"" . strip_tags((string) $_POST['description']) . "\"</em><br>Hum... Je vois ! Tres interessant !";
					echo '</p>';
				} else {
					echo '<p>';
					echo "Pseudo ou déscription non renseigné(e/s).";
					echo '</p>';
				}

				echo '<p>';				// Liste déroulante (pays de résidence) :
					if (!isset($_POST['paysDeResidence'])) {
						echo "Vous n'avez selectionné aucun pays de résidence.";
					} else {
						echo "Vous vivez donc dans le pays suivant : " . $_POST['paysDeResidence'] . ".";
					}
				echo '<p>';

				echo '<p>';				// Cases à cocher (plats preferés) :
					$plats = "<ul>";
					if (!(isset($_POST['chorba']) || isset($_POST['gratin']) || isset($_POST['lasagnes']) || isset($_POST['tartePoires']) || isset($_POST['pattesCreme']) || isset($_POST['tartiflette']))) {
						echo "Vous avez déclarez n'aimer aucun des plats présentés... Vraiment ? :/";
					} else {
						if (isset($_POST['chorba'])) {
						$plats .= '<li>Chorba de la Mama</li>';
						}
						if (isset($_POST['gratin'])) {
						$plats .= '<li>Gratin dauphinois d\'Aladdin</li>';
						}
						if (isset($_POST['lasagnes'])) {
						$plats .= '<li>Lasagnes de Youyou</li>';
						}
						if (isset($_POST['tartePoires'])) {
						$plats .= '<li>Mini-tartes poires choco ratées de Walid</li>';
						}
						if (isset($_POST['pattesCreme'])) {
						$plats .= '<li>Pattes à la crème de Sonia</li>';
						}
						if (isset($_POST['tartiflette'])) {
						$plats .= '<li>Tartiflette d\'Anissa</li>';
						}
						$plats .= "</ul>";
						echo 'Voici donc la liste du (ou des) plat(s) que vous aimez :' . $plats;
					}
				echo '</p>';

				echo '<p>';				// Boutons radios (Youyou love) :
					if (!isset($_POST['youyouLove'])) {
						echo 'Vous êtes obligé de déclarer votre amour pour Youyou, merci de recommencer.';
					} else {
						if ($_POST['youyouLove'] == "Oui") {
							echo "C'est mignon... Vous êtes amoureux de Youyou ! :)";
						} else {
							echo "Ah ouais quand meme !! Excuse ! C'est mignon, tres mignon... :p";
						}
					}
				echo '</p>';

				echo '<p>';				// Créateur du formulaire (input hidden) :
					if (!isset($_POST['createur'])) {
						echo "Le créateur du formulaire est introuvable.";
					} else {
						echo "Formulaire proposé par " . $_POST['createur'] . ".";
					}
				echo '</p>';

				echo '<p>';				// Fichier envoyé :
					if (isset($_FILES['fichierEnvoye']) && $_FILES['fichierEnvoye']['error'] == 0) {
						
						echo 'Fichier bien recu';

						if ($_FILES['fichierEnvoye']['size'] < 1000000) {

							$cheminTempFichier = $_FILES['fichierEnvoye']['tmp_name'] . $_FILES['fichierEnvoye']['name'];
							echo ".<br>Chemin fichier : " . $cheminTempFichier . '<br><br>';

							$infosFichier = pathinfo($cheminTempFichier);
							echo 'print_r : ';
							print_r($infosFichier);

							$extension_upload = $infosFichier['extension'];
							$extensions_autorisees = ['jpg', 'jpeg', 'png', 'gif'];
						
							if (in_array($extension_upload, $extensions_autorisees)) {
								echo '<br>Extension autorisée.<br>';
								
								if(move_uploaded_file($_FILES['fichierEnvoye']['tmp_name'], 'uploads/' . basename($_FILES['fichierEnvoye']['name']))) {
									echo "Fichier envoyé.";
								} else {
									echo "Fichier non envoyé";
								}

							} else {
								echo "<br>Verifiez le type de votre fichier (uniquement jpeg, jpg, png, gif autorisés)";
							}
						} else {
							echo " mais trop volumineux (1Mo max).";
						}
					} else {
						echo "Aucun fichier recu.";
					}
				echo '</p>';
			?>
		</p>
	</body>
</html>
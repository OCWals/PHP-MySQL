<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Exo PHP - Formulaire</title>
		<meta charset="utf-8">
<!-- 	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="tuto.css"> -->
	</head>

	<body>
		<form method="post" action="php-chap3-1-cible.php" enctype="multipart/form-data">
			<p>
				<strong>Pseudo :?</strong><br>
				<input type="texte" name="pseudo" placeholder="Votre pseudo..."><br>
			</p>
			<p>
				<strong>Déscription :?</strong><br>
				<textarea name="description" placeholder="Parlez moi un peu de vous..." rows="4" cols="21"></textarea><br>
			</p>
			<p>
				<strong>Plat(s) preferé(s) :?</strong><br>
				<input type="checkbox" name="chorba" id="chorba"><label for="chorba">Chorba de la Mama</label><br>
				<input type="checkbox" name="gratin" id="gratin"><label for="gratin">Gratin dauphinois d'Aladdin</label><br>
				<input type="checkbox" name="lasagnes" id="lasagnes" checked="checked"><label for="lasagnes">Lasagnes de Youyou <3</label><br>
				<input type="checkbox" name="tartesPoires" id="tarte"><label for="tarte">Mini-tartes poires choco ratées de Walid</label><br>
				<input type="checkbox" name="pattesCreme" id="pattes"><label for="pattes">Pattes à la crème de Sonia</label><br>
				<input type="checkbox" name="tartiflette" id="tartiflette"><label for="tartiflette">Tartiflette d'Anissa</label>
			</p>

			<p>
				<strong>Pays de résidence :? </strong>
				<select name="paysDeResidence">
					<option value="Allemagne">Allemagne</option>
					<option value="Belgique">Belgique</option>
					<option value="Espagne">Espagne</option>
					<option value="France" selected="selected">France</option>
					<option value="Italie">Italie</option>
					<option value="Portugal">Portugal</option>
					<option value="UK">UK</option>
				</select>
			</p>
			<p>
				<strong>Êtes vous amoureux de Youyou :?</strong><br>
				<input type="radio" name="youyouLove" value="Oui" id="oui"><label for="oui">Oui</label>
				<input type="radio" name="youyouLove" value="Non, fou amoureux !" id="nonFouAmoureux" checked="checked"><label for="nonFouAmoureux">Non, fou amoureux !</label>
			</p>
			<input type="hidden" name="createur" value="Wals">
			<input type="file" name="fichierEnvoye"><br><br>
			<input type="submit" value="Go !">
		</form>
	</body>
</html>
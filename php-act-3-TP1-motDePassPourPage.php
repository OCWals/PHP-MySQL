<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>TP PHP - Protéger une page par un mot de passe</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container">
			<h1>
				PHP TP1 - Protéger une page par un mot de passe :
			</h1>
			<div class="col-lg-12">
				<form method="post" action="php-act-3-TP1-motDePassPourPage.php" class="form-inline">
					<div class="input-group">
						<input type="password" name="mdp" class="form-control" placeholder="Mot de passe...">
						<span class="input-group-btn">
							<input type="submit" value="Go !" class="btn btn-default" style="width:75px;">
						</span>
					</div>
				</form>
				<?php
					if (isset($_POST['mdp'])) {
						$mdp = strip_tags((string) $_POST['mdp']);
						// Si le mot de passe est entré je lui eleve les balises html/PHP, la transforme en string, et la met dans une variable.
						echo "<hr>Mot de passe entré : " . $mdp . '<hr>';
						if ($mdp == "DBAYB") {
							echo "Mot de passe <strong>correct</strong>... <hr>Voici le second mot de passe : <em>\"Dragon blanc aux yeux bleus\"</em>.";
						} else {
							echo "Mot de passe <strong>incorrect</strong>...<hr>Merci de réessayer.";
						}
					} else {
						echo "<hr>Entrez le mot de passe.";
					}
				?>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>TP PHP - Script Mini-chat</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			.area-submit {
				height: 80px;
				width: 129px;
				margin-top: 5px;
			}
		</style>
	</head>

	<body>
		<?php include('navbar.html'); ?>
		<h1 style="margin-top: 70px">
			PHP TP2 - Mini chat :
		</h1>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<form method="post" action="scriptMiniChat.php" class="form">
						<input type="texte" name="pseudo" placeholder="Votre pseudo..." class="form-control">
						<div class="input-group">
							<textarea name="contenu" placeholder="Votre message..." class="form-control area-submit" style="height: 80px"></textarea>
							<span class="input-group-btn">
								<input type="submit" value="Go !" class="area-submit btn btn-default" style="">
							</span>
						</div>
					</form>
					<hr>
					<?php 
						try {
							$bdd = new PDO('mysql:host=localhost; dbname=mini-chat; charset=utf8', 'root');
						} catch (Esception $e) {
							echo ('Une erreur a été recontrée :<br>');
							die('Erreur : ' . $e -> getMessage());
						}
					?>
					<?php
						if (isset($_POST['pseudo']) AND isset($_POST['contenu']) AND $_POST['pseudo']!=null AND $_POST['contenu']!=null ) {
							$insertion = $bdd -> prepare('INSERT INTO messages (pseudo, contenu) VALUES (?, ?);');
							$insertion -> execute(array($_POST['pseudo'], $_POST['contenu']));
							$reponse = $bdd -> query('SELECT * from messages ORDER BY id DESC LIMIT 10');
							$donnees = $reponse -> fetch();
					
							while ($donnees) { 
								echo(
									'<hr><p><strong>' .
										$donnees['pseudo'] . '</strong> :<br>' .
										$donnees['contenu'] .
									'</p>'
								);
								$donnees = $reponse -> fetch();
							}
						} else {
							echo '<hr><h3><strong>/!\ Pseudo et/ou message non renseigné(s). /!\</strong></h3>';
							$reponse = $bdd -> query('SELECT * from messages ORDER BY id DESC LIMIT 10');
							$donnees = $reponse -> fetch();
					
							while ($donnees) { 
								echo(
									'<hr><p><strong>' .
										$donnees['pseudo'] . '</strong> :<br>' .
										$donnees['contenu'] .
									'</p>'
								);
								$donnees = $reponse -> fetch();
							}
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>
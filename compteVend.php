<?php

session_start();
if (isset($_GET['deco'])) {
	unset($_SESSION['user']);
	header("Location: compteVend.php");
}



//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 

if (isset($_POST['connect'])) {
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$email = htmlspecialchars($_POST['email']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$photo = $_FILES['photo']['name'];
    //upload to images/upload
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Vérifie si le fichier a été uploadé sans erreur.
		if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
			$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
			$filename = $_FILES["photo"]["name"];
			$filetype = $_FILES["photo"]["type"];
			$filesize = $_FILES["photo"]["size"];

			// Vérifie l'extension du fichier
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if (!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

			// Vérifie la taille du fichier - 5Mo maximum
			$maxsize = 5 * 1024 * 1024;
			if ($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

			// Vérifie le type MIME du fichier
			if (in_array($filetype, $allowed)) {
				// Vérifie si le fichier existe avant de le télécharger.
				if (file_exists("./images/upload/" . $_FILES["photo"]["name"])) {
					die($_FILES["photo"]["name"] . " existe déjà. <a href='compteVend.php'>Retour</a>");
				} else {
					move_uploaded_file($_FILES["photo"]["tmp_name"], "./images/upload/" . $_FILES["photo"]["name"]);

					$erreur = "Votre compte a bien été créé !";
				}
			} else {
				echo ("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");
			}
		} else {
			echo "Error: " . $_FILES["photo"]["error"];
		}
	}
	
	$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
	$req = $bdd->prepare('INSERT INTO Vendeur (pseudo, email, nom, prenom, photo) VALUES (:pseudo, :email, :nom, :prenom, :photo)');
	$req->bindParam(':pseudo', $pseudo);
	$req->bindParam(':email', $email);
	$req->bindParam(':nom', $nom);
	$req->bindParam(':prenom', $prenom);
	$req->bindParam(':photo', $photo);
	$req->execute();
}


?>

<html>

<head>
	<title>Ebay ECE : Inscription vendeur</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./style/styles.css">
	<link rel="stylesheet" type="text/css" href="./style/footer.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$('.header').height($(window).height());
		});
	</script>

</head>

<body>

	<?php
	include('./inc/menu_vendeur.php');
	?>
	<header class="page-header header container-fluid">
		<div class="description">
			<br><br><br><br><br><br><br>


			<?php if (!isset($_SESSION['user'])) { ?>

				<div class="container container-inscription">
					<h1>Inscrivez-vous en tant que vendeur</h1><br>
					<form method="post" action="compteVend.php" enctype="multipart/form-data">

						<div class="form-group">
							<label for="nom"></label>
							<input type="text" name="nom" class="form-control" placeholder="Nom">
						</div>
						<div class="form-group">
							<label for="prenom"></label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom">
						</div>
						<div class="form-group">
							<label for="pseudo"></label>
							<input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
						</div>
						<div class="form-group">
							<label for="email"></label>
							<input type="email" name="email" class="form-control" placeholder="Courriel">
						</div> <br>
						<div class="form-group">
							<label for="photo">Veuillez sélectionner votre photo préférée : &nbsp;&nbsp;&nbsp;&nbsp;</label>
							<input type="file" name="photo">
						</div><br>
						<div class="form-group">
							<label for="photo">Veuillez sélectionner votre photo portrait : &nbsp;&nbsp;&nbsp;&nbsp;</label>
							<input type="file" name="photo">
						</div>

						<br><br>
						<button type="submit" name="connect" class="btn btn-success">S'inscrire</button>
					</form>
				</div>

			<?php } else {
				echo "Bonjour " . $_SESSION['user'];
				echo '<a href="compteVend.php?deco">Deconnexion</a>';
			}
			?>
			<?php
			if (isset($erreur)) {
				echo '<font color="red">' . $erreur . "</font>";
			}
			?>
		</div>
	</header>

	<?php
	require('./inc/footer.php');
	?>


</body>

</html>
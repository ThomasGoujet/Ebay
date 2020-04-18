<?php

session_start();
if (isset($_GET['deco'])) {
	unset($_SESSION['user']);
	header("Location: ajouter_vendeur.php");
}

$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 

if (isset($_POST['connect'])) {

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$email = htmlspecialchars($_POST['email']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$photo = htmlspecialchars($_FILES['photo']['name']);

	$req = $bdd->prepare('INSERT INTO item (pseudo ,email ,nom ,prenom ,photo) VALUES (:pseudo, :email, :nom, :prenom, :photo)');

	$req->bindParam(':pseudo', $pseudo);
	$req->bindParam(':email', $email);
	$req->bindParam(':nom', $nom);
	$req->bindParam(':prenom', $prenom);
	$req->bindParam(':photo', $photo);

	// une fois qu'on l'a ajouté en bdd on l'upload dans le dossier images/upload

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
								echo ("<span class='white-txt'>" . $_FILES["photo"]["name"] . " existe déjà. </span>");
								die();
						} else {
								move_uploaded_file($_FILES["photo"]["tmp_name"], "./images/upload/" . $_FILES["photo"]["name"]);
								$req->execute();
								
							
						}
				} else {
						echo ("Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer.");
				}
		} else {
				echo "Error: " . $_FILES["photo"]["error"];
		}
}

	$erreur = "Votre compte a bien été créé !";
}


?>

<html>

<head>
	<title>Ebay ECE : Ajouter un vendeur</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./style/styles.css">

	<script type="text/javascript">
		$(document).ready(function() {
			$('.header').height($(window).height());
		});
	</script>

</head>

<body>

	<?php
	include('./inc/menu_admin.php');
	?>
	<header class="page-header header container-fluid">
		<div class="description">
			<br><br><br><br><br><br><br>


			<?php if (isset($_SESSION['user'])) { ?>
	
				<div class="container container-inscription">
					<h1>Ajouter un produit</h1><br>
					<form method="post" action="index.php" enctype="multipart/form-data">
						<div class="form-group">
							<label for="photo">Ajouter une photo de mon produit</label>
							<input type="file" name="photo" class="form-control" placeholder="Image">
						</div>
						<div class="form-group">
							<label for="nom">Nom</label>
							<input type="text" name="nom" class="form-control" placeholder="Nom">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="pseudo">Pseudo</label>
							<input type="text" name="pseudo" class="form-control" placeholder="Pseudo">
						</div>
						<div class="form-group">
							<label for="prenom">Prenom</label>
							<input type="text" name="prenom" class="form-control" placeholder="Prenom">
						</div>
						
						<button type="submit" class="btn btn-success">Ajouter un Vendeur</button>
					</form>
				</div>

			<?php } else {
				echo "Bonjour " . $_SESSION['user'];
				//echo '<a href="compteVend.php?deco">Deconnexion</a>';
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
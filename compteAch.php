<?php

if (isset($_GET['deco'])) {
	unset($_SESSION['user']);
	header("Location: compteAch.php");
}

//$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 

if (isset($_POST['connect'])) {

	$username = htmlspecialchars($_POST['username']);
	$mdp = htmlspecialchars($_POST['mdp']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$adresse = htmlspecialchars($_POST['adresse']);
	$ville = htmlspecialchars($_POST['ville']);
	$code_postal = htmlspecialchars($_POST['code_postal']);
	$pays = htmlspecialchars($_POST['pays']);
	$num_tel = htmlspecialchars($_POST['num_tel']);

	/*$type_carte = htmlspecialchars($_POST['type_carte']);
	$num_carte = htmlspecialchars($_POST['num_carte']);
	$nom_carte = htmlspecialchars($_POST['nom_carte']);
	$date_expi = htmlspecialchars($_POST['date_expi']);
	$code_secur = htmlspecialchars($_POST['code_secur']);*/


	// if(!empty($_POST['login']) AND !empty($_POST['mdp']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['ville']) AND !empty($_POST['codePostal']) AND !empty($_POST['pays']) AND !empty($_POST['NumTel']) )
	// { // Verifier si les champs ne sont pas vide
	/*try {*/
		$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
		$req = $bdd->prepare('INSERT INTO clients (username, mdp, nom, prenom, adresse, ville, code_postal, pays, num_tel) VALUES (:username, :mdp, :nom, :prenom, :adresse, :ville, :code_postal, :pays, :num_tel)');

		$req->bindParam(':username', $username);
		$req->bindParam(':mdp', $mdp);
		$req->bindParam(':nom', $nom);
		$req->bindParam(':prenom', $prenom);
		$req->bindParam(':adresse', $adresse);
		$req->bindParam(':ville', $ville);
		$req->bindParam(':code_postal', $code_postal);
		$req->bindParam(':pays', $pays);
		$req->bindParam(':num_tel', $num_tel);
		$req->execute();

		/*$req->bindParam(':type_carte', $num_tel);
		$req->bindParam(':num_carte', $num_tel);
		$req->bindParam(':nom_carte', $num_tel);
		$req->bindParam(':date_expi', $num_tel);
		$req->bindParam(':code_secur', $num_tel);
		$req->execute();*/

		/*if ($req) {
			$userinfo = $req->fetch();
			$_SESSION['nom'] = $_POST['nom']; // recevoir les informations
			$_SESSION['prenom'] = $_POST['prenom'];
			$_SESSION['adresse'] = $_POST['adresse'];
			$_SESSION['ville'] = $_POST['ville'];
			$_SESSION['code_postal'] = $_POST['code_postal'];
			$_SESSION['pays'] = $_POST['pays'];
			$_SESSION['num_tel'] = $_POST['num_tel'];

			/*$_SESSION['type_carte'] = $_POST['type_carte'];
			$_SESSION['num_carte'] = $_POST['num_carte'];
			$_SESSION['nom_carte'] = $_POST['nom_carte'];
			$_SESSION['date_expi'] = $_POST['date_expi'];
			$_SESSION['code_secur'] = $_POST['code_secur'];*/
		/*} else {

			$erreur = "false!";
		}


		$erreur = "Votre compte a bien été créé !";
	} /*catch (PDOException $e) {
		echo 'erreur :' . $e->getMessage();
	//}*/
/*}*/

}

?>

<html>

<head>
	<title>Ebay ECE : Inscription acheteur</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./style/styles.css">
	<link rel="stylesheet" type="text/css" href="./style/footer.css">
</head>

<body>
	<?php
	include('./inc/menu_acheteur.php');
	?>

	<section class="page-header header container-fluid">
		<div class="description">



			<?php if (!isset($_SESSION['user'])) { ?>

				<div class="container container-inscription">
				<h1>Inscrivez-vous en tant qu'acheteur</h1><br>
					<form method="post" action="compteAch.php">
						<div class="form-group">
							<label for="nom"></label>
							<input type="text" name="nom" class="form-control" placeholder="Nom">
						</div>
						<div class="form-group">
							<label for="prenom"></label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom">
						</div>
						<div class="form-group">
							<label for="username"></label>
							<input type="text" name="username" class="form-control" placeholder="Pseudo">
						</div>
						<div class="form-group">
							<label for="mdp"></label>
							<input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
						</div>
						<div class="form-group">
							<label for="adresse"></label>
							<input type="text" name="adresse" class="form-control" placeholder="Adresse">
						</div>
						<div class="form-group">
							<label for="code_postal"></label>
							<input type="number" name="code_postal" class="form-control" placeholder="Code postal">
						</div>
						<div class="form-group">
							<label for="ville"></label>
							<input type="text" name="ville" class="form-control" placeholder="Ville">
						</div>
						<div class="form-group">
							<label for="pays"></label>
							<input type="text" name="pays" class="form-control" placeholder="Pays">
						</div>
						<div class="form-group">
							<label for="num_tel"></label>
							<input type="number" name="num_tel" class="form-control" placeholder="Numéro de téléphone">
						</div>
						<!--<div class="form-group">
							<label for="typecard">Type de carte</label>
							<select class="form-control">
								<option>Visa</option>
								<option>MasterCard</option>
								<option>American express</option>
								<option>Paypal</option>

							</select>
						</div> -->

						<br>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">J'accepte les conditions générales : émettre une offre sur un article amène à être sous contrat légal pour l'acheter si le vendeur accepte l'offre.</label>
						</div><br><br>
						
						<button type="submit" name="connect" class="btn btn-success">S'inscrire</button>
					</form>
				</div>


			<?php } else {
				echo "Bonjour " . $_SESSION['user'];
				echo '<a href="compteAch.php?deco">Deconnexion</a>';
			}
			?>
			<?php
			if (isset($erreur)) {
				echo '<font color="red">' . $erreur . "</font>";
			}
			?>
		</div>
	</section>



	<?php
	require('./inc/footer.php');
	?>


</body>

</html>
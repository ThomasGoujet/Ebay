<?php

session_start();
if (isset($_GET['deco'])) {
	unset($_SESSION['user']);
	header("Location: Inscription.php");
}

$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
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


	// if(!empty($_POST['login']) AND !empty($_POST['mdp']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['ville']) AND !empty($_POST['codePostal']) AND !empty($_POST['pays']) AND !empty($_POST['NumTel']) )
	// { // Verifier si les champs ne sont pas vide
	try {
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

		$erreur = "Votre compte a bien été créé !";
	} catch (PDOException $e) {
		echo 'erreur :' . $e->getMessage();
	}

	//header("Location : Incrisption1.php?nom=".$_SESSION['nom']);



	/*$pseudolength = strlen($pseudo);
		$maillength = strlen($maillength);
		$nomlength = strlen($nomlength);
		
		if ($pseudolength <= 100) {
			if ($maillength <= 100) {
				if ($nomlength <= 10 ) {
					
				}
				else
				{
					$erreur = "Votre nom ne doit pas dépasser 100 caractère !";
				}
			}
			else
			{
				$erreur = "Votre mail ne doit pas dépasser 100 caractère !";
			}
			
		}
		else
		{
			$erreur = "Votre pseudo ne doit pas dépasser 100 caractère !";
		}*/
	// }	
	// 	else 
	// {
	// 	$erreur = "Tous les champs doivent être complétés ! ";
	// }

}

?>

<html>

<head>
	<title>INSCRIPTION</title>
	<meta charset="utf-8">
</head>

<body>

	<div align="center">
		<h2>Inscription</h2>
		<br /><br /><br />
		<form method="POST" action="Inscription.php">

			<label for="login">Login</label>
			<input type="text" placeholder="login" id="login" name="username" />

			<label for="mdp">Mot de passe</label>
			<input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />

			<label for="nom">Nom</label>
			<input type="text" placeholder="Votre nom" id="nom" name="nom" />

			<label for="prenom">Prenom</label>
			<input type="text" placeholder="Votre prenom" id="prenom" name="prenom" />

			<label for="adresse">Adresse</label>
			<input type="text" placeholder="Votre adresse" id="adresse" name="adresse" />

			<label for="Ville">Ville</label>
			<input type="text" placeholder="Votre ville" id="ville" name="ville" />

			<label for="codePostal">Code Postal</label>
			<input type="tel" placeholder="Votre code postal" id="codePostal" name="code_postal" />

			<label for="pays">Pays</label>
			<input type="text" placeholder="Votre pays" id="pays" name="pays" />

			<label for="NumTel">Numero de Téléphone</label>
			<input type="tel" placeholder="Votre numéro de téléphone" id="NumTel" name="num_tel" />

			<input type="submit" name="connect" value="Je m'inscris" />
		</form>
		<?php

		if (isset($erreur)) {
			echo '<font color="red">' . $erreur . "</font>";
		}

		?>
	</div>

</body>

</html>
<?php
session_start();
if(isset($_GET['deco'])) {
	unset($_SESSION['user']);
	header("Location: Vendeur.php");
}
$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 


if (isset($_POST["connect"])) {
              
  $pseudoconnect = htmlspecialchars($_POST["pseudo"]);
  $emailconnect = htmlspecialchars($_POST["email"]);
                    
if(!empty($pseudo) AND !empty($email))
  {
    $requser = $bdd->prepare("SELECT * FROM Vendeur WHERE pseudo = ? AND email= ? ");
    $requser->execute(array($pseudo, $email));
    $userexist= $requser->rowCount();
    if($userexist == 1)
    {
       $userinfo = $requser->fetch(); 
       $_SESSION['nom'] = $userinfo['nom']; // recevoir les informations
       $_SESSION['prenom'] = $userinfo['prenom'];
       $_SESSION['email'] = $userinfo['email'];
       header("Location : Vendeur1.php?nom=".$_SESSION['nom']);

    }
    else 
    {
      $erreur = "Mauvais pseudo ou mail !";
    }

  }
  else 
  {
    $erreur = "Tous les champs doivent être complétés !";
  }
 } 

?>


<html>
<head>
	<title>Ebay ECE: se connecter en tant que vendeur</title>
	<meta charset="utf-8">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css">
  <link rel="stylesheet" type="text/css" href="./style/styles.css">
  <link rel="stylesheet" type="text/css" href="./style/footer.css">

	<script type="text/javascript">
	$(document).ready(function(){ 
		$('.header').height($(window).height());
	}); 	
	</script>

</head> 
<body>
  
<?php require('./inc/menu_vendeur.php'); ?>

<form class="form-signin" method="post" action="Vendeur1.php">
<a class="navbar-brand center" href="#"><img src="./images/logo1.jpg"></a>
  <h1 class="h3 mb-3 font-weight-normal text-center">Connectez-vous en tant que vendeur</h1> <br><br>
  <label for="pseudo" class="sr-only">Pseudo</label>
  <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" autofocus><br>
  <label for="email" class="sr-only">Courriel</label>
  <input type="email" name="email" class="form-control" placeholder="Courriel">
 <br>
  <button class="btn btn-lg btn-dark btn-block" type="submit">Se connecter</button>

</form>

<?php require('./inc/footer.php');?>
</body>


</html>

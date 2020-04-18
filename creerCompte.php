<!DOCTYPE html> 
<html>
<head>
	<title>Ebay ECE: inscription</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./style/footer.css">
	<link rel="stylesheet" type="text/css" href="./style/stylesAccueil.css">
	<script type="text/javascript">
	$(document).ready(function(){ 
		$('.header').height($(window).height());
	}); 	
	</script>

</head> 

<body> 

<nav class="navbar navbar-expand-md">
	<a class="navbar-brand" href="#"><img src="./images/logo1.jpg"></a>
	<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation"> 
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="main-navigation">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="Index.php">Accueil</a></li> 
			<li class="nav-item"><a class="nav-link" href="Categorie.php">Catégorie</a></li> 
			<li class="nav-item"><a class="nav-link" href="Achat.php">Achat</a></li> 
			<li class="nav-item"><a class="nav-link" href="Utilisateur.php">Se connecter</a></li>
			<li class="nav-item"><a class="nav-link" href="creerCompte.php">Créer mon compte</a></li>
			<li class="nav-item"><a class="nav-link" href="#"><img src="./images/panier1.jpg"></a></li>
		</ul>
	</div>

</nav>

<header class="page-header header container-fluid"> 

<div class="description">
<h1>Inscrivez-vous sur Ebay ECE !</h1>
<p>Vous êtes ? </p>


<a href="compteAch.php"><button type="button" class="btn btn-light">Acheteur</button></a>
<a href="compteVend.php"><button type="button" class="btn btn-light">Vendeur</button></a>


<p>Cliquez et remplissez le formulaire d'inscription !</p>
</div>
</header>

<div class="container features"> <div class="row">

<div class="col-lg-4 col-md-4 col-sm-12">
<h3 class="feature-title">Meuble de bureau</h3> <img src="./images/meuble.jpg" class="img-fluid"> 
<p>Meuble de bureau à multiples tiroirs de rangement, datant du 19siècle.</p> 
</div>

<div class="col-lg-4 col-md-4 col-sm-12">
<h3 class="feature-title">Pièce de monnaie</h3> <img src="./images/piece.jpg" class="img-fluid">
<p>Cette pièce de monnaie dessine le portrait de la reine diadémé avec coiffure en chinion, tourné vers la gauche. 
La "1000 reis" est appelé "Coroa" en portugais ce qui signifie "couronne".</p>
</div>

<div class="col-lg-4 col-md-4 col-sm-12">
	<h3 class="feature-title">Besoin d'aide ? </h3>
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Votre nom :" name=""> </div>
	<div class="form-group">
		<input type="email" class="form-control" placeholder="Courriel :" name="email"></div>
		<div class="form-group">
			<textarea class="form-control" rows="4">Vos commentaires</textarea>
		</div>
			<input type="submit" class="btn btn-secondary btn-block" value="Envoyer" name="">
</div>
</div>
</div>

<?php 
	include('./inc/footer.php');
?>

</body>
</html>
  
<!DOCTYPE html>
<html>

<head>
	<title>Catégories des items</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./style/stylesCatAch.css">
	<link rel="stylesheet" type="text/css" href="./style/footer.css">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.header').height($(window).height());
		});
	</script>

</head>

<body>

	<?php
	require('./inc/menu_acheteur.php');
	?>

	<header class="page-header header container-fluid">

		<div class="overlay"></div>

		<div class="description">

			<a href="catFerraille.php"><button type="button" class="btn btn-light">Férraille ou Trésor</button></a> &nbsp;&nbsp;&nbsp;&nbsp;
			<a href="catMusee.php"><button type="button" class="btn btn-light">Bon pour le musée</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="catVIP.php"><button type="button" class="btn btn-light">Accessoir VIP</button></a><br><br><br>

			<div class="alert alert-warning mt-1" role="alert">
				En cliquant sur l'une des catégories ci-dessus, vous trouverez l'ensemble des articles à vendre. <br>
				Nous vous informons que certains articles sont à acheter dès maintenant, aux enchères ou bien selon la meilleure offre.
			</div>
			
		</div>

	</header>


	<?php
	include('./inc/footer.php');
	?>

</body>

</html>
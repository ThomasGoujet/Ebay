<?php

$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 



$req = $bdd->query('SELECT * FROM item WHERE prix = 60000 OR prix = 50000 OR prix = 7000');
$values = $req->fetchAll(PDO::FETCH_ASSOC);
/*$req = $bdd->prepare('SELECT * FROM item WHERE id_client = 1');
$req->execute();
$info = $req->fetchAll(PDO::FETCH_ASSOC);*/


if (!empty($_POST['nom']) and !empty($_POST['description']) and !empty($_POST['prix']) and !empty($_POST['photo'])) {
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $prix = $_POST['prix'];
  $photo = $_POST['photo'];
} else {
  $nom = null;
  $description = null;
  $prix = null;
  $photo = null;
}

/*$nom = $values['nom'];
$description = $values['description'];
$prix = $values['prix'];
$photo = $values['photo'];*/

?>

<html>

<head>
  <title>Ebay ECE</title>

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
  require('./inc/menu_acheteur.php');
?>

<div class="album py-5 bg-light">
    <div class="container">
      <br><h1>Articles à acheter maintenant</h1><br>
      <div class="row">
        <div class="card-deck">
        <?php foreach ($values as $item) { ?>
          <div class="card">
            <img class="card-img-top" src="<?= $item['photo']; ?>" alt="<?= $item['photo']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?= $item['nom']; ?></h5>
              <p class="card1-text"><?= $item['description']; ?></p>
              <p class="card-text"><small class="text-muted"><?= $item['prix']; ?> €</small></p>
            </div>
          </div>

     <?php } ?>

        </div>
      </div>
    </div>
  </div>


  <?php
  require('./inc/footer.php');
  ?>

</body>

</html>
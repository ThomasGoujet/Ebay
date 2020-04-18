<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 


// $getusername = $_POST['username'];
// $getnom = $_POST['nom'];
// $getprenom = $_POST['prenom'];
// $getadresse = $_POST['adresse'];
// $getville = $_POST['ville'];
// $getcodepostal = $_POST['code_postal'];
// $getpays = $_POST['pays'];
// $getnumtel = $_POST['num_tel'];

// $requser = $bdd->prepare('SELECT * FROM clients WHERE username = :username');
// $requser->bindParam(':username', $getusername);
// $requser->execute();

// $userinfo = $requser->fetch(PDO::FETCH_ASSOC);

// if (!$userinfo) {
//   echo "error il n'y a pas d'utilisateur";
// } /*else if ($getemail != $userinfo['email']) {
//   echo "l'email n'est pas bon";
// }*/ else {
  // session_start();
  // $_SESSION['username'] = $userinfo['username'];
  // $_SESSION['nom'] = $userinfo['nom'];
  // $_SESSION['prenom'] = $userinfo['prenom'];
  // $_SESSION['adresse'] = $userinfo['adresse'];
  // $_SESSION['ville'] = $userinfo['ville'];
  // $_SESSION['code_postal'] = $userinfo['code_postal'];
  // $_SESSION['pays'] = $userinfo['pays'];
  // $_SESSION['num_tel'] = $userinfo['num_tel'];

// }

?>

<html>

<head>
  <title> Profil Ebay ECE </title>

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

  <nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="#"><img src="./images/logo1.jpg"></a>
    <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="main-navigation">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#">Catégorie</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Achat</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Votre Compte</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><img src="./images/panier1.jpg"></a></li>
      </ul>
    </div>
  </nav>

  <header class="page-header header container-fluid">

    <div class="description">
      <br>
      <h1>Profil</h1><br>
      <br/><br />

      <?php if(isset($_SESSION['nom'])) {?>
        <?= 'salut ' . $_SESSION['nom'] . ' '.  $_SESSION['prenom']; ?><br>
       
        <a href="#"> Editer mon profil </a>
        <?php 
         } else {
           echo 'pas connecté';
          }
     ?>
  

    </div>

  </header>

  <div class="container features">
    <div class="row">

      <div class="col-lg-4 col-md-4 col-sm-12">
        <h3 class="feature-title">Meuble de bureau</h3> <img src="meuble.jpg" class="img-fluid">
        <p>Meuble de bureau à multiples tiroirs de rangement, datant du 19siècle.</p>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <h3 class="feature-title">Pièce de monnaie</h3> <img src="piece.jpg" class="img-fluid">
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

  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
          <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu. Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu.
            Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis. </p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <h6 class="text-uppercase font-weight-bold">Contact</h6>
          <p>
            37, quai de Grenelle, 75015 Paris, France <br> info@ventesAuxEncheres.ebayece.fr <br>
            +33 01 02 03 04 05 <br>
            +33 01 03 02 05 04
          </p>
        </div>
      </div>
      <div class="footer-copyright text-center">&copy; 2020 Copyright | Droit d'auteur : ventesAuxEncheres.ebayece.fr</div>
  </footer>

</body>

</html>
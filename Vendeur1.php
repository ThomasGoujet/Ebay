<?php
session_start();
if(isset($_GET['deco'])) {
  unset($_SESSION['user']);
  header("Location: index.php");
}

$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 


if (!isset($_SESSION['user'])) {
  if (isset($_POST['pseudo']) and isset($_POST['email'])) {

    $getpseudo = $_POST['pseudo'];
    $getemail = $_POST['email'];

    $requser = $bdd->prepare('SELECT * FROM Vendeur WHERE pseudo = :pseudo');
    $requser->bindParam(':pseudo', $getpseudo);
    $requser->execute();

    $userinfo = $requser->fetch(PDO::FETCH_ASSOC);
    if (!$userinfo) {
      echo "error il n'y a pas d'utilisateur";
    } else if ($getemail != $userinfo['email']) {
      echo "l'email n'est pas bon";
    } else {
      $_SESSION['user'] = $getpseudo;
      $_SESSION['pseudo']= $getpseudo;
      $_SESSION['email'] = $getemail;
      $_SESSION['prenom'] = $userinfo['prenom'];
      $_SESSION['nom'] = $userinfo['nom'];
      $_SESSION['photo'] = $userinfo['photo'];
    }
  }
}

?>

<html>

<head>
  <title>Ebay ECE: Profil Vendeur</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./style/stylesProfils.css">
  <link rel="stylesheet" type="text/css" href="./style/profile.css">
  <link rel="stylesheet" type="text/css" href="./style/footer.css">
  <script type="text/javascript">
    $(document).ready(function() {
      $('.header').height($(window).height());
    });
  </script>

</head>

<body>

  <?php
  require('./inc/menu_vendeur.php');
  ?>


  <header class="page-header header container-fluid">
    <div class="overlay"></div>

    <div class="description">
      <?php
      if (isset($_SESSION['user'])) {
      ?>

        <div class="container-profile">
          <div class="profile-header">
            <div class="profile-img">
              <img src="./images/upload/<?php echo $_SESSION['photo']; ?>">
            </div>

            <div class="profil-identity">
              <h2><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></h2>
            </div>

          </div>
          <div class="profil-infos">
            <h5>Pseudo : </h4><?php echo $_SESSION['pseudo']; ?>
              <Br></Br>
              <h5>Courriel :</h4><?php echo $_SESSION['email']; ?><Br></Br>
                <a>Bonjour <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?> !<br>Étant vendeur, vous êtes libre d'ajouter ou de supprimer vos articles.</a>
          </div>
          <br>

          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <button type="button" class="btn btn-dark"><a href="ajouter_item.php">Ajouter mon article</a></button>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-lg-4 col-md-4 col-sm-12">
              <button type="button" class="btn btn-dark"><a href="ajouter_item.php">Supprimer mon article</a></button>
            </div>
          </div>

          <br><br>
          <button type="button" class="btn btn-dark"><a href="Vendeur1.php?deco">Déconnexion</a></button>
        </div>

      <?php
      }

      ?>

    </div>

  </header>
  
  <?php
  require('./inc/footer.php');
  ?>

</body>

</html>
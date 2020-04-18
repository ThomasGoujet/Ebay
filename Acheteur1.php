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
  if (isset($_POST['username']) and isset($_POST['mdp'])) {
    $getusername = $_POST['username'];
    $getmpd = $_POST['mdp'];
    $requser = $bdd->prepare('SELECT * FROM clients WHERE username = :username');
    $requser->bindParam(':username', $getusername);
    $requser->execute();
    $userinfo = $requser->fetch(PDO::FETCH_ASSOC);
    if (!$userinfo) {
      echo "error il n'y a pas d'utilisateur";
    } else if ($getmpd != $userinfo['mdp']) {
      echo "le mot de passe n'est pas bon";
    } else {

      $_SESSION['user'] = $getusername;
      $_SESSION['nom'] = $userinfo['nom'];
      $_SESSION['prenom'] = $userinfo['prenom'];
      $_SESSION['adresse'] = $userinfo['adresse'];
      $_SESSION['ville'] = $userinfo['ville'];
      $_SESSION['code_postal'] = $userinfo['code_postal'];
      $_SESSION['pays'] = $userinfo['pays'];
      $_SESSION['num_tel'] = $userinfo['num_tel'];
      //$_SESSION['mdp'] = $getmdp;
    }
  }
}

?>

<html>

<head>
  <title>Ebay ECE : Profil acheteur </title>

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

    <div class="description"><br>
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
            <h5>Adresse : </h4><?php echo $_SESSION['adresse'] ?>

              <h5>Ville :</h4><?php echo $_SESSION['ville'] ?>
                <h5>Code postal :</h4><?php echo $_SESSION['code_postal'] ?>
                  <h5>Pays :</h4><?php echo $_SESSION['pays'] ?>

                    <div class="alert alert-danger" role="alert">
                      Informations : Suite à votre inscription, vous avez accepeter les conditions générales d'achat.
                    </div>
                    <button type="button" class="btn btn-dark">
                      <a href="Acheteur1.php?deco">Déconnexion</a>
                    </button>
                    <h2></h2>
          </div>
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
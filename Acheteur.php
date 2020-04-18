<?php



if (isset($_GET['deco'])) {
  unset($_SESSION['user']);
  header("Location: Acheteur.php");
}
$bdd = new PDO('mysql:host=localhost;dbname=ebay;charset=utf8', 'root', 'root');
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost |votre login = root |votre password = <rien> 


if (isset($_POST["connect"])) {

  $usernameconnect = htmlspecialchars($_POST["username"]);
  $emailconnect = htmlspecialchars($_POST["mdp"]);

  if (!empty($username) and !empty($mdp)) {
    $requser = $bdd->prepare("SELECT * FROM clients WHERE username = ? AND mdp= ? ");
    $requser->execute(array($username, $mdp));
    $userexist = $requser->rowCount();
    if ($userexist == 1) {
      $userinfo = $requser->fetch();
      $_SESSION['nom'] = $userinfo['nom']; // recevoir les informations
      $_SESSION['prenom'] = $userinfo['prenom'];
      $_SESSION['username'] = $userinfo['username'];
      header("Location : Acheteur1.php?login=" . $_SESSION['username']);
    } else {
      $erreur = "Mauvais pseudo ou mail !";
    }
  } else {
    $erreur = "Tous les champs doivent être complétés !";
  }
}

?>

<html>

<head>
  <title>Ebay ECE : Se connecter en tant qu'acheteur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css">
  <link rel="stylesheet" type="text/css" href="./style/styles.css">
  <link rel="stylesheet" type="text/css" href="./style/footer.css">
  <script type="text/javascript">
    $(document).ready(function() {
      $('.header').height($(window).height());
    });
  </script>

</head>

<body>
  
<?php require('./inc/menu_acheteur.php'); ?>

<form class="form-signin" method="post" action="Acheteur1.php">
<a class="navbar-brand center" href="#"><img src="./images/logo1.jpg"></a>
  <h1 class="h3 mb-3 font-weight-normal text-center">Connectez-vous en tant qu'acheteur</h1> <br><br>
  <label for="inputusername" class="sr-only">Pseudo</label>
  <input type="text" name="username" class="form-control" placeholder="Pseudo" autofocus><br>
  <label for="inputPassword" class="sr-only">Mot de passe</label>
  <input type="password" name="mdp" class="form-control" placeholder="Mot de passe"><br>
  <button class="btn btn-lg btn-dark btn-block" type="submit">Se connecter</button>

</form>

<?php require('./inc/footer.php');?>
</body>

</html>
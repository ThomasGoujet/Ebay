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
      <?php if(isset($_SESSION['user'])) { ?>
        <li class="nav-item"><a class="nav-link" href="Administrateur1.php">Mon Compte</a></li>
      
     <?php } 
     else { ?>
      <li class="nav-item"><a class="nav-link" href="Utilisateur.php">Se connecter</a></li>
    
     <?php  } ?>
     <li class="nav-item"><a class="nav-link" href="CreerCompte.php">Créer mon compte</a></li>
      <li class="nav-item"><a class="nav-link" href="#"><img src="./images/panier1.jpg"></a></li>
    </ul>
  </div>
</nav>
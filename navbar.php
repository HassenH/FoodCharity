<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="assets/img/logotransparent.png" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lalezar" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Schoolbell" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css"/>
  <title>Foodcharity</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar10">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar10">
        <ul class="navbar-nav nav-fill w-100 d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><img src="assets/img/logotransparent.png" class="logo" alt="logo"></a>
          </li>
          <li class="nav-item">
            <a href="#top" class="nav-link"> <i class="fa fa-home nav-link-icon"></i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Le concept
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Qu'est-ce que c'est ?</a>
              <a class="dropdown-item" href="/pourquoi.php">Pourquoi, pour qui ?</a>
              <a class="dropdown-item" href="/howitworks.php">Comment ça marche ?</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">L'aventure</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/notrehistoire.php">Notre histoire</a>
              <a class="dropdown-item" href="#">Notre vision</a>
              <a class="dropdown-item" href="#">Nos engagements</a>
              <a class="dropdown-item" href="">Nos valeurs</a>
              <a class="dropdown-item" href="#">Nos partenaires</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/registrationCategory.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="loginModal.php" data-toggle="modal" data-target="#myModal">Connexion</a>
          </li>
          <div class="searchbar">
            <input class="search_input" type="text" name="" placeholder="Recherche...">
            <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
          </div>
        </ul>
      </div>
    </nav>
  </div>
  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Se connecter</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form action="/examples/actions/confirmation.php" method="post">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="mail" placeholder="Adresse e-mail" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control" name="password" placeholder="Mot de passe" required="required">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-lg">Se connecter</button>
            </div>
            <p class="hint-text"><a href="#">Mot de passe oublié ?</a></p>
          </form>
        </div>
        <div class="modal-footer">Vous n'avez pas de compte ?  <a href="#"> Creér le votre</a></div>
      </div>
    </div>
  </div>

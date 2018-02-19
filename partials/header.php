<?php
session_start();

$bdd = new PDO('mysql:host=cs28921-004.privatesql;port=35371;dbname=jehan', 'jehan', 'Jehan2018');
?><!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title>Happy Trip | Accueil</title>
  <meta name="description" content="La 1ère application de gestion et d'organisation de tour du monde pensée avec et pour les voyageurs." />
  <meta name="keywords" content="happy trip, happy, trip, voyage, tour, monde, organisation, voyages, voyageur, voyager, baroudeur, application, simple" />
  <meta name="robots" content="index,nofollow,noodp" />
  <meta name="theme-color" content="#26a69a" />
  <link rel="manifest" href="./manifest.json">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta property="og:site_name" content="Happy Trip - L'application de gestion de votre tour du monde" />
  <meta property="og:title" content="Happy Trip" />
  <meta property="og:description" content="L'application de gestion de votre tour du monde" />
  <meta property="og:locale" content="fr_FR" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="//jehan.captus-rnd.com/" />
  <link rel="stylesheet" type="text/css" href="./vendor/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="./stylesheets/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <nav class="teal lighten-1">
    <div class="nav-wrapper">
      <a href="./" class="brand-logo">&nbsp;&nbsp;Happy Trip</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if(!isset($_SESSION['id'])) {?>
        <li><a href="inscription.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Inscription">
          <i class="material-icons">person_add</i></a></li>
        <li><a href="connexion.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Login">
          <i class="material-icons">create</i></a></li>
        <?php } else {?>
        <li><a href="travel.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Mon tour du monde">
          <i class="material-icons">edit_location</i></a></li>
        <li><a href="profil.php?id=<?php echo $_SESSION['id'] ?>" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Mon profil">
          <i class="material-icons">account_circle</i></a></li>
          <li><a href="editionprofil.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Editer mon profil">
          <i class="material-icons">note_add</i></a></li>
                  <li><a href="deconnexion.php" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Déconnexion">
          <i class="material-icons">exit_to_app</i></a></li>
      <?php }?>
  </ul>
    </div>&nbsp;&nbsp;
  </nav>

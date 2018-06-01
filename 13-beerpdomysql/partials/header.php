<?php 
// Configuration de PDO pour la base de données
// On utilise la notation en absolue pour se repérer
require(__DIR__.'/../config/database.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../../../favicon.ico"> -->

    <title>Les bières</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/script.css" rel="stylesheet">
  </head>

  <body>

  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
      <a class="navbar-brand pl-auto" href="index.php"><img class="logo" src="img/beer.png"> Beer PDO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <?php
        // Permet de récupérer le nom de la page sur laquelle on se trouve
          $page = basename($_SERVER['REQUEST_URI'], '.php');  ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active <?php echo ($page == 'index') ? 'active' : '' ?>">
              <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($page == 'beer_list') ? 'active' : '' ?>">
              <a class="nav-link" href="beer_list.php">Les bières</a>
            </li>
            <li class="nav-item <?php echo ($page == 'beer_add') ? 'active' : '' ?>">
              <a class="nav-link" href="beer_add.php">Ajouter une bières</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
    </nav>

  <?php
  $page = basename($_SERVER['REQUEST_URI'], '.php');
  // affiche : C:\xampp\htdocs\PHP-Base\13-beerpdomysql\partials\header.php:55:string '/PHP-Base/13-beerpdomysql/beer_list.php' (length=39)
  // selon page 
  //basename('/PHP-Base/13-beerpdomysql/beer_list.php');
  ?>
  
  </header>
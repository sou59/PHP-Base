<?php

// Configuration de PDO pour la base de données
// On utilise la notation en absolue pour se repérer
require(__DIR__.'/../config/database.php');
?>

<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Les bières</title>
</head>
<body>
    <!-- Le menu -->
<header>
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="ma-nav">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img class="logo" src="img/logo.png" alt="Beer PDO">Beer PDO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form method="GET" action="search.php" class="form-inline mx-auto">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <?php
                // Permet de récupérer le nom de la page sur laquelle on se trouve
                $page = basename($_SERVER['REQUEST_URI'], '.php'); ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo ($page == 'index') ? 'active' : '' ?>">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown <?php echo ($page == 'beer_list' || $page == 'beer_add') ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bières
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="beer_list.php">Les Bières</a>
                            <a class="dropdown-item" href="beer_add.php">Ajouter une bière</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?php echo ($page == 'brewery_list' || $page == 'brewery_add') ? 'active' : '' ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brasserie
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="brewery_list.php">Les Brasseries</a>
                            <a class="dropdown-item" href="brewery_add.php">Ajouter une brasserie</a>
                        </div>
                    </li>
                    <li class="nav-item <?php echo ($page == 'register') ? 'active' : '' ?>">
                        <a class="nav-link" href="register.php">Inscription</a>
                    </li>
                    <li class="nav-item <?php echo ($page == 'login') ? 'active' : '' ?>">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>    
            
            <?php //var_dump(basename($_SERVER['REQUEST_URI'], '.php')); ?>
        </div> 
    </nav>
    
</header>

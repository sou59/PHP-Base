<?php

// on crée une connexion à la bdd
$db = new PDO('mysql:host=localhost;dbname=movie_catalog;charset=utf8', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);

// requete récupérant un film en particulier par son ID, il doit provenir de l'URL
// ex saisie : movie.php?id=43

var_dump($_GET);

if (isset($_GET['id'])) { // Vérifie que id soit bien présent dans l'url
    $id = $_GET['id']; // on peur récupérer un id dans l'url
        echo 'Film numéro'. $id;
    }

    echo 'SELECT * FROM movie WHERE id =' . $id;

    // on peut concaténer pour dynamiser la requete
$query = $db->query('SELECT * FROM movie WHERE id =' . $id);

// on récupère le film avec fletch
$movie = $query->fetch();

var_dump($movie);
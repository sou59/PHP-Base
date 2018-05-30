<?php
// mysql, host localhost, dbname movie_catalog, user root, pass ''

// On crée une connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=movie_catalog;charset=UTF8', 'root', '', [
    // On récupère tous les résultats en tableau associatif
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

// Ecrire une requête qui récupére un film par son ID
// L'id doit provenir de l'URL
// Exemple : Si je saisis movie.php?id=43, la requête doit récupérer
// le film qui a l'id 43

$id = $_GET['id']; // Je récupére l'id dans l'url
// Le echo pour s'aider sur la requête
echo 'SELECT * FROM movie WHERE id = ' . $id;
// On peut utiliser la concaténation pour "dynamiser la requête"
$query = $db->query('SELECT * FROM movie WHERE id = ' . $id);
// On récupére UN film avec fetch
$movie = $query->fetch();
var_dump($movie);

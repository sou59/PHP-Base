
<?php

//mysql, host localhost, ndbnae movi-catalog, user root, pass ""
//phpinfo();
// on crée une connexion à la bdd

$db = new PDO('mysql:host=localhost;dbname=movie_catalog;charset=utf8', 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);

var_dump($db);

// on crée une requete pour récuperer tous les films
$query = $db->query('SELECT * FROM movie');
//var_dump($query);

// qd on veur juste un résultat : 
//$movie = $query->fetch();
// le second fetch affira d'autre résultat saus celui précedemment affiché

// récupérer tous les films 
$movie = $query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($movie);

// closeCursor(); uniquement si pp connexions différentes

// afficher la liste des films et afficher leur titre dans une liste

echo '<ul>';
foreach($movie as $film){
    echo '<li>' . $film['name'] . ', ' . $film['date'] . '</li>';
}
echo '</ul>';


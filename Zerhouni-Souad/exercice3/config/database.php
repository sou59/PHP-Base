<?php 
// une constante en php est une variable qui ne varie jamais
// constante toujours en majuscule

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'exercice_3');

//$db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
// Connexion à la BDD
try { // Essaye le code
    $db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS, 
    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // active les erreurs SQL
    ]);


} catch (Exception $e) { // Si le code renvoie une erreur, fais quelque chose
    echo $e->getMessage(); // On récupére le message de l'exception
    // On peut ouvrir un nouvel onglet qui effectue une recherche sur Google avec l'erreur qu'on a obtenu
    // echo '<script>window.open("http://www.google.fr/search?q='.$e->getMessage().'");</script>';
    echo '<img src="img/confused-travolta.gif" />';
}

?>
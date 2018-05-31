<?php 
// une constante en php est une variable qui ne varie jamais
// constante toujours en majuscule

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'beer_pdo');

//$db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

try  {
    $db = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8', USER, PASS, 
    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // active les errurs SQL
    ]);

} catch (Exception $e) { //Si le code renvoie une erreur, faites quelque chose
    //echo $e->getMessage(); // on récupère le message de l'exception
    //redirection en php
    //echo '<script>window.open("https://www.google.fr/search='.$e->getMessage().'");</script>';

    echo "<img src='img/youre-awesome.gif' />";
}
// GIF BUNDLE EXCEPTION pour afficher image

?>
<?php

include('a.php'); // execute le fichier A

// include('a.php') : si le fichier n'existe pas, affiche un werning mais le reste du code s'execute

include('a.php'); //execute le fichier A une deuxième fois

include_once('a.php'); //execute le fichier A seulement si il n'a pas été inclut 
var_dump(__DIR__);
var_dump(__FILE__); // emplacement du fichier sur le serveur

require(__DIR__.'/a.php'); //execute le fichier si il existe, si il n'existe pas il arrete le script
// avec dir on est sur du bon dossier en absolue
//utiliser au max avec dir : absolue

echo ' Reste du site';


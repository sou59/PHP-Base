<?php

// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=beer_pdo;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

<?php

// Mot de passe
// On ne conserve jamais les mots de passe en clair dans une base de données. On préférera les hacher.
// On ne doit pas pouvoir retrouver le mot de passe. On doit comparer le vrai mot de passe et vérifier s'il y a une correspondance avec un hash.
// NE PAS UTILISER md5 OU sha1
// Hachage de mot de passe selon l'algorithme bcrypt

//Pour les mots de passe utiliser password-hash
$password = password_hash('toto', PASSWORD_DEFAULT);

// poure vérifier si le mdp est valide Retourne true ou false si correspondance
password_verify('toto', $password);
var_dump(password_verify('toto', $password));


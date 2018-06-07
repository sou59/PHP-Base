<?php

// Mot de passe
// On ne conserve jamais les mots de passe en clair dans une base de données. On préférera les hacher.
// On ne doit pas pouvoir retrouver le mot de passe. On doit comparer le vrai mot de passe et vérifier s'il y a une correspondance avec un hash.
// NE PAS UTILISER md5 OU sha1
// Hachage de mot de passe selon l'algorithme bcrypt

// On doit parfois générer des "hash"
// Un hash permet de masquer une vraie valeur
$message = '1234';
// Le md5 est une possibilité, il hash sur 32 caractères
var_dump(md5($message)); // 098f6bcd4621d373cade4e832627b4f6
var_dump(md5('test') === '098f6bcd4621d373cade4e832627b4f6');
// Les sha* ont le même fonctionnement
var_dump(sha1('1234'));
var_dump(hash('sha256', '1234'));
var_dump(hash('sha512', '1234'));

// Pour nos mots de passe, on va plutôt utiliser password_hash()
$password = 'test';
$hash = password_hash($password, PASSWORD_DEFAULT);
var_dump($hash);
// Pour vérifier le hash
var_dump(password_verify('test', $hash));

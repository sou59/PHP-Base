<?php

/*
1. Ecrire une boucle qui affiche les nombres de 10 à 1
2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100
3. Ecrire le code permettant de trouver le PGCD de 2 nombres
4. Coder le jeu du FizzBuzz
    Parcourir les nombres de 0 à 100
    Quand le nombre est un multiple de 3, afficher Fizz.
    Quand le nombre est un multiple de 5, afficher Buzz.
    Quand le nombre est un multiple de 15, afficher FizzBuzz.
    Sinon, afficher le nombre
*/

echo "<h2>1. Ecrire une boucle qui affiche les nombres de 10 à 1</h2>";
for ($i = 10; $i > 0; $i--) {
    echo $i . ' - ';
}

echo "<h2>2. Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100</h2>";
for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo $i . ' - ';
    }
}

echo "<h2>3. Ecrire le code permettant de trouver le PGCD de 2 nombres</h2>";
$nombre1 = 10;
$nombre2 = 3;
$reste = null;
$pgcd = null;

// Le var_dump peut nous aider à comprendre le résultat d'une comparaison
var_dump(null !== 0);

echo 'Le PGCD de ' . $nombre1 . ' et ' . $nombre2 . ' est : ';

// Tant que le reste est strictement différent de 0
// nombrePlusGrand % nombrePlusPetit
// 845 % 312 = 221;
// 312 % 221 = 91;
// 221 % 91 = 39;
// 91 % 39 = 13;
// 39 % 13 = 0;

$dividande = $nombre1;
$divisor = $nombre2;

while ($reste !== 0) {
    $pgcd = $divisor; // Le PGCD potentiel

    $reste = $dividande % $divisor; // 845 % 312 = 221;
    $dividande = $divisor; // 845 devient 312
    $divisor = $reste; // 312 devient 221 ( 312 % 221 = 91 )

    if ($reste == 0) {
        echo $pgcd;
    }
}

echo "<h2>4. Le jeu du FizzBuzz</h2>";

for ($i = 1; $i <= 100; $i++) {
    if ($i % 15 == 0) { // Mettre le divisible par 15 en premier sinon il entre dans la condition "Fizz"
        echo 'FizzBuzz, ';
    } else if ($i % 3 == 0) {
        echo 'Fizz, ';
    } else if ($i % 5 == 0) {
        echo 'Buzz, ';
    } else {
        echo $i . ', ';
    }
}

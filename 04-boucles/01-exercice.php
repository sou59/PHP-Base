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

echo "<h2>Ecrire une boucle qui affiche les nombres de 10 à 1</h2>";
for ($i = 10; $i > 0; $i--) {
    echo $i . ' - ';
}

echo "<h2>Ecrire une boucle qui affiche uniquement les nombres pairs entre 1 et 100</h2>";
for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo $i . ' - ';
    }
}

echo "3. Ecrire le code permettant de trouver le PGCD de 2 nombres";
$nombre1 = 845;
$nombre2 = 312;
$reste = null;
$resultat = null;

// Tant que le reste est strictement différent de 0
// nombrePlusGrand % nombrePlusPetit
// 845 % 312 = 221;
// 312 % 221 = 91;
// 221 % 91 = 39;
// 91 % 39 = 13;
// 39 % 13 = 0;

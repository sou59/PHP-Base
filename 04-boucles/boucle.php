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

echo "<p>Matthieu. Ecrire le code permettant de trouver le PGCD de 2 nombres</p>";
// Tant que le reste est strictement différent de 0
// nombrePlusGrand % nombrePlusPetit

echo "<p>1e possibilité :</p>";
function pdgc1($nombre1, $nombre2){
while ($nombre2 !== 0){
    $reste = $nombre1 % $nombre2;  
    $nombre1 = $nombre2;
    $nombre2 = $reste;
}
return $nombre1;
}
echo pdgc1( 12,21 );

echo "<p>2e possibilité :</p>";


function GCD($num1, $num2) {
    /* finds the greatest common factor between two numbers */
       while ($num2 != 0){
         $t = $num1 % $num2;
         $num1 = $num2;
         $num2 = $t;
       }
       return $num1;
    }
echo GCD( 12,21 );


echo "<p>3e possibilité :</p>";
function pgcd2($a,$b) {
    return ($a % $b) ? gcd($b,$a % $b) : $b;
}

echo pgcd2( 12,21 );


echo "<p>4e possibilité :</p>";
function pgcd($nombre,$nombre2){
    while($nombre>1){
         $reste = $nombre%$nombre2;
          if($reste == 0){
         break; // sorti quand resultat trouvé
         }
          $nombre=$nombre2;
         $nombre2=$reste;
     }
 return $nombre2; // retourne le resultat
 }
 
 echo pgcd( 120,420 );
 // Affiche 60


 echo "<h2>Coder le jeu du FizzBuzz</h2>";
 /*4. Coder le jeu du FizzBuzz
    Parcourir les nombres de 0 à 100
    Quand le nombre est un multiple de 3, afficher Fizz.
    Quand le nombre est un multiple de 5, afficher Buzz.
    Quand le nombre est un multiple de 15, afficher FizzBuzz.
    Sinon, afficher le nombre
*/

for ($i = 0; $i <= 100; $i++) {
    if ($i % 3 == 0) {
        echo ' Fizz <br \> ';
    }elseif ($i % 5 == 0) {
        echo ' Buzz <br \> ';
    }elseif ($i % 15 == 0) {
        echo ' FizzBuzz <br \> ';
    }else {
        echo $i . ' <br \> ';
    }
}

    // fizzbuzz

    for ($i = 0; $i <= 100; $i+=1){
        echo $i . "<br \>";
        if ($i % 3 ) {
            echo "Fizz" . "<br \>";
        }elseif ($i % 5) {
            echo "Buzz" . "<br \>";
        }elseif ($i % 15) {
            echo "FizzBuzz" . "<br \>";
        }else {
            echo $i . "<br \>";
        }
    }


?>

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
//Matthieu
$nombre1 = 845;
$nombre2 = 312;
$reste = null;
$resultat = null;
$pgcd = null;

// Le var_dump peut nous aider à comprendre le résultat d'une comparaison
var_dump(null !== 0);

echo 'Le PGCD de ' . $nombre1 . ' et ' . $nombre2 . ' est : ';

// Tant que le reste est strictement différent de 0
// nombrePlusGrand % nombrePlusPetit
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





echo "<p>1e possibilité :</p>";
function pdgc1($nombre1, $nombre2){
while ($nombre2 !== 0){
    $reste = $nombre1 % $nombre2;  
    $nombre1 = $nombre2;
    $nombre2 = $reste;
}
return $nombre1;
}
echo pdgc1( 10,3 );

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
 for ($i = 1; $i <= 100; $i+=1){
    if ($i % 15 == 0) { //Mettre le divisible en premier sinon il entre dans la condition "Fizz"
        echo "FizzBuzz" . ", >";
    }elseif ($i % 5 == 0) {
        echo "Buzz" . ", ";
    }elseif ($i % 3 == 0) {
        echo "Fizz" . ", ";
    }else {
        echo $i . ", ";
    }
}

echo "<h2>Coder une boucle de 10 *, 10 ligne, faire un triangle </h2>";

for ($y = 0; $y <= 10; $y++){
    for ($x = 0; $x < $y; $x++){
    echo '😍'; 
    }
    echo '<br \>'; 
}    

echo "<h2>Coder une boucle de 10 *, 10 ligne, faire un triangle TETE EN HAUT</h2>";

for ($y = 0; $y < 10; $y++){
    for ($x = 10; $x > $y; $x--){
    echo '😍'; 
    }
    echo '<br \>'; 
}   

echo "<h2>Triangle dynamique</h2>";
//nb impair / espace 10 ligne avec 11 colonne

$start = 5;
$size = 1;

for ($y = 0; $y < 6; $y++){
    
    for ($x = 0; $x < 11; $x++){
        if ($x == $start) {
            for ($i = 0; $i < $size; $i++){
               echo '⭐'; 
            }
             $x += $size - 1;
        }else {
            echo '&nbsp;'; 
        }
} 
$start--;
$size += 2;

echo '<br \>'; 
}    



echo "<h2>Table multiplication</h2>";


echo '<table border="1" style="border-collapse: collapse">';
    echo '<thead>';
        echo '<tr style="width: 30px; height: 30px">';
        echo '<th>x</th>';
            for ($head = 0; $head < 11; $head++) {
                echo '<th style="width: 30px; height: 30px">' . $head . '</th>';
                }
        echo '</tr></thead>';

        for ($ligne = 0; $ligne < 11; $ligne++) {
        echo '<tr>';
            echo '<td align="center" style="width: 30px; height: 30px">' . $ligne . '</td>';
        
            for ($colonne = 0; $colonne < 11; $colonne++) {
                echo '<td align="center" style="width: 30px; height: 30px">' . $ligne * $colonne . '</td>';
            }
        echo '</tr>';
    }
echo '</table>';


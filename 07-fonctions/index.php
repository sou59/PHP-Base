<?php

/*function hello($argument) {
    return 'hello' . $argument;
}
Pour créer une fonction en php
*/

// on peux avoir des valeurs d'arguments par défauts, dans l'appel les arguments ne sont plus obligatoire
function addition($arguments1 = 1, $arguments2 = 2){
   return $arguments1 + $arguments2; // pour la fonction pas d'écho l'appeler après
}
// echo addition(); 
// on appelle la fonction

//var_dump(addition(2,12));
echo addition() . '<br \>';
echo addition(2) . '<br \>';
echo addition(2, 12) . '<br \>';

echo 'Fonction carre----------------------------------<br \>';

function carre($x){
    //return $x * $x;
    return $x ** 2;
}
echo 'Carré de : ' . carre(7) . '<br \>';

echo 'Fonction  aire d\'un cercle----------------------<br \>';
//L'aire d'un cercle = rayon au carré multiplié par π (environ 3,14)
function aireCercle($radius){
    $pi = 3.14;
    return $radius * $radius * M_PI; // ou M_PI
}
echo 'Aire d\'un cercle  de 10 de rayon : ' . aireCercle(10) . '<br \>';

echo 'Fonction  d\'un rectangle----------------------<br \>';
    function rectangle($length, $width){
        return $length * $width;
    }

echo 'Aire d\'un rectangle  de 7 * 6  : ' . rectangle(7, 6) . '<br \>';   


echo 'Fonction  calcul TVA d\'un prix ((ht TTC, tx tva)2 arguments)----------------------<br \>';
// dans les deux sens ht -> TTC et de TTC --> HT

    function convertHtToTtc($price, $rate) {
        return $price * (1 + $rate / 100);
    }

echo convertHtToTtc(10, 20) . '<br \>';

// false : ttc vers ht
// true ht vers ttc

echo 'Fonction  calcul HT / TTC dans les deux sens 3 arguments : prix, taux, taxes = true----------------------<br \>';
function convert($price, $rate, $taxes = true) {
    if ($taxes){
        return $price * (1 + $rate / 100);
    }
    return $price / (1 + $rate / 100);
}

echo convert(10, 20) . '<br \>';

echo convert(12, 20, false) . '<br \>';


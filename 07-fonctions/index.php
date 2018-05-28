<?php

// .Pour créer une fonction en PHP
// .Les arguments ne sont accessibles que dans la fonction
// .Les arguments peuvent avoir une valeur par défaut et
// dans ce cas, ne sont plus obligatoires
function addition($cequonveut1 = 1, $argument2 = 2) {
    // echo 10 + 3;
    return $cequonveut1 + $argument2;
}
// var_dump(addition(2, 12) + addition(4, 7)); // On appelle une fonction
echo addition();
echo addition(2);
echo addition(2, 12);

echo 'Fonction carre----------------------------------<br \>';

function square($number) {
    // $number * $number;
    return $number ** 2;
}
echo square(5); // 25
echo '<br />';
echo square(10); // 100
echo '<br />';
echo square(7); // 49
echo '<br />';

echo 'Fonction  aire d\'un cercle----------------------<br \>';
//L'aire d'un cercle = rayon au carré multiplié par π (environ 3,14)
function circleArea($radius) {
    return $radius * $radius * M_PI;
}
echo circleArea(10); // 314.15
echo '<br />';

echo 'Fonction  d\'un rectangle----------------------<br \>';
function rectArea($length, $width) {
    return $length * $width;
}
echo rectArea(10, 5); // 50
echo '<br />';


echo 'Fonction  calcul TVA d\'un prix ((ht TTC, tx tva)2 arguments)----------------------<br \>';
// dans les deux sens ht -> TTC et de TTC --> HT

function convertHtToTtc($price, $rate) {
    return $price * (1 + $rate / 100);
}
echo convertHtToTtc(10, 20);
echo '<br />';

echo 'Fonction  calcul HT / TTC dans les deux sens 3 arguments : prix, taux, taxes = true----------------------<br \>';
// False : TTC vers HT
// True : HT vers TTC
function convert($price, $rate, $taxes = true) {
    if ($taxes) {
        return $price * (1 + $rate / 100); // La fonction s'arrête au return
    }
    return $price / (1 + $rate / 100);
}
echo convert(10, 20);
echo '<br />';
echo convert(12, 20, false);
echo '<br />';
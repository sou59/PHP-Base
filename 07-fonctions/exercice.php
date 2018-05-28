<?php

// 1. Créer une fonction calculant le carré d'un nombre

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

// 2. Créer une fonction calculant l'aire d'un rectangle et une fonction pour celle d'un cercle

function rectArea($length, $width) {
    return $length * $width;
}

echo rectArea(10, 5); // 50
echo '<br />';

function circleArea($radius) {
    return $radius * $radius * M_PI;
}

echo circleArea(10); // 314.15
echo '<br />';

// 3. Créer une fonction calculant le prix TTC d'un prix HT. Nous aurons besoin de 2 paramètres, le prix HT et le taux.

function convertHtToTtc($price, $rate) {
    return $price * (1 + $rate / 100);
}

echo convertHtToTtc(10, 20);
echo '<br />';

// 4. Ajouter un 3ème paramètre à cette fonction permettant de l'utiliser dans les 2 sens (HT vers TTC ou TTC vers HT)

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


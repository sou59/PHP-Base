<?php

// Fonctions utiles en PHP

/*
Retourne true si la variable est définie et différente de null.
*/
$a = null;
var_dump(isset($a));
if (isset($a)) {
    echo $a;
}


/*
Renvoie le timestamp actuelle (Nombre de secondes depuis 1970)
*/
$t = time();
var_dump($t);

// On peut afficher la date formatée
echo date('d/m/Y');
echo '<br />';

echo date('c'); // Affiche la date au format ISO 8601 2018-05-24T16:37:51+02:00
echo '<br />';

// Date de notre anniversaire
$t = strtotime('18 november 1991');
echo date('l d/m/Y', $t);
echo '<br />';

// Formater correctement une date
echo date('l d F Y, \i\l \e\s\t H\hi \e\t s \s\e\c\o\n\d\e\s');
echo '<br />';

echo date('l d F Y') . ', il est ' . date('H\hi \e\t s') . ' secondes';
echo '<br />';

// Trouver la date qu'il sera dans 10 jours par rapport à aujourd'hui
echo 'Dans 10 jours, nous serons le ' . date('d / m / Y', strtotime('+10 days'));

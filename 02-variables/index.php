<!-- Pour afficher plus d'un espace en HTML -->
<h1>toto &nbsp;&nbsp;&nbsp;toto</h1>

<?php

$maVariable = 'Ma variable ';
$monAge = 26;
$c = 10;
$monAge = 12;
$d = $monAge + $c; // 26 + 10 (36)

// L'opérateur de concaténation en PHP est le .
echo $maVariable . " " . $d . "<br />"; // "Ma variable  22"

echo 'a' . 'b' . "<br />"; // Affiche ab

echo 1 . 1 . "<br />"; // Affiche 11
echo 1 + 1 . "<br />"; // Affiche 2

// Interpolation de variables possible grâce aux double quotes
echo "$maVariable $d <br />";

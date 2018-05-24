<?php

/*
1. Créer une boucle qui affiche 10 étoiles (*)
2. Imbriquer la boucle dans une autre boucle afin d'afficher 10 lignes de 10 étoiles
3. Nous obtenons un carré. Trouver un moyen de modifier le code pour obtenir un triangle rectangle.
*/

for ($y = 0; $y < 10; $y++) { // Affiche chaque ligne
    for ($x = 0; $x <= $y; $x++) { // Affiche chaque colonne
        echo '⭐';
    }
    echo '<br />';
}

echo '<br /><br /> ------------------------------------ <br /><br />';
/*
☆☆☆☆☆★☆☆☆☆☆
☆☆☆☆★★★☆☆☆☆
☆☆☆★★★★★☆☆☆
☆☆★★★★★★★☆☆
☆★★★★★★★★★☆
★★★★★★★★★★★
*/
$start = 5;
$size = 1; // Le nombre d'étoile pleine à afficher

for ($y = 0; $y < 6; $y++) {
    for ($x = 0; $x < 11; $x++) {
        if ($x == $start) { // On met une étoile pleine à une position spécifique
            for ($a = 0; $a < $size; $a++) {
                echo '★';
            }
            $x += $size - 1; // Pour éviter que les étoiles débordent du cadre
        } else {
            echo '☆';
        }
    }
    $start--; // On décrémente la variable à la fin de chaque ligne d'étoiles
    $size += 2; // On augmente le nombre d'étoiles pleine à afficher entre chaque ligne
    echo '<br />';
}

echo '<br /><br /> ------------------------------------ <br /><br />';
/*
Table de multiplication
*/
echo '<table border="1" style="border-collapse: collapse">';
echo '<thead><tr>';
echo '<th style="width: 30px; height: 30px">x</th>';
for ($head = 0; $head < 11; $head++) {
    echo '<th style="width: 30px; height: 30px">' . $head . '</th>';
}
echo '</tr></thead>';
for ($ligne = 0; $ligne < 11; $ligne++) {
    echo '<tr>';
        echo '<td align="center" style="width: 30px; height: 30px"><strong>' . $ligne . '</strong></td>';
        for ($colonne = 0; $colonne < 11; $colonne++) {
            echo '<td align="center" style="width: 30px; height: 30px">' . $ligne * $colonne . '</td>';
        }
    echo '</tr>';
}
echo '</table>';

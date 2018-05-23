<?php

$nombre1 = 15;
$nombre2 = 5;
$nombre3 = 8;

$resultat1 = $nombre1 + $nombre2 + $nombre3; // 15 + 5 + 8
$resultat2 = $nombre1 * ($nombre2 - $nombre3);
if ($nombre1 > 0) { // On vérifie que le nombre1 est supérieur à 0 pour la division
    $resultat3 = ($nombre3 - $nombre2) / $nombre1;
} else {
    // die('Bonjour'); // Arrête le script PHP
    $resultat3 = 'Division par 0 impossible';
}

echo $nombre1 . ' + ' . $nombre2 . ' + ' . $nombre3 . ' = ' . $resultat1 . ' <br />';
echo $nombre1 . ' x (' . $nombre2 . ' - ' . $nombre3 . ') = ' . $resultat2 . ' <br />';
echo '(' . $nombre3 . ' - ' . $nombre2 . ') / ' . $nombre1 . ' = ' . $resultat3 .'<br />';
echo "($nombre3 - $nombre2) / $nombre1 = $resultat3 <br />";

if ($resultat1 < 20 || $resultat2 < 20 || $resultat3 < 20) {
    echo 'Une des opérations renvoie moins de 20';
}

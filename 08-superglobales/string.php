<?php

echo "--------------------------------<br \>";
echo "Fonction sur les chaînes <br \>";

// Affiche 'Un nombre 10 et une chaine toto'.
echo sprintf('Un nombre %d et une chaine %s.', 10, 'toto');

echo "--------------------------------<br \>";

$name = 'Nathan';
$age = 15;
echo 'Hello ' . $name . ', tus as ' . $age .  ' age.';

echo "--------------------------------<br \>";

echo sprintf('Un nombre %d et une chaine %s.', $name, $age);

echo "--------------------------------<br \>";


echo "Acronyme : Créer une fonction qui prend en argument une chaine (World of Warcraft) et qui retourne les initiales de chaque mot en majuscule (WOW).<br \>";
$message = 'World of Warcraft';
echo strtolower($message) . "<br \>"; 
echo strtoupper($message) . "<br \>"; 
$messageMaj = strtoupper($message);

echo "--------------------------------<br \>";

$w =  substr($messageMaj, 0, 1) . "<br \>";
$o =  substr($messageMaj, -11, -10) . "<br \>";
$w2 = substr($messageMaj, -8, -7) . "<br \>";

echo "$w $o $w2";

echo "--------------------------------<br \>";

echo "Conjugaison : Créer une fonction qui permet de conjuguer un verbe (chercher par exemple). Cela doit renvoyer toutes les conjugaisons au présent.<br \>";



 /* avec le mot chercher
 remplacer les deux dernières lettres par :  
    e pour je et pour il, 
    es pour tu,
    ons pour nous,
    ez pour vous,
    et ent pour ils

*/
   

    if ($sujet = 'Je' || $sujet = 'Il'){
        echo $verbe . str_replace($conjugaison, 'e', $verbe);
    } elseif ($sujet = 'Tu') {
        echo $verbe . str_replace($conjugaison, 'es', $verbe);
    
    } elseif ($sujet = 'Nous'){
        echo $verbe . str_replace($conjugaison, 'ons', $verbe);
    
    } elseif ($sujet = 'Vous'){
        echo $verbe .  str_replace($conjugaison, 'ez', $verbe);
    
    }else {
        echo $verbe .  str_replace($conjugaison, 'ent', $verbe);
    
    }
    
}
echo verbeChercher('chercher');


echo "CORRECTION---------------------------<br \>";

function acronym($sentence) {
    $words = explode(' ', $sentence);
    $acronym = '';
    var_dump($words);

    foreach ($words as $word) {
        $firstletter = substr(word, 0, 1);
        $firstletter = $word[0];
        $acronym .= $firstletter;


    }
    return strtoupper($acronym);
}
echo acronym("World of Warcraft");

echo acronym("PHP le monde en marche");




function conjugate($verbe) {
    $ending = substr($verbe, -2); // terminaison
    $root = substr($verbe, 0, -2); // racine

    $sujet = [
        'je' => 'e', 
        'tu' => 'es',
        'il' => 'e',
        'vous' => 'ez',
        'nous' => 'ons',
        'ils' => 'ent'
    ];

    $conjugaison = substr($verbe, -2);
    var_dump($conjugaison);

    foreach ($sujet as $item) {
        echo $item . '<br \>';
        


    }

var_dump($item);


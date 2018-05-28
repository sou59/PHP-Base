<?php

/*
Acronyme : Créer une fonction qui prend en argument une chaine (World of Warcraft) et qui retourne les initiales de chaque mot en majuscule (WOW).
*/

function acronym($sentence) {
    $words = explode(' ', $sentence); // On découpe la phrase en mots
    $acronym = ''; // Variable qui contiendra l'acronyme

    foreach ($words as $word) { // On parcourt tous les mots dans le tableau
        $firstLetter = substr($word, 0, 1); // On récupére la première lettre du mot
        // Une chaine en PHP est aussi un tableau
        $firstLetter = $word[0]; // Alternative pour prendre la première lettre
        $acronym .= $firstLetter; // On incrémente l'acronyme avec la lettre
    }

    return strtoupper($acronym);
}

echo acronym('World of Warcraft').'<br />'; // WOW
echo acronym('PHP: Hypertext Preprocessor').'<br />'; // PHP

/*
Conjugaison : Créer une fonction qui permet de conjuguer un verbe (chercher par exemple). Cela doit renvoyer toutes les conjugaisons au présent.
*/

function conjugate($verb) {
    $root = substr($verb, 0, -2); // Racine
    $ending = substr($verb, -2); // Terminaison infinitif

    $subjects = [
        'Je' => 'e',
        'Tu' => 'es',
        'Il / Elle / On' => 'e',
        'Nous' => 'ons',
        'Vous' => 'ez',
        'Ils / Elles' => 'ent'
    ];

    foreach ($subjects as $subject => $ending) {
        echo $subject . ' ' . $root . $ending . '<br />';
    }
}

conjugate('chercher');

<?php

// phpinfo(); // Permet d'avoir des infos sur le PHP du serveur

$people = [
    'Jean',
    'Eric',
    'Jeanne',
    'John',
    'Quelqu\'un'
];

echo $people; // Ne fonctionne pas
echo '<br />';

echo '<pre>';
print_r($people); // C'est mieux pour faire du debug
echo '</pre>';

var_dump($people); // Debug du tableau

echo $people[1]; // Affiche Eric
echo '<br /> ----------- FOREACH ------------ <br />';

// Afficher tous les prénoms du tableau
foreach ($people as $index => $person) {
    echo $index . ' : ' . $person . '<br />';
}

echo '----------- FIN DU FOREACH ------------ <br />';
// Si un index est déclaré, les éléments suivants vont être auto incrémentés par rapport à cet index
$people = [
    'Jean',
    3 => 'Eric',
    'Jeanne'
];

var_dump($people); 

// Stocker des contacts dans ce tableau avec les index nom (string), prénom (string), age (int), telephones (array => portable (string) et fixe (string)). Il peut y avoir plusieurs contacts.
$people = [
    [
        'nom'        => 'Mota',
        'prenom'     => 'Matthieu',
        'age'        => 26,
        'telephones' => [
            'portable' => '06.00.00.00.00',
            'fix'      => '(+33) 03 21 00 00 00'
        ],
    ],
    [
        'nom'        => 'Toto',
        'prenom'     => 'Jean',
        'age'        => 36,
        'telephones' => [
            'portable' => '07.00.00.00.00',
            'fix'      => '(+33) 03 20 00 00 00'
        ]
    ]
];

var_dump($people);
/*
 Ecrire la boucle foreach qui affiche le texte ci dessous :
 Matthieu a 26 ans et est joignable au 06.00.00.00.00, (+33) 03 21 00 00 00
 Jean a 36 ans et est joignable au 07.00.00.00.00, (+33) 03 20 00 00 00
 */
foreach ($people as $person) {
    echo $person['prenom'] . ' a ' . $person['age'] . ' ans et est joignable au ';
    echo $person['telephones']['portable'] . ', ' . $person['telephones']['fix'] . '<br />';
    // On peut aussi parcourir tous les téléphones avec un foreach
    foreach ($person['telephones'] as $type => $phone) {
        echo $type .' : '. $phone .', ';
    }
    echo '<br />';
}

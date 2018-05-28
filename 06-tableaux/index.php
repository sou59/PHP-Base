<?php

$people = [
    'Jean', 
    'Eric', 
    'Jeanne',
    'John',
    'Quelqu`un'
];

echo $people; // Ne fonctionne pas, on ne pas afficher une tableau directement
echo '<b \>';

echo '<pre>';
print_r($people); // c'est mieux pour faire un debug
echo '<pre>';


var_dump($people); // Débug du tableau

echo $people[1]; // reponse Eric

echo "<p>Taleaux simple FOREACH</p>";
// affiche tous les noms du tableaux

foreach($people as $index => $person) {
    echo $index . ' : ' . $person . '<br \>';
}

// si un index est déclarée les éléments suivants vont être autoincrémenter à l'index suivant
$people = [
    'Jean', 
    3 =>'Eric', 
    'Jeanne'
];

var_dump($people);

//Eric sera à l'index 3 et du coup jeanne index 4

echo "<p>Taleaux</p>";

// 
$people = [
    [
        'nom' => 'Motta' ,
        'prenom' => 'Matthieu',
        'age' => 10,
        'telephone' => [
            'portable' => '06.02.03.05',
            'fixe' => '03.20.30.25'
        ],
    ],
    [
        'nom' => 'Marcel' ,
        'prenom' => 'Bertrand',
        'age' => 25,
        'telephone' => [
            'portable' => '06.02.03.05',
            'fixe' => '03.20.30.25'
        ]
    ]

];
var_dump($people);

foreach($people as $person) {
    echo $person['prenom'] . ' a ' . $person['age'] . ' ans et est joingnable au ';
    echo $person['telephone']['portable'] . ', ' . $person['telephone']['fixe'] . '<br \>';
     
     foreach($person['telephone'] as $type => $phone) {
        echo $type . ' - ' . $phone . ', ';
    }
}   echo '<br \>';


echo '<p> EXERCICE tableau élève<p>';

$eleve = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 20, 17, 16, 15, 2] 
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7] 
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 18, 9] 
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 2, 1, 8, 9] 
    ],
];

echo '<p> afficher la liste des élèves avec leur notes : <p>';

foreach($eleve as $person) { // première boucle avec tableau elèves
    echo $person['nom'] . ' a eu ';
    foreach ($person['notes'] as $key => $note){ // boucle interieur reprendre person
        echo $note;
        // si la note est en avant dernière position
        if ($key == count($person['notes']) - 2){
            echo ', ';
        // si la note est en dernière position on n'affiche rien
        }else if ($key == count($person['notes']) - 1){
        echo '';
        }else {
            echo '.';
        }
    }
    echo "<br \>";
}

echo '<p> Calculer la moyenne de Jean : $eleve[2][notes] : <p>';

$notesDeJean = $eleve[2]['notes'];
$totalNotes = 0;

foreach ($notesDeJean as $notes){
    $totalNotes += $note;
}

// $somme = array_sum($eleve[2]['notes']);
// echo "<br \>";
// $taille = count($eleve[2]['notes']);
// echo "<br \>";

// echo "La moyenne de Jean est de : " . $somme / $taille;
// echo "<br \>";

$moyenne = $totalNotes / count($notesDeJean);
$moyenne = round($moyenne, 2);
var_dump($totalNotes);
var_dump($moyenne);
echo 'La moyenne de Jean est de ' . $moyenne . ' /20<br \>';

echo "<p> Combien d\'élèves ont la moyenne : <p>";

$countAverage = 0;
echo 'Mathieu  la moyenne de : ';
foreach($eleve as $eleves) { // première boucle avec tableau elèves
    $moyenne = array_sum($eleves['notes']) / count($eleves['notes']);
    $moyenne = round($moyenne, 2);
    if ($moyenne >= 10) {
        $countAverage++;
        echo $eleves['nom'] . ' a la moyenne<br />';
    }else {
        echo $eleves['nom'] . ' n\'a pas la moyenne<br />';
    }
}

echo "Nombre d\'élèves avec la moyenne : " . $countAverage . '<br />';

echo '<p> Elève avec la meilleure note <p>';
$noteMax = 0;
foreach($eleve as $eleves) {
    foreach ($eleves['notes'] as $note) {
        if ($note > $noteMax) {
            $noteMax = $note;
        }
    }
} 
var_dump($noteMax);
foreach($eleve as $eleves) {
    foreach ($eleves['notes'] as $note) {
        if ($note === $noteMax) {
            echo $eleves['nom'] . ' a la meilleur note : ' . $noteMax . '<br />';
            break;
        }
    }
}

echo "<p>Qui a eu au moins un 20 :  <p>";
 $notesToCheck = 20;
 $notesIsCheck = true;
 foreach($eleve as $eleves) {
    foreach ($eleves['notes'] as $note20) {
        if ($note20 === $notesToCheck) {
            $notesIsCheck = true;
           // break; // arrête le foreach
            break 2; // arrête le foreach
        }
    }
    var_dump($eleve);
}
if ($notesIsCheck){
    echo 'Quelqu\'un a eu 20';
}else {
    echo 'Personne n\'a eu 20';
}


echo "<p>TRIE à Bulle <p>";
$notes = [4, 25, 1, 36, 24];
//pas de foreach car pas besoin de refaire le tour complet à chaque fois
// dès qu'il y a un échange i revient à zéro et recommence
$i = 0;
$count = count($notes) - 1;
var_dump($notes);
while ($i < $count) { // on parcours tout le tableau;
    if ($notes[$i] > $notes[$i + 1]) {// si la valeur suivante et supérieur à la valeur actuelle
        $tmp = $notes[$i]; // on stocke le 4
        $notes[$i] = $notes[$i + 1]; // on remplce 25 par 4
        $notes[$i + 1] = $tmp; // on met le 4 à la place de 25
        $i = 0;  // si il y a un échange on remet $i à zero
    }else {
        $i++; // on incrémente le compteur seulement s'il n'y a pas d'échange
    }
}
var_dump($notes);


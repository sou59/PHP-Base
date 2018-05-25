<?php

$eleves = [
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
        'notes' => [20, 14, 6, 20, 1, 8, 9]
    ]
];

/* 1/ Afficher la liste de tous les éléves avec leurs notes. */
echo '<ul>';
foreach ($eleves as $eleve) {
    echo '<li>' . $eleve['nom'] . '</li>';
    echo '<li>';
    foreach ($eleve['notes'] as $key => $note) {
        echo $note;
        // Si la note est en avant dernière, on affiche un "et"
        if ($key == count($eleve['notes']) - 2) {
            echo ' et ';
        // Si la note est en dernière, on affiche rien
        } else if ($key == count($eleve['notes']) - 1) {
            echo '';
        } else {
            echo ', ';
        }
    }
    echo '</li>';
}
echo '</ul>';

/* 2/ Calculer la moyenne de Jean. On part de $eleves[2]['notes']
La fonction count permet de compter les éléments d'un tableau */
$notesDeJean = $eleves[2]['notes'];

$totalNotes = 0;
foreach ($notesDeJean as $note) {
    $totalNotes += $note;
}
// $totalNotes = array_sum($notesDeJean);
$moyenne = $totalNotes / count($notesDeJean);
$moyenne = round($moyenne, 2);
var_dump($totalNotes);
var_dump($moyenne);
echo 'La moyenne de Jean est de ' . $moyenne . ' / 20<br /><br />';

/* 3/ Combien d'élèves ont la moyenne ?
Exemple :
Matthieu a la moyenne
Jean n'a pas la moyenne
Thomas a la moyenne
Nombre d'éléves avec la moyenne : 2 */
$countAverage = 0;
foreach ($eleves as $eleve) {
    $moyenne = array_sum($eleve['notes']) / count($eleve['notes']);
    $moyenne = round($moyenne, 2);
    if ($moyenne >= 10) {
        $countAverage++; // Permet de compter le nombre d'élèves ayant la moyenne
        echo $eleve['nom'] .' a la moyenne<br />';
    } else {
        echo $eleve['nom'] .' n\'a pas la moyenne<br />';
    }
}

echo 'Nombre d\'éléves avec la moyenne : ' . $countAverage . '<br />';

/* 4/ Quel(s) éléve(s) a(ont) la meilleure note ?
Exemple: Thomas a la meilleure note : 19 */
$noteMax = 0;
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if ($note > $noteMax) {
            $noteMax = $note;
        }
    }
}
var_dump($noteMax);
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        // Si l'élève a dans sa liste de notes, la meilleure note
        if ($note === $noteMax) {
            echo $eleve['nom'] . ' a la meilleure note : ' . $noteMax . '<br />';
            break; // Arrête la boucle quand l'élève a au moins une fois la meilleure note
        }
    }
} 

/* 5/ Qui a eu au moins un 20 ?
Exemple: Personne n'a eu 20
         Quelqu'un a eu 20 */

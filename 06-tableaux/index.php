<?php

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

echo "<p> Combien d\'élèves ont la moyenne : <p>";

Exemple :
Matthieu a la moyenne
Jean n'a pas la moyenne
Thomas a la moyenne
Nombre d'éléves avec la moyenne : 2 */
$countAverage = 0;
foreach ($eleves as $eleve) { //première boucle
    $moyenne = array_sum($eleve['notes']) / count($eleve['notes']);
    $moyenne = round($moyenne, 2);
    if ($moyenne >= 10) {
        $countAverage++; // Permet de compter le nombre d'élèves ayant la moyenne
        echo $eleve['nom'] .' a la moyenne<br />';
    } else {
        echo $eleve['nom'] .' n\'a pas la moyenne<br />';
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
        // Si l'élève a dans sa liste de notes, la meilleure note
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
    var_dump($eleve); // Ne s'affiche pas avec le break 2
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


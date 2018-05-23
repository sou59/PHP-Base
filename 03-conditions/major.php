<?php

$age = 17;

if ($age >= 18) {
    echo 'Vous pouvez entrez';
} else if ($age >= 16 && $age < 18) {
    echo 'Vous êtes presque majeur';
} else if ($age >= 14 && $age < 16) {
    echo 'Vous êtes jeune';
} else if ($age < 14) {
    echo 'Vous êtes trop jeune';
} else {
    echo 'Interdit';
}





// BONUS
echo $age >= 18 ? 'Vous pouvez entrez' : ($age >= 16) ? 'Vous êtes presque majeur' : (($age >= 14) ? 'Vous êtes jeune' : 'Vous êtes trop jeune');
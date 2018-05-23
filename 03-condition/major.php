<?php

    $age = 26;
    if ($age >= 18) {
        echo "Vous pouvez entrer";
    } elseif ($age > 16 && $age < 18){
        echo "Vous êtes presque majeur";
    } elseif ($age >= 14 && $age < 16){
        echo "Vous êtes jeune";
    } elseif ($age < 14){
        echo "Vous êtes trop jeune";
    } else {
        echo "Interdit";
    }
?>
<?php/*
//BONUS
echo $age >= 18 ? $age > 16 && $age < 18) ? "Vous êtes presque majeur" : $age >= 14 && $age < 16 ? "Vous êtes jeune" : $age < 14 ?  "Vous êtes trop jeune" : "Interdit"
?> -->




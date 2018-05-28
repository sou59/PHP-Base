<?php

// .Pour créer une fonction en PHP
// .Les arguments ne sont accessibles que dans la fonction
// .Les arguments peuvent avoir une valeur par défaut et
// dans ce cas, ne sont plus obligatoires
function addition($cequonveut1 = 1, $argument2 = 2) {
    // echo 10 + 3;
    return $cequonveut1 + $argument2;
}

// var_dump(addition(2, 12) + addition(4, 7)); // On appelle une fonction

echo addition();
echo addition(2);
echo addition(2, 12);

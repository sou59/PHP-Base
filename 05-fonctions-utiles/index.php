<?php

/* fonction isset : isset php sur google : http://php.net/manual/fr/function.isset.php
empty
unset
*/ 
$t = time(); // nb de seconde depuis 1 janvier 1970

//date actuelle
echo date('d / m / Y');

echo "<p> Date</p>";
echo date('c'); // norme iso 8601 : 2018-05-24...

echo "<p> Date Anniv</p>";

$t = strtotime('13 mars 1969');
echo "<br \>";
echo date('l d / m / Y', $t);


echo "<p> Date du jour</p>";

$now = strtotime('Wednesday 24 may 2018');

echo date('l d  F  y', $now);

echo "<p> Date 10 jours</p>";
// le jour qu'il sera dans 10 jours
// 10 jours = 

$nextWeek = time() + (10 * 24 * 60 * 60);
                   // 10 days; 24 hours; 60 mins; 60 secs
echo 'Now:       '. date('Y-m-d') ."<br \>";
echo 'Next Week: '. date('Y-m-d', $nextWeek) ."<br \>";



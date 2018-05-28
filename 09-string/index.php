<?php

$name = 'Nathan';
$age = 15;
echo 'Hello ' . $name . ', tu as ' . $age .' ans <br />'; // Affiche "Hello Nathan, tu as 15 ans"

echo sprintf('Hello %s, tu as %d ans', $name, $age); // Affiche "Hello Nathan, tu as 15 ans"

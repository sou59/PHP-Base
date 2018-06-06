<?php
// on veut utiliser les sessions de la page
session_start(); 

var_dump($_SESSION);

$countries = ['fr', 'it'];

// ajoute le pays dans la session
$_SESSION['countries'] = $countries;

var_dump($_SESSION);


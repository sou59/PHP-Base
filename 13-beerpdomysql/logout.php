<?php
session_start();

// supprimer la session de user
// attention session_detroy(); supprime toute la session même le panier ou les préférences de session
// ici on ne veut supprimer que la session log

// Il vaut mieux seulement détruire l'utilisateur
if(isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

// supprime le cookie si il existe
if(isset($_COOKIE['id'])) {
    unset($_COOKIE['id']);
    setcookie('id', '', time() - 3600);
    unset($_COOKIE['token']);
    setcookie('token', '', time() - 3600);
}

// rediriger vers l'index.php

header('Location: index.php');
exit();

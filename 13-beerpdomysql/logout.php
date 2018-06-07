<?php
session_start();

// Supprimer la session
// session_destroy(); // Détruit toute la session
// Il vaut mieux seulement détruire l'utilisateur
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

// Rediriger vers l'accueil
header('Location: index.php');
exit();

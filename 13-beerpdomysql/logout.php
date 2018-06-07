<?php
session_start();

// supprimer la session de user
// attention session_detroy(); supprime tout même le panier ou les préférences de session
// ici on ne veut supprimer que la session log

if(isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}


// rediriger vers l'index.php

header('Location: index.php');
exit();

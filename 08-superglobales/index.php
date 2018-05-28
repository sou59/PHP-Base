<?php

// Les superglobales
// On peut accèder aux données dans l'url grâce à $_GET
var_dump($_GET);

if (isset($_GET['id'])) { // Vérifie que id soit bien présent dans l'URL
    $id = $_GET['id']; // On peut récupérer un id dans l'URL
    if ($id == 5) {
        echo 'Utilisateur 5';
    }
}

// 1. Récupérer le paramètre name dans l'url (index.php?name=titi)
// 2. et l'afficher sur la page -> 'Hello titi'
?>
<ul>
    <li><a href="index.php?name=toto">Toto</a></li>
    <li><a href="index.php?name=titi">Titi</a></li>
    <li><a href="index.php?name=tata">Tata</a></li>
</ul>
<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo 'Hello ' . $name;
}

// On a également accès à $_POST
var_dump($_POST);
?>
<form method="POST">
    <label for="age">Votre âge</label>
    <input type="text" id="age" name="age" placeholder="Saisir votre âge" />

    <button>Envoyer</button>
</form>

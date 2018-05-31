<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php');

// Récupérer l'id de la bière dans l'URL
$id = $_GET['id'];
// $id = intval($_GET['id']);
// Récupérer les informations de la bière
// Risque d'Injection SQL
// $query = $db->query('SELECT * FROM beer WHERE id = '.$id);
// Peut être dangereux si on cherche une chaine
// $query = $db->query('SELECT * FROM beer WHERE `name` = "'.$id.'"');
// SELECT * FROM beer WHERE `name` = "chaussure";

// Une requête préparée permet de se prémunir des injections SQL
$query = $db->prepare('SELECT * FROM beer WHERE id = :id'); // :id est un paramètre
$query->bindValue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
$query->execute(); // Execute la requête
$beer = $query->fetch();
?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1><?php echo $id . ' : ' . $beer['name']; ?></h1>
</div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');

<?php
// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php');

// La fonction permet de vérifier si une brasserie existe ou non en BDD (true ou false)
function breweryExists($id) {
    global $db;  // Permet d'utiliser la variable $db définie en dehors de la fonction
    $query = $db->prepare('SELECT * FROM brewery WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $brewery = $query->fetch();
    
    return $brewery; // La fonction retourne un tableau avec la brasserie ou false si la brasserie n'existe pas
}

// Est-ce qu'un ID existe dans l'url ?
if (empty($_GET['id']) || !breweryExists($_GET['id'])) {
    // Permet de renvoyer une 404 si la brasserie n'existe pas
    header('HTTP/1.0 404 Not Found');
    // La 404 personnalisée
    echo '<div class="container"><h1>404</h1></div>';
    require('partials/footer.php');
    exit; // On arrête le script PHP ici car la page 404 est terminée
} ?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>Nom de la brasserie</h1>
    <ul class="list-unstyled">
        <li><strong>Adresse :</strong> </li>
        <li><strong>Ville :</strong> </li>
        <li><strong>Code postal :</strong> </li>
        <li><strong>Pays :</strong> </li>
    </ul>
</div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');

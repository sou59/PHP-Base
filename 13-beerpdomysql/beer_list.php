<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php');

// Récupérer la liste des bières
// Requête
$query = $db->query('SELECT * FROM beer');
// Résultat
$beers = $query->fetchAll();
?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>La liste des bières</h1>
    <div class="row pt-4">
        <?php
        // On affiche la liste des bières
        foreach ($beers as $beer) {
            echo '<div class="col-md-3">';
                echo '<div class="card mb-4 box-shadow">';
                    echo '<img class="beer-img d-block card-img-top" src="'.$beer['image'].'" />';
                    echo '<div class="card-body">';
                        echo '<p class="text-center font-weight-bold">';
                            echo $beer['name'];
                        echo '</p>';
                        // Ajouter un bouton (a href) "Voir la bière"
                        // Quand on clique sur le bouton, on doit se rendre sur la page beer_single.php
                        // Créer la page beer_single.php
                        // Il faudrait que l'URL ressemble à beer_single.php?id=IDDELABIERE
                        echo '<a href="beer_single.php?id='.$beer['id'].'" class="btn btn-primary btn-block">Voir la bière</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        } ?>
    </div>
</div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');

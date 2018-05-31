<?php 
require(__DIR__.'/partials/header.php');

// Récupérer la liste des bières
// Requête
$query = $db->query('SELECT * FROM beer');
// Résultat
$beers = $query->fetchAll();
?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>La liste des bières</h1>
    <div class="row">
        <?php
        // On affiche la liste des bières
        foreach ($beers as $beer) {
            echo '<div class="col-md-3">';
                echo '<div class="card mb-4">';
                    echo '<img class="beer-img d-block m-auto card-img-top" src="'.$beer['image'].'" />';
                    echo '<div class="card-body">';
                        echo $beer['name'];
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
require(__DIR__.'/partials/footer.php');
?>

<?php 
require(__DIR__.'/partials/header.php');

// Récupérer la liste des bières
// Requête
 // SELECT * FROM beer INNER JOIN brand ON beer.brand_id = brand.id INNER JOIN ebc ON beer.ebc_id = ebc.id
//$query = $db->query('SELECT * FROM beer');

// creer des alias

$query = $db->query('SELECT beer.id, beer.name, beer.image, brand.id as id_brand, brand.name as name_brand, ebc.code, ebc.color 
    FROM beer 
    INNER JOIN brand ON beer.brand_id = brand.id
    INNER JOIN ebc ON beer.ebc_id = ebc.id');

// Résultat
$beers = $query->fetchAll();
//var_dump($beers);

//$brand = $beers.brand_id
//$ebc
//$countSQL++;
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
                            echo 'Nom : ' . $beer['name'];
                        echo '</p>';
                        echo '<p class="text-center font-weight-bold">';
                            echo 'Marque : ' . $beer['name_brand'];
                        echo '</p>';
                        echo '<p class="text-center font-weight-bold" style="background-color: #' . $beer["color"] . '">';
                            echo 'Couleur : ' . $beer['color'];
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
require(__DIR__.'/partials/footer.php');
?>

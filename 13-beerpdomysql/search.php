<?php 
// s'il n'y a pas de rechecheou que la recherche est vide
if(!isset($_GET['search']) || empty($_GET['search'])){
    header('Location: beer_list.php');
    exit();
}

require(__DIR__.'/partials/header.php');
?>

<?php

    // $q = null;
    // $beers = null;

    $q = $_GET['search'];
    //:q après LIKE attention lui donner une valeur dans bindValue
    $query = $db->prepare("SELECT * FROM beer WHERE `name` LIKE :q"); 
    //var_dump($q);
    // on récupère :q on lui attribue la valeur *q* = n'importe quel caractère avant et/ou après
    $query->bindValue(':q', "%".$q."%", PDO::PARAM_STR); 
    $query->execute(); // Execute la requête
    $beers = $query->fetchAll();
        
    //var_dump($beers);
?>

<div class="container pt-5">
    <h1>Résultat de votre recherche pour : <?php echo $q ?></h1>
     <!-- echo sprintf("<h1>Résultat de votre recherche pour : %s </h1>", $query) -->
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
                            echo '<a href="beer_single.php?id='.$beer['id'].'" class="btn btn-primary btn-block">Voir la bière</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            } 

    ?>
    </div>
</div>






<?php 
// inclure le fichier s'occupant des logs
require(__DIR__.'/utils/logs.php');


require(__DIR__.'/partials/footer.php');
?>


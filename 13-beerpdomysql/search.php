<?php 
require(__DIR__.'/partials/header.php');
?>

<?php

    $q = null;
    $beers = null;

    if(isset($_GET['search'])){
        $q = $_GET['search'];
        //:q après LIKE attention lui donner une valeur dans bindValue
        $query = $db->prepare("SELECT * FROM beer WHERE `name` LIKE :q"); 
        //var_dump($q);
        // on récupère :q on lui attribue la valeur *q* = n'importe quel caractère avant ou après
        $query->bindValue(':q', "%".$q."%", PDO::PARAM_STR); 
        $query->execute(); // Execute la requête
        $beers = $query->fetchAll();
        
        //var_dump($beers);
    }
?>

<div class="container pt-5">
    <h1>Résultat de votre recherche pour : <?php echo $q ?></h1>
    <div class="row pt-4">
        <?php
       // On affiche la liste des bières
       if (!empty($q)) {
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
        } else {
            echo "Le nom n\'est pas valide";
        }

    ?>
    </div>
</div>






<?php 
require(__DIR__.'/partials/footer.php');
?>


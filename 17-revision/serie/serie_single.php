<?php 
require(__DIR__.'/partials/header.php');


    
    $serie = serieExists($_GET['id']);
    // si l
    if(empty($_GET['id']) || !$serie){
        header('HTTP/1.0 404 Not Found');
        echo '<div class="container"><h1>404</h1></div>';
        require('partials/footer.php');
        exit();
    }

    ?>

    <div class="container pt-5">
        <h1>Votre choix de série :  <?php echo $serie['title']; ?></h1>
        <ul class="list-unstyled">
            <li><strong>Catégory :</strong> <?php echo $serie['category']; ?></li>
            <li><strong>Synopsis :</strong> <?php echo $serie['synopsis']; ?></li>
            <li><strong>Date de sortie :</strong> <?php echo $serie['released_at']; ?></li>
            <li><strong>Couverture :</strong><?php echo '<img class="cover-img d-block card-img-top" src="'.$serie['cover'].'" />'; ?></li>
            <li>
                <div class="modifform">
                    <a href="" class="btn btn-primary btn-block">Modifier la série</a>
                    <a href="" class="btn btn-primary btn-block">Supprimer la série</a>
                </div>
            </li>
        </ul>
    </div>




<?php 
require(__DIR__.'/partials/footer.php');
?>


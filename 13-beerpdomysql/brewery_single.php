<?php 
require(__DIR__.'/partials/header.php');


    
    $brewery = breweryExists($_GET['id']);
    // si l
    if(empty($_GET['id']) || !$brewery){
        header('HTTP/1.0 404 Not Found');
        echo '<div class="container"><h1>404</h1></div>';
        require('partials/footer.php');
        exit();
    }

    ?>

    <div class="container pt-5">
        <h1>Votre choix de brasserie :  <?php echo $brewery['name']; ?></h1>
        <ul class="list-unstyled">
            <li>Adresse : <?php echo $brewery['address']; ?></li>
            <li>Ville : <?php echo $brewery['city']; ?></li>
            <li>Code postal : <?php echo $brewery['zip']; ?></li>
            <li>Pays : <?php echo $brewery['country']; ?></li>
            <li>
                <div class="modifform">
                    <a href="" class="btn btn-primary btn-block">Modifier la brasserie</a>
                    <a href="" class="btn btn-primary btn-block">Supprimer la brasserie</a>
                </div>
            </li>
        </ul>
    </div>




<?php 
require(__DIR__.'/partials/footer.php');
?>


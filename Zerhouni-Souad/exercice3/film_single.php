<?php 
require(__DIR__.'/partials/header.php');


    
   $film = filmExists($_GET['id']);
    // si l
    if(empty($_GET['id']) || !$film){
        header('HTTP/1.0 404 Not Found');
        echo '<div class="container"><h1>404</h1></div>';
        require('partials/footer.php');
        exit();
    }

    ?>

    <div class="container pt-5">
        <h1>Votre choix de film :  <?php echo $film['title']; ?></h1>
        <ul class="list-unstyled">
            <li><strong>Actors :</strong> <?php echo $film['actors']; ?></li>
            <li><strong>Réalisateur :</strong> <?php echo $film['director']; ?></li>
            <li><strong>Directeur :</strong> <?php echo $film['producer']; ?></li>
            <li><strong>Date de sortie :</strong> <?php echo date('Y', strtotime($film['year_of_prod'])); ?></li>
            <li><strong>Langue :</strong> <?php echo $film['language']; ?></li>
            <li><strong>Catégorie :</strong> <?php echo $film['category']; ?></li>
            <li><strong>Synopsis :</strong> <?php echo $film['storyline']; ?></li>
            <li><strong>Vidéo :</strong> <?php echo $film['video']; ?></li>
        </ul>
    </div>




<?php 
require(__DIR__.'/partials/footer.php');
?>


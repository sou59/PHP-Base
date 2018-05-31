<?php 
require(__DIR__.'/partials/header.php');

// récupérer les liste des bières
$query = $db->query("SELECT * FROM beer");

// resultats
$beers = $query->fetchAll();


?>

<!-- contenu de la page -->

<div class="container pt-5">
    <h1> La liste des bières</h1>
    <div class="row">
        <?php
        // on affiche la liste des bières
        foreach ($beers as $beer) {
            echo "<div class='col-md-4'>";
                echo "<div class='card md-4'>";
                    echo '<img class="beer-img d-block m-auto card-image-top" src ="'.$beer['image'].'"/>';
                        echo "<div class='card-body'>";
                         echo $beer['name'];
                         // bouton
                         echo '<a href="beer_single.php?id="' . $beer['id'] . 'class="btn btn-primary">En savoir plus sur ' . $beer['name'] . '</a>';
                        echo '</div>';
                echo '</div><br \>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div >
<br \>
</div> 
<div >
<br \>

</div> 
<br \>
<br \>


<?php 
require(__DIR__.'/partials/footer.php');
?>

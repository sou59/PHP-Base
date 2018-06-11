<?php 
require(__DIR__.'/partials/header.php');
?>
    <div class="container pt-5">
    <h1>La liste des séries</h1>

        <?php 
$query = $db->query('SELECT * FROM showtv');
// Récupére toutes les séries
$series = $query->fetchAll();
 //var_dump($series);

?>


    <table class="table table-hover">
        <thead class="bg-primary">
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Nom de la série</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Couverture</th>
                <th scope="col">Date</th>
                <th scope="col">Voir la série</th>
                <?php if (userIsLogged()) { ?>
                <th scope="col">Modifier la série</th>
                <th scope="col">Supprimer  la série</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $nb = 1;
                foreach ($series as $serie) {
                    echo '<td>' . $serie['id'] . '</td>';
                    echo '<td>' . $serie['title'] . '</td>';
                    echo '<td>' . $serie['category'] . '</td>';
                    echo '<td><img class="cover-img d-block card-img-top" src="'.$serie['cover'].'" /></td>';
                    echo '<td>' . $serie['released_at'] . '</td>';
                    echo '<td><a href="serie_single.php?id=' .$serie['id']. '" class="btn btn-primary btn-block">Voir</a></td>';
                        if (userIsLogged()) {
                        echo '<td><a href="serie_edit.php?id=' .$serie['id']. '" class="btn btn-success btn-block">Modifier</a></td>';
                        echo '<td><a href="serie_delete.php?id=' .$serie['id']. '" class="btn btn-danger btn-block confirm-delete">supprimer </a></td>';
                        }
                    echo '</tr>';
                }
                //var_dump($serie);
                ?>
        </tbody>
    </table>
</div>

<?php
require(__DIR__.'/partials/footer.php');
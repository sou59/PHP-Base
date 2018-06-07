<?php 
require(__DIR__.'/partials/header.php');
?>

<?php 
$query = $db->query('SELECT * FROM brewery');
// Récupére toutes les brasseries
$brewery = $query->fetchAll();
// var_dump($brewery);
?>
<div class="container pt-5">
    <h1>La liste des Brasseries</h1>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nom de la brasserie</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">Code postal</th>
                <th scope="col">Pays</th>
                <th scope="col">Voir la brasserie</th>
                <?php if (userIsLogged()) { ?>
                <th scope="col">Modifier la brasserie</th>
                <th scope="col">Supprimer  la brasserie</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
                <?php
                $nb = 1;
                    foreach ($brewery as $brewerys) {
                        echo '<td>' . $brewerys['id'] . '</td>';
                        echo '<td>' . $brewerys['name'] . '</td>';
                        echo '<td>' . $brewerys['address'] . '</td>';
                        echo '<td>' . $brewerys['city'] . '</td>';
                        echo '<td>' . $brewerys['zip'] . '</td>';
                        echo '<td>' . $brewerys['country'] . '</td>';
                        echo '<td><a href="brewery_single.php?id=' .$brewerys['id']. '" class="btn btn-primary btn-block">Voir la brasserie</a></td>';
                            if (userIsLogged()) {
                            echo '<td><a href="brewery_delete.php?id=' .$brewerys['id']. '" class="btn btn-primary btn-block">supprimer la brasserie</a></td>';
                            }

                        //echo '<td><a href="brewery_single.php?id=' .$brewerys['id']. '" class="btn btn-danger btn-block">Voir la brasserie</a></td>';
                        
                        echo '</tr>';
                    }
                    //var_dump($brewerys);
                ?>
        </tbody>
    </table>
</div>


<?php 
require(__DIR__.'/partials/footer.php');
?>


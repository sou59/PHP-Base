<?php 
require(__DIR__.'/partials/header.php');
?>
    
    
    <div class="container pt-5">
        <h1>La liste des films</h1>

        <?php 
            $query = $db->query('SELECT * FROM movies');
            // Récupére toutes les séries
            $films = $query->fetchAll();
            //var_dump($film);

        ?>


        <table class="table table-hover">
            <thead class="bg-primary">
                <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Réalisateur</th>
                    <th scope="col">Année</th>
                    <th scope="col">Plus d'infos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nb = 1;
                    foreach ($films as $film) {
                        echo '<td>' . $film['id'] . '</td>';
                        echo '<td>' . $film['title'] . '</td>';
                        echo '<td>' . $film['director'] . '</td>';
                        echo '<td>' . $film['year_of_prod'] . '</td>';
                        echo '<td><a href="film_single.php?id=' .$film['id']. '" class="btn btn-primary btn-block">Voir</a></td>';
                        echo '</tr>';
                    }
                    //var_dump($film);
                    ?>
            </tbody>
        </table>
    </div>

<?php
require(__DIR__.'/partials/footer.php');
<?php 
require(__DIR__.'/partials/header.php');
?>



    <h1>Votre choix :   
        <?php 

            // Récupérer l'id de la bière dans l'URL
            $id = $_GET['id'];
            // $id = intval($_GET['id']);
            // Récupérer les informations de la bière
            // Risque d'Injection SQL
            // $query = $db->query('SELECT * FROM beer WHERE id = '.$id);
            // Peut être dangereux si on cherche une chaine
            // $query = $db->query('SELECT * FROM beer WHERE `name` = "'.$id.'"');
            // SELECT * FROM beer WHERE `name` = "chaussure";
            // Une requête préparée permet de se prémunir des injections SQL
            $query = $db->prepare('SELECT * FROM beer WHERE id = :id'); // :id est un paramètre
            $query->bindValue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
            $query->execute(); // Execute la requête
            $beer = $query->fetch();
            // Récupérer la marque de la bière
            // Le prepare n'est pas obligatoire si la variable ne vient pas d'une entrée utilisateur
            // Une entrée utilisateur vient de $_GET ou $_POST
            $query = $db->query('SELECT * FROM brand WHERE id = '.$beer['brand_id']);
            $brand = $query->fetch();
            

            // Récupérer l'EBC de la bière
            $query = $db->prepare('SELECT * FROM ebc WHERE id = :id');
            $query->bindValue(':id', $beer['ebc_id'], PDO::PARAM_INT);
            $query->execute();
            $ebc = $query->fetch();
        ?>

    </h1>

    <!-- Le contenu de la page -->
<div class="container pt-5">
    <h1><?php echo $id . ' : ' . $beer['name']; ?></h1>
    <div class="row">
        <div class="col-sm-6">
            <img class="img-fluid" src="<?php echo $beer['image']; ?>" alt="<?php echo $beer['name']; ?>">
        </div>
        <div class="col-sm-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nom : <?php echo $beer['name']; ?></li>
                <li class="list-group-item">Degrès : <?php echo $beer['degree']; ?></li>
                <li class="list-group-item">Volume : <?php echo $beer['volum'] / 10; ?> cl</li>
                <li class="list-group-item">Prix : <?php echo $beer['price']; ?></li>
                <li class="list-group-item">Marque : <?php echo $brand['name']; ?></li>
                <li class="list-group-item">
                    <?php // 4 => Blonde, 26 => Brune, 39 => Ambrée, 57 => Noire
                        $type = null;
                        switch ($ebc['code']) {
                            case 4:
                                $type = 'Blonde';
                            break;
                            case 26:
                                $type = 'Brune';
                            break;
                            case 39:
                                $type = 'Ambrée';
                            break;
                            case 57:
                                $type = 'Noire';
                            break;
                        }
                    ?>
                    Type : <?php echo $type; ?>
                    <span class="d-inline-block" style="background-color: #<?php echo $ebc['color']; ?>; width: 50px; height: 25px"></span>
                </li>
            </ul>
        </div>
    </div>
</div>


<?php 
require(__DIR__.'/partials/footer.php');
?>

<?php 
require(__DIR__.'/partials/header.php');
?>



    <h1>Votre choix :   
        <?php 

            // bonne requete : 
            $id = $_GET['id'];

            //$id = intval($_GET['id']);

            // $query = $db->query('SELECT * FROM beer WHERE id= '. $id); //INTERDIT risque de d'inclusion sql
            // $beer = $query->fetch();
            // peut être dangerues si on cherche une chaîne
            // $query = $db->query('SELECT * FROM beer WHERE `name` id= '. $id); //INTERDIT risque de d'inclusion sql

            // une requete préparée permet de se prémunir des injections sql
            $query = $db->prepare('SELECT * FROM beer WHERE id = :id'); // :id est un paramètre
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute(); // Ne pas oublier d'exécuter la requête
            $beer = $query->fetch();

            // récupérer la marque de la bière
            $query = $db->query('SELECT * FROM brand WHERE id = '.$beer['brand_id']); // :id est un paramètre
            
            $brand = $query->fetch();
            

            // récupérer la marque de la bière
            $query = $db->prepare('SELECT * FROM ebc WHERE id = :id'); // :id est un paramètre
            $query->bindValue(':id', $beer['ebc_id'], PDO::PARAM_INT);
            $query->execute(); // Ne pas oublier d'exécuter la requête
            
            $ebc = $query->fetch();
            var_dump($ebc);
        ?>

    </h1>

    <div class="container pt-5">
        <h1>
            <?php 
            echo $id . ' : ' . $beer['name'];?>
            <div class="row">
                <div class="col-md-6">
                    <img class="beer-img d-block m-auto card-image-top" src="<?php echo $beer['image'];?>" alt="<?php echo $beer['name'];?>">
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nom :  <?php echo $beer['name'];?></li>
                        <li class="list-group-item">Degrée :  <?php echo $beer['degree'];?></li>
                        <li class="list-group-item">Volume :  <?php echo $beer['volum'] / 10;?>cl</li>
                        <li class="list-group-item">Prix :  <?php echo $beer['price'];?></li>
                        <li class="list-group-item">Marque : <?php echo $brand['name'];?> </li>
                        <li class="list-group-item">
                            <?php
                            $type =null;
                            switch ($ebc['code'] == 4) {
                                case 4:
                                    $type = "Blonde";
                                break; 
                                case 26:
                                    $type = "Brune";
                                break; 
                                case 39:
                                    $type = "Ambrée";
                                break; 
                                case 57:
                                    $type = "Noire";
                                break;    
                                    
                                }

                            ?>
                            Type :  <?php echo $type;?>
                            <span class="d-inline-block" style="background-color: #<?php echo $ebc['color'];?>; width: 50px; height: 25px"></span>

                        </li>
                    </ul>
        </h1>
    <div>


<?php 
require(__DIR__.'/partials/footer.php');
?>

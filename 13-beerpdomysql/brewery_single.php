<?php 
require(__DIR__.'/partials/header.php');
?>




<h1>Votre choix de brasserie :  

    <?php
        $id = $_GET['id'];
        $query = $db->prepare('SELECT * FROM brewery WHERE id = :id'); // :id est un paramètre
        $query->bindValue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
        $query->execute(); // Execute la requête
        $brewery = $query->fetch();

    ?>
</h1>

<div class="container pt-5">
    <h1><?php echo $brewery['name']; ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <?php echo $brewery['address']; ?>
        </div>
        <div class="col-sm-3">
            <?php echo $brewery['city']; ?>
        </div>
        <div class="col-sm-3">
            <?php echo $brewery['zip']; ?>
        </div><div class="col-sm-3">
            <?php echo $brewery['country']; ?>
        </div>
    </div>
</div>




<?php 
require(__DIR__.'/partials/footer.php');
?>


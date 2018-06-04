<?php 
require(__DIR__.'/partials/header.php');
?>

<h1> Résultat de votre recherche pour : 
<?php 

            // Récupérer l'id de la bière dans l'URL
            var_dump($_GET);
            if ()
//             $id = $_GET['name'];
//             $query = $db->prepare('SELECT * FROM beer WHERE id = :id'); // :id est un paramètre
//             $query->bindValue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
//             $query->execute(); // Execute la requête
//             $beer = $query->fetch();
//             // Récupérer la marque de la bière
//             $query = $db->query('SELECT * FROM brand WHERE id = '.$beer['brand_id']);
//             $brand = $query->fetch();
//             // Récupérer l'EBC de la bière
//             $query = $db->prepare('SELECT * FROM ebc WHERE id = :id');
//             $query->bindValue(':id', $beer['ebc_id'], PDO::PARAM_INT);
//             $query->execute();
//             $ebc = $query->fetch();
// ?>






<?php 
require(__DIR__.'/partials/footer.php');
?>


<?php 
require(__DIR__.'/partials/header.php');
?>


<?php
    // On initialise les variables du formulaire
    $name = null;
    $address = null;
    $city = null;
    $zip = null;
    $country = null;
    
    // si $_POST n'est pas vide on affecte les variables = au POST
    // vérifie que le formulaire est soumis
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];
        $country = $_POST['country'];
  
        // raccourcie avec l'interpolation des variables
        foreach ($_POST as $key => $field) {
            // ${'name"} = $field
            $$key = $field;
        }
    }

   

    
?>


<div class="container">
    <h1>Ajouter une brasserie </h1>

    <form method="POST" action="" enctype="multipart/form-data">
        <?php

             // vérification des erreurs
            if (!empty($_POST)) {
                // définir un tableau d'erreur vide qui va se remplir après chaque erreur
                $errors = [];
                // $name doit faire au moins 3 caractères
                if (strlen($name) < 3) {
                    $errors['name'] = "Nom invalide";
                }

                if (strlen($address) < 10) {
                    $errors['address'] = "Adresse invalide";
                }
                if (strlen($city) < 3) {
                    $errors['city'] = "Ville invalide";
                }
                if (strlen($zip) < 1 || strlen($zip) > 5 ) {
                    $errors['zip'] = "Code postal invalide";
                }
                
                $allowedCountries = ['France', 'Belgique', 'Royaume-Unis', 'Irelande', 'Allemagne', 'Italie'];
                if (!in_array($country,$allowedCountries)) {
                    $errors['country'] = "Pays invalide";
                }
                // S'il n'y a pas d'erreurs dans le formulaire

                // si le tableau d'erreur est vide et donc que les données sont valides on insère les données dans la table brewery
                // Quand le formulaire est valide, on ajoute la brasserie dans la BDD
                if (empty($errors)) {

                    $query = $db->prepare('INSERT INTO brewery (`name`, `address`, city, zip, country) VALUES (:name, :address, :city, :zip, :country)');

                    $query->bindValue(':name', $name, PDO::PARAM_STR);
                    $query->bindValue(':address', $address, PDO::PARAM_STR);
                    $query->bindValue(':city', $city, PDO::PARAM_STR);
                    $query->bindValue(':zip', $zip, PDO::PARAM_STR);
                    $query->bindValue(':country', $country, PDO::PARAM_STR);
                    $query->execute();
                    // ou comme cela ne fonctionne que pour les chaines

                    $result = $query->execute([
                        ':name' =>$name,
                        ':address' =>$address,
                        ':city' =>$city,
                        ':zip' =>$zip,
                        ':country' =>$country
                    ]);
                    // Raccourci du bindValue mais ne fonctionne que pour les chaines (PDO::PARAM_STR)
                    if ($result) { // On s'assure que la requête s'est bien déroulée

                    echo '<div class="alerte alert-sucess">La bière a bien été ajoutée</div>';
                }  
                //var_dump($errors);

            }
        }
            // création de label-input pour chaque donnée sauf country
            $fields = ['name' => 'Nom', 'address' => 'Adresse', 'city' => 'Ville', 'zip' => 'CP',  ]; 
            // Les champs du formulaire à afficher
            foreach ($fields as $field => $label) { ?>
                <div class="form-group">
                    <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
                    <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control 
                    <?php echo isset($errors[$field]) ? 'is-invalid' : null; ?>" value="<?php echo $$field; ?>">
                    <?php if (isset($errors[$field])) {
                        echo '<div class="invalid-feedback">';
                            echo $errors[$field];
                        echo '</div>';
                        } ?>
                </div>
            <?php } ?>
        <div class="form-group">
            <label for="country">Pays :</label>
            <select class="form-control <?php echo isset($errors['country']) ? 'is-invalid' : ''; ?>" id="country" name="country">
                <option hidden value="">Choisissez votre pays</option>
                <option <?php echo ($country == 'France') ? 'selected' : ''; ?> value="France">France</option>
                <option <?php echo ($country == 'Belgique') ? 'selected' : ''; ?> value="Belgique">Belgique</option>
                <option <?php if ($country == 'Royaume-Unis') { echo 'selected'; } ?> value="Royaume-Unis">Royaume-Unis</option>
                <option <?php echo ($country == 'Allemagne') ? 'selected' : ''; ?> value="Allemagne">Allemagne</option>
                <option <?php echo ($country == 'Irelande') ? 'selected' : ''; ?> value="Irelande">Irelande</option>
                <option <?php if ($country == 'Italie') { echo 'selected'; } ?> value="italie">Italie</option>
            </select>
            <?php if (isset($errors['country'])) {
                echo '<div class="invalid-feedback">';
                    echo $errors['country'];
                echo '</div>';
                } ?>
        </div>

        <button class="btn btn-primary">Ajouter</button>

    </form>        
</div>



<?php 
//var_dump($_POST);

// inclure le fichier s'occupant des logs
require(__DIR__.'/utils/logs.php');


require(__DIR__.'/partials/footer.php');
?>


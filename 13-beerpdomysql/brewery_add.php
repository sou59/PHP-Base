<?php 
require(__DIR__.'/partials/header.php');
?>


<?php
    $name = null;
    $address = null;
    $city = null;
    $zip = null;
    $country = null;
    
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
           
            if (!in_array($country, ['France', 'Belgique', 'Royaume-Unis', 'Irelande', 'Allemagne', 'Italie'])) {
                $errors['country'] = "Pays invalide";
            }

        }

?>


<div class="container">
<h1>Ajouter une brasserie </h1>

<form method="POST" action="" enctype="multipart/form-data">
    <?php
    
    $fields = ['name' => 'Nom', 'address' => 'Adresse', 'city' => 'Ville', 'zip' => 'CP', 'country' => 'Pays',  ]; // Les champs du formulaire à afficher
    foreach ($fields as $field => $label) { ?>
        <div class="form-group">
            <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
            <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control <?php echo isset($errors[$field]) ? 'is-invalid' : null; ?>" value="<?php echo $$field; ?>">
            <?php if (isset($errors[$field])) {
                echo '<div class="invalid-feedback">';
                     echo $errors[$field];
                echo '</div>';
                } ?>
        </div>
    <?php } ?>

    <button class="btn btn-primary">Ajouter</button>

</form>        

</div>
<?php 
require(__DIR__.'/partials/footer.php');
?>


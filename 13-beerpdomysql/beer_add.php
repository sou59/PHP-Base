<?php 
require(__DIR__.'/partials/header.php');
?>
<!-- 
Titre : ajouter une bière
Formulaire avec les champs : 
- Nom : champ saisie libre texte
- Degrés : champ saisie libretexte ou range
- Volume : champ select
- Prix : champ saisie libretexte
- Marque : Champ select ou autocompletion (dataliste)
- Type : Champ select ou autocompletion (dataliste)
Bouton button
ne pas oublier la méthode du formulaire
lorsque le formulaire est soumis récupérer la valeur de chacun des champs valider

-->

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>Ajouter une bière</h1>
    <?php
    // creer les variables avant de formulaire pour le formulaire se vide

    $name = null;
    $degree = null;
    $price = null;
    $volum = null;
    $brand = null;
    $type = null;

    //var_dump($_SERVER);
            // détecter quand le formulaire est soumis
    if (!empty($_POST)) { // Si le formulaire est soumis
        $name = $_POST['name'];
        $degree = $_POST['degree'];
        $pricee = $_POST['price'];
        $volum = $_POST['volum'];
        $brand = $_POST['brand'];
        $type = $_POST['type'];

            // raccourcie avec l'interpolation des variables
        foreach ($_POST as $key => $field) {
            // ${'name"} = $field
            $$key = $field;
        }
    }

    ?>

    <form method="POST" action="">
        <?php
        $fields = ['name' => 'Nom', 'degree' => 'Degrès', 'price' => 'Prix']; // Les champs du formulaire à afficher
        foreach ($fields as $field => $label) { ?>
            <div class="form-group">
                <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
                <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control" value="<?php echo $$field; ?>">
            </div>
        <?php } ?>

        <div class="form-group">
            <label for="volum">Volume :</label>
            <select class="form-control" id="volum" name="volum">
                <option hidden value="">Choisissez votre volume</option>
                <option <?php echo ($volum == 250) ? 'selected' : '';?> value="250">25cl</option>
                <option <?php if ($volum == 330) { echo 'selected';} ?> value="330">33cl</option>
                <option <?php if ($volum == 750) { echo 'selected';} ?> value="750">75cl</option>
            </select>
        </div>

        <div class="form-group">
            <label for="brand">Marque :</label>
            <input type="text" id="brand1" list="brand" name="brand" class="form-control" value="<?php echo $brand; ?>">
            <datalist id="brand">
                <select>
                    <option value="Chimay - 1"></option>
                    <option value="Duvel - 2"></option>
                    <option value="Kwak - 3"></option>
                    <option value="Guinness - 4"></option>
                    <option value="Ch'ti - 5"></option>
                </select>
            </datalist>
        </div>

        <div class="form-group">
            <label for="type">Type :</label>
            <input type="text" id="type1" list="type" name="type" class="form-control" value="<?php echo $type; ?>" >
            <datalist id="type">
                <select>
                    <option value="Blonde - 1"></option>
                    <option value="Brune - 2"></option>
                    <option value="Ambrée - 3"></option>
                    <option value="Noire - 4"></option>
                </select>
            </datalist>
        </div>

        <button class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php 
    
        if (!empty($_POST)) {
        // définir un tableau d'erreur vide qui va se remplir après chaque erreur
        $errors = [];
        
        if (strlen($name) < 3) {
            $errors['name'] = "Le nom n\'est pas valide";
        }
        if (!is_numeric($degree) || $degree < 0.01 || $degree > 20) {
            $errors['degree'] = "Degrée n\'est pas valide";
        }
        if (!is_numeric($price) || $price < 0.01 || $price > 99.99 ) {
            $errors['price'] = "Price n\'est pas valide";
        }

        if (!in_array($volum, [250, 330, 750])) {
            $errors['volum'] = "Volume n\'est pas valide";
        }
        // if ($volum !== 250 || $volum !== 330 || $volum !== 750) {
        //     $errors['volum'] = "Volume n\'est pas valide";
        // }

        // Vérifie que la marque existe
        $brand_id = intval(substr($brand, -1));
        var_dump($brand_id);

        // requête prépare
        $query = $db->prepare('SELECT * FROM brand WHERE id = :id');
        $query->bindValue(':id', $brand_id, PDO::PARAM_INT);
        $query->execute();
        $brand = $query->fetch();
        var_dump($brand);

        if (!$brand) {
            $errors['brand'] = "La marque n\'est pas valide";
        }

        $type_id = intval(substr($type, -1));
        var_dump($type_id);

        // requête prépare
        $query = $db->prepare('SELECT * FROM ebc WHERE id= :id');
        $query->bindValue(':id', $type_id, PDO::PARAM_INT);
        $query->execute();
        $type = $query->fetch();
        var_dump($type);

        if (!$type) {
            $errors['type'] = "Le type n\'est pas valide";
        }

        var_dump($errors);

        // S'il n'y a pas d'erreur
        if (empty($errors)) {

            $query = $db->prepare('
                INSERT INTO beer (`name`, degree, volum, `image`, price, brand_id, ebc_id)
                VALUES (:name, :degree, :volum, :image, :price, :brand_id, :ebc_id)');

            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':degree', $degree, PDO::PARAM_STR);
            $query->bindValue(':volum', $name, PDO::PARAM_INT);
            $query->bindValue(':image', 'img/chimay-chimay-rouge.jpg', PDO::PARAM_STR);
            $query->bindValue(':price', $price, PDO::PARAM_STR);
            $query->bindValue(':brand_id', $brand_id, PDO::PARAM_INT);
            $query->bindValue(':ebc_id', $type_id, PDO::PARAM_INT);
            
            if ($query->execute()) { // on sinsère la bière dans la bdd
                echo '<div class="alerte alert-sucess">La bière a bien été ajoutée</div>';
            }

        //var_dump($errors);
    }
    var_dump($_POST);

?>


<?php 
require(__DIR__.'/partials/footer.php');
?>
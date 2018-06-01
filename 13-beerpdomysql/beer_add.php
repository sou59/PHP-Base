<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php'); ?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>Ajouter une bière</h1>

    <?php
        // On définis les variables pour éviter des "Notices" quand on les affichera dans le formulaire
        $name = null;
        $degree = null;
        $price = null;
        $volum = null;
        $brand = null;
        $type = null;

        if (!empty($_POST)) {
            $name = $_POST['name']; // Doit faire au moins 3 caractères
            $degree = $_POST['degree']; // Doit faire entre 0 et 20
            $price = $_POST['price']; // Doit faire entre 0.01 et 99.99
            $volum = $_POST['volum']; // Doit faire 250, 330 ou 750
            $brand = $_POST['brand']; // La marque doit exister dans la BDD
            $type = $_POST['type']; // Le type doit exister dans la BDD

            // Raccourci avec l'interpolation de variables
            /*foreach ($_POST as $key => $field) {
                $$key = $field;
            }*/
        }
    ?>

    <form method="POST" action="">
        <?php
        /*$fields = ['name' => 'Nom', 'degree' => 'Degrès', 'price' => 'Prix']; // Les champs du formulaire à afficher
        foreach ($fields as $field => $label) { ?>
            <div class="form-group">
                <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
                <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control" value="<?php echo $$field; ?>">
            </div>
        <?php }*/ ?>

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="degree">Degrès :</label>
            <input type="text" name="degree" id="degree" class="form-control" value="<?php echo $degree; ?>">
        </div>
        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="text" name="price" id="price" class="form-control" value="<?php echo $price; ?>">
        </div>

        <div class="form-group">
            <label for="volum">Volume :</label>
            <select class="form-control" id="volum" name="volum">
                <option hidden value="">Choisissez votre volume</option>
                <option <?php if ($volum == 250) { echo 'selected'; } ?> value="250">25cl</option>
                <option <?php echo ($volum == 330) ? 'selected' : ''; ?> value="330">33cl</option>
                <option <?php if ($volum == 750) { echo 'selected'; } ?> value="750">75cl</option>
            </select>
        </div>

        <div class="form-group">
            <label for="brand">Marque :</label>
            <input type="text" id="brand" list="brands" name="brand" class="form-control" value="<?php echo $brand; ?>">
            <datalist id="brands">
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
            <input type="text" id="type" list="types" name="type" class="form-control" value="<?php echo $type; ?>">
            <datalist id="types">
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

    <?php
        // Détecter quand le formulaire est soumis
        // On peut aussi utilise $_SERVER
        if (!empty($_POST)) {
            // Définir un tableau d'erreur vide qui va se remplir après chaque erreur
            $errors = [];

            // $name doit faire au moins 3 caractères
            if (strlen($name) < 3) {
                $errors['name'] = 'Le nom n\'est pas valide'; // équivaut à array_push($errors, 'Le nom n\'est pas valide');
            }

            // $degree doit faire entre 0 et 20
            if (!is_numeric($degree) || $degree < 0 || $degree > 20) {
                $errors['degree'] = 'Le degrès n\'est pas valide';
            }

            // $price doit faire entre 0.01 et 99.99
            if (!is_numeric($price) || $price < 0.01 || $price > 99.99) {
                $errors['price'] = 'Le prix n\'est pas valide';
            }

            // $volum doit faire 250, 330 ou 750
            if (!in_array($volum, [250, 330, 750])) {
                $errors['volum'] = 'Le volume n\'est pas valide';
            }

            // Vérifier que la marque existe
            $brand_id = intval(substr($brand, -1)); // "Duvel - 2" -> "2"

            // Requête pour aller chercher la marque en BDD
            $query = $db->prepare('SELECT * FROM brand WHERE id = :id');
            $query->bindValue(':id', $brand_id, PDO::PARAM_INT);
            $query->execute();
            $brand = $query->fetch();
            var_dump($brand);

            if (!$brand) { // Si la marque n'existe pas en BDD
                $errors['brand'] = 'La marque n\'existe pas';
            }

            // Vérifier que le type existe
            $type_id = intval(substr($type, -1)); // "Brune - 2" -> "2"

            // Requête pour aller chercher le type ebc en BDD
            $query = $db->prepare('SELECT * FROM ebc WHERE id = :id');
            $query->bindValue(':id', $type_id, PDO::PARAM_INT);
            $query->execute();
            $type = $query->fetch();
            var_dump($type);

            if (!$type) { // Si le type n'existe pas en BDD
                $errors['type'] = 'Le type n\'existe pas';
            }

            var_dump($errors);
        }
        // Vérifier les champs
        var_dump($_POST);
    ?>
</div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');

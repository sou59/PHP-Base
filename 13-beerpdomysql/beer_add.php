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
                <option value="250">25cl</option>
                <option value="330">33cl</option>
                <option value="750">75cl</option>
            </select>
        </div>

        <div class="form-group">
            <label for="brand">Marque :</label>
            <input type="text" id="brand" list="brands" name="brand" class="form-control">
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
            <input type="text" id="type" list="types" name="type" class="form-control">
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
                $errors['degree'] = 'Le degrès n\'est pas valide'; // équivaut à array_push($errors, 'Le degrès n\'est pas valide');
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

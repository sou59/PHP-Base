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

    <form method="POST" action="">
        <?php
        $fields = ['name' => 'Nom', 'degree' => 'Degrès', 'price' => 'Prix']; // Les champs du formulaire à afficher
        foreach ($fields as $field => $label) { ?>
            <div class="form-group">
                <label for="<?php echo $field; ?>"><?php echo $label; ?> :</label>
                <input type="text" name="<?php echo $field; ?>" id="<?php echo $field; ?>" class="form-control">
            </div>
        <?php } ?>

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
            <input type="text" id="brand1" list="brand" name="brand" class="form-control">
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
            <input type="text" id="type1" list="type" name="type" class="form-control">
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
    var_dump($_POST);

    if (!empty($_GET)) { // Si le formulaire est soumis
        $isValid = true;
         // Ou strlen($subject) == 0
        if (empty($name)) {
            $isValid = false;
            echo 'Vous devez choisir un nom de bière. <br />';
        }
        if (strlen($degree)) {
            $isValid = false;
            echo 'Quel degrés souhaitez vous ?.';
        }
        if (strlen($price)) {
            $isValid = false;
            echo 'Quel volume souhaitez vous ?.';
        }
        if (strlen($volum)) {
            $isValid = false;
            echo 'Quel prix souhaitez vous ?.';
        }
        if (strlen($brand)) {
            $isValid = false;
            echo 'Quel marque souhaitez vous ?.';
        }
        if (strlen($type)) {
            $isValid = false;
            echo 'Quel type de bière souhaitez vous ?.';
        }

        if ($isValid) {
            echo 'Le formulaire a été envoyé.';
        }
        /*if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($subject) && strlen($message) >= 15) {
            echo 'Le formulaire a été envoyé.';
        }*/
    }

?>

<!--  Fichier nous permettra d'ajouter les couleurs de bières EBC
 4 : Blonde : #F8F753
 26 : Ambré : #BC6733
 39 : brune : #5D341A
 57 : noire : #0F0B0A -->








<?php 
require(__DIR__.'/partials/footer.php');
?>


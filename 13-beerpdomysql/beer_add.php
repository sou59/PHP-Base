<?php 
require(__DIR__.'/partials/header.php');
?>

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
    $image = null;

    //var_dump($_SERVER);

    // détecter quand le formulaire est soumis
    if (!empty($_POST)) { // Si le formulaire est soumis
        $name = $_POST['name'];
        $degree = $_POST['degree'];
        $pricee = $_POST['price'];
        $volum = $_POST['volum'];
        $brand = $_POST['brand'];
        $type = $_POST['type'];
        //$image = $_FILES['image'];

        // raccourcie avec l'interpolation des variables
        foreach ($_POST as $key => $field) {
            // ${'name"} = $field
            $$key = $field;
        }
    }
        if (!empty($_FILES['image']['tmp_name'])) {
           $image = $_FILES['image'];
        }

        // Détecter quand le formulaire est soumis
    // On peut aussi utilise $_SERVER
    if (!empty($_POST)) {
        // définir un tableau d'erreur vide qui va se remplir après chaque erreur
        $errors = [];
            // $name doit faire au moins 3 caractères
            if (strlen($name) < 3) {
                $errors['name'] = "Le nom n\'est pas valide";
            }

            // $degree doit faire entre 0 et 20
            if (!is_numeric($degree) || $degree < 0.01 || $degree > 20) {
                $errors['degree'] = "Degrée n\'est pas valide";
            }

            // $price doit faire entre 0.01 et 99.99
            if (!is_numeric($price) || $price < 0.01 || $price > 99.99 ) {
                $errors['price'] = "Price n\'est pas valide";
            }

            // $volum doit faire 250, 330 ou 750
            if (!in_array($volum, [250, 330, 750])) {
                $errors['volum'] = "Volume n\'est pas valide";
            }
            // if ($volum !== 250 || $volum !== 330 || $volum !== 750) {
            //     $errors['volum'] = "Volume n\'est pas valide";
            // }

            // Vérifie que la marque existe
            $brand_id = intval(substr($brand, -1));
            
            // Requête pour aller chercher la marque en BDD
            $query = $db->prepare('SELECT * FROM brand WHERE id = :id');
            $query->bindValue(':id', $brand_id, PDO::PARAM_INT);
            $query->execute();
            $brand = $query->fetch();

            if (!$brand) {  // Si la marque n'existe pas en BDD
                $errors['brand'] = "La marque n\'est pas valide";
            }

            // Vérifier que le type existe
            $type_id = intval(substr($type, -1));  // "Brune - 2" -> "2"

            // Requête pour aller chercher le type ebc en BDD
            $query = $db->prepare('SELECT * FROM ebc WHERE id= :id');
            $query->bindValue(':id', $type_id, PDO::PARAM_INT);
            $query->execute();
            $type = $query->fetch();
            //var_dump($type);

            // Si le type n'existe pas en BDD
            if (!$type) {
                $errors['type'] = "Le type n\'est pas valide";
            }


            // vérification du type d'image
            //erreur si pas d'image uploade
            if ($image === null) {
                $errors['image'] = "Vous avez oublier d'uploder une image";
            }

            // erreur si l'image n'a pas le bon mimetype
            //finfo_file()
            if ($image) {
                $file = $image['tmp_name']; // emplacement temporaire du fichier
                $finfo = finfo_open(FILEINFO_MIME_TYPE); // permet d'ouvrir un fichier 
                $mimeType = finfo_file($finfo, $file); // ouvre le fichier et renvoie image/jpg
                // Dans la variable suivante, je définis les extention autorisées
                $allowedExtension = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                if(!in_array($mimeType, $allowedExtension)){
                    $errors['image'] = "Ce type de fichier n\'est pas autorisé";
                }

                // si le taille de l'image est- trop elevé
                // size en octet 1 o = 1024 
                if ($image['size'] > 2097152) {
                    $errors['image'] = "le fichier est trop lourd";
                }
            }
            

            var_dump($errors);

            // S'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {

                $query = $db->prepare('
                    INSERT INTO beer (`name`, degree, volum, `image`, price, brand_id, ebc_id)
                    VALUES (:name, :degree, :volum, :image, :price, :brand_id, :ebc_id)');

                $query->bindValue(':name', $name, PDO::PARAM_STR);
                $query->bindValue(':degree', $degree, PDO::PARAM_STR);
                $query->bindValue(':volum', $name, PDO::PARAM_INT);
                // laisser le champs adrees image vide car on doit récupérer l'extension du fichier uploader
                $query->bindValue(':image', null, PDO::PARAM_STR);
                $query->bindValue(':price', $price, PDO::PARAM_STR);
                $query->bindValue(':brand_id', $brand_id, PDO::PARAM_INT);
                $query->bindValue(':ebc_id', $type_id, PDO::PARAM_INT);
                
                if ($query->execute()) { // On insère la bière dans la BDD
                    // Retourne l'emplacement temporaire du fichier
                    $file = $_FILES['image']['tmp_name'];

                    // Récupère l'extension du fichier
                    $originalName = $_FILES['image']['name'];
                    $extension = pathinfo($originalName)['extension']; // retourne jpg pu png

                    // Générer le nom de l'image
                    // Ch'ti -> chti
                    // ch'ti Ambrée -> chti-ambrée
                    $brand = slugify($brand['name']);
                    $name = slugify($name);
 
                    $filename = $brand.'-'.$name.'.'.$extension;
                    var_dump($filename);

                    // Déplace le fichier vers un répertoire img
                    move_uploaded_file($file, __DIR__.'/img/'.$filename);

                    $query = $db->prepare('UPDATE beer SET `image` = :image WHERE id = :id');
                    $query->bindValue(':image', 'img/'.$filename, PDO::PARAM_STR);
                    $query->bindValue(':id', $db->lastInsertId(), PDO::PARAM_INT);
                    $query->execute();                   
                    
                    echo '<div class="alerte alert-sucess">La bière a bien été ajoutée</div>';
                }
            }
           
        }
    

    ?>
    <!-- L'attribut enctype doit absolument être "multipart/form-data",
    et la méthode doit être POST -->
    <form method="POST" action="" enctype="multipart/form-data">
    <?php
    
        $fields = ['name' => 'Nom', 'degree' => 'Degrès', 'price' => 'Prix']; // Les champs du formulaire à afficher
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

        <!-- La balise input type="file" permet de
        sélectionner un fichier sur son ordinateur.
        Ne pas oublier l'attribut "name"-->
        <div class="form-group">
            <label for="image">Type :</label>
        <input type="file" name="image" />
        </div>

        <button class="btn btn-primary">Ajouter</button>
    </form>

</div>

<?php 
require(__DIR__.'/partials/footer.php');
?>
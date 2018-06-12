<?php 
require(__DIR__.'/partials/header.php');
?>
    <div class="container pt-5">
        <h1>Ajouter une série</h1>

        <?php
            // On définis les variables pour éviter des "Notices" quand on les affichera dans le formulaire
            $title = null;
            $category = null;
            $cover = null;
            $synopsis = null;
            $released_at = null;
            $saison = null;
            $errors = [];


            // détecter quand le formulaire est soumis
            if (!empty($_POST)) { // Si le formulaire est soumis
                $title = trim(strip_tags($_POST['title']));
                $category = trim(strip_tags($_POST['category']));
                $cover = trim(strip_tags($_POST['cover']));
                $synopsis = trim(strip_tags($_POST['synopsis']));
                $date = trim(strip_tags($_POST['released_at']));
                $saison = $_POST['saison'];

                // raccourcie avec l'interpolation des variables
                foreach ($_POST as $key => $field) {
                    // ${'name"} = $field
                    $$key = $field;
                }
            }
            if (!empty($_FILES['cover']['tmp_name'])) {
                $image = $_FILES['cover'];
             }
    
             var_dump($_POST);
            // Détecter quand le formulaire est soumis
            // On peut aussi utilise $_SERVER
            if (!empty($_POST)) {
            // définir un tableau d'erreur vide qui va se remplir après chaque erreur
                $errors = [];
                // $name doit faire au moins 3 caractères
                if (strlen($title) < 1) {
                    $errors['title'] = "Le titre n\'est pas valide";
                }

                if (strlen($category) < 3) {
                    $errors['category'] = "La catégorie n\'est pas valide";
                }

                if (strlen($synopsis) < 3) {
                    $errors['synopsis'] = "Le synopsis n\'est pas valide";
                }
               
                if (strlen($date) == 0) {
                     $errors['date'] = "La date est obligatoire";
                }

                if (!strtotime($date)) {
                    $errors['date'] = "La date n\'est pas valide";
                }

                if (strtotime($date)) { // Si date valide, on vérifie qu'elle existe
                    $month = date('n', strtotime($date)); // 2 -> février
                    $day = date('j', strtotime($date)); // 29
                    $year = date('Y', strtotime($date)); // 2001
                    if (!checkdate($month, $day, $year)) {
                        $errors['date'] = 'La date n\'est pas valide.';
                    }
                }
                
                // Vérifie que la marque existe
                $saison_id = intval(substr($saison, -1));
                
                // Requête pour aller chercher la marque en BDD
                $query = $db->prepare('SELECT * FROM saison WHERE id = :id');
                $query->bindValue(':id', $saison_id, PDO::PARAM_INT);
                $query->execute();
                $brand = $query->fetch();

                if (!$saison) {
                    $errors['saison'] = 'Indiquer une saison.';
                }
                

               // var_dump(checkdate($mois,$jour,$annee));
                var_dump(strtotime('2016-05-12'));

                // erreur si l'image n'a pas le bon mimetype
                //finfo_file()
                if ($cover) {
                    $file = $cover['tmp_name']; // emplacement temporaire du fichier
                    $finfo = finfo_open(FILEINFO_MIME_TYPE); // permet d'ouvrir un fichier 
                    $mimeType = finfo_file($finfo, $file); // ouvre le fichier et renvoie image/jpg
                    // Dans la variable suivante, je définis les extention autorisées
                    $allowedExtension = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
                    if(!in_array($mimeType, $allowedExtension)){
                        $errors['cover'] = "Ce type de fichier n\'est pas autorisé";
                    }

                    // si le taille de l'image est trop elevé
                    // size en octet 1 o = 1024 
                    if ($image['size'] > 2097152) {
                        $errors['cover'] = "le fichier est trop lourd";
                    }
                }
                var_dump($released_at);
            
                // S'il n'y a pas d'erreurs dans le formulaire
                if (empty($errors)) {

                    $query = $db->prepare('INSERT INTO showtv (title, category, cover, synopsis, released_at, saison_id) 
                    VALUES (:title, :category, :cover, :synopsis, :released_at, :saison_id');

                    $query->bindValue(':title', $title, PDO::PARAM_STR);
                    $query->bindValue(':category', $category, PDO::PARAM_STR);
                    $query->bindValue(':cover', $cover, PDO::PARAM_STR);
                    $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
                    $query->bindValue(':released_at', $date, PDO::PARAM_STR);
                    $query->bindValue(':saison_id', $saison_id, PDO::PARAM_INT);

                    if ($query->execute()) { // On insère la série dans la BDD
                        // Retourne l'emplacement temporaire du fichier
                        $file = $_FILES['cover']['tmp_name'];
    
                        // Récupère l'extension du fichier
                        $originalName = $_FILES['cover']['name'];
                        $extension = pathinfo($originalName)['extension']; // retourne jpg pu png
    
                        // Générer le nom de l'image
                        // Ch'ti -> chti
                        // ch'ti Ambrée -> chti-ambrée
                        //$cover = slugify($cover['title']);
                        $title = slugify($title);
     
                        $filename = $title.'.'.$extension;
                        var_dump($filename);
    
                        // Déplace le fichier vers un répertoire img
                        move_uploaded_file($file, __DIR__.'/img/'.$filename);
    
                        $query = $db->prepare('UPDATE showtv SET `cover` = :cover WHERE id = :id');
                        $query->bindValue(':cover', 'img/'.$filename, PDO::PARAM_STR);
                        $query->bindValue(':id', $db->lastInsertId(), PDO::PARAM_INT);
                        $query->execute();                   
                        
                        echo '<div class="alerte alert-sucess">La série a bien été ajoutée</div>';
                    }
                }
                var_dump($released_at);
        }
            ?>
        <div class="formulaire">
        <form action="" method="post" enctype="multipart/form-data">
            <?php

                $fields = ['title' => 'Titre', 'category' => 'Catégorie', 'synopsis' => 'Synopsis']; // Les champs du formulaire à afficher
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
                <?php
                }
                ?>

                    <div class="form-group">
                    <label for="released_at">Date YYYY-MM-DD</label>
                    <input type="date" name="released_at" id="released_at" class="form-control <?php echo isset($errors[$field]) ? 'is-invalid' : null; ?>">
                        <?php echo $errors['date'] ?? ''; ?>
                    </div>

                    <!-- La balise input type="file" permet de
                    sélectionner un fichier sur son ordinateur.
                    Ne pas oublier l'attribut "name"-->
                    <div class="form-group">
                        <label for="cover">Couverture :</label>
                    <input type="file" name="cover" />
                    <?php echo $errors['cover'] ?? ''; ?>
                    </div>

                    <div class="form-group">
                    <label for="saison">Saison :</label>
                    <input type="text" id="saison" list="saisons" name="saison" class="form-control" value="<?php echo $saison; ?>">
                    <datalist id="saisons">
                        <select>
                            <option value="Saison - 1"></option>
                            <option value="Saison - 2"></option>
                            <option value="Saison - 3"></option>
                            <option value="Saison - 4"></option>
                            <option value="Saison - 5"></option>
                        </select>
                    </datalist>
        </div>
        </div>

            <button class="btn btn-primary">Ajouter la série</button>

        </form>
        </div>
    </div>

<?php
require(__DIR__.'/partials/footer.php');
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


            // détecter quand le formulaire est soumis
            if (!empty($_POST)) { // Si le formulaire est soumis
                $title = str_replace(' ', '', trim(strip_tags($_POST['title'])));
                $category = str_replace(' ', '', trim(strip_tags($_POST['category'])));
                $synopsis = str_replace(' ', '', trim(strip_tags($_POST['synopsis'])));
                $released_at = $_POST['released_at'];

                // raccourcie avec l'interpolation des variables
                foreach ($_POST as $key => $field) {
                    // ${'name"} = $field
                    $$key = $field;
                }
            }
            if (!empty($_FILES['cover']['tmp_name'])) {
                $image = $_FILES['cover'];
             }
    

            // Détecter quand le formulaire est soumis
            // On peut aussi utilise $_SERVER
            if (!empty($_POST)) {
            // définir un tableau d'erreur vide qui va se remplir après chaque erreur
                $errors = [];
                // $name doit faire au moins 3 caractères
                if (strlen($title) < 3) {
                    $errors['title'] = "Le titre n\'est pas valide";
                }

                if (strlen($category) < 3) {
                    $errors['category'] = "La catégorie n\'est pas valide";
                }

                if (strlen($synopsis) < 3) {
                    $errors['synopsis'] = "Le synopsis n\'est pas valide";
                }
               
                if (strlen($released_at) == 0) {
                     $errors['released_at'] = "La date est obligatoire";
                }

                if (!strtotime($released_at)) {
                    $errors['released_at'] = "La date n\'est pas valide";
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

                    $query = $db->prepare('INSERT INTO showtv (title, category, cover, synopsis, released_at) 
                    VALUES (:title, :category, :cover, :synopsis, :released_at)');

                    $query->bindValue(':title', $title, PDO::PARAM_STR);
                    $query->bindValue(':category', $category, PDO::PARAM_STR);
                    $query->bindValue(':cover', null, PDO::PARAM_STR);
                    $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
                    $query->bindValue(':released_at', $released_at, PDO::PARAM_STR);

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

                $fields = ['title' => 'Titre', 'category' => 'Catégorie', 'synopsis' => 'Synopsis', 'released_at' => 'Date AAAA-MM-JJ']; // Les champs du formulaire à afficher
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
                    <!-- <div class="form-group">
                        <label for="cover">Cover :</label>
                        <input type="text" name="cover" id="cover" class="form control valid" value="<?php echo $cover; ?>">
                    </div>     -->
                            <!-- La balise input type="file" permet de
                    sélectionner un fichier sur son ordinateur.
                    Ne pas oublier l'attribut "name"-->
                    <div class="form-group">
                        <label for="cover">Couverture :</label>
                    <input type="file" name="cover" />
                    </div>

            <button class="btn btn-primary">Ajouter la série</button>

        </form>
        </div>
    </div>

<?php
require(__DIR__.'/partials/footer.php');
<?php 
require(__DIR__.'/partials/header.php');
?>
    <div class="container pt-5">
        <h1>Ajouter un film</h1>

        <?php
            // On définis les variables pour éviter des "Notices" quand on les affichera dans le formulaire
            $title = null;
            $actors = null;
            $director = null;
            $producer = null;
            $year_of_prod = null;
            $language = null;
            $category = null;
            $storyline = null;
            $video = null;
            $errors = [];


            // détecter quand le formulaire est soumis
            if (!empty($_POST)) { // Si le formulaire est soumis
                $title = trim(strip_tags($_POST['title']));
                $actors = trim(strip_tags($_POST['actors']));
                $director = trim(strip_tags($_POST['director']));
                $producer = trim(strip_tags($_POST['producer']));
                $year_of_prod = trim(strip_tags($_POST['year_of_prod']));
                $language = trim(strip_tags($_POST['language']));
                $category = trim(strip_tags($_POST['category']));
                $storyline = trim(strip_tags($_POST['storyline']));
                $video = strip_tags($_POST['video']);

                // raccourcie avec l'interpolation des variables
                foreach ($_POST as $key => $field) {
                    // ${'name"} = $field
                    $$key = $field;
                }
            }
                
            // var_dump($_POST);
            // Détecter quand le formulaire est soumis
            // On peut aussi utilise $_SERVER
            if (!empty($_POST)) {
            // définir un tableau d'erreur vide qui va se remplir après chaque erreur
                
                // $name doit faire au moins 3 caractères
                if (strlen($title) < 5) {
                    $errors['title'] = "Le titre invalide";
                }

                if (strlen($director) < 5) {
                    $errors['director'] = "Réalisateur invalide";
                }

                if (strlen($actors) < 5) {
                    $errors['actors'] = "Acteur invalide";
                }

                if (strlen($producer) < 5) {
                    $errors['producer'] = "Producteur invalide";
                }

                if (strlen($storyline) < 5) {
                    $errors['storyline'] = "storyline invalide";
                }
               
                if (!filter_var($video, FILTER_VALIDATE_URL)) {
                    $errors['video'] = "Adresse URL invalide";

                }

                if (strlen($year_of_prod) == 0) {
                    $errors['year_of_prod'] = "La date est obligatoire";
               }

            //     if (!strtotime($year_of_prod)) {
            //        $errors['year_of_prod'] = "La date n\'est pas valide";
            //    }
//BUGS SUR LES DATES
                // if (strtotime($year_of_prod)) { // Si date valide, on vérifie qu'elle existe
                //     //$year = date('Y', strtotime($year_of_prod));
                //     // if (!checkdate($year)) {
                //     //     $errors['year_of_prod'] = 'La date n\'est pas valide.';
                //     // }
                //     $errors['year_of_prod'] = 'La date n\'est pas valide.';
                // }
                   
                // S'il n'y a pas d'erreurs dans le formulaire
                if (empty($errors)) {

                    $query = $db->prepare('INSERT INTO movies (title, actors, director, producer, year_of_prod, `language`, category, storyline, video) VALUES (:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)');

                    $query->bindValue(':title', $title, PDO::PARAM_STR);
                    $query->bindValue(':actors', $actors, PDO::PARAM_STR);
                    $query->bindValue(':director', $director, PDO::PARAM_STR);
                    $query->bindValue(':producer', $producer, PDO::PARAM_STR);
                    $query->bindValue(':year_of_prod', $year_of_prod, PDO::PARAM_INT);
                    $query->bindValue(':language', $language, PDO::PARAM_STR);
                    $query->bindValue(':category', $category, PDO::PARAM_STR);
                    $query->bindValue(':storyline', $storyline, PDO::PARAM_STR);
                    $query->bindValue(':video', $video, PDO::PARAM_STR);
                    $query->execute();
                                    
                    echo '<div class="alerte alert-sucess">La série a bien été ajoutée</div>';
                
                }
               
               // var_dump($errors);
        }
        //var_dump($_POST);
            ?>
        <div class="formulaire">
            <form method="POST" action="" enctype="multipart/form-data">    
            <?php

                $fields = ['title' => 'Titre', 'actors' => 'Acteurs', 'director' => 'Réalisateur', 'producer' => 'Producteur', 'video' => 'Vidéo'
                ]; // Les champs du formulaire à afficher
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
                        <label for="storyline">Synospsis :</label>
                        <textarea class="form-control <?php echo isset($errors['storyline']) ? 'is-invalid' : null; ?>" value="<?php echo $storyline; ?>" rows="5" id="storyline" name ="storyline"></textarea>
                    </div> 

                    <div class="form-group">
                        <label for="category">Catégorie :</label>
                        <select class="form-control <?php echo isset($errors['category']) ? 'is-invalid' : null; ?>" id="category" name="category">
                            <option hidden value="">Choisissez votre catégorie</option>
                            <option <?php if ($category == 'Action') { echo 'selected'; } ?> value="Action">Action</option>
                            <option <?php echo ($category == 'Science fiction') ? 'selected' : ''; ?> value="Science fiction">Science fiction</option>
                            <option <?php if ($category == 'Comédie') { echo 'selected'; } ?> value="Comédie">Comédie</option>
                            <option <?php if ($category == 'Humour') { echo 'selected'; } ?> value="Humour">Humour</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="language">Langue :</label>
                        <select class="form-control <?php echo isset($errors['language']) ? 'is-invalid' : null; ?>" id="language" name="language">
                            <option hidden value="">Choisissez votre langue</option>
                            <option <?php if ($language == 'Français') { echo 'selected'; } ?> value="Français">Français</option>
                            <option <?php echo ($language == 'Anglais') ? 'selected' : ''; ?> value="Anglais">Anglais</option>
                            <option <?php if ($language == 'Japonais') { echo 'selected'; } ?> value="Japonais">Japonais</option>
                            <option <?php if ($language == 'Humour') { echo 'selected'; } ?> value="Humour">Humour</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="year_of_prod">Date YYYY :</label>
                        <select class="form-control <?php echo isset($errors['year_of_prod']) ? 'is-invalid' : null; ?>" id="year_of_prod" name="year_of_prod">
                            <option hidden value="">Choisissez votre date</option>
                            <option <?php if ($year_of_prod == '2010') { echo 'selected'; } ?> value="2010">2010</option>
                            <option <?php echo ($year_of_prod == '2000') ? 'selected' : ''; ?> value="2000">2000</option>
                            <option <?php if ($year_of_prod == '1995') { echo 'selected'; } ?> value="1995">1995</option>
                            <option <?php if ($year_of_prod == '1990') { echo 'selected'; } ?> value="1990">1990</option>
                        </select>
                    </div>     
                    

            <button class="btn btn-primary">Ajouter un film</button>

        </form>
    </div>
</div>
</div>

<?php
require(__DIR__.'/partials/footer.php');
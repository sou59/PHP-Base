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
                $cover = $_POST['cover'];
                $synopsis = str_replace(' ', '', trim(strip_tags($_POST['synopsis'])));
                $released_at = $_POST['released_at'];

                // raccourcie avec l'interpolation des variables
                foreach ($_POST as $key => $field) {
                    // ${'name"} = $field
                    $$key = $field;
                }
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
                     $errors[$released_at] = "La date est obligatoire";
                
                // $date = $released_at;
                // list($jour, $mois, $annee) = explode('/', $date);
                // if(checkdate($mois,$jour,$annee))
                // {
                // echo "date valide";
                // }
                // else
                // {
                // echo "date non valide";
                 //}

                //list($jour, $mois, $annee) = explode('/', $date);
                function datefr2en($released_at){
                    @list($jour,$mois,$annee)=explode('/',$released_at);
                    return @date('Y-m-d',mktime(0,0,0,$mois,$jour,$annee));
                }
                $date = datefr2en($released_at);
                }
                else {
                echo "date non valide";
                }
                
            
                
                

                // S'il n'y a pas d'erreurs dans le formulaire
                if (empty($errors)) {

                    $query = $db->prepare('INSERT INTO showtv (title, category, cover, synopsis, released_at) VALUES (:title, :category, :cover, :synopsis, :released_at)');

                    $query->bindValue(':title', $title, PDO::PARAM_STR);
                    $query->bindValue(':category', $category, PDO::PARAM_STR);
                    $query->bindValue(':cover', $cover, PDO::PARAM_STR);
                    $query->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
                    $query->bindValue(':released_at', $date, PDO::PARAM_INT);
                    $query->execute(); // On insère dans la BDD
                    echo '<div class="alerte alert-sucess">La série a bien été ajoutée</div>';
                }
            }
            ?>
        <div class="formulaire">
        <form action="" method="post" enctype="multipart/form-data">
            <?php

                $fields = ['title' => 'Titre', 'category' => 'Catégorie', 'synopsis' => 'Synopsis', 'released_at' => 'Date JJ/MM/AAAA']; // Les champs du formulaire à afficher
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
                        <label for="cover">Cover :</label>
                        <input type="text" name="cover" id="cover" class="form control valid" value="<?php echo $cover; ?>">
                    </div>    

            <button class="btn btn-primary">Ajouter la série</button>

        </form>
        </div>
    </div>

<?php
require(__DIR__.'/partials/footer.php');
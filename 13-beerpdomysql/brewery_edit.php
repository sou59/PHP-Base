<?php
// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php');

// Est-ce qu'un ID existe dans l'url ? Est-ce que la brasserie existe en BDD ?
if (empty($_GET['id']) || !$brewery = breweryExists($_GET['id'])) {
    // Permet de renvoyer une 404 si la brasserie n'existe pas
    header('HTTP/1.0 404 Not Found');
    // La 404 personnalisée
    echo '<div class="container"><h1>404</h1></div>';
    require('partials/footer.php');
    exit; // On arrête le script PHP ici car la page 404 est terminée
} ?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>Modifier la brasserie <?php echo $brewery['name']; ?></h1>

    <?php
    // On initialise les variables du formulaire
        $name = $brewery['name'];
        $address = $brewery['address'];
        $city = $brewery['city'];
        $zip = $brewery['zip'];
        $country = $brewery['country'];

        if (!empty($_POST)) { // Vérifie que le formulaire est soumis
            $name = $_POST['name'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $zip = $_POST['zip'];
            $country = $_POST['country'];
            //var_dump($_POST);

            $errors = [];

            if (strlen($name) < 3) {
                $errors['name'] = 'Le nom est trop court.';
            }

            if (strlen($address) < 10) {
                $errors['address'] = 'L\'adresse est trop courte.';
            }

            if (strlen($city) < 3) {
                $errors['city'] = 'La ville est trop courte.';
            }

            if (strlen($zip) < 1 || strlen($zip) > 5) {
                $errors['zip'] = 'Le code postal n\'est pas valide.';
            }

            $allowedCountries = ['France', 'Belgique', 'Royaume-Uni', 'Irelande', 'Allemagne', 'Italie'];
            if (!in_array($country, $allowedCountries)) { // Si le pays n'est pas présent dans le tableau des pays autorisés
                $errors['country'] = 'Le pays n\'existe pas.';
            }

            // Quand le formulaire est valide, on ajoute la brasserie dans la BDD
            if (empty($errors)) {
                $query = $db->prepare('UPDATE brewery SET
                `name` = :name, address = :address, city = :city, zip = :zip, country = :country
                WHERE id = :id');
                $query->bindValue(':id', $brewery['id'], PDO::PARAM_INT);
                $query->bindValue(':name', $name, PDO::PARAM_STR);
                $query->bindValue(':address', $address, PDO::PARAM_STR);
                $query->bindValue(':city', $city, PDO::PARAM_STR);
                $query->bindValue(':zip', $zip, PDO::PARAM_STR);
                $query->bindValue(':country', $country, PDO::PARAM_STR);
                $result = $query->execute(); // Raccourci du bindValue mais ne fonctionne que pour les chaines (PDO::PARAM_STR)
                if ($result) { // On s'assure que la requête s'est bien déroulée
                    echo '<div class="alert alert-success">
                        La brasserie a été modifiée.
                    </div>';
                }
            }

            // Quand le formulaire n'est pas valide, on affiche les erreurs
            if ($errors) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo '<p>' . $error . '</p>';
                }
                echo '</div>';
            }
        }
    ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="form-control <?php echo isset($errors['address']) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
        </div>
        <div class="form-group">
            <label for="city">Ville</label>
            <input type="text" name="city" id="city" class="form-control <?php echo isset($errors['city']) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
        </div>
        <div class="form-group">
            <label for="zip">Code postal</label>
            <input type="text" name="zip" id="zip" class="form-control <?php echo isset($errors['zip']) ? 'is-invalid' : ''; ?>" value="<?php echo $zip; ?>">
        </div>
        <div class="form-group">
            <label for="country">Pays</label>
            <select name="country" id="country" class="form-control">
                <option>Choisissez votre pays</option>
                <option <?php echo ($country == 'France') ? 'selected' : ''; ?>>France</option>
                <option <?php echo ($country == 'Belgique') ? 'selected' : ''; ?>>Belgique</option>
                <option <?php echo ($country == 'Royaume-Uni') ? 'selected' : ''; ?>>Royaume-Uni</option>
                <option <?php echo ($country == 'Irelande') ? 'selected' : ''; ?>>Irelande</option>
                <option <?php echo ($country == 'Allemagne') ? 'selected' : ''; ?>>Allemagne</option>
                <option <?php echo ($country == 'Italie') ? 'selected' : ''; ?>>Italie</option>
            </select>
        </div>
        <button class="btn btn-primary">Modifier</button>
        <!--<input class="btn btn-primary" type="submit" value="Modifier">-->
    </form>
</div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');

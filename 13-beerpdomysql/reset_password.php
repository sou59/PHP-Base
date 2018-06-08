<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php');

// Vérifie que l'id et le token correspondent
if ( empty($_GET['id']) || empty($_GET['token']) || !isValidToken($_GET['token'], $_GET['id']) ) {
    echo 'Le token n\'est pas valide';
    exit(); // On arrête le script PHP
}

?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>Redéfinir mon mot de passe</h1>

    <?php
        if (!empty($_POST)) {
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];

            $error = null;

            if (empty($password) || $password != $cfpassword) {
                $error = 'Le mot de passe n\'est pas valide';
            }

            if (!$error) {
                $query = $db->prepare('UPDATE user SET password = :password WHERE id = :id');
                $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_INT);
                if ($query->execute()) {
                    echo 'Le mot de passe a été changé.';
                }
            }
        }
    ?>

    <form method="POST">
        <div class="form-group">
            <label for="password">Nouveau mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="cfpassword">Confirmer le nouveau mot de passe</label>
            <input type="password" name="cfpassword" id="cfpassword" class="form-control">
        </div>
        <button class="btn btn-primary">Modifier mon mot de passe</button>
    </form>
</div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');
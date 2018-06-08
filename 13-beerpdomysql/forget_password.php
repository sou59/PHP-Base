<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require('partials/header.php'); ?>

<!-- Le contenu de la page -->
<div class="container pt-5">
    <h1>Mot de passe oublié</h1>

    <?php if (!empty($_POST)) {
        $email = $_POST['email'];

        // Vérifier si l'email existe dans la BDD
        $query = $db->prepare('SELECT COUNT(*) FROM user WHERE email = :email');
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $emailExists = (bool) $query->fetchColumn(); // Force le retour de fetchColumn en booléen
        var_dump($emailExists);

        if ($emailExists) {
            echo 'Envoi du mail';
            mail('matthieumota@gmail.com', 'Sujet', 'Message');
        }

        echo 'Un email a été envoyé';
    } ?>

    <form method="POST">
        <div class="form-group"> 
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <button class="btn btn-primary">Envoyer un mail</button>
    </form>
</div>

<?php
// Inclure le fichier partials/footer.php
require('partials/footer.php');

<?php

// Inclure le fichier config/database.php
// Inclure le fichier partials/header.php
require_once 'vendor/autoload.php';
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
            // Récupère le user
            $user = $db->query('SELECT * FROM user WHERE email = "'.$email.'"')->fetch();

            // Permet de générer une URL complète vers le projet
            $baseUrl = 'http://localhost'.dirname($_SERVER['REQUEST_URI']);
            $token = hash('sha256', $user['id'].$user['password'].$user['created_at']);
            $link = $baseUrl.'/reset_password.php?token='.$token.'&id='.$user['id'];

            $password = include 'password.php';
            // Create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
                ->setUsername('webforcelille2@gmail.com')
                ->setPassword($password)
                ->setEncryption('tls')
                ->setStreamOptions([
                    'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                    ]
                ])
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            $message = (new Swift_Message('Wonderful Subject'))
                ->setFrom(['john@doe.com' => 'John Doe'])
                ->setTo(['matthieumota@gmail.com'])
                ->setBody('Lien pour le mot de passe : '.$link)
            ;

            // Send the message
            $result = $mailer->send($message);
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

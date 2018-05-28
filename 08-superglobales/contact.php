<?php
// On déclare les variables pour éviter les erreurs
$email = null;
$subject = null;
$message = null;
if (!empty($_POST)) { // Récupére les informations saisies dans le formulaire
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
} ?>

<form method="POST">
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>" />
    </div><br />
    <div>
        <label for="subject">Sujet</label>
        <input type="text" name="subject" id="subject" value="<?php echo $subject; ?>" />
    </div><br />
    <div>
        <label for="message">Message</label>
        <textarea name="message" id="message"><?php echo $message; ?></textarea>
    </div><br />

    <button>Envoyer</button>
</form>

<?php

var_dump(filter_var('matthieu@a.fr', FILTER_VALIDATE_EMAIL));

if (!empty($_POST)) { // Si le formulaire est soumis
    $isValid = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Vérifie si l'email est valide
        $isValid = false;
        echo 'L\'email n\'est pas valide. <br />';
    }

    // Ou strlen($subject) == 0
    if (empty($subject)) {
        $isValid = false;
        echo 'Le sujet ne doit pas être vide. <br />';
    }

    if (strlen($message) < 15) {
        $isValid = false;
        echo 'Le message est trop court.';
    }

    if ($isValid) {
        echo 'Le formulaire a été envoyé.';
    }

    /*if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($subject) && strlen($message) >= 15) {
        echo 'Le formulaire a été envoyé.';
    }*/
}

<?php

    echo "Créer un fichier contact.php <br \>";
    echo "Créer un formulaire avec 3 champs : email, Sujet et Message<br \>";
    echo "L'email doit être valide<br \>";
    echo "Le sujet ne doit pas être vide<br \>";
    echo "Le message doit faire au minimum 15 caractères<br \>";
    echo "---------------------------------------------<br \>";

    $email = null;
    $sujet = null;
    $message = null;

if (!empty($_POST)) { //1er chose si le tableau n'est pas vide, est soumis
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];
}
?>
<form method="POST">
    <div>
    <label for="email">Email : </label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Saisir votre email" />
    </div>
    <br \>
    <div>
    <label for="sujet">Sujet : </label>
    <input type="text" name="sujet" id="sujet" value="<?php echo $sujet; ?>"  placeholder="Saisir votre sujet" />
    </div><br \>
    <div>
    <label for="message">Message : </label>
    <textarea name="message" value="<?php echo $message; ?>" id="message" placeholder="Saisir votre message" /></textarea>
    </div><br \>
    <p>
    <button id="button">Envoyer</button></p>
</form>

<?php


//var_dump(filter_var('matthieur'));
if (!empty($_POST)) { //1er chose si le tableau n'est pas vide, est soumis

    $isValid = true;

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // ou avec !
        $isValid = false;
        echo "Vous mail n'ai pas valide<br \>";
        exit();
    }
    if (empty($sujet)) {
        $isValid = false;
        echo "Vous devez remplir le champs sujet <br \>";
        exit();
    }
    if (strlen($message) < 15) {
        $isValid = false;
        echo "Le message est trop court <br \>";
        exit();
    }

    if ($isValid) {
        echo "Le message a bien été envoyé <br \>";
    }
}








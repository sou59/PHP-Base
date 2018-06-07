<?php 
require(__DIR__.'/partials/header.php');

if (userIsLogged()) {
    header('Location: index.php');
}

?>

<div class="container pt-5">
    <h1>Inscription</h1>

    <?php
        if (!empty($_POST)) { // Si on a soumis le formulaire
            $login = str_replace(' ', '', trim(strip_tags($_POST['login']))); // On supprime les balises HTML
            $email = $_POST['email'];
            $password = trim($_POST['password']);
            $cfpassword = trim($_POST['cfpassword']);
            $errors = [];
            if (empty($login)) { // On vérifie que le login n'est pas vide
                $errors['login'] = 'Le login est vide.';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // On vérifie que l'email soit valide
                $errors['email'] = 'L\'email n\'est pas valide.';
            }
            // Vérification mot de passe
            if (empty($password) || $password != $cfpassword) {
                $errors['password'] = 'Les mots de passe sont vides ou ne correspondent pas.';
            }
            // Inscription de l'utilisateur
            if (empty($errors)) {
                $query = $db->prepare('INSERT INTO user
                (login, email, password, created_at) VALUES
                (:login, :email, :password, NOW())');
                $query->bindValue(':login', $login, PDO::PARAM_STR);
                $query->bindValue(':email', $email, PDO::PARAM_STR);
                $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
                if ($query->execute()) { // On ajoute l'utilisateur dans la BDD
                    echo '<div class="container"><p class="bg-success text-center">Vous êtes bien inscrit.</p></div>';
                }
            }
            //var_dump($login, $email, $password, $cfpassword, $errors);
        }
    ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="login">Login : </label>
            <input type="text" name="login" class="form-control <?php echo isset($errors['login']) ? 'is-invalid' : ''; ?>" id="login">
            <?php if (isset($errors['login'])) {
                    echo '<div class="invalid-feedback">';
                    echo $errors['login'];
                echo '</div>';
            } ?> 
        </div>
        <div class="form-group">
            <label for="email">Email address :</label>
            <input type="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" id="email" aria-describedby="emailHelp">
            <small id="email2" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <?php if (isset($errors['email'])) {
                    echo '<div class="invalid-feedback">';
                    echo $errors['email'];
                echo '</div>';
            } ?>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" id="password">
            <?php if (isset($errors['password'])) {
                    echo '<div class="invalid-feedback">';
                    echo $errors['password'];
                echo '</div>';
            } ?>
        </div>
        <div class="form-group">
            <label for="cfpassword">Confirmer le mot de passe :</label>
            <input type="password" name="cfpassword" class="form-control <?php echo isset($errors['cfpassword']) ? 'is-invalid' : ''; ?>" id="cfpassword" aria-describedby="cfpassword">
            <?php if (isset($errors['cfpassword'])) {
                    echo '<div class="invalid-feedback">';
                    echo $errors['cfpassword'];
                echo '</div>';
            } ?>
        </div>
        

        <button class="btn btn-primary">S'inscrire</button>
    </form>
</div>




<?php 
//var_dump($_POST);

require(__DIR__.'/partials/footer.php');
?>
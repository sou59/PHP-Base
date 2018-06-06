<?php 
require(__DIR__.'/partials/header.php');
?>

<div class="container">
    <h1>Inscription</h1>

     <!-- traitement du formulaire -->
    <?php
     if (!empty($_POST)) {
        
        $login = str_replace(' ', '', trim(strip_tags($_POST['login'])));

        $email = trim($_POST['email']);

        $password = trim($_POST['password']);

        $cfpassword = trim($_POST['cfpassword']);


        $errors = [];

        if (empty($login)) {
            $errors['login'] = 'Le login est non valide';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email est non valide';
        }
        if (empty($password) || $password != $cfpassword) {
            $errors['password'] = 'Les MDP sont vides ou correspondent pas ';
        }

        if (empty($errors)) {
            $query = $db->prepare('INSERT INTO user (login, email, password, create_at) VALUES(:login, :email, :password, NOW()');
            $query->bindValue(':login', $login, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            if ($query->execute()) {
                echo 'Vous êtes bien inscrit.';
            }

            echo '<div class="alerte alert-sucess">Vous avez bien été enregistré</div>';
        }  
        var_dump($errors);
    

        //var_dump($login, $email, $password, $cfpassword, $errors);

     }


    ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="login">Login : </label>
            <input type="text" name="login" class="form-control" id="login">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small id="email2" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="cfpassword">Confirmer le mot de passe</label>
            <input type="password" name="cfpassword" class="form-control" id="cfpassword" aria-describedby="cfpassword">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




<?php 
var_dump($_POST);

require(__DIR__.'/partials/footer.php');
?>
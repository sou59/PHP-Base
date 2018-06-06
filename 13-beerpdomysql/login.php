<?php 
require(__DIR__.'/partials/header.php');

?>

<div class="container pt-5">
    <h1>Login</h1>

    <?php
      if (!empty($_POST)) {
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
      //  Récupération de l'utilisateur et de son passwor hashé
        $query = $bd->prepare('SELECT * FROM user WHERE login = :login');
        $query->execute(array(
            'login' => $login));

        $resultat = $query->fetchAll();

        //   $login = $_POST['login'];
        //   $email = $_POST['email'];
        //   $password = $_POST['password'];


        } 

    ?>

    <form method="POST" action="">
      <div class="form-group">
        <label for="login">Login</label>
        <input type="text" name="login" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Votre login">
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Votre Email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Votre mot de passe">
      </div>

      <button class="btn btn-primary">Login</button>
    </form>

</div>

<?php 

require(__DIR__.'/partials/footer.php');
?>
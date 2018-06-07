<?php
// attention session doit
require(__DIR__.'/partials/header.php');

?>

<div class="container pt-5">
    <h1>Se connecter</h1>

    <?php
      if (!empty($_POST)) {
          $email = $_POST['email'];
          $password = $_POST['password'];

        // Vérifie que lemail existe en BDD
          $query = $db->prepare('SELECT * FROM user WHERE email = :email');
          $query->bindValue(':email', $email, PDO::PARAM_STR);
          $query->execute();

          $user = $query->fetch(); // retourne un tableau avec le user ou false

          $error = null;

          // si le user n'existe pas en BDD
          if (!$user) {
            $error = 'Le login n\'existe pas';
          }

          // est-ce que le mot de passe est correct ?
          if ($user && !password_verify($password, $user['password'])) {
            $error = 'Le mot de passe n\'est pas correcte';
          }
         

          // Si le user existe, on peut se connecter
          if (!$error) {
            // Ajout dans la session
            unset($user['password']); // enlevé le mdp pour qu'il ne s'affiche pas dans le var_dump
            $_SESSION['user'] = $user;
          }
          var_dump($error);
      } 

    ?>

    <form method="POST" action="">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>

      <button class="btn btn-primary">Login</button>
    </form>

</div>

<?php 

require(__DIR__.'/partials/footer.php');
?>
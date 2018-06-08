<?php
// attention session doit
require(__DIR__.'/partials/header.php');

?>

<div class="container pt-5">
    <h1>Se connecter</h1>

    <?php

      // si la variable existe et n'est pas vide
      if (!empty($_POST)) {
          $email = $_POST['email'];
          $password = $_POST['password'];

        // Vérifie que l'email existe en BDD
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
            $token = hash('sha256', $user['id'].$user['password'].$user['created_at']);

            // Ajout de l'utilisateur dans la session
            unset($user['password']); // enlevé le mdp haché par sécurité
            $_SESSION['user'] = $user;

            // Si on coche la case "Remember me", on ajoute un cookie
             // domaine site pass... pour dire que l cookies ne sapplique qu'à ce domaine là par exemple
            if (isset($_POST['rememberme'])) { 
              setcookie('id', $user['id'], time() + 60 * 60 * 24 * 365);
              setcookie('token', $token, time() + 60 * 60 * 24 * 365);
            }
            // Après la connexion, on veut rediriger l'utilisateur vers la dernière page sur laquelle il était
            header('Location: '.$_GET['referer']);
            exit();
          }           
          var_dump($error);
      } 
     // var_dump($_SERVER);
      // HTTP_REFERER dernière page consulté, ou si rien envoyé sur la page d'accueil

    ?>
<!-- Le action nous permet soit de rediriger vers la dernière page après le login ou vers la page d'accueil -->
    <form method="POST" action="?referer=<?php echo $_SERVER['HTTP_REFERER'] ?? 'index.php'; ?>">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>
      
      <div class="form-check">
        <input type="checkbox" name="rememberme" class="form-check-input" id="rememberme">
        <label class="form-check-label" for="rememberme">Se souvenir de moi</label>
      </div>

      <a href="forget_modepasse.php">Modifier mon mot de passe</a>
      <button class="btn btn-primary">Login</button>
    </form>

</div>

<?php 

require(__DIR__.'/partials/footer.php');
?>
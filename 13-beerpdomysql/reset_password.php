<?php
require(__DIR__.'/partials/header.php');


if(empty($_GET['id']) || empty($_GET['token']) || !isValidToken($_GET['token'], $_GET['id'])) {
    echo 'Le token est non valide';
    exit();

}
?>


<div class="container pt-5">
    <h1>Redéfinir mon mot de passe</h1>

    <?php
        if (!empty($_POST)) {
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];

            $error = null;

            if (empty($password) || $password != $cfpassword) {
                $query = $db->prepare('SELECT * FROM user id = :id');
                $query->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
                $query->bindValue(':password', passeword_hash($password), PASSWORD_DEFAULT, PDO::PARAM_STR);
                if($query->execute()) {
                    echo 'Le mot de passe a été changé.';
                }



            }

        }

    ?>


    <form method="POST">
    <div class="form-group">
        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" class="form-control" id="password">
      </div>

      <div class="form-group">
        <label for="cfpassword">Comfirmer le nouveau mot de passe</label>
        <input type="password" name="cfpassword" class="form-control" id="cfpassword">
      </div>

      <button class="btn btn-primary">Modifier mon mot de passe</button>
    </form>
</div>





<?php

require(__DIR__.'/partials/footer.php');
?>

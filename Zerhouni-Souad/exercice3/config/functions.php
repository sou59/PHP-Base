<?php


    // si le film existe se connecter à la table movies
    function filmExists($id) {
        global $db;
        $query =  $db->prepare('SELECT * FROM movies WHERE id = :id'); // :id est un paramètre
        $query->bindValue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
        $query->execute(); // Execute la requête
        $film = $query->fetch();
        
        return $film;

    }
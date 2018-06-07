<?php

// var_dump($_SESSION);
// var_dump($_SERVER['HTTP_REFERER']);
// Permet de transformer/slugifier un nom
    // Exemple : le Ch'ti Ambrée -> chti-ambree
    function slugify($string) {
        
        $newString = str_replace(' ', '-', $string);
        $newString = str_replace('\'', '', $newString);
        $newString = str_replace(['à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ',
                'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã',
                'Ä','Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ',
                'Ö', 'Ù','Ú','Û','Ü', 'Ý'], ['a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n',
                'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A',
                'C','E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O',
                'U','U','U','U', 'Y'], $newString);
        $newString = strtolower($newString);   
        
        return $newString;
    }
    
    // Débug du formulaire
    //var_dump($_POST);
    // Débug de l'upload
    //var_dump($_FILES);


    // s'il n'y a la brasserie existe se connecter à la table brasserie
    function breweryExists($id) {
        global $db;
        $query =  $db->prepare('SELECT * FROM brewery WHERE id = :id'); // :id est un paramètre
        $query->bindValue(':id', $id, PDO::PARAM_INT); // On s'assure que l'id est bien un entier
        $query->execute(); // Execute la requête
        $brewery = $query->fetch();
        
        return $brewery;

    }


    function saveLastVisitedPage() {
        if (!isset($_SERVER['HTTP_REFERER'])) {
            return;
        }
        $urlLastPage = $_SERVER['HTTP_REFERER'];
        $_SESSION['lastPage'] = $urlLastPage;
    
    }

    saveLastVisitedPage();

    function userIsLogged() {
        // ecriture réduite pour voir si la session est ouverte ou pas (true / false)
        // idem que if (isset($_SESSION['user'])) {retur true; } return false;
        return isset($_SESSION['user']);
    }

    // vérifie si un cookie est présent chez l'utilisateur et le connecte
    function cookieAuthentification() {
        global $db;
        if(isset($_COOKIE['id'])) {
            $idUser = $_COOKIE['id'];
            $query = $db->query('SELECT * FROM user WHERE id = '.$idUser);
            $user = $query->fetch();

            $token = $_COOKIE['token'];

            if ($token == hash('sha256', $user['id'].$user['password'].$user['created_at'])) {
                unset($user['password']); // on enleve le mot de passe hashé par sécurité
                $_SESSION['user'] = $user;
            }
        }
    }

    cookieAuthentification();




<?php

// Permet de transformer/slugifier un nom
// Exemple : Ch'ti Ambrée -> chti-ambree
function slugify($string) {
    $newString = str_replace(' ', '-', $string);
    $newString = str_replace('\'', '', $newString);
    $newString = str_replace(['à', 'á', 'â', 'ã', 'ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ',
    'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã',
    'Ä','Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ',
    'Ö', 'Ù','Ú','Û','Ü', 'Ý'], ['a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n',
    'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A',
    'C','E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O',
    'U','U','U','U', 'Y'], $newString);
    $newString = strtolower($newString);

    return $newString;
}

// La fonction permet de vérifier si une brasserie existe ou non en BDD (true ou false)
function breweryExists($id) {
    global $db;  // Permet d'utiliser la variable $db définie en dehors de la fonction
    $query = $db->prepare('SELECT * FROM brewery WHERE id = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $brewery = $query->fetch();
    
    return $brewery; // La fonction retourne un tableau avec la brasserie ou false si la brasserie n'existe pas
}

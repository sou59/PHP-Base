<?php 

// vérifier si le dossier log existe à la racine du projet
// s'il n'existe pas on doit le créer

$folder = __DIR__.'/../log'; // c:/xampp/htdocs/PHP-Base/13-beerpdomysl/log

if (!is_dir($folder)) {
    mkdir($folder);
}

if (isset($_GET['search'])) {
// Définis le fichier de log pour le 
$filename = $folder.'/search.log'; // c:/xampp/htdocs/PHP-Base/13-beerpdomysl/log/search.log

// on ouvre le fchier et on place le curseur à la fin
// on le stocke dans $file
$file = fopen($filename, 'a+');

// var_dump($_SERVER);

// on écrit dans le fichier, on ajoute une ligne
// [Recherche] Un utilisateur a cherché "Duvel" le 05/06/2018 à 11h45]
$q = $_GET['search'];

$log = '[Recherche] Un utilisateur ('.$_SERVER['REMOTE_ADDR'].') a cherché "' .$q. '" le ' .date('d/m/y à H\hi') . PHP_EOL; 
// équivaut à \r\n ou \n

fwrite($file, $log);
// On peut/doit fermer le fichier comme on ferme Word
fclose($file);

}

//var_dump();
if (isset($_POST['address'])) {
    // Définis le fichier de log pour le 
    
    $filename = $folder.'/addBeer.log'; // c:/xampp/htdocs/PHP-Base/13-beerpdomysl/log/addBeer.log
    
    // on ouvre le fchier et on place le curseur à la fin
    // on le stocke dans $file
    $file = fopen($filename, 'a+');
    
    // // var_dump($_SERVER);
    
    // // on écrit dans le fichier, on ajoute une ligne
    // // [Recherche] Un utilisateur a cherché "Duvel" le 05/06/2018 à 11h45]
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];

    // foreach($addbeer as $val){
    //     fputs($file,$val);
    // }
    
    $log = '[Ajouter] Un utilisateur ('.$_SERVER['REMOTE_ADDR'].') a ajouté une brasserie. 
    Nom : "' .$name. '" ; 
    Adresse : "' .$address. '" ; 
    Ville : "' .$city. '" ; 
    CP : "' .$zip. '" ; 
    Pays : "' .$country. '" ; 
    le ' .date('d/m/y à H\hi') . PHP_EOL; 
    // // équivaut à \r\n ou \n
    var_dump($file);
    fwrite($file, $log);
    // // On peut/doit fermer le fichier comme on ferme Word
    fclose($file);

}



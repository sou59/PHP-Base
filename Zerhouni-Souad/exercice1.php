<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Tableau de contacts</title>
  </head>
  <body>

<!-- // Exercice 1 : « On se présente ! »
// Créer un tableau en PHP contenant les infos suivantes :
// ● Prénom
// ● Nom
// ● Adresse
// ● Code Postal
// ● Ville
// ● Email
// ● Téléphone
// ● Date de naissance au format anglais (YYYY-MM-DD)
// A l’aide d’une boucle, afficher le contenu de ce tableau (clés + valeurs) dans une liste HTML.
// La date sera affichée au format français (DD/MM/YYYY).
// Bonus :
// Gérer l’affichage de la date de naissance à l’aide de la classe DateTime -->

    <div class="container" pt-5>      
        <h1> Liste de contacts </h1>
    
        <?php

        $contacts = [
            0 => [
                'firstName' => 'Marcel',
                'lastName' => 'Proust',
                'address' => '12 rue des Ponts',
                'zip' => '59000',
                'ville' => 'Lille',
                'email' => 'marcel.proust@gmail.com',
                'phone' => '06.36.42.00.88',
                'dateNaissance' => '12 january 2001',                
            ],
            1 => [
                'firstName' => 'Thomas',
                'lastName' => 'Dupont',
                'address' => '12 rue des Tartines',
                'zip' => '62000',
                'ville' => 'Lens',
                'email' => 'thomas.dupont@gmail.com',
                'phone' => '06.42.59.36.22',
                'dateNaissance' => '10 march 1982',      
                ],
            ];

           // var_dump($contacts);

          
            foreach ($contacts as $contact) {

                //  Affichage de la date de naissance au format DD/MM/YYYY
                $dateAnniv = new DateTime($contact['dateNaissance']);
                $dateNais = $dateAnniv->format('d/m/y');
                //echo $dateAnniv->format('d/m/y');
       
                // Calcul de l'âge
                $now = time();
                $dateNaissance = strtotime($contact['dateNaissance']);
                $age = floor(($now - $dateNaissance) / (365 * 24 * 60 * 60));

                echo $contact['firstName']. ' '.$contact['lastName']. ' est né le ' .$dateNais. ', il a '.$age.' ans. Il habite '.$contact['address']. ' à ' .$contact['ville']. ' ('.$contact['zip'].'). Il est joignable au '.str_replace('.', ' ', $contact['phone']).'. Son adresse Email : '.$contact['email'].'. <br \>';

            }
            ?>

    </div> 
    
 


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>   






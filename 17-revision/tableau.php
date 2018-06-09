<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Révision : tableau de contact</title>
  </head>
  <body>

        <div class="container" pt-5>      
        <h1> Liste de contact </h1>
    
        <?php

        $contacts = [
            0 => [
                'nom' => 'Fréchette',
                'prenom' => 'Auguste',
                'dateNaissance' => '30 novembre 1942',
                'cp' => '92190',
                'ville' => 'MEUDON',
                'phone' => '01.22.88.26.88'
            ],
            1 => [
                'nom' => 'Duranseau',
                'prenom' => 'Algernon',
                'dateNaissance' => '2 novembre 1966',
                'cp' => '91190',
                'ville' => 'GIF-SUR-YVETTE',
                'phone' => '01.80.31.88.75'
                ],
            2 => [
                'nom' => 'Duplessis',
                'prenom' => 'Armand',
                'dateNaissance' => '29 juillet 1953',
                'cp' => '77380',
                'ville' => 'COMBS-LA-VILLE',
                'phone' => '01.07.46.25.64'
                ],
            3 => [
                'nom' => 'LaGrande',
                'prenom' => 'Zacharie',
                'dateNaissance' => '27 février 1990',
                'cp' => '80090',
                'ville' => 'AMIENS',
                'phone' => '03.02.52.82.94'
                ],
            3 => [
                'nom' => 'Bourassa',
                'prenom' => 'Aubrey',
                'dateNaissance' => '14 novembre 1982',
                'cp' => '33800',
                'ville' => 'BORDEAUX',
                'phone' => '05.55.59.61.44'
                ],
            ];

            
                    
            foreach ($contacts as $contact) {
    
                $now = time();
                echo $now. ' <br \>';

                $dateNaissance = strtotime($contact['dateNaissance']);
                $age = floor(abs($now - $dateNaissance) / (365 * 24 * 60 * 60));
                
                echo $contact['prenom']. ' '.$contact['nom']. ' est né le '.$contact['dateNaissance'].', il a '.$age.' ans. Il habite à '.$contact['ville'].' ('.$contact['cp'].'). Il est joignable au '.str_replace('.', ' ', $contact['phone']).'.<br \>';
            }
            ?>
            </h1>
        </div> 
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>   






<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <title>On part en voyage</title>
  </head>
  <body>

<!-- 
Exercice 2 : « On part en voyage »
Créer une fonction permettant de convertir un montant en euros vers un montant en dollars
américains.
Cette fonction prendra deux paramètres :
● Le montant de type int ou float
● La devise de sortie (uniquement EUR ou USD).
Si le second paramètre est “USD”, le résultat de la fonction sera, par exemple :
1 euro = 1.085965 dollars américains
Il faut effectuer les vérifications nécessaires afin de valider les paramètres.

 -->

        <div class="container" pt-5>      
        <h1> Conversion de devises </h1>


        <?php
        function convert($montant, $devise) {
           //aujourdh'ui  1 dollars = 0,848054859 euro
           // 1 EUR =1.17864 USD

            $dollars = $montant * 1.17908;
            $euros = $montant * 0.84821;

            if ($devise == 'USD') {
              return $montant.' dollars = '.$euros.' euros.';
              } elseif ($devise == 'EUR') {
              return $montant. ' euros = '.$dollars. ' dollars américain.';
              }
          } 
          
          echo convert(1, 'USD');
          echo '<br \>';
          echo convert(1, 'EUR'); 
 
        ?>

        
       
    
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>   






<?php

    for ($i = 10; $i > 0; $i--) {
        echo $i . " - " ;
    }
    echo "<br \>";

    for ($i = 1; $i <= 100; $i++){
        if ($i % 2 == 0){ // si le nombre est divisible par 2
            echo $i . " - ";
        }
    }

    //pgcd
    // tant que %(x-y) != 0 x>y 
    //soit un couple d'entiers naturels non nuls (a,b), si des entiers naturels q et r, avec r ≠ 0, sont tels que a = bq + r , alors : PGCD(a,b) = PGCD(b,r).

    $nombre1 = 845;
    $nombre = 312;
    $reste = null;
    $resultat = null;

    845 % 312 = 221;
    312 % 221 = 91;

    while ($reste !== 0){
        
    }

        

    function pgcd($a,$b)
    {
        for($c = $a % $b ; $c != 0; $c= $a%$b ) :
           $a = $b; $b = $c;
        endfor;
             
        return $b;
    }



    // fizzbuzz

    for ($i = 0; $i <= 100; $i+=1){
        echo $i . "<br \>";
        if ($i % 3 ) {
            echo "Fizz" . "<br \>";
        }elseif ($i % 5) {
            echo "Buzz" . "<br \>";
        }elseif ($i % 15) {
            echo "FizzBuzz" . "<br \>";
        }else {
            echo $i . "<br \>";
        }
    }


?>
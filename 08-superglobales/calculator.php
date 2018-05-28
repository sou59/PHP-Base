
<?php
echo "Dans ce formulaire, créer un champ nombre1 et un champ nombre2";
echo "<br \>";
echo "Au clic sur le bouton 'Calculer', faire la somme du nombre1 et du nombre2";
echo "<br \>";
echo "Ajouter un champ radio ou select permettant de choisir l'opération (+, -, /, *)";
?>
<form method="POST">
    <p>
    <label for="nombre1">Nombre 1</label>
    <input type="text" name="nombre1" id="nombre1" placeholder="Saisir votre premier nombre" /></p>
    <p>
    <label for="nombre2">Nombre 2</label>
    <input type="text" name="nombre2" id="nombre2" placeholder="Saisir votre deuxième nombre" /></p>
    <div>
    <label for="plus">➕</label>
    <input type="radio" id="plus" name="operator" value="+" />
    
    <label for="moins">➖</label>
    <input type="radio" id="moins" name="operator" value="-" />
    
    <label for="divise">➗</label>
    <input type="radio" id="divise" name="operator" value="/" />

    <label for="multiplie">✖️</label>
    <input type="radio" id="multiplie" name="operator" value="*" />
    </div>
    <p>
    <button id="button">Envoyer</button></p>
</form>

<?php

echo "<br \>";


if (!empty($_POST)) {
    $operator = $_POST['operator'];
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $resultat = 0;
// ne jamais utiliser eval("echo shell_exec...")!!!!
// si nbre1 ou nbr2 ne sont pas des nombres valides
    if (!is_numeric($nombre1)  || !is_numeric($nombre2)) {
        echo "Les nombres saisies ne sont pas valides";
        exit(); // on arrête le script
    }
    if ($nombre2 == 0 && $operator == '/') {
        echo "Attention division par zero impossible";
        exit(); // on arrête le script
    }

    switch ($operator) {
        case '+': 
            $resultat = $nombre1 + $nombre2;
            break;
        case '-': 
            $resultat = $nombre1 - $nombre2;
            break;
        case '/': 
            $resultat = $nombre1 / $nombre2;
            break;
        case '*': 
        $resultat = $nombre1 * $nombre2;
        break;            
    }
    echo $resultat;
}

var_dump($_POST);



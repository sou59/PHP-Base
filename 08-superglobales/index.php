<?php
// Les superglobales : on accède (ne jamais les mettre égale à autre choses, sinon écrase ce qui est existant)
//on peur acceder aux données grace de l'URL

var_dump($_GET);

if (isset($_GET['id'])) { // Vérifie que id soit vbien présent dans l'url
    $id = $_GET['id']; // on peur récupérer un id dans l'url
    if ($id == 5) {
        echo 'utilisateur 5';
    }

}

// récupérer le paramètre name dans l'url (index.php?name=titi)
// et l'afficher sur al apgae --> 'Hello titi"
?>
<ul>
    <li><a href="index.php?name=toto">Toto</a></li>
    <li><a href="index.php?name=titi">Titi</a></li>
    <li><a href="index.php?name=tata">Tata</a></li>
</ul>

<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo 'Hello ' . $name;
}


// on a également accès au $_POST;
var_dump($_POST); 
?>
<!-- 
    envoie requete au serveur

-->
<form method="POST">
<label for="age">Votre âge</label>
    <input type="text" name="age" placeholder="Saisir votre âge" />
    <button>Envoyer</button>
</form>





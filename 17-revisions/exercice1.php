<?php

$contacts = [
    [
        'firstname' => 'Auguste',
        'name' => 'Fréchette',
        'birthday' => strtotime('1942-11-30'),
        'address' => '92190 MEUDON',
        'phone' => '01.22.88.26.88'
    ],
    [
        'firstname' => 'Algernon',
        'name' => 'Duranseau',
        'birthday' => strtotime('1966-11-02'),
        'address' => '91190 GIF-SUR-YVETTE',
        'phone' => '01.80.31.88.75'
    ],
    [
        'firstname' => 'Armand',
        'name' => 'Duplessis', 
        'birthday' => strtotime('1953-07-29'),
        'address' => '77380 COMBS-LA-VILLE',
        'phone' => '01.07.46.25.64'
    ],
    [
        'firstname' => 'Zacharie',
        'name' => 'LaGrande', 
        'birthday' => strtotime('1990-02-27'),
        'address' => '80090 AMIENS',
        'phone' => '03.02.52.82.94'
    ],
    [
        'firstname' => 'Aubrey',
        'name' => 'Bourassa', 
        'birthday' => strtotime('1982-11-04'),
        'address' => '33800 BORDEAUX',
        'phone' => '05.55.59.61.44'
    ]
];
// 1ère méthode
$months = [
    'janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'
];
// 2ème méthode (Il faut que la langue soit présente)
setlocale(LC_TIME, 'fr');

// Formater l'adresse de 33800 BORDEAUX à Bordeaux (33800)
function formatAddress($address) {
    $result = explode(' ', $address, 2); // On sépare le code postal et la ville

    return ucwords(strtolower($result[1]), '- ') . ' (' . $result[0] . ')'; // BORDEAUX (33800)
}

// Calcul de la différence entre 2 dates
$dateToday = time(); // Timestamp du jour (nombre de secondes depuis le 1er janvier 1970)
$dateBirthday = strtotime('18 november 1991'); // Timestamp d'une date
echo ($dateToday - $dateBirthday) / (365.25 * 24 * 60 * 60) . '<br />';

// Alternative pour calculer la différence
$dateToday = new DateTime(); // Génére un objet DateTime
$dateBirthday = new DateTime('18 november 1991');
echo $dateBirthday->format('l d/m/Y'); // Formater un objet DateTime
//echo $dateBirthday->modify('+1 year')->format('l d/m/Y'); // On peut modifier une date par rapport à un interval
var_dump($dateBirthday->diff($dateToday));
echo $dateBirthday->diff($dateToday)->y; // On récupère uniquement l'année

foreach ($contacts as $contact) {
    $day = date('j ', $contact['birthday']); // 26
    $month = $months[date('n', $contact['birthday']) - 1]; // novembre
    $year = date(' Y', $contact['birthday']); // 1991

    // 2ème méthode
    var_dump(utf8_encode(strftime('%d %B %Y', $contact['birthday'])));

    // calcul de l'âge
    $age = floor((time() - $contact['birthday']) / (365 * 24 * 60 * 60));

    echo $contact['firstname'] . ' ' . $contact['name'] . ' est né le ' . $day . $month . $year . ', il a ' . $age . ' ans.
         Il habite à ' . formatAddress($contact['address']) . '. Il est joignable au ' . str_replace('.', ' ', $contact['phone']) . ' <br />';
}

<?php

require_once 'vendor/autoload.php';

$password = include '../13-beerpdomysql/password.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
  ->setUsername('webforcelille2@gmail.com')
  ->setPassword($password)
  ->setEncryption('tls')
  ->setStreamOptions([
    'ssl' => [
      'verify_peer' => false,
      'verify_peer_name' => false
    ]
  ])
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['john@doe.com' => 'John Doe'])
  ->setTo(['matthieumota@gmail.com'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);
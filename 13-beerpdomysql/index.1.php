<?php

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
  ->setUsername('$mail')
  ->setPassword('$word')
  ->setEncryption('tls')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['john@doe.com' => 'John Doe'])
  ->setTo(['$mailAmoi'])
  ->setBody('Here is the message itself')
;

// Send the message
$result = $mailer->send($message);

var_dump($result);
<?php
header('Content-Type: application/json');

// On inclut le fichier autoload du dossier vendor
require __DIR__ . '/vendor/autoload.php';


// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
->setUsername('surassur.amc@gmail.com')
->setPassword("surassuramc1367");



// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
// Create a message
$message = (new Swift_Message("Nouveau message de {$_POST['name']}[{$_POST['email']}] : {$_POST['subject']}"))
    ->setFrom(['surassur.test@gmail.com'])
    ->setTo(['soufi.chamalaine@gmail.com'])
    ->setReplyTo($_POST['email'])
    ->setBody($_POST['message']);
// Send the message
$result = $mailer->send($message);
echo json_encode([
    'result' => $result
]);
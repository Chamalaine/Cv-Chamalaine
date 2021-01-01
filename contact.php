<?php


$email=$_POST['email'];
$message=$_POST['message'];
$subject=$_POST['subject'];
$name=$_POST['name'];

if(filter_var($email, FILTER_VALIDATE_EMAIL)  && !empty($message) && !empty($subject) && !empty($name)){

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
$message = (new Swift_Message("Message de {$name} : {$subject}"))
    ->setFrom(['surassur.test@gmail.com'])
    ->setTo(['soufi.chamalaine@gmail.com'])
    ->setReplyTo($email)
    ->setBody($message);
// Send the message
$mailer->send($message);

$result="succes";

}

else{

    $result="echec";

}


echo json_encode([
    'result' => $result
]);
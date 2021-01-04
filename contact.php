<?php

// On stock les valeurs posts dans des variables
$email=$_POST['email'];
$message=$_POST['message'];
$subject=$_POST['subject'];
$name=$_POST['name'];

// On vérifie que l'email est bien un email et on verifie si les autres variables sont vides
if(filter_var($email, FILTER_VALIDATE_EMAIL)  && !empty($message) && !empty($subject) && !empty($name)){

header('Content-Type: application/json');

// On inclut le fichier autoload du dossier vendor
require __DIR__ . '/vendor/autoload.php';


// On crée le transport swiftmailer
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
->setUsername('surassur.amc@gmail.com')
->setPassword("surassuramc1367");



// On crée le mailer à l'aide du transport 
$mailer = new Swift_Mailer($transport);

// On crée le message
$message = (new Swift_Message("Message de {$name} : {$subject}"))
    ->setFrom(['surassur.test@gmail.com'])
    ->setTo(['soufi.chamalaine@gmail.com'])
    ->setReplyTo($email)
    ->setBody($message);
// On envoie le mail
$mailer->send($message);

// On admets que le message a était envoyé, on pourra revoir la vérification de celle-çi
$result="succes";

}

else{

    // Si le formulaire est mal remplie
    $result="echec";

}

// On stock le resultat dans un tableau json à destination du script js
echo json_encode([
    'result' => $result
]);
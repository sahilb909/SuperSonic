<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'Contact-PHP/Exception.PHP';
require 'Contact-PHP/PHPMailer.PHP';
require 'Contact-PHP/SMTP.PHP';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

try {
    //Server settings

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sabhigyan29@gmail.com';                     //SMTP username
    $mail->Password   = 'uscx rsts vhcs ispv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;     
                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('sabhigyan29@gmail.com', 'Mailer');
    $mail->addAddress('supersonic6954@gmail.com', 'Website');     //Add a recipient
   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Message From Website';
    $mail->Body    = "name: $name <br> sender's mail: $email <br> message: $message";
    

    $mail->send();
    echo 'Message has been sent';
    header('location:http://localhost/SuperSonic-MAIN%20(2)/Website-Main');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

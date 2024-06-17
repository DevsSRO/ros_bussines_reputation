<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function mailInfoAboutRequest($message) {
    $mail = new PHPMailer(true);

    $mail->CharSet = 'UTF-8';

    $mail->setFrom('rep@comnpo.com', 'comnpo.com');
    $mail->addAddress('rep@comnpo.com');

    $mail->isHTML(true);                                
    $mail->Subject = 'Заявка comnpo.com';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $send = $mail->send();

    return $send;
}
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: application/json');

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$emailAddresses = $_POST['emailAddresses'];
$htmlContent = $_POST['emailContent'];
$subject = $_POST['emailSubject'];
$textContent = $_POST['textContent'];

$fromAddress = $_POST['fromAddress'] ? $_POST['fromAddress'] : null;
$fromName = $_POST['fromName'] ? $_POST['fromName'] : null;

$emailArray = explode(',', $emailAddresses);
$totalCount = count($emailArray);
$sentCount = 0;

foreach ($emailArray as $email) {
    try {
        if (!empty($email)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Некорректный адрес электронной почты");
            }
        } else {
            throw new Exception("Адрес электронной почты не указан");
        }

        if (sendEmail($email, $htmlContent, $subject, $textContent, $fromAddress, $fromName)) {
            $sentCount++;
    
            $response = array(
                'sentCount' => $sentCount,
                'totalCount' => $totalCount
            );
    
            echo json_encode($response);
            flush();
        }
    } catch (Exception $e) {
        echo json_encode($e->getMessage());
    }
}

function sendEmail($recipient, $content, $subject, $textContent, $fromAddress = 'rep@comnpo.com', $fromName = 'Центр сертификации') {
    $mail = new PHPMailer;
    $mail->isSendmail(); // Использование sendmail в качестве метода отправки

    $mail->CharSet = 'UTF-8';

    $mail->setFrom($fromAddress, $fromName);
    $mail->addAddress($recipient);

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $content;

    $mail->AltBody = $textContent;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}
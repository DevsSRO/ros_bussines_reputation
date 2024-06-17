<?php
require 'mail.php';
require 'vendor/autoload.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'server'        => 'localhost',
    'database_name' => 'officeinf3_rep',
    'username'      => 'officeinf3_rep',
    'password'      => '3XB2AVH8S*JYDQWi',
    'charset'       => 'utf8'
]);

$action = $_POST['action'];

if ($action == 'request') {
    parse_str($_POST['form'], $formData);

    $database->insert('requests', [
        'fio'   => $formData['fio'],
        'email' => $formData['email'],
        'phone' => $formData['phone']
    ]);

    $noteId = $database->id();

    if ($noteId) {
        $message  = "Данные заявки";
        $message .= "<br><br><b>ФИО:</b> " . $formData['fio'];
        $message .= "<br><b>Телефон:</b> " . $formData['phone'];
        $message .= "<br><b>Email:</b> ". $formData['email'];
    
        $mail = mailInfoAboutRequest($message);

        if ($mail) {
            $botToken = '6035263068:AAG4FFYbJV1CeYIwrAH_DqeI_jHQnApGKMU';
            $chatId = '-919763679';

            $message = str_replace('<br>', PHP_EOL, strip_tags($message, '<br>'));

            $url = "https://api.telegram.org/bot{$botToken}/sendMessage?chat_id={$chatId}&text=" . urlencode($message);
            $response = file_get_contents($url);

            if ($response !== false) {
                echo json_encode([
                    'status' => true
                ]);
            } else {
                echo json_encode([
                    'status' => false
                ]);
            }
        }
    }
}
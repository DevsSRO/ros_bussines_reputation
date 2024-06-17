<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title>Отправка писем</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    require '../vendor/autoload.php';

    use Medoo\Medoo;

    $database = new Medoo([
        'database_type' => 'mysql',
        'server'        => 'localhost',
        'database_name' => 'officeinf3_rep',
        'username'      => 'officeinf3_rep',
        'password'      => '3XB2AVH8S*JYDQWi',
        'charset'       => 'utf8'
    ]);

    // Получение значения параметра token из URL
    if (isset($_GET['token'])) {
        $token = $_GET['token'];

        // Переворачиваем строку и применяем md5 хэширование
        $encryptedToken = md5(strrev($token));

        // Получаем значение поля token из базы данных
        $userData = $database->get('users', 'token', [
            'id' => '1',
            'role' => 'admin'
        ]);

        // Сравниваем зашифрованный токен с токеном из базы данных
        if ($encryptedToken === $userData) {
    ?>
            <h1>Отправка писем</h1>

            <form id="emailForm">
                <label for="fromAddress">Адрес отправителя:</label><br>
                <input id="fromAddress" name="fromAddress" /><br>

                <label for="fromName">Отправитель:</label><br>
                <input id="fromName" name="fromName" /><br>

                <label for="emailAddresses">Адреса электронной почты (разделяйте запятыми):</label><br>
                <textarea id="emailAddresses" name="emailAddresses" rows="5" cols="40"></textarea><br>

                <label for="emailContent">Содержимое письма (HTML):</label><br>
                <textarea id="emailContent" name="emailContent" rows="10" cols="40"></textarea><br>

                <label for="textContent">Содержимое письма (текст-альтернатива):</label><br>
                <textarea id="textContent" name="textContent" rows="10" cols="40"></textarea><br>

                <label for="emailContent">Тема письма:</label><br>
                <input id="subject" name="subject" /><br>

                <input type="submit" value="Отправить">
            </form>

            <progress id="progressBar" value="0" max="100"></progress>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#emailAddresses').on('input change', function() {
                        const addresses = $(this).val().split(',');

                        if (addresses.length > 500) {
                            addresses.splice(500);
                        }
                        console.log(addresses.length);

                        const updatedAddresses = addresses.join(',');

                        $(this).val(updatedAddresses);
                    });


                    $('#emailForm').submit(function(e) {
                        e.preventDefault();

                        var emailAddresses = $('#emailAddresses').val();
                        var emailContent = $('#emailContent').val();
                        var emailSubject = $('#subject').val();
                        var textContent = $('#textContent').val();
                        var fromAddress = $('#fromAddress').val();
                        var fromName = $('#fromName').val();
                        sendEmails(emailAddresses, emailContent, emailSubject, textContent, fromAddress, fromName);
                    });

                    function sendEmails(emailAddresses, emailContent, emailSubject, textContent, fromAddress, fromName) {
                        var emails = emailAddresses.split(',');
                        var totalCount = emails.length;
                        var sentCount = 0;

                        function sendNextEmail() {
                            if (sentCount < totalCount) {
                                var email = emails[sentCount];

                                $.ajax({
                                    type: 'POST',
                                    url: 'mailer.php',
                                    data: {
                                        emailAddresses: email.trim(),
                                        emailContent: emailContent,
                                        emailSubject: emailSubject,
                                        textContent: textContent,
                                        fromAddress: fromAddress,
                                        fromName: fromName,
                                    },
                                    success: function(response) {
                                        sentCount++;
                                        var progress = (sentCount / totalCount) * 100;

                                        $('#progressBar').val(progress);
                                        sendNextEmail();
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error:', status, error);
                                    }
                                });
                            }
                        }

                        sendNextEmail();
                    }

                    function updateProgressBar(progress) {
                        $('.progress-bar').css('width', progress + '%');
                    }
                });
            </script>
    <?php
        } else {
            echo "Ошибка проверки токена";
        }
    } else {
        echo "Нет токена";
    }
    ?>

    <!-- https://help.sweb.ru/entry/22/ -->
</body>

</html>
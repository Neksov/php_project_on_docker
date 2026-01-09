<?php
$mail_to = 'n2v@list.ru';
$email_from = 'n2vvadim@gmail.com';
$name_from = 'Vadim';
$subject = 'qq qeep pepe p pep pep';

if (
    isset($_POST['submit'])
    && !empty(trim($_POST['name']))
    && !empty(trim($_POST['email']))
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    && !empty(trim($_POST['message']))
) {
    // Формируем текст письма
    $message =  "Вам пришло новое сообщение с сайта: <br><br>\n" .
        "<strong>Имя отправителя:</strong>" . strip_tags(trim($_POST['name'])) . "<br>\n" .
        "<strong>Email отправителя: </strong>" . strip_tags(trim($_POST['email'])) . "<br>\n" .
        "<strong>Сообщение: </strong>" . strip_tags(trim($_POST['message']));

    // Формируем тему письма, специально обрабатывая её
    $subject = "=?utf-8?B?" . base64_encode($subject) . "?=";

    // Формируем заголовки письма
    $headers = "MIME-Version: 1.0" . PHP_EOL .
        "Content-Type: text/html; charset=utf-8" . PHP_EOL .
        "From: " . "=?utf-8?B?" . base64_encode($name_from) . "?=" . "<" . $email_from . ">" .  PHP_EOL .
        "Reply-To: " . $email_from . PHP_EOL;

    // Отправляем письмо
    $mailResult = mail($mail_to, $subject, $message, $headers);

    if ($mailResult) {
        // Показ нотификации "Успех"
        $success = true;

        // Сброс POST массива
        foreach ($_POST as $key => $value) {
            unset($_POST[$key]);
        }

    } else {
        // Показ нотификации "Ошибка"
        $error = true;
    }
    print_r($mailResult);
//    print_r($success);
//    print_r($failure);
}


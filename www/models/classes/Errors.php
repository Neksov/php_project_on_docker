<?php
class Errors{
    public static function validate(): array {  // Возвращаем массив ошибок
        foreach ($_POST as $key => $value) {
            $_POST[$key] = trim($value);
        }

        $errors = [];

        if (empty($_POST['title'])) {
            $errors['title'] = "Необходимо ввести название фильма";
        }
        if (empty($_POST['genre'])) {
            $errors['genre'] = "Необходимо выбрать жанр фильма";
        }
        if (empty($_POST['year'])) {
            $errors['year'] = "Необходим год фильма";
        }

        return $errors;
    }
}
<?php
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/models/classes/Database.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/classes/Database.php';
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/models/classes/Films.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/classes/Films.php';
}

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/models/classes/Upload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/models/classes/Upload.php';
}

$db = new Database();
$filmsModel = new Films($db);
$filmsGenre = $filmsModel->getGenres();


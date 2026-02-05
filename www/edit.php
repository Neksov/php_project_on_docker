<?php
require_once('./config.php');
require_once('./models/init.php');
require_once('./functions/all.php');
require_once('./models/classes/Errors.php');

if (!isset($_GET['id'])) {
    header("Location: /");
    exit();
}

$errors = [];
$film = $filmsModel->getById($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_GET['action']) && $_GET['action'] === 'updated')) {
    $errors = Errors::validate();
    if (empty($errors)) {
        $result = $filmsModel->update($_GET['id'], $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
        if ($result === true) {
            unset($_POST);
            $film = $filmsModel->getById($_GET['id']);
        }
    }
}
include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">

        <?php if (isset($result) && $result === true): ?>
            <div class="alert-wrapper">
                <div class="alert alert--success">Фильм успешно обновлён</div>
            </div>
        <?php elseif (isset($result) && $result === false): ?>
            <div class="alert-wrapper">
                <div class="alert alert--error">Ошибка обновления фильма</div>
            </div>
        <?php elseif (isset($result) && $result): ?>
            <div class="alert-wrapper">
                <div class="alert alert--warning"><?= $result?></div>
            </div>
        <?php endif; ?>

        <?php if ($film): ?>

            <h1 class="title-1 mb-20">Редактировать фильм</h1>
            <?php include(ROOT . 'templates/form-edit.tpl'); ?>

        <?php else: ?>
            <div class="alert-wrapper">
                <div class="alert alert--warning">Такого фильма не существует</div>
            </div>
        <?php endif; ?>

	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

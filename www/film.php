<?php
require_once('./config.php');
require_once('./models/init.php');
require_once('./functions/all.php');
if (!isset($_GET['id'])) {
    header("Location: /");
    exit();
}
$film = $filmsModel->getById($_GET['id']);
$titlePage = $film ? htmlspecialchars($film['title']) : 'Фильм не найден';
include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');

?>

    <main class="main">
        <div class="container">
            <?php include(ROOT . 'templates/nav-categories.tpl'); ?>

            <?php if ($film): ?>
                <?php include(ROOT . 'templates/film.tpl'); ?>
            <?php else: ?>
                <div class="alert-wrapper">
                    <div class="alert alert--warning">Такого фильма не существует</div>
                </div>
            <?php endif; ?>


        </div>
    </main>

<?php
include(ROOT . 'templates/footer.tpl');

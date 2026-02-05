<?php
require_once('./config.php');
require_once('./models/init.php');
require_once('./functions/all.php');
require_once('./models/classes/Errors.php');

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_GET['action']) && $_GET['action'] === 'create')) {
    $errors = Errors::validate();
    if (empty($errors)) {
        $result = $filmsModel->create($_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
        if (is_array($result)) {
            $errors = $result;
        } else {
            unset($_POST);
        }
    }
}

$films = $filmsModel->getAll($_GET['genre'] ?? null);
include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">
		<?php include(ROOT . 'templates/nav-categories.tpl'); ?>
        <!-- Вывод фильмов -->
        <?if(empty($films)):?>
            <div class="alert-wrapper">
                <div class="alert alert--warning">Фильмы для отображения отсутствуют</div>
            </div>
        <?else:?>
            <div class="cards-small-wrapper">
                <?php
                foreach ($films as $film) {
                    include(ROOT . 'templates/card-small.tpl');
                }
                ?>
            </div>
        <?endif;?>
		<?php include(ROOT . 'templates/form-new.tpl'); ?>
	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');
?>

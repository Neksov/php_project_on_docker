<?php
require_once('./config.php');
require_once('./models/init.php');
require_once('./functions/all.php');
include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
$up = new Upload();

if (isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] !== '') {

    // Загрузка фото
    $result =  $up->uploadPhoto();

    p($result);
}
?>

<main class="main">
	<div class="container">
        <?php if (isset($filmID)): ?>
            <div class="alert-wrapper">
                <div class="alert alert--success">Фильм был добавлен. ID фильма: <?= $filmID ?></div>
            </div>
        <?php endif; ?>
		<?php include(ROOT . 'templates/form-new.tpl'); ?>
	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');
?>
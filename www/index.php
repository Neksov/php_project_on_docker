<?
    require('const.php');
    require('api.php');
    include('templates/head.tpl');
    include('templates/nav.tpl');
    include('templates/header.tpl');
?>
<main class="container">
    <div class="content-wrapper">
        <?
            include('templates/post.tpl');
            include('templates/sitebar/sitebar.tpl');
        ?>
    </div>
</main>
<?
include('templates/footer.tpl');
?>

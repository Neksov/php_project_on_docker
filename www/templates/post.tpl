<!-- Content -->
<div class="content">
    <?foreach($postMain as $post):?>
        <article class="post">
            <div class="post-img" style=" background-image: url(<?=HOST?>/img/post/<?=$post['post-img']?>); "></div>
            <div class="post-content">
                <div class="post__cat"><?=$post['post__cat']?></div>
                <div class="post__title"><?=$post['post__title']?></div>
                <div class="post__text"><?=$post['post__text']?></div>
                <a href="<?=$post['detail_code']?>" class="read-more">Read More</a>
            </div>
        </article>

    <?endforeach;?>

    <a href="#" class="load-more">Load More</a>
</div>
<!-- //Content -->
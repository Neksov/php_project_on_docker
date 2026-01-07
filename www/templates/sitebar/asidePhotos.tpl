<aside class="aside">
    <div class="aside__header">Photogallery</div>
    <div class="photos">
        <?foreach($asidePhotosList as $key => $photo):?>
            <img src="<?=HOST?>img/photos/<?=$photo?>" class="photos__img" alt="<?=$key?>">
        <?endforeach;?>
    </div>
</aside>
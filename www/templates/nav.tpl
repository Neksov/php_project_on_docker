<nav class="nav">
    <div class="nav__menu">
        <a href="#">
            <img src="<?=HOST?>img/icons/menu-button.svg" width="20" alt="menu-button">
        </a>
    </div>
    <div class="navigation">
        <?foreach($menu as $key => $item):?>
        <a href="<?=HOST?><?=$key?>" class="navigation__item <?=(PAGE == $key) ? 'active' : ''?>"><?=$item?></a>
        <?endforeach;?>
    </div>
    <div class="nav__search">
        <a href="#">
            <img src="<?=HOST?>img/icons/magnifying-glass.svg" width="20" alt="magnifying-glass">
        </a>
    </div>
</nav>
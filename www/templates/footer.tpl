<footer class="footer">
    <div class="container">
        <div class="footer-nav-wrapper">
            <div class="footer-nav">
                <?foreach($menu as $key => $item):?>
                    <a href="<?=HOST?><?=$key?>" class="footer-nav__link <?=(PAGE == $key) ? 'active' : ''?>"><?=$item?></a>
                <?endforeach;?>
            </div>
            <form class="footer-form" action="">
                <input class="footer-form__input" type="text">
                <input class="footer-form__submit" type="submit" value="">
            </form>
        </div>

        <div class="footer-contacts">
            <p>travel@gmail.com</p>
            <p>(123) 456 789</p>
        </div>

        <div class="footer-line"></div>
        <div class="footer-copyright">
            <p><i class="far fa-copyright"></i> Copyrights 2017. Travelblog By VictorThemes</p>
        </div>

    </div>
</footer>

</body>

</html>
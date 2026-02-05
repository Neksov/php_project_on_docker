<nav class="categories">
	<a href="/">Все фильмы</a>
    <?foreach($filmsGenre as $genre):?>
	    <a href="/?genre=<?=$genre?>"><?=$genre?></a>
    <?endforeach;?>
</nav>
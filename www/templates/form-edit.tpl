<?php include(ROOT . 'templates/film-edit.tpl');?>

<form action="/edit.php?action=updated&id=<?=$film['id']?>" method="POST" class="form" enctype="multipart/form-data">
    <label class="form__group">
        <p class="form__label">Название фильма</p>
        <input
                type="text"
                name="title"
                class="form__input"
                placeholder="Введите название фильма"
                value="<? echo (isset($_POST['title']) && $_POST['title'] !== '') ? $_POST['title'] : $film['title']; ?>"
        >
        <?if(isset($errors['title'])):?>
        <div class="alert alert--error" style="margin-top: 10px"><?=$errors['title']?></div>
        <?endif;?>
    </label>

    <div class="form__row">
        <label class="form__group">
            <p class="form__label">Жанр</p>
            <select name="genre" id="" class="form__input form__input--select">
                <option value="" disabled <?php echo (isset($film['genre']) && $film['genre'] !== '') ? '' : 'selected'; ?>>Выберите жанр</option>
                <?foreach($filmsGenre as $genre):?>
                <option value="<?=$genre?>" <?php echo selectedOption($genre, $film); ?>><?=$genre?></option>
                <?endforeach;?>
            </select>
            <?if(isset($errors['genry'])):?>
            <div class="alert alert--error" style="margin-top: 10px"><?=$errors['genre']?></div>
            <?endif;?>
        </label>

        <label class="form__group">
            <p class="form__label">Год</p>
            <input
                    type="number"
                    class="form__input"
                    name="year"
                    placeholder="Год премьеры"
                    value="<?=(isset($_POST['year']) && $_POST['year'] !== '' && ctype_digit($_POST['year'])) ? $_POST['year'] : $film['year']; ?>"
            >
            <?if(isset($errors['year'])):?>
            <div class="alert alert--error" style="margin-top: 10px"><?=$errors['year']?></div>
            <?endif;?>
        </label>
    </div>

    <label class="form__group">
        <p class="form__label">Описание фильма</p>
        <textarea
                name="description"
                id=""
                class="form__textarea"
                placeholder="Описание фильма"
        >
            <?=(isset($_POST['description']) && $_POST['description'] !== '') ? $_POST['description'] : $film['description']; ?>
        </textarea>
    </label>

    <label class="form__group">
        <input type="file">
    </label>

	<div class="flex-btns-row">
		<a href="/" class="btn btn--secondary">Отмена</a>
		<button class="btn btn--edit">Сохранить</button>
	</div>
</form>
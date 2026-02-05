<h3 class="title-1 mt-40">Новый фильм</h3>
	<form action="/?action=create" method="post"  class="form" enctype="multipart/form-data">
		<label class="form__group">
			<p class="form__label">Название фильма</p>
			<input
                type="text"
                name="title"
                class="form__input"
                placeholder="Введите название фильма"
                value="<?=(isset($_POST['title']) && $_POST['title'] !== '') ? $_POST['title'] : ''?>"
            >
            <?if(isset($errors['title'])):?>
                <div class="alert alert--error" style="margin-top: 10px"><?=$errors['title']?></div>
            <?endif;?>
		</label>

		<div class="form__row">
			<label class="form__group">
				<p class="form__label">Жанр</p>
				<select name="genre" id="" class="form__input form__input--select">
                    <option value="" disabled <?php echo (isset($_POST['genre']) && $_POST['genre'] !== '') ? '' : 'selected'; ?>>Выберите жанр</option>
                    <?foreach($filmsGenre as $genre):?>
                        <option value="<?=$genre?>" <?=(isset($_POST['genre']) && $_POST['genre'] == $genre) ? 'selected' : ''?>><?=$genre?></option>
                    <?endforeach;?>
				</select>
                <?if(isset($errors['genre'])):?>
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
                    value="<?=(isset($_POST['year']) && $_POST['year'] !== '') ? $_POST['year'] : ''?>"
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
                <?=(isset($_POST['description']) && $_POST['description']) ? $_POST['description'] : ''?>
            </textarea>
		</label>

		<label class="form__group">
			<input type="file">
		</label>

		<button class="btn">Сохранить</button>
	</form>
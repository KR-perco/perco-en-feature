<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
/*CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");*/
?>
<style>
	.new-seminar-form {max-inline-size: 512px; font-size: 24px;}
	.new-seminar-form {display: flex; flex-direction: column;}
	.new-seminar-form__label {display: flex; flex-direction: column; margin-block-start: 16px;}
	.new-seminar-form__input {font-size: 24px;}
	.new-seminar-form__submit {inline-size: 128px;}
	.result_success {color: green;}
</style>
<h1>Новый семинар</h1>
<form class="new-seminar-form" action="" method="POST">
	<label class="new-seminar-form__label">
		Название
		<input class="new-seminar-form__input" name="name" type="text">
	</label>
	<label class="new-seminar-form__label">
		Описание
		<input class="new-seminar-form__input" name="description" type="text">
	</label>
	<label class="new-seminar-form__label">
		Ссылка на картинку
		<input class="new-seminar-form__input" name="image" type="url">
	</label>
	<label class="new-seminar-form__label">
		Дата
		<input class="new-seminar-form__input" name="date" type="date">
	</label>
	<label class="new-seminar-form__label">
		Время
		<input class="new-seminar-form__input" name="time" type="time">
	</label>
	<input class="new-seminar-form__submit" value="Сохранить" type="submit">
</form>
<?
if (!empty($_POST)) {
	echo '<p class="result_success">Семинар успешно добавлен</p>';
}
?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
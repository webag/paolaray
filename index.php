<?php include('header.php'); ?>

<section class="page">
	<div class="container">

		<div class="logo">
			<img src="/img/logo.svg" alt="" width="392" height="107">
			<h1 class="logo__descr">Бренд модной женской одежды</h1>
		</div>

		<div class="counter">
			<div class="counter__item">
				<strong class="js-days">00</strong>
				<small>дней</small>
			</div>
			<div class="counter__item">
				<strong class="js-hours">00</strong>
				<small>часов</small>
			</div>
			<div class="counter__item">
				<strong class="js-minutes">00</strong>
				<small>минут</small>
			</div>
			<div class="counter__item">
				<strong class="js-seconds">00</strong>
				<small>секунд</small>
			</div>
		</div>


		<div class="form-block">
			<div class="form-block__title">Дарим подарки своим будущим клиентам</div>

			<form class="ajax-form">
				<input type="hidden" value="Paola Ray заглушка" name="form_subject">
				<input type="hidden" value="<?=$_SERVER['SERVER_ADDR']?>" name="IP">
				<div class="form-row">
					<label class="input">
						<input type="text" name="user_name" data-label="Имя" class="input__text" data-req="true" autocomplete="off">
						<span class="input__label">Как вас зовут?*</span>
					</label>
					<label class="input">
						<input type="tel" name="user_tel" data-label="Телефон"  class="input__text" data-req="true" autocomplete="off">
						<span class="input__label">Ваш телефон*</span>
					</label>
					<label class="input">
						<input type="email" name="user_email" data-label="Email" class="input__text" data-req="true" autocomplete="off">
						<span class="input__label">Введите email*</span>
					</label>
					<button type="submit" class="btn">Получить подарок</button>
				</div>

				<div class="form-note">
					<label class="style-checkbox">
						<input type="checkbox" name="user_policy" data-label="Согласен с условиями" value="yes" data-req="true" checked="">
						<span>Даю согласие на&nbsp;обработку персональных данных и&nbsp;соглашаюсь с&nbsp;политикой конфиденциальности</span>
					</label>
				</div>
			</form>

		</div>


		<footer class="page-footer">
			<div class="page-note">Организатор акции ООО «ЛУЧ», ИНН: 7706451329, КПП: 770301001, ОГРН: 5177746111186. Акция действует до 27 января 2019 года включительно, объявление победителей с 26 января 2019 года по 27 января 2019 года включительно. Информация об организаторе акции, правилах и условиях её проведения, количестве призов, сроках и порядке получения на сайте paolaray.ru. Количество призов ограничено. <a href="#">Полные условия акции</a></div>
			<div class="page-footer__docs">
				<a href="#">Использование Cookie файлов</a>
				<a href="#">Политика конфиденциальности, обработки персональных данных и согласие на получение рекламных материалов</a>
			</div>
		</footer>

	</div>
</section>


<?php include('footer.php'); ?>

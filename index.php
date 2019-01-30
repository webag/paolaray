<?php include('header.php'); ?>

<script>
	function detectIE() {
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf('MSIE ');
		if (msie > 0) {
			return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
		}
		var trident = ua.indexOf('Trident/');
		if (trident > 0) {
			var rv = ua.indexOf('rv:');
			return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
		}
		var edge = ua.indexOf('Edge/');
		if (edge > 0) {
			return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
		}
		return false;
	}

	var version = detectIE();
	var pageElement = document.querySelector('body');

	if (version === false) {

	} else {
		pageElement.classList.add('ie');
	}
</script>


<section class="page" id="page">
	<div class="container">

		<div class="logo">
			<img src="/img/logo.svg" alt="" width="392" height="107">
			<h1 class="logo__descr">Бренд модной женской одежды</h1>
		</div>

		<!--<div class="counter">
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
		</div>-->

		<div class="soon">Скоро открытие</div>


		<div class="form-block">
			<div class="form-block__border">
				<img src="/img/border.jpg" alt="border">
			</div>
			<div class="form-block__title">Дарим подарки своим будущим клиентам</div>

			<form class="ajax-form">
				<input type="hidden" value="Paola Ray заглушка" name="form_subject">
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
					<input type="hidden" value="<?=$_SERVER['REMOTE_ADDR']?>" name="IP">
				</div>

				<div class="form-note">
					<label class="style-checkbox">
						<input type="checkbox" name="user_policy" data-label="Согласен с условиями" value="yes" data-req="true" checked="">
						<span>Даю согласие на&nbsp;обработку персональных данных и&nbsp;соглашаюсь с&nbsp;политикой конфиденциальности</span>
					</label>
				</div>
			</form>

		</div>


		<footer class="page-footer row">
			<div class="grid-7">
				<div class="page-note">Организатор акции АО «СТОКМАНН». Действует до 1 марта включительно. Объявление победителей с 25 февраля 2019 года по 01 марта 2019 года включительно. Информация об организаторе акции, правилах и условиях её проведения, количестве призов, сроках и порядке получения на сайте paolaray.ru. Количество призов ограничено.</div>
				<div class="footer-row">
					<div class="footer-block">
						<p>Все права защищены, 2019</p>
						<a href="#" data-src="#modal-terms" class="fancy-modal">Полные условия акции</a>
					</div>
					<div class="footer-block">
						<div class="socials">
							<a href="#" target="_blank">
								<img src="/img/insta.png" alt="insta">
							</a>
							<a href="#" target="_blank">
								<img src="/img/vk.png" alt="vk">
							</a>
							<a href="#" target="_blank">
								<img src="/img/facebook.png" alt="facebook">
							</a>
						</div>
					</div>
				</div>
				<div class="footer-row">
					<div class="footer-block">
						<a href="#" data-src="#modal-policy" class="fancy-modal">Политика конфиденциальности, обработки персональных данных и согласие на получение рекламных материалов</a>
					</div>
				</div>
			</div>
			<div class="grid-5">
				<img src="/img/shok.png" alt="Шоколадка" class="shok">
			</div>

		</footer>

	</div>
</section>


<?php include('footer.php'); ?>

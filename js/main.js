/***********************
 Отправка формы в php BEGIN
 ***********************/
$(function () {
	$(".ajax-form").on("submit", function (event) {
		var form = $(this);
		var send = true;
		event.preventDefault();

		$(this).find("[data-req='true']").each(function () {
			if ($(this).val() === "") {
				$(this).addClass('error');
				send = false;
			}
			if ($(this).is('select')) {
				if ($(this).val() === null) {
					$(this).addClass('error');
					send = false;
				}
			}
			if ($(this).is('input[type="checkbox"]')) {
				if ($(this).prop('checked') !== true) {
					$(this).addClass('error');
					send = false;
				}
			}
			if ($(this).is('input[type="tel"]')) {
				if ($(this).cleanVal().length < 10) {
					$(this).addClass('error');
					send = false;
				}
			}
		});

		$(this).find("[data-req='true']").on('focus', function () {
			$(this).removeClass('error');
		});

		// empty file inputs fix for mac
		var fileInputs = $('input[type="file"]:not([disabled])', form);
		fileInputs.each(function (_, input) {
			if (input.files.length > 0) return;
			$(input).prop('disabled', true)
		});

		var form_data = new FormData(this);

		fileInputs.prop('disabled', false);

		$("[data-label]").each(function () {
			var input_name = $(this).attr('name');
			var input_label__name = input_name + '_label';
			var input_label__value = $(this).data('label').toString();
			form_data.append(input_label__name, input_label__value)
		});

		if (send === true) {
			$.ajax({
				type: "POST",
				async: true,
				url: "/send.php",
				cache: false,
				contentType: false,
				processData: false,
				data: form_data,
				success: (function (result) {
					console.log(result);
					$.fancybox.close();
					if (result.indexOf("Mail FAIL") !== -1) {
						$.fancybox.open({src: '#modal-error'});
					} else {
						$.fancybox.open({src: '#modal-thanks'});
						window.location.href  = '/thankyou/';
					}
				})
			});
		}
	});
});
/***********************
 Отправка формы в php END
 ***********************/


/***********************
 Input mask BEGIN
 ***********************/
$(function () {
	$("input[type='tel']").mask("+7 (000) 000-00-00");
});
/***********************
 Input mask END
 ***********************/


/***********************
 fancybox BEGIN
 ***********************/
$.fancybox.defaults.backFocus = false;
$.fancybox.defaults.lang = 'ru';
$.fancybox.defaults.i18n =
	{
		'ru': {
			CLOSE: 'Закрыть',
			NEXT: 'Дальше',
			PREV: 'Назад',
			ERROR: 'Не удается загрузить. <br/> Попробуйте позднее.',
			PLAY_START: 'Начать слайдшоу',
			PLAY_STOP: 'Остановить слайдшоу',
			FULL_SCREEN: 'На весь экран',
			THUMBS: 'Превью'
		}
	};

function init_fancy() {
	$('.fancy').fancybox({
		buttons: ['close']
	});
	$('.fancy-modal').fancybox({
		selector: '',
		touch: false
	});
	$('.fancy-map').fancybox({
		toolbar: false,
		smallBtn: true,
		defaultType: "iframe"
	});
}

function init_fancy__video() {
	$('.fancy-video').fancybox({
		toolbar: false,
		smallBtn: true,
		youtube: {
			controls: 1,
			showinfo: 0,
			autoplay: 1
		}
	});
}

$(function () {
	init_fancy();
	init_fancy__video();
});
/***********************
 fancybox END
 ***********************/


/***********************
 Labels BEGIN
 ***********************/
$(function ($) {
	var inputs = $('.input__text');
	inputs.on('focus', function () {
		var thisInputWrap = $(this).parent('.input');
		thisInputWrap.addClass('not_empty');
		thisInputWrap.addClass('focused');
	});

	inputs.on('blur', function () {
		var thisInputWrap = $(this).parent('.input');
		thisInputWrap.removeClass('focused');
		if ($(this).val() !== "") {
			thisInputWrap.addClass('not_empty');
		} else {
			thisInputWrap.removeClass('not_empty');
		}
	});
});
/***********************
 Labels END
 ***********************/


/***********************
counter BEGIN
***********************/
$(function($){
	var dest = new Date(2019, 0, 26, 23, 59);
	var placeDays = $('.js-days');
	var placeHours = $('.js-hours');
	var placeMinutes = $('.js-minutes');
	var placeSeconds = $('.js-seconds');

	setInterval(setTimer,1000);

	function setTimer() {
		var now = new Date();

		var ts = countdown(
			now,
			dest,
			countdown.DAYS|countdown.HOURS|countdown.MINUTES|countdown.SECONDS
		);

		var days = ts.days;
		var hours = ts.hours;
		var minutes = ts.minutes;
		var seconds = ts.seconds;

		placeDays.text(days);
		placeHours.text(hours);
		placeMinutes.text(minutes);
		placeSeconds.text(seconds);
	}
});
/***********************
counter END
***********************/


/**************************************************
 UTM to forms
 ***************************************************/
$(document).ready(function(){

	if ('localStorage' in window) {
		if (urlParams('utm_source') != null ||
			urlParams('utm_medium') != null ||
			urlParams('utm_content') != null ||
			urlParams('utm_campaign') != null ||
			urlParams('utm_term') != null)
		{
			localStorage.setItem('utm_source', urlParams('utm_source'));
			localStorage.setItem('utm_medium', urlParams('utm_medium'));
			localStorage.setItem('utm_content', urlParams('utm_content'));
			localStorage.setItem('utm_term', urlParams('utm_term'));
			localStorage.setItem('utm_campaign', urlParams('utm_campaign'));
		}
	} else {
		console.error('No localStorage in window');
	}

	$('form').each(function() {
		var form = $(this),
			utm = [
				'source',
				'medium',
				'content',
				'term',
				'campaign'
			];

		for (var i = 0; i < utm.length; i++) {
			var name = utm[i];
			var input = $('<input/>');
			if ('localStorage' in window) {
				form.append(
					input
						.attr('type', 'hidden')
						.attr('name', 'utm_' + name)
						.attr('value', localStorage.getItem('utm_' + name))
				)
			} else {
				form.append(
					input
						.attr('type', 'hidden')
						.attr('name', 'utm_' + name)
						.attr('value', urlParams('utm_' + name))
				)
			}
		}
	});
});

function urlParams(utm_name) {
	var results = new RegExp('[\?&]' + utm_name + '=([^&#]*)').exec(window.location.href);
	if (results !== null) {
		return results[1] || 0;
	} else {
		return "";
	}
}
/**************************************************
 UTM to forms
 ***************************************************/
  // Добавляем класс для вызова попапа
$(document).ready(function(){
	$(".click-pop").click(function(){
		$("#window").toggleClass("active-pop"); 
		$("#bg-popup").toggleClass("active-pop"); return false;
	});
});


// Задаем класс при скроле
$(window).scroll(function() {
	var height = $(window).scrollTop();
	if(height > 30){
		$('.header-wrap').addClass('activete');
	} else{
		$('.header-wrap').removeClass('activete');
	}
});

// Задаем класс при скроле
$(window).scroll(function() {
	var height = $(window).scrollTop();
	if(height > 250){
		$('.pn-single-block').addClass('activete');
	} else{
		$('.pn-single-block').removeClass('activete');
	}
});


// убрать placeholder при клике по input
$(document).ready(function () {
	$('input,textarea').focus(function(){
		$(this).data('placeholder',$(this).attr('placeholder'))
		$(this).attr('placeholder','');
	});
	$('input,textarea').blur(function(){
		$(this).attr('placeholder',$(this).data('placeholder'));
	});
});


// Табы
(function($) {
	$(function() {
		var $caption = $('.tabs-caption li');
		$caption.first().addClass('tabs-active');
		var $tabs = $('.tabs-content');
		$tabs.first().addClass('tabs-active');
		$('ul.tabs-caption').on('click', 'li:not(.tabs-active)', function() {
			$(this)
			.addClass('tabs-active').siblings().removeClass('tabs-active')
			.closest('div.tabs').find('div.tabs-content').removeClass('tabs-active').eq($(this).index()).addClass('tabs-active');
		});
	});
})(jQuery);


 // Плавная прокрутка к якорю
 $(document).ready(function() {
  $(".videobg-info-link a").click(function() {
    var elementClick = $(this).attr("href")
    var destination = $(elementClick).offset().top;
    jQuery("html:not(:animated),body:not(:animated)").animate({
      scrollTop: destination
    }, 900);
    return false;
  });
});


// Плавная прокрутка Вверх
(function () {
	var $totop = $('.tops');
	var isScrolling = false;
	var scrollThreshold = 450;
	var scrollDuration = 900;
	var showedClass = 'tops-active';
	$(window).on('scroll', function () {
		if ($(window).scrollTop() > scrollThreshold) {
			$totop.addClass(showedClass);
		} else {
			$totop.removeClass(showedClass);
		}
	});
	$totop.on('click', function (e) {
		e.preventDefault();
		if (!isScrolling) {
			isScrolling = true;
			$("html, body").animate({scrollTop: 0}, scrollDuration, function () {
				isScrolling = false;
			});
		}
	});
})();


 // Выпадающий список
 function languagesFunction() {
 	document.getElementById("myDropdown").classList.toggle("show");
 }
 window.onclick = function(event) {
 	if (!event.target.matches('.dropbtn')) {

 		var dropdowns = document.getElementsByClassName("dropdown-content");
 		var i;
 		for (i = 0; i < dropdowns.length; i++) {
 			var openDropdown = dropdowns[i];
 			if (openDropdown.classList.contains('show')) {
 				openDropdown.classList.remove('show');
 			}
 		}
 	}
 }
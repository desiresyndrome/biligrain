<?php
/*
Template Name: Contacts
*/
?>

<?php get_header(); ?>

<div class="wrapper">

	<?php include 'head.php';?>

	<div class="page-header-wrap my-cover" style="background-image: url(<?php the_field('page-header-bg'); ?>)"><div class="page-header-block">
		<div class="page-header-inner">
				<div class="breadcrumbs"><ul itemscope itemtype="http://schema.org/BreadcrumbList">
					  <?php if(function_exists('bcn_display')){bcn_display();} ?>
				</ul></div>
	<h1 class="page-header-title"><?php if ( get_field('ceo-title') ) {?><?php the_field('ceo-title') ?><?php } else { ?><?php the_title(); ?><?php } ?></h1>
		</div>
	</div></div>

	<div class="contacts-top-block wraper-1240">
		<div class="contacts-top-item contacts-top-item1"><div class="contacts-top-item-info">
			<h3 class="contacts-top-item-title"><?php _e('Адреса','ds'); ?></h3>
			<p><?php the_field('footer-adress', 'options'); ?></p>		
		</div></div>
		<div class="contacts-top-item contacts-top-item2"><div class="contacts-top-item-info">
			<h3 class="contacts-top-item-title"><?php _e('Телефон','ds'); ?></h3>
			<?php the_field('footer-tel', 'options'); ?>
		</div></div>
		<div class="contacts-top-item contacts-top-item3"><div class="contacts-top-item-info">
			<h3 class="contacts-top-item-title">E-mail</h3>
			<a href="mailto:<?php the_field('footer-email', 'options'); ?>"><?php the_field('footer-email', 'options'); ?></a>
		</div></div>
	</div>

	<div class="contacts-human-block wraper-1240">
		<?php if(get_field('contacts-human')): ?>
			<?php while(the_repeater_field('contacts-human')): ?>
				<div class="contacts-human-item">
					<div class="contacts-human-img"><div class="my-cover" style="background-image: url(<?php the_sub_field('contacts-human-img'); ?>);"></div></div>
					<h3 class="contacts-human-name"><?php the_sub_field('contacts-human-name'); ?></h3>
					<p class="contacts-human-who"><?php the_sub_field('contacts-human-who'); ?></p>
					<ul>
						<li class="contacts-human-tel"><?php the_sub_field('contacts-human-tel'); ?></li>
						<li class="contacts-human-mail"><a href="mailto:<?php the_sub_field('contacts-human-email'); ?>"><?php the_sub_field('contacts-human-email'); ?></a></li>
					</ul>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="contacts-form-wrap wraper-100"><div class="contacts-form-block wraper-1240">
		<div class="contacts-form-title-block"><h2 class="contacts-form-title"><?php _e('Залишити заявку','ds'); ?><span>form</span></h2></div>
		<div class="contacts-form"><form enctype="multipart/form-data" method="post" id="feedback-form" class="placeholder_gray" autocomplete="off">
			<input type="hidden" name="titleFF2">
			<input name="nameFF" class="form-item-name feedback-form-border" type="text" placeholder="<?php _e('Iм&#39;я','ds'); ?> *" required/>
			<input name="telFF" class="form-item-tel feedback-form-border m-tel" type="tel" placeholder="<?php _e('Телефон','ds'); ?> *" required/>
			<input name="mailFF" class="form-item-mail feedback-form-border" type="email" placeholder="E-mail" />
			<textarea name="msgFF" class="form-item-pen feedback-form-border" placeholder="<?php _e('Ваше повiдомлення','ds'); ?>"></textarea>
			<div class="contacts-form-btn"><input name="send" class="submitFF" type="submit" value="<?php _e('Вiдправити','ds'); ?>" /> </div>
		</form></div>
	</div></div>

	<div class="contacts-gmap"><?php the_field('contacts-gmap'); ?></div>

	<?php include 'footer.php';?>

</div><!-- wrapper -->

<script src="<?php bloginfo('template_directory'); ?>/scripts/nav.jquery.min.js"></script>
<script>
	let elements = document.querySelectorAll("input[name='titleFF']");
	for (let elem of elements) {elem.value = document.title}
</script>
<script>document.getElementById("popup-feedback-form").addEventListener("submit",function(a){var b=new XMLHttpRequest,c=this;a.preventDefault(),b.open("POST","<?php echo bloginfo('template_url'); ?>/scripts/contacts.php",!0),b.onreadystatechange=function(){4==b.readyState&&200==b.status&&(location.href = "/thnx")},b.onerror=function(){alert("Извините, данные не были переданы")},b.send(new FormData(c))},!1);</script>
<script>
	let elements2 = document.querySelectorAll("input[name='titleFF2']");
	for (let elem2 of elements2) {elem2.value = document.title}
</script>
<script>document.getElementById("feedback-form").addEventListener("submit",function(a){var b=new XMLHttpRequest,c=this;a.preventDefault(),b.open("POST","<?php echo bloginfo('template_url'); ?>/scripts/contacts2.php",!0),b.onreadystatechange=function(){4==b.readyState&&200==b.status&&(location.href = "/thnx")},b.onerror=function(){alert("Извините, данные не были переданы")},b.send(new FormData(c))},!1);</script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/my.js"></script>
<script>
	$(document).ready(function () {
		var $form = $('#mc-embedded-subscribe-form')
		if ($form.length > 0) {
			$('#mc-embedded-subscribe-form button').bind('click', function (event) {
				if (event) event.preventDefault()
					register($form)
			})
		}
	})
	function register($form) {
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize(),
			cache: false,
			dataType: 'json',
			contentType: 'application/json; charset=utf-8',
			error: function (err) { alert('Could not connect to the registration server. Please try again later.') },
			success: function (data) {
				$('#mc-embedded-subscribe').val('subscribe')
				if (data.result === 'success') {
					if ($('html:lang(en)').length) {
						window.alert('Thank you for subscribing.')
					} else if ($('html:lang(ru)').length) {
						window.alert('Спасибо за подписку.')
					} else if ($('html:lang(uk)').length) {
						window.alert('Дякуємо за підписку.')
					}
					$('#mce-EMAIL').val('')
				} else {
					if ($('html:lang(en)').length) {
						window.alert('Something is wrong! Try again.')
					} else if ($('html:lang(ru)').length) {
						window.alert('Что-то пошло не так! Попробуйте еще раз.')
					} else if ($('html:lang(uk)').length) {
						window.alert('Щось пiшло не так! Спробуйте ще раз.')
					}
				}
			}
		})
	};
</script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/maskinput.js"></script>
	
<?php wp_footer(); ?>
</body>
</html>
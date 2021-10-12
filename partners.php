<?php
/*
Template Name: Partners
*/
?>

<?php get_header(); ?>

<div class="wrapper">

	<?php include 'head.php';?>

	<main class="content">

		<div class="page-header-wrap my-cover" style="background-image: url(<?php the_field('page-header-bg'); ?>)"><div class="page-header-block">
			<div class="page-header-inner">
				<div class="breadcrumbs"><ul itemscope itemtype="http://schema.org/BreadcrumbList">
					  <?php if(function_exists('bcn_display')){bcn_display();} ?>
				</ul></div>
				<h2 class="page-header-title"><?php the_title(); ?></h2>
			</div>
		</div></div>

		<div class="partners-text-wrap wraper-100"><div class="partners-text-block wraper-1240">
			<?php if(get_field('ceo-text-title')): ?>
				<h1 class="partners-text-title"><?php the_field('ceo-text-title'); ?></h1>
			<?php endif; ?>
			<?php if(get_field('ceo-text')): ?>
				<div class="ce-text">
					<?php the_field('ceo-text'); ?>
				</div>
			<?php endif; ?>
		</div></div>

		<div class="partners-culturs-wrap wraper-100"><div class="partners-culturs-block wraper-1340">
			<h2 class="partners-culturs-block-title"><?php _e('Приймаємо замовлення на насіння:','ds'); ?></h2>
			<div class="partners-culturs-flex">
				<?php query_posts('tag_id=22&order=ASC');  ?>
				<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<div class="culturs-item">
						<div class="culturs-item-img">
							<div class="my-cover" style="background-image: url(<?php
								if ( has_post_thumbnail()) {
									$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
									echo ''.$full_image_url[0] . '';
								}
								?>)"></div>
							</div>
							<div class="culturs-item-text">
								<p><?php the_title(); ?></p>
							</div>	
							<a class="culturs-item-link" href="<?php the_permalink(); ?>"></a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>  
				<?php wp_reset_query()?>
			</div>
		</div></div>

		<div class="partners-culturs-wrap partners-culturs-wrap-change wraper-100"><div class="partners-culturs-block wraper-1340">
			<h2 class="partners-culturs-block-title"><?php _e('Купуємо:','ds'); ?></h2>
			<div class="partners-culturs-flex">
				<?php query_posts('tag_id=21&order=ASC');  ?>
				<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<div class="culturs-item">
						<div class="culturs-item-img">
							<div class="my-cover" style="background-image: url(<?php
								if ( has_post_thumbnail()) {
									$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
									echo ''.$full_image_url[0] . '';
								}
								?>)"></div>
							</div>
							<div class="culturs-item-text">
								<p><?php the_title(); ?></p>
							</div>	
							<a class="culturs-item-link" href="<?php the_permalink(); ?>"></a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>  
				<?php wp_reset_query()?>
			</div>
		</div></div>

		<div class="partners-adv-wrap wraper-100"><div class="gl-adv-block wraper-1440">
			<div class="gl-adv-block-title-block"><h2 class="gl-adv-block-title"><?php _e('Співпраця в агрономічному супроводі','ds'); ?><span><?php _e('Співпраця','ds'); ?></span></h2></div>
			<div class="gl-adv-flex wow fadeIn" data-wow-duration="2s" data-wow-delay=".3s">
				<?php if(get_field('preim-block')): ?>
					<?php while(the_repeater_field('preim-block')): ?>
						<div class="gl-adv-item" style="background-image: url(<?php the_sub_field('preim-block-img'); ?>);">
							<p><?php the_sub_field('preim-block-title'); ?></p>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div></div>

		<div class="partners-adv-wrap partners-adv-wrap-change wraper-100"><div class="gl-adv-block wraper-1440">
			<div class="gl-adv-block-title-block"><h2 class="gl-adv-block-title"><?php _e('Тех. Економічне обгрунтування','ds'); ?><span><?php _e('Обгрунтування','ds'); ?></span></h2></div>
			<div class="gl-adv-flex wow fadeIn" data-wow-duration="2s" data-wow-delay=".3s">
 				<?php if(get_field('preim2-block')): ?>
					<?php while(the_repeater_field('preim2-block')): ?>
						<div class="gl-adv-item" style="background-image: url(<?php the_sub_field('preim2-block-img'); ?>);">
							<p><?php the_sub_field('preim2-block-title'); ?></p>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div></div>

		<div class="partners-form-wrap wraper-100"><div class="partners-form-block wraper-1240">
			<div class="contacts-form-title-block"><h2 class="contacts-form-title"><?php _e('Залишити заявку','ds'); ?><span>form</span></h2></div>
			<div class="contacts-form"><form enctype="multipart/form-data" method="post" id="feedback-form" class="placeholder_gray" autocomplete="off">
				<input name="nameFF" class="form-item-name feedback-form-border" type="text" placeholder="<?php _e('Iм&#39;я','ds'); ?> *" required/>
				<input name="telFF" class="form-item-tel feedback-form-border m-tel" type="tel" placeholder="<?php _e('Телефон','ds'); ?> *" required/>
				<input name="mailFF" class="form-item-mail feedback-form-border" type="email" placeholder="E-mail" />
				<textarea name="msgFF" class="form-item-pen feedback-form-border" placeholder="<?php _e('Ваше повiдомлення','ds'); ?>"></textarea>
				<div class="contacts-form-btn"><input name="send" class="submitFF" type="submit" value="<?php _e('Вiдправити','ds'); ?>" /> </div>
			</form></div>
		</div></div>

	</main>

	<?php include 'footer.php';?>

</div><!-- wrapper -->

<script src="<?php bloginfo('template_directory'); ?>/scripts/nav.jquery.min.js"></script>
<script>
	let elements = document.querySelectorAll("input[name='titleFF']");
	for (let elem of elements) {elem.value = document.title}
</script>
<script>document.getElementById("popup-feedback-form").addEventListener("submit",function(a){var b=new XMLHttpRequest,c=this;a.preventDefault(),b.open("POST","<?php echo bloginfo('template_url'); ?>/scripts/contacts.php",!0),b.onreadystatechange=function(){4==b.readyState&&200==b.status&&(location.href = "/")},b.onerror=function(){alert("Извините, данные не были переданы")},b.send(new FormData(c))},!1);</script>
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
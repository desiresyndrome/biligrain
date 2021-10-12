<?php
/*
Template Name: About
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

		<?php if(get_field('ceo-text')): ?>
			<div class="about-text-wrap wraper-100"><div class="about-text-block wraper-1240">
				<h1 class="ce-text-title"><?php the_field('ceo-text-title'); ?></h1>
				<div class="ce-text">
					<?php the_field('ceo-text'); ?>
				</div>
			</div></div>
		<?php endif; ?>

		<div class="about-our-activity-wrap wraper-100"><div class="gl-our-activity-block wraper-1240">
			<?php if(get_field('info-block1')): ?>
				<?php while(the_repeater_field('info-block1')): ?>
					<div class="gl-our-activity-item">
						<div class="gl-our-activity-item-img"><div class="my-cover" style="background-image: url(<?php the_sub_field('info-block1-img'); ?>);"></div></div>
						<div class="gl-our-activity-item-text-block">
							<h2 class="gl-our-activity-item-text-title"><?php the_sub_field('info-block1-title'); ?></h2>
							<div class="gl-our-activity-item-text">
								<?php the_sub_field('info-block1-text'); ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div></div>

		<div class="about-adv-wrap wraper-100"><div class="gl-adv-block wraper-1440">
			<div class="gl-adv-block-title-block"><h2 class="gl-adv-block-title"><?php _e('Наші цінності','ds'); ?><span><?php _e('Наші цінності','ds'); ?></span></h2></div>
			<div class="gl-adv-flex wow fadeIn" data-wow-duration="2s" data-wow-delay=".3s">
				<?php if(get_field('preim-block')): ?>
					<?php while(the_repeater_field('preim-block')): ?>
						<div class="gl-adv-item" style="background-image: url(<?php the_sub_field('preim-block-img'); ?>);">
							<h3><?php the_sub_field('preim-block-title'); ?></h3>
							<p><?php the_sub_field('preim-block-text'); ?></p>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div></div>

		<div class="about-products-wrap wraper-100"><div class="gl-products-block">
			<div class="gl-products-flex">
				<?php if(get_field('goto-block')): ?>
					<?php while(the_repeater_field('goto-block')): ?>
						<div class="gl-products-item">
							<div class="gl-products-item-img"><div class="my-cover" style="background-image: url(<?php the_sub_field('goto-block-img'); ?>)">
							</div></div>
							<div class="gl-products-item-info">
								<h3 class="gl-products-item-title"><?php the_sub_field('goto-block-title'); ?></h3>
								<span><?php _e('Перейти','ds'); ?> &raquo;</span>
							</div>
							<a href="/<?php the_sub_field('goto-block-link'); ?>" class="gl-products-item-link"></a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div></div>

		<div class="sert-wrap wraper-100" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/sert-bg.jpg);"><div class="sert-block wraper-1240">
			<h2 class="sert-block-title"><?php _e('Сертифiкати','ds'); ?></h2>
			<div class="sert-slider">
				<?php 
				$img_gallery = get_field('single-slider-img');
				if ($img_gallery) { ?>
				<?php foreach( $img_gallery as $img ) { ?>
				<div><div class="sert-item">
					<div class="sert-item-img"><a href="<?php echo esc_url($img['url']); ?>" class="my-cover gallery" rel="gallery" style="background-image: url(<?php echo esc_url($img['sizes']['large']); ?>);"></a></div>
				</div></div>
				<?php } ?>
				<?php } ?>
			</div>
		</div></div>

	</main>

	<?php include 'footer.php';?>

</div><!-- wrapper -->

<script src="<?php bloginfo('template_directory'); ?>/scripts/nav.jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/slick.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.fancybox-1.3.4.pack.min.js"></script>
<script>
	let elements = document.querySelectorAll("input[name='titleFF']");
	for (let elem of elements) {elem.value = document.title}
</script>
<script>document.getElementById("popup-feedback-form").addEventListener("submit",function(a){var b=new XMLHttpRequest,c=this;a.preventDefault(),b.open("POST","<?php echo bloginfo('template_url'); ?>/scripts/contacts.php",!0),b.onreadystatechange=function(){4==b.readyState&&200==b.status&&(location.href = "/thnx")},b.onerror=function(){alert("Извините, данные не были переданы")},b.send(new FormData(c))},!1);</script>
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
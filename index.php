<?php get_header(); ?>

<div class="wrapper">

	<?php include 'head.php';?>

	<div id="videobg" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/gl-video-bg.jpg);"><div class="videobg-color">
		<div class="videobg-info-block wow fadeInDown" data-wow-duration="2s" data-wow-delay=".3s">
			<span>Biligrain</span>
			<h1 class="videobg-info-title"><?php the_field('gl-title'); ?></h1>
			<div class="videobg-info-link wow fadeInDown" data-wow-duration="2s" data-wow-delay="1s"><a href="#poslugi"><?php _e('Продукцiя','ds'); ?></a></div>
		</div>
	</div></div> 

	<div class="gl-our-activity-wrap wraper-100"><div class="gl-our-activity-block wraper-1240">
		<h2 class="gl-our-activity-block-title wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s"><?php _e('Сфери нашої діяльності','ds'); ?></h2>
		<div class="gl-our-activity-all-items">
			<?php if(get_field('info-block1')): ?>
				<?php while(the_repeater_field('info-block1')): ?>
					<div class="gl-our-activity-item wow fadeIn" data-wow-duration="2s" data-wow-delay=".3s">
						<div class="gl-our-activity-item-img"><div class="my-cover" style="background-image: url(<?php the_sub_field('info-block1-img'); ?>);"></div></div>
						<div class="gl-our-activity-item-text-block">
							<h2 class="gl-our-activity-item-text-title"><?php the_sub_field('info-block1-title'); ?></h2>
							<div class="gl-our-activity-item-text">
								<?php the_sub_field('info-block1-text'); ?>
							</div>
						</div>
						<div class="gl-our-activity-stage">
							<?php if(get_sub_field('info-block1-icons')): ?>
								<?php while(the_repeater_field('info-block1-icons')): ?>
									<div class="gl-our-activity-stage-item">
										<div class="gl-our-activity-stage-item-img">
											<img src="<?php the_sub_field('info-block1-icons-img'); ?>" alt="">
										</div>
										<div class="gl-our-activity-stage-item-text">
											<p><?php the_sub_field('info-block1-icons-title'); ?></p>
										</div>	
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div></div>

	<div class="fixed-bg-wrap wraper-100" style="background-image: url(<?php the_field('gl-fixed-bg'); ?>);"></div>

	<div class="gl-adv-wrap wraper-100"><div class="gl-adv-block wraper-1440">
		<div class="gl-adv-block-title-block wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s"><h2 class="gl-adv-block-title"><?php _e('Переваги','ds'); ?><span><?php _e('переваги','ds'); ?></span></h2></div>
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

	<div class="gl-products-wrap wraper-100">
		<div id="poslugi"></div>
		<div class="gl-products-block">
			<h2 class="gl-products-block-title wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s"><?php _e('Каталог продукцiї','ds'); ?></h2>
			<div class="gl-products-flex wow fadeIn" data-wow-duration="2s" data-wow-delay=".3s">
				<?php if(get_field('goto-block')): ?>
					<?php while(the_repeater_field('goto-block')): ?>
						<div class="gl-products-item">
							<div class="gl-products-item-img"><div class="my-cover" style="background-image: url(<?php the_sub_field('goto-block-img'); ?>)">
							</div></div>
							<div class="gl-products-item-info">
								<h3 class="gl-products-item-title"><?php the_sub_field('goto-block-title'); ?></h3>
								<span><?php _e('До каталогу','ds'); ?> &raquo;</span>
							</div>
							<a href="/<?php the_sub_field('goto-block-link'); ?>" class="gl-products-item-link"></a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="gl-news-wrap wraper-100"><div class="gl-news-block wraper-1240">
		<h2 class="gl-news-block-title wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s"><?php _e('Останнi новини','ds'); ?></h2>
		<div class="gl-news-slider wow fadeIn" data-wow-duration="2s" data-wow-delay=".3s">
			<?php
			$temp = $wp_query; $wp_query= null;
			$wp_query = new WP_Query(); $wp_query->query('showposts=8' . '&paged='.$paged. '&category_name=news');
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<div><div class="gl-news-slide-flex">
				<div class="gl-news-slide-left">
					<div class="gl-news-slide-data">
						<span><?php echo get_the_date('d F, Y'); ?></span>
					</div>
					<div class="gl-news-slide-text-block">
						<h3 class="gl-news-slide-text-title"><?php the_title(); ?></h3>
						<div class="gl-news-slide-text">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
				<div class="gl-news-slide-img"><div class="my-cover" style="background-image: url(<?php
					if ( has_post_thumbnail()) {
						$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
						echo ''.$full_image_url[0] . '';
					}
					?>)"></div></div>
<?php if ( get_field('partner-link') ) {?>
								<a href="<?php the_field('partner-link') ?>" class="gl-news-slide-link" target="_blank" rel="nofollow"></a>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>" class="gl-news-slide-link"></a>
							<?php } ?>
				</div></div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div></div>

	<?php include 'footer.php';?>

</div><!-- wrapper -->

<script src="<?php bloginfo('template_directory'); ?>/scripts/nav.jquery.min.js"></script>
<script>
	if (!$('.no-toch').length) {
		var vid = $('<video width="100%" height="auto" poster="<?php bloginfo('template_directory'); ?>/img/gl-video-bg.jpg" preload="auto" loop muted><source src="<?php bloginfo('template_directory'); ?>/video/gl-video.mp4" type="video/mp4"></source><source src="<?php bloginfo('template_directory'); ?>/video/gl-video.webm" type="video/webm"></source></video>');
		$(window).load(function() {
			vid.prependTo($('#videobg'));
			if (!$('.no-video').length) {
				vid[0].play();
				$(window).on('scroll vidpos', function() {
					if ($(window).scrollTop() > $(window).height() / 3) {
						vid[0].pause();
					} else {
						vid[0].play();
					}
				});
				$(window).trigger('vidpos');
			}
		})
	}
</script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/wow.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/slick.min.js"></script>
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
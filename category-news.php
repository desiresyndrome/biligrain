<?php get_header(); ?>

<?php $queried_object = get_queried_object(); ?>

<div class="wrapper">

	<?php include 'head.php';?>

	<main class="content">

		<div class="page-header-wrap my-cover" style="background-image: url(<?php the_field('page-header-bg', $queried_object); ?>)"><div class="page-header-block">
			<div class="page-header-inner">
				<div class="breadcrumbs"><ul itemscope itemtype="http://schema.org/BreadcrumbList">
					  <?php if(function_exists('bcn_display')){bcn_display();} ?>
				</ul></div>
<h1 class="page-header-title"><?php if ( get_field('ceo-title', $queried_object) ) {?><?php the_field('ceo-title', $queried_object) ?><?php } else { ?><?php single_cat_title(); ?><?php } ?></h1>
			</div>
		</div></div>
 
			<div class="news-block wraper-1240">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="news-item"><div class="news-item-flex">
						<div class="news-item-left">
							<div class="news-item-data">
								<span><?php echo get_the_date('d F, Y'); ?></span>
							</div>
							<div class="news-item-text-block">
								<h3 class="news-item-text-title"><?php if ( get_field('ceo-title') ) {?><?php the_field('ceo-title') ?><?php } else { ?><?php the_title(); ?><?php } ?></h3>	
								<div class="news-item-text">
									<?php if ( get_field('pre-text') ) {?><?php the_field('pre-text') ?><?php } else { ?><?php the_excerpt(); ?><?php } ?>
								</div>
							</div>
						</div>
						<div class="news-item-img"><div class="my-cover" style="background-image: url(<?php
							if ( has_post_thumbnail()) {
								$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
								echo ''.$full_image_url[0] . '';
							}
							?>)"></div></div>
							<?php if ( get_field('partner-link') ) {?>
								<a href="<?php the_field('partner-link') ?>" class="news-item-link" target="_blank" rel="nofollow"></a>
							<?php } else { ?>
								<a href="<?php the_permalink(); ?>" class="news-item-link"></a>
							<?php } ?>
						</div></div>
					<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>
				</div>

				<div class="navigathion wraper-1240">
					<?php wp_pagenavi();  ?>		
				</div>

			</main>

		</main>

		<?php include 'footer.php';?>

	</div><!-- wrapper -->

	<script src="<?php bloginfo('template_directory'); ?>/scripts/nav.jquery.min.js"></script>
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
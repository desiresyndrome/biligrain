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

		<main class="content">

			<div class="wz-culturs-wrap wraper-100"><div class="wz-culturs-block wraper-1340">
				<?php
				$taxonomy = 'category';
				$term = get_queried_object();
				$children = get_terms($term->taxonomy, array('parent' => $term->term_id, 'hide_empty' => false));
				foreach ($children as $subcat) :   
					?>
					<div class="wz-culturs-item wz-culturs-item-change">
						<div class="wz-culturs-item-img"><div><a href="<?php echo get_category_link( $subcat->term_id ) ?>" class="my-cover" style="background-image: url(<?php if ( get_field('pre-img', $subcat) ) {?><?php the_field('pre-img', $subcat) ?><?php } else { ?><?php the_field('page-header-bg', $subcat); ?><?php } ?>);"></a></div></div>
						<div class="wz-culturs-item-info">
							<div class="wz-culturs-item-title"><a href="<?php echo get_category_link( $subcat->term_id ) ?>"><h2><?php if ( get_field('ceo-title', $subcat) ) {?><?php the_field('ceo-title', $subcat) ?><?php } else { ?><?php echo $subcat->name ?><?php } ?></h2></a></div>
							<div class="wz-culturs-item-text">
								<?php the_field('pre-text', $subcat); ?>
							</div>
							<div class="wz-culturs-item-price"><span>
								<?php 
								$args = array('cat' => $subcat->term_id, 'posts_per_page' => -1,);
								$query = new WP_Query( $args );
								if ( $query->have_posts() ) {
									if ( get_field('pre-price') ) {
										$min_value = false;
										while ( $query->have_posts() ) {
											$query->the_post();
											$value = get_field('pre-price');
											if ($min_value === false || $value < $min_value) {
												$min_value = $value;
												 _e('Цiна: вiд', 'ds');
												 echo '&#32;'.$min_value.'&#32;';
												 _e('грн/т', 'ds');
												break;
											}
										}
									}
									else {_e('Цiна: Уточнюйте у менеджера','ds');}
								}
								else {_e('Цiна: Уточнюйте у менеджера','ds');}
								wp_reset_query();
								?>
							</span></div>
							<div class="wz-culturs-item-link"><a href="<?php echo get_category_link( $subcat->term_id ) ?>"><span><?php _e('Перейти','ds'); ?></span></a></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div></div>

			<?php if(get_field('ceo-text', $queried_object)): ?>
				<div class="products-text-wrap wraper-100"><div class="products-text-block wraper-1240">
					<h2 class="ce-text-title"><?php the_field('ceo-text-title', $queried_object); ?></h2>
					<div class="ce-text ce-text-change-color">
						<?php the_field('ceo-text', $queried_object); ?>
					</div>
				</div></div>
			<?php endif; ?>

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
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
				$sub_cats = get_terms($term->taxonomy, array('parent' => $term->term_id, 'hide_empty' => true));
				if( $sub_cats ){
					echo '<div class="wz-culturs-cat-block">';
					foreach( $sub_cats as $cat ){
						echo '<div class="wz-culturs-cat-item"><a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a></div>';
					}
					echo '</div>';
					foreach( $sub_cats as $cat ){
						echo '<a href="'.get_category_link($cat->term_id).'" class="wz-culturs-title"><h2>'.$cat->name.'</h2></a>';
						$myposts = get_posts(array(
							'numberposts' => -1, 'category' => $cat->term_id, 'orderby' => 'post_date', 'order' => 'DESC',
						));
						global $post;
						foreach($myposts as $post){
							setup_postdata($post);
							$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
							?>
							<div class="wz-culturs-item">
								<div class="wz-culturs-item-img"><div><a href="<?php echo get_permalink() ?>" class="my-cover" style="background-image: url(<?php echo $full_image_url[0]; ?>);"></a></div></div>
								<div class="wz-culturs-item-info">
									<div class="wz-culturs-item-title"><a href="<?php echo get_permalink() ?>"><h2><?php if ( get_field('ceo-title') ) {?><?php the_field('ceo-title') ?><?php } else { ?><?php the_title(); ?><?php } ?></h2></a></div>
									<div class="wz-culturs-item-text">
										<?php if ( get_field('pre-text') ) {?><?php the_field('pre-text') ?><?php } else { ?><?php the_excerpt(); ?><?php } ?>
									</div>
									<div class="wz-culturs-stock">
										<div class="wz-culturs-item-price"><span><?php if ( get_field('pre-price') ) {?><?php _e('Цiна: вiд','ds'); ?> <?php the_field('pre-price') ?> <?php _e('грн/т','ds'); ?><?php } else { ?><?php _e('Цiна: Уточнюйте у менеджера','ds'); ?><?php } ?></span></div>
<?php if( get_field('pre-nal') ) { ?><div class="wz-culturs-item-stock price-yes"><span><?php _e('Є в наявностi','ds'); ?></span></div><?php } else { ?><div class="wz-culturs-item-stock price-no"><span><?php _e('Немає в наявностi','ds'); ?></span></div><?php } ?>
									</div>
									<div class="wz-culturs-item-link"><a href="<?php echo get_permalink() ?>"><span><?php _e('Детальнiше','ds'); ?></span></a></div>
								</div>
							</div>
							<?php
						} 
					}
				}
				else {
					$myposts = get_posts(array(
						'numberposts' => -1, 'category' => $term->term_id, 'orderby' => 'post_date', 'order' => 'DESC',
					));
					global $post;
					foreach($myposts as $post){
						setup_postdata($post);
						$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
						?>
						<div class="wz-culturs-item">
							<div class="wz-culturs-item-img"><div><a href="<?php echo get_permalink() ?>" class="my-cover" style="background-image: url(<?php echo $full_image_url[0]; ?>);"></a></div></div>
							<div class="wz-culturs-item-info">
								<div class="wz-culturs-item-title"><a href="<?php echo get_permalink() ?>"><h2><?php if ( get_field('ceo-title') ) {?><?php the_field('ceo-title') ?><?php } else { ?><?php the_title(); ?><?php } ?></h2></a></div>
								<div class="wz-culturs-item-text">
									<?php if ( get_field('pre-text') ) {?><?php the_field('pre-text') ?><?php } else { ?><?php the_excerpt(); ?><?php } ?>
								</div>
								<div class="wz-culturs-stock">
									<div class="wz-culturs-item-price"><span><?php if ( get_field('pre-price') ) {?>Цiна: вiд <?php the_field('pre-price') ?> грн/т<?php } else { ?>Цiна: Уточнюйте у менеджера<?php } ?></span></div>
<?php if( get_field('pre-nal') ) { ?><div class="wz-culturs-item-stock price-yes"><span>Є в наявностi</span></div><?php } else { ?><div class="wz-culturs-item-stock price-no"><span>Немає в наявностi</span></div><?php } ?>
								</div>
								<div class="wz-culturs-item-link"><a href="<?php echo get_permalink() ?>"><span>Детальнiше</span></a></div>
							</div>
						</div>
						<?php
					} 
				}
				wp_reset_postdata();
				?>
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
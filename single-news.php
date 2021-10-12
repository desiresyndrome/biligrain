 <?php
/*
Template Name: Single
*/
?>

<?php get_header(); ?>

<?php 
$category = get_the_category(); 
$term = get_term($category[0]->cat_ID);
?>

<div class="wrapper">

	<?php include 'head.php';?>

	<main class="content">

		<?php if (get_field('page-header-bg')) { ?>
		<div class="page-header-wrap my-cover" style="background-image: url(<?php the_field('page-header-bg'); ?>)">
			<?php } else { ?>
			<div class="page-header-wrap my-cover" style="background-image: url(<?php the_field('page-header-bg', $term); ?>)">
				<?php } ?>
				<div class="page-header-block">
					<div class="page-header-inner">
				<div class="breadcrumbs"><ul itemscope itemtype="http://schema.org/BreadcrumbList">
					  <?php if(function_exists('bcn_display')){bcn_display();} ?>
				</ul></div>
				<h1 class="page-header-title"><?php if ( get_field('ceo-title') ) {?><?php the_field('ceo-title') ?><?php } else { ?><?php the_title(); ?><?php } ?></h1>
					</div>
				</div>
			</div>

			<div class="single-block wraper-940">
				<div class="text-header">
					<div class="text-header-cat">
						<?php 
						$categories = get_the_category($post_id);
						foreach($categories as $category) {
							if( !in_array( $category->term_id, array() ) ){ 
								echo '<a href="'.get_category_link($category->term_id).'">'.get_cat_name($category->cat_ID).'</a>';
							}
						}
						?>
					</div>
					<div class="text-header-data"><span><?php echo get_the_date('n F Y'); ?></span></div>
				</div>
				<div class="single-text">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				<?php else: ?>
				<?php endif; ?>
				<div class="clear"></div>
			</div>
			<div class="share42init" data-url="<?php the_permalink() ?>" data-title="<?php the_title() ?>" data-image="<?php the_post_thumbnail_url(); ?>" data-description='<?php
			$my_descr = get_post_meta($post->ID, "_aioseop_description", true);
			if ($my_descr){
				echo  "<p>$my_descr</p>";
			}
			else echo "Перейдите на сайт, чтобы ознакомиться с записью.";
			?>'></div>
		</div>

		<?php $prev_post = get_previous_post($in_same_term = true); if ( is_a( $prev_post , 'WP_Post' ) ) : ?>
		<div class="prev-single-block pn-single-block">
			<div class="prev-single-top-block">
				<div class="prev-single-img"><div class="my-cover" style="background-image: url(<?php
					if ( has_post_thumbnail()) {
						$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID), 'medium');
						echo ''.$full_image_url[0] . '';
					}
					?>)"></div></div>
					<div class="prev-single-arrow"></div>
				</div>
				<div class="prev-single-bottom-block"><div class="prev-single-bottom-block-text">
					<p><?php echo get_the_title( $prev_post->ID ); ?></p>
				</div></div>
				<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="next-single-block-link"></a>
			</div>
		<?php endif; ?>

		<?php $next_post = get_next_post($in_same_term = true); if ( is_a( $next_post , 'WP_Post' ) ) : ?>
		<div class="next-single-block pn-single-block">
			<div class="next-single-top-block">
				<div class="next-single-img"><div class="my-cover" style="background-image: url(<?php
					if ( has_post_thumbnail()) {
						$full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'medium');
						echo ''.$full_image_url[0] . '';
					}
					?>)"></div></div>
					<div class="next-single-arrow"></div>
				</div>
				<div class="next-single-bottom-block"><div class="next-single-bottom-block-text">
					<p><?php echo get_the_title( $next_post->ID ); ?></p>
				</div></div>
				<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next-single-block-link"></a>
			</div>
		<?php endif; ?>
 
	</main>

	<?php include 'footer.php';?>

</div><!-- wrapper -->

<script src="<?php bloginfo('template_directory'); ?>/scripts/nav.jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/share42.js"></script>
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
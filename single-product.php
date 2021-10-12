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

		<div class="page-header-wrap my-cover" style="background-image: url(<?php the_field('page-header-bg', $term); ?>)"><div class="page-header-block">
			<div class="page-header-inner">
				<div class="breadcrumbs"><ul itemscope itemtype="http://schema.org/BreadcrumbList">
					  <?php if(function_exists('bcn_display')){bcn_display();} ?>
				</ul></div>
				<h1 class="page-header-title"><?php if ( get_field('ceo-title') ) {?><?php the_field('ceo-title') ?><?php } else { ?><?php the_title(); ?><?php } ?></h1>
			</div>
		</div></div>

		<main class="content">

			<div class="product-block wraper-1240"><div class="product-flex">
				<div class="product-text-title"><h2><?php the_title(); ?></h2></div>
				<div class="product-slider">
					<?php 
					$img_gallery = get_field('single-slider-img');
					if ($img_gallery) { ?>
					<?php foreach( $img_gallery as $img ) { ?>
					<div><a href="<?php echo esc_url($img['url']); ?>" class="my-cover gallery" rel="gallery" style="background-image: url(<?php echo esc_url($img['sizes']['large']); ?>);"></a></div>
					<?php } ?>
					<?php } ?>
				</div>
				<div class="product-text-block">
					<div class="product-text scrollbar-inner"><div class="scrollbar_padding">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>
					<div class="clear"></div>
				</div></div>
				<div class="product-text-btn"><a href="javascript:void(0)" class="click-pop"><?php _e('Зв&#39;язатися з нами','ds'); ?></a></div>
			</div>
		</div></div>
	
	</main>

	<?php include 'footer.php';?>

</div><!-- wrapper -->

<script src="<?php bloginfo('template_directory'); ?>/scripts/nav.jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/slick.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/scripts/jquery.scrollbar.min.js"></script>
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
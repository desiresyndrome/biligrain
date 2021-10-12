<?php
/*
Template Name: Service
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
				<h1 class="page-header-title"><?php if ( get_field('ceo-title') ) {?><?php the_field('ceo-title') ?><?php } else { ?><?php the_title(); ?><?php } ?></h1>
			</div>
		</div></div>
		
		<div class="service-our-activity-wrap wraper-100"><div class="gl-our-activity-block wraper-1240">
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
		</div></div>

		<?php if(get_field('ceo-text')): ?>
			<div class="service-text-wrap wraper-100"><div class="service-text-block wraper-1240">
				<h2 class="ce-text-title"><?php the_field('ceo-text-title'); ?></h2>
				<div class="ce-text ce-text-change-color">
					<?php the_field('ceo-text'); ?>
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
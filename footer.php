<footer class="footer-wrap wraper-100 wow fadeInUp" data-wow-duration="3s" data-wow-delay=".3s">
	<div class="footer-subscribe-wrap"><div class="footer-subscribe-block wraper-1240">
		<div class="footer-subscribe-text">
			<h3 class="footer-subscribe-title"><?php _e('Бажаєте бути в курсі всіх подій?','ds'); ?></h3>
			<p><?php _e('Підпишіться на нашу розсилку! Ми будемо дуже раді вислати Вам наші новини.','ds'); ?></p>
		</div>
		<div class="footer-subscribe-form">
			<form action="https://biligrain.us17.list-manage.com/subscribe/post-json?u=e5e2d8ef76619d65c88ae5d10&amp;id=d9a354f5a6&c=?"
			method="get" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate subscribe-form placeholder_light">
			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="E-mail *" autocomplete="off" required>
			<div style="position: absolute; left: -5000px;" aria-hidden="true">
				<input type="text" name="b_e5e2d8ef76619d65c88ae5d10_d9a354f5a6" tabindex="-1" value="">
			</div>
			<button type="submit" name="subscribe" id="mc-embedded-subscribe" class="mc-button"><?php _e('Пiдписатися','ds'); ?></button>    
		</form>
		 <div id="subscribe-result"></div>
	</div>
</div></div>
<div class="footer-contacts wraper-1240">
	<div class="footer-contacts-info">
		<div class="footer-contacts-logo"></div>
		<div class="footer-contacts-text">
			<p><?php the_field('footer-text', 'options'); ?></p>
		</div>
	</div>
	<div class="footer-contacts-right">
		<div class="footer-contacts-item">
			<span class="footer-contacts-item-title"><?php _e('Про нас','ds'); ?></span>
			<div class="footer-contacts-menu"><?php wp_nav_menu(array('theme_location' => 'footer-contacts-menu1','container' => false)); ?></div>
		</div>
		<div class="footer-contacts-item">
			<span class="footer-contacts-item-title"><?php _e('Продукцiя','ds'); ?></span>
			<div class="footer-contacts-menu"><?php wp_nav_menu(array('theme_location' => 'footer-contacts-menu2','container' => false)); ?></div>
		</div>
		<div class="footer-contacts-item">
			<span class="footer-contacts-item-title"><?php _e('Контакти','ds'); ?></span>
			<div class="footer-contacts-item-inner">
				<p class="footer-contacts-adress"><a href="<?php _e('/','ds'); ?>contacts"><?php the_field('footer-adress', 'options'); ?></a></p>
				<p class="footer-contacts-tel"><?php the_field('footer-tel', 'options'); ?></p>
				<p class="footer-contacts-mail"><a href="mailto:<?php the_field('footer-email', 'options'); ?>"><?php the_field('footer-email', 'options'); ?></a></p>
				<div class="footer-contacts-item-qr"><div class="my-cover" style="background-image: url(<?php the_field('footer-qr', 'options'); ?>);"></div></div>
			</div>
		</div>
	</div>
</div>
<div class="made-by-wrap"><div class="made-by-block wraper-1240">
	<div class="made-by-c"><span>Copyright © 2014 - <?php echo date('Y'); ?> Biligrain.com</span></div>
	<div class="made-by-who"><a href="https://web-desire.com/" target="_blank"><?php _e('Розробка сайту: Web-Desire','ds'); ?></a></div>
</div></div>
</footer>

<a href='javascript:void(0)' class="tops"></a>
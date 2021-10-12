<header class="header-wrap my-active wraper-100"><div class="header-block">
	<?php 
	if(is_front_page()){echo '<div class="header-logo"></div>';}
	else {echo '<a href="/" class="header-logo"></a>';}
	?>
	<button class="nav-button cmn-toggle-switch"><span></span></button>
	<div class="header-nav flexscroll"><?php wp_nav_menu(array('theme_location' => 'header-nav','container' => false)); ?></div>
	<div class="header-right">
		<div id="languages">
			<div onclick="languagesFunction()" class="dropbtn">
<?php _e('UA','ds'); ?>
			</div>
			<div id="myDropdown" class="dropdown-content">
				 <?php echo do_shortcode("[wpml_custom_lang_ISO]"); ?>
			</div>
		</div>
		<div class="header-button"><a href="javascript:void(0)" class="click-pop"><?php _e('Зворотнiй зв&#39;язок','ds'); ?></a></div>
	</div>
</div></header>
<div class="header-padding"></div>

<div class="click-pop" id="bg-popup"></div>
<div id="window">
	<div class="feedback-form-title-block"><h2 class="feedback-form-title"><?php _e('Зворотнiй зв&#39;язок','ds'); ?><span>feedback</span></h2></div>
	<form enctype="multipart/form-data" method="post" id="popup-feedback-form" class="placeholder_gray" autocomplete="off">
		<input type="hidden" name="titleFF">
		<input name="nameFF" class="form-item-name feedback-form-border" type="text" placeholder="<?php _e('Iм&#39;я','ds'); ?> *" required/>
		<input name="telFF" class="form-item-tel feedback-form-border m-tel" type="tel" placeholder="<?php _e('Телефон','ds'); ?> *" required/>
		<input name="mailFF" class="form-item-mail feedback-form-border" type="email" placeholder="E-mail" />
		<textarea name="msgFF" class="form-item-pen feedback-form-border" placeholder="<?php _e('Ваше повiдомлення','ds'); ?>"></textarea>
		<div class="feedback-form-btn"><input name="send" class="submitFF" type="submit" value="<?php _e('Вiдправити','ds'); ?>" /> </div>
	</form>
</div>
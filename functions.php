<?php

// Удаляем лишние теги в шапке WordPress
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');


// ОТКЛЮЧИТЬ обновления WordPress
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');


// подключение папки перевода темы
function my_theme_setup(){
	load_theme_textdomain('ds', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'my_theme_setup'); 


// Изменить шорткод для WPML
function wpml_shortcode_lang_ISO(){
	$languages = icl_get_languages('skip_missing=0');
	if (function_exists('icl_get_languages')) {
		$languages = icl_get_languages('skip_missing=0&orderby=code&order=desc');
		echo '<ul class="language-chooser">';
		if(!empty($languages)){
			foreach($languages as $l){
				$class = $l['active'] ? ' class="active"' : '';
				if ($class) {
					$langs .=  '<li class="active"><a href="'.$l['url'].'"><span>'.strtoupper ($l['translated_name']).'</span></a></li>';
				} else {
					$langs .=  '<li><a href="'.$l['url'].'"><span>'.strtoupper ($l['translated_name']).'</span></a></li>';
				}
			}
		}
	}
	return $langs;
}
add_shortcode( 'wpml_custom_lang_ISO', 'wpml_shortcode_lang_ISO' );


/**********************
** Настройки записей **
**********************/

// миниатюра к записи
add_theme_support('post-thumbnails'); 

 // отключение стилей стандартных записей
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

// настройка стилей
function improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p>,<br>,<h2>,<h1>,<em>');
		$excerpt_length = 32;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, ' ...');
			$text = implode(' ', $words);
		}
	}
	return $text;
} 


// Отключение замены символов
remove_filter('the_content', 'wptexturize');
remove_filter('the_title', 'wptexturize');
remove_filter('comment_text', 'wptexturize');
remove_filter('the_excerpt', 'wptexturize');


/******************************
* Загружаемые стили и скрипты *
******************************/

// Подключение CSS и JS
add_action('wp_enqueue_scripts', 'load_style_script');

function load_style_script(){
	wp_enqueue_style('style', get_template_directory_uri() . '
		/css/style.css');
	wp_enqueue_style('media_style', get_template_directory_uri() . '
		/css/media_style.css');
}

// Подключаем jquery
function my_scripts_method() {
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js');
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );


// поддержка Меню 
register_nav_menu('header-nav','Главное меню');
register_nav_menu('footer-contacts-menu1','Про нас (footer)');
register_nav_menu('footer-contacts-menu2','Продукция (footer)');
 

// Отключение ненужных пунктов Админки
function remove_menus(){
  remove_menu_page( 'edit-comments.php' );//Комментарии
}
add_action( 'admin_menu', 'remove_menus' );


// Добавляем ко всем картинкам в постах адаптивность (в css класс .img-responsive)
function add_image_responsive_class($content) {
	global $post;
	$pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
	$replacement = '<img$1class="$2 img-responsive"$3>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
add_filter('the_content', 'add_image_responsive_class');


// ACF Options page
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
	if( function_exists('acf_add_options_page') ) {
		$option_page = acf_add_options_page(array(
			'page_title'    => __('My Footer'),
			'menu_title'    => __('My Footer'),
			'menu_slug'     => 'theme-footer-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));
	}
}


// ACF для отдельной категории
add_filter('acf/location/rule_types', 'acf_location_rules_types', 999);
function acf_location_rules_types($choices){
	if (!isset($choices['Terms'])){$choices['Terms'] = array();}
	$choices['Terms']['category_id'] = 'Category Name';
	return $choices;
}

add_filter('acf/location/rule_values/category_id', 'acf_location_rules_values_category');
function acf_location_rules_values_category($choices){
	$taxonomy = 'category';
	$args = array('hide_empty' => false);
	$terms = get_terms($taxonomy, $args);
	if (count($terms)){foreach ($terms as $term){$choices[$term->term_id] = $term->name;}}
	return $choices;
}

add_filter('acf/location/rule_match/category_id', 'acf_location_rules_match_category', 8, 9);
function acf_location_rules_match_category($match, $rule, $options){
if (!isset($_GET['tag_ID']) ||
!isset($_GET['taxonomy']) ||
$_GET['taxonomy'] != 'category'){return $match;}
$term_id = $_GET['tag_ID'];
$selected_term = $rule['value'];
if ($rule['operator'] == '=='){$match = ($selected_term == $term_id);}
elseif ($rule['operator'] == '!='){$match = ($selected_term != $term_id);}
return $match;
}


// Индивидуальный шаблон подкатегорий
add_action('category_template', 'delfi_load_cat_parent_template');
function delfi_load_cat_parent_template($template) {
    $cat_ID = absint( get_query_var('cat') );
    $category = get_category( $cat_ID );
 if($category->category_parent > 0) {
 $templates = array();
 
 if(!is_wp_error($category)) {
 $templates[] = "category-{$category->slug}.php";
 }
 $templates[] = "category-$cat_ID.php";
 
 $parentCategory = get_category($category->category_parent);
 if(!is_wp_error($parentCategory)) {
 $templates[] = "subcategory.php";
 $templates[] = "subcategory.php";
 }
 
 $templates[] = "category.php";
 $template = locate_template($templates);
 }
    return $template;
}


// BreadCrumbs (Allow extra tags in <li>)
function scratch_bcn_allowed_html($allowed_html){
    $allowed_html['li'] = array(
		'itemprop' => true,
		'itemscope' => true,
		'itemtype' => true
		
    );
    return $allowed_html;
}
add_filter('bcn_allowed_html', 'scratch_bcn_allowed_html');
?>
<?php

// Функции темы

add_theme_support('post-thumbnails');


remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//remove_action('wp_head', 'feed_links_extra', 3);
//remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head','rel_canonical');

remove_filter('the_content', 'wpautop'); // Отключаем автоформатирование в полном посте
remove_filter('the_excerpt', 'wpautop'); // Отключаем автоформатирование в кратком(анонсе) посте
remove_filter('comment_text', 'wpautop'); // Отключаем автоформатирование в комментариях

function __theme_query_vars_filter($vars){
	//$vars[] = 'flat_id';
	return $vars;
}
add_filter('query_vars', '__theme_query_vars_filter');



function getAzbnController($config=array()) {
	global $Azbn;
	if(isset($Azbn)) {
		
	} else {
		include('azbn.ru/AzbnController.class.php');
		//include('azbn.ru/AzbnAjax.class.php');
		$Azbn = new AzbnController($config);
	}
}
getAzbnController(array());
$Azbn->setPath(get_bloginfo('template_directory'));

$Azbn->setAjax();

$Azbn->setShortcodes();

$Azbn->setImgs();
$Azbn->Imgs->setImgSizes(array(
	/*
	'100x100crop' => array(
		'w' => 100,
		'h' => 100,
		'crop' => true,
	),
	*/
	'95x65' => array(
		'w' => 95,
		'h' => 65,
		'crop' => true,
	),
	'795x530' => array(
		'w' => 795,
		'h' => 530,
		'crop' => true,
	),
	'991x544' => array(
		'w' => 991,
		'h' => 544,
		'crop' => true,
	),
));

$metabox = new AzbnMetaBox($Azbn, array(
	'id' => 'azbn_page',
	'tpl' => 'azbn_page',
	'title' => 'Настройки страницы (azbn_page)',
	'post_type' => array('page'),
	'context' => 'normal',//normal, advanced или side
	'priority' => 'high',
	'field' => array(
		array(
			'label' => 'Стандартный шаблон оформления',
			'name' => 'tpl',
			'type' => 'input',//'textarea'
			'default' => 'default',
		),
	),
));

$metabox_product = new AzbnMetaBox($Azbn, array(
	'id' => 'azbn_product',
	'tpl' => 'azbn_product',
	'title' => 'Матрица цен',
	'post_type' => array('product'),
	'context' => 'normal',//normal, advanced или side
	'priority' => 'high',
	'field' => array(
		array(
			'label' => 'Матрица цен',
			'name' => 'costs',
			'type' => 'textarea',//'textarea'
			'default' => '',
		),
	),
));


function __theme_set_category_for_pages() {
	register_taxonomy(
		'page-category',
		'page',
		array(
			'hierarchical' => true,
			'label' => 'Рубрики страниц',
		)
	);
}
add_action('init', '__theme_set_category_for_pages');

function __theme_set_category_for_attachments() {
	register_taxonomy(
		'attachment-category',
		'attachment',
		array(
			'hierarchical' => true,
			'label' => 'Рубрики файлов',
		)
	);
}
add_action('init', '__theme_set_category_for_attachments');

function l($id) {
	return get_permalink($id);
}

function t($id) {
	return get_the_title($id);
}

function phone($str) {
	return preg_replace('/[^0-9]/', '', $str);
}

function getContact($field = '', $post_id = 4) {
	return get_post_meta($post_id, $field, true);
}

function c($post_id) {
	$page_data = get_page($post_id);
	if ($page_data) {
		return apply_filters('the_content', $page_data->post_content);
	} else {
		return false;
	}
}

function d2r($date) {
	$month = array(
		'january' => 'января',
		'february' => 'февраля',
		'march' => 'марта',
		'april' => 'апреля',
		'may' => 'мая',
		'june' => 'июня',
		'july' => 'июля',
		'august' => 'августа',
		'september' => 'сентября',
		'october' => 'октября',
		'november' => 'ноября',
		'december' => 'декабря',
	);
	$days = array(
		'monday' => 'Понедельник',
		'tuesday' => 'Вторник',
		'wednesday' => 'Среда',
		'thursday' => 'Четверг',
		'friday' => 'Пятница',
		'saturday' => 'Суббота',
		'sunday' => 'Воскресенье',
	);
	return str_replace(array_merge(array_keys($month), array_keys($days)), array_merge($month, $days), mb_strtolower($date, 'UTF-8'));
}

/*
function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
	wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
*/


/*
function new_excerpt_length($length){
	return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');




function shortStr($str,$len=77) {
	$str = strip_tags($str);
	$str = strtr($str,array("\t"=>'',"\n"=>'',"\r"=>'',"    "=>' ',"   "=>' ',"  "=>' ',));
	return mb_substr($str, 0, $len, 'UTF-8').'…';
}

function getPostImgUrl($id,$size='large') {
	$image_id = get_post_thumbnail_id($id);
	$image_url = wp_get_attachment_image_src($image_id, $size);
	return $image_url[0];
}
*/

function __theme_pagination($posts = array(), $page = 0, $range = 10)
{
	if(count($posts) > $range) {
		
		$pages = ceil(count($posts) / $range);
		?>
		<div class="pagination-block _cp__pagination-block">
			<ul class="pagination__list">
				<?
				for($i = 0; $i < $pages; $i++) {
					$_i = $i + 1;
				?>
				<li class="pagination__list-item <?if($i == $page){?> is--active <?}?>">
					<a href="?paged=<?=$_i;?>" class="pagination__list-link"><?=$_i;?></a>
				</li>
				<?
				}
				?>
			</ul>
		</div>
		<?
		
	}
}

function pagination($wp_query, $pages = '', $range = 10)
{
	
}

function __theme_get_materials()
{
	return array(
		'wood' => 'Дерево',
		'metal' => 'Металл',
		'glass' => 'Стекло',
	);
}



add_action(
	'init', 
	function() {
		$labels = array(
			'name' => 'Продукция',
			'singular_name' => 'Продукция',
			'add_new' => 'Добавить товар',
			'add_new_item' => 'Добавить новый товар',
			'edit_item' => 'Редактировать товар',
			'new_item' => 'Новый товар',
			'view_item' => 'Посмотреть товар',
			'search_items' => 'Найти товар',
			'not_found' =>	'Товар не найдена',
			'not_found_in_trash' => 'В корзине товары не найдены',
			'parent_item_colon' => '',
			'menu_name' => 'Продукция'
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => 34,
			'supports' => array('title', 'page-attributes', 'editor', 'thumbnail'), //'custom-fields'
		'taxonomies' => array('product_taxonomies') 
		);
		register_post_type('product',$args);
		
		
		$labels = array(
			'name' => _x( 'Категории', 'taxonomy general name' ),
			'singular_name' => _x( 'Категории', 'taxonomy singular name' ),
			'search_items' =>	__( 'Найти категорию' ),
			'all_items' => __( 'Все категории' ),
			'parent_item' => __( 'Родительская категория' ),
			'parent_item_colon' => __( 'Родительская категория' ),
			'edit_item' => __( 'Родительская категория' ),
			'update_item' => __( 'Обновить категорию' ),
			'add_new_item' => __( 'Добавить новую категорию' ),
			'new_item_name' => __( 'Название новой категории' ),
			'menu_name' => __( 'Категории' ),
		);
		register_taxonomy('product_taxonomies', array('product'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'products' ),
		));
		
	},
	34
);



add_action(
	'init', 
	function() {
		$labels = array(
			'name' => 'Фотографии',
			'singular_name' => 'Фотографии',
			'add_new' => 'Добавить фотографию',
			'add_new_item' => 'Добавить новую фотографию',
			'edit_item' => 'Редактировать фотографию',
			'new_item' => 'Новая фотография',
			'view_item' => 'Посмотреть фотографию',
			'search_items' => 'Найти фотографию',
			'not_found' =>	'Фотография не найдена',
			'not_found_in_trash' => 'В корзине фотографии не найдены',
			'parent_item_colon' => '',
			'menu_name' => 'Фотографии'
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 35,
			'supports' => array('title', 'page-attributes', 'editor', 'thumbnail'), //'custom-fields'
		'taxonomies' => array('photo_taxonomies') 
		);
		register_post_type('photo',$args);
		
		
		$labels = array(
			'name' => _x( 'Галереи', 'taxonomy general name' ),
			'singular_name' => _x( 'Галереи', 'taxonomy singular name' ),
			'search_items' =>	__( 'Найти галерею' ),
			'all_items' => __( 'Все галереи' ),
			'parent_item' => __( 'Родительская галерея' ),
			'parent_item_colon' => __( 'Родительская галерея' ),
			'edit_item' => __( 'Родительская галерея' ),
			'update_item' => __( 'Обновить галерею' ),
			'add_new_item' => __( 'Добавить новую галерею' ),
			'new_item_name' => __( 'Название новой галереи' ),
			'menu_name' => __( 'Галереи' ),
		);
		register_taxonomy('photo_taxonomies', array('photo'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'photos' ),
		));
		
	},
	35
);


add_action(
	'init', 
	function() {
		$labels = array(
			'name' => 'Формы и заявки',
			'singular_name' => 'Формы и заявки',
			'add_new' => 'Добавить заявку',
			'add_new_item' => 'Добавить новую заявку',
			'edit_item' => 'Редактировать заявку',
			'new_item' => 'Новая заявка',
			'view_item' => 'Посмотреть заявку',
			'search_items' => 'Найти заявку',
			'not_found' =>	'Заявка не найдена',
			'not_found_in_trash' => 'В корзине заявки не найдены',
			'parent_item_colon' => '',
			'menu_name' => 'Формы и заявки'
		);
		$args = array(
			'labels' => $labels,
			'public' => false,
			'publicly_queryable' => false,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'page',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => 50,
			'supports' => array('title', 'page-attributes', 'editor', ), //'custom-fields'
		'taxonomies' => array('azbnform_taxonomies') 
		);
		register_post_type('azbnform',$args);
		
		
		$labels = array(
			'name' => _x( 'Категории заявок', 'taxonomy general name' ),
			'singular_name' => _x( 'Категория заявок', 'taxonomy singular name' ),
			'search_items' =>	__( 'Найти категории' ),
			'all_items' => __( 'Все категории заявок' ),
			'parent_item' => __( 'Родительская категория заявок' ),
			'parent_item_colon' => __( 'Родительская категория' ),
			'edit_item' => __( 'Родительская категория' ),
			'update_item' => __( 'Обновить категорию' ),
			'add_new_item' => __( 'Добавить новую категорию' ),
			'new_item_name' => __( 'Название новой категории заявок' ),
			'menu_name' => __( 'Категории заявок' ),
		);
		register_taxonomy('azbnform_taxonomies', array('azbnform'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'azbnforms' ),
		));
		
	},
	50
);



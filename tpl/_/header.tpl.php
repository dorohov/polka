<?

$body_style = '';

if(is_front_page()) {
	$body_class = 'index-page ';
	$body_style = 'style="background-image: url(' . $this->path('img') . '/bg/bg-index.jpg)"';
}

?><!DOCTYPE html>
<html <?php language_attributes();?> > 
<head>
<?
$this->tpl('_/head', array());
wp_head();
?>
</head>
<body <?php body_class($body_class); ?> <?=$body_style;?> >

<?
$this->tpl('_/navbar', array());
?>

<!--
<div>
<?
$posts = $this->getItems(array(
	'post_type' => 'page',
	'posts_per_page' => -1,
	'orderby' => 'menu_order title date',
	'order'   => 'ASC',
	/*
	'post_parent' => 0,
	'tax_query' => array(array(
		'taxonomy' => 'project_taxonomies',
		'field' => 'slug',
		'terms' => array('residential'),
	)),
	*/
));
foreach($posts as $p) {
	echo "<a href=\"" . l($p->ID) . "\" >{$p->post_title}</a>";
}
?>
</div>
-->
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

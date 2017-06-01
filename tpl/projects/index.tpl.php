<?

$range = 10;

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$paged = $paged - 1;

$posts = $this->getItems(array(
	'post_type' => 'photo',
	'posts_per_page' => -1,
	//'page' => $paged,
	'orderby' => 'menu_order title date',
	'order'   => 'ASC',
	//'post_parent' => 0,
	'tax_query' => array(array(
		'taxonomy' => 'photo_taxonomies',
		'field' => 'slug',
		'terms' => array('projects'),
	)),
));

$_posts = $posts;
//$_posts = array_slice($posts, ($paged * $range), $range, true);

/*
foreach($posts as $p) {
	echo "<a href=\"" . l($p->ID) . "\" >{$p->post_title}</a>";
}
*/
?>

<div class="content-block catalog-page" role="main">
	<div class="container content-container">
		<div class="breadcrumb-block _cp__breadcrumb-block">
			<ul class="breadcrumb__list">
				<li class="breadcrumb__list-item"><a href="/" class="breadcrumb__list-link">Главная</a></li>
				<li class="breadcrumb__list-item is--active">Реализованные проекты</li>
			</ul>
		</div>
		
		<div class="page-header-block">
			<h1 class="page-header__heading">Реализованные проекты</h1>		
		</div>
		<div class="row _cp__row">
			
			<?
			if(count($_posts)) {
				
				$i = 0;
				
				foreach($_posts as $p) {
					
					$i++;
					
					if($i == 3 || $i == 10) {
						$col_w = 6;
					} else {
						$col_w = 3;
					}
					
			?>
			
			<div class="cols _cp__cols cols-<?=$col_w;?> ">
				<div class="projects <?=$this->getMeta($p->ID, 'bg_color');?> catalog-preview">	
					<a href="<?=$this->Imgs->postImg($p->ID, 'full');?>" class="catalog-preview__img" data-fancybox="gallery-preview" style="background-image: url(<?=$this->Imgs->postImg($p->ID, '991x544');?>)">
						<span><svg class="icon-svg icon-zoom-in" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#zoom-in"></use>
						</svg></span>
					</a>
				</div>
			</div>
			
			<?
				
				}
			}
			?>
			
		</div>
		
		<?
		//pagination($posts);
		//__theme_pagination($posts, $paged, $range);
		?>
		
	</div>
</div> 
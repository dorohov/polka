<?

$range = 10;

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$paged = $paged - 1;

$posts = $this->getItems(array(
	'post_type' => 'product',
	'posts_per_page' => -1,
	'orderby' => 'menu_order title date',
	'order'   => 'ASC',
	//'post_parent' => 0,
	'tax_query' => array(array(
		'taxonomy' => 'product_taxonomies',
		'field' => 'slug',
		'terms' => array('solutions'),
	)),
));

$_posts = array_slice($posts, ($paged * $range), $range, true);

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
		<li class="breadcrumb__list-item"><a href="<?=l(1);?>" class="breadcrumb__list-link">Главная</a></li>
		<li class="breadcrumb__list-item is--active">Готовые решения</li>
	</ul>
</div>

		<div class="page-header-block">
			<div class="page-header__row row">
				<div class="cols page-header__cols">
					<h1 class="page-header__heading">Готовые решения</h1>
				</div>
				<div class="cols page-header__cols">
					<a href="<?=l(14);?>" class="btn-site btn-heading to--bg btn-arrow">
						Каталог элементов
						<span><svg class="icon-svg icon-arrow-next" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-next"></use>
						</svg></span>
					</a>
				</div>
			</div>
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
					
					$link = l($p->ID);
					$cost = $this->getMeta($p->ID, 'cost');
					
			?>
			
			<div class="cols _cp__cols cols-<?=$col_w;?> ">
				
				<div class="catalog-element  " data-cost="<?=$cost;?>" >	
					<a href="<?=$link;?>" class="catalog-element__preview" style="background-image: url(<?=$this->Imgs->postImg($p->ID, '991x544');?>);">
					</a>
					<div class="catalog-element__note">
						<h4 class="catalog-element__heading"><?=$p->post_title;?></h4>
						<?
						if($cost != '') {
						?>
						<div class="catalog-element__cost">
							<?=$cost;?>
							<span><svg class="icon-svg icon-ruble" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#ruble"></use>
							</svg></span>
						</div>
						<?
						}
						?>
						<a href="<?=$link;?>" class="catalog-element__link">
							<span><svg class="icon-svg icon-arrow-next-flat" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-next-flat"></use>
							</svg></span>
						</a>
					</div>	
				</div>
				
			</div>
			
			<?
				
				}
			}
			?>
			
		</div>
		
		<?
		//pagination($posts);
		__theme_pagination($posts, $paged, $range);
		?>
		
	</div>
</div>
<?

if(isset($param['other_products']) && $param['other_products'] != '' && is_array($param['other_products'])) {
	
	$posts = $this->getItems(array(
		'post_type' => 'product',
		'posts_per_page' => 5,
		'orderby' => 'menu_order title date',
		'order'   => 'ASC',
		'post__in' => implode(',', $param['other_products']),
	));
	
} else {
	
	$posts = $this->getItems(array(
		'post_type' => 'product',
		'posts_per_page' => 5,
		'orderby' => 'RAND()',
		//'order'   => 'ASC',
		//'post__in' => implode(',', $param['other_products']),
	));
	
}

if(count($posts)) {
?>

<div class="_cip__more-catalog">
	<h3 class="_cip__more-heading">С этим товаром также заказывают</h3>
		<div class="row _cip__row">
		
		<?
		foreach($posts as $p) {
			
			$link = l($p->ID);
			$cost = $this->getMeta($p->ID, 'cost');
			
		?>
		
		<div class="cols _cip__cols cols-2">
			<div class="catalog-element more">	
				<a href="<?=$link;?>" class="catalog-element__preview" style="background-image: url(<?=$this->Imgs->postImg($p->ID, '795x530');?>);">
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
		?>
		
		</div>
</div>

<?
}

<?


$materials = array(
	'wood' => 'Дерево',
	'metal' => 'Металл',
	'glass' => 'Стекло',
);
//var_dump($this->getMeta(14, 'colors'));

$colors = $this->getItems(array(
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'post_status' => 'inherit',
	'posts_per_page' => -1,
	'orderby' => 'menu_order title date',
	'order'   => 'ASC',
	'post__in' => $this->getMeta(14, 'colors'),
));

$cost = $this->getMeta($this->post['id'], 'cost');
$costs_str = $this->getMeta($this->post['id'], 'azbn_product_costs');

$costs = array();

if($costs_str != '') {
	
	$costs = json_decode($costs_str, true);
	
}


?>

<div class="content-block catalog-item-page" role="main">
	<div class="container content-container">
		<div class="breadcrumb-block _cp__breadcrumb-block">
			<ul class="breadcrumb__list">
				<li class="breadcrumb__list-item"><a href="<?=l(1);?>" class="breadcrumb__list-link">Главная</a></li>
				<li class="breadcrumb__list-item">
					<a href="/" class="breadcrumb__list-link">Каталог элементов</a>
				</li>
				<li class="breadcrumb__list-item is--active"><?=t($this->post['id']);?></li> 
			</ul>
		</div>
		<div class="row _cip__row">
			<div class="cols _cip__cols cols-7">
				<a href="<?=$this->Imgs->postImg($this->post['id'], 'full');?>" class="_cip__preview" data-fancybox="gallery-preview" style="background-image: url(<?=$this->Imgs->postImg($this->post['id'], '991x544');?>)">
				</a>
			</div>
			<div class="cols _cip__cols cols-5">				
				<div class="page-header-block catalog-item">
					<div class="page-header__code">Арт. <?=$this->getMeta($this->post['id'], 'art');?></div>
					<h1 class="page-header__heading">Полка прямая</h1>
				</div>
				<div class="text-block _cip__text">
					<?=c($this->post['id']);?>
				</div>
				<div class="row _cip__filter-row">
					
					<?
					if(count($costs)) {
					?>
					
					<div class="cols _cip__filter-cols cols-12">
						<div class="catalog-filter">
							<div class="row catalog-filter__row">
								<div class="cols catalog-filter__cols">
									<div class="catalog-filter__heading">Материал</div>
								</div>
								<div class="cols catalog-filter__cols">
									<div class="catalog-filter__radio-group">
										
										<?
										foreach($costs as $material => $items) {
											if(count($items)) {
											?>
										<!-- is--active -->
										<button type="button" class="btn-site catalog-filter__radio azbn-flt-btn " data-flt-key="material" data-flt-value="<?=$material;?>" ><?=$materials[$material];?></button>
										
											<?
											}
										}
										?>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?
					}
					?>
					
					
					<?
					if(count($colors)) {
					?>
					
					<div class="cols _cip__filter-cols">
						<div class="catalog-filter">
							<div class="row catalog-filter__row">
								<div class="cols catalog-filter__cols">
									<div class="catalog-filter__heading">Цвет</div>
								</div>
								<div class="cols catalog-filter__cols">
									<div class="dropdown catalog-filter__dropdown">
										<a data-toggle="dropdown" href="#">
											<span class="catalog-filter__dropdown-icon"><svg class="icon-svg icon-arrow-down" role="img">
												<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-down"></use>
											</svg></span>
											Орех
										</a>
										<div class="dropdown-menu catalog-filter__dropdown-menu  img">
											<div class="mCustomScrollbar scroller" data-mcs-theme="black-light">
												<div class="row catalog-filter__dropdown-row">
													
													<?
													foreach($colors as $p) {
													?>
													<div class="cols catalog-filter__dropdown-cols">
														<a href="#" class="catalog-filter__dropdown-color">
															<div class="catalog-filter__dropdown-color-preview"><img src="<?=$this->Imgs->rawImg($p->ID, '95x65');?>" alt=""></div>
															<div><?=$p->post_title;?></div>
														</a>
													</div>
													<?
													}
													?>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?
					}
					?>
					
					
					<?
					if(count($costs)) {
					?>
					
					<div class="cols _cip__filter-cols">
						<div class="catalog-filter">
							<div class="row catalog-filter__row">
								<div class="cols catalog-filter__cols">
									<div class="catalog-filter__heading">Длина <span>(L)</span></div>
								</div>
								<div class="cols catalog-filter__cols">
									<div class="dropdown catalog-filter__dropdown">
										<a data-toggle="dropdown" href="#">
											<span class="catalog-filter__dropdown-icon"><svg class="icon-svg icon-arrow-down" role="img">
												<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-down"></use>
											</svg></span>
											200 мм
										</a>
										<ul class="dropdown-menu catalog-filter__dropdown-menu   ">
											<div class="mCustomScrollbar scroller" data-mcs-theme="black-light">
												<ul>
													<?
													foreach($costs as $material => $items) {
														if(count($items)) {
															foreach($items as $item) {
													?>
													<li data-size-filter="<?=$item['y'];?>" ><a href="#"><?=$item['x'];?> мм</a></li>
													<?
															}
														}
													}
													?>
												</ul>
											</div>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cols _cip__filter-cols">
						<div class="catalog-filter">
							<div class="row catalog-filter__row">
								<div class="cols catalog-filter__cols">
									<div class="catalog-filter__heading">Глубина <span>(d)</span></div>
								</div>
								<div class="cols catalog-filter__cols">
									<div class="dropdown catalog-filter__dropdown">
										<a data-toggle="dropdown" href="#">
											<span class="catalog-filter__dropdown-icon"><svg class="icon-svg icon-arrow-down" role="img">
												<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-down"></use>
											</svg></span>
											200 мм
										</a>
										<ul class="dropdown-menu catalog-filter__dropdown-menu   ">
											<div class="mCustomScrollbar scroller" data-mcs-theme="black-light">
												<ul>
													<?
													foreach($costs as $material => $items) {
														if(count($items)) {
															foreach($items as $item) {
													?>
													<li data-size-filter="<?=$item['x'];?>" ><a href="#"><?=$item['y'];?> мм</a></li>
													<?
															}
														}
													}
													?>
												</ul>
											</div>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<?
					}
					?>
					
					<div class="cols _cip__filter-cols cols-12">
						<div class="catalog-filter qty">
							<div class="catalog-filter__qty">
								<button type="button" class="btn-site catalog-filter__qty-btn minus">
									<span><svg class="icon-svg icon-minus" role="img">
										<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#minus"></use>
									</svg></span>
								</button>
								<input type="number" min="0" step="1" value="0" class="catalog-filter__qty-input">
								<button type="button" class="btn-site catalog-filter__qty-btn plus">
									<span><svg class="icon-svg icon-plus" role="img">
										<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#plus"></use>
									</svg></span>
								</button>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row _cip__cost-row">
					<div class="cols _cip__cost-cols">
						<div class="_cip__cost-status">В наличии</div>
						
						<?
						if($cost != '') {
						?>
						<div class="_cip__cost-price">
							<?=number_format($cost, 0, ',', ' ');?>
							<span><svg class="icon-svg icon-ruble" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#ruble"></use>
							</svg></span>
						</div>
						<?
						}
						?>
						
					</div>
					<div class="cols _cip__cost-cols">
						<button type="button" class="btn-site btn-basket btn-arrow to--nobg">
							В корзину
							<span><svg class="icon-svg icon-arrow-next" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-next"></use>
							</svg></span>
						</button>
					</div>
				</div>
				
			</div>
		</div>
		
		<?
		$this->tpl('product/more', array());
		?>
		
	</div>
</div>
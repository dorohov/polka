<?

$posts = $this->getItems(array(
	'post_type' => 'product',
	'posts_per_page' => -1,
	'orderby' => 'menu_order title date',
	'order'   => 'ASC',
));

?>
<script>
var CatalogMaterials = <?=$this->Ajax->as_json(__theme_get_materials());?>;
var CatalogData = {
	<?
	if(count($posts)) {
		foreach($posts as $p) {
	?>
	
	<?=$p->ID;?> : {
		id : <?=$p->ID;?>,
		art : '<?=$this->getMeta($p->ID, 'art');?>',
		title : '<?=$p->post_title;?>',
		link : '<?=l($p->ID);?>',
		img : {
			sm : '<?=$this->Imgs->postImg($p->ID, '95x65');?>',
			full : '',
		},
	},
	
	<?
		}
	}
	?>
}
</script>
<?

?>
<div class="content-block basket-page" role="main">
	<div class="container content-container">
		<div class="breadcrumb-block _bp__breadcrumb-block">
	<ul class="breadcrumb__list">
		<li class="breadcrumb__list-item"><a href="/" class="breadcrumb__list-link">Главная</a></li>
		<li class="breadcrumb__list-item is--active">Корзина</li>
	</ul>
</div>
		<div class="page-header-block">
	<h1 class="page-header__heading azbn-cart-title">Корзина</h1>		
</div>
		<div class="basket-list">
			
			
			
			<div class="basket-item azbn-cart-item" data-product-id="0" data-product-material="default" data-product-size="default" data-product-color="default" data-product-cost="0" >
				<div class="row basket-item__row">
					<div class="cols basket-item__cols cols-2 preview">
						<a href="" class="basket-item__preview azbn-cart-item__link">
							<img class="azbn-cart-item__img" src="<?=$this->path('img');?>/temp/catalog-preview-item1-sm.jpg" alt="">
						</a>
					</div>
					<div class="cols basket-item__cols cols-5 note">
						<h4 class="basket-item__heading azbn-cart-item__title"></h4>
						<div class="row basket-item__options-row">
							<div class="cols cols-6 ">
								<div class="basket-item__options-item">
									<div class="row"><span>Артикул</span> <div class="azbn-cart-item__art" ></div></div>
								</div>
							</div>
							<div class="cols cols-6 azbn-cart-item__to-delete">
								<div class="basket-item__options-item">
									<div class="row"><span>Материал</span> <div class="azbn-cart-item__material" ></div></div>
								</div>
							</div>
							<div class="cols cols-6 azbn-cart-item__to-delete">
								<div class="basket-item__options-item">
									<div class="row"><span>Длина</span> <div ><span class="azbn-cart-item__x" ></span> мм</div></div>
								</div>
							</div>
							<div class="cols cols-6 azbn-cart-item__to-delete">
								<div class="basket-item__options-item">
									<div class="row"><span>Цвет</span> <div class="azbn-cart-item__color" ></div></div>
								</div>
							</div>
							<div class="cols cols-6 azbn-cart-item__to-delete">
								<div class="basket-item__options-item">
									<div class="row"><span>Глубина</span> <div ><span class="azbn-cart-item__y" ></span> мм</div></div>
								</div>
							</div>
						</div>
					</div> 	
					<div class="cols basket-item__cols cols-2 qty">		
						<div class="catalog-filter qty">
							<div class="catalog-filter__qty">
								
								<button type="button" class="btn-site catalog-filter__qty-btn minus azbn-cart-qty-btn" data-qty-value="-1" >
									<span><svg class="icon-svg icon-minus" role="img">
										<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#minus"></use>
									</svg></span>
								</button>
								
								<input type="number" min="0" step="1" value="0" class="catalog-filter__qty-input azbn-cart-item__qty azbn-cart-qty-input">
								
								<button type="button" class="btn-site catalog-filter__qty-btn plus azbn-cart-qty-btn " data-qty-value="1" >
									<span><svg class="icon-svg icon-plus" role="img">
										<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#plus"></use>
									</svg></span>
								</button>
								
							</div>
						</div>
					</div>
					<div class="cols basket-item__cols cols-2 cost">			
						<div class="basket-item__cost">
							<div class="azbn-cart-item__cost" ></div>
							<span><svg class="icon-svg icon-ruble" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#ruble"></use>
							</svg></span>
						</div>
					</div>
					<div class="cols basket-item__cols cols-1 delete">
						<button class="btn-site btn-delete azbn-cart-del-btn">
							<svg class="icon-svg icon-delete" role="img">
								<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#delete"></use>
							</svg>
						</button>
					</div>
				</div>
			</div>
			
			
			
		</div>
		<div class="row _bp__deliver-row azbn-cart-deliver-row ">
			<div class="cols">
				<div class="_bp__cost-block">Общая стоимость: 
					<div class="_bp__finish-cost">
						<div class="azbn-cart-sum" ></div>
						<span><svg class="icon-svg icon-ruble" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#ruble"></use>
						</svg></span>
					</div>					
				</div>
				<div class="_bp__deliver-btn">
					<button type="button" class="btn-site btn-deliver btn-arrow to--nobg" data-toggle="collapse" data-target="#deliver-form">
						Оформить заказ
						<span><svg class="icon-svg icon-arrow-next" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-next"></use>
						</svg></span>
					</button>
				</div>
			</div>
		</div>
		<div id="deliver-form" class="collapse">
			<form action="#" class="form-site inline deliver azbn-formsave-order"  >
				<h4 class="form__heading">Оформить заявку</h4>	
				<div class="form__note">Вы можете оставить свою заявку<br> и мы обязательно свяжемся с Вами в ближайшее время.</div>	
				<div class="row form__row">
					<div class="cols form__cols full material-cols">
						<div class="material-switch form__item">
							<input class="material-switch__input validate[required]" id="f[processing]" name="f[processing]" type="checkbox" checked />
							<label for="f[processing]" class="material-switch__label"></label>
							<label for="f[processing]" class="material-switch__text"> 
								Я согласен на обработку <a href="<?=l(20);?>">персональных данных</a>
							</label>
						</div>	
					</div>
					<div class="cols form__cols">
						<div class="form__item">
							<input type="text" class="form__control form-control validate[required, custom[onlyLetterSp]]" id="f[name]" name="f[Имя]" placeholder="Укажите Ваше имя">
						</div>	
					</div>
					<div class="cols form__cols">
						<div class="form__item">
							<input type="tel" class="form__control form-control validate[required,custom[phone]]" id="f[tel]" name="f[Телефон]" placeholder="Укажите Ваш телефон"> 
						</div>	
					</div>
					<div class="cols form__cols">
						<div class="form__item">
							<input type="email" class="form__control form-control validate[required,custom[email]]" id="f[email]" name="f[email]" placeholder="Укажите Ваш email"> 
						</div>	
					</div>
					
					<input type="hidden" name="o[order]" value="{}" />
					
					<div class="cols form__cols">
						<div class="form__btn-block">
							<button type="submit" class="btn-site btn-submit green to--nobg form__btn">					
								Отправить заявку!
							</button>
						</div>	 
					</div>
					
				</div>
			</form> 
		</div>
		
	</div>
</div>
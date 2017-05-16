<?

$images = $this->getMeta(1, 'images');/*$this->getItems(array(
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'post_status' => 'inherit',
	'posts_per_page' => -1,
	'orderby' => 'menu_order title date',
	'order'   => 'ASC',
	'post__in' => $this->getMeta(1, 'images'),
));
*/

?>

<div class="index-block-header">
	<div class="container _ibh__container">
		<div class="_ibh__note">
			<h1 class="_ibh__heading">
				Модульные
			</h1>
			<div class="row _ibh__heading-row">
				<div class="cols _ibh__heading-cols">				
					<h1 class="_ibh__heading">
						полки
					</h1>
				</div>
				<div class="cols _ibh__heading-cols">			
					<h2 class="_ibh__heading-small">
						по доступным <br>ценам
					</h2>
				</div>
			</div>
		</div>
		<div class="_ibh__img"></div> 
	</div>
</div>
		<div class="container">
			<div class="index-block-content" role="main">
				<div class="_icb__inner">
					<div class="catalog-block-header">
						<div class="row _cbh__row">
							<div class="cols _cbh__cols cols-6">
								<div class="catalog-card green" style="background-image: url(<?=$this->Imgs->postImg(14);?>)">
									<div class="catalog-card__inner">
										<h3 class="catalog-card__heading">
											<a href="<?=l(14);?>">
												<span>Каталог</span> <span>элементов</span>
											</a>
										</h3>
										<div>
											<a href="<?=l(14);?>" class="btn-site btn-catalog-card btn-arrow to--bg">
												Смотреть каталог
												<span><svg class="icon-svg icon-arrow-next" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-next"></use>
												</svg></span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cols _cbh__cols cols-6">
								<div class="catalog-card yellow" style="background-image: url(<?=$this->Imgs->postImg(18);?>)">
									<div class="catalog-card__inner">
										<h3 class="catalog-card__heading">
											<a href="<?=l(18);?>">
												<span>Готовые</span> <span>решения</span>
											</a>
										</h3>
										<div>
											<a href="<?=l(18);?>" class="btn-site btn-catalog-card btn-arrow to--bg">
												Смотреть каталог
												<span><svg class="icon-svg icon-arrow-next" role="img">
									<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-next"></use>
								</svg></span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cols _cbh__cols cols-5">
								<div class="catalog-card pink" style="background-image: url(<?=$this->Imgs->postImg(6);?>)">
									<div class="catalog-card__inner">
										<h3 class="catalog-card__heading">
											<a href="<?=l(6);?>">
												<span>Реализованные</span> <span>проекты</span>
											</a>
										</h3>
										<div>
											<a href="<?=l(6);?>" class="btn-site btn-catalog-card btn-arrow to--bg">
												Смотреть каталог
												<span><svg class="icon-svg icon-arrow-next" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#arrow-next"></use>
												</svg></span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cols _cbh__cols cols-3">
								<div class="row _cbh__row-preview">
									<div class="cols _cbh__cols-preview">	
										<div class="  catalog-preview">	
											<a href="<?=$this->Imgs->rawImg($images[0], 'full');?>" class="catalog-preview__img" data-fancybox="catalog-preview" style="background-image: url(<?=$this->Imgs->rawImg($images[0], 'large');?>)">
												<span><svg class="icon-svg icon-zoom-in" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#zoom-in"></use>
												</svg></span>
											</a>
										</div>	
									</div>
									<div class="cols _cbh__cols-preview">
										<div class="  catalog-preview">	
											<a href="<?=$this->Imgs->rawImg($images[1], 'full');?>" class="catalog-preview__img" data-fancybox="catalog-preview" style="background-image: url(<?=$this->Imgs->rawImg($images[1], 'large');?>)">
												<span><svg class="icon-svg icon-zoom-in" role="img">
													<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#zoom-in"></use>
												</svg></span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="cols _cbh__cols cols-4">						
								<div class="full catalog-preview">	
									<a href="<?=$this->Imgs->rawImg($images[2], 'full');?>" class="catalog-preview__img" data-fancybox="catalog-preview" style="background-image: url(<?=$this->Imgs->rawImg($images[2], 'large');?>)">
										<span><svg class="icon-svg icon-zoom-in" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#zoom-in"></use>
										</svg></span>
									</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="advantages-block-header">
						<div class="row _abh__row">
							<div class="cols _abh__cols">
								<div class="_abh__num">3</div>
								<h3 class="_abh__heading"><span>Причины</span> выбрать нас</h3>
							</div>
							<div class="cols _abh__cols"> 
								<div class="_abh__item">
									<div class="_abh__icon">
										<span class="_abh__icon-bg"><svg class="icon-svg icon-adv-bg" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#adv-bg"></use>
										</svg></span>
										<span class="_abh__icon-pic icon-new"><svg class="icon-svg icon-new" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#new"></use>
										</svg></span>
									</div>
									<h3 class="_abh__item-heading"><?=$this->getMeta($this->post['id'], 'adv-1-title');?></h3>
									<div class="_abh__item-note"><?=$this->getMeta($this->post['id'], 'adv-1-desc');?></div>
								</div>
								<div class="_abh__item">
									<div class="_abh__icon">
										<span class="_abh__icon-bg"><svg class="icon-svg icon-adv-bg" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#adv-bg"></use>
										</svg></span>
										<span class="_abh__icon-pic icon-config"><svg class="icon-svg icon-config" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#config"></use>
										</svg></span>
									</div>
									<h3 class="_abh__item-heading"><?=$this->getMeta($this->post['id'], 'adv-2-title');?></h3>
									<div class="_abh__item-note"><?=$this->getMeta($this->post['id'], 'adv-2-desc');?></div>
								</div>


								<div class="_abh__item">
									<div class="_abh__icon">
										<span class="_abh__icon-bg"><svg class="icon-svg icon-adv-bg" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#adv-bg"></use>
										</svg></span>
										<span class="_abh__icon-pic icon-safety"><svg class="icon-svg icon-safety" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#safety"></use>
										</svg></span>
									</div>
									<h3 class="_abh__item-heading"><?=$this->getMeta($this->post['id'], 'adv-3-title');?></h3>
									<div class="_abh__item-note"><?=$this->getMeta($this->post['id'], 'adv-3-desc');?></div>
								</div>
							</div>
						</div>	
					</div>
									</div>
									<form action="#" class="form-site inline form-panel azbn-formsave-ask"  >
										<h4 class="form__heading">У Вас есть вопросы?</h4>	
										<div class="form__note">Оставьте свою заявку<br> и мы обязательно свяжемся с Вами в ближайшее время.</div>	
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
												<div class="form__btn-block">
													<button type="submit" class="btn-site btn-submit white to--nobg form__btn">					
														Отправить заявку!
													</button>
												</div>	 
											</div>
											
										</div>
									</form> 
								</div>
		</div>
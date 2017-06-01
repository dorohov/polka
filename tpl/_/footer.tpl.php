		<?
			$class = 'footer-site';
			$prefix_block = 'footer__';
		?>
		<footer class="<?=$class;?>">	
			<div class="container <?=$prefix_block;?>container">
				<div class="row <?=$prefix_block;?>row">			
					<div class="cols <?=$prefix_block;?>contacts-cols">
						<?if (getContact('phone1')) {?>
						<div class="<?=$prefix_block;?>contacts-item">
							<a href="tel:<?=phone(getContact('phone1'));?>" class="<?=$prefix_block;?>phone"><?=getContact('phone1');?></a>
						</div>
						<?}?>
						<?if (getContact('phone2')) {?>
						<div class="<?=$prefix_block;?>contacts-item">
							<a href="tel:<?=phone(getContact('phone2'));?>" class="<?=$prefix_block;?>phone"><?=getContact('phone2');?></a>
						</div>
						<?}?>
					</div>
					<div class="cols <?=$prefix_block;?>soc-cols">
						<?	
							$this->tpl(
								'_/social', 
								array(
									"class"=>"social-block",
									"prefix_block" => "footer__social-",
									"prefix_social" => "social__",
								)
							);
						?>
					</div>
					<div class="cols <?=$prefix_block;?>dorohovdesign-cols">
						<div class="row <?=$prefix_block;?>dorohovdesign__row">
							<div class="cols">
								<div>Создание сайта</div>
							</div>
							<div class="cols">
								<div class="<?=$prefix_block;?>dorohovdesign__logo">
									<a href="http://www.dorohovdesign.ru/" target="_blank">
										
										<svg class="icon-svg icon-dorohovdesign" role="img">
											<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#dorohovdesign"></use>
										</svg>
									</a>
								</div>	
							</div>
						</div>				 
					</div>		
				</div>
			</div>
		</footer>

<div class="modal fade modal-base" id="modal-message-ask" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-base__dialog">
		<div class="modal-body modal-base__body" >
			<button type="button" class="btn-site btn-close modal-close" data-dismiss="modal" aria-hidden="true">
				<svg class="icon-svg icon-cancel" role="img">
					<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#cancel"></use>
				</svg>
			</button>
			<div class="modal-content modal-base__content">
				<h3 class="modal-title modal-base__title">Ваша заявка успешно отправлена!</h3>
				<div class="modal-note modal-base__note">		
					Наши специалисты свяжутся с Вами в ближайшее время.
				</div>
			</div> 
		</div>
	</div>
</div>

<div class="modal fade modal-base" id="modal-message-order" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-base__dialog">
		<div class="modal-body modal-base__body" >
			<button type="button" class="btn-site btn-close modal-close" data-dismiss="modal" aria-hidden="true">
				<svg class="icon-svg icon-cancel" role="img">
					<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#cancel"></use>
				</svg>
			</button>
			<div class="modal-content modal-base__content">
				<h3 class="modal-title modal-base__title">Ваша заказ успешно отправлен!</h3>
				<div class="modal-note modal-base__note">		
					Наши специалисты свяжутся с Вами в ближайшее время.
				</div>
			</div> 
		</div>
	</div>
</div>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- <script src="<?=$this->path('js');?>/jquery.min.js" ></script> -->
		<script src="<?=$this->path('js');?>/jquery-3.2.1.min.js" ></script>
		<script src="<?=$this->path('js');?>/document-ready.js" ></script>
		<script src="<?=$this->path('js');?>/document-ready-azbn.js" ></script>

		<script src="<?=$this->path('js');?>/bootstrap.min.js" ></script>
		<script src="<?=$this->path('js');?>/device.min.js" ></script>

		<script src="<?=$this->path('js');?>/svg4everybody.min.js" ></script>
		<script>svg4everybody();</script>

		<?
			//Для главной страницы 
			if($this->post['id'] == 1 ) {
				$this->tpl('_/script/validationEngine', array());
				$this->tpl('_/script/fancybox3', array());
			}
			//Для страницы о компании
			if($this->post['id'] == 2 ) {
				$this->tpl('_/script/fancybox3', array());
			}
			//Для страниц карточки товара
			if( is_singular('product') ) {
				$this->tpl('_/script/scrollbar', array());
				$this->tpl('_/script/fancybox3', array());
			}
			//Для страницы реализованные проекты
			if($this->post['id'] == 6) {
				$this->tpl('_/script/fancybox3', array());
			}
			//Для страницы контакты
			if($this->post['id'] == 4) {
				$this->tpl('_/script/googleMap', array());
			}

			//$this->tpl('_/script/metrics', array()); 
		?>
		
		<?
		wp_footer();
		$this->tpl('_/metrics', array());
		?>
		
		<script>
		(function(){
			
			var l = window.location;
			var t = new Date().getTime();
			
			var i = document.createElement('img');
			i.width = 0; i.height = 0;
			i.onload = function(){document.body.appendChild(i);};
			i.setAttribute('src', 'http://app.azbn.ru/counter/common/?h=' + l.hostname + '&p=' + l.port + '&lt=' + t);
			
		})();
		</script>
	
	</body>
</html>
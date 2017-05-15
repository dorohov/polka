<div class="content-block contacts-page" role="main">
	<div class="container">
		<div class="_cnp__panel">
			<div class="page-header-block">
				<h1 class="page-header__heading"><?=t($this->post['id']);?></h1>		
			</div>
			<div class="row _cnp__row">
				<div class="cols _cnp__cols">
					<div class="_cnp__item">
						<div class="_cnp__item-icon tel"><svg class="icon-svg icon-tel" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#tel"></use>
						</svg></div>
						<div><a href="tel:+<?=phone(getContact('phone1'));?>" class="_cnp__phone"><?=getContact('phone1');?></a></div>
						<div><a href="tel:+<?=phone(getContact('phone2'));?>" class="_cnp__phone"><?=getContact('phone2');?></a></div>
					</div>
				</div>
				<div class="cols _cnp__cols">
					<div class="_cnp__item">
						<div class="_cnp__item-icon"><svg class="icon-svg icon-mailto" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#mailto"></use>
						</svg></div>
						<a href="mailto:<?=getContact('email');?>" class="_cnp__mailto"><?=getContact('email');?></a>
					</div>
				</div>
				<div class="cols _cnp__cols">
					<div class="_cnp__item ">
						<div class="_cnp__item-icon address"><svg class="icon-svg icon-address" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#address"></use>
						</svg></div>
						<?=getContact('adr');?>
					</div>
				</div>
				<div class="cols _cnp__cols">
					<div class="_cnp__item">
						<div class="_cnp__item-icon"><svg class="icon-svg icon-clock" role="img">
							<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#clock"></use>
						</svg></div>
						<?=getContact('worktime');?>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<div id="map-google-office" class="_cnp__map"></div>
</div>
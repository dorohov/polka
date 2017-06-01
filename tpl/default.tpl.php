<div class="content-block text-page" role="main">
	<div class="container content-container">
		<div class="breadcrumb-block _еp__breadcrumb-block">
			<ul class="breadcrumb__list">
				<li class="breadcrumb__list-item"><a href="<?=l(1);?>" class="breadcrumb__list-link">Главная</a></li>
				<li class="breadcrumb__list-item is--active"><?=t($this->post['id']);?></li>
			</ul>
		</div>
		<div class="_tp__panel">
			<div class="page-header-block">
				<h1 class="page-header__heading"><?=t($this->post['id']);?></h1>
			</div>
			<div class="text-block">
				<?=c($this->post['id']);?>
			</div>
		</div>
	</div>
</div>
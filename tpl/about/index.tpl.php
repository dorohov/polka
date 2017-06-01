<?

$images = get_field('images', $this->post['id']);

$img_arr = array();

if($images != '' && is_array($images)) {
	if(count($images)) {
		foreach($images as $img_id) {
			$img_arr[] = array(
				'id' => $img_id,
				'sm' => $this->Imgs->rawImg($img_id, '795x530'),
				'full' => $this->Imgs->rawImg($img_id, 'full'),
			);
		}
	}
}

//var_dump($img_arr);

?>
<div class="content-block about-page" role="main">
	<div class="container content-container">
		<div class="breadcrumb-block _ap__breadcrumb-block">
	<ul class="breadcrumb__list">
		<li class="breadcrumb__list-item"><a href="<?=l(1);?>" class="breadcrumb__list-link">Главная</a></li>
		<li class="breadcrumb__list-item is--active"><?=t(2);?></li>
	</ul>
</div>
		<div class="page-header-block">
	<h1 class="page-header__heading"><?=t($this->post['id']);?></h1>		
</div>
		<div class="row _ap__row line1">
			<div class="cols _ap__cols cols-6">
				<div class="text-block">
					<?=get_field('text_main', $this->post['id']);?>
				</div>
			</div>
			<div class="cols _ap__cols cols-6">
				<a class="fancybox-preview _ap__preview-big backgound" 
					href="<?=$img_arr[0]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[0]['sm'];?>);" 
				></a>
			</div>
		</div>
		<div class="row _ap__row line2">
			<div class="cols _ap__cols cols-12">
				<h2>Фото производителя</h2>
			</div>
			<div class="cols _ap__cols cols-3">
				<a class="fancybox-preview _ap__preview-all backgound" 
					href="<?=$img_arr[1]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[1]['sm'];?>);" 
				></a>
			</div>
			<div class="cols _ap__cols cols-3">
				<a class="fancybox-preview _ap__preview-all backgound" 
					href="<?=$img_arr[2]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[2]['sm'];?>);" 
				></a>
			</div>
			<div class="cols _ap__cols cols-6 text1">				
				<div class="text-block _ap__note-cols-6">
					<?=get_field('text_materials', $this->post['id']);?>
				</div>
			</div>
			<div class="cols _ap__cols cols-3">
				<a class="fancybox-preview _ap__preview-all backgound" 
					href="<?=$img_arr[3]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[3]['sm'];?>);" 
				></a>
			</div>
			<div class="cols _ap__cols cols-6">
				<a class="fancybox-preview _ap__preview-all backgound" 
					href="<?=$img_arr[4]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[4]['sm'];?>);" 
				></a>
			</div>
			<div class="cols _ap__cols cols-3">
				<a class="fancybox-preview _ap__preview-all backgound" 
					href="<?=$img_arr[5]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[5]['sm'];?>);" 
				></a>
			</div>
			<div class="cols _ap__cols cols-6 text2">
				<div class="text-block _ap__note-green">
					<?=get_field('text_adr', $this->post['id']);?>
				</div>
			</div>
			<div class="cols _ap__cols cols-3">
				<a class="fancybox-preview _ap__preview-all backgound" 
					href="<?=$img_arr[6]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[6]['sm'];?>);" 
				></a>
			</div>
			<div class="cols _ap__cols cols-3">
				<a class="fancybox-preview _ap__preview-all backgound" 
					href="<?=$img_arr[7]['full'];?>" 
					data-fancybox="gallery-about"
					style="background-image: url(<?=$img_arr[7]['sm'];?>);" 
				></a>
			</div>
		</div>
		
	</div>
</div>
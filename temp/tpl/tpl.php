<?	
	$this->tpl(
		'_/form', 
		array(
			"class"=>"inline",
			"prefix_block" => "_bucb__",
			"prefix_form" => "form__",
			"heading_form" => "Поможем определиться с выбором",
			"note_form" => "Наши менеджеры подберут для Вас оптимальный вариант идеального жилья.",
			"btn_name" => "Отправить заявку",
			"wow_class"=>" wow draw-btn-rect",
			"wow_duration"=>"1.7s",
			"wow_delay"=>"1s"
		)
	);
?>
<?	
	$this->tpl(
		'_/form', 
		array(
			"class"=>"inline",
			"prefix_block" => "_bucb__",
			"prefix_form" => "form__",
			"heading_form" => "Мы готовы ответить на все ваши вопросы",
			"btn_name" => "Отправить заявку",
			"wow_class"=>" wow draw-btn-rect",
			"wow_duration"=>"1.7s",
			"wow_delay"=>"1s"
		)
	);
?>
<?	
	$this->tpl(
		'_/social_', 
		array(
			"class"=>"social-block",
			"prefix_block" => "navbar__",
			"prefix_social" => "social__"
		)
	);
?>
<?the_content();?>
<?=get_field('id_tab', $id);?>

<?if (get_field('about_heading_small', $id) ){?>
<h4 class="_acb__heading-small heading-small-index-block">
	<?=get_field('about_heading_small', $id);?>
</h4>
<?}?>

<h2 class="_omcb__heading heading-index-block">
	<?=get_field('map_heading', $id);?>		
</h2>
<?if (get_field('map_heading_small', $id) ){?>
<h4 class="_omcb__heading-small heading-small-index-block">
	<?=get_field('map_heading_small', $id);?>
</h4>
<?}?>
<?if (get_field('map_note', $id) ){?>
<section class="_omcb__text">
	<?=get_field('map_note', $id);?>
</section>
<?}?>
<?
	if($this->post['id'] == 6) {		
		$this->tpl('_/modals/building', array());
	}
?>

<?$this->tpl('_/social', array());?>
<?=$param["prefix_form"];?>
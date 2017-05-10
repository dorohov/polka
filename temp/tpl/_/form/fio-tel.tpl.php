<?	
	/*$this->tpl(
		'_/form/fio-tel', 
		array(
			"class_form"=>"inline form-panel",
			"prefix_form" => "form__",
			"heading_form" => "У Вас есть вопросы?",
			"note_form" => "Оставьте свою заявку<br> и мы обязательно свяжемся с Вами в ближайшее время.",
			"btn_name_form" => "Отправить заявку!",
			"btn_class_form" => "white"
		)
	);
	*/
?>
<form action="#" class="form-site <?=$param["class_form"];?>"  >
	<? if ($param["heading_form"]){?>
	<h4 class="<?=$param["prefix_form"];?>heading"><?=$param["heading_form"];?></h4>	
	<? if ($param["note_form"]){?>
	<div class="<?=$param["prefix_form"];?>note"><?=$param["note_form"];?></div>
	<?}?>	
	<?}?>	
	<div class="row <?=$param["prefix_form"];?>row">
		<div class="cols <?=$param["prefix_form"];?>cols full material-cols">
			<div class="material-switch <?=$param["prefix_form"];?>item">
                <input class="material-switch__input validate[required]" id="f[Согласие на обработку данных]" name="f[Согласие на обработку данных]" type="checkbox" checked />
                <label for="f[Согласие на обработку данных]" class="material-switch__label"></label>
				<label for="f[Согласие на обработку данных]" class="material-switch__text"> 
					Я согласен на обработку <a href="<?=l(17);?>">персональных данных</a>
				</label>
            </div>	
		</div>
		<div class="cols <?=$param["prefix_form"];?>cols">
			<div class="<?=$param["prefix_form"];?>item">
				<input type="text" class="<?=$param["prefix_form"];?>control form-control validate[required, custom[onlyLetterSp]]" id="f[name]" name="f[Имя]" placeholder="Укажите Ваше имя">
			</div>	
		</div>
		<div class="cols <?=$param["prefix_form"];?>cols">
			<div class="<?=$param["prefix_form"];?>item">
				<input type="tel" class="<?=$param["prefix_form"];?>control form-control validate[required,custom[phone]]" id="f[tel]" name="f[Телефон]" placeholder="Укажите Ваш телефон"> 
			</div>	
		</div>
		<div class="cols <?=$param["prefix_form"];?>cols">
			<div class="<?=$param["prefix_form"];?>btn-block">
				<button type="submit" class="btn-site btn-submit <?=$param["btn_class_form"];?> to--nobg <?=$param["prefix_form"];?>btn">	
					<?=$param["btn_name_form"];?>
				</button>
			</div>	 
		</div>
	</div>
</form>
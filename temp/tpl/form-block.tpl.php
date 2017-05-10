<form action="" class="form-site <?=$param["class"];?>"  >
	<? if ($param["heading_form"]){?>
	<div class="<?=$param["prefix_form"];?>heading-block">
		<h4 class="<?=$param["prefix_form"];?>heading"><?=$param["heading_form"];?></h4>
		<? if ($param["note_form"]){?>
			<div><?=$param["note_form"];?></div>	
		<?}?>
	</div>
	<?}?>
	<div class="row <?=$param["prefix_form"];?>row">
		<div class="cols <?=$param["prefix_form"];?>cols">
			<div class="<?=$param["prefix_form"];?>item">
				<input type="text" class="<?=$param["prefix_form"];?>control form-control validate[required, custom[onlyLetterSp]]" id="f[name]" name="f[Имя]" placeholder="Имя">
			</div>	
		</div>
		<div class="cols <?=$param["prefix_form"];?>cols">
			<div class="<?=$param["prefix_form"];?>item">
				<input type="tel" class="<?=$param["prefix_form"];?>control form-control validate[required,custom[phone]]" id="f[tel]" name="f[Телефон]" placeholder="Телефон"> 
			</div>	
		</div>
		<div class="cols <?=$param["prefix_form"];?>cols">
			<div class="<?=$param["prefix_form"];?>item">
				<input type="email" class="<?=$param["prefix_form"];?>control form-control validate[required,custom[email]]" id="f[email]" name="f[Email]" placeholder="E-mail"> 
			</div>	
		</div>
		<div class="cols <?=$param["prefix_form"];?>cols btn">
			<div class="<?=$param["prefix_form"];?>btn-block">
				<button type="submit" class="btn-site btn-blue btn-submit <?=$param["prefix_form"];?>btn">					
					<svg class="rect-block">
						<rect class="rect wow draw-btn-rect"
							data-wow-duration="1.7s" 
							data-wow-delay="1s"
							x="0" 
							y="0"/>
					</svg>	
					<span class="name"><?=$param["btn_name"];?></span>
					<span class="bg"></span>
				</button>
			</div>	 
		</div>		
		<div class="cols <?=$param["prefix_form"];?>cols full">
			<div class="material-switch <?=$param["prefix_form"];?>item">
                <input class="material-switch__input validate[required]" id="f[Согласие на обработку данных]" name="f[Согласие на обработку данных]" type="checkbox" checked />
                <label for="f[Согласие на обработку данных]" class="material-switch__label"></label>
				<label for="f[Согласие на обработку данных]" class="material-switch__text"> 
					Я согласен на обработку <a href="<?=l(17);?>">персональных данных</a>
				</label>
            </div>	
		</div>
	</div>
</form> 
<?	
	/*$this->tpl(
		'_/modal/message', 
		array(
			"class_modals"=>"modal-base",
			"prefix_modals" => "modal-base__",
			"heading_modals" => "Ваша заявка успешно отправлена!",
			"note_modals" => "Наши специалисты свяжутся с Вами в ближайшее время.",
		)
	);*/
?>
<div class="modal fade <?=$param["class_modals"];?>" id="modal-message" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog <?=$param["prefix_modals"];?>dialog">
		<div class="modal-body <?=$param["prefix_modals"];?>body" >
			<button type="button" class="btn-site btn-close modal-close" data-dismiss="modal" aria-hidden="true">				
				<svg class="icon-svg icon-cancel" role="img">
					<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#cancel"></use>
				</svg>
			</button>
			<div class="modal-content <?=$param["prefix_modals"];?>content">
				<h3 class="modal-title <?=$param["prefix_modals"];?>title"><?=$param["heading_modals"];?></h3>
				<div class="modal-note <?=$param["prefix_modals"];?>note">	
					<?=$param["note_modals"];?>
				</div>
			</div> 
		</div>
	</div>
</div>
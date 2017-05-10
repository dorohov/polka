<div class="modal fade modal-banks" id="modal-review" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-banks__dialog">
		<div class="modal-body modal-banks__body" >
			<div class="modal-banks__line left-vert line-anim vert"></div>
			<div class="modal-banks__line left-horiz line-anim horiz "></div>
			<div class="modal-banks__line right-vert line-anim vert"></div>
			<div class="modal-banks__line right-horiz line-anim horiz "></div>			
			<button type="button" class="btn-site btn-close modal-banks__close modal-close" data-dismiss="modal" aria-hidden="true">
				<svg class="modal-banks__close-rect-block modal-close__rect-block">
					<rect class="modal-banks__close-rect modal-close__rect" x="0" y="0"></rect>
				</svg>
				<svg class="icon-svg icon-cancel" role="img">
					<use xlink:href="<?=$this->path('img');?>/svg/sprite.svg#cancel"></use>
				</svg>
			</button>
			<div class="modal-content modal-banks__content">				
				<?	
					$this->tpl(
						'_/form', 
						array(
							"class"=>"block",
							"prefix_block" => "modal-banks__",
							"prefix_form" => "form__",
							"heading_form" => "Отправьте заявку<br> на рассчет процентной ставки!",
							"note_form" => "Специалист банка свяжется с вами в ближайшее время и ответит на все интересующие Вас вопросы",
							"btn_name" => "Отправить заявку",
							"btn_class" => "modal-banks__btn"
						)
					);
				?>
			</div> 
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="<?=$this->path('css');?>/validationEngine.jquery.css">
<script src="<?=$this->path('js');?>/validationEngine.jquery/jquery.validationEngine.min.js" ></script>
<script src="<?=$this->path('js');?>/validationEngine.jquery/jquery.validationEngine-ru.min.js" ></script>
<script src="<?=$this->path('js');?>/jquery.maskedinput.js" ></script>
<script>		
  	$(document).ready(function () {
  		$(".form__control:not(.sp-form-control)[type='tel']").mask("+7 (999) 999-99-99",{placeholder:"+7 (___) ___-__-__"});
		//$(".form__control.sp-form-control[type='tel']").mask("999 999 99 99",{placeholder:"___ ___ __ __"});
		$("form.form-site").validationEngine(
			'attach', {
				promptPosition : "bottomLeft"
			}
		);
	});
</script>
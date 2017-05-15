'use strict';

$(function(){
	
	$(document.body).on('click.azbn', '.azbn-flt-btn', {}, function(event){
		event.preventDefault();
		
		
		
	});
	
	$(document.body).on('click.azbn', '.azbn-flt-btn[data-flt-key="material"]', {}, function(event){
		event.preventDefault();
		
		var btn = $(this);
		
		$('.azbn-flt-btn[data-flt-key="material"]').removeClass('is--active');
		btn.addClass('is--active');
		
	});
	
	$('.azbn-flt-btn[data-flt-key="material"]').eq(0).trigger('click');
	
});
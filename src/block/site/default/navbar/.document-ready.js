var url = window.location.pathname;
$('.navbar__nav a[href="'+url+'"]').parent().addClass('is--active'); 

$(function () {
	$('body, .navbar-site .navbar__form button[type="reset"]').on('click keyup', function(event) {
		console.log(event.currentTarget);
		if (event.which == 27 && $('.navbar-site .navbar__form').hasClass('is--active') ||
			$(event.currentTarget).attr('type') == 'reset') {
			closeSearch();
		}
	});
	function closeSearch() {
        var $form = $('.navbar-site .navbar__form.is--active')
		$form.find('input').val('');
		$form.removeClass('is--active');
	}
	$(document).on('click', '.navbar-site .navbar__form:not(.is--active) button[type="submit"]', function(event) {
		event.preventDefault();
		var $form = $(this).closest('form'),
			$input = $form.find('input');
		$form.addClass('is--active');
		$input.focus();

	});
});


/*if (device.mobile() || device.tablet()) {
	$(".navbar-collapse").prependTo($("body"));
	$(".icon-logo-full").prependTo($(".navbar-collapse-inner")).wrap('<a class="navbar-collapse__logo scrollto" href="#body-index"></a>');
}*/
    /*$(function () {
        // Remove Search if user Resets Form or hits Escape!
		$('body, .navbar-collapse form[role="search"] button[type="reset"]').on('click keyup', function(event) {
			console.log(event.currentTarget);
			if (event.which == 27 && $('.navbar-collapse form[role="search"]').hasClass('active') ||
				$(event.currentTarget).attr('type') == 'reset') {
				closeSearch();
			}
		});

		function closeSearch() {
            var $form = $('.navbar-collapse form[role="search"].active')
    		$form.find('input').val('');
			$form.removeClass('active');
		}

		// Show Search if form is not active // event.preventDefault() is important, this prevents the form from submitting
		$(document).on('click', '.navbar-collapse form[role="search"]:not(.active) button[type="submit"]', function(event) {
			event.preventDefault();
			var $form = $(this).closest('form'),
				$input = $form.find('input');
			$form.addClass('active');
			$input.focus();

		});
    });*/

	/*$(".navbar-hamburger").swipe({
	    swipeStatus:function(event, phase, direction, distance, duration, fingers)
	        {$(this).text("You swiped " + direction ); 
	            if (phase=="move" && direction =="right") {
	                $(".navbar-site ").addClass("open-sidebar");
	                return false;
	            }
	            if (phase=="move" && direction =="left") {
	                 $(".navbar-site ").removeClass("open-sidebar");
	                 return false; 
	            }
	        }
	});*/
	
/*	
$(function(){
	
	$(document.body).on('click', '.navbar-collapse.collapse.in li a.scrollto', {}, function(event){
		
		if(screenJS.isXS() || screenJS.isSM()) {
			event.preventDefault();
			
			$('.navbar .hamburger.hamburger--arrow').trigger('click');
			
		}
		
	});
	
})*/
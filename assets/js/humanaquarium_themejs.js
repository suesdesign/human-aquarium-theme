(function($){ //create closure so we can safely use $ as alias for jQuery

	// Skip Link

	$(".tab_accessibility").focus(function(){
		$(this).addClass("tab_visible");
	});

		// Dropdown mobile menu
	$('#main-nav').addClass('menu-closed');

	// Show or hide menu
	$('.mobile-menu-button').on('click', function(e){
		e.preventDefault();
		$(this).toggleClass('mobile-menu-clicked');
		$('#main-nav').toggleClass('mobile-menu-expand');
	});
		
})(jQuery);
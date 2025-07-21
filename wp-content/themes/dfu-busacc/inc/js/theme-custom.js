(function($){
    
    $(document).ready(function () {
		// Link slow scroll
		$('.scroll-down').click (function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top-150}, 'slow');
		});

		$('a[href^="#"]').on('click', function(e) { 
			var address = $(this).attr("href");
			if (address.length > 1) {
				var position = $(address).offset().top-150;
				$('html, body').animate({ scrollTop: position }, 'slow'); 
			}
        });

		// Background image parallax
		// Cache the window object
		var $window = $(window);
		$('section[data-type="background"]').each(function() {
			var $bgobj = $(this); // assigning the object
			if ( $bgobj.data('speed') > 0 ) {
				$(window).scroll(function() {
					// scroll the background at var speed, the yPos is a negative value for scrolling up
					var yPos = -($window.scrollTop() / $bgobj.data('speed'));
					// Final y position
					var coords = '50% '+ yPos + 'px';
					$bgobj.css({ backgroundPosition: coords });
				}); // end window scroll
			} // end if
		});

		// clickable top level bootstrap menu
		$('.dropdown-toggle').click(function() {
			location.href = $(this).attr('href');
		});

		// Display submenu on focus - bootstrap
		$('.dropdown > a').focus(function() {
			$(this).dropdown('toggle');
		});

		// Initialise tooltip
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})

	});

})(jQuery);
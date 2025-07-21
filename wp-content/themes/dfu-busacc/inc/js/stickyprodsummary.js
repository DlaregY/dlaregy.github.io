(function($){

    $(document).ready(function () {
		$(window).scroll(function() {
			// Sticky single product summary
			if ($(window).scrollTop() > 120){  
				$('.woocommerce .summary.entry-summary').addClass('sticky');
			}
			else {
				$('.woocommerce .summary.entry-summary').removeClass("sticky");
			}
		});
    });

})(jQuery);
(function($){

	$(document).ready(function() {
		//back to top
		$(window).on('scroll', function () {
			var scrollTop = $(window).scrollTop();
			if( scrollTop > 600 ) {
				$('#dba-sticky-backtotop').addClass('dba-back-to-top-show');
			} else {
				$('#dba-sticky-backtotop').removeClass('dba-back-to-top-show');
			}
		});
		$('#dba-sticky-backtotop').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 1000);
		});
    });

})(jQuery);
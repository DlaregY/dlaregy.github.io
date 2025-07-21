(function($){

    $(document).ready(function () {

        $(window).scroll(function(){
            if ($(this).scrollTop() > 75) {
                $('#mainnav').addClass('stickyheader');
            }
            else {
                $('#mainnav').removeClass('stickyheader');
            }
        });

    });

})(jQuery);
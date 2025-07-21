( function( $ ) {
    wp.customize.bind( 'ready', function() {

        $( '#theme_reset_btn' ).click( function(e) {
            e.preventDefault();
            nonce = $(this).attr("data-nonce");
            jQuery.post( ajax_url, 
                { 
                    action: 'dba_theme_reset',
                    nonce: nonce
                },
                function( response ) {
                    $( '.set-default-info' ).html( response );
                    $( '.set-color-info' ).html( '' );
                } );
        } );

        $( '#theme_set_color_btn' ).click( function(e) {
            e.preventDefault();
            nonce = $(this).attr("data-nonce");
            jQuery.post( ajax_url, 
                { 
                    action: 'dba_set_theme_color',
                    nonce: nonce
                },
                function( response ) {
                    $( '.set-color-info' ).html( response );
                    $( '.set-default-info' ).html( '' );
                } );
        } );

    });
    
} )( jQuery );
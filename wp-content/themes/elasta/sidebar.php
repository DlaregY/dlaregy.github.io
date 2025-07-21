<?php

/*
 * The sidebar containing the main widget area.
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
global  $elasta_redux_options ;
$elasta_blog_widget = ( isset( $elasta_redux_options['blog_widget'] ) ? $elasta_redux_options['blog_widget'] : '' );
// Only for free users

if ( ela_fs()->is_free_plan() ) {
    ?>
	<div class="elst-secondary">
		<?php 
    
    if ( !is_page() && $elasta_blog_widget && !is_single() ) {
        if ( is_active_sidebar( $elasta_blog_widget ) ) {
            dynamic_sidebar( $elasta_blog_widget );
        }
    } else {
        if ( is_active_sidebar( 'sidebar-1' ) ) {
            dynamic_sidebar( 'sidebar-1' );
        }
    }
    
    ?>
	</div>
<?php 
}

// is_premium
<?php

/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
get_header();
// Only for free users

if ( ela_fs()->is_free_plan() ) {
    ?>
	<div class="elst-error">
	  <div class="container">
	    <h1 class="error-title"><?php 
    echo  esc_html__( '404', 'elasta' ) ;
    ?></h1>
	    <h2 class="error-subtitle"><?php 
    echo  esc_html__( 'Ooops!!! Something went Wrong', 'elasta' ) ;
    ?></h2>
	    <p><?php 
    echo  esc_html__( 'The page you are looking for is removed or might never existed.', 'elasta' ) ;
    ?></p>
	    <div class="elst-btn-wrap"><a href="<?php 
    echo  esc_url( home_url( '/' ) ) ;
    ?>" class="elst-btn elst-blue-btn elst-small-btn"><?php 
    echo  esc_html__( 'BACK TO HOME', 'elasta' ) ;
    ?></a></div>
	  </div>
	</div>
<?php 
}

// is_premium
get_footer();
<!-- Navigation & Search -->
<?php 
// Only for free users

if ( ela_fs()->is_free_plan() ) {
    $elasta_breakpoint = '1199';
    
    if ( has_nav_menu( 'primary' ) ) {
        ?>
    <nav class="elst-navigation" data-nav="<?php 
        echo  esc_attr( $elasta_breakpoint ) ;
        ?>">
    <?php 
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => '',
            'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
            'walker'         => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    </nav> <!-- Container -->
  <?php 
    }

}

// is_premium
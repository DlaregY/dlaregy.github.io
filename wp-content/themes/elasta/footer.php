<?php

/*
 * The template for displaying the footer.
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
?>
</div><!-- Main Wrap Inner -->
<?php 
global  $elasta_redux_options ;
// Only for free users

if ( ela_fs()->is_free_plan() ) {
    $footer_style = ( isset( $elasta_redux_options['footer_style'] ) ? $elasta_redux_options['footer_style'] : '' );
    $style_class = ( $footer_style ? ' footer-style-' . $footer_style : '' );
    ?>
  <!-- Footer -->
  <footer class="elst-footer<?php 
    echo  esc_attr( $style_class ) ;
    ?>">
    <?php 
    
    if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) {
        ?>
      <div class="container">
        <div class="footer-wrap">
          <?php 
        get_template_part( 'template-parts/footer/footer', 'widgets' );
        ?>
        </div>
      </div>
    <?php 
        if ( $footer_style == 'three' || $footer_style == 'four' ) {
            get_template_part( 'template-parts/footer/footer', 'copyright' );
        }
    } else {
        get_template_part( 'template-parts/footer/footer', 'copyright' );
    }
    
    ?>
  </footer>
  <!-- Footer -->
<?php 
}

// is_premium
?>
</div><!-- Main Wrap -->
<?php 
wp_footer();
?>
</body>
</html>

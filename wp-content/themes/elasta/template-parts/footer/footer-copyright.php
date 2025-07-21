<?php

global  $elasta_redux_options ;
$footer_style = ( isset( $elasta_redux_options['footer_style'] ) ? $elasta_redux_options['footer_style'] : '' );
$copyright_left = ( isset( $elasta_redux_options['copyright_left'] ) ? $elasta_redux_options['copyright_left'] : '' );
$copyright_center = ( isset( $elasta_redux_options['copyright_center'] ) ? $elasta_redux_options['copyright_center'] : '' );
$copyright_right = ( isset( $elasta_redux_options['copyright_right'] ) ? $elasta_redux_options['copyright_right'] : '' );
// Only for free users
if ( ela_fs()->is_free_plan() ) {
    
    if ( $footer_style == 'three' ) {
        ?>
  <div class="elst-copyright">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <?php 
        echo  do_shortcode( $copyright_left ) ;
        ?>
        </div>
        <div class="col-md-6 alignright">
          <?php 
        echo  do_shortcode( $copyright_right ) ;
        ?>
        </div>
      </div>
    </div>
  </div>
  <?php 
    } elseif ( $footer_style == 'four' ) {
        ?>
  <div class="elst-copyright">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-4 col-md-6">
          <?php 
        echo  do_shortcode( $copyright_left ) ;
        ?>
        </div>
        <div class="col-lg-4 col-md-6">
          <?php 
        echo  do_shortcode( $copyright_center ) ;
        ?>
        </div>
        <div class="col-lg-4 col-md-6">
          <?php 
        echo  do_shortcode( $copyright_right ) ;
        ?>
        </div>
      </div>
    </div>
  </div>
  <?php 
    } else {
        ?>
    <div class="elst-copyright alt-copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 aligncenter">
            <p>&copy; <?php 
        echo  date_i18n( esc_html__( 'Y', 'elasta' ) ) ;
        ?>. <?php 
        esc_html_e( 'Designed by', 'elasta' );
        ?> <a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>"><?php 
        esc_html_e( 'NicheAddons', 'elasta' );
        ?></a></p>
          </div>
        </div>
      </div>
    </div>
  <?php 
    }

}
// is_premium
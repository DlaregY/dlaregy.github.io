<?php

global  $elasta_redux_options ;
$footer_style = ( isset( $elasta_redux_options['footer_style'] ) ? $elasta_redux_options['footer_style'] : '' );
$footer_dot = ( isset( $elasta_redux_options['footer_dot'] ) ? $elasta_redux_options['footer_dot'] : '' );
// Only for free users

if ( ela_fs()->is_free_plan() ) {
    
    if ( $footer_style == 'two' ) {
        $col_class1 = 'col-lg-4 ';
        $col_class2 = 'col-lg-2 ';
        $col_class3 = 'col-lg-3 ';
        $col_class4 = 'col-lg-3 ';
    } elseif ( $footer_style == 'three' ) {
        $col_class1 = 'col-lg-2 ';
        $col_class2 = 'col-lg-2 ';
        $col_class3 = 'col-lg-3 ';
        $col_class4 = 'col-lg-5 ';
    } elseif ( $footer_style == 'four' ) {
        $col_class1 = 'col-lg-4 ';
        $col_class2 = 'col-lg-3 ';
        $col_class3 = 'col-lg-3 ';
        $col_class4 = 'col-lg-2 ';
    } else {
        $col_class1 = 'col-lg-3 ';
        $col_class2 = 'col-lg-2 ';
        $col_class3 = 'col-lg-4 ';
        $col_class4 = 'col-lg-3 ';
    }
    
    ?>
  <!-- Footer Widgets -->
  <div class="row">
    <?php 
    
    if ( is_active_sidebar( 'footer-1' ) ) {
        ?>
      <div class="<?php 
        echo  esc_attr( $col_class1 ) ;
        ?>col-md-6">
        <?php 
        if ( $footer_dot['1'] == 1 && $footer_style == 'one' ) {
            ?>
          <span class="footer-wdot"></span>
        <?php 
        }
        dynamic_sidebar( 'footer-1' );
        ?>
      </div>
    <?php 
    }
    
    
    if ( is_active_sidebar( 'footer-2' ) ) {
        ?>
      <div class="<?php 
        echo  esc_attr( $col_class2 ) ;
        ?>col-md-6">
        <?php 
        if ( $footer_dot['2'] == 1 && $footer_style == 'one' ) {
            ?>
          <span class="footer-wdot"></span>
        <?php 
        }
        dynamic_sidebar( 'footer-2' );
        ?>
      </div>
    <?php 
    }
    
    
    if ( is_active_sidebar( 'footer-3' ) ) {
        ?>
      <div class="<?php 
        echo  esc_attr( $col_class3 ) ;
        ?>col-md-6">
        <?php 
        if ( $footer_dot['3'] == 1 && $footer_style == 'one' ) {
            ?>
          <span class="footer-wdot"></span>
        <?php 
        }
        dynamic_sidebar( 'footer-3' );
        ?>
      </div>
    <?php 
    }
    
    
    if ( is_active_sidebar( 'footer-4' ) ) {
        ?>
      <div class="<?php 
        echo  esc_attr( $col_class4 ) ;
        ?>col-md-6">
        <?php 
        if ( $footer_dot['4'] == 1 && $footer_style == 'one' ) {
            ?>
          <span class="footer-wdot"></span>
        <?php 
        }
        dynamic_sidebar( 'footer-4' );
        ?>
      </div>
    <?php 
    }
    
    ?>
  </div>
  <!-- Footer Widgets -->
<?php 
}

// is_premium
<?php

/*
 * The header for our theme.
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
?><!DOCTYPE html>
<html <?php 
language_attributes();
?>>
<head>
<meta charset="<?php 
bloginfo( 'charset' );
?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="//gmpg.org/xfn/11">
<?php 
wp_head();
// Site title and Tagline alignment

if ( display_header_text() == true ) {
    
    if ( get_bloginfo( 'name' ) ) {
        $text_logo_class = ' elst-has-text-logo';
    } else {
        $text_logo_class = ' elst-no-text-logo';
    }
    
    
    if ( get_bloginfo( 'description' ) ) {
        $site_tagline_class = ' elst-has-site-tagline';
    } else {
        $site_tagline_class = ' elst-no-site-tagline';
    }

} else {
    $text_logo_class = ' elst-no-text-logo';
    $site_tagline_class = ' elst-no-site-tagline';
}

global  $elasta_redux_options ;
$header_style = ( isset( $elasta_redux_options['header_style'] ) ? $elasta_redux_options['header_style'] : '' );
$elasta_need_content = ( isset( $elasta_redux_options['need_content'] ) ? $elasta_redux_options['need_content'] : '' );
$elasta_btn_one_text = ( isset( $elasta_redux_options['btn_one_text'] ) ? $elasta_redux_options['btn_one_text'] : '' );
$elasta_btn_one_icon = ( isset( $elasta_redux_options['btn_one_icon'] ) ? $elasta_redux_options['btn_one_icon'] : '' );
$elasta_btn_one_link = ( isset( $elasta_redux_options['btn_one_link'] ) ? $elasta_redux_options['btn_one_link'] : '' );
$elasta_btn_text = ( isset( $elasta_redux_options['btn_text'] ) ? $elasta_redux_options['btn_text'] : '' );
$elasta_btn_icon = ( isset( $elasta_redux_options['btn_icon'] ) ? $elasta_redux_options['btn_icon'] : '' );
$elasta_btn_link = ( isset( $elasta_redux_options['btn_link'] ) ? $elasta_redux_options['btn_link'] : '' );
$elasta_need_search = ( isset( $elasta_redux_options['need_search'] ) ? $elasta_redux_options['need_search'] : '' );
$elasta_need_contact = ( isset( $elasta_redux_options['need_contact'] ) ? $elasta_redux_options['need_contact'] : '' );
$elasta_contact_icon = ( isset( $elasta_redux_options['contact_icon'] ) ? $elasta_redux_options['contact_icon'] : '' );
$elasta_contact_icon = ( $elasta_contact_icon ? $elasta_contact_icon : 'fa fa-headphones' );
$elasta_contact_link = ( isset( $elasta_redux_options['contact_link'] ) ? $elasta_redux_options['contact_link'] : '' );
$top_bar = ( isset( $elasta_redux_options['top_bar'] ) ? $elasta_redux_options['top_bar'] : '' );
$header_scodes = ( isset( $elasta_redux_options['header_scodes'] ) ? $elasta_redux_options['header_scodes'] : '' );
$style_class = ( $header_style ? ' header-style-' . $header_style : '' );
$header_class = ( $header_style ? ' header-' . $header_style : '' );
$footer_class = '';
// is_premium
?>
</head>
<body <?php 
body_class();
?>>
<?php 
elasta_wp_body_open();
?>
<!-- Full Page -->
<!-- Elasta Main Wrap -->
<div class="elst-main-wrap<?php 
echo  esc_attr( $footer_class ) ;
?>">
  <a class="skip-link screen-reader-text" href="#elst-content"><?php 
esc_html_e( 'Skip to content', 'elasta' );
?></a>
  <?php 
// Only for free users

if ( ela_fs()->is_free_plan() ) {
    ?>
    <!-- Elasta Main Wrap Inner -->
    <div class="main-wrap-inner">
    <!-- Header -->
    <?php 
    
    if ( $header_style == 'four' || $header_style == 'five' ) {
        ?>
    <div class="elst-topbar f-topbar<?php 
        echo  esc_attr( $style_class ) ;
        ?>">
      <?php 
        echo  $top_bar ;
        ?>
    </div>
    <?php 
    }
    
    ?>
    <header class="elst-header<?php 
    echo  esc_attr( $text_logo_class . $site_tagline_class . $style_class ) ;
    ?>">
      <?php 
    
    if ( $header_style == 'two' ) {
        ?>
        <div class="container">
          <?php 
        get_template_part( 'template-parts/header/logo' );
        ?>
          <div class="elst-header-left">
            <?php 
        get_template_part( 'template-parts/header/menu', 'bar' );
        ?>
          </div>
          <div class="header-links-wrap">
            <div class="header-icon-links">
              <?php 
        
        if ( $elasta_need_search ) {
            ?>
              <div class="elst-search-link">
                <a href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="elst-search-box">
                  <?php 
            get_search_form();
            ?>
                  <a href="javascript:void(0);" class="search-closer"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
              </div>
              <?php 
        }
        
        
        if ( $elasta_need_contact ) {
            ?>
              <a href="<?php 
            echo  esc_url( $elasta_contact_link ) ;
            ?>"><i class="<?php 
            echo  esc_attr( $elasta_contact_icon ) ;
            ?>" aria-hidden="true"></i></a>
              <?php 
        }
        
        ?>
            </div>
            <?php 
        
        if ( $elasta_need_content ) {
            
            if ( $elasta_btn_one_link && $elasta_btn_link ) {
                $btn_cls = '';
            } else {
                $btn_cls = ' one-btn';
            }
            
            $btn_one_icon = ( $elasta_btn_one_icon ? '<i class="' . esc_attr( $elasta_btn_one_icon ) . '" aria-hidden="true"></i>' : '' );
            $btn_icon = ( $elasta_btn_icon ? '<i class="' . esc_attr( $elasta_btn_icon ) . '" aria-hidden="true"></i>' : '' );
            ?>
            <div class="header-right-btn<?php 
            echo  esc_attr( $btn_cls ) ;
            ?>">
              <?php 
            
            if ( $elasta_btn_one_link ) {
                ?>
              <a href="<?php 
                echo  esc_url( $elasta_btn_one_link ) ;
                ?>" class="elst-btn elst-trans-btn elst-small-btn"><?php 
                echo  $btn_one_icon . esc_html( $elasta_btn_one_text ) ;
                ?></a>
              <?php 
            }
            
            ?>
            </div>
          <?php 
        }
        
        ?>
          </div>
        </div>
      <?php 
    } elseif ( $header_style == 'three' ) {
        ?>
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-md-4">
              <?php 
        get_template_part( 'template-parts/header/logo' );
        ?>
              <?php 
        
        if ( $elasta_need_search ) {
            ?>
                <div class="elst-search-wrap">
                  <?php 
            get_search_form();
            ?>
                </div>
              <?php 
        }
        
        ?>
            </div>
            <div class="col-md-5">
              <div class="elst-header-left">
                <?php 
        get_template_part( 'template-parts/header/menu', 'bar' );
        ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="header-links-wrap">
                <div class="header-icon-links">
                  <?php 
        
        if ( $elasta_need_contact ) {
            ?>
                  <a href="<?php 
            echo  esc_url( $elasta_contact_link ) ;
            ?>"><i class="<?php 
            echo  esc_attr( $elasta_contact_icon ) ;
            ?>" aria-hidden="true"></i></a>
                  <?php 
        }
        
        ?>
                </div>
                <?php 
        
        if ( $elasta_need_content ) {
            
            if ( $elasta_btn_one_link && $elasta_btn_link ) {
                $btn_cls = '';
            } else {
                $btn_cls = ' one-btn';
            }
            
            $btn_one_icon = ( $elasta_btn_one_icon ? '<i class="' . esc_attr( $elasta_btn_one_icon ) . '" aria-hidden="true"></i>' : '' );
            $btn_icon = ( $elasta_btn_icon ? '<i class="' . esc_attr( $elasta_btn_icon ) . '" aria-hidden="true"></i>' : '' );
            ?>
                <div class="header-right-btn<?php 
            echo  esc_attr( $btn_cls ) ;
            ?>">
                  <?php 
            
            if ( $elasta_btn_one_link ) {
                ?>
                  <a href="<?php 
                echo  esc_url( $elasta_btn_one_link ) ;
                ?>" class="elst-btn elst-trans-btn elst-small-btn"><?php 
                echo  $btn_one_icon . esc_html( $elasta_btn_one_text ) ;
                ?></a>
                  <?php 
            }
            
            
            if ( $elasta_btn_link ) {
                ?>
                  <a href="<?php 
                echo  esc_url( $elasta_btn_link ) ;
                ?>" class="elst-btn elst-black-btn elst-small-btn"><?php 
                echo  $btn_icon . esc_html( $elasta_btn_text ) ;
                ?></a>
                  <?php 
            }
            
            ?>
                </div>
              <?php 
        }
        
        ?>
              </div>
            </div>
          </div>
        </div>
      <?php 
    } elseif ( $header_style == 'four' ) {
        ?>
        <div class="container-fluid">
          <?php 
        get_template_part( 'template-parts/header/logo' );
        ?>
          <div class="elst-header-left">
            <?php 
        get_template_part( 'template-parts/header/menu', 'bar' );
        ?>
          </div>
          <div class="header-links-wrap">
            <div class="header-icon-links">
              <?php 
        
        if ( $elasta_need_search ) {
            ?>
              <div class="elst-search-link">
                <a href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>
                <div class="elst-search-box">
                  <?php 
            get_search_form();
            ?>
                  <a href="javascript:void(0);" class="search-closer"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
              </div>
              <?php 
        }
        
        ?>
            </div>
            <?php 
        
        if ( $elasta_need_content ) {
            
            if ( $elasta_btn_one_link && $elasta_btn_link ) {
                $btn_cls = '';
            } else {
                $btn_cls = ' one-btn';
            }
            
            $btn_one_icon = ( $elasta_btn_one_icon ? '<i class="' . esc_attr( $elasta_btn_one_icon ) . '" aria-hidden="true"></i>' : '' );
            $btn_icon = ( $elasta_btn_icon ? '<i class="' . esc_attr( $elasta_btn_icon ) . '" aria-hidden="true"></i>' : '' );
            ?>
            <div class="header-right-btn<?php 
            echo  esc_attr( $btn_cls ) ;
            ?>">
              <?php 
            
            if ( $elasta_btn_one_link ) {
                ?>
              <a href="<?php 
                echo  esc_url( $elasta_btn_one_link ) ;
                ?>" class="elst-btn elst-trans-btn elst-small-btn"><?php 
                echo  $btn_one_icon . esc_html( $elasta_btn_one_text ) ;
                ?></a>
              <?php 
            }
            
            
            if ( $elasta_btn_link ) {
                ?>
              <a href="<?php 
                echo  esc_url( $elasta_btn_link ) ;
                ?>" class="elst-btn elst-black-btn elst-small-btn"><?php 
                echo  $btn_icon . esc_html( $elasta_btn_text ) ;
                ?></a>
              <?php 
            }
            
            ?>
            </div>
          <?php 
        }
        
        ?>
          </div>
        </div>
      <?php 
    } elseif ( $header_style == 'five' ) {
        ?>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-3">
              <?php 
        get_template_part( 'template-parts/header/logo' );
        ?>
              <?php 
        
        if ( $header_scodes ) {
            ?>
                <div class="elst-header-scodes">
                  <?php 
            echo  do_shortcode( $header_scodes ) ;
            ?>
                </div>
              <?php 
        }
        
        ?>
            </div>
            <div class="col-md-5">
              <div class="elst-header-left">
                <?php 
        get_template_part( 'template-parts/header/menu', 'bar' );
        ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="header-links-wrap">
                <div class="header-icon-links">
                  <?php 
        
        if ( $elasta_need_search ) {
            ?>
                  <div class="elst-search-link">
                    <a href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <div class="elst-search-box"> 
                      <?php 
            get_search_form();
            ?>
                      <a href="javascript:void(0);" class="search-closer"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                  </div>
                  <?php 
        }
        
        
        if ( $elasta_need_contact ) {
            ?>
                  <a href="<?php 
            echo  esc_url( $elasta_contact_link ) ;
            ?>"><i class="<?php 
            echo  esc_attr( $elasta_contact_icon ) ;
            ?>" aria-hidden="true"></i></a>
                  <?php 
        }
        
        ?>
                </div>
                <?php 
        
        if ( $elasta_need_content ) {
            
            if ( $elasta_btn_one_link && $elasta_btn_link ) {
                $btn_cls = '';
            } else {
                $btn_cls = ' one-btn';
            }
            
            $btn_one_icon = ( $elasta_btn_one_icon ? '<i class="' . esc_attr( $elasta_btn_one_icon ) . '" aria-hidden="true"></i>' : '' );
            $btn_icon = ( $elasta_btn_icon ? '<i class="' . esc_attr( $elasta_btn_icon ) . '" aria-hidden="true"></i>' : '' );
            ?>
                <div class="header-right-btn<?php 
            echo  esc_attr( $btn_cls ) ;
            ?>">
                  <?php 
            
            if ( $elasta_btn_one_link ) {
                ?>
                  <a href="<?php 
                echo  esc_url( $elasta_btn_one_link ) ;
                ?>" class="elst-btn elst-trans-btn elst-small-btn"><?php 
                echo  $btn_one_icon . esc_html( $elasta_btn_one_text ) ;
                ?></a>
                  <?php 
            }
            
            
            if ( $elasta_btn_link ) {
                ?>
                  <a href="<?php 
                echo  esc_url( $elasta_btn_link ) ;
                ?>" class="elst-btn elst-small-btn"><?php 
                echo  $btn_icon . esc_html( $elasta_btn_text ) ;
                ?></a>
                  <?php 
            }
            
            ?>
                </div>
              <?php 
        }
        
        ?>
              </div>
            </div>
          </div>
        </div>
      <?php 
    } elseif ( $header_style == 'six' ) {
        ?>
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-md-2 elst-order-1">
              <?php 
        
        if ( $header_scodes ) {
            ?>
                <div class="elst-header-six-scodes">
                  <?php 
            echo  do_shortcode( $header_scodes ) ;
            ?>
                </div>
              <?php 
        }
        
        ?>
            </div>
            <div class="col-md-8 elst-order-3">
              <?php 
        get_template_part( 'template-parts/header/logo' );
        ?>
              <div class="elst-header-left">
                <?php 
        get_template_part( 'template-parts/header/menu', 'bar' );
        ?>
              </div>
            </div>
            <div class="col-md-2 elst-order-2">
              <div class="header-links-wrap">
                <?php 
        
        if ( $elasta_need_content ) {
            
            if ( $elasta_btn_one_link && $elasta_btn_link ) {
                $btn_cls = '';
            } else {
                $btn_cls = ' one-btn';
            }
            
            $btn_one_icon = ( $elasta_btn_one_icon ? '<i class="' . esc_attr( $elasta_btn_one_icon ) . '" aria-hidden="true"></i>' : '' );
            $btn_icon = ( $elasta_btn_icon ? '<i class="' . esc_attr( $elasta_btn_icon ) . '" aria-hidden="true"></i>' : '' );
            ?>
                <div class="header-right-btn<?php 
            echo  esc_attr( $btn_cls ) ;
            ?>">
                  <?php 
            
            if ( $elasta_btn_one_link ) {
                ?>
                  <a href="<?php 
                echo  esc_url( $elasta_btn_one_link ) ;
                ?>" class="elst-btn elst-small-btn"><?php 
                echo  $btn_one_icon . esc_html( $elasta_btn_one_text ) ;
                ?></a>
                  <?php 
            }
            
            ?>
                </div>
              <?php 
        }
        
        ?>
              </div>
            </div>
          </div>
        </div>
      <?php 
    } else {
        ?>
        <div class="container-fluid">
          <?php 
        get_template_part( 'template-parts/header/logo' );
        ?>
          <div class="elst-header-left">
            <?php 
        get_template_part( 'template-parts/header/menu', 'bar' );
        ?>
          </div>
            <div class="header-links-wrap">
              <div class="header-icon-links">
                <?php 
        
        if ( $elasta_need_search ) {
            ?>
                <div class="elst-search-link style-one">
                  <a href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>
                  <div class="elst-search-box">
                    <?php 
            get_search_form();
            ?>
                    <a href="javascript:void(0);" class="search-closer"><i class="fa fa-times" aria-hidden="true"></i></a>
                  </div>
                </div>
                <?php 
        }
        
        
        if ( $elasta_need_contact ) {
            ?>
                <a href="<?php 
            echo  esc_url( $elasta_contact_link ) ;
            ?>"><i class="<?php 
            echo  esc_attr( $elasta_contact_icon ) ;
            ?>" aria-hidden="true"></i></a>
                <?php 
        }
        
        ?>
              </div>
              <?php 
        
        if ( $elasta_need_content ) {
            ?>
              <div class="header-right-btn">
                <?php 
            
            if ( $elasta_btn_one_link ) {
                ?>
                <a href="<?php 
                echo  esc_url( $elasta_btn_one_link ) ;
                ?>" class="elst-btn elst-trans-btn elst-small-btn"><?php 
                echo  esc_html( $elasta_btn_one_text ) ;
                ?></a>
                <?php 
            }
            
            
            if ( $elasta_btn_link ) {
                ?>
                <a href="<?php 
                echo  esc_url( $elasta_btn_link ) ;
                ?>" class="elst-btn elst-black-btn elst-small-btn"><?php 
                echo  esc_html( $elasta_btn_text ) ;
                ?></a>
                <?php 
            }
            
            ?>
              </div>
            <?php 
        }
        
        ?>
            </div>
        </div>
      <?php 
    }
    
    ?>
    </header>
  <?php 
}

// is_premium
// Title Area
if ( !is_404() && !is_page_template( 'template-home.php' ) ) {
    get_template_part( 'template-parts/header/title', 'bar' );
}
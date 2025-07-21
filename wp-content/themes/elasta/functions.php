<?php

/*
 * Elasta Theme's Functions
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
/**
 * Define - Folder Paths
 */
define( 'ELASTA_THEMEROOT_PATH', get_template_directory() );
define( 'ELASTA_THEMEROOT_URI', get_template_directory_uri() );
define( 'ELASTA_CSS', ELASTA_THEMEROOT_URI . '/assets/css' );
define( 'ELASTA_IMAGES', ELASTA_THEMEROOT_URI . '/assets/images' );
define( 'ELASTA_SCRIPTS', ELASTA_THEMEROOT_URI . '/assets/js' );
define( 'ELASTA_FRAMEWORK', get_template_directory() . '/inc' );
define( 'ELASTA_LAYOUT', get_template_directory() . '/template-parts' );

if ( !function_exists( 'ela_fs' ) ) {
    // Create a helper function for easy SDK access.
    function ela_fs()
    {
        global  $ela_fs ;
        
        if ( !isset( $ela_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $ela_fs = fs_dynamic_init( array(
                'id'             => '6451',
                'slug'           => 'elasta',
                'type'           => 'theme',
                'public_key'     => 'pk_10ba78cb8dd0272b6ecf6cba879bf',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'trial'          => array(
                'days'               => 7,
                'is_require_payment' => true,
            ),
                'menu'           => array(
                'slug'    => 'Elasta',
                'support' => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $ela_fs;
    }
    
    // Init Freemius.
    ela_fs();
    // Signal that SDK was initiated.
    do_action( 'ela_fs_loaded' );
}

/**
 * Define - Global Theme Info's
 */

if ( is_child_theme() ) {
    // If Child Theme Active
    $elasta_theme_child = wp_get_theme();
    $elasta_get_parent = $elasta_theme_child->Template;
    $elasta_theme = wp_get_theme( $elasta_get_parent );
} else {
    // Parent Theme Active
    $elasta_theme = wp_get_theme();
}

define( 'ELASTA_NAME', $elasta_theme->get( 'Name' ) );
define( 'ELASTA_VERSION', $elasta_theme->get( 'Version' ) );
define( 'ELASTA_BRAND_URL', $elasta_theme->get( 'AuthorURI' ) );
define( 'ELASTA_BRAND_NAME', $elasta_theme->get( 'Author' ) );
/**
 * All Main Files Include
 */
/* Theme All Basic Setup */
require_once ELASTA_FRAMEWORK . '/enqueue-files.php';
require_once ELASTA_FRAMEWORK . '/configuration.php';
// is_premium
// Only for free users
if ( ela_fs()->is_free_plan() ) {
    /* Bootstrap Menu Walker */
    require_once ELASTA_FRAMEWORK . '/plugins/class-wp-bootstrap-navwalker.php';
}
// is_free
/* Install Plugins */
require_once ELASTA_FRAMEWORK . '/plugins/notify/activation.php';
/* Include the TGM_Plugin_Activation class. */
require_once ELASTA_FRAMEWORK . '/plugins/notify/class-tgm-plugin-activation.php';
/* Integrate - Redux Framework */
require_once ELASTA_FRAMEWORK . '/theme-options.php';
/* Breadcrumb Trail */
require_once ELASTA_FRAMEWORK . '/breadcrumb-trail.php';
// is_premium
/* Ccontent Width */
function elasta_content_width()
{
    if ( !isset( $content_width ) ) {
        $content_width = 1170;
    }
}

add_action( 'after_setup_theme', 'elasta_content_width', 0 );
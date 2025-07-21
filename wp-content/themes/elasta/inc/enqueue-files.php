<?php

/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
/**
 * Enqueue Files for FrontEnd
 */

if ( !function_exists( 'elasta_vt_scripts_styles' ) ) {
    function elasta_vt_scripts_styles()
    {
        // Styles
        wp_enqueue_style( 'elasta-google-fonts', '//fonts.googleapis.com/css?family=Mr+Dafoe|Quicksand:500,600,700|Sen:400,700&display=swap', false );
        wp_enqueue_style(
            'font-awesome',
            ELASTA_CSS . '/font-awesome.min.css',
            array(),
            '4.7.0',
            'all'
        );
        wp_enqueue_style(
            'nice-select',
            ELASTA_CSS . '/nice-select.min.css',
            array(),
            '1.0',
            'all'
        );
        wp_enqueue_style(
            'meanmenu',
            ELASTA_CSS . '/meanmenu.css',
            array(),
            '2.0.7',
            'all'
        );
        wp_enqueue_style(
            'bootstrap',
            ELASTA_CSS . '/bootstrap.min.css',
            array(),
            '4.4.1',
            'all'
        );
        // is_premium
        wp_enqueue_style( 'elasta-style', get_stylesheet_uri() );
        wp_enqueue_style(
            'elasta-styles',
            ELASTA_CSS . '/styles.css',
            array(),
            ELASTA_VERSION,
            'all'
        );
        // is_premium
        // Scripts
        wp_enqueue_script(
            'bootstrap',
            ELASTA_SCRIPTS . '/bootstrap.min.js',
            array( 'jquery' ),
            '4.4.1',
            true
        );
        wp_enqueue_script(
            'isotope',
            ELASTA_SCRIPTS . '/isotope.min.js',
            array( 'jquery' ),
            '3.0.1',
            true
        );
        wp_enqueue_script(
            'packery-mode-pkgd',
            ELASTA_SCRIPTS . '/packery-mode.pkgd.min.js',
            array( 'jquery' ),
            '2.0.0',
            true
        );
        wp_enqueue_script(
            'nice-select',
            ELASTA_SCRIPTS . '/jquery.nice-select.min.js',
            array( 'jquery' ),
            '1.1.0',
            true
        );
        wp_enqueue_script(
            'meanmenu',
            ELASTA_SCRIPTS . '/jquery.meanmenu.js',
            array( 'jquery' ),
            '2.0.8',
            true
        );
        // is_premium
        wp_enqueue_script(
            'elasta-skip-link-focus-fix',
            ELASTA_SCRIPTS . '/skip-link-focus-fix.js',
            array(),
            ELASTA_VERSION,
            true
        );
        wp_enqueue_script(
            'elasta-scripts',
            ELASTA_SCRIPTS . '/scripts.js',
            array( 'jquery' ),
            ELASTA_VERSION,
            true
        );
        // Comments
        wp_enqueue_script(
            'validate',
            ELASTA_SCRIPTS . '/jquery.validate.min.js',
            array( 'jquery' ),
            '1.9.0',
            true
        );
        wp_add_inline_script( 'validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );
        // Responsive
        wp_enqueue_style(
            'elasta-responsive',
            ELASTA_CSS . '/responsive.css',
            array(),
            ELASTA_VERSION,
            'all'
        );
        // Adds support for pages with threaded comments
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    
    add_action( 'wp_enqueue_scripts', 'elasta_vt_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */

if ( !function_exists( 'elasta_vt_admin_scripts_styles' ) ) {
    function elasta_vt_admin_scripts_styles()
    {
        wp_enqueue_style(
            'font-awesome',
            ELASTA_CSS . '/font-awesome.min.css',
            array(),
            '4.7.0',
            'all'
        );
        // is_premium
    }
    
    add_action( 'admin_enqueue_scripts', 'elasta_vt_admin_scripts_styles' );
}

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function elasta_add_editor_styles()
{
    add_editor_style( get_stylesheet_uri() );
}

add_action( 'init', 'elasta_add_editor_styles' );
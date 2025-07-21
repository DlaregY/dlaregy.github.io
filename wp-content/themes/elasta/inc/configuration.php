<?php

/*
 * Redux Framework Configurations
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
/* Register menu */
register_nav_menus( array(
    'primary' => esc_html__( 'Main Navigation', 'elasta' ),
) );
/* Thumbnails */
add_theme_support( 'post-thumbnails' );
/* Feeds */
add_theme_support( 'automatic-feed-links' );
/* Add support for Title Tag. */
add_theme_support( 'title-tag' );
// is_premium
/* Added for backwards compatibility to support pre 5.2.0 WordPress versions */
if ( !function_exists( 'elasta_wp_body_open' ) ) {
    function elasta_wp_body_open()
    {
        do_action( 'wp_boby_open' );
    }

}
/* Custom Header */
$elasta_header_args = array(
    'flex-width'  => true,
    'flex-height' => true,
    'header-text' => true,
);
add_theme_support( 'custom-header', $elasta_header_args );
/* Custom Logo */
add_theme_support( 'custom-logo' );
/* Custom Background */
add_theme_support( 'custom-background' );
/* HTML5 */
add_theme_support( 'html5', array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption'
) );
// is_premium
/* Languages */

if ( !function_exists( 'elasta_theme_language_setup' ) ) {
    function elasta_theme_language_setup()
    {
        load_theme_textdomain( 'elasta', get_template_directory() . '/languages' );
    }
    
    add_action( 'after_setup_theme', 'elasta_theme_language_setup' );
}

/* Custom Logo */

if ( !function_exists( 'elasta_custom_logo_setup' ) ) {
    function elasta_custom_logo_setup()
    {
        $defaults = array(
            'height' => null,
            'width'  => null,
        );
        add_theme_support( 'custom-logo', $defaults );
    }
    
    add_action( 'after_setup_theme', 'elasta_custom_logo_setup' );
}

/* Footer Widgets */

if ( !function_exists( 'elasta_vt_widget_init' ) ) {
    function elasta_vt_widget_init()
    {
        
        if ( function_exists( 'register_sidebar' ) ) {
            global  $elasta_redux_options ;
            $footer_style = ( isset( $elasta_redux_options['footer_style'] ) ? $elasta_redux_options['footer_style'] : '' );
            // Main Widget Area
            register_sidebar( array(
                'name'          => esc_html__( 'Main Widget Area', 'elasta' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Appears on posts and pages.', 'elasta' ),
                'before_widget' => '<div id="%1$s" class="elst-widget %2$s">',
                'after_widget'  => '</div> <!-- end widget -->',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ) );
            // Footer Widgets
            register_sidebar( array(
                'name'          => esc_html__( 'Footer Widget 1', 'elasta' ),
                'id'            => 'footer-1',
                'description'   => esc_html__( 'Appears on Footer.', 'elasta' ),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div> <!-- end widget -->',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );
            register_sidebar( array(
                'name'          => esc_html__( 'Footer Widget 2', 'elasta' ),
                'id'            => 'footer-2',
                'description'   => esc_html__( 'Appears on Footer.', 'elasta' ),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div> <!-- end widget -->',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ) );
            if ( $footer_style != 'five' ) {
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Widget 3', 'elasta' ),
                    'id'            => 'footer-3',
                    'description'   => esc_html__( 'Appears on Footer.', 'elasta' ),
                    'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                    'after_widget'  => '</div> <!-- end widget -->',
                    'before_title'  => '<h3 class="widget-title">',
                    'after_title'   => '</h3>',
                ) );
            }
            if ( $footer_style != 'five' && $footer_style != 'six' ) {
                register_sidebar( array(
                    'name'          => esc_html__( 'Footer Widget 4', 'elasta' ),
                    'id'            => 'footer-4',
                    'description'   => esc_html__( 'Appears on Footer.', 'elasta' ),
                    'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                    'after_widget'  => '</div> <!-- end widget -->',
                    'before_title'  => '<h3 class="widget-title">',
                    'after_title'   => '</h3>',
                ) );
            }
            // is_premium
        }
    
    }
    
    add_action( 'widgets_init', 'elasta_vt_widget_init' );
}

/* Add a pingback url auto-discovery header for single posts, pages, or attachments. */

if ( !function_exists( 'elasta_pingback_header' ) ) {
    function elasta_pingback_header()
    {
        if ( is_singular() && pings_open() ) {
            echo  '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">' ;
        }
    }
    
    add_action( 'wp_head', 'elasta_pingback_header' );
}

/* Title Area */
if ( !function_exists( 'elasta_title_area' ) ) {
    function elasta_title_area()
    {
        global  $post, $wp_query ;
        // Get post meta in all type of WP pages
        $elasta_id = ( isset( $post ) ? $post->ID : 0 );
        $elasta_id = ( is_home() ? get_option( 'page_for_posts' ) : $elasta_id );
        $elasta_meta = get_post_meta( $elasta_id, 'page_type_metabox', true );
        
        if ( $elasta_meta && (!is_archive() || elasta_is_woocommerce_shop()) ) {
            $custom_title = $elasta_meta['page_custom_title'];
            
            if ( $custom_title ) {
                $custom_title = $custom_title;
            } else {
                $custom_title = '';
            }
        
        } else {
            $custom_title = '';
        }
        
        $allowed_title_area_tags = array(
            'a'    => array(
            'href' => array(),
        ),
            'span' => array(
            'class' => array(),
        ),
        );
        
        if ( $custom_title && !is_search() ) {
            echo  esc_html( $custom_title ) ;
        } elseif ( is_home() ) {
            bloginfo( 'description' );
        } elseif ( is_search() ) {
            /* translators: %s: Search Results */
            printf( esc_html__( 'Search Results for %s', 'elasta' ), '<span>' . get_search_query() . '</span>' );
        } elseif ( is_category() || is_tax() ) {
            single_cat_title();
        } elseif ( is_tag() ) {
            single_tag_title( esc_html__( 'Posts Tagged: ', 'elasta' ) );
        } elseif ( is_archive() ) {
            the_archive_title();
        } else {
            the_title();
        }
    
    }

}
// is_premium
// Share Options
if ( !function_exists( 'elasta_wp_share_option' ) ) {
    function elasta_wp_share_option()
    {
        global  $post ;
        $page_url = get_permalink( $post->ID );
        $media_url = get_the_post_thumbnail_url();
        $title = $post->post_title;
        global  $elasta_redux_options ;
        $share_on_text = ( isset( $elasta_redux_options['share_on_text'] ) ? $elasta_redux_options['share_on_text'] : '' );
        $share_on_text = ( $share_on_text ? $share_on_text : esc_html__( 'Share On', 'elasta' ) );
        ?>
		<div class="elst-blog-share">
      <div class="elst-social">
        <a href="//www.facebook.com/sharer/sharer.php?u=<?php 
        print urlencode( $page_url );
        ?>&amp;t=<?php 
        print urlencode( $title );
        ?>" class="icon-fa-facebook" data-toggle="tooltip" data-placement="top" title="<?php 
        echo  esc_attr( $share_on_text . ' ' ) ;
        echo  esc_attr( 'Facebook', 'elasta' ) ;
        ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
        <a href="//twitter.com/home?status=<?php 
        print urlencode( $title );
        ?>+<?php 
        print urlencode( $page_url );
        ?>" class="icon-fa-twitter" data-toggle="tooltip" data-placement="top" title="<?php 
        echo  esc_attr( $share_on_text . ' ' ) ;
        echo  esc_attr( 'Twitter', 'elasta' ) ;
        ?>" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php 
        print urlencode( $page_url );
        ?>&amp;title=<?php 
        print urlencode( $title );
        ?>" class="icon-fa-linkedin" data-toggle="tooltip" data-placement="top" title="<?php 
        echo  esc_attr( $share_on_text . ' ' ) ;
        echo  esc_attr( 'Linkedin', 'elasta' ) ;
        ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="//pinterest.com/pin/create/button/?url=<?php 
        print urlencode( $page_url );
        ?>&media=<?php 
        print urlencode( $media_url );
        ?>" title="<?php 
        echo  esc_attr( $share_on_text . ' ' ) ;
        echo  esc_attr( 'Pinterest', 'elasta' ) ;
        ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
    </div>
  </div>
<?php 
    }

}
// is_premium
/* Filter the categories archive widget to add a span around post count */

if ( !function_exists( 'elasta_cat_count_span' ) ) {
    function elasta_cat_count_span( $links )
    {
        $links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
        $links = str_replace( ')', ')</span>', $links );
        return $links;
    }
    
    add_filter( 'wp_list_categories', 'elasta_cat_count_span' );
}

/* Filter the archives widget to add a span around post count */

if ( !function_exists( 'elasta_archive_count_span' ) ) {
    function elasta_archive_count_span( $links )
    {
        $links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
        $links = str_replace( ')', ')</span>', $links );
        return $links;
    }
    
    add_filter( 'get_archives_link', 'elasta_archive_count_span' );
}

// is_premium
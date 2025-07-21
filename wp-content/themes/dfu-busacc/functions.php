<?php
/**
 * DFU Business Accelerator functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DFU_Business_Accelerator
 *******************************************************************************************************************************************/

if ( ! function_exists( 'dfu_busacc_fn_setup' ) ) {
	function dfu_busacc_fn_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'dfu-busacc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dfu_busacc_custom_background_args',
				array(
					'default-color'      => 'ffffff',
					'default-image'      => '',
					'wp-head-callback'   => ( get_theme_mod( 'dba_bgimg_responsive', false ) ? 'dfu_busacc_fn_custom_background_cb' : '_custom_background_cb' ),
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Set up the WordPress core custom header feature.
		add_theme_support(
			'custom-header',
			apply_filters(
				'dfu_busacc_custom_header_args',
				array(
					'default-image'      => get_parent_theme_file_uri( '/inc/assets/img/334581-pxhere.jpg' ),
					'header-text'        => true,
					'default-text-color' => '222',
					'width'              => 2000,
					'height'             => 1200,
					'flex-width'         => true,
					'flex-height'        => true,
					'uploads'            => true,
					'random-default'     => true,
				)
			)
		);

		register_default_headers(
			array(
				'image1' => array(
					'url'           => '%s/inc/assets/img/1046491-pxhere.jpg',
					'thumbnail_url' => '%s/inc/assets/img/1046491-pxhere.jpg',
					'description'   => __( 'Image1', 'dfu-busacc' ),
				),
				'notebook2' => array(
					'url'           => '%s/inc/assets/img/334581-pxhere.jpg',
					'thumbnail_url' => '%s/inc/assets/img/334581-pxhere.jpg',
					'description'   => __( 'Image2', 'dfu-busacc' ),
				),
			)
		);

		// Add theme support for post formats
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video' ) );

		// Add image sizes
		add_image_size( 'dfu-busacc-md', 580, 1100 );
		add_image_size( 'dfu-busacc-xl', 1200, 2200 );

		// Add theme support for editor styles
		add_theme_support( 'editor-styles' );

		$font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Montserrat:300,400,700' );
		add_editor_style( '/inc/css/style-editor.min.css' );
		add_editor_style( '/inc/css/classic-editor-style.min.css' );
		if ( class_exists('woocommerce') ) {
			add_editor_style( 'inc/css/wc-style-editor.min.css' );
			// Block Sale tag styles
			$tagstyle = get_theme_mod( 'dba_wc_sale_tag_style', 'onsale' );
			switch ( $tagstyle ) {
				case 'onsale':
					add_editor_style( 'inc/css/theme-wc-sale0.min.css' );
					break;
				case 'sale-tag1':
					add_editor_style( 'inc/css/theme-wc-sale1.min.css' );
					break;
				case 'sale-tag2':
					add_editor_style( 'inc/css/theme-wc-sale2.min.css' );
					break;
				case 'sale-tag3':
					add_editor_style( 'inc/css/theme-wc-sale3.min.css' );
					break;
				case 'sale-tag4':
					add_editor_style( 'inc/css/theme-wc-sale4.min.css' );
					break;
			}
		}

		// Support for Gutenberg block editor
		add_theme_support( 'editor-color-palette', dfu_busacc_fn_editor_colour_gradient_preset( 1 ) );
		add_theme_support( 'editor-gradient-presets', dfu_busacc_fn_editor_colour_gradient_preset( 2 ) );

		// Support for custom line heights
		add_theme_support( 'custom-line-height' );

		// Support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Support for Block Styles.
		add_theme_support( 'wp-block-styles' );
	}
}
add_action( 'after_setup_theme', 'dfu_busacc_fn_setup' );

/**
 * Custom block editor color palette.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_editor_colour_gradient_preset' ) ) {
	function dfu_busacc_fn_editor_colour_gradient_preset( $type ) {
		$colour = dfu_busacc_fn_get_theme_prisec_colour();
		$pri = $colour['pri1'];
		$sec = $colour['sec1'];

		if ( $pri && $sec ) { 
			$ctype = dfu_busacc_fn_colourcheck( $pri );
			$themecolors = dfu_busacc_fn_theme_colours( $pri, $sec );
			$greys = dfu_busacc_fn_getgreyscale( $pri );
		}
		if ( 1 == $type ) {
			return array(
				array(
					'name' => esc_attr__( 'DFUBA - Primary colour', 'dfu-busacc' ),
					'slug' => 'primary',
					'color' => $pri,
				),
				array(
					'name' => esc_attr__( 'DFUBA - Primary colour dark', 'dfu-busacc' ),
					'slug' => 'primary-dark',
					'color' => ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ),
				),
				array(
					'name' => esc_attr__( 'DFUBA - Primary colour light', 'dfu-busacc' ),
					'slug' => 'primary-light',
					'color' => $themecolors['pri_lt90'],
				),

				array(
					'name' => esc_attr__( 'DFUBA - Secondary colour', 'dfu-busacc' ),
					'slug' => 'secondary',
					'color' => $sec,
				),
				array(
					'name' => esc_attr__( 'DFUBA - Secondary colour dark', 'dfu-busacc' ),
					'slug' => 'secondary-dark',
					'color' => ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ),
				),
				array(
					'name' => esc_attr__( 'DFUBA - Secondary colour light', 'dfu-busacc' ),
					'slug' => 'secondary-light',
					'color' => ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ),
				),

				array(
					'name' => esc_attr__( 'DFUBA - Grey', 'dfu-busacc' ),
					'slug' => 'grey',
					'color' => $greys['col5'],
				),
				array(
					'name' => esc_attr__( 'DFUBA - Dark grey', 'dfu-busacc' ),
					'slug' => 'grey-dark',
					'color' => $greys['col8'],
				),
				array(
					'name' => esc_attr__( 'DFUBA - Light grey', 'dfu-busacc' ),
					'slug' => 'grey-light',
					'color' => $greys['col2'],
				),
			);
		} else {
			return array(
				array(
					'name'     => esc_html__( 'Theme Primary to secondary colour', 'dfu-busacc' ),
					'gradient' => 'linear-gradient(to right, ' . $pri . ' 0%, ' . $sec . ' 100%)',
					'slug'     => 'primary-to-secondary',
				),
				array(
					'name'     => esc_html__( 'Theme dark primary to dark secondary colour', 'dfu-busacc' ),
					'gradient' => 'linear-gradient(to right, ' . ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) . ' 0%, ' . ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) . ' 100%)',
					'slug'     => 'primary-dark-to-secondary-dark',
				),
				array(
					'name'     => esc_html__( 'Theme light primary to light secondary colour', 'dfu-busacc' ),
					'gradient' => 'linear-gradient(to right, ' . $themecolors['pri_lt90'] . ' 0%, ' . ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ) . ' 100%)',
					'slug'     => 'primary-light-to-secondary-light',
				),
				array(
					'name'     => esc_html__( 'Theme primary to dark primary colour', 'dfu-busacc' ),
					'gradient' => 'linear-gradient(to right, ' . $pri . ' 0%, ' . ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) . ' 100%)',
					'slug'     => 'primary-to-primary-dark',
				),
				array(
					'name'     => esc_html__( 'Theme secondary to dark secondary colour', 'dfu-busacc' ),
					'gradient' => 'linear-gradient(to right, ' . $sec . ' 0%, ' . ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) . ' 100%)',
					'slug'     => 'secondary-to-secondary-dark',
				),
			);
		}
	}
}

/**
 * Custom background callback with responive background image
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_custom_background_cb' ) ) {
	function dfu_busacc_fn_custom_background_cb() {
		// $background is the saved custom image, or the default image.
		$background = set_url_scheme( get_background_image() );
		// $color is the saved custom color.
		// A default has to be specified in style.css. It will not be printed here.
		$color = get_background_color();
		if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
			$color = false;
		}
		$type_attr = current_theme_supports( 'html5', 'style' ) ? '' : ' type="text/css"';
		if ( ! $background && ! $color ) {
			if ( is_customize_preview() ) {
				printf( '<style%s id="custom-background-css"></style>', $type_attr ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			return;
		}
		$style = $color ? "background-color: #" . esc_attr( $color ) . ";" : '';
		if ( $background ) {
			// Background Position.
			$position_x = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
			$position_y = get_theme_mod( 'background_position_y', get_theme_support( 'custom-background', 'default-position-y' ) );
			if ( ! in_array( $position_x, array( 'left', 'center', 'right' ), true ) ) {
				$position_x = 'left';
			}
			if ( ! in_array( $position_y, array( 'top', 'center', 'bottom' ), true ) ) {
				$position_y = 'top';
			}
			$position = " background-position: $position_x $position_y;";
			// Background Size.
			$size = get_theme_mod( 'background_size', get_theme_support( 'custom-background', 'default-size' ) );
			if ( ! in_array( $size, array( 'auto', 'contain', 'cover' ), true ) ) {
				$size = 'auto';
			}
			$size = " background-size: $size;";
			// Background Repeat.
			$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );
			if ( ! in_array( $repeat, array( 'repeat-x', 'repeat-y', 'repeat', 'no-repeat' ), true ) ) {
				$repeat = 'repeat';
			}
			$repeat = " background-repeat: $repeat;";
			// Background Scroll.
			$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );
			if ( 'fixed' !== $attachment ) {
				$attachment = 'scroll';
			}
			$attachment = " background-attachment: " . esc_attr( $attachment ) .";";
			$style .= $position . $size . $repeat . $attachment;
		}
		?>
		<style<?php echo $type_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> id="custom-background-css">
			body.custom-background { <?php echo trim( $style ); ?> }
			<?php
			if ( $background ) {
				$imgid = attachment_url_to_postid( $background );
				dfu_busacc_fn_get_reponsive_img_css( $imgid, 'body.custom-background', false, true );
			}
			?>
		</style>
	<?php
	}
}

if ( ! function_exists( 'dfu_busacc_fn_register_menus' ) ) {
	function dfu_busacc_fn_register_menus() {
		// This theme uses wp_nav_menu() in multiple location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main', 'dfu-busacc' ),
			'footer-menu' => esc_html__( 'Footer', 'dfu-busacc' ),
		) );
	}
}
add_action( 'init', 'dfu_busacc_fn_register_menus' );

// Add the custom size to the Gutenberg image dropdown
if ( ! function_exists( 'dfu_busacc_fn_add_image_size_names' ) ) {
	function dfu_busacc_fn_add_image_size_names( $sizes ) {
		return array_merge(
			$sizes,
			array(
				'dfu-busacc-md'    => __( 'dfu-busacc-medium', 'dfu-busacc' ),
				'dfu-busacc-xl'    => __( 'dfu-busacc-extra-large', 'dfu-busacc' ),
			)
		);
	}
}
add_filter( 'image_size_names_choose', 'dfu_busacc_fn_add_image_size_names' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_content_width' ) ) {
	function dfu_busacc_fn_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'dfu_busacc_content_width', 1380 );
	}
}
add_action( 'after_setup_theme', 'dfu_busacc_fn_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_widgets_init' ) ) {
	function dfu_busacc_fn_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 1', 'dfu-busacc' ),
				'id'            => 'dba-sidebar-1',
				'description'   => esc_html__( 'Add widgets for sidebar 1.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		/* Custom sidebars */
		$numsidebar = get_theme_mod( 'dba_sidebar_no', 0 );
		for ( $i = 0; $i < $numsidebar; $i++ ) {
			$num = $i + 1;
			register_sidebar(
				array(
					'name'          => esc_html__( 'Custom sidebar ', 'dfu-busacc' ) . $num,
					'id'            => 'dba-custom-sidebar-' . $num,
					'description'   => esc_html__( 'Add widgets for custom sidebar ', 'dfu-busacc' ) . $num,
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="dba-widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}

		/* Footer bar areas */
		$numfooterbar = get_theme_mod( 'dba_footerbar_no', 0 );
		for ( $j = 0; $j < $numfooterbar; $j++ ) {
			$num = $j + 1;
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer widget ', 'dfu-busacc' ) . $num,
					'id'            => 'dba-footerbar-' . $num,
					'description'   => esc_html__( 'Add widgets for footer bar ', 'dfu-busacc' ) . $num,
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="dba-widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}

		register_sidebar(
			array(
				'name'          => esc_html__( '404 Error sidebar', 'dfu-busacc' ),
				'id'            => 'dba-404-sidebar',
				'description'   => esc_html__( 'Add widgets for the 404 page to help get the relevant information.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Search sidebar', 'dfu-busacc' ),
				'id'            => 'dba-search-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog sidebar', 'dfu-busacc' ),
				'id'            => 'dba-blog-sidebar',
				'description'   => esc_html__( 'Sidebar use in blog posts index page.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Top bar widgets 1', 'dfu-busacc' ),
				'id'            => 'dba-topbar-sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Top bar widgets 2', 'dfu-busacc' ),
				'id'            => 'dba-topbar-sidebar-2',
				'description'   => esc_html__( 'Add widgets here.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Homepage under CTA', 'dfu-busacc' ),
				'id'            => 'dba-home-head-sidebar',
				'description'   => esc_html__( 'Add widgets in homepage, must enabled in customiser\'s Home Page Setting. If no header image/CTA defined, this will appear under top navigation menu', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		if ( '2' == get_theme_mod( 'dba_header_layout', '1' ) ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Header (type 2) widgets', 'dfu-busacc' ),
					'id'            => 'dba-headertype2-sidebar',
					'description'   => esc_html__( 'Add widgets here.', 'dfu-busacc' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="dba-widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}
	}
}
add_action( 'widgets_init', 'dfu_busacc_fn_widgets_init' );

/**
 * Enqueue scripts and styles.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_scripts' ) ) {
	function dfu_busacc_fn_scripts() {
		$path = get_template_directory_uri() . '/inc/';
		wp_enqueue_style( 'bootstrap', $path . 'css/bootstrap.min.css', array(), '4.6.0', 'all' );
		wp_enqueue_style( 'dfuba-style', get_stylesheet_uri(), array(), false, 'all' );
		wp_enqueue_style( 'dfuba-theme-style', $path . 'css/theme-style.min.css', array(), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), 'all' );
		wp_add_inline_style( 'dfuba-theme-style', dfu_busacc_fn_inline_header_style() );

		if ( class_exists( 'woocommerce' ) ) {
			wp_add_inline_style( 'dfuba-theme-style', dfu_busacc_fn_inline_wc_style() );
		}

		if ( true == get_theme_mod( 'dba_load_fa_font', false ) ) {
			wp_enqueue_style( 'font-awesome-style', $path . 'css/all.min.css', array(), '5.15.3', 'all' );
		}

		wp_enqueue_script( 'dfuba-skip-link-focus-fix', $path . 'js/skip-link-focus-fix.js', array(), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), true );
		wp_enqueue_script( 'jquery-ui-core', '', array(), false, true );
		wp_enqueue_script( 'bootstrap-bundle-js', $path . 'js/bootstrap.bundle.min.js', array( 'jquery' ), '4.6.0', true );
		wp_enqueue_script( 'dfuba-custom-js', $path . 'js/theme-custom.js', array( 'jquery' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), true );
		if ( true == get_theme_mod( 'dba_load_fa', true ) ) {
			wp_enqueue_script( 'font-awesome-js', $path . 'js/all.min.js', array( 'jquery' ), '5.15.3', true );
		}


		// Load stickymenu js if enabled in customizer
		if ( true == get_theme_mod( 'dba_stickymenu', false ) ) {
			wp_enqueue_script( 'dfuba-stickymenu', $path . 'js/stickymenu.js', array( 'jquery' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), true );
		}
		// Load backtotop js if enabled in customizer
		if ( true == get_theme_mod( 'dba_show_backtotop', false ) ) {
			wp_enqueue_script( 'dfuba-backtotop', $path . 'js/backtotop.js', array( 'jquery' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), true );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( class_exists( 'woocommerce' ) ) {
			// Load sticky single product summary
			if ( true == get_theme_mod( 'dba_wc_sglprod_sticky_summary', false ) ) {
				wp_enqueue_script( 'dfuba-stickyprodsummary', $path . 'js/stickyprodsummary.js', array( 'jquery' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), true );
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'dfu_busacc_fn_scripts' );

/**
 * Header inline CSS.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_inline_header_style' ) ) {
	function dfu_busacc_fn_inline_header_style() {
		$css = '';
		if ( is_post_type_archive() || ( is_home() && ! is_front_page() ) ) {
			$achiveposttype = get_post_type();
			if ( class_exists( 'woocommerce' ) ) {
				if ( is_archive() && ( is_product_category() || is_product_tag() || is_shop() ) ) {
					$achiveposttype = '';
				}
			}
			if ( '' != $achiveposttype && class_exists( 'DFU_Busacc_Addon' ) ) {
				if ( post_type_exists( 'post_types_info' ) ) {
					$ptiargs = array(
						'post_type'        => 'post_types_info',
						'posts_per_page'   => 1,
						'post_status'      => 'publish',
						'meta_key'         => 'dbacf_ptype',
						'meta_value'       => $achiveposttype,
						'order'            => 'DESC',
						'orderby'          => 'date',
					);
					$ptiquery = new WP_Query( $ptiargs );
					if ( $ptiquery->have_posts() ) {
						while ( $ptiquery->have_posts() ) {
							$ptiquery->the_post();
							$css = dfu_busacc_fn_header_inline_css();
						}
						wp_reset_postdata();
					}
				}
			} elseif ( class_exists( 'woocommerce' ) && is_shop() ) {
				$page_id = get_option( 'woocommerce_shop_page_id' ); //wc_get_page_id( 'shop' );
				$css = dfu_busacc_fn_header_inline_css( $page_id, true );
			}
		} elseif ( is_category() || is_tag() || is_tax() ) {
			$queried_object = get_queried_object();
			$css = dfu_busacc_fn_header_inline_css( $queried_object );
		} elseif ( ! is_search() && ! is_404() && ! is_author() ) {
			$css = dfu_busacc_fn_header_inline_css();
		}
		return $css;
	}
}

/**
 * WooCommerce inline CSS.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_inline_wc_style' ) ) {
	function dfu_busacc_fn_inline_wc_style() {
		$css = '';
		$showcart = get_theme_mod( 'dba_wc_cart_on_menu' );
		if ( $showcart && true == $showcart ) {
			if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
				$menu_theme = mmm_get_theme_for_location( 'main-menu' );
				$megamenu_breakpoint = $menu_theme['responsive_breakpoint'];
				if ( empty( $megamenu_breakpoint ) ) {
					$megamenu_breakpoint = '600px';
				}
				$css = '@media screen and (max-width: ' . esc_attr( $megamenu_breakpoint ) . ') { .dba-wc-cart { display: none !important; } }';
			} else {
				$css = '@media screen and (max-width: 767px) { .dba-wc-cart { display: none !important; } }';
			}
		}
		return $css;
	}
}

/**
 * Enqueue the Gutenberg editor stylesheet.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_enqueue_gblock' ) ) {
	function dfu_busacc_fn_enqueue_gblock() {
		wp_register_style( 'dfuba-gutenberg', get_stylesheet_directory_uri() . '/inc/css/gutenberg-editor-style.min.css' ); //variables default for block editor
		wp_enqueue_style( 'dfuba-gutenberg' );
		wp_enqueue_script( 'font-awesome-js', get_template_directory_uri() . '/inc/' . 'js/all.min.js', array( 'jquery' ), '5.15.3', true );

		$colour = dfu_busacc_fn_get_theme_prisec_colour();
		$pri = $colour['pri1'];
		$sec = $colour['sec1'];
		$sec2 = $colour['sec2'];
		if ( $pri && $sec ) { 
			$ctype = dfu_busacc_fn_colourcheck( $pri );
			$themecolors = dfu_busacc_fn_theme_colours( $pri, $sec );
			$greys = dfu_busacc_fn_getgreyscale( $pri );
		}

		// Additional CSS or additional variable CSS from theme added as inline CSS to override default variables  
		$inlinecss = '';
		/* Text colours */
		$inlinecss .= '.has-primary-color { color: ' . esc_attr( $pri ) . '; }';
		$inlinecss .= '.has-primary-dark-color { color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . '; }';
		$inlinecss .= '.has-primary-light-color { color: ' . esc_attr( $themecolors['pri_lt90'] ) . '; }';
		$inlinecss .= '.has-secondary-color { color: ' . esc_attr( $sec ) . '; }';
		$inlinecss .= '.has-secondary-dark-color { color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . '; }';
		$inlinecss .= '.has-secondary-light-color { color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ) ) . '; }';
		$inlinecss .= '.has-grey-color { color: ' . esc_attr( $greys['col5'] ) . '; }';
		$inlinecss .= '.has-grey-dark-color { color: ' . esc_attr( $greys['col8'] ) . '; }';
		$inlinecss .= '.has-grey-light-color { color: ' . esc_attr( $greys['col2'] ) . '; }';

		/* Background colours */
		$inlinecss .= '.has-primary-background-color { background-color: ' . esc_attr( $pri ) . '; }';
		$inlinecss .= '.has-primary-dark-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . '; }';
		$inlinecss .= '.has-primary-light-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_lt85'] : $themecolors['pri_dk30'] ) ) . '; }';
		$inlinecss .= '.has-secondary-background-color { background-color: ' . esc_attr( $sec ) . '; }';
		$inlinecss .= '.has-secondary-dark-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . '; }';
		$inlinecss .= '.has-secondary-light-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ) ) . '; }';
		$inlinecss .= '.has-grey-background-color { background-color: ' . esc_attr( $greys['col5'] ) . '; }';
		$inlinecss .= '.has-grey-dark-background-color { background-color: ' . esc_attr( $greys['col8'] ) . '; }';
		$inlinecss .= '.has-grey-light-background-color { background-color: ' . esc_attr( $greys['col2'] ) . '; }';

		/* Gradient background */
		$inlinecss .= '.has-primary-to-secondary-gradient-background { background: linear-gradient(to right, ' . esc_attr( $pri ) . ' 0%, ' . esc_attr( $sec ) . ' 100%); }';
		$inlinecss .= '.has-primary-dark-to-secondary-dark-gradient-background { background: linear-gradient(to right, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . ' 100%); }';
		$inlinecss .= '.has-primary-light-to-secondary-light-gradient-background { background: linear-gradient(to right, ' . esc_attr( $themecolors['pri_lt90'] ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ) ) . ' 100%); }';
		$inlinecss .= '.has-primary-to-primary-dark-gradient-background { background: linear-gradient(to right, ' . esc_attr( $pri ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . ' 100%); }';
		$inlinecss .= '.has-secondary-to-secondary-dark-gradient-background { background: linear-gradient(to right, ' . esc_attr( $sec ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . ' 100%); }';

		/* Buttons */
		$btndefault = array(
			'text'  => '#f0f1f2',
			'htext' => '#fcfcfc',
			'bg'    => '#0088cc',
			'hbg'   => '#006191',
		);
		$btncol = get_theme_mod( 'dba_button', $btndefault );
		$btngrad = get_theme_mod( 'dba_btn_grad', false );
		if ( $btngrad ) {
			$graddir = get_theme_mod( 'dba_gradient_direction', '' );
			$fcolor = get_theme_mod( 'dba_btn_first' );
			$scolor = get_theme_mod( 'dba_btn_second' );
			$hgraddir = get_theme_mod( 'dba_gradient_hdirection', '' );
			$hfcolor = get_theme_mod( 'dba_btn_hfirst' );
			$hscolor = get_theme_mod( 'dba_btn_hsecond' );
		}
		$inlinecss .= ( class_exists( 'woocommerce' ) ? '.wc-block-grid .wp-block-button .wp-block-button__link, .wp-block-button .wp-block-button__link:link, .wp-block-button .wp-block-button__link:visited, ' : '' );
		$inlinecss .= '.wp-block-button.is-style-dfu-busacc-theme-button a.wp-block-button__link:not(.has-background):not(.has-text-color), .wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color) { ';
		$inlinecss .= 'font-weight: 400; box-shadow: var(--shadow-light); ';
		$inlinecss .= 'min-height: var(--min-height); ';
		$inlinecss .= 'border-radius: var(--border-radius); ';
		$inlinecss .= 'color: ' . esc_attr( $btncol['text'] ) . '; ';
		$inlinecss .= 'background-color: ' . esc_attr( $btncol['bg'] ) . '; ';
		if ( $btngrad ) {
			$inlinecss .= 'background: linear-gradient(' . esc_attr( $graddir ) . ', ' . esc_attr( $fcolor ) . ', ' . esc_attr( $scolor ) . '); }';
		}
		$inlinecss .= ( class_exists( 'woocommerce' ) ? '.wc-block-grid .wp-block-button .wp-block-button__link:hover, .wc-block-grid .wp-block-button .wp-block-button__link:focus, .wc-block-grid .wp-block-button .wp-block-button__link:active, ' : '' );
		$inlinecss .= '.wp-block-button.is-style-dfu-busacc-theme-button a.wp-block-button__link:not(.has-background):not(.has-text-color):hover, .wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color):hover { ';
		$inlinecss .= 'box-shadow: var(--shadow-dark); ';
		$inlinecss .= 'text-decoration: none; ';
		$inlinecss .= 'color: ' . esc_attr( $btncol['htext'] ) . '; ';
		$inlinecss .= 'background-color: ' . esc_attr( $btncol['hbg'] ) . '; ';
		if ( $btngrad ) {
			$inlinecss .= 'background: linear-gradient(' . esc_attr( $hgraddir ) . ', ' . esc_attr( $hfcolor ) . ', ' . esc_attr( $hscolor ) . '); }';
		}
		// Social icons
		$inlinecss .= '.wp-block-social-links.is-style-dfu-busacc-theme-social-icons-theme-button .wp-social-link { ';
		$inlinecss .= 'background: ' . esc_attr( $btncol['bg'] ) . '; ';
		if ( $btngrad ) {
			$inlinecss .= 'background: linear-gradient(' . esc_attr( $graddir ) . ', ' . esc_attr( $fcolor ) . ', ' . esc_attr( $scolor ) . '); }';
		}
	

		/* Typography */
		$defaultfont = get_theme_mod( 'dba_default_font', dfu_busacc_fn_get_font_defaults( 'default', $greys ) );
		$h1font = get_theme_mod( 'dba_h1_font', dfu_busacc_fn_get_font_defaults( 'h1', $greys ) );
		$h2font = get_theme_mod( 'dba_h2_font', dfu_busacc_fn_get_font_defaults( 'h2', $greys ) );
		$h3font = get_theme_mod( 'dba_h3_font', dfu_busacc_fn_get_font_defaults( 'h3', $greys ) );
		$h4font = get_theme_mod( 'dba_h4_font', dfu_busacc_fn_get_font_defaults( 'h4', $greys ) );
		$h5font = get_theme_mod( 'dba_h5_font', dfu_busacc_fn_get_font_defaults( 'h5', $greys ) );
		$h6font = get_theme_mod( 'dba_h6_font', dfu_busacc_fn_get_font_defaults( 'h6', $greys ) );

		$inlinecss .= '.editor-styles-wrapper { ';
		$inlinecss .= dfu_busacc_fn_get_typography_var_css( 'default', $defaultfont ); 
		$inlinecss .= dfu_busacc_fn_get_typography_var_css( 'h1', $h1font ); 
		$inlinecss .= dfu_busacc_fn_get_typography_var_css( 'h2', $h2font ); 
		$inlinecss .= dfu_busacc_fn_get_typography_var_css( 'h3', $h3font ); 
		$inlinecss .= dfu_busacc_fn_get_typography_var_css( 'h4', $h4font ); 
		$inlinecss .= dfu_busacc_fn_get_typography_var_css( 'h5', $h5font ); 
		$inlinecss .= dfu_busacc_fn_get_typography_var_css( 'h6', $h6font ); 
		$inlinecss .= dfu_busacc_fn_get_var_css( '--color-primary1', $pri );
		$inlinecss .= dfu_busacc_fn_get_var_css( '--color-secondary1', $sec );
		$inlinecss .= dfu_busacc_fn_get_var_css( '--color-secondary2', $sec2 );
		$inlinecss .= dfu_busacc_fn_get_var_css( '--color-white1', $greys['col1'] );
		$inlinecss .= dfu_busacc_fn_get_var_css( '--color-grey2', $greys['col6'] );
		$inlinecss .= dfu_busacc_fn_get_var_css( '--color-grey-dark1', $greys['col7'] );
		$inlinecss .= dfu_busacc_fn_get_var_css( '--min-height', get_theme_mod( 'dba_ctrl_height', '2.5' ) . 'rem' );
		$inlinecss .= dfu_busacc_fn_get_var_css( '--border-radius', get_theme_mod( 'dba_ctrl_border_radius', '0' ) . 'rem' );
		$inlinecss .= '}';

		// WooCommerce
		if ( class_exists( 'woocommerce' ) ) {
			// Product price
			$wcdefault = array(
				'ptxt'   => '#0088cc',
				'msg'    => '#0f834d',
				'info'   => '#1e73be',
				'error'  => '#e2401c',
			);
			$wcmisccolors = get_theme_mod( 'dba_wc_misc_colors', $wcdefault );
			$pricecolor = $wcmisccolors['ptxt'];
			$inlinecss .= '.wc-block-grid__product-price.price { color: ' . esc_attr( $pricecolor ) . '; } ';

			$prodtitlefont = get_theme_mod( 'dba_wc_product_title_font', dfu_busacc_fn_get_font_defaults( 'wcprocttitle', $greys ) ); // Product title
			// Sale tag
			$wcsaledefault = array(
				'text'   => '#f0f1f2',
				'bg'     => '#0088cc',
			);
			$stagcolors = get_theme_mod( 'dba_wc_sale_color', $wcsaledefault );
			$stagtxt = $stagcolors['text'];
			$stagbg = $stagcolors['bg'];
			$stagbgdark = dfu_busacc_fn_hextint( $stagbg, 0.5, 's', 1 );

			$stagborderwidth = get_theme_mod( 'dba_wc_sale_border' );
			$stagborderradius = get_theme_mod( 'dba_wc_sale_border_radius' );
			$stagborder = get_theme_mod( 'dba_wc_sale_border_color', '#0088cc' );
			$stagbggrad = get_theme_mod( 'dba_wc_sale_tag_gradient', false );
			$stagstyle = get_theme_mod( 'dba_wc_sale_tag_style', 'onsale' );
			if ( 'onsale' == $stagstyle ) {
				// Shop
				$inlinecss .= '.wc-block-grid__product-onsale { ';
				$inlinecss .= 'background-color: var(--wc-sale-background1); ';
				if ( $stagbggrad ) {
					$inlinecss .= 'background: linear-gradient(to right, var(--wc-sale-background1) 0%, var(--wc-sale-background2) 100%); ';
				}
				if ( $stagborderwidth && '0' !== $stagborderwidth ) {
					$inlinecss .= 'border: ' . esc_attr( $stagborderwidth ) . 'px solid ' . esc_attr( $stagborder ) . '; ';
				}
				$inlinecss .= 'border-radius: ' . esc_attr( $stagborderradius ) . '%; ';
				$inlinecss .= '} ';
			}

			$inlinecss .= '.editor-styles-wrapper { ';
			$inlinecss .= dfu_busacc_fn_get_var_css( '--wc-product-title-color', $prodtitlefont['color'] );
			$inlinecss .= dfu_busacc_fn_get_var_css( '--wc-sale-text', $stagtxt );
			$inlinecss .= dfu_busacc_fn_get_var_css( '--wc-sale-background1', $stagbg );
			$inlinecss .= dfu_busacc_fn_get_var_css( '--wc-sale-background2', $stagbgdark );
			$inlinecss .= dfu_busacc_fn_get_var_css( '--wc-sale-border', $stagborder );
			$inlinecss .= '}';
		}

		wp_add_inline_style( 'dfuba-gutenberg', $inlinecss );
	}
}
add_action( 'enqueue_block_editor_assets', 'dfu_busacc_fn_enqueue_gblock' );

/**
 * Return typography css for variables
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_typography_var_css' ) ) {
	function dfu_busacc_fn_get_typography_var_css( $element, $value ) {
		$css = '';
		if ( $value ) {
			/* font size */
			if ( $value['font-size'] ) {
				$css .= '--' . $element . '-font-size: ' . esc_attr( $value['font-size'] ) . ';';
			}
			/* font color */
			if ( $value['color'] ) {
				$css .= '--' . $element . '-font-color: ' . esc_attr( $value['color'] ) . ';';
			}
			/* font style & font weight */
			if ( $value['variant'] ) {
				$variant = $value['variant'];
				$css .= '--' . $element . '-font-style: ' . dfu_busacc_fn_get_font_variant( $variant, 's' ) . '; ';
				$css .= '--' . $element . '-font-weight: ' . dfu_busacc_fn_get_font_variant( $variant, 'w' ) . '; ';
			}

			/* line height */
			if ( $value['line-height'] ) {
				$css .= '--' . $element . '-line-height: ' . esc_attr( $value['line-height'] ) . ';';
			}
			/* letter spacing */
			if ( $value['letter-spacing'] ) {
				$css .= '--' . $element . '-letter-spacing: ' . esc_attr( $value['letter-spacing'] ) . ';';
			}
			/* text-align */
			if ( $value['text-align'] ) {
				$css .= '--' . $element . '-text-align: ' . esc_attr( $value['text-align'] ) . ';';
			}
			/* text-transform */
			if ( $value['text-transform'] ) {
				$css .= '--' . $element . '-text-transform: ' . esc_attr( $value['text-transform'] ) . ';';
			}
		}
		return $css;
	}
}

/**
 * Return value from font variant
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_font_variant' ) ) {
	function dfu_busacc_fn_get_font_variant( $variant, $type ) {
		if ( 's' == $type ) { // font-style
			if ( 'regular' == $variant ) {
				$val = 'normal';
			} elseif ( 'italic' == $variant ) {
				$val = 'italic';
			} elseif ( is_numeric( $variant ) ) {
				$val = 'normal';
			} else {
				$val = esc_attr( substr( $variant, 3 ) );
			}
		} else { // font-weight
			if ( 'regular' == $variant ) {
				$val = 'normal';
			} elseif ( 'italic' == $variant ) {
				$val = 'normal';
			} elseif ( is_numeric( $variant ) ) {
				$val = $variant;
			} else {
				$val = esc_attr( substr( $variant, 0, 3 ) );
			}
		}
		return $val;
	}
}

/**
 * Return css for variables
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_var_css' ) ) {
	function dfu_busacc_fn_get_var_css( $var, $value ) {
		if ( $value ) {
			return $var . ': ' . esc_attr( $value ) . ';';
		} else {
			return '';
		}
	}
}

/**
 * Return an alternate title, without prefix, for every type used in the get_the_archive_title().
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_archive_title' ) ) {
	function dfu_busacc_fn_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = get_the_author();
		} elseif ( is_year() ) {
			$title = get_the_date( _x( 'Y', 'yearly archives date format', 'dfu-busacc' ) );
		} elseif ( is_month() ) {
			$title = get_the_date( _x( 'F Y', 'monthly archives date format', 'dfu-busacc' ) );
		} elseif ( is_day() ) {
			$title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'dfu-busacc' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'dfu-busacc' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'dfu-busacc' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} else {
			$title = __( 'Archives', 'dfu-busacc' );
		}
		return $title;
	}
}
add_filter( 'get_the_archive_title', 'dfu_busacc_fn_archive_title' );

/**
 * Enable shortcode in menu
********************************************************************************************************************************************/
add_filter( 'wp_nav_menu_items', 'do_shortcode' );

/**
 * Filter the CSS class for a nav menu based on a condition.
 *
 * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
 * @param object $item    The current menu item.
 * @return array (maybe) modified nav menu class.
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_add_nav_class' ) ) {
	function dfu_busacc_fn_add_nav_class( $classes, $item, $args ) {
		if ( 'footer-menu' === $args->theme_location ) {
			$classes[] = 'list-inline-item';
			if ( in_array( 'current-menu-item', $classes ) ) {
				$classes[] = 'active ';
			}
		}
		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'dfu_busacc_fn_add_nav_class', 10, 3 );

/**
 * 'Read more' link to post
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_excerpt_readmore' ) ) {
	function dfu_busacc_fn_excerpt_readmore( $more ) {
		if ( is_admin() ) {
			return $more;
		} else {
			return sprintf( ' ... <div class="dba-readmore"><a href="%1$s">%2$s</a></div>', esc_url( get_permalink( get_the_ID() ) ), __( 'Read More', 'dfu-busacc' ) );
		}
	}
}
add_filter( 'excerpt_more', 'dfu_busacc_fn_excerpt_readmore' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_body_classes' ) ) {
	function dfu_busacc_fn_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
		return $classes;
	}
}
add_filter( 'body_class', 'dfu_busacc_fn_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_pingback_header' ) ) {
	function dfu_busacc_fn_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
add_action( 'wp_head', 'dfu_busacc_fn_pingback_header' );

/**
 * Customizer additions
 *******************************************************************************************************************************************/
require_once get_template_directory() . '/class/tgm/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/theme-options/class-dbabusacc-kirki.php';
require get_template_directory() . '/inc/theme-options/class-dba-customiser-controls.php';
require get_template_directory() . '/inc/theme-options/kirki-options.php';
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/theme-options/kirki-wc-options.php';
}
/* Theme CSS from customiser */
require get_template_directory() . '/inc/theme-css.php';
add_action( 'wp_head', 'dfu_busacc_fn_custom_css' );
require get_template_directory() . '/inc/customizer.php';
do_action( 'dfu_busacc_a_add_options' ); // add additional Kirki options

/**
 * Required php files
 *******************************************************************************************************************************************/
require_once get_template_directory() . '/class/nav/class-bootstrap4-navwalker.php'; // Register Bootstrap 4 Navigation Walker
require get_template_directory() . '/inc/theme-cpt.php'; // Custom post types
require get_template_directory() . '/inc/theme-admin.php'; // Theme setup functions in admin
require get_template_directory() . '/inc/theme-functions.php';
require get_template_directory() . '/inc/theme-responsive.php';
require get_template_directory() . '/inc/theme-utilities.php';
require get_template_directory() . '/inc/blocks/block-styles.php';	// Block Styles.
require get_template_directory() . '/inc/blocks/block-patterns.php';	// Block Patterns.

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php'; // Load Jetpack compatibility file.
}
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/theme-wc.php'; // Load WooCommerce compatibility file.
}

/**
 * Register the recommended plugins for theme
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_register_recommended_plugins' ) ) {
	function dfu_busacc_fn_register_recommended_plugins() {
		$plugins = array(
			array(
				'name'        => __( 'Advanced custom fields (for theme custom fields)', 'dfu-busacc' ),
				'slug'        => 'advanced-custom-fields',
				'is_callable' => 'acf',
				'required'    => false,
			),
			array(
				'name'        => __( 'Kirki Customizer Framework (for theme options in customiser)', 'dfu-busacc' ),
				'slug'        => 'kirki',
				'required'    => false,
			),
			array(
				'name'        => __( 'Max Mega Menu (for mega menu)', 'dfu-busacc' ),
				'slug'        => 'megamenu',
				'required'    => false,
			),
			array(
				'name'        => __( 'WooCommerce (for E-commerce)', 'dfu-busacc' ),
				'slug'        => 'woocommerce',
				'required'    => false,
			),
		);

		$config = array(
			'id'            => 'dfu-busacc', // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path'  => '', // Default absolute path to bundled plugins.
			'menu'          => 'tgmpa-install-plugins', // Menu slug.
			'capability'	=> 'edit_theme_options',
			'has_notices'   => true, // Show admin notices or not.
			'dismissable'   => true, // If false, a user cannot dismiss the nag message.
			'dismiss_msg'   => '', // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic'  => false, // Automatically activate plugins after installation or not.
			'message'       => '', // Message to output right before the plugins table.
		);
		tgmpa( $plugins, $config );
	}
}
add_action( 'tgmpa_register', 'dfu_busacc_fn_register_recommended_plugins' );

/**
 * Unhide custom fields when using ACF
 *******************************************************************************************************************************************/
//add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );

/**
 * Disable ACF on Frontend
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_disable_acf_on_frontend' ) ) {
	function dfu_busacc_fn_disable_acf_on_frontend( $plugins ) {
		if ( is_admin() ) {
			return $plugins;
		}
		foreach ( $plugins as $i => $plugin ) {
			if ( 'advanced-custom-fields-pro/acf.php' == $plugin ) {
				unset( $plugins[ $i ] );
			}
		}
		return $plugins;
	}
}
add_filter( 'option_active_plugins', 'dfu_busacc_fn_disable_acf_on_frontend' );

/**
 * Action on theme upgrade completion
 *******************************************************************************************************************************************/
// add_action( 'upgrader_process_complete', 'dfu_busacc_fn_upgrade_complete', 10, 2 );
// function dfu_busacc_fn_upgrade_complete( $wp_upgrader, $hook_extra ){
// 	if ( 'update' == $hook_extra['action'] && 'theme' == $hook_extra['type'] ) {
// 		// upgrade from 1.0.10 to 1.0.11
// 		$wc_prod_per_row = get_theme_mod( 'dba_wc_max_prod_row', 3 );
// 		set_theme_mod( 'woocommerce_catalog_columns', $wc_prod_per_row );
// 		$wc_prod_per_page = get_theme_mod( 'dba_wc_max_prod_page', 12 );
// 		$wc_catalog_row = ceil( $wc_prod_per_page / $wc_prod_per_row );
// 		set_theme_mod( 'woocommerce_catalog_rows', $wc_catalog_row );
// 	}
// }
<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package DFU_Business_Accelerator
 *******************************************************************************************************************************************/

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_setup' ) ) {
	function dfu_busacc_fn_wc_setup() {
		add_theme_support( 'woocommerce', array( 'product_grid' => array(
																	'default_rows'    => 12,
																	'min_rows'        => 1,
																	'max_rows'        => 24,
																	'default_columns' => 3,
																	'min_columns'     => 1,
																	'max_columns'     => 6,
        														) ) );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'after_setup_theme', 'dfu_busacc_fn_wc_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_scripts' ) ) {
	function dfu_busacc_fn_wc_scripts() {
		wp_enqueue_style( 'dfuba-wc-style', get_template_directory_uri() . '/inc/css/theme-wcstyle.min.css', array( 'dfuba-theme-style' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), 'all' );

		// Block Sale tag styles
		$tagstyle = get_theme_mod( 'dba_wc_sale_tag_style', 'onsale' );
		switch ( $tagstyle ) {
			case 'onsale':
				wp_enqueue_style( 'dfuba-wc-saletag-style', get_template_directory_uri() . '/inc/css/theme-wc-sale0.min.css', array( 'dfuba-wc-style' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), 'all' );
				break;
			case 'sale-tag1':
				wp_enqueue_style( 'dfuba-wc-saletag-style', get_template_directory_uri() . '/inc/css/theme-wc-sale1.min.css', array( 'dfuba-wc-style' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), 'all' );
				break;
			case 'sale-tag2':
				wp_enqueue_style( 'dfuba-wc-saletag-style', get_template_directory_uri() . '/inc/css/theme-wc-sale2.min.css', array( 'dfuba-wc-style' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), 'all' );
				break;
			case 'sale-tag3':
				wp_enqueue_style( 'dfuba-wc-saletag-style', get_template_directory_uri() . '/inc/css/theme-wc-sale3.min.css', array( 'dfuba-wc-style' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), 'all' );
				break;
			case 'sale-tag4':
				wp_enqueue_style( 'dfuba-wc-saletag-style', get_template_directory_uri() . '/inc/css/theme-wc-sale4.min.css', array( 'dfuba-wc-style' ), ( is_child_theme() ? wp_get_theme()->parent()->get( 'Version' ) : wp_get_theme()->get( 'Version' ) ), 'all' );
				break;
		}
	}
}
add_action( 'wp_enqueue_scripts', 'dfu_busacc_fn_wc_scripts' );

if ( ! function_exists( 'dfu_busacc_fn_wc_widgets_init' ) ) {
	function dfu_busacc_fn_wc_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'WooCommerce before shop (WC top bar)', 'dfu-busacc' ),
				'id'            => 'dba-wc-b4-content-sidebar',
				'description'   => esc_html__( 'Add widgets in WC top bar in addition to what is set in Customiser > WooCommerce > Product Catalogue.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'WooCommerce after shop (WC bottom bar)', 'dfu-busacc' ),
				'id'            => 'dba-wc-aft-content-sidebar',
				'description'   => esc_html__( 'Add widgets in WC bottom bar in addition to what is set in Customiser > WooCommerce > Product Catalogue.', 'dfu-busacc' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'WooCommerce below WC top bar', 'dfu-busacc' ),
				'id'            => 'dba-wc-b4-prod-catalog-widgets',
				'description'   => esc_html__( '&#39;Show widget before product listing&#39; in Customiser &#62; WooCommerce &#62; Product Catalogue must be enabled to show widgets added here.', 'dfu-busacc' ),
				'before_widget' => '<div id="%1$s" class="col-auto dba-wc-shop-widget widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="dba-widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'dfu_busacc_fn_wc_widgets_init' );

/**
 * Add 'woocommerce-active' class to the body tag.
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_active_body_class' ) ) {
	function dfu_busacc_fn_wc_active_body_class( $classes ) {
		$classes[] = 'woocommerce-active';

		return $classes;
	}
}
add_filter( 'body_class', 'dfu_busacc_fn_wc_active_body_class' );

/**
 * WooCommrce breadcrumb
 *******************************************************************************************************************************************/
$dfu_busacc_showbreadcrumb = get_theme_mod( 'dba_wc_breadcrumb', false );
if ( $dfu_busacc_showbreadcrumb ) {
	add_filter( 'woocommerce_breadcrumb_defaults', 'dfu_busacc_fn_wc_breadcrumb_sep' );
	if ( ! function_exists( 'dfu_busacc_fn_wc_breadcrumb_sep' ) ) {
		function dfu_busacc_fn_wc_breadcrumb_sep( $defaults ) {
			$arrow = get_theme_mod( 'dba_wc_breadcrumb_sep' );
			switch ( $arrow ) {
				case 's1':
					$sym = '&rarr;';
					break;
				case 's2':
					$sym = '&rArr;';
					break;
				case 's3':
					$sym = '&#10511;';
					break;
				case 's4':
					$sym = '&#8680;';
					break;
				case 's5':
					$sym = '&#8702;';
					break;
				case 's6':
					$sym = '&raquo;';
					break;
				case 's7':
					$sym = '&#10139;';
					break;
				case 's8':
					$sym = '&#10144;';
					break;
				case 's9':
					$sym = '&#129178;';
					break;
				case 's10':
					$sym = '&#129082;';
					break;
			}
			$defaults['delimiter'] = ' ' . ( '' == $sym ? '&rarr;' : $sym ) . ' ';
			return $defaults;
		}
	}
} else {
	add_action( 'init', 'dfu_busacc_fn_wc_remove_breadcrumbs' );
	if ( ! function_exists( 'dfu_busacc_fn_wc_remove_breadcrumbs' ) ) {
		function dfu_busacc_fn_wc_remove_breadcrumbs() {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		}
	}
}

/**
 * Products per page.
 * @return integer number of products.
 *******************************************************************************************************************************************/
// if ( ! function_exists( 'dfu_busacc_fn_wc_products_per_page' ) ) {
// 	function dfu_busacc_fn_wc_products_per_page() {
// 		$cols = get_theme_mod( 'dba_wc_max_prod_page', '12' );
// 		if ( is_numeric( $cols ) && dfu_busacc_fn_check_range( $cols, 2, 48 ) ) {
// 			return $cols;
// 		}
// 	}
// }
// add_filter( 'loop_shop_per_page', 'dfu_busacc_fn_wc_products_per_page' );

/**
 * Default loop columns on product archives.
 * @return integer products per row.
 *******************************************************************************************************************************************/
// if ( ! function_exists( 'dfu_busacc_fn_wc_products_per_row' ) ) {
// 	function dfu_busacc_fn_wc_products_per_row() {
// 		$prods = get_theme_mod( 'dba_wc_max_prod_row', '3' );
// 		if ( is_numeric( $prods ) && dfu_busacc_fn_check_range( $prods, 2, 4 ) ) {
// 			return $prods;
// 		}
// 	}
// }
// add_filter( 'loop_shop_columns', 'dfu_busacc_fn_wc_products_per_row' );

/**
 * Product gallery thumnbail columns.
 * @return integer number of columns.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_thumbnail_columns' ) ) {
	function dfu_busacc_fn_wc_thumbnail_columns() {
		$thumbnails = get_theme_mod( 'dba_wc_sglprod_thumbnail_row', '3' );
		if ( is_numeric( $thumbnails ) && dfu_busacc_fn_check_range( $thumbnails, 3, 5 ) ) {
			return $thumbnails;
		}
	}
}
add_filter( 'woocommerce_product_thumbnails_columns', 'dfu_busacc_fn_wc_thumbnail_columns' );

/**
 * Related Products Args.
 * @param array $args related products args.
 * @return array $args related products args.
 *******************************************************************************************************************************************/
if ( false == get_theme_mod( 'dba_wc_sglprod_relatedprod', 'false' ) ) {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
} else {
	if ( ! function_exists( 'dfu_busacc_fn_wc_related_products_args' ) ) {
		function dfu_busacc_fn_wc_related_products_args( $args ) {
			$arg1 = get_theme_mod( 'dba_wc_sglprod_relprod_page', '3' );
			$arg2 = get_theme_mod( 'dba_wc_sglprod_relprod_max_prod_row', '3' );
			if ( is_numeric( $arg1 ) && dfu_busacc_fn_check_range( $arg1, 1, 18 ) ) {
				$args['posts_per_page'] = $arg1;
			}
			if ( is_numeric( $arg2 ) && dfu_busacc_fn_check_range( $arg2, 1, 6 ) ) {
				$args['columns'] = $arg2;
			}
			$defaults = array(
				'posts_per_page' => 3,
				'columns'        => 3,
			);
			$args = wp_parse_args( $args, $defaults );
			return $args;
		}
	}
	add_filter( 'woocommerce_output_related_products_args', 'dfu_busacc_fn_wc_related_products_args' );
}

/**
 * Change number of upsell products on product page
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_upsell_per_page' ) ) {
	function dfu_busacc_fn_wc_upsell_per_page( $args ) {
		$upsellpage = get_theme_mod( 'dba_wc_sglprod_upsprod_page', '3' );
		if ( is_numeric( $upsellpage ) && dfu_busacc_fn_check_range( $upsellpage, 1, 18 ) ) {
			return $upsellpage;
		}
	}
}
add_filter( 'woocommerce_upsells_total', 'dfu_busacc_fn_wc_upsell_per_page' );

/**
 * Change number of upsell columns pre row on product page
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_upsell_per_row' ) ) {
	function dfu_busacc_fn_wc_upsell_per_row( $args ) {
		$upsellrow = get_theme_mod( 'dba_wc_sglprod_upsprod_max_prod_row', '3' );
		if ( is_numeric( $upsellrow ) && dfu_busacc_fn_check_range( $upsellrow, 1, 6 ) ) {
			return $upsellrow;
		}
	}
}
add_filter( 'woocommerce_upsells_columns', 'dfu_busacc_fn_wc_upsell_per_row' );

/**
 * Cross sell position
 *******************************************************************************************************************************************/
$dfu_busacc_xsellpos = get_theme_mod( 'dba_wc_cart_xsell_pos', 'default' );
if ( 'default' != $dfu_busacc_xsellpos ) {
	// Remove cross sells from default position
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

	// Add back cross sells
	if ( 'undercarttbl' == $dfu_busacc_xsellpos ) {
		add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
	} elseif ( 'aftercart' == $dfu_busacc_xsellpos ) {
		add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
	}
}

/**
 * Change number of cross sell products on cart page
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_xsell_per_page' ) ) {
	function dfu_busacc_fn_wc_xsell_per_page( $args ) {
		$xsellpage = get_theme_mod( 'dba_wc_cart_xsellprod_page', '2' );
		if ( is_numeric( $xsellpage ) && dfu_busacc_fn_check_range( $xsellpage, 1, 18 ) ) {
			return $xsellpage;
		}
	}
}
add_filter( 'woocommerce_cross_sells_total', 'dfu_busacc_fn_wc_xsell_per_page' );

/**
 * Change number of cross sell columns on cart page
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_xsell_cols' ) ) {
	function dfu_busacc_fn_wc_xsell_cols( $args ) {
		$xsellpos = get_theme_mod( 'dba_wc_cart_xsell_pos', 'default' );
		if ( 'default' != $xsellpos ) {
			$xsellrow = get_theme_mod( 'dba_wc_cart_xsellprod_max_prod_row', '3' );
		} else {
			$xsellrow = 2;
		}
		if ( is_numeric( $xsellrow ) && dfu_busacc_fn_check_range( $xsellrow, 1, 6 ) ) {
			return $xsellrow;
		}
	}
}
add_filter( 'woocommerce_cross_sells_columns', 'dfu_busacc_fn_wc_xsell_cols' );

/**
 * Remove default WooCommerce wrapper.
 *******************************************************************************************************************************************/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Before Content.
 * Wraps all WooCommerce content in wrappers which match the theme markup.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_wrapper_before' ) ) {
	function dfu_busacc_fn_wc_wrapper_before() {
	?>
		<div class="container py-4">
			<div class="row py-4 dba-main-content">
			<?php
			$sidebar = '';
			$sidebarpos = '';
			$sidebarwidth = '';
			if ( is_product() ) {
				$sidebar = get_theme_mod( 'dba_wc_product_sidebar' );
			} elseif ( is_product_category() || is_product_tag() ) {
				$sidebar = get_theme_mod( 'dba_wc_prodcat_sidebar' );
			} elseif ( is_shop() ) {
				$sidebar = get_theme_mod( 'dba_wc_shop_sidebar' );
			}
			$sidebarpos = get_theme_mod( 'dba_wc_sidebar_pos' );
			$sidebarwidth = get_theme_mod( 'dba_wc_sidebar_width', '3' );
			$contentwidth = 12 - intval( $sidebarwidth );
			if ( 'left' == $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) && ! empty( $sidebarwidth ) ) {
				dfu_busacc_fn_display_sidebar( $sidebar, $sidebarwidth );
			}

			if ( ! is_active_sidebar( $sidebar ) ) {
			?>
				<div id="primary" class="col-md-12 content-area">
			<?php
			} else {
			?>
				<div id="primary" class="col-md-<?php echo esc_attr( $contentwidth ); ?> content-area">
			<?php
			}
			?>
					<main id="main" class="site-main">
					<section id="dba-woocommerce">
	<?php
	}
}
add_action( 'woocommerce_before_main_content', 'dfu_busacc_fn_wc_wrapper_before' );

/**
 * After Content.
 * Closes the wrapping divs.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_wrapper_after' ) ) {
	function dfu_busacc_fn_wc_wrapper_after() {
	?>
					</section><!-- dba-woocommerce -->
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php
				$sidebar = '';
				$sidebarpos = '';
				$sidebarwidth = '';
				if ( is_product() ) {
					$sidebar = get_theme_mod( 'dba_wc_product_sidebar' );
				} elseif ( is_product_category() || is_product_tag() ) {
					$sidebar = get_theme_mod( 'dba_wc_prodcat_sidebar' );
				} elseif ( is_shop() ) {
						$sidebar = get_theme_mod( 'dba_wc_shop_sidebar' );
				}
				$sidebarpos = get_theme_mod( 'dba_wc_sidebar_pos' );
				$sidebarwidth = get_theme_mod( 'dba_wc_sidebar_width', '3' );
				if ( 'right' == $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) && ! empty( $sidebarwidth ) ) {
					dfu_busacc_fn_display_sidebar( $sidebar, $sidebarwidth );
				}
				?>
			</div><!-- row -->
		</div><!-- container -->
	<?php
	}
}
add_action( 'woocommerce_after_main_content', 'dfu_busacc_fn_wc_wrapper_after' );

/**
 * Before shop loop
 *******************************************************************************************************************************************/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
if ( ! function_exists( 'dfu_busacc_fn_b4_shop_loop' ) ) {
	function dfu_busacc_fn_b4_shop_loop() {
	?>
		<section id="dba-before-shop">
			<div class="dba-before-shop-wrapper">
				<div class="row align-items-center pb-4 dba-wc-topbar">
					<?php dfu_busacc_fn_show_hide_b4_aft_shop_options( 'top' ); ?>
				</div><!-- row -->
			</div>

			<?php 
			$wc_show_widget = get_theme_mod( 'dba_wc_show_widget_b4_prod_catalog', false );
			if ( true == $wc_show_widget ) {
			?>
				<div class="dba-wc-b4-prod-catalog-widgets-wrapper">
					<?php 
					$wc_show_btn = get_theme_mod( 'dba_wc_show_collapsible_button', false );
					if ( true == $wc_show_btn ) { 
						$wc_show_widget_on_open = get_theme_mod('dba_wc_show_widget_on_open', true);
						$wc_widget_showhide = ( $wc_show_widget_on_open && $wc_show_widget_on_open == true ) ? 'show' : '';
						?>
						<div class="collapse <?php echo esc_attr( $wc_widget_showhide ); ?>" id="dba-wc-b4-shop-widgets">
							<div class="row dba-wc-shop-widgets">
									<?php dynamic_sidebar( 'dba-wc-b4-prod-catalog-widgets' ); ?>
							</div><!-- dba-wc-shop-widgets -->
						</div>	
					<?php 
					} else { ?>
							<?php dynamic_sidebar( 'dba-wc-b4-prod-catalog-widgets' ); ?>
					<?php
					} ?>

				</div><!--dba-wc-b4-prod-catalog-widgets-wrapper-->
			<?php 
			} ?>

		</section>
	<?php
	}
}
add_action( 'woocommerce_before_shop_loop', 'dfu_busacc_fn_b4_shop_loop', 20 );

/**
 * After shop loop
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_aft_shop_loop' ) ) {
	function dfu_busacc_fn_aft_shop_loop() {
	?>
		<section id="dba-after-shop">
			<div class="row align-items-center pt-4 dba-wc-btmbar">
				<?php dfu_busacc_fn_show_hide_b4_aft_shop_options( 'btm' ); ?>
			</div><!-- row -->
		</section>
	<?php
	}
}
add_action( 'woocommerce_after_shop_loop', 'dfu_busacc_fn_aft_shop_loop', 20 );

if ( ! function_exists( 'dfu_busacc_fn_show_hide_b4_aft_shop_options' ) ) {
	function dfu_busacc_fn_show_hide_b4_aft_shop_options( $pos ) {
		$showsort = get_theme_mod( 'dba_wc_shop_show_sort', 'top' );
		$showsearch = get_theme_mod( 'dba_wc_shop_show_search', 'top' );
		$resultpos = get_theme_mod( 'dba_wc_shop_show_count', 'btm' );
		$showpaging = get_theme_mod( 'dba_wc_shop_show_page', 'top' );
		$prodview = get_theme_mod( 'dba_wc_prod_view', 'original' );
		if ( $pos == $showsearch || 'both' == $showsearch ) {
		?>
			<div class="col-auto dba-wc-<?php echo esc_attr( $pos ); ?>bar-item">
				<?php get_product_search_form(); ?>
			</div>
		<?php
		}

		if ( $pos == $showsort || 'both' == $showsort ) {
		?>
			<div class="col-auto dba-wc-<?php echo esc_attr( $pos ); ?>bar-item">
				<?php woocommerce_catalog_ordering(); ?>
			</div>
		<?php
		}

		if ( 'top' == $pos ) {
			do_action( 'dfu_busacc_a_before_shop' );
		} else {
			do_action( 'dfu_busacc_a_after_shop' );
		}
		?>

		<div class="col-auto dba-wc-<?php echo esc_attr( $pos ); ?>bar-item">
			<?php
			if ( 'top' == $pos ) {
				$wcwidget = 'dba-wc-b4-content-sidebar';
			} else {
				$wcwidget = 'dba-wc-aft-content-sidebar';
			}
			if ( is_active_sidebar( $wcwidget ) ) {
				dynamic_sidebar( $wcwidget );
			}
			?>
		</div>

		<?php
		if ( $pos == $resultpos || 'both' == $resultpos ) {
			
		?>
			<div class="col-auto ml-sm-auto dba-wc-<?php echo esc_attr( $pos ); ?>bar-item">
				<?php woocommerce_result_count(); ?>
			</div>
		<?php
		} 

		if ( $pos == $showpaging || 'both' == $showpaging ) {
		?>
			<div class="col-auto<?php echo ( ( $pos == $resultpos || 'both' == $resultpos ) ? '' : ' ml-sm-auto' ); ?> dba-wc-<?php echo esc_attr( $pos ); ?>bar-item">
				<?php woocommerce_pagination(); ?>
			</div>
		<?php
		}

		if ( 'top' == $pos ) {
			$wc_show_widget = get_theme_mod( 'dba_wc_show_widget_b4_prod_catalog', false );
			if ( true === $wc_show_widget ) {
				$wc_show_btn = get_theme_mod( 'dba_wc_show_collapsible_button', false );
				if ( true == $wc_show_btn ) {
					$wc_colbtn_txt = get_theme_mod( 'dba_wc_collapsible_btn_text', 'Filters' );
					$wc_show_widget_on_open = get_theme_mod('dba_wc_show_widget_on_open', true);
					$wc_widget_expanded = ( $wc_show_widget_on_open && $wc_show_widget_on_open == true ) ? 'true' : 'false';
					$wc_show_tooltip = get_theme_mod( 'dba_wc_show_button_tooltip', false );
					if ( true == $wc_show_tooltip ) {
						$wc_tooltip_txt = get_theme_mod( 'dba_wc_collapsible_btn_tooltip', 'Expand/collapse Filters' );
					} ?>
					<div class="col-auto">
						<?php if ( $wc_show_tooltip ) {
							echo '<span data-toggle="tooltip" data-placement="top" id="filter-tooltip" title="' . esc_html( $wc_tooltip_txt ) . '">';
						} ?>
							<button class="btn" type="button" data-toggle="collapse" data-target="#dba-wc-b4-shop-widgets" aria-expanded="<?php echo esc_attr( $wc_widget_expanded ); ?>" aria-controls="dba-wc-b4-shop-widgets">
								<?php echo esc_html( $wc_colbtn_txt ); ?>
							</button>
						<?php if ( $wc_show_tooltip ) {
							echo '</span>';
						} ?>
					</div>
				<?php
				}
			}
		}
	}
}

/**
 * To display quantity input fields next to add to cart buttons for simple products within your shop archive pages
 *******************************************************************************************************************************************/
if ( get_theme_mod( 'dba_wc_qty_simple', false ) ) {
	if ( ! function_exists( 'dfu_busacc_fn_wc_qty_inputs' ) ) {
		function dfu_busacc_fn_wc_qty_inputs( $html, $product ) {
			if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
				$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
				$html .= woocommerce_quantity_input( array(), $product, false );
				$html .= '<button type="submit" class="button">' . esc_html( $product->add_to_cart_text() ) . '</button>';
				$html .= '</form>';
			}
			return $html;
		}
	}
	add_filter( 'woocommerce_loop_add_to_cart_link', 'dfu_busacc_fn_wc_qty_inputs', 10, 2 );
}

/**
 * Cart Fragments.
 * Ensure cart contents update when products are added to the cart via AJAX.
 *
 * @param array $fragments Fragments to refresh via AJAX.
 * @return array Fragments to refresh via AJAX.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_cart_link_fragment' ) ) {
	function dfu_busacc_fn_wc_cart_link_fragment( $fragments ) {
		$iconbgcolor = dfu_busacc_fn_footer_iconbg();
		ob_start();
		dfu_busacc_fn_wc_cart_link();
		$fragments['a.dba-wc-cart'] = ob_get_clean();

		ob_start();
		dfu_busacc_fn_wc_cart_btm_link( $iconbgcolor );
		$fragments['a.dba-wc-cart-btm'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'dfu_busacc_fn_wc_cart_link_fragment' );

/**
 * Cart Link.
 * Displayed a link to the cart including the number of items present and the cart total.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_cart_link' ) ) {
	function dfu_busacc_fn_wc_cart_link() {
		/* translators: 1: number of cart item, 2: number of cart item */
		$cart_cnt_txt = sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'dfu-busacc' ), WC()->cart->get_cart_contents_count(), 'dfu-busacc' );
		if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
			$menustyle = 'mega-menu-link';
		} else {
			$menustyle = 'nav-link';
		}
		?>
		<a class="dba-wc-cart <?php echo esc_attr( $menustyle ); ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'dfu-busacc' ); ?>">
			<?php
			if ( true == get_theme_mod( 'dba_load_fa', true ) ) {
				echo wp_kses_post( apply_filters( 'dfu_busacc_f_cart_faicon', '<i class="fas fa-shopping-cart fa-fw"></i>' ) ); 
			} else {
				echo wp_kses_post( apply_filters( 'dfu_busacc_f_cart_icon', '<span class="iconmoon-lg ico-cart"></span>' ) );
			}
			?>
		<span class="dba-wc-cart-amt"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
		<span class="dba-wc-cart-count"><?php echo '(' . esc_html( $cart_cnt_txt ) . ')'; ?></span>
		</a>
	<?php
	}
}

/**
 * Static Cart at bottom right corner
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_bottomcart' ) ) {
	function dfu_busacc_fn_wc_bottomcart( $iconbgcolor ) {
		$wcbottomcart = get_theme_mod( 'dba_wc_cart_icon_btm', false );
		$wcbottomcartmob = get_theme_mod( 'dba_wc_cart_icon_btm_mob_only', false );
		if ( true == $wcbottomcart || true == $wcbottomcartmob ) {
		?>
			<div id="dba-sticky-wc-cart" class="pt-1">
			<?php dfu_busacc_fn_wc_cart_btm_link( $iconbgcolor ); ?>
			</div>
		<?php
		}
	}
}

/**
 * Static Cart link at bottom right corner
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_cart_btm_link' ) ) {
	function dfu_busacc_fn_wc_cart_btm_link( $iconbgcolor ) {
	?>
		<a class="dba-wc-cart-btm btn rounded-circle dba-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'dfu-busacc' ); ?>">
			<?php
			if ( true == get_theme_mod( 'dba_load_fa', true ) ) {
			?>
				<i class="fas fa-shopping-cart fa-fw"></i>
			<?php
			} else {
			?>
				<span class="iconmoon-<?php echo esc_attr( $iconbgcolor ); ?> ico-cart"></span>
			<?php
			}
			?>
			<span class="sr-only"><?php esc_html_e( 'View your shopping cart', 'dfu-busacc' ); ?></span>
			<div class="dba-wc-cartno"><span class="dba-sml-icon"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span></div>
		</a>
	<?php
	}
}

/**
 * Add cart to menu navigation
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_add_cart_on_nav' ) ) {
	function dfu_busacc_fn_add_cart_on_nav( $items, $args ) {
		if ( $args->theme_location == 'main-menu' ) {
			ob_start();
			echo wp_kses_post( $items );
			$showcart = get_theme_mod( 'dba_wc_cart_on_menu' );
			if ( $showcart && true == $showcart ) {
				if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
					$menu_theme = mmm_get_theme_for_location( 'main-menu' );
					$megamenu_breakpoint = $menu_theme['responsive_breakpoint'];
					if ( empty( $megamenu_breakpoint ) ) {
						$megamenu_breakpoint = '600px';
					}
					echo '<li class="mega-menu-item dba-wc-cart-menu-item mega-menu-item-has-children mega-align-bottom-right mega-menu-flyout">';
				} else {
					echo '<li class="dba-wc-cart-menu-item">';
				}
				dfu_busacc_fn_wc_cart_link();
				if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
					echo '<ul class="mega-sub-menu">';
					echo '<li class="mega-menu-item"><div class="widget woocommerce widget_shopping_cart p-3">';
					woocommerce_mini_cart();
					echo '</div></li></ul>';
				}
				echo '</li>';
			}
			return ob_get_clean();
		} else {
			return $items;
		}
	}
}
add_filter( 'wp_nav_menu_items', 'dfu_busacc_fn_add_cart_on_nav', 10, 2 );

/**
 * Single product details styles
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_prod_accordion' ) && ( 'accordion' == get_theme_mod( 'dba_wc_sglprod_det_style', 'accordion' ) ) ) {
	function dfu_busacc_fn_wc_prod_accordion( $tabs ) {
	?>
		<div class="clearfix"></div>
		<div id="wc-prod-accordion" class="dba-wc-prod-accordion mb-5">
			<?php
			$j = 0;
			foreach ( $tabs as $key => $tab ) :
			?>
			<div class="card bg-transparent text-left">
				<div class="card-header" id="card-title-<?php echo esc_attr( $key ); ?>">
					<a class="text-uppercase<?php echo ( ( 0 !== $j ) ? ' collapsed' : '' ); ?>" role="button" data-toggle="collapse" data-target="#card-content-<?php echo esc_attr( $key ); ?>" aria-expanded="<?php echo ( ( 0 !== $j ) ? 'false' : 'true' ); ?>" aria-controls="card-content-<?php echo esc_attr( $key ); ?>">
					<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
				</div>

				<div id="card-content-<?php echo esc_attr( $key ); ?>" class="collapse<?php echo ( ( 0 !== $j ) ? '' : ' show' ); ?>" aria-labelledby="card-title-<?php echo esc_attr( $key ); ?>" data-parent="#wc-prod-accordion">
					<div class="card-body">
						<?php
						if ( isset( $tab['callback'] ) ) {
							call_user_func( $tab['callback'], $key, $tab );
						}
						?>
					</div>
				</div>
			</div><!-- card -->
			<?php
			$j++;
			endforeach;
			?>
		</div><!-- #wc-prod-accordion -->
	<?php
	}
	add_filter( 'woocommerce_product_tabs', 'dfu_busacc_fn_wc_prod_accordion', 99 );
}

if ( ! function_exists( 'dfu_busacc_fn_wc_prod_tab' ) ) {
	$dfu_busacc_style = get_theme_mod( 'dba_wc_sglprod_det_style', 'accordion' );
	if ( 'tabs' == $dfu_busacc_style || 'pills' == $dfu_busacc_style ) {
		function dfu_busacc_fn_wc_prod_tab( $tabs ) {
			$resp = get_theme_mod( 'dba_wc_sglprod_det_tabs_pills', 'md' );
			?>
			<div class="clearfix"></div>
			<ul id="wc-prod-tab" class="nav nav-<?php echo esc_attr( $dfu_busacc_style ); ?> flex-column flex-<?php echo esc_attr( $resp ); ?>-row mb-3" role="tablist">
				<?php
				$i = 0;
				foreach ( $tabs as $key => $tab ) :
				?>
					<li class="nav-item">
						<a class="nav-link<?php echo ( ( 0 == $i ) ? ' active' : '' ); ?>" id="<?php echo esc_attr( $key ); ?>-tab" data-toggle="tab" href="#tab-content-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo ( ( 0 == $i ) ? 'true' : 'false' ); ?>">
							<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</a>
					</li>
				<?php
				$i++;
				endforeach;
				?>
			</ul><!-- #wc-prod-tab -->

			<div class="tab-content mb-5" id="wc-prod-tab-content">
				<?php
				$j = 0;
				foreach ( $tabs as $key => $tab ) :
				?>
				<div class="tab-pane fade<?php echo ( ( 0 == $j ) ? ' show active' : '' ); ?>" id="tab-content-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab">
					<?php
					if ( isset( $tab['callback'] ) ) {
						call_user_func( $tab['callback'], $key, $tab );
					}
					?>
				</div>
				<?php
				$j++;
				endforeach;
				?>
			</div>

		<?php
		}
		add_filter( 'woocommerce_product_tabs', 'dfu_busacc_fn_wc_prod_tab', 99 );
	}
}

/**
 * Sale tag
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_shop_sale_badge' ) ) {
	function dfu_busacc_fn_wc_shop_sale_badge( $html, $post, $product ) {
		$tagstyle = get_theme_mod( 'dba_wc_sale_tag_style', 'onsale' );
		$saletext = get_theme_mod( 'dba_wc_sale_tag_text', __( 'Sale', 'dfu-busacc' ) );
		$html = '<span class="' . esc_attr( $tagstyle ) . '">' . esc_html( $saletext ) . '</span>';
		return $html;
	}
}
add_filter( 'woocommerce_sale_flash', 'dfu_busacc_fn_wc_shop_sale_badge', 10, 3 );

/**
 * Show additional hover image from first image in product image gallery in product listings
 *******************************************************************************************************************************************/
$dfu_busacc_addhoverimg = get_theme_mod( 'dba_wc_add_hover_img', false );
if ( $dfu_busacc_addhoverimg ) {
	add_action( 'woocommerce_shop_loop_item_title', 'dfu_busacc_fn_wc_add_hover_img', 15);
	if ( ! function_exists( 'dfu_busacc_fn_wc_add_hover_img' ) ) {
		function dfu_busacc_fn_wc_add_hover_img() {
			global $product;
			$imgids = $product->get_gallery_image_ids();
			if ( $imgids && $product->get_image_id() ) {
				// has product gallery
				echo '<div class="dba-prod-hover-img">' . wp_get_attachment_image( $imgids[0], 'woocommerce_thumbnail' ) . '</div>';
			}
		}
	}
}

/**
 * Product display - original/grid/list view
 *******************************************************************************************************************************************/
$dfu_busacc_prodview = get_theme_mod( 'dba_wc_prod_view', 'original' );
if ( 'original' !== $dfu_busacc_prodview ) {
	add_action( 'woocommerce_before_shop_loop', 'dfu_busacc_fn_wc_product_columns_wrapper', 15 );

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	add_action( 'woocommerce_before_shop_loop_item', 'dfu_busacc_fn_product_wrap_start', 9 );

	add_action( 'woocommerce_before_shop_loop_item_title', 'dfu_busacc_fn_product_image_start', 0 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open',5);
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close',10);
	add_action( 'woocommerce_before_shop_loop_item_title', 'dfu_busacc_fn_product_image_end', 10 );

	add_action( 'woocommerce_before_shop_loop_item_title', 'dfu_busacc_fn_product_content_start', 10);
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 11);
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 0 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5);
	add_action( 'woocommerce_after_shop_loop_item_title', 'dfu_busacc_fn_add_product_info', 8 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'dfu_busacc_fn_product_content_end', 20 );

	add_action( 'woocommerce_after_shop_loop_item', 'dfu_busacc_fn_product_wrap_end', 11 );
	add_action( 'woocommerce_after_shop_loop', 'dfu_busacc_fn_wc_product_columns_wrapper_close', 15 );
}

/**
 * Product columns wrapper open - woocommerce_before_shop_loop
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_product_columns_wrapper' ) ) {
	function dfu_busacc_fn_wc_product_columns_wrapper() {
		$prodview = get_theme_mod( 'dba_wc_prod_view', 'original' );
		if ( $prodview == 'grid' ) {
			echo '<div id="prod-listing-wrap" class="dba-grid-view">';
		} elseif ( $prodview == 'list' ) {
			echo '<div id="prod-listing-wrap" class="dba-list-view">';
		}
	}
}

/**
 * Product columns wrapper close - woocommerce_after_shop_loop
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_wc_product_columns_wrapper_close' ) ) {
	function dfu_busacc_fn_wc_product_columns_wrapper_close() {
		echo '</div>';
	}
}

/**
 * Product wrap start.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_product_wrap_start' ) ) {
	function dfu_busacc_fn_product_wrap_start() {
		echo '<div class="dba-product-wrap"><div class="dba-product">';
	}
}

/**
 * Product wrap close.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_product_wrap_end' ) ) {
	function dfu_busacc_fn_product_wrap_end(){
		echo '</div><!-- dba-product-wrap -->';
	}
}

/**
 * Product image wrap start.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_product_image_start' ) ) {
	function dfu_busacc_fn_product_image_start() {
		echo '<div class="dba-product-image-wrap">';
	}
}

/**
 * Product image wrap close.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_product_image_end' ) ) {
	function dfu_busacc_fn_product_image_end() {
	  	echo '</div><!-- dba-product-image-wrap -->';
	}
}

/**
 * Product content start.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_product_content_start' ) ) {
	function dfu_busacc_fn_product_content_start() {
		echo '<div class="dba-product-content">';
	}
}

/**
 * Product content close.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_product_content_end' ) ) {
	function dfu_busacc_fn_product_content_end() {
		echo '</div><!-- dba-product-content --></div><!-- dba-product -->';
	}
}

/**
 * Product info
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_add_product_info' ) ) {
	function dfu_busacc_fn_add_product_info(){
	?>
		<div class="dba-product-short-desc">
			<?php the_excerpt(); ?>
		</div>
		<?php do_action( 'dfu_busacc_a_wc_list_view_add_info' );
	}
}



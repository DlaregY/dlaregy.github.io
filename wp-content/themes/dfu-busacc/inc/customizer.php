<?php
/**
 * DFU Business Accelerator Theme Customizer
 *
 * @package DFU_Business_Accelerator
 */

/**
 * Add customiser controls
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_customize_register' ) ) {
	function dfu_busacc_fn_customize_register( $wp_customize ) {
		// Add postMessage support for site title and description for the Theme Customizer.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => 'dfu_busacc_fn_customize_partial_blogname',
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => 'dfu_busacc_fn_customize_partial_blogdescription',
			) );
		}

		$wp_customize->add_panel( 'panel_dba_options', array(
			'priority'       => 30,
			'capability'     => 'edit_theme_options',
			'title'       => esc_html__( 'Theme Setup and Options', 'dfu-busacc' ),
			'description' => esc_html__( 'This panel contains most of the options for the theme DFU Business Accelerator', 'dfu-busacc' ),
		) );

		$wp_customize->add_section( 'sect_dba_info' , array(
			'title'			=> esc_html__( 'Theme initialisation & info', 'dfu-busacc' ),
			'panel'			=> 'panel_dba_options',
			'priority'		=> 5,
		) );

		$wp_customize->add_setting( 'dba_theme_setup_info' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		if ( ! class_exists( 'Kirki' ) ) {
			$wp_customize->add_control(
				new Dfu_busacc_Custom_Info_Control (
					$wp_customize,
					'dba_theme_setup_info', 
					array(
						'label'         => esc_html__( 'Initial setup?', 'dfu-busacc' ),
						'description'   => sprintf( /* translators: 1: Link. */ wp_kses_post( __( 'Install recommended plugin listed in <a href="%s">Install DFUBA Plugins</a> to make use of the full functionalities of this theme. Theme provides initial setup with further branding options to help speed up site creation, follow steps below for initial setup.', 'dfu-busacc' ) ), esc_url( get_site_url() . '/wp-admin/themes.php?page=tgmpa-install-plugins' ) ),
						'section'	    => 'sect_dba_info',
						'priority'	    => 10,
					)
				) 
			);
		} else {
			$wp_customize->add_control(
				new Dfu_busacc_Custom_Info_Control (
					$wp_customize,
					'dba_theme_setup_info', 
					array(
						'label'         => esc_html__( 'Initial setup?', 'dfu-busacc' ),
						'description'   => sprintf( /* translators: 1: Link. */ wp_kses_post( __( 'Visit <a href="%s">DFUBA theme setup</a> for theme setup and information. Theme provides initial setup with further branding options to help speed up site creation, follow steps below for initial setup.', 'dfu-busacc' ) ), esc_url( get_site_url() . '/wp-admin/themes.php?page=reset-theme' ) ),
						'section'	    => 'sect_dba_info',
						'priority'	    => 10,
					)
				) 
			);
		}


		$wp_customize->add_setting( 'dba_theme_get_child_theme' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Info_Control (
				$wp_customize,
				'dba_theme_get_child_theme', 
				array(
					'label'         => esc_html__( 'Want to extend?', 'dfu-busacc' ),
					'description'   => sprintf( /* translators: 1: Link, 2: Link. */ wp_kses_post( __( 'Get <a href="%1$s">DFU Business Accelerator child theme</a> (free) and <a href="%2$s">DFU Business Accelerator addon plugin</a> to speed things up.', 'dfu-busacc' ) ), esc_url( 'https://designforu.com.au/product/wordpress-theme/child-theme/dfu-business-accelerator-theme-child/' ), esc_url( 'https://designforu.com.au/product/wordpress-plugin/dfu-business-accelerator-addon-plugin/' ) ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
				)
			) 
		);

		// Step 1
		$wp_customize->add_setting( 'dba_theme_step_1' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Guide_Control (
				$wp_customize,
				'dba_theme_step_1', 
				array(
					'label'         => esc_html__( '1. Set/Reset theme options', 'dfu-busacc' ),
					'description'   => esc_html__( 'This step would help to set/reset the theme to default settings.', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'   => 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_set_theme_options' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Steps_Control (
				$wp_customize,
				'dba_theme_set_theme_options', 
				array(
					'label'         => esc_html__( 'i. Set default theme options', 'dfu-busacc' ),
					'description'	=> esc_html__( 'Click "Set/reset theme options to default" to update to theme default options.', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'  	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_warn_set_theme_options' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Warning_Control (
				$wp_customize,
				'dba_theme_warn_set_theme_options', 
				array(
					'label'         => esc_html__( 'WARNING', 'dfu-busacc' ),
					'description'	=> esc_html__( 'Set theme default options would over-ride options in customiser and cannot be undone. Wait for confirmation message before customiser refresh.', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'   	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_btn_set_default' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Set_Default_Control (
				$wp_customize,
				'dba_theme_btn_set_default', 
				array(
					'label'         => esc_html__( 'Set/reset theme options to default', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'   	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_step1_set_refresh_customiser' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Steps_Control (
				$wp_customize,
				'dba_theme_step1_set_refresh_customiser', 
				array(
					'label'         => esc_html__( 'ii. Refresh customiser', 'dfu-busacc' ),
					'description' => sprintf( /* translators: 1: Link. */ wp_kses_post( __( 'Click <a href="%s">Customiser</a> or refresh browser to refresh options updated into customiser.', 'dfu-busacc' ) ), esc_url( get_site_url() . '/wp-admin/customize.php' ) ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'  	=> 'postMessage',
				)
			) 
		);

		// Step 2
		$wp_customize->add_setting( 'dba_theme_step_2' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Guide_Control (
				$wp_customize,
				'dba_theme_step_2', 
				array(
					'label'         => esc_html__( '2. Set/reset theme colour options', 'dfu-busacc' ),
					'description'   => esc_html__( 'This step is designed to help with initial colour setup based on the primary and secondary colours of your brand. It would over-ride colour options in customiser. A secondary complementary colour would be selected for you if secondary colour is left empty.', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'   => 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_pri_color' , array(
			'default'			=> '#0088cc',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'				=>'theme_mod'
		));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, // WP_Customize_Manager
				'dba_theme_pri_color', 
				array( 
					'label'			=> esc_attr__( 'i. Theme primary colour', 'dfu-busacc' ),
					'description'	=> esc_html__( 'Select primary colour for your brand', 'dfu-busacc' ),
					'section'	=> 'sect_dba_info',
					'priority'	=> 10,
				)
			)
		);

		$wp_customize->add_setting( 'dba_theme_sec_color' , array(
			'default'			=> '',
			'sanitize_callback' => 'sanitize_hex_color',
			'type'				=>'theme_mod'
		));

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, // WP_Customize_Manager
				'dba_theme_sec_color', 
				array( 
					'label'		=> esc_attr__( 'ii. Theme secondary colour', 'dfu-busacc' ),
					'description' => esc_html__( '[Optional] Select secondary colour for your brand', 'dfu-busacc' ),
					'section'	=> 'sect_dba_info',
					'priority'	=> 10,
				)
			)
		);

		$wp_customize->add_setting( 'dba_theme_publish_theme_options' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Steps_Control (
				$wp_customize,
				'dba_theme_publish_theme_options', 
				array(
					'label'			=> esc_html__( 'iii. Save options', 'dfu-busacc' ),
					'description'	=> esc_html__( 'Click "Publish" to save theme options.', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'  	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_set_theme_colors' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Steps_Control (
				$wp_customize,
				'dba_theme_set_theme_colors', 
				array(
					'label'         => esc_html__( 'iv. Set theme colours', 'dfu-busacc' ),
					'description'	=> esc_html__( 'Click "Set theme colours" to update theme colours options.', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'  	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_warn_set_theme_color_options' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Warning_Control (
				$wp_customize,
				'dba_theme_warn_set_theme_color_options', 
				array(
					'label'         => esc_html__( 'WARNING', 'dfu-busacc' ),
					'description' => esc_html__( 'Set theme colour options would over-ride options in customiser and cannot be undone. Wait for confirmation message before customiser refresh.', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'  	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_btn_set_color' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Set_Theme_Color_Control (
				$wp_customize,
				'dba_theme_btn_set_color', 
				array(
					'label'         => esc_html__( 'Set theme colours', 'dfu-busacc' ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'   	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_step2_set_refresh_customiser' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Steps_Control (
				$wp_customize,
				'dba_theme_step2_set_refresh_customiser', 
				array(
					'label'         => esc_html__( 'v. Refresh customiser', 'dfu-busacc' ),
					'description' => sprintf( /* translators: 1: Link. */ wp_kses_post( __( 'Click <a href="%s">Customiser</a> or refresh browser to refresh options updated into customiser.', 'dfu-busacc' ) ), esc_url( get_site_url() . '/wp-admin/customize.php' ) ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
					'transport'  	=> 'postMessage',
				)
			) 
		);

		$wp_customize->add_setting( 'dba_theme_theme_palette' , array(
			'default'			=> '',
			'sanitize_callback' => 'dfu_busacc_fn_sanitize_controls',
			'type'				=> 'theme_mod'
		));

		$wp_customize->add_control(
			new Dfu_busacc_Custom_Info_Control (
				$wp_customize,
				'dba_theme_theme_palette', 
				array(
					'label'         => esc_html__( 'Theme colours', 'dfu-busacc' ),
					'description'   => sprintf( /* translators: 1: Link. */ wp_kses_post( __( 'You may visit <a href="%s">DFUBA theme setup</a> to see colour palette after setting theme colours.', 'dfu-busacc' ) ), esc_url( get_site_url() . '/wp-admin/admin.php?page=reset-theme' ) ),
					'section'	    => 'sect_dba_info',
					'priority'	    => 10,
				)
			) 
		);

	}
}
add_action( 'customize_register', 'dfu_busacc_fn_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_customize_partial_blogname' ) ) {
	function dfu_busacc_fn_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_customize_partial_blogdescription' ) ) {
	function dfu_busacc_fn_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_customize_preview_js' ) ) {
	function dfu_busacc_fn_customize_preview_js() {
		wp_enqueue_script( 'dfu-busacc-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), '1.0', true );
	}
}
add_action( 'customize_preview_init', 'dfu_busacc_fn_customize_preview_js' );

/**
 * Set the customizer preview URL
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_set_preview_url' ) ) {
	function dfu_busacc_fn_set_preview_url() {
	?>
		<script type="text/javascript">
			( function( $ ) {
				$( document ).ready( function( $ ) {
					<?php if ( class_exists( 'woocommerce' ) ) { ?>
					wp.customize.section( 'sect_dba_wc_cart_page', function( section ) {
						section.expanded.bind( function( isExpanded ) {
							if ( isExpanded ) {
								wp.customize.previewer.previewUrl.set( '<?php echo esc_js( wc_get_page_permalink( 'cart' ) ); ?>' );
							}
						} );
					} );
					<?php
					} 
					
					if ( class_exists( 'woocommerce' ) ) { ?>
					wp.customize.section( 'sect_dba_wc_misc', function( section ) {
						section.expanded.bind( function( isExpanded ) {
							if ( isExpanded ) {
								wp.customize.previewer.previewUrl.set( '<?php echo esc_js( wc_get_page_permalink( 'shop' ) ); ?>' );
							}
						} );
					} );
					<?php } ?>

					wp.customize.section( 'sect_dba_blog', function( section ) {
						section.expanded.bind( function( isExpanded ) {
							if ( isExpanded ) {
								wp.customize.previewer.previewUrl.set( '<?php echo esc_js( get_permalink( get_option( 'page_for_posts' ) ) ); ?>' );
							}
						} );
					} );

				} );
			} )( jQuery );
		</script>
	<?php
	}
}
add_action( 'customize_controls_print_scripts', 'dfu_busacc_fn_set_preview_url', 30 );

/**
 * Enqueue customiser control js
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_customize_controls_js' ) ) {
	function dfu_busacc_fn_customize_controls_js() {
		wp_enqueue_script( 'dfu-busacc-customizer-control', get_template_directory_uri() . '/inc/js/customizer-controls.js', array( 'jquery' ), '1.0', true );
		wp_localize_script( 'dfu-busacc-customizer-control', 'ajax_url', array( admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action( 'customize_controls_enqueue_scripts', 'dfu_busacc_fn_customize_controls_js' );

/**
 * Set default theme options
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_theme_reset' ) ) {
	function dfu_busacc_fn_theme_reset() {
		if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'theme_reset_nonce' ) ) {
			dfu_busacc_fn_init_theme();
			esc_html_e( 'Default theme options set. Please refresh customiser page.', 'dfu-busacc' );
			die();
		}
	}
}
add_action('wp_ajax_dba_theme_reset', 'dfu_busacc_fn_theme_reset');

/**
 * Set theme colours
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_set_theme_color' ) ) {
	function dfu_busacc_fn_set_theme_color() {
		if ( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'theme_set_color_nonce' ) ) {
			$pri = get_theme_mod( 'dba_theme_pri_color', '#0088cc' );
			$sec = get_theme_mod( 'dba_theme_sec_color', '' );
			if ( empty( $sec ) ) {
				$sec = dfu_busacc_fn_getcomplementarycolour( $pri );
				set_theme_mod( 'dba_theme_sec_color', $sec );
			}
			dfu_busacc_fn_update_theme_colours( $pri, $sec );
			esc_html_e( 'Theme colour options set. Please refresh customiser page.', 'dfu-busacc' );
			die();
		}
	}
}
add_action('wp_ajax_dba_set_theme_color', 'dfu_busacc_fn_set_theme_color');

/**
 * Sanitize custom controls
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_sanitize_controls' ) ) {
	function dfu_busacc_fn_sanitize_controls( $input, $setting ) {
		return '';
	}
}

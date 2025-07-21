<?php

/**
 * Register Scripts & Styles in Admin
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_enqueue_color_picker_scripts' ) ) {
	function dfu_busacc_fn_enqueue_color_picker_scripts( $hook ) {
		if ( 'appearance_page_reset-theme' != $hook ) {
			return;
		}
		wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/inc/css/theme-admin.min.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'dfu_busacc_fn_enqueue_color_picker_scripts' );

/**
 * Set/reset theme options to default
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_theme_admin' ) ) {
	function dfu_busacc_fn_theme_admin() {
		add_theme_page( 'DFU Business Accelerator theme setup', 'DFUBA theme setup', 'manage_options', 'reset-theme', 'dfu_busacc_fn_reset_theme_page' );
	}
}
add_action( 'admin_menu', 'dfu_busacc_fn_theme_admin', 10 );

/**
 * Creates set/reset theme options page
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_reset_theme_page' ) ) {
	function dfu_busacc_fn_reset_theme_page() {
		if ( ! current_user_can( 'manage_options' ) ) { //check for user permissions
			wp_die( wp_kses_post( 'You do not have sufficient pivilege to access this page.', 'dfu-busacc' ) );
		}
		?>
		<div class="wrap dfu-busacc">
			<h1><?php esc_html_e( 'DFU Business Accelerator', 'dfu-busacc' ); ?></h1>

			<div class="theme-setup">
			<h2><?php esc_html_e( 'Theme Setup', 'dfu-busacc' ); ?></h2>
			<h3><?php esc_html_e( '1. Setup recommended plugins', 'dfu-busacc' ); ?></h3>
			<?php
			if ( ( class_exists( 'acf' ) || class_exists( 'acf-pro' ) ) && class_exists( 'Mega_menu' ) && class_exists( 'Kirki' ) && class_exists( 'woocommerce' ) ) {
				$txt1 = sprintf(
					'<p>%1$s</p>',
					esc_html( 'All recommended plugins have been installed and activated.', 'dfu-busacc' )
				);
			} else {
				$txt1 = sprintf(
					'<p>%1$s <a href="%2$s">%3$s</a> to make use of full functionalities of this theme.</p>',
					esc_html( 'Install recommended plugin listed in', 'dfu-busacc' ),
					esc_url( get_site_url() . '/wp-admin/themes.php?page=tgmpa-install-plugins' ),
					esc_html( 'Install DFUBA Plugins', 'dfu-busacc' )
				);
			}
			echo wp_kses_post( $txt1 );
			?>

			<h3><?php esc_html_e( '2. Customiser setup', 'dfu-busacc' ); ?></h3>
			<?php
			$txt4 = sprintf(
				'<p>%1$s <a href="%2$s">%3$s</a> %4$s <a href="%5$s">%6$s</a>.</p>',
				esc_html( 'Theme default setup and colour branding options are available in ', 'dfu-busacc' ),
				esc_url( get_site_url() . '/wp-admin/customize.php' ),
				esc_html( 'Customiser', 'dfu-busacc' ),
				esc_html( '> Theme Setup and Options > Theme initialisation & Info.  You may further customise your theme in', 'dfu-busacc' ),
				esc_url( get_site_url() . '/wp-admin/customize.php' ),
				esc_html( 'Customiser', 'dfu-busacc' )
			);
			echo wp_kses_post( $txt4 );
			$txt5 = sprintf(
				'<p>%1$s <a href="%2$s">%3$s</a>  %4$s. %5$s. %6$s.</p>',
				esc_html( 'The primary and secondary colours can be updated in ', 'dfu-busacc' ),
				esc_url( get_site_url() . '/wp-admin/customize.php' ),
				esc_html( 'Customiser', 'dfu-busacc' ),
				esc_html( '> Colours', 'dfu-busacc' ),
				esc_html( 'Background colour from buttons (or From colour of gradient if using background gradient) would be the primary colour', 'dfu-busacc' ),
				esc_html( 'Text colour in Text links would be the secondary colour', 'dfu-busacc' )
			);
			echo wp_kses_post( $txt5 );
			?>

			<h4><?php esc_html_e( 'Colour palette', 'dfu-busacc' ); ?></h4>
			<?php
			$pri = get_theme_mod( 'dba_theme_pri_color', '' );
			$sec = get_theme_mod( 'dba_theme_sec_color', '' );
			if ( $pri && $sec ) { 
				$ctype = dfu_busacc_fn_colourcheck( $pri );
				$themecolors = dfu_busacc_fn_theme_colours( $pri, $sec );
				$greys = dfu_busacc_fn_getgreyscale( $pri );
				?>
				<p><?php esc_html_e( 'Theme generated colours based on primary and secondary colours set in Theme initialisation & info.', 'dfu-busacc' ); ?></p>
				<div class="palette">
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $pri ) ); ?>" style="background-color:<?php echo esc_attr( $pri ); ?>"><?php echo esc_html( $pri ) . '<br>(' . esc_html( 'Primary', 'dfu-busacc' ) . ')'; ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_dk40'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 2 : 6 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_dk40'] ); ?>"><?php echo esc_html( $themecolors['pri_dk40'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_dk30'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 3 : 7 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_dk30'] ); ?>"><?php echo esc_html( $themecolors['pri_dk30'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_lt20'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 4 : 2 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_lt20'] ); ?>"><?php echo esc_html( $themecolors['pri_lt20'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_lt65'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 5 : 3 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_lt65'] ); ?>"><?php echo esc_html( $themecolors['pri_lt65'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_lt75'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 6 : 4 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_lt75'] ); ?>"><?php echo esc_html( $themecolors['pri_lt75'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_lt85'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 7 : 5 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_lt85'] ); ?>"><?php echo esc_html( $themecolors['pri_lt85'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_lt90'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 8 : 8 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_lt90'] ); ?>"><?php echo esc_html( $themecolors['pri_lt90'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['pri_lt95'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 9 : 9 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['pri_lt95'] ); ?>"><?php echo esc_html( $themecolors['pri_lt95'] ); ?></div>
				</div>

				<div class="palette">
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $sec ) ); ?>" style="background-color:<?php echo esc_attr( $sec ); ?>"><?php echo esc_html( $sec ) . '<br>(' . esc_html( 'Secondary', 'dfu-busacc' ) . ')'; ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['sec_dk40'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 2 : 5 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['sec_dk40'] ); ?>"><?php echo esc_html( $themecolors['sec_dk40'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['sec_dk30'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 3 : 6 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['sec_dk30'] ); ?>"><?php echo esc_html( $themecolors['sec_dk30'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['sec_lt60'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 4 : 7 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['sec_lt60'] ); ?>"><?php echo esc_html( $themecolors['sec_lt60'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['sec_lt70'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 5 : 2 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['sec_lt70'] ); ?>"><?php echo esc_html( $themecolors['sec_lt70'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['sec_lt80'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 6 : 3 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['sec_lt80'] ); ?>"><?php echo esc_html( $themecolors['sec_lt80'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['sec_lt90'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 7 : 4 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['sec_lt90'] ); ?>"><?php echo esc_html( $themecolors['sec_lt90'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themecolors['sec_lt95'] ) ); ?>" style="<?php echo 'order:' . ( 'dk' == $ctype ? 8 : 8 ) . '; '; ?>background-color:<?php echo esc_attr( $themecolors['sec_lt95'] ); ?>"><?php echo esc_html( $themecolors['sec_lt95'] ); ?></div>
				</div>

				<div class="palette">
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col8'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col8'] ); ?>"><?php echo esc_html( $greys['col8'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col7'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col7'] ); ?>"><?php echo esc_html( $greys['col7'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col6'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col6'] ); ?>"><?php echo esc_html( $greys['col6'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col5'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col5'] ); ?>"><?php echo esc_html( $greys['col5'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col4'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col4'] ); ?>"><?php echo esc_html( $greys['col4'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col3'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col3'] ); ?>"><?php echo esc_html( $greys['col3'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col2'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col2'] ); ?>"><?php echo esc_html( $greys['col2'] ); ?></div>
					<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $greys['col1'] ) ); ?>" style="background-color:<?php echo esc_attr( $greys['col1'] ); ?>"><?php echo esc_html( $greys['col1'] ); ?></div>
				</div>

				<?php
				// Check primary/secondary changed
				$themecolor = dfu_busacc_fn_get_theme_prisec_colour();
				$themepri = $themecolor['pri1'];
				$themesec = $themecolor['sec1'];
				if ( $pri != $themepri || $sec != $themesec ) { ?>
					<p><?php esc_html_e( 'Note: Current settings in theme indicate that you are not using primary and/or secondary colour set in Theme initialisation & info. You may wish to update the colours in Theme initialisation & info to get an updated palette.', 'dfu-busacc' ); ?></p>
					<p><?php esc_html_e( 'Current primary and secondary colour used in theme.', 'dfu-busacc' ); ?></p>
					<div class="palette">
						<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themepri ) ); ?>" style="background-color:<?php echo esc_attr( $themepri ); ?>"><?php echo esc_html( $themepri ) . '<br>(' . esc_html( 'Primary', 'dfu-busacc' ) . ')'; ?></div>
						<div class="chip <?php echo esc_attr( dfu_busacc_fn_colourcheck( $themesec ) ); ?>" style="background-color:<?php echo esc_attr( $themesec ); ?>"><?php echo esc_html( $themesec ). '<br>(' . esc_html( 'Secondary', 'dfu-busacc' ) . ')'; ?></div>
					</div>
				<?php
				}
			} else {
				esc_html_e( 'Colour palette is shown if primary (& secondary) colours are set in customiser.', 'dfu-busacc' );
			}
			?>
			</div>

			<div class="theme-doc">
			<h2><?php esc_html_e( 'Documenation', 'dfu-busacc' ); ?></h2>
			<?php
			$txt6 = sprintf(
				'<p>%1$s <a href="%2$s" target="_blank">%3$s</a>.</p>',
				esc_html( 'View', 'dfu-busacc' ),
				esc_url( 'https://designforu.com.au/theme-dfu-business-accelerator-documentation/' ),
				esc_html( 'Theme Documemtation', 'dfu-busacc' )
			);
			echo wp_kses_post( $txt6 );
			?>
			</div>

			<div class="theme-demo">
			<h2><?php esc_html_e( 'Demo', 'dfu-busacc' ); ?></h2>
			<?php
			$txt7 = sprintf(
				'<p>%1$s <a href="%2$s" target="_blank">%3$s</a>.</p>',
				esc_html( 'View', 'dfu-busacc' ),
				esc_url( 'https://dfubademo.dfuwebsolution.com/' ),
				esc_html( 'Theme Demo', 'dfu-busacc' )
			);
			echo wp_kses_post( $txt7 );
			?>
			</div>

			<hr>
			<div class="theme-author">
			<?php
			$txt8 = sprintf(
				'<p>%1$s <a href="%2$s" target="_blank">%3$s</a>.</p>',
				esc_html( 'DFU Business Accelerator (DFU BusAcc) is proudly bought to you by ', 'dfu-busacc' ),
				esc_url( 'https://designforu.com.au/' ),
				esc_html( 'Design For U', 'dfu-busacc' )
			);
			echo wp_kses_post( $txt8 );
			?>
			</div>

		</div>
	<?php
	}
}

/**
 * Initialize theme options to default
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_init_theme' ) ) {
	function dfu_busacc_fn_init_theme() {
		$pri = '#0088cc';
		$sec = '#cc4400';
		$themecolors = dfu_busacc_fn_theme_colours( $pri );
		$greys = dfu_busacc_fn_getgreyscale( $pri );

		set_theme_mod( 'header_textcolor', $greys['col7'] );
		// Default panel
		// ======================================================
		$tcol = array(
			'highlight' => $themecolors['pri'],
			'bg'        => 'rgba(255,255,255,0)',
			'border'    => $themecolors['pri_lt75'],
			'hborder'   => $themecolors['pri'],
		);

		set_theme_mod( 'dba_theme_pri_color', $pri );
		set_theme_mod( 'dba_theme_sec_color', $sec );

		set_theme_mod( 'dba_default_title_color', $tcol );
		set_theme_mod( 'dba_default_title_style', 'dba-headstyle1' );
		set_theme_mod( 'dba_default_title_style1', '\25FC' );
		set_theme_mod( 'dba_default_title_style2', '\25CF' );
		set_theme_mod( 'dba_default_title_style3', '\2724' );
		set_theme_mod( 'dba_default_title_style4', '\273D' );
		set_theme_mod( 'dba_default_title_style5', '\2744' );
		set_theme_mod( 'dba_default_hover_title_style', '\27A6' );
		set_theme_mod( 'dba_default_title_style1_border', 5 );
		set_theme_mod( 'dba_default_title_style2_border', 2 );
		set_theme_mod( 'dba_default_title_style3_border', 3 );
		set_theme_mod( 'dba_default_title_style4_border', 4 );
		set_theme_mod( 'dba_default_title_style5_border', 5 );
		set_theme_mod( 'dba_default_title_style5_border', 5 );
		
		set_theme_mod( 'dba_header_width', 'container' );
		set_theme_mod( 'dba_footer_width', 'container' );
		set_theme_mod( 'dba_default_sidebar_pos', 'right' );
		set_theme_mod( 'dba_default_sidebar_width', '3' );
		set_theme_mod( 'dba_default_sidebar', 'dba-sidebar-1' );
		// Business panel
		// ======================================================
		set_theme_mod( 'dba_busreg_on_copyright', false );
		set_theme_mod( 'dba_busreg_label', '' );
		set_theme_mod( 'dba_busreg_no', '' );
		// Layout
		// ======================================================
		set_theme_mod( 'dba_topbar', false );
		set_theme_mod( 'dba_topbar_width', 'container' );
		set_theme_mod( 'dba_header_layout', '1' );
		if ( ! class_exists( 'Mega_Menu' ) ) {
			set_theme_mod( 'dba_menu_text', 'light' );
			set_theme_mod( 'dba_menu_dropdown_border_radius', 0 );
			set_theme_mod( 'dba_menu_mob_breakpt', 'md' );
		}
		set_theme_mod( 'dba_menu_align1', 'end' );
		set_theme_mod( 'dba_stickymenu', true );
		set_theme_mod( 'dba_stickymenu_opacity', 0.9 );
		set_theme_mod( 'dba_sidebar_no', '0' );
		set_theme_mod( 'dba_footerbar_no', '1' );
		set_theme_mod( 'dba_copyright', true );

		// Typography panel
		// ======================================================
		$defaultfont = dfu_busacc_fn_get_font_defaults( 'default', $greys ); 
		set_theme_mod( 'dba_default_font', $defaultfont );
		$h1font = dfu_busacc_fn_get_font_defaults( 'h1', $greys );
		set_theme_mod( 'dba_h1_font', $h1font );
		$h2font = dfu_busacc_fn_get_font_defaults( 'h2', $greys );
		set_theme_mod( 'dba_h2_font', $h2font );
		$h3font = dfu_busacc_fn_get_font_defaults( 'h3', $greys );
		set_theme_mod( 'dba_h3_font', $h3font );
		$h4font = dfu_busacc_fn_get_font_defaults( 'h4', $greys );
		set_theme_mod( 'dba_h4_font', $h4font );
		$h5font = dfu_busacc_fn_get_font_defaults( 'h5', $greys );
		set_theme_mod( 'dba_h5_font', $h5font );
		$h6font = dfu_busacc_fn_get_font_defaults( 'h6', $greys );
		set_theme_mod( 'dba_h6_font', $h6font );
		$topbarfont =  dfu_busacc_fn_get_font_defaults( 'topbar', $greys );
		set_theme_mod( 'dba_topbar_font', $topbarfont );
		// Colors panel
		// ======================================================
		$btn = array(
			'text'      => $greys['col2'],
			'htext'     => $greys['col1'],
			'bg'        => $themecolors['pri'],
			'hbg'       => $themecolors['pri_dk40'],
		);
		set_theme_mod( 'dba_button', $btn );
		set_theme_mod( 'dba_btn_grad', false );
		set_theme_mod( 'dba_gradient_direction', '' );
		set_theme_mod( 'dba_btn_first', '' );
		set_theme_mod( 'dba_btn_second', '' );
		set_theme_mod( 'dba_gradient_hdirection', '' );
		set_theme_mod( 'dba_btn_hfirst', '' );
		set_theme_mod( 'dba_btn_hsecond', '' );
		$link = array(
			'text'      => $themecolors['sec'],
			'htext'     => $themecolors['sec_dk40'],
		);
		set_theme_mod( 'dba_link', $link );
		$input = array(
			'text'      => $greys['col5'],
			'bg'        => $greys['col2'],
			'focus'     => $greys['col1'],
		);
		set_theme_mod( 'dba_input', $input );
		set_theme_mod( 'dba_ctrl_border', '0' );
		set_theme_mod( 'dba_ctrl_border_color', '' );
		set_theme_mod( 'dba_ctrl_border_color_focus', '' );
		set_theme_mod( 'dba_ctrl_btm_border', '0' );
		set_theme_mod( 'dba_ctrl_btm_border_color', '' );
		set_theme_mod( 'dba_ctrl_btm_border_color_focus', '' );
		set_theme_mod( 'dba_ctrl_btm_border_color_focus_inv', '' );
		$widget = array(
			'sidebar-head'   => $greys['col7'],
			'footer-head'    => $greys['col7'],
			'sidebar-text'   => $greys['col8'],
			'footer-text'    => $greys['col8'],
		);
		set_theme_mod( 'dba_widgets', $widget );
		$topbar = array(
			'bg'    => $greys['col2'],
		);
		set_theme_mod( 'dba_topbar_colour', $topbar );
		$layout = array(
			'header'        => $greys['col2'],
			'top-footer'    => $greys['col2'],
			'btm-footer'    => $greys['col2'],
		);
		set_theme_mod( 'dba_layout', $layout );
		// General Panel
		// ======================================================
		set_theme_mod( 'dba_ctrl_height', 2.5 );
		set_theme_mod( 'dba_ctrl_border_radius', 0 );
		set_theme_mod( 'dba_show_search', false );
		set_theme_mod( 'dba_load_fa', true );
		set_theme_mod( 'dba_load_fa_font', false );
		// Blog panel
		// ======================================================
		set_theme_mod( 'dba_blog_list_width', '2' );
		set_theme_mod( 'dba_blog_img_pc', 50 );
		set_theme_mod( 'dba_blog_show_header_ico', false );
		set_theme_mod( 'dba_blog_show_footer_ico', false );
		set_theme_mod( 'dba_blog_date_to_use', 'update' );
		set_theme_mod( 'dba_blog_header_ico_color', '' );
		set_theme_mod( 'dba_blog_footer_ico_color', '' );
		set_theme_mod( 'dba_blog_tag_use_badge', true );
		set_theme_mod( 'dba_blog_badge_color', $btn ); // badge colour same as button
		// Homepage panel - Home Page Header
		// ======================================================
		set_theme_mod( 'dba_hp_custom_header', false );
		set_theme_mod( 'dba_hp_headimg_slider', false );
		set_theme_mod( 'dba_hp_headimg_filter', 'none' );
		set_theme_mod( 'dba_hp_headimg_filter_perc', 50 );
		set_theme_mod( 'dba_hp_headimg_style', '1' );
		set_theme_mod( 'dba_hp_headimg_container', 'full-width' );
		set_theme_mod( 'dba_hp_headimg_sect_dba_bgcolor', '' );
		set_theme_mod( 'dba_hp_headimg_width', '8' );
		set_theme_mod( 'dba_hp_headimg_bgcolor', '' );
		set_theme_mod( 'dba_hp_headimg_txt_bgcolor', $greys['col3'] );
		set_theme_mod( 'dba_hp_headimg_head', 'DFU Business Accelerator Setup' );
		set_theme_mod( 'dba_hp_headimg_msg', 'To setup theme follow instructions in DFUBA Theme setup' );
		set_theme_mod( 'dba_hp_headimg_btn_text', 'Go to theme setup' );
		set_theme_mod( 'dba_hp_headimg_btn_url', get_site_url() . '/themes.php?page=reset-theme' );
		// Homepage CTA - Home Page and Sections
		// ======================================================
		set_theme_mod( 'dba_hp_cta', false );
		set_theme_mod( 'dba_hp_cta_container', 'full-width' );
		set_theme_mod( 'dba_hp_cta_bg_type', 'bgcolor' );
		set_theme_mod( 'dba_hp_cta_bgimg', '' );
		set_theme_mod( 'dba_hp_cta_bgcolor', $greys['col7'] );
		set_theme_mod( 'dba_hp_cta_txtcolor', $greys['col1'] );
		set_theme_mod( 'dba_hp_cta_head', 'Call to action Heading' );
		set_theme_mod( 'dba_hp_cta_msg', 'Put your call to action heading, message and button text in Customiser Home Page and Sections' );
		set_theme_mod( 'dba_hp_cta_showphone', false );
		set_theme_mod( 'dba_hp_cta_showhours', false );
		set_theme_mod( 'dba_hp_cta_btn_txt', 'CTA button text' );
		set_theme_mod( 'dba_hp_cta_btn_url', '#' );
		set_theme_mod( 'dba_hp_cta_widget_below', false );
		// Background image
		// ======================================================
		set_theme_mod( 'dba_bgcolor_ontop', false );
		set_theme_mod( 'dba_bgimg_hponly', true );
		set_theme_mod( 'dba_bgcolor_ontop_opacity', 1 );

		// WooCommerce
		// ======================================================
		$wcmisc = array(
			'ptxt'        => $themecolors['pri'],
			'msg'         => '#0f834d',
			'info'        => '#1e73be',
			'error'       => '#e2401c',
		);
		set_theme_mod( 'dba_wc_misc_colors', $wcmisc );
		set_theme_mod( 'dba_wc_max_prod_row', 3 );
		set_theme_mod( 'dba_wc_max_prod_page', 12 );
		$producttitlefont = dfu_busacc_fn_get_font_defaults( 'wcprocttitle', $greys );
		set_theme_mod( 'dba_wc_product_title_font', $producttitlefont );
		set_theme_mod( 'dba_wc_qty_simple', false );
		set_theme_mod( 'dba_wc_add_hover_img', false );
		set_theme_mod( 'dba_wc_prod_view', 'original' );
		set_theme_mod( 'dba_wc_breadcrumb', false );
		set_theme_mod( 'dba_wc_sale_tag_style', 'onsale' );
		set_theme_mod( 'dba_wc_sale_tag_text', 'Sale' );
		set_theme_mod( 'dba_wc_sale_border', 0 );
		set_theme_mod( 'dba_wc_sale_border_radius', 50 );
		$wcsale = array(
			'text'        => $themecolors['pri_txt'],
			'bg'          => $themecolors['pri'],
		);
		set_theme_mod( 'dba_wc_sale_color', $wcsale );
		set_theme_mod( 'dba_wc_sale_border_color', $themecolors['pri'] );
		set_theme_mod( 'dba_wc_sale_tag_gradient', true );
		set_theme_mod( 'dba_wc_shop_show_search', 'top' );
		set_theme_mod( 'dba_wc_shop_show_sort', 'top' );
		set_theme_mod( 'dba_wc_shop_show_count', 'btm' );
		set_theme_mod( 'dba_wc_shop_show_page', 'both' );
		set_theme_mod( 'dba_wc_show_widget_b4_prod_catalog', false );
		set_theme_mod( 'dba_wc_show_collapsible_button', false );
		set_theme_mod( 'dba_wc_collapsible_btn_text', 'Filters' );
		set_theme_mod( 'dba_wc_show_button_tooltip', false );
		set_theme_mod( 'dba_wc_collapsible_btn_tooltip', 'Expand/collapse Filters' );
		set_theme_mod( 'dba_wc_show_widget_on_open', false );
		set_theme_mod( 'dba_wc_sglprod_img_width', '6' );
		set_theme_mod( 'dba_wc_sglprod_thumbnail_row', 4 );
		set_theme_mod( 'dba_wc_sglprod_sticky_summary', false );
		set_theme_mod( 'dba_wc_sglprod_stickysum_from_wth', 992 );
		set_theme_mod( 'dba_wc_sglprod_stickysum_bgcolor', '' );
		set_theme_mod( 'dba_wc_sglprod_stickysum_fixwidth', false );
		set_theme_mod( 'dba_wc_sglprod_relatedprod', true );
		set_theme_mod( 'dba_wc_sglprod_relprod_page', 3 );
		set_theme_mod( 'dba_wc_sglprod_upsprod_page', 3 );
		set_theme_mod( 'dba_wc_sglprod_det_style', 'accordion' );
		set_theme_mod( 'dba_wc_sglprod_det_tabs_pills', 'md' );
		set_theme_mod( 'dba_wc_cart_xsellprod_page', 3 );
		set_theme_mod( 'dba_wc_cart_xsell_pos', 'undercarttbl' );
		set_theme_mod( 'dba_wc_cart_on_menu', false );
		set_theme_mod( 'dba_wc_cart_icon_btm_mob_only', false );
		set_theme_mod( 'dba_wc_cart_icon_btm', true );
		set_theme_mod( 'dba_wc_sidebar_pos', '' );
		set_theme_mod( 'dba_wc_sidebar_width', '' );

		// Additional options
		// ======================================================
		do_action( 'dfu_busacc_a_add_init_theme' );
	}
}

/**
 * Update theme colours options
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_update_theme_colours' ) ) {
	function dfu_busacc_fn_update_theme_colours( $pri, $contrastcol ) {
		if ( empty( $contrastcol ) ) {
			$sec = dfu_busacc_fn_getcomplementarycolour( $pri );
		} else {
			$sec = $contrastcol;
		}
		$themecolors = dfu_busacc_fn_theme_colours( $pri, $sec );
		$greys = dfu_busacc_fn_getgreyscale( $pri );
		// Setup panel
		// ======================================================
		$tcol = array(
			'highlight'    => $themecolors['pri'],
			'bg'           => 'rgba(255,255,255,0)',
			'border'       => $themecolors['pri_lt75'],
			'hborder'      => $themecolors['pri'],
		);
		set_theme_mod( 'dba_default_title_color', $tcol );
		// Typography panel
		// ======================================================
		$defaultfont = get_theme_mod( 'dba_default_font' );
		$defaultfont['color'] = $greys['col8'];
		set_theme_mod( 'dba_default_font', $defaultfont );
		$h1font = get_theme_mod( 'dba_h1_font' );
		$h1font['color'] = $greys['col7'];
		set_theme_mod( 'dba_h1_font', $h1font );
		$h2font = get_theme_mod( 'dba_h2_font' );
		$h2font['color'] = $greys['col7'];
		set_theme_mod( 'dba_h2_font', $h2font );
		$h3font = get_theme_mod( 'dba_h3_font' );
		$h3font['color'] = $greys['col7'];
		set_theme_mod( 'dba_h3_font', $h3font );
		$h4font = get_theme_mod( 'dba_h4_font' );
		$h4font['color'] = $greys['col7'];
		set_theme_mod( 'dba_h4_font', $h4font );
		$h5font = get_theme_mod( 'dba_h5_font' );
		$h5font['color'] = $greys['col7'];
		set_theme_mod( 'dba_h5_font', $h5font );
		$h6font = get_theme_mod( 'dba_h6_font' );
		$h6font['color'] = $greys['col7'];
		set_theme_mod( 'dba_h6_font', $h6font );
		$topbarfont = get_theme_mod( 'dba_topbar_font' );
		$topbarfont['color'] = $greys['col7'];
		set_theme_mod( 'dba_topbar_font', $topbarfont );
		// Color panel
		// ======================================================
		$btn = array(
			'text'    => $themecolors['pri_txt'],
			'htext'   => $themecolors['pri_txt_dk'],
			'bg'      => $themecolors['pri'],
			'hbg'     => $themecolors['pri_dk40'],
		);
		set_theme_mod( 'dba_button', $btn );
		set_theme_mod( 'dba_btn_grad', true );
		set_theme_mod( 'dba_gradient_direction', 'to right' );
		set_theme_mod( 'dba_btn_first', $themecolors['pri'] );
		set_theme_mod( 'dba_btn_second', $themecolors['pri_dk40'] );
		set_theme_mod( 'dba_gradient_hdirection', 'to left' );
		set_theme_mod( 'dba_btn_hfirst', $themecolors['pri'] );
		set_theme_mod( 'dba_btn_hsecond', $themecolors['pri_dk40'] );
		$lnk = array(
			'text'    => $themecolors['sec'],
			'htext'   => $themecolors['sec_dk40'],
		);
		set_theme_mod( 'dba_link', $lnk );
		$input = array(
			'text'    => $greys['col5'],
			'bg'      => $greys['col2'],
			'focus'   => $greys['col1'],
		);
		set_theme_mod( 'dba_input', $input );
		set_theme_mod( 'dba_ctrl_border', '0' );
		set_theme_mod( 'dba_ctrl_border_color', '' );
		set_theme_mod( 'dba_ctrl_border_color_focus', '' );
		set_theme_mod( 'dba_ctrl_btm_border', 2 );
		set_theme_mod( 'dba_ctrl_btm_border_color', $themecolors['pri'] );
		set_theme_mod( 'dba_ctrl_btm_border_color_focus', $themecolors['sec'] );
		set_theme_mod( 'dba_ctrl_btm_border_color_focus_inv', '#e2401c' );
		$widget = array(
			'sidebar-head'    => $greys['col7'],
			'footer-head'     => $greys['col7'],
			'sidebar-text'    => $greys['col8'],
			'footer-text'     => $greys['col8'],
		);
		set_theme_mod( 'dba_widgets', $widget );
		$topbar = array(
			'bg'    => $greys['col2'],
		);
		set_theme_mod( 'dba_topbar_colour', $topbar );
		$layout = array(
			'header'        => $greys['col2'],
			'top-footer'    => $greys['col2'],
			'btm-footer'    => $greys['col2'],
		);
		set_theme_mod( 'dba_layout', $layout );
		// General Panel
		// ======================================================

		// Blog panel
		// ======================================================
		set_theme_mod( 'dba_blog_header_ico_color', $themecolors['pri'] );
		set_theme_mod( 'dba_blog_footer_ico_color', $themecolors['pri'] );
		set_theme_mod( 'dba_blog_badge_color', $btn ); // badge colour same as button
		// Homepage panel - Home Page Header
		// ======================================================
		set_theme_mod( 'dba_hp_headimg_sect_dba_bgcolor', '' );
		set_theme_mod( 'dba_hp_headimg_bgcolor', '' );
		set_theme_mod( 'dba_hp_headimg_txt_bgcolor', $greys['col3'] );
		// Homepage CTA - Home Page and Sections
		// ======================================================
		set_theme_mod( 'dba_hp_cta_bgcolor', $greys['col8'] );
		set_theme_mod( 'dba_hp_cta_txtcolor', $greys['col1'] );

		// WooCommerce
		// ======================================================
		$wcmisc = get_theme_mod( 'dba_wc_misc_colors' );
		$wcmisc['ptxt'] = $themecolors['pri'];
		set_theme_mod( 'dba_wc_misc_colors', $wcmisc );
		$wcsale = array(
			'text'    => $themecolors['pri_txt'],
			'bg'      => $themecolors['pri'],
		);
		set_theme_mod( 'dba_wc_sale_color', $wcsale );
		set_theme_mod( 'dba_wc_sale_border_color', $themecolors['pri'] );
		set_theme_mod( 'dba_wc_sglprod_stickysum_bgcolor', $greys['col2'] );
		if ( class_exists( 'woocommerce' ) ) {
			update_option( 'woocommerce_email_base_color', $themecolors['pri'] );
		}

		// Additional options
		// ======================================================
		do_action( 'dfu_busacc_a_add_update_theme_colors' );
	}
}


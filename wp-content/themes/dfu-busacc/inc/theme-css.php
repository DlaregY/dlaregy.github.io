<?php

/**
 * Theme custom css
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_custom_css' ) ) {
	function dfu_busacc_fn_custom_css() {
		echo '<style type="text/css">';
		//root
		echo ':root {';
		$btndefault = array(
			'text'  => '#f0f1f2',
			'htext' => '#fcfcfc',
			'bg'    => '#0088cc',
			'hbg'   => '#006191',
		);
		$btncol = get_theme_mod( 'dba_button', $btndefault );
		echo '--color-primary-text1: ' . esc_attr( $btncol['text'] ) . ';';
		echo '--color-primary-text2: ' . esc_attr( $btncol['htext'] ) . ';';
		if ( true == get_theme_mod( 'dba_btn_grad' ) ) {
			$p1 = get_theme_mod( 'dba_btn_first', '#0088cc' );
			$p2 = get_theme_mod( 'dba_btn_second', '#006191' );
		} else {
			$p1 = $btncol['bg'];
			$p2 = $btncol['hbg'];
		}
		$ctype = dfu_busacc_fn_colourcheck( $p1 );
		$lnkdefault = array(
			'text'   => '#cc4400',
			'htext'  => '#7a2800',
		);
		$linkcol = get_theme_mod( 'dba_link', $lnkdefault );

		$s1 = $linkcol['text'];
		$s2 = $linkcol['htext'];

		$themecolors = dfu_busacc_fn_theme_colours( $p1, $s1 );
		$p3 = $themecolors['pri_lt95'];
		$p4 = $themecolors['pri_lt90'];
		echo '--color-primary1: ' . esc_attr( $p1 ) . ';';
		echo '--color-primary2: ' . esc_attr( $p2 ) . ';';
		echo '--color-primary3: ' . esc_attr( $p3 ) . ';';
		echo '--color-primary4: ' . esc_attr( $p4 ) . ';';

		$s3 = $themecolors['sec_lt95'];
		$s4 = $themecolors['sec_lt60'];
		echo '--color-secondary1: ' . esc_attr( $s1 ) . ';';
		echo '--color-secondary2: ' . esc_attr( $s2 ) . ';';
		echo '--color-secondary3: ' . esc_attr( $s3 ) . ';';
		echo '--color-secondary4: ' . esc_attr( $s4 ) . ';';

		$defaultfont = get_theme_mod( 'dba_default_font' );
		$txtcol = $defaultfont['color'];
		echo '--color-main-text: ' . esc_attr( $txtcol ) . ';';

		$greys = dfu_busacc_fn_getgreyscale( $p1 );
		echo '--color-white1: ' . esc_attr( $greys['col1'] ) . ';';
		echo '--color-white2: ' . esc_attr( $greys['col2'] ) . ';';
		echo '--color-grey-light1: ' . esc_attr( $greys['col3'] ) . ';';
		echo '--color-grey-light2: ' . esc_attr( $greys['col4'] ) . ';';
		echo '--color-grey1: ' . esc_attr( $greys['col5'] ) . ';';
		echo '--color-grey2: ' . esc_attr( $greys['col6'] ) . ';';
		echo '--color-grey-dark1: ' . esc_attr( $greys['col7'] ) . ';';
		echo '--color-grey-dark2: ' . esc_attr( $greys['col8'] ) . ';';

		$minheight = get_theme_mod( 'dba_ctrl_height', '2.5' );
		echo '--min-height: ' . esc_attr( $minheight ) . 'rem;';

		$borderradius = get_theme_mod( 'dba_ctrl_border_radius', '0' );
		echo '--border-radius: ' . esc_attr( $borderradius ) . 'rem;';

		echo '} ';

		// Link
		echo 'a:not([class]), a[class=""], a[class~="dba-link"], a:not([class]):link, a[class=""]:link, a[class~="dba-link"]:link, a:not([class]):visited, a[class=""]:visited, a[class~="dba-link"]:visited { color: ' . esc_attr( $linkcol['text'] ) . '; } ';
		echo 'a:not([class]):hover, a[class=""]:hover, a[class~="dba-link"]:hover, a:not([class]):focus, a[class=""]:focus, a[class~="dba-link"]:focus, a:not([class]):active, a[class=""]:active, a[class~="dba-link"]:active { color: ' . esc_attr( $linkcol['htext'] ) . '; } ';

		// Buttons
		$btngrad = get_theme_mod( 'dba_btn_grad', false );
		if ( $btngrad ) {
			$graddir = get_theme_mod( 'dba_gradient_direction', '' );
			$fcolor = get_theme_mod( 'dba_btn_first' );
			$scolor = get_theme_mod( 'dba_btn_second' );
			$hgraddir = get_theme_mod( 'dba_gradient_hdirection', '' );
			$hfcolor = get_theme_mod( 'dba_btn_hfirst' );
			$hscolor = get_theme_mod( 'dba_btn_hsecond' );
		}
		echo ( ( class_exists( 'woocommerce' ) ) ? '.woocommerce a.button, .woocommerce a.button:visited, .woocommerce a.button:link, .woocommerce button.button, .woocommerce input.button, .wc-block-grid .wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color), .wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color):link, .wp-block-button .wp-block-button__link:not(.has-background):not(.has-text-color):visited, ' : '' );
		echo '.wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color), .wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color):visited, .wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color):link, ';
		echo '.btn, .btn:visited, .btn:link, ';
		echo 'button:not(.dba-nonbtn):not(.close)' . ( class_exists( 'woocommerce' ) ?  ':not(.wc-block-pagination-page):not(.wc-block-active-filters__clear-all):not(.wc-block-active-filters__list-item-remove)' : '' ) . ', ';
		echo 'button:not(.dba-nonbtn):not(.close)' . ( class_exists( 'woocommerce' ) ?  ':not(.wc-block-pagination-page):not(.wc-block-active-filters__clear-all):not(.wc-block-active-filters__list-item-remove)' : '' ) . ':visited, '; 
		echo 'button:not(.dba-nonbtn):not(.close)' . ( class_exists( 'woocommerce' ) ?  ':not(.wc-block-pagination-page):not(.wc-block-active-filters__clear-all):not(.wc-block-active-filters__list-item-remove)' : '' ) . ':link, ';
		echo 'input[type=button], input[type=button]:visited, input[type=button]:link, ';
		echo 'input[type=submit], input[type=submit]:visited, input[type=submit]:link, ';
		echo 'input[type="reset"], input[type="reset"]:visited, input[type="reset"]:link {';
		echo 'font-weight: 400; box-shadow: var(--shadow-light); ';
		echo 'min-height: var(--min-height); ';
		echo 'border-radius: var(--border-radius); ';
		echo 'color: ' . esc_attr( $btncol['text'] ) . '; ';
		echo 'background-color: ' . esc_attr( $btncol['bg'] ) . '; ';
		if ( $btngrad ) {
			echo 'background: linear-gradient(' . esc_attr( $graddir ) . ', ' . esc_attr( $fcolor ) . ', ' . esc_attr( $scolor ) . '); ';
		}
		echo '} ';

		$lnht = $minheight - 0.75;
		echo ( ( class_exists( 'woocommerce' ) ) ? '.woocommerce a.button, .woocommerce a.button:visited, .woocommerce a.button:link { padding: .375rem .75rem; line-height: ' . esc_attr( $lnht ) . ';  } ' : '' );

		echo ( ( class_exists( 'woocommerce' ) ) ? '.woocommerce a.button:hover, .woocommerce a.button:focus, .woocommerce a.button:active, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce button.button:active, .woocommerce input.button:hover, .woocommerce input.button:focus, .woocommerce input.button:active, .wc-block-grid .wp-block-button .wp-block-button__link:hover, .wc-block-grid .wp-block-button .wp-block-button__link:focus, .wc-block-grid .wp-block-button .wp-block-button__link:active, ' : '' );
		echo '.wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color):hover, .wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color):focus, .wp-block-button.is-style-dfu-busacc-theme-button .wp-block-button__link:not(.has-background):not(.has-text-color):active, ';
		echo '.btn:hover, .btn:focus, .btn:active, ';
		echo 'button:not(.dba-nonbtn):not(.close)' . ( class_exists( 'woocommerce' ) ?  ':not(.wc-block-pagination-page):not(.wc-block-active-filters__clear-all):not(.wc-block-active-filters__list-item-remove)' : '' ) . ':hover, ';
		echo 'button:not(.dba-nonbtn):not(.close)' . ( class_exists( 'woocommerce' ) ?  ':not(.wc-block-pagination-page):not(.wc-block-active-filters__clear-all):not(.wc-block-active-filters__list-item-remove)' : '' ) . ':focus, ';
		echo 'button:not(.dba-nonbtn):not(.close)' . ( class_exists( 'woocommerce' ) ?  ':not(.wc-block-pagination-page):not(.wc-block-active-filters__clear-all):not(.wc-block-active-filters__list-item-remove)' : '' ) . ':active, ';
		echo 'input[type=button]:hover, input[type=button]:focus, input[type=button]:active, ';
		echo 'input[type=submit]:hover, input[type=submit]:focus, input[type=submit]:active, ';
		echo 'input[type="reset"]:hover, input[type="reset"]:focus, input[type="reset"]:active {';
		echo 'box-shadow: var(--shadow-dark); ';
		echo 'text-decoration: none; ';
		echo 'color: ' . esc_attr( $btncol['htext'] ) . '; ';
		echo 'background-color: ' . esc_attr( $btncol['hbg'] ) . '; ';
		if ( $btngrad ) {
			echo 'background: linear-gradient(' . esc_attr( $hgraddir ) . ', ' . esc_attr( $hfcolor ) . ', ' . esc_attr( $hscolor ) . '); ';
		}
		echo '} ';

		// Social icons
		echo '.wp-block-social-links.is-style-dfu-busacc-theme-social-icons-theme-button .wp-social-link { ';
		echo 'background: ' . esc_attr( $btncol['bg'] ) . '; ';
		if ( $btngrad ) {
			echo 'background: linear-gradient(' . esc_attr( $graddir ) . ', ' . esc_attr( $fcolor ) . ', ' . esc_attr( $scolor ) . '); }';
		}

		// Form controls
		$ctrlborderwidth = get_theme_mod( 'dba_ctrl_border', '0' );
		$ctrlbordercolor = get_theme_mod( 'dba_ctrl_border_color' );
		$ctrlbtmborderwidth = get_theme_mod( 'dba_ctrl_btm_border', '0' );
		$ctrlbtmbordercolor = get_theme_mod( 'dba_ctrl_btm_border_color' );
		$ctrlbordercolofocus = get_theme_mod( 'dba_ctrl_border_color_focus' );
		$ctrlbtmbordercolorfocus = get_theme_mod( 'dba_ctrl_btm_border_color_focus' );
		$ctrlbtmbordercolorinv = get_theme_mod( 'dba_ctrl_btm_border_color_focus_inv' );
		$inputdefault = array(
			'text'      => '#bdc4c6',
			'bg'        => '#fcfcfc',
			'focus'     => '#ffffff',
		);
		$inputcolors = get_theme_mod( 'dba_input', $inputdefault );
		$inputbgcolor = $inputcolors['bg'];
		$inputfocuscolor = $inputcolors['focus'];
		$inputtext = $inputcolors['text'];
		echo ( ( class_exists( 'woocommerce' ) ) ? '.woocommerce .quantity input.qty, .quantity input.qty, .woocommerce input.input-text, .select2-container--default .select2-selection--single, ' : '' );
		echo '.form-control, select, input[type=search], textarea { ';
		if ( 0 !== $ctrlborderwidth && ! empty( $ctrlbordercolor ) ) {
			echo 'border: ' . esc_attr( $ctrlborderwidth ) . 'px solid ' . esc_attr( $ctrlbordercolor ) . '; ';
		} else {
			echo 'border: 0; ';
		}
		echo 'min-height: var(--min-height); ';
		echo 'border-radius: ' . esc_attr( $borderradius ) . 'rem; ';
		echo '} ';

		echo ( ( class_exists( 'woocommerce' ) ) ? '.woocommerce .quantity input.qty, .quantity input.qty, .woocommerce input.input-text, .select2-container--default .select2-selection--single, ' : '' );
		echo '.form-control:not(:focus), select:not(:focus), input[type=search]:not(:focus), textarea:not(:focus) { ';
		if ( 0 !== $ctrlbtmborderwidth && ! empty( $ctrlbtmbordercolor ) ) {
			echo 'border-bottom: ' . esc_attr( $ctrlbtmborderwidth ) . 'px solid ' . esc_attr( $ctrlbtmbordercolor ) . '; ';
		} else {
			echo 'border-bottom: 0; ';
		}
		echo '} ';

		echo ( ( class_exists( 'woocommerce' ) ) ? '.woocommerce .quantity input.qty:focus, .quantity input.qty:focus, .woocommerce input.input-text:focus, .select2-container--default .select2-selection--single:focus, ' : '' );
		echo '.form-control:focus, select:focus, input[type=search]:focus, textarea:focus { ';
		if ( 0 !== $ctrlborderwidth && ! empty( $ctrlbordercolofocus ) ) {
			echo 'border: ' . esc_attr( $ctrlborderwidth ) . 'px solid ' . esc_attr( $ctrlbordercolofocus ) . '; ';
		}
		if ( 0 !== $ctrlbtmborderwidth && ! empty( $ctrlbtmbordercolorfocus ) ) {
			echo 'border-bottom: ' . esc_attr( $ctrlbtmborderwidth ) . 'px solid ' . esc_attr( $ctrlbtmbordercolorfocus ) . '; ';
		}
		echo '} ';

		echo ( ( class_exists( 'woocommerce' ) ) ? '.woocommerce .quantity input.qty:focus:invalid, .quantity input.qty:focus:invalid, .woocommerce input.input-text:focus:invalid, .select2-container--default .select2-selection--single:focus:invalid, ' : '' );
		echo '.form-control:focus:invalid, input[type=search]:focus:invalid, textarea:focus:invalid { ';
		echo 'border-bottom: ' . esc_attr( $ctrlbtmborderwidth ) . 'px solid ' . esc_attr( $ctrlbtmbordercolorinv ) . '; ';
		echo '} ';

		// Border radius
		if ( 0 != $borderradius && $borderradius < 1 ) {
			echo '.checkbox input[type="checkbox"]+span::before, .card { ';
			echo 'border-radius: ' . esc_attr( $borderradius ) . 'rem; }';
		} elseif ( 0 != $borderradius && $borderradius >= 1 ) {
			echo '.checkbox input[type="checkbox"]+span::before, .card { ';
			echo 'border-radius: .6rem; }';
		}

		// Caldera form controls
		if ( defined( 'CFCORE_VER' ) ) {
			echo '.theme-dfu-busacc .caldera-grid .ccselect2-container.form-control, .theme-dfu-busacc .caldera-grid .ccselect2-container.form-control:hover { ';
			if ( 0 !== $ctrlborderwidth && ! empty( $ctrlbordercolor ) ) {
				echo 'border: ' . esc_attr( $ctrlborderwidth ) . 'px solid ' . esc_attr( $ctrlbordercolor ) . '; ';
			} else {
				echo 'border: 0; ';
			}
			echo 'border-bottom: ' . esc_attr( $ctrlbtmborderwidth ) . 'px solid ' . esc_attr( $ctrlbtmbordercolor ) . '; ';
			echo '} ';

			echo '.theme-dfu-busacc .caldera-grid .ccselect2-container.form-control:focus { ';
			if ( 0 !== $ctrlborderwidth && ! empty( $ctrlbordercolofocus ) ) {
				echo 'border: ' . esc_attr( $ctrlborderwidth ) . 'px solid ' . esc_attr( $ctrlbordercolofocus ) . '; ';
			}
			if ( 0 !== $ctrlbtmborderwidth && ! empty( $ctrlbtmbordercolorfocus ) ) {
				echo 'border-bottom: ' . esc_attr( $ctrlbtmborderwidth ) . 'px solid ' . esc_attr( $ctrlbtmbordercolorfocus ) . '; ';
			}
			echo '} ';

			echo '.theme-dfu-busacc .caldera-grid .ccselect2-container.form-control:focus:invalid { ';
			echo 'border-bottom: ' . esc_attr( $ctrlbtmborderwidth ) . 'px solid ' . esc_attr( $ctrlbtmbordercolorinv ) . '; ';
			echo '} ';

			echo '.ccselect2-container a.ccselect2-choice { ';
			echo 'min-height: ' . esc_attr( $minheight ) . 'rem; ';
			echo 'line-height: ' . esc_attr( $minheight ) . 'rem; ';
			echo 'border-radius: ' . esc_attr( $borderradius ) . 'rem; ';
			echo 'background-color: ' . esc_attr( $inputbgcolor ) . '; ';
			echo 'border: 0 !important; ';
			echo 'background-image: none; ';
			echo '} ';
			
			echo '.ccselect2-container a.ccselect2-choice .ccselect2-arrow b { ';
			echo 'background-position-y: 5px; ';
			echo '} ';
		}

		// WC dropdown
		if ( class_exists( 'woocommerce' ) && ! empty( $ctrlbordercolor ) ) {
			echo '.select2-dropdown { border-color: ' . esc_attr( $ctrlbordercolor ) . '; } ';
		}

		echo 'input[type="text"]::-webkit-input-placeholder, input[type="email"]::-webkit-input-placeholder, input[type="url"]::-webkit-input-placeholder, ';
		echo 'input[type="password"]::-webkit-input-placeholder, input[type="search"]::-webkit-input-placeholder, input[type="number"]::-webkit-input-placeholder, ';
		echo 'input[type="tel"]::-webkit-input-placeholder, input[type="range"]::-webkit-input-placeholder, input[type="date"]::-webkit-input-placeholder, ';
		echo 'input[type="month"]::-webkit-input-placeholder, input[type="week"]::-webkit-input-placeholder, input[type="time"]::-webkit-input-placeholder, ';
		echo 'input[type="datetime"]::-webkit-input-placeholder, input[type="datetime-local"]::-webkit-input-placeholder, input[type="color"]::-webkit-input-placeholder, ';
		echo 'textarea::-webkit-input-placeholder, .form-control::-webkit-input-placeholder { ';
		echo 'color: ' . esc_attr( $inputtext ) . '; ';
		echo '}';

		echo ( ( class_exists( 'woocommerce' ) ) ? '.select2-container--default .select2-selection--single, ' : '' );
		echo 'input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], ';
		echo 'input[type="tel"], input[type="range"]' . ( class_exists( 'woocommerce' ) ? ':not(.wc-block-price-filter__range-input)' : '' ) . ', input[type="date"], input[type="month"], input[type="week"], input[type="time"], ';
		echo 'input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea, .form-control, select { ';
		echo 'background-color: ' . esc_attr( $inputbgcolor ) . '; ';
		echo '}';
		echo ( ( class_exists( 'woocommerce' ) ) ? '.select2-container--default .select2-selection--single:focus, ' : '' );
		echo 'input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="search"]:focus, input[type="number"]:focus, ';
		echo 'input[type="tel"]:focus, input[type="range"]' . ( class_exists( 'woocommerce' ) ? ':not(.wc-block-price-filter__range-input)' : '' ) . ':focus, input[type="date"]:focus, input[type="month"]:focus, input[type="week"]:focus, input[type="time"]:focus, ';
		echo 'input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="color"]:focus, textarea:focus, .form-control:focus, select:focus { ';
		echo 'background-color: ' . esc_attr( $inputfocuscolor ) . '; ';
		echo '}';

		// WooCommerce
		if ( class_exists( 'woocommerce' ) ) {
			// root
			$wcdefault = array(
				'ptxt'   => '#0088cc',
				'msg'    => '#0f834d',
				'info'   => '#1e73be',
				'error'  => '#e2401c',
			);
			$wcmisccolors = get_theme_mod( 'dba_wc_misc_colors', $wcdefault );
			$msgcolor = $wcmisccolors['msg'];
			$infocolor = $wcmisccolors['info'];
			$errcolor = $wcmisccolors['error'];
			echo ':root {';
			echo '--wc-error-color: ' . esc_attr( $errcolor ) . '; ';
			echo '--wc-info-color: ' . esc_attr( $infocolor ) . '; ';
			echo '--wc-msg-color: ' . esc_attr( $msgcolor ) . '; ';
			echo '} ';
			// Title
			$h2font = get_theme_mod( 'dba_h2_font', dfu_busacc_fn_get_font_defaults( 'h2', $greys ) );
			echo 'a.wc-block-grid__product-link { color: ' . esc_attr( $h2font['color'] ) . '; }';
			echo 'a.wc-block-grid__product-link:hover { color: var(--color-primary1); text-decoration: none; }';
			//price
			$pricecolor = $wcmisccolors['ptxt'];
			echo '.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .wc-block-grid__product-price.price { color: ' . esc_attr( $pricecolor ) . '; } ';
			// sale tag
			$stagborderwidth = get_theme_mod( 'dba_wc_sale_border' );
			$stagborderradius = get_theme_mod( 'dba_wc_sale_border_radius' );
			$wcsaledefault = array(
				'text'   => '#f0f1f2',
				'bg'     => '#0088cc',
			);
			$stagcolors = get_theme_mod( 'dba_wc_sale_color', $wcsaledefault );
			$stagtxt = $stagcolors['text'];
			$stagbg = $stagcolors['bg'];
			$stagborder = get_theme_mod( 'dba_wc_sale_border_color', '#0088cc' );
			$stagbggrad = get_theme_mod( 'dba_wc_sale_tag_gradient', false );
			$stagbgdark = dfu_busacc_fn_hextint( $stagbg, 0.5, 's', 1 );
			$stagstyle = get_theme_mod( 'dba_wc_sale_tag_style', 'onsale' );
			echo ':root {';
			echo '--wc-sale-text: ' . esc_attr( $stagtxt ) . '; ';
			echo '--wc-sale-background1: ' . esc_attr( $stagbg ) . '; ';
			echo '--wc-sale-background2: ' . esc_attr( $stagbgdark ) . '; ';
			echo '--wc-sale-border: ' . esc_attr( $stagborder ) . '; ';
			echo '}';
			if ( 'onsale' == $stagstyle ) {
				// Shop
				echo '.woocommerce ul.products li.product .onsale, .woocommerce span.onsale, .wc-block-grid__product-onsale { ';
				echo 'background-color: var(--wc-sale-background1); ';
				if ( $stagbggrad ) {
					echo 'background: linear-gradient(to right, var(--wc-sale-background1) 0%, var(--wc-sale-background2) 100%); ';
				}
				if ( $stagborderwidth && '0' !== $stagborderwidth ) {
					echo 'border: ' . esc_attr( $stagborderwidth ) . 'px solid ' . esc_attr( $stagborder ) . '; ';
				}
				echo 'border-radius: ' . esc_attr( $stagborderradius ) . '%; ';
				echo '} ';
			}
			// single product page - thumbnail
			$numthumbnail = get_theme_mod( 'dba_wc_sglprod_thumbnail_row', 4 );
			$tnpercent = 100 / $numthumbnail;
			echo '.woocommerce div.product div.images .flex-control-thumbs li { width: ' . esc_attr( $tnpercent ) . '% !important; } ';
			// single product page - image/summary split
			$prodimgwidth = get_theme_mod( 'dba_wc_sglprod_img_width', '6' );
			switch ( $prodimgwidth ) {
				case '4':
					$mdimgwthl = 48;
					$lgimgwthl = 32;
					break;
				case '5':
					$mdimgwthl = 48;
					$lgimgwthl = 40;
					break;
				case '6':
					$mdimgwthl = 48;
					$lgimgwthl = 48;
					break;
				case '7':
					$mdimgwthl = 56;
					$lgimgwthl = 56;
					break;
				case '8':
					$mdimgwthl = 64;
					$lgimgwthl = 64;
					break;
			}
			$mdimgwthr = 96 - $mdimgwthl;
			$lgimgwthr = 96 - $lgimgwthl;
			if ( 12 != $prodimgwidth ) {
				echo '@media screen and (min-width: 768px) { ';
				echo '.woocommerce #content div.product div.images, .woocommerce div.product div.images, .woocommerce-page #content div.product div.images, .woocommerce-page div.product div.images { ';
				echo 'float: left; width: ' . esc_attr( $mdimgwthl ) . '%; ';
				echo '} ';
				echo '.woocommerce #content div.product div.summary, .woocommerce div.product div.summary, .woocommerce-page #content div.product div.summary, .woocommerce-page div.product div.summary { ';
				echo 'float: left; width: ' . esc_attr( $mdimgwthr ) . '%; ';
				if ( $mdimgwthr <= 48 ) {
					echo 'float: right; clear: none; ';
				}
				echo '} ';
				echo '} ';
				echo '@media screen and (min-width: 992px) { ';
				echo '.woocommerce #content div.product div.images, .woocommerce div.product div.images, .woocommerce-page #content div.product div.images, .woocommerce-page div.product div.images { ';
				echo 'width: ' . esc_attr( $lgimgwthl ) . '%; ';
				echo '} ';
				echo '.woocommerce #content div.product div.summary, .woocommerce div.product div.summary, .woocommerce-page #content div.product div.summary, .woocommerce-page div.product div.summary { ';
				echo 'width: ' . esc_attr( $lgimgwthr ) . '%; ';
				echo '} ';
				echo '} ';
				echo '@media screen and (max-width: 768px) { ';
				echo '.woocommerce #content div.product div.images, .woocommerce div.product div.images, .woocommerce-page #content div.product div.images, .woocommerce-page div.product div.images, ';
				echo '.woocommerce #content div.product div.summary, .woocommerce div.product div.summary, .woocommerce-page #content div.product div.summary, .woocommerce-page div.product div.summary ';
				echo '{ float: none; width: 100%; } ';
				echo '} ';
			}
			// single product - sticky summary
			$stickyprodsummary = get_theme_mod( 'dba_wc_sglprod_sticky_summary', false );
			if ( $stickyprodsummary ) {
				$wcstickysumfromwidth = get_theme_mod( 'dba_wc_sglprod_stickysum_from_wth', 768 );
				$wcsglprodsidebar = get_theme_mod( 'dba_wc_product_sidebar', '' );
				$wcsbwidth = get_theme_mod( 'dba_wc_sidebar_width' );
				$wcstickysumxpos = get_theme_mod( 'dba_wc_sglprod_stickysum_xpos', 'right' );
				$wcstickysumypos = get_theme_mod( 'dba_wc_sglprod_stickysum_ypos', '100' );
				$wcstickysumfixwth = get_theme_mod( 'dba_wc_sglprod_stickysum_fixwidth', false );
				if ( true == $wcstickysumfixwth ) {
					$wcstickysumwth = get_theme_mod( 'dba_wc_sglprod_stickysum_width', 220 );
				}
				$wcstickysumbgcolor = get_theme_mod( 'dba_wc_sglprod_stickysum_bgcolor' );
				if ( $wcstickysumbgcolor ) {
					$stickysumbgopacity = get_theme_mod( 'dba_wc_sglprod_stickysum_bgopacity', 1 );
					$stickysumbgcolorrgb = dfu_busacc_fn_hex2rgb( $wcstickysumbgcolor );
					$stickysumbgcolorrgba = 'rgba(' . $stickysumbgcolorrgb['r'] . ',' . $stickysumbgcolorrgb['g'] . ',' . $stickysumbgcolorrgb['b'] . ', ' . $stickysumbgopacity . ')';
				}
				if ( $wcsglprodsidebar && '' != $wcsglprodsidebar && is_active_sidebar( $wcsglprodsidebar ) && ! empty( $wcsbwidth ) ) {
					if ( 'original' !== $wcstickysumxpos && true == $wcstickysumfixwth ) {
						echo ':root { ';
						echo '--wc-sglprodmdr: ' . esc_attr( $mdimgwthr ) . '; ';
						echo '--wc-sglprodlgr: ' . esc_attr( $lgimgwthr ) . '; ';
						echo '--wc-sglprodsbwidth: ' . esc_attr( $wcsbwidth ) . '; ';  //3
						echo '}';
						$prodinfowidth1 = 'calc((95%*(12 - var(--wc-sglprodsbwidth))/12 - 30px)*(var(--wc-sglprodmdr)/100) )';
						$prodinfopos1 = 'calc( 2.5% + (95% - (95%*(var(--wc-sglprodsbwidth)/12)) - 15px - ( 95% - 30px - (95%*(var(--wc-sglprodsbwidth)/12)) )*(var(--wc-sglprodmdr)/100) ))';
						$prodinfowidth2 = 'calc((95%*(12 - var(--wc-sglprodsbwidth))/12 - 30px)*(var(--wc-sglprodlgr)/100) )';
						$prodinfopos2 = 'calc( 2.5% + (95% - (95%*(var(--wc-sglprodsbwidth)/12)) - 15px - (95% - 30px - (95%*(var(--wc-sglprodsbwidth)/12)) )*(var(--wc-sglprodlgr)/100) ))';
						$prodinfowidth3 = 'calc((1380px*(12 - var(--wc-sglprodsbwidth))/12 - 30px)*(var(--wc-sglprodlgr)/100) )';
						$prodinfopos3 = 'calc( (100% - 1380px)*0.5 + (1380px - (1380px*(var(--wc-sglprodsbwidth)/12)) - 15px - (1380px - 30px - (1380px*(var(--wc-sglprodsbwidth)/12)) )*(var(--wc-sglprodlgr)/100) ))';
					}
				} else {
					if ( 'original' !== $wcstickysumxpos && true == $wcstickysumfixwth ) {
						echo ':root { ';
						echo '--wc-sglprodmdr: ' . esc_attr( $mdimgwthr ) . '; ';
						echo '--wc-sglprodlgr: ' . esc_attr( $lgimgwthr ) . '; ';
						echo '}';
						$prodinfowidth1 = 'calc((95% - 30px)*(var(--wc-sglprodmdr)/100))';
						$prodinfopos1 = 'calc( 2.5% + (95% - 15px - ( (95% - 30px)*(var(--wc-sglprodmdr)/100) )))';
						$prodinfowidth2 = 'calc((95% - 30px)*(var(--wc-sglprodlgr)/100))';
						$prodinfopos2 = 'calc( 2.5% + (95% - 15px - ((95% - 30px)*(var(--wc-sglprodlgr)/100))))';
						$prodinfowidth3 = 'calc((1380px - 30px)*(var(--wc-sglprodlgr)/100))';
						$prodinfopos3 = 'calc((100% - 1380px)*0.5 + (1380px - 15px - ((1380px - 30px)*(var(--wc-sglprodlgr)/100))))';
					}
				}
				if ( $wcstickysumfromwidth >= 768 && $wcstickysumfromwidth < 992 ) {
					echo '@media screen and (min-width: 768px) { ';
					echo '.woocommerce .summary.entry-summary.sticky { ';
					echo ( ! empty( $wcstickysumbgcolor ) ? 'background-color: ' . esc_attr( $stickysumbgcolorrgba ) . '; ' : '' );
					echo 'position: fixed; z-index: 99; ';
					echo 'top: ' . esc_attr( $wcstickysumypos ) . 'px; ';
					if ( true == $wcstickysumfixwth ) {
						echo 'width: ' . esc_attr( $wcstickysumwth ) . 'px !important; ';
					} else {
						echo 'width: ' . esc_attr( $prodinfowidth1 ) . '!important; ';
					}
					if ( 'original' == $wcstickysumxpos ) {
						echo 'left: ' . esc_attr( $prodinfopos1 ) . '; ';
					} elseif ( 'left' == $wcstickysumxpos ) {
						echo 'left: .5rem; ';
					} elseif ( 'right' == $wcstickysumxpos ) {
						echo 'right: .5rem; ';
					}
					echo 'box-shadow: 0 8px 12px 0 rgba(0,0,0,0.1); }';
					echo '}';
				}

				if ( $wcstickysumfromwidth >= 768 && $wcstickysumfromwidth < 1440 ) {
					echo '@media screen and (min-width: 992px) { ';
					echo '.woocommerce .summary.entry-summary.sticky { ';
					echo ( ! empty( $wcstickysumbgcolor ) ? 'background-color: ' . esc_attr( $stickysumbgcolorrgba ) . '; ' : '' );
					echo 'position: fixed; z-index: 99; ';
					echo 'top: ' . esc_attr( $wcstickysumypos ) . 'px; ';
					if ( true == $wcstickysumfixwth ) {
						echo 'width: ' . esc_attr( $wcstickysumwth ) . 'px !important; ';
					} else {
						echo 'width: ' . esc_attr( $prodinfowidth2 ) . '!important; ';
					}
					if ( 'original' == $wcstickysumxpos ) {
						echo 'left: ' . esc_attr( $prodinfopos2 ) . '; ';
					} elseif ( 'left' == $wcstickysumxpos ) {
						echo 'left: .5rem; ';
					} elseif ( 'right' == $wcstickysumxpos ) {
						echo 'right: .5rem; ';
					}
					echo 'box-shadow: 0 8px 12px 0 rgba(0,0,0,0.1); }';
					echo '}';
				}

				echo '@media screen and (min-width: 1440px) { ';
				echo '.woocommerce .summary.entry-summary.sticky { ';
				echo ( ! empty( $wcstickysumbgcolor ) ? 'background-color: ' . esc_attr( $stickysumbgcolorrgba ) . '; ' : '' );
				echo 'position: fixed; z-index: 99; ';
				echo 'top: ' . esc_attr( $wcstickysumypos ) . 'px; ';
				if ( true == $wcstickysumfixwth ) {
					echo 'width: ' . esc_attr( $wcstickysumwth ) . 'px !important; ';
				} else {
					echo 'width: ' . esc_attr( $prodinfowidth3 ) . '!important; ';
				}
				if ( 'original' == $wcstickysumxpos ) {
					echo 'left: ' . esc_attr( $prodinfopos3 ) . '; ';
				} elseif ( 'left' == $wcstickysumxpos ) {
					echo 'left: .5rem; ';
				} elseif ( 'right' == $wcstickysumxpos ) {
					echo 'right: .5rem; ';
				}
				echo 'box-shadow: 0 8px 12px 0 rgba(0,0,0,0.1); }';
				echo '}';
			}

			// Cart & checkout
			echo '.woocommerce table.shop_table, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register, .select2-dropdown { ';
			echo 'border-radius: ' . esc_attr( $borderradius ) . 'rem; } ';
			$xsellpos = get_theme_mod( 'dba_wc_cart_xsell_pos', 'default' );
			if ( 'default' != $xsellpos ) {
				// full width cart totals
				echo '.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals { ';
				echo 'width: 100%; float: none;';
				echo '} ';
			}
			echo '.select2-container--default .select2-selection--single .select2-selection__rendered, .select2-container--default .select2-selection--single .select2-selection__arrow { ';
			echo 'line-height: var(--min-height); ';
			echo 'height: var(--min-height); ';
			echo '}';

		}

		// Header text
		$header_text_color = get_header_textcolor();
		if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color ) {
			if ( ! display_header_text() ) :
				echo '.site-title, .site-description { position: absolute; clip: rect(1px, 1px, 1px, 1px); } ';
			else :
				echo '.site-title, .site-description { color: ' . esc_attr( $header_text_color ) . '; } ';
			endif;
		}

		// Custom background
		$coloronbgimg = get_theme_mod( 'dba_bgcolor_ontop', false );
		if ( $coloronbgimg ) {
			$colouropacity = get_theme_mod( 'dba_bgcolor_ontop_opacity' );
			$bgcolor = get_background_color();
			if ( empty( $bgcolor ) ) {
				$bgcolor = 'ffffff';
			}
			echo '.dba-main-content { background-color: #' . esc_attr( $bgcolor ) . '; ' . ( ! empty( $colouropacity ) ? 'opacity: ' . esc_attr( $colouropacity ) . ';' : '' ) . ' }';
		}
		$bgimghponly = get_theme_mod( 'dba_bgimg_hponly' );
		if ( true == $bgimghponly ) {
			echo 'body:not(.home).custom-background {background-image: none; }';
		}

		// Topbar
		$showtopbar = get_theme_mod( 'dba_topbar', false );
		if ( $showtopbar ) {
			$topbarbgcolor = get_theme_mod( 'dba_topbar_colour', '' );
			if ( ! empty( $topbarbgcolor['bg'] ) ) {
				echo '.site-topbar { background-color: ' . esc_attr( $topbarbgcolor['bg'] ) . '; } ';
			}
		}

		// Theme Menu
		if ( ! class_exists( 'Mega_Menu' ) ) {
			$menudropdownradius = get_theme_mod( 'dba_menu_dropdown_border_radius', 0 );
			echo '.dropdown-menu { border-radius: ' . esc_attr( $menudropdownradius ) . 'rem; }';
		}

		// Sticky menu
		$usestickymenu = get_theme_mod( 'dba_stickymenu', false );
		if ( $usestickymenu ) {
			$stickmenuopacity = get_theme_mod( 'dba_stickymenu_opacity', '' );
			echo ( ! empty( $stickmenuopacity ) ? '.site-mainnav.stickyheader { opacity: ' . esc_attr( $stickmenuopacity ) . '; } ' : '' );
			if ( is_admin_bar_showing() ) {
				echo '.site-mainnav.stickyheader { top: 32px; }';
				echo '@media screen and (max-width: 782px) { .site-mainnav.stickyheader { top: 46px; } }';
			}
		}

		// Layout
		$defaultlayout = array(
			'header'      => '#f0f1f2',
			'top-footer'  => '#f0f1f2',
			'btm-footer'  => '#f0f1f2',
		);
		$layoutcolor = get_theme_mod( 'dba_layout', $defaultlayout );
		echo '.site-header, .site-mainnav { background-color: ' . esc_attr( $layoutcolor['header'] ) . '; } ';
		echo '.dba-top-footer { background-color: ' . esc_attr( $layoutcolor['top-footer'] ) . '; } ';
		echo '.dba-btm-footer { background-color: ' . esc_attr( $layoutcolor['btm-footer'] ) . '; } ';

		// Widgets
		$defaultwidgetcolor = array(
			'sidebar-head'  => '#2c3234',
			'footer-head'   => '#2c3234',
			'sidebar-text'  => '#28292a',
			'footer-text'   => '#28292a',
		);
		$widgetcolor = get_theme_mod( 'dba_widgets', $defaultwidgetcolor );
		echo '#secondary .dba-widget-title { color: ' . esc_attr( $widgetcolor['sidebar-head'] ) . '; } ';
		echo '#footer .dba-widget-title { color: ' . esc_attr( $widgetcolor['footer-head'] ) . '; } ';
		echo '#secondary { color: ' . esc_attr( $widgetcolor['sidebar-text'] ) . '; } ';
		echo '#footer { color: ' . esc_attr( $widgetcolor['footer-text'] ) . '; } ';

		// Front page custom header
		$showcustomheader = get_theme_mod( 'dba_hp_custom_header', false );
		if ( $showcustomheader ) {
			$headimgbgcolor = get_theme_mod( 'dba_hp_headimg_sect_dba_bgcolor', '' );
			if ( ! empty( $headimgbgcolor ) ) {
				echo '.hp-header-img { background-color: ' . esc_attr( $headimgbgcolor ) . '; } ';
			}
			$headimgimgbgcolor = get_theme_mod( 'dba_hp_headimg_bgcolor', '' );
			if ( ! empty( $headimgimgbgcolor ) ) {
				echo '.dba-hp-header-img { background-color: ' . esc_attr( $headimgimgbgcolor ) . '; } ';
			}
			$headimgtxtcolor = get_theme_mod( 'dba_hp_headimg_txt_bgcolor', '' );
			if ( ! empty( $headimgtxtcolor ) ) {
				$headerstyle = get_theme_mod( 'dba_hp_headimg_style', '1' );
				if ( '1' == $headerstyle ) {
					echo '.dba-hp-header-txt { background-color: ' . esc_attr( $headimgtxtcolor ) . '; } ';
				} elseif ( '2' == $headerstyle ) {
					$txtbgopacity = get_theme_mod( 'dba_hp_headimg_text_bgopacity', 1 );
					$txtbgcolorrgb = dfu_busacc_fn_hex2rgb( $headimgtxtcolor );
					$txtbgcolorrgba = 'rgba(' . $txtbgcolorrgb['r'] . ',' . $txtbgcolorrgb['g'] . ',' . $txtbgcolorrgb['b'] . ', ' . $txtbgopacity . ')';
					echo '.dba-hp-header-txtonimg { background-color: ' . esc_attr( $txtbgcolorrgba ) . '; } ';
				}
			}
			// customer header image filter
			$customheaderfilter = get_theme_mod( 'dba_hp_headimg_filter', 'none' );
			if ( 'none' !== $customheaderfilter ) {
				if ( get_theme_mod( 'dba_hp_headimg_slider', false ) ) {
					echo '#dbaProductSlider ';
				} else {
					echo '#hp-headerimg ';
				}
				$customheaderfilterperc = get_theme_mod( 'dba_hp_headimg_filter_perc', 50 );
				echo 'img { filter:' . esc_attr( $customheaderfilter ) . '(' . esc_attr( $customheaderfilterperc ) . '%); -webkit-filter:' . esc_attr( $customheaderfilter ) . '(' . esc_attr( $customheaderfilterperc ) . '%);' . '}';
			}
		}

		// Title - styles
		$defaulttitlecolor = get_theme_mod( 'dba_default_title_color' );
		$decor1 = get_theme_mod( 'dba_default_title_style1', '\25FC' );
		$decor2 = get_theme_mod( 'dba_default_title_style2', '\25CF' );
		$decor3 = get_theme_mod( 'dba_default_title_style3', '\2724' );
		$decor4 = get_theme_mod( 'dba_default_title_style4', '\273D' );
		$decor5 = get_theme_mod( 'dba_default_title_style5', '\2744' );
		$border1 = get_theme_mod( 'dba_default_title_style1_border', 5 );
		$border2 = get_theme_mod( 'dba_default_title_style2_border', 2 );
		$border3 = get_theme_mod( 'dba_default_title_style3_border', 3 );
		$border4 = get_theme_mod( 'dba_default_title_style4_border', 4 );
		$border5 = get_theme_mod( 'dba_default_title_style5_border', 5 );
		$border6 = get_theme_mod( 'dba_default_title_style5_border', 5 );
		$decorhover = get_theme_mod( 'dba_default_hover_title_style', '\27A6' );
		echo '.dba-headstyle1 {';
		echo ' border-right: ' . esc_attr( $border1 ) . 'px solid transparent;';
		echo ' border-left: ' . esc_attr( $border1 ) . 'px solid transparent;';
		echo ( ! empty( $defaulttitlecolor['border'] ) ? ' border-bottom: ' . esc_attr( $border1 ) . 'px solid ' . esc_attr( $defaulttitlecolor['border'] ) . ';' : '' );
		echo ' } ';
		echo '.dba-headstyle1:after { content: "' . esc_attr( $decor1 ) . '"; } ';

		echo '.dba-headstyle2 {' ;
		echo ( ! empty( $defaulttitlecolor['bg'] ) ? ' background-color:' . esc_attr( $defaulttitlecolor['bg'] ) . '; ' : '' );
		echo ( ! empty( $defaulttitlecolor['border'] ) ? ' border-bottom: ' . esc_attr( $border2 ) . 'px dotted ' . esc_attr( $defaulttitlecolor['border'] ) . ';' : '' );
		echo ' } ';
		echo '.dba-headstyle2:after { content: "' . esc_attr( $decor2 ) . '"; } ';

		echo '.dba-headstyle3 {';
		echo ( ! empty( $defaulttitlecolor['bg'] ) ? ' background-color:' . esc_attr( $defaulttitlecolor['bg'] ) . '; ' : '' );
		echo ( ! empty( $defaulttitlecolor['border'] ) ? ' border-bottom: ' . esc_attr( $border3 ) . 'px solid ' . esc_attr( $defaulttitlecolor['border'] ) . ';' : '' );
		echo ' } ';
		echo '.dba-headstyle3:after { content: "' . esc_attr( $decor3 ) . '"; } ';

		echo '.dba-headstyle4 {';
		echo ( ! empty( $defaulttitlecolor['border'] ) ? ' border-bottom: ' . esc_attr( $border4 ) . 'px dashed ' . esc_attr( $defaulttitlecolor['border'] ) . ';' : '' );
		echo ' } ';
		echo '.dba-headstyle4:after { content: "' . esc_attr( $decor4 ) . '"; } ';

		echo '.dba-headstyle5 {';
		echo ( ! empty( $defaulttitlecolor['border'] ) ? ' border-bottom: ' . esc_attr( $border5 ) . 'px dashed ' . esc_attr( $defaulttitlecolor['border'] ) . ';' : '' );
		echo ' } ';
		echo '.dba-headstyle5:after { content: "' . esc_attr( $decor5 ) . '"; } ';

		echo '.dba-headstyle6:before, .dba-headstyle6:after { border-top: ' . esc_attr( $border6 ) . 'px double ' . esc_attr( $defaulttitlecolor['border'] ) . '; } ';

		echo '.dba-headstyle1::first-letter, .dba-headstyle2::first-letter, .dba-headstyle3::first-letter, .dba-headstyle4::first-letter, .dba-headstyle5::first-letter {';
		echo ( ! empty( $defaulttitlecolor['highlight'] ) ? ' color: ' . esc_attr( $defaulttitlecolor['highlight'] ) . ';' : '' );
		echo ' } ';
		echo '.dba-headstyle1:after, .dba-headstyle2:after, .dba-headstyle3:after, .dba-headstyle4:after, .dba-headstyle5:after {';
		echo ( ! empty( $defaulttitlecolor['highlight'] ) ? ' color: ' . esc_attr( $defaulttitlecolor['highlight'] ) . ';' : '' );
		echo ' } ';

		echo 'a:hover .dba-headstyle1:after, a:focus .dba-headstyle1:after, a:active .dba-headstyle1:after, a:hover .dba-headstyle2:after, a:focus .dba-headstyle2:after, a:active .dba-headstyle2:after, a:hover .dba-headstyle3:after, a:focus .dba-headstyle3:after, a:active .dba-headstyle3:after, a:hover .dba-headstyle4:after, a:focus .dba-headstyle4:after, a:active .dba-headstyle4:after, a:hover .dba-headstyle5:after, a:focus .dba-headstyle5:after, a:active .dba-headstyle5:after { font-size: inherit; content: "' . esc_attr( $decorhover ) .'"; } ';
		echo 'a:hover .dba-headstyle1, a:focus .dba-headstyle1, a:active .dba-headstyle1, a:hover .dba-headstyle2, a:focus .dba-headstyle2, a:active .dba-headstyle2, a:hover .dba-headstyle3, a:focus .dba-headstyle3, a:active .dba-headstyle3, a:hover .dba-headstyle4, a:focus .dba-headstyle4, a:active .dba-headstyle4, a:hover .dba-headstyle5, a:focus .dba-headstyle5, a:active .dba-headstyle5 {';
		echo ( ! empty( $defaulttitlecolor['hborder'] ) ? ' border-bottom-color: ' . esc_attr( $defaulttitlecolor['hborder'] ) . ';' : '' );
		echo ' } ';
		echo 'a:hover .dba-headstyle6:before, a:hover .dba-headstyle6:after {';
		echo ( ! empty( $defaulttitlecolor['hborder'] ) ? ' border-top-color: ' . esc_attr( $defaulttitlecolor['hborder'] ) . ';' : '' );
		echo ' } ';

		// CTA
		$showcta = get_theme_mod( 'dba_hp_cta', false );
		if ( $showcta ) {
			$ctabgtype = get_theme_mod( 'dba_hp_cta_bg_type', 'bgcolor' );
			if ( $ctabgtype && 'bgcolor' !== $ctabgtype ) {
				$bgimgid = get_theme_mod( 'dba_hp_cta_bgimg' );
				$fullbgimgurl = wp_get_attachment_image_src( $bgimgid, 'full' )[0];
				$xlbgimgurl = wp_get_attachment_image_src( $bgimgid, 'dfu-busacc-xl' )[0];
				$lgbgimgurl = wp_get_attachment_image_src( $bgimgid, 'large' )[0];
				$mdbgimgurl = wp_get_attachment_image_src( $bgimgid, 'medium_large' )[0];
				$smbgimgurl = wp_get_attachment_image_src( $bgimgid, 'dfu-busacc-md' )[0];
				$bgrepeat = get_theme_mod( 'dba_hp_cta_bg_repeat', 'no-repeat' );
				$bgattach = get_theme_mod( 'dba_hp_cta_bg_attachment', 'fixed' );
			}
			$ctatxtcolor = get_theme_mod( 'dba_hp_cta_txtcolor', '' );
			echo '.dba-cta, .dba-cta h2 { color: ' . esc_attr( $ctatxtcolor ) . '; } ';
			echo '.dba-cta {';
			if ( empty( $bgimgid ) && 'bgcolor' !== $ctabgtype ) {
				echo 'background: none;';
			} else {
				if ( 'bgcolor' !== $ctabgtype ) {
					echo 'background-image: url(' . esc_url( $smbgimgurl ) . '); ';
					echo 'background-repeat: ' . esc_attr( $bgrepeat ) . '; ';
					echo 'background-attachment: ' . esc_attr( $bgattach ) . '; ';
					echo 'background-position: center center; background-size: auto; min-height: 120px; ';
				}
				if ( 'bgimg' !== $ctabgtype ) {
					echo 'background-color: ' . esc_attr( get_theme_mod( 'dba_hp_cta_bgcolor', '#2c3234' ) ) . '; ';
				}
			}
			echo '} ';
			if ( ! empty( $bgimgid ) ) {
				if ( 'bgcolor' !== $ctabgtype ) {
					echo '@media screen and (min-width: 576px ) {';
					echo '.dba-cta {';
						echo 'background-image: url(' . esc_url( $mdbgimgurl ) . '); ';
					echo '} ';
					echo '} ';
					echo '@media screen and (min-width: 768px ) {';
					echo '.dba-cta {';
						echo 'background-image: url(' . esc_url( $lgbgimgurl ) . '); ';
					echo '} ';
					echo '} ';
					echo '@media screen and (min-width: 992px ) {';
					echo '.dba-cta {';
						echo 'background-image: url(' . esc_url( $xlbgimgurl ) . '); ';
					echo '} ';
					echo '} ';
					echo '@media screen and (min-width: 1200px ) {';
					echo '.dba-cta {';
						echo 'background-image: url(' . esc_url( $fullbgimgurl ) . '); ';
					echo '} ';
					echo '} ';
				}
			}
		}

		// Blog
		$usebadge = get_theme_mod( 'dba_blog_tag_use_badge', false );
		$badgecolor = get_theme_mod( 'dba_blog_badge_color' );
		if ( $usebadge ) {
			echo '.dba-badge-link a { color: ' . esc_attr( $badgecolor['text'] ) . '!important; } ';
			echo '.dba-badge-link a:hover, .dba-badge-link a:focus, .dba-badge-link a:active { border-bottom: 1px solid transparent !important; border-image-source: none !important; } ';
			echo '.dba-badge-link a:focus, .dba-badge-link a:active { text-decoration: underline; text-decoration-style: dashed; text-decoration-line: underline; box-shadow: var(--shadow-light); } ';
			echo '.dba-badge-link { background-color: ' . esc_attr( $badgecolor['bg'] ) . '; } ';
			echo '.dba-badge-link:hover, .dba-badge-link:focus, .dba-badge-link:active { background-color: ' . esc_attr( $badgecolor['hbg'] ) . '; } ';
			echo '.dba-badge-link:hover a, .dba-badge-link:focus a, .dba-badge-link:active a { color: ' . esc_attr( $badgecolor['htext'] ) . '!important; } ';
		}
		$blogheadico = get_theme_mod( 'dba_blog_header_ico_color' );
		$blogfootico = get_theme_mod( 'dba_blog_footer_ico_color' );
		echo '.dba-bloghead-ico { color: ' . esc_attr( $blogheadico ) . '; } ';
		echo '.dba-blogfoot-ico { color: ' . esc_attr( $blogfootico ) . '; } ';

		$imgpc = get_theme_mod( 'dba_blog_img_pc', 50 );
		echo '@media only screen and (min-width: 768px) {';
		echo '.dba-singlepost-img { max-width: ' . esc_attr( $imgpc ) . '%; } ';
		echo '} ';

		// Block editor
		$pri = $p1;
		$sec = $s1;
		if ( $pri && $sec ) { 
			$ctype = dfu_busacc_fn_colourcheck( $pri );
			$themecolors = dfu_busacc_fn_theme_colours( $pri, $sec );
			$greys = dfu_busacc_fn_getgreyscale( $pri );
		}
		echo '.has-primary-background-color { background-color: ' . esc_attr( $pri ) . '; }';
		echo '.has-primary-color { color: ' . esc_attr( $pri ) . '; }';
		echo '.has-primary-dark-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . '; }';
		echo '.has-primary-dark-color { color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . '; }';
		echo '.has-primary-light-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_lt85'] : $themecolors['pri_dk30'] ) ) . '; }';
		echo '.has-primary-light-color { color: ' . esc_attr( $themecolors['pri_lt90'] ) . '; }';

		echo '.has-secondary-background-color { background-color: ' . esc_attr( $sec ) . '; }';
		echo '.has-secondary-color { color: ' . esc_attr( $sec ) . '; }';
		echo '.has-secondary-dark-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . '; }';
		echo '.has-secondary-dark-color { color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . '; }';
		echo '.has-secondary-light-background-color { background-color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ) ) . '; }';
		echo '.has-secondary-light-color { color: ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ) ) . '; }';

		echo '.has-grey-background-color { background-color: ' . esc_attr( $greys['col5'] ) . '; }';
		echo '.has-grey-color { color: ' . esc_attr( $greys['col5'] ) . '; }';
		echo '.has-grey-dark-background-color { background-color: ' . esc_attr( $greys['col8'] ) . '; }';
		echo '.has-grey-dark-color { color: ' . esc_attr( $greys['col8'] ) . '; }';
		echo '.has-grey-light-background-color { background-color: ' . esc_attr( $greys['col2'] ) . '; }';
		echo '.has-grey-light-color { color: ' . esc_attr( $greys['col2'] ) . '; }';

		echo '.has-primary-to-secondary-gradient-background { background: linear-gradient(to right, ' . esc_attr( $pri ) . ' 0%, ' . esc_attr( $sec ) . ' 100%); }';
		echo '.has-primary-dark-to-secondary-dark-gradient-background { background: linear-gradient(to right, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . ' 100%); }';
		echo '.has-primary-light-to-secondary-light-gradient-background { background: linear-gradient(to right, ' . esc_attr( $themecolors['pri_lt90'] ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_lt90'] : $themecolors['sec_lt60'] ) ) . ' 100%); }';
		echo '.has-primary-to-primary-dark-gradient-background { background: linear-gradient(to right, ' . esc_attr( $pri ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['pri_dk40'] : $themecolors['pri_lt20'] ) ) . ' 100%); }';
		echo '.has-secondary-to-secondary-dark-gradient-background { background: linear-gradient(to right, ' . esc_attr( $sec ) . ' 0%, ' . esc_attr( ( 'dk' == $ctype ? $themecolors['sec_dk40'] : $themecolors['sec_lt70'] ) ) . ' 100%); }';

		echo '.wp-block-social-links .wp-social-link a { color: ' . esc_attr( $greys['col1'] ) . '; }';

		// Non mobile
		$breakpt2 = substr( dfu_busacc_fn_get_menu_breakpt(), 0, strpos ( dfu_busacc_fn_get_menu_breakpt(), 'px') ) + 1;
		echo '@media screen and (min-width: ' . esc_html( $breakpt2 ) . 'px' . ') {';
		echo '.site-topbar, .site-info { display: block; } ';
		echo '.dba-stickylogo { display: none; } ';
		if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
			if ( get_theme_mod( 'dba_header_layout', 1 ) == 2 ) {
				$menualign = get_theme_mod( 'dba_menu_align2', 'start' );
				switch ( $menualign ) {
					case 'start':
						$jcontent = 'flex-start';
						break;
					case 'end':
						$jcontent = 'flex-end';
						break;
					case 'center':
						$jcontent = 'center';
						break;
				}
				echo '#site-navigation > div { display: flex; flex-grow: 1; justify-content: ' . esc_attr( $jcontent ) . ' } ';
			} elseif ( get_theme_mod( 'dba_header_layout', 1 ) == 1 ) {
				if ( get_theme_mod( 'dba_menu_align1', 'end' ) == 'start' ) {
					echo '#site-navigation { justify-content: flex-start; } ';
				}
			}
		}
		echo '} ';

		// Mobile
		if ( class_exists( 'woocommerce' ) ) {
			$wcbottomcart = get_theme_mod( 'dba_wc_cart_icon_btm', false );
			$wcbottomcartmob = get_theme_mod( 'dba_wc_cart_icon_btm_mob_only', false );
			if ( true == $wcbottomcartmob ) {
				echo '@media screen and (min-width: ' . esc_html( dfu_busacc_fn_get_menu_breakpt() ) . ') {';
				echo '#dba-sticky-wc-cart { display: none; } ';
				echo '} ';
			}
		}

		echo '</style>';
	}
}

/**
 * Header inline css
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_header_inline_css' ) ) {
	function dfu_busacc_fn_header_inline_css( $term = '', $pid = false ) {
		$styles = '';
		// $term can also be a post id
		if ( function_exists( 'get_field' ) ) {
			$headertype = get_field( 'dbacf_header_type', $term );
			if ( $headertype && ( 'img' == $headertype['value'] || 'bgcolour' == $headertype['value'] ) ) {
				if ( 'img' == $headertype['value'] ) {
					$headerimg = get_field( 'dbacf_header_img', $term );
					if ( $headerimg ) { //Image group
						$img_size = $headerimg['dbacf_bg_img_size'];
						// Image location
						$img_from = $headerimg['dbacf_img_from'];
						if ( $img_from && 'featured' == $img_from ) {
							if ( has_post_thumbnail() ) {
								$imgid = get_post_thumbnail_id();
							}
						} elseif ( 'upload' == $img_from ) {
							$upl_img = $headerimg['dbacf_upload_img'];
							if ( ! empty( $upl_img ) ) {
								$imgid = $upl_img['id'];
							}
						}
						// Image position
						$bg_pos = $headerimg['dbacf_bg_position'];
						if ( $bg_pos && 'x-y' == $bg_pos ) {
							$x_pos = $headerimg['dbacf_x_position'];
							$y_pos = $headerimg['dbacf_y_position'];
							$img_pos = $x_pos . '%' . ' ' . $y_pos . '%';
						} else {
							$img_pos = $bg_pos;
						}
						//Image filter
						$img_filter = $headerimg['dbacf_img_filter'];
						if ( $img_filter && 'none' !== $img_filter ) {
							$img_filter_pc = $headerimg['dbacf_img_filter_percent'];
							if ( $img_filter_pc ) {
								$img_filter_txt = $img_filter . '(' . $img_filter_pc . '%)';
							}
						}
						//Image background repeat
						$img_repeat = $headerimg['dbacf_bg_repeat'];
						if ( empty( $img_repeat ) ) {
							$img_repeat = 'no-repeat';
						}
					}
				}
				//Header
				$imgbgcolour = get_field( 'dbacf_header_bg_colour', $term );
				$img_ht = get_field( 'dbacf_header_height', $term );
				$mimg_ht = get_field( 'dbacf_header_smldev_height', $term );
				if ( ! $img_ht ) {
					$img_ht = 280;
				}
				//Titles
				$showheadertitle = get_field( 'dbacf_show_title_on_header', $term );
				$headertitlecolor = get_field( 'dbacf_title_colour_on_header', $term );
				$centertitle = get_field( 'dbacf_center_title', $term );
				if ( ! $centertitle ) {
					$hpos = get_field( 'dbacf_horizontal_pos', $term );
					if ( '' == $hpos ) {
						$hpos = 'left';
					}
					$vpos = get_field( 'dbacf_vertical_pos', $term );
					if ( '' == $vpos ) {
						$vpos = 'top';
					}
					$title_x = get_field( 'dbacf_title_x', $term );
					$title_y = get_field( 'dbacf_title_y', $term );
				}
				if ( $showheadertitle && true == $showheadertitle ) { // show title
					if ( ! $centertitle ) {
						$styles .= '.titlepos { position: absolute; ';
						$styles .= $hpos . ': ' . esc_attr( $title_x ) . 'px; ';
						$styles .= $vpos . ': ' . esc_attr( $title_y ) . 'px; }';
					} else {
						$styles .= '.titlepos { position: absolute; ';
						$styles .= 'top: 50%; left: 50%; transform: translate(-50%, -50%); }';
					}
					if ( ! empty( $headertitlecolor ) ) {
						$styles .= '.dba-img-title { color: ' . esc_attr( $headertitlecolor ) . '; }';
					}
				}
				// Subtitle
				$showsubtitle = get_field( 'dbacf_show_subtitle', $term );
				if ( $showsubtitle && true == $showsubtitle ) {
					if ( true == $showheadertitle ) { //show title & subtitle
						$styles .= '.subtitlepos { padding: 5px 10px 0 ; }';
					} elseif ( false == $showheadertitle ) { // show subtitle only
						if ( ! $centertitle ) {
							$styles .= '.subtitlepos { position: absolute; ';
							$styles .= $hpos . ': ' . esc_attr( $title_x ) . 'px; ';
							$styles .= $vpos . ': ' . esc_attr( $title_y ) . 'px; }';
						} else {
							$styles .= '.subtitlepos { position: absolute; ';
							$styles .= 'top: 50%; left: 50%; transform: translate(-50%, -50%); }';
						}
					}
					if ( ! empty( $headertitlecolor ) ) {
						$styles .= '.dba-img-subtitle { color: ' . esc_attr( $headertitlecolor ) . '; }';
					}
				}

				$styles .= '.dba-headerimg { position: relative; }';
				if ( 'img' == $headertype['value'] ) {
					$styles .= '.img-cover { ';
					$styles .= 'background-color: ' . esc_attr( $imgbgcolour ) . '; ';
					$styles .= 'background-size: ' . esc_attr( $img_size ) . '; ';
					$styles .= 'background-position: ' . esc_attr( $img_pos ) . '; ';
					$styles .= 'height: ' . esc_attr( $img_ht ) . 'px; ';
					$styles .= 'background-repeat: ' . esc_attr( $img_repeat ) . '; ';
					if ( $img_filter && 'none' !== $img_filter && $img_filter_pc ) {
						$styles .= 'filter: ' . esc_attr( $img_filter_txt ) . '; ';
						$styles .= '-webkit-filter: ' . esc_attr( $img_filter_txt ) . '; ';
					}
					$styles .= '}';
					$styles .= dfu_busacc_fn_get_reponsive_img_css( $imgid, '.img-cover' );
				} elseif ( 'bgcolour' == $headertype['value'] ) {
					$styles .= '.img-cover { ';
					$styles .= 'background-color: ' . esc_attr( $imgbgcolour ) . '; ';
					$styles .= 'height: ' . esc_attr( $img_ht ) . 'px; }';
				}
				$styles .= '@media screen and (max-width: 767px) { ';
				$styles .= '.img-cover { ';
				$styles .= 'height: ' . esc_attr( $mimg_ht ) . 'px; }';
				$styles .= '}';
			}
		} else { // ACF not available
			// if not taxonomy or a page id provided
			if ( empty( $term ) || true == $pid ) {
				if ( true == $pid ) {
					$cid = $term;
				} else {
					$cid = get_the_ID();
				}
				$headertype = get_post_meta( $cid, 'dbacf_header_type', true );
				if ( $headertype && ( 'img' == $headertype || 'bgcolour' == $headertype ) ) {
					if ( 'img' == $headertype ) {
						$img_size = get_post_meta( $cid, 'dbacf_header_img_dbacf_bg_img_size', true );
						// Image location
						$img_from = get_post_meta( $cid, 'dbacf_header_img_dbacf_img_from', true );
						if ( $img_from && 'featured' == $img_from ) {
							if ( has_post_thumbnail() ) {
								// $url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
								$imgid = get_post_thumbnail_id();
							}
						} elseif ( 'upload' == $img_from ) {
							$upl_img = get_post_meta( $cid, 'dbacf_header_img_dbacf_upload_img', true );
							if ( ! empty( $upl_img ) ) {
								// $url = wp_get_attachment_image_src( $upl_img, 'full' );
								$imgid = $upl_img;
							};
						}
						// Image position
						$bg_pos = get_post_meta( $cid, 'dbacf_header_img_dbacf_bg_position', true );
						if ( $bg_pos && 'x-y' == $bg_pos ) {
							$x_pos = get_post_meta( $cid, 'dbacf_header_img_dbacf_x_position', true );
							$y_pos = get_post_meta( $cid, 'dbacf_header_img_dbacf_y_position', true );
							$img_pos = $x_pos . '%' . ' ' . $y_pos . '%';
						} else {
							$img_pos = $bg_pos;
						}
						//Image filter
						$img_filter = get_post_meta( $cid, 'dbacf_header_img_dbacf_img_filter', true );
						if ( $img_filter && 'none' !== $img_filter ) {
							$img_filter_pc = get_post_meta( $cid, 'dbacf_header_img_dbacf_img_filter_percent', true );
							if ( $img_filter_pc ) {
								$img_filter_txt = $img_filter . '(' . $img_filter_pc . '%)';
							}
						}
						//Image background repeat
						$img_repeat = get_post_meta( $cid, 'dbacf_header_img_dbacf_bg_repeat', true );
						if ( empty( $img_repeat ) ) {
							$img_repeat = 'no-repeat';
						}
					}
					//Header
					$imgbgcolour = get_post_meta( $cid, 'dbacf_header_bg_colour', true );
					$img_ht = get_post_meta( $cid, 'dbacf_header_height', true );
					$mimg_ht = get_post_meta( $cid, 'dbacf_header_smldev_height', true );
					if ( ! $img_ht ) {
						$img_ht = 280;
					}
					//Titles
					$showheadertitle = get_post_meta( $cid, 'dbacf_show_title_on_header', true );
					$headertitlecolor = get_post_meta( $cid, 'dbacf_title_colour_on_header', true );
					$centertitle = get_post_meta( $cid, 'dbacf_center_title', true );
					if ( ! $centertitle ) {
						$hpos = get_post_meta( $cid, 'dbacf_horizontal_pos', true );
						if ( '' == $hpos ) {
							$hpos = 'left';
						}
						$vpos = get_post_meta( $cid, 'dbacf_vertical_pos', true );
						if ( '' == $vpos ) {
							$vpos = 'top';
						}
						$title_x = get_post_meta( $cid, 'dbacf_title_x', true );
						$title_y = get_post_meta( $cid, 'dbacf_title_y', true );
					}
					if ( $showheadertitle && true == $showheadertitle ) { // show title
						if ( ! $centertitle ) {
							$styles .= '.titlepos { position: absolute; ';
							$styles .= $hpos . ': ' . esc_attr( $title_x ) . 'px; ';
							$styles .= $vpos . ': ' . esc_attr( $title_y ) . 'px; }';
						} else {
							$styles .= '.titlepos { position: absolute; ';
							$styles .= 'top: 50%; left: 50%; transform: translate(-50%, -50%); }';
						}
						if ( ! empty( $headertitlecolor ) ) {
							$styles .= '.dba-img-title { color: ' . esc_attr( $headertitlecolor ) . '; }';
						}
					}
					// Subtitle
					$showsubtitle = get_post_meta( $cid, 'dbacf_show_subtitle', true );
					if ( $showsubtitle && true == $showsubtitle ) {
						if ( true == $showheadertitle ) { //show title & subtitle
							$styles .= '.subtitlepos { padding: 5px 10px 0 ; }';
						} elseif ( false == $showheadertitle ) { // show subtitle only
							if ( ! $centertitle ) {
								$styles .= '.subtitlepos { position: absolute; ';
								$styles .= $hpos . ': ' . esc_attr( $title_x ) . 'px; ';
								$styles .= $vpos . ': ' . esc_attr( $title_y ) . 'px; }';
							} else {
								$styles .= '.subtitlepos { position: absolute; ';
								$styles .= 'top: 50%; left: 50%; transform: translate(-50%, -50%); }';
							}
						}
						if ( ! empty( $headertitlecolor ) ) {
							$styles .= '.dba-img-subtitle { color: ' . esc_attr( $headertitlecolor ) . '; }';
						}
					}

					$styles .= '.dba-headerimg { position: relative; }';
					if ( 'img' == $headertype ) {
						$styles .= '.img-cover { ';
						$styles .= 'background-color: ' . esc_attr( $imgbgcolour ) . '; ';
						$styles .= 'background-size: ' . esc_attr( $img_size ) . '; ';
						$styles .= 'background-position: ' . esc_attr( $img_pos ) . '; ';
						$styles .= 'height: ' . esc_attr( $img_ht ) . 'px; ';
						$styles .= 'background-repeat: ' . esc_attr( $img_repeat ) . '; ';
						if ( $img_filter && 'none' !== $img_filter && $img_filter_pc ) {
							$styles .= 'filter: ' . esc_attr( $img_filter_txt ) . '; ';
							$styles .= '-webkit-filter: ' . esc_attr( $img_filter_txt ) . '; ';
						}
						$styles .= '}';
						$styles .= dfu_busacc_fn_get_reponsive_img_css( $imgid, '.img-cover' );
					} elseif ( 'bgcolour' == $headertype ) {
						$styles .= '.img-cover { ';
						$styles .= 'background-color: ' . esc_attr( $imgbgcolour ) . '; ';
						$styles .= 'height: ' . esc_attr( $img_ht ) . 'px; }';
					}
					$styles .= '@media screen and (max-width: 767px) { ';
					$styles .= '.img-cover { ';
					$styles .= 'height: ' . esc_attr( $mimg_ht ) . 'px; }';
					$styles .= '}';
				}
			} else {
				// taxonomy
				$cid = $term->term_id;
				$headertype = get_term_meta( $cid, 'dbacf_header_type', true );
				if ( $headertype && ( 'img' == $headertype || 'bgcolour' == $headertype ) ) {
					if ( 'img' == $headertype ) {
						$img_size = get_term_meta( $cid, 'dbacf_header_img_dbacf_bg_img_size', true );
						// Image location
						$img_from = get_term_meta( $cid, 'dbacf_header_img_dbacf_img_from', true );
						if ( $img_from && 'featured' == $img_from ) {
							if ( has_post_thumbnail() ) {
								// $url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
								$imgid = get_post_thumbnail_id();
							}
						} elseif ( 'upload' == $img_from ) {
							$upl_img = get_term_meta( $cid, 'dbacf_header_img_dbacf_upload_img', true );
							if ( ! empty( $upl_img ) ) {
								// $url = wp_get_attachment_image_src( $upl_img, 'full' );
								$imgid = $upl_img;
							};
						}
						// Image position
						$bg_pos = get_term_meta( $cid, 'dbacf_header_img_dbacf_bg_position', true );
						if ( $bg_pos && 'x-y' == $bg_pos ) {
							$x_pos = get_term_meta( $cid, 'dbacf_header_img_dbacf_x_position', true );
							$y_pos = get_term_meta( $cid, 'dbacf_header_img_dbacf_y_position', true );
							$img_pos = $x_pos . '%' . ' ' . $y_pos . '%';
						} else {
							$img_pos = $bg_pos;
						}
						//Image filter
						$img_filter = get_term_meta( $cid, 'dbacf_header_img_dbacf_img_filter', true );
						if ( $img_filter && 'none' !== $img_filter ) {
							$img_filter_pc = get_term_meta( $cid, 'dbacf_header_img_dbacf_img_filter_percent', true );
							if ( $img_filter_pc ) {
								$img_filter_txt = $img_filter . '(' . $img_filter_pc . '%)';
							}
						}
						//Image background repeat
						$img_repeat = get_term_meta( $cid, 'dbacf_header_img_dbacf_bg_repeat', true );
						if ( empty( $img_repeat ) ) {
							$img_repeat = 'no-repeat';
						}
					}
					//Header
					$imgbgcolour = get_term_meta( $cid, 'dbacf_header_bg_colour', true );
					$img_ht = get_term_meta( $cid, 'dbacf_header_height', true );
					$mimg_ht = get_term_meta( $cid, 'dbacf_header_smldev_height', true );
					if ( ! $img_ht ) {
						$img_ht = 280;
					}
					//Titles
					$showheadertitle = get_term_meta( $cid, 'dbacf_show_title_on_header', true );
					$headertitlecolor = get_term_meta( $cid, 'dbacf_title_colour_on_header', true );
					$centertitle = get_term_meta( $cid, 'dbacf_center_title', true );
					if ( ! $centertitle ) {
						$hpos = get_term_meta( $cid, 'dbacf_horizontal_pos', true );
						if ( '' == $hpos ) {
							$hpos = 'left';
						}
						$vpos = get_term_meta( $cid, 'dbacf_vertical_pos', true );
						if ( '' == $vpos ) {
							$vpos = 'top';
						}
						$title_x = get_term_meta( $cid, 'dbacf_title_x', true );
						$title_y = get_term_meta( $cid, 'dbacf_title_y', true );
					}
					if ( $showheadertitle && true == $showheadertitle ) { // show title
						if ( ! $centertitle ) {
							$styles .= '.titlepos { position: absolute; ';
							$styles .= $hpos . ': ' . esc_attr( $title_x ) . 'px; ';
							$styles .= $vpos . ': ' . esc_attr( $title_y ) . 'px; }';
						} else {
							$styles .= '.titlepos { position: absolute; ';
							$styles .= 'top: 50%; left: 50%; transform: translate(-50%, -50%); }';
						}
						if ( ! empty( $headertitlecolor ) ) {
							$styles .= '.dba-img-title { color: ' . esc_attr( $headertitlecolor ) . '; }';
						}
					}
					// Subtitle
					$showsubtitle = get_term_meta( $cid, 'dbacf_show_subtitle', true );
					if ( $showsubtitle && true == $showsubtitle ) {
						if ( true == $showheadertitle ) { //show title & subtitle
							$styles .= '.subtitlepos { padding: 5px 10px 0 ; }';
						} elseif ( false == $showheadertitle ) { // show subtitle only
							if ( ! $centertitle ) {
								$styles .= '.subtitlepos { position: absolute; ';
								$styles .= $hpos . ': ' . esc_attr( $title_x ) . 'px; ';
								$styles .= $vpos . ': ' . esc_attr( $title_y ) . 'px; }';
							} else {
								$styles .= '.subtitlepos { position: absolute; ';
								$styles .= 'top: 50%; left: 50%; transform: translate(-50%, -50%); }';
							}
						}
						if ( ! empty( $headertitlecolor ) ) {
							$styles .= '.dba-img-subtitle { color: ' . esc_attr( $headertitlecolor ) . '; }';
						}
					}
	
					$styles .= '.dba-headerimg { position: relative; }';
					if ( 'img' == $headertype ) {
						$styles .= '.img-cover { ';
						$styles .= 'background-color: ' . esc_attr( $imgbgcolour ) . '; ';
						$styles .= 'background-size: ' . esc_attr( $img_size ) . '; ';
						$styles .= 'background-position: ' . esc_attr( $img_pos ) . '; ';
						$styles .= 'height: ' . esc_attr( $img_ht ) . 'px; ';
						$styles .= 'background-repeat: ' . esc_attr( $img_repeat ) . '; ';
						if ( $img_filter && 'none' !== $img_filter && $img_filter_pc ) {
							$styles .= 'filter: ' . esc_attr( $img_filter_txt ) . '; ';
							$styles .= '-webkit-filter: ' . esc_attr( $img_filter_txt ) . '; ';
						}
						$styles .= '}';
						$styles .= dfu_busacc_fn_get_reponsive_img_css( $imgid, '.img-cover' );
					} elseif ( 'bgcolour' == $headertype ) {
						$styles .= '.img-cover { ';
						$styles .= 'background-color: ' . esc_attr( $imgbgcolour ) . '; ';
						$styles .= 'height: ' . esc_attr( $img_ht ) . 'px; }';
					}
					$styles .= '@media screen and (max-width: 767px) { ';
					$styles .= '.img-cover { ';
					$styles .= 'height: ' . esc_attr( $mimg_ht ) . 'px; }';
					$styles .= '}';
				}
			}
		}
		return $styles;
	}
}


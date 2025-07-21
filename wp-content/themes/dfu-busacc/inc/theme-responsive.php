<?php
/**
 * Responsiveness functions for
 * 1) menu
 * 2) images
 * 3) bootstrap slider
 * 4) bootstrap columns breakdown
********************************************************************************************************************************************/

/**
 * Get responsive menu breakpoint
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_menu_breakpt' ) ) {
	function dfu_busacc_fn_get_menu_breakpt() {
		if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
			$menu_theme = mmm_get_theme_for_location( 'main-menu' );
			$menu_breakpoint = $menu_theme['responsive_breakpoint'];
			if ( empty( $menu_breakpoint ) ) {
				$menu_breakpoint = '600px';
			}
		} else {
			$breakpt = get_theme_mod( 'dba_menu_mob_breakpt', 'md' );
			switch ( $breakpt ) {
				case 'sm':
					$menu_breakpoint = '576px';
					break;
				case 'md':
					$menu_breakpoint = '768px';
					break;
				case 'lg':
					$menu_breakpoint = '992px';
					break;
				case 'xl':
					$menu_breakpoint = '1200px';
					break;
			}
		}
		return $menu_breakpoint;
	}
}

/**
 * Get responive image sizes for display based on number of items displayed in a row
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_img_size' ) ) {
	function dfu_busacc_fn_get_img_size( $numinrow ) {
		if ( 1 == $numinrow ) {
			$sizes = '100vw';
		} elseif ( 2 == $numinrow ) {
			$smsize = 100 / 2;
			$sizes = '(min-width: 576px) ' . $smsize . 'vw, 100vw';
		} elseif ( 3 == $numinrow ) {
			$smsize = 100 / 2;
			$lgsize = 100 / 3;
			$sizes = '(min-width: 576px) ' . $smsize . 'vw, (min-width: 992px) ' . $lgsize . 'vw, 100vw';
		} elseif ( 4 == $numinrow ) {
			$smsize = 100 / 2;
			$mdsize = 100 / 3;
			$lgsize = 100 / 4;
			$sizes = '(min-width: 576px) ' . $smsize . 'vw, (min-width: 768px) ' . $mdsize . 'vw, (min-width: 992px) ' . $lgsize . 'vw, 100vw';
		} elseif ( 5 == $numinrow ) {
			$smsize = 100 / 2;
			$mdsize = 100 / 4;
			$lgsize = 100 / 6;
			$sizes = '(min-width: 576px) ' . $smsize . 'vw, (min-width: 768px) ' . $mdsize . 'vw, (min-width: 992px) ' . $lgsize . 'vw, 100vw';
		} elseif ( 6 == $numinrow ) {
			$xssize = 100 / 2;
			$mdsize = 100 / 4;
			$lgsize = 100 / 6;
			$sizes = '(min-width: 576px) ' . $xssize . 'vw, (min-width: 768px) ' . $mdsize . 'vw, (min-width: 992px) ' . $lgsize . 'vw, 100vw';
		}
		return $sizes;
	}
}

/**
 * Get responive image sizes for display based on number of items displayed in a row (wide)
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_img_size_wide' ) ) {
	function dfu_busacc_fn_get_img_size_wide( $numinrow ) {
		if ( 1 == $numinrow ) {
			$sizes = '100vw';
		} elseif ( 2 == $numinrow ) {
			$mdsize = 100 / 2;
			$sizes = '(min-width: 768px) ' . $mdsize . 'vw, 100vw';
		} elseif ( 3 == $numinrow ) {
			$mdsize = 100 / 2;
			$lgsize = 100 / 3;
			$sizes = '(min-width: 768px) ' . $mdsize . 'vw, (min-width: 992px) ' . $lgsize . 'vw, 100vw';
		} elseif ( 4 == $numinrow ) {
			$mdsize = 100 / 3;
			$lgsize = 100 / 4;
			$sizes = '(min-width: 768px) ' . $mdsize . 'vw, (min-width: 992px) ' . $lgsize . 'vw, 100vw';
		}
		return $sizes;
	}
}

/**
 * Create HTML for responsive image with srcset
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_responsive_img_display' ) ) {
	function dfu_busacc_fn_get_responsive_img_display( $echo = true, $imgid, $sizes, $srcsize = 'full', $itemprop = '', $classes = '' ) {
		$src = esc_url( wp_get_attachment_image_src( $imgid, $srcsize )[0] );
		$width = wp_get_attachment_image_src( $imgid, $srcsize )[1];
		$height = wp_get_attachment_image_src( $imgid, $srcsize )[2];
		$srcset = wp_get_attachment_image_srcset( $imgid, $srcsize );
		$imgalt = esc_attr( trim( strip_tags( get_post_meta( $imgid, '_wp_attachment_image_alt', true ) ) ) );
		$type = get_post_mime_type( $imgid );
		if ( 'image/svg+xml' !== $type ) {
			$imghtml = ( ('logo' == $itemprop) ? '<figure>' : '' ) . '<img ' . 'class="img-fluid' . ( ! empty( $classes ) ? ' ' . $classes : '' ) . '" src="' . $src . '" srcset="' . $srcset . '" sizes="' . $sizes . '" width="' . esc_attr( $width ) . '" height="' . esc_attr( $height ) . '" alt="' . esc_attr( $imgalt ) . '-' . esc_html( get_bloginfo( 'name' ) ) . '" loading="lazy">' . ( ('logo' == $itemprop) ? '</figure>' : '' );
		} else {
			$imghtml = ( ('logo' == $itemprop) ? '<figure>' : '' ) . '<img ' . 'class="img-fluid' . ( ! empty( $classes ) ? ' ' . $classes : '' ) . '" src="' . $src . '" width="100%" height="auto"' . ' alt="' . esc_attr( $imgalt ) . '-' . esc_html( get_bloginfo( 'name' ) ) . '" loading="lazy">' . ( ('logo' == $itemprop) ? '</figure>' : '' );
		}
		$imghtml .= ( ! empty( $itemprop ) ? '<meta itemprop="' . $itemprop . '" content="' . esc_url( $src ) . '">' : '' );
		if ( $echo ) {
			echo $imghtml; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			return $imghtml;
		}
	}
}

/**
 * Get responsive image css
 * $echo - set $echo to true only if echoing inside <head> tag for better html structure
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_reponsive_img_css' ) ) {
	function dfu_busacc_fn_get_reponsive_img_css( $imgid, $class, $addstyle=false, $echo=false ) {
		$imgurl = dfu_busacc_fn_get_responsive_img_url( $imgid );
		$style = '';
		$style .= esc_attr( $class ) . ' { background-image: url(' . esc_url( $imgurl['xs'] ) . '); } ';
		$style .= '@media screen and (min-width: 576px ) { ' . esc_attr( $class ) . ' { background-image: url(' . esc_url( $imgurl['sm'] ) . '); } } ';
		$style .= '@media screen and (min-width: 768px ) { ' . esc_attr( $class ) . ' { background-image: url(' . esc_url( $imgurl['md'] ) . '); } } ';
		$style .= '@media screen and (min-width: 992px ) { ' . esc_attr( $class ) . ' { background-image: url(' . esc_url( $imgurl['lg'] ) . '); } } ';
		$style .= '@media screen and (min-width: 1200px ) { ' . esc_attr( $class ) . ' { background-image: url(' . esc_url( $imgurl['full'] ) . '); } } ';
		if ( $addstyle ) {
			$style = '<style>' . $style . '</style>';
		}
		if ( $echo ) {
			echo $style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			return $style;
		}
	}
}

/**
 * Create HTML for responsive image with srcset for Bootstrap slider
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_responsive_slider_img_display' ) ) {
	function dfu_busacc_fn_get_responsive_slider_img_display( $img, $sizes, $srcsize = 'full' ) {
		$imgid = $img['attachment_id'];
		$src = esc_url( wp_get_attachment_image_src( $imgid, $srcsize )[0] );
		$width = $img['width'];
		$height = $img['height'];
		$srcset = esc_attr( wp_get_attachment_image_srcset( $imgid, $srcsize ) );
		$imgalt = trim( strip_tags( get_post_meta( $imgid, '_wp_attachment_image_alt', true ) ) );
		$imghtml = '<img class="d-block w-100" src="' . $src . '" srcset="' . $srcset . '" sizes="' . $sizes . '" width="' . $width . '" height="' . $height . '" alt="' . $imgalt . '-' . esc_html( get_bloginfo( 'name' ) ) . '" loading="lazy">';
		return $imghtml;
	}
}

/**
 * Display column breakdown depending max number of items in row
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_display_col' ) ) {
	function dfu_busacc_fn_display_col( $maxinrow, $curritem ) {
		if ( 1 == $maxinrow ) {
			echo '<div class="col-12 mt-2 mb-3">';
		} elseif ( 2 == $maxinrow ) {
			echo '<div class="col-12 col-sm-6 mt-2 mb-3">';
		} elseif ( 3 == $maxinrow ) {
			echo '<div class="col-12 col-sm-6 col-lg-4 mt-2 mb-3">';
		} elseif ( 4 == $maxinrow ) {
			echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2 mb-3">';
		} elseif ( 5 == $maxinrow ) {
			if ( 0 == $curritem ) {
				echo '<div class="col-12 col-sm-6 col-md-3 col-lg-2 offset-lg-1 mt-2 mb-3">';
			} else {
				echo '<div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-2 mb-3">';
			}
		} elseif ( 6 == $maxinrow ) {
			echo '<div class="col-6 col-sm-6 col-md-3 col-lg-2 mt-2 mb-3">';
		}
	}
}

/**
 * Display wider column breakdown depending max number of items in row
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_display_col_wide' ) ) {
	function dfu_busacc_fn_display_col_wide( $maxinrow, $btmmargin ) {
		//$btmmargin: 0-5 representing mb-0 to mb-5
		if ( 1 == $maxinrow ) {
			echo '<div class="col-12 mb-' . esc_attr( $btmmargin ) . '">';
		} elseif ( 2 == $maxinrow ) {
			echo '<div class="col-12 col-md-6 mb-' . esc_attr( $btmmargin ) . '">';
		} elseif ( 3 == $maxinrow ) {
			echo '<div class="col-12 col-md-6 col-lg-4 mb-' . esc_attr( $btmmargin ) . '">';
		} elseif ( 4 == $maxinrow ) {
			echo '<div class="col-12 col-md-4 col-lg-3 mb-' . esc_attr( $btmmargin ) . '">';
		}
	}
}

/**
 * Responsive background image
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_bgimg_css' ) ) {
	function dfu_busacc_fn_bgimg_css( $class, $bgimgid, $bg, $bgpos, $bgsize, $bgrepeat, $bgattach, $addclass, $style=false, $echo=true ) {
		// $bg contains additonal background info
		$css = '';
		if ( ! empty( $bgimgid ) ) {
			$bgimgurl = dfu_busacc_fn_get_responsive_img_url( $bgimgid );
			$css .= esc_attr( $class ) . ' {';
			if ( empty( $bg ) ) {
				$css .= 'background-image: url(' . esc_url( $bgimgurl['xs'] ) . '); ';
			} else {
				$css .= 'background: ' . esc_attr( $bg ) . ', ' . 'url(' . esc_url( $bgimgurl['xs'] ) . '); ';
			}
			$css .= ( ! empty( $bgpos ) ? 'background-position: ' . esc_attr( $bgpos ) . '; ' : '' );
			$css .= ( ! empty( $bgsize ) ? 'background-size: ' . esc_attr( $bgsize ) . '; ' : '' );
			$css .= ( ! empty( $bgrepeat ) ? 'background-repeat: ' . esc_attr( $bgrepeat ) . '; ' : '' );
			$css .= ( ! empty( $bgattach ) ? 'background-attachment: ' . esc_attr( $bgattach ) . '; ' : '' );
			$css .= ( ! empty( $addclass ) ? esc_attr( $addclass ) : '' );
			$css .= '} ';

			$css .= '@media screen and (min-width: 576px) {';
			$css .= esc_attr( $class ) . ' {';
			if ( empty( $bg ) ) {
				$css .= 'background-image: url(' . esc_url( $bgimgurl['sm'] ) . '); ';
			} else {
				$css .= 'background: ' . esc_attr( $bg ) . ', ' . 'url(' . esc_url( $bgimgurl['sm'] ) . '); ';
			}
			$css .= '} ';
			$css .= '} ';
			$css .= '@media screen and (min-width: 768px) {';
			$css .= esc_attr( $class ) . ' {';
			if ( empty( $bg ) ) {
				$css .= 'background-image: url(' . esc_url( $bgimgurl['md'] ) . '); ';
			} else {
				$css .= 'background: ' . esc_attr( $bg ) . ', ' . 'url(' . esc_url( $bgimgurl['md'] ) . '); ';
			}
			$css .= '} ';
			$css .= '} ';
			$css .= '@media screen and (min-width: 992px) {';
			$css .= esc_attr( $class ) . ' {';
			if ( empty( $bg ) ) {
				$css .= 'background-image: url(' . esc_url( $bgimgurl['lg'] ) . '); ';
			} else {
				$css .= 'background: ' . esc_attr( $bg ) . ', ' . 'url(' . esc_url( $bgimgurl['lg'] ) . '); ';
			}
			$css .= '} ';
			$css .= '} ';
			$css .=  '@media screen and (min-width: 1200px) {';
			$css .= esc_attr( $class ) . ' {';
			if ( empty( $bg ) ) {
				$css .= 'background-image: url(' . esc_url( $bgimgurl['full'] ) . '); ';
			} else {
				$css .= 'background: ' . esc_attr( $bg ) . ', ' . 'url(' . esc_url( $bgimgurl['full'] ) . '); ';
			}
			$css .= '} ';
			$css .= '} ';
		}
		if ( $style ) {
			$css = '<style>' . $css . '</style>';
		}
		if ( $echo ) {
			echo $css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			return $css;
		}
	}
}

/**
 * Responsive image urls
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_responsive_img_url' ) ) {
	function dfu_busacc_fn_get_responsive_img_url( $imgid ) {
		$imgurl['full'] = wp_get_attachment_image_src( $imgid, 'full' )[0];
		$imgurl['lg'] = wp_get_attachment_image_src( $imgid, 'dfu-busacc-xl' )[0];
		$imgurl['md'] = wp_get_attachment_image_src( $imgid, 'large' )[0];
		$imgurl['sm'] = wp_get_attachment_image_src( $imgid, 'medium_large' )[0];
		$imgurl['xs'] = wp_get_attachment_image_src( $imgid, 'dfu-busacc-md' )[0];
		return $imgurl;
	}
}


<?php

/**
 * Convert HEX to RGB
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_hex2rgb' ) ) {
	function dfu_busacc_fn_hex2rgb( $colour ) {
		if ( '#' == $colour[0] ) {
				$colour = substr( $colour, 1 );
		}
		if ( false === strpos( $colour, "rgba" )  ) {
			if ( strlen( $colour ) == 6 ) {
				list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
			} elseif ( strlen( $colour ) == 3 ) {
					list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
			} else {
				return false;
			}
			$r = hexdec( $r );
			$g = hexdec( $g );
			$b = hexdec( $b );
			$rgba = array( 'r' => $r, 'g' => $g, 'b' => $b );
		} else { // rgba
			$rgba = dfu_busacc_fn_get_rgba( $colour );
		}
		return $rgba;
	}
}

/**
 * Retrieve R,G,B,A from RGBA
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_rgba' ) ) {
	function dfu_busacc_fn_get_rgba( $colour ) {
		$rgba  = array();
		$regex = '#\((([^()]+|(?R))*)\)#';
		if ( preg_match_all( $regex, $colour, $matches ) ) {
			$rgba = explode( ',', implode( ' ', $matches[1] ) );
		} else {
			$rgba = explode( ',', $colour );
		}
		return array( 'r' => $rgba['0'], 'g' => $rgba['1'], 'b' => $rgba['2'], 'a' => $rgba['3'] );
	}
}


/**
 * Convert RGB to HEX
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_rgb2hex' ) ) {
	function dfu_busacc_fn_rgb2hex( $rgb ) {
		$hex = sprintf( '#%02x%02x%02x', $rgb['r'], $rgb['g'], $rgb['b'] );
		return $hex;
	}
}

/**
 * Convert HUE to RGB
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_huetorgb' ) ) {
	function dfu_busacc_fn_huetorgb( $v1, $v2, $vh ) {
		if ( $vh < 0 ) {
			$vh += 1;
		};
		if ( $vh > 1 ) {
			$vh -= 1;
		};
		if ( ( 6 * $vh ) < 1 ) {
			return ( $v1 + ( $v2 - $v1 ) * 6 * $vh );
		};
		if ( ( 2 * $vh ) < 1 ) {
			return ( $v2 );
		};
		if ( ( 3 * $vh ) < 2 ) {
			return ( $v1 + ( $v2 - $v1 ) * ( ( 2 / 3 - $vh ) * 6 ) );
		};
		return ( $v1 );
	}
}

/**
 * Convert RGB to HSL
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_rgb2hsl' ) ) {
	function dfu_busacc_fn_rgb2hsl( $r, $g, $b ) {
		$r /= 255;
		$g /= 255;
		$b /= 255;
		$max = max( $r, $g, $b );
		$min = min( $r, $g, $b );
		$h = 0;
		$s = 0;
		$l = ( $max + $min ) / 2;
		$d = $max - $min;
		if ( 0 == $d ) {
			$h = 0;
			$s = 0;
		} else {
			$s = $d / ( 1 - abs( 2 * $l - 1 ) );
			switch ( $max ) {
				case $r:
					$h = 60 * fmod( ( ( $g - $b ) / $d ), 6 );
						if ( $b > $g ) {
						$h += 360;
					}
					break;
				case $g:
					$h = 60 * ( ( $b - $r ) / $d + 2 );
					break;
				case $b:
					$h = 60 * ( ( $r - $g ) / $d + 4 );
					break;
			}	        	        
		}
		return array( 'h' => round( $h, 2 ), 's' => round( $s, 2 ), 'l' => round( $l, 2 ) );
	}
}

/**
 * Convert HSL to RGB
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_hsl2rgb' ) ) {
	function dfu_busacc_fn_hsl2rgb( $h, $s, $l ) {
		$r = 0;
		$g = 0;
		$b = 0;
		$c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
		$x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
		$m = $l - ( $c / 2 );
		if ( $h < 60 ) {
			$r = $c;
			$g = $x;
			$b = 0;
		} elseif ( $h < 120 ) {
			$r = $x;
			$g = $c;
			$b = 0;
		} elseif ( $h < 180 ) {
			$r = 0;
			$g = $c;
			$b = $x;
		} elseif ( $h < 240 ) {
			$r = 0;
			$g = $x;
			$b = $c;
		} elseif ( $h < 300 ) {
			$r = $x;
			$g = 0;
			$b = $c;
		} else {
			$r = $c;
			$g = 0;
			$b = $x;
		}
		$r = ( $r + $m ) * 255;
		$g = ( $g + $m ) * 255;
		$b = ( $b + $m ) * 255;
		return array( 'r' => floor( $r ), 'g' => floor( $g ), 'b' => floor( $b ) );
	}
}

/**
 * Calculate grey scale based on theme selected primary colour
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_getgreyscale' ) ) {
	function dfu_busacc_fn_getgreyscale( $pricol = '#0088cc' ) {
		$rgb = dfu_busacc_fn_hex2rgb( $pricol );
		$hsl = dfu_busacc_fn_rgb2hsl( $rgb['r'], $rgb['g'], $rgb['b'] );
		$colrgb = dfu_busacc_fn_hsl2rgb( $hsl['h'], 0.06, 0.65 );   //grey with a bit of original hue
		$col = dfu_busacc_fn_rgb2hex( $colrgb );
		$greycols = array();
		$greycols['col1'] = dfu_busacc_fn_hextint( $col, .97, 't' );
		$greycols['col2'] = dfu_busacc_fn_hextint( $col, .85, 't' );
		$greycols['col3'] = dfu_busacc_fn_hextint( $col, .66, 't' );
		$greycols['col4'] = dfu_busacc_fn_hextint( $col, .36, 't' );
		$greycols['col5'] = $col;
		$greycols['col6'] = dfu_busacc_fn_hextint( $col, .21, 's' );
		$greycols['col7'] = dfu_busacc_fn_hextint( $col, .55, 's' );
		$greycols['col8'] = dfu_busacc_fn_hextint( $col, .75, 's' );
		return $greycols;
	}
}

/**
 * RGB tint/shade
 * Input:  
 * $colour in HEX/RGBA
 * $type:	s = Shade
 * 			t = Tint
 * $includea:	0 = do not include alpha
 * 				1 = include alpha
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_hextint' ) ) {
	function dfu_busacc_fn_hextint( $colour, $factor, $type, $includea=0 ) {
		$rgb = dfu_busacc_fn_hex2rgb( $colour );
		if ( 's' == $type ) {
			$tintr = intval( $rgb['r'] * ( 1 - $factor ) );
			$tintg = intval( $rgb['g'] * ( 1 - $factor ) );
			$tintb = intval( $rgb['b'] * ( 1 - $factor ) );
		} elseif ( 't' == $type ) {
			$tintr = $rgb['r'] + intval( ( 255 - $rgb['r'] ) * $factor );
			$tintg = $rgb['g'] + intval( ( 255 - $rgb['g'] ) * $factor );
			$tintb = $rgb['b'] + intval( ( 255 - $rgb['b'] ) * $factor );
		}

		if ( array_key_exists( 'a', $rgb ) && ( 1 == $includea ) ) {
			// return rgba
			$rgba = "rgba(" . $tintr . ',' . $tintg . ',' . $tintb . ',' . $rgb['a'] . ')';
			return $rgba;
		} else {
			$tintr = dechex( $tintr < 0 ? 0 : ( $tintr > 255 ? 255 : $tintr ) );
			$tintg = dechex( $tintg < 0 ? 0 : ( $tintg > 255 ? 255 : $tintg ) );
			$tintb = dechex( $tintb < 0 ? 0 : ( $tintb > 255 ? 255 : $tintb ) );
			$hextinted = ( strlen( $tintr ) < 2 ? '0' : '' ) . $tintr;
			$hextinted .= ( strlen( $tintg ) < 2 ? '0' : '' ) . $tintg;
			$hextinted .= ( strlen( $tintb ) < 2 ? '0' : '' ) . $tintb;
			return '#' . $hextinted;
		}
	}
}

/**
 * Calculate contrast light/dark colour
 * Input:   $colour in HEX
 *          $type = 1 - text colour
 *          $type = 2 - hover text colour
 *          $type = 3 - background colour
 *          $type = 4 - menu background colour
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_getcontrastcolour' ) ) {
	function dfu_busacc_fn_getcontrastcolour( $colour, $type ) {
		// look for primary colour defined
		$btndefault = array(
			'text'    => '#f0f1f2',
			'htext'   => '#fcfcfc',
			'bg'      => '#0088cc',
			'hbg'     => '#006191',
		);
		$btncol = get_theme_mod( 'dba_button', $btndefault );
		if ( true == get_theme_mod( 'dba_btn_grad' ) ) {
			$pri = get_theme_mod( 'dba_btn_first', '#0088cc' );
		} else {
			$pri = $btncol['bg'];
		}
		$greys = dfu_busacc_fn_getgreyscale( $pri ); // get grey scale
		$theme = dfu_busacc_fn_colourcheck( $colour );
		if ( 1 == $type ) {
			return ( 'lt' == $theme ) ? $greys['col7'] : $greys['col2'];
		} elseif ( 2 == $type ) {
			return ( 'lt' == $theme ) ? $greys['col8'] : $greys['col1'];
		} elseif ( 3 == $type ) {
			return ( 'lt' == $theme ) ? $greys['col6'] : $greys['col3'];
		} elseif ( 4 == $type ) {
			return ( 'lt' == $theme ) ? $greys['col3'] : $greys['col6'];
		}
	}
}

/**
 * Calculate complementary colour
 * Input:  
 * $colour in HEX/RGBA
 * $type:	s = Shade
 * 			t = Tint
 * $includea:	0 = do not include alpha
 * 				1 = include alpha
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_getcomplementarycolour' ) ) {
	function dfu_busacc_fn_getcomplementarycolour( $colour, $includea=0 ) {

		if ( false === strpos( $colour, "rgba" )  ) {
			$rgba = dfu_busacc_fn_hex2rgb( $colour );
		} else {
			$rgba = dfu_busacc_fn_get_rgba( $colour );
		}
		$var_r = $rgba['r'] / 255;
		$var_g = $rgba['g'] / 255;
		$var_b = $rgba['b'] / 255;

		// Output HSL as $h, $s and $l expressed as fractions of 1
		$var_min = min( $var_r, $var_g, $var_b );
		$var_max = max( $var_r, $var_g, $var_b );
		$del_max = $var_max - $var_min;
		$l = ( $var_max + $var_min ) / 2;
		if ( 0 == $del_max ) {
			$h = 0;
			$s = 0;
		} else {
			if ( $l < 0.5 ) {
					$s = $del_max / ( $var_max + $var_min );
			} else {
					$s = $del_max / ( 2 - $var_max - $var_min );
			};
			$del_r = ( ( ( $var_max - $var_r ) / 6 ) + ( $del_max / 2 ) ) / $del_max;
			$del_g = ( ( ( $var_max - $var_g ) / 6 ) + ( $del_max / 2 ) ) / $del_max;
			$del_b = ( ( ( $var_max - $var_b ) / 6 ) + ( $del_max / 2 ) ) / $del_max;
			if ( $var_r == $var_max ) {
					$h = $del_b - $del_g;
			} elseif ( $var_g == $var_max ) {
					$h = ( 1 / 3 ) + $del_r - $del_b;
			} elseif ( $var_b == $var_max ) {
					$h = ( 2 / 3 ) + $del_g - $del_r;
			}
			if ( $h < 0 ) {
				$h += 1;
			}
			if ( $h > 1 ) {
				$h -= 1;
			}
		}

		// Calculate the opposite hue, $h2
		$h2 = $h + 0.5;
		if ( $h2 > 1 ) {
			$h2 -= 1;
		}

		// Convert complementary colour with HSL to RGB 255, then return in RGB Hex
		if ( 0 == $s ) {
			$r = $l * 255;
			$g = $l * 255;
			$b = $l * 255;
		} else {
			if ( $l < 0.5 ) {
					$var_2 = $l * ( 1 + $s );
			} else {
					$var_2 = ( $l + $s ) - ( $s * $l );
			}
			$var_1 = 2 * $l - $var_2;
			$r = 255 * dfu_busacc_fn_huetorgb( $var_1, $var_2, $h2 + ( 1 / 3 ) );
			$g = 255 * dfu_busacc_fn_huetorgb( $var_1, $var_2, $h2 );
			$b = 255 * dfu_busacc_fn_huetorgb( $var_1, $var_2, $h2 - ( 1 / 3 ) );
		}
		if ( array_key_exists( 'a', $rgba ) && ( 1 == $includea ) ) {
			// return rgba
			$rgba = "rgba(" . $r . ',' . $g . ',' . $b . ',' . $rgba['a'] . ')';
			return $rgba;
		} else {
			$rhex = sprintf( '%02x', round( $r ) );
			$ghex = sprintf( '%02x', round( $g ) );
			$bhex = sprintf( '%02x', round( $b ) );
			$rgbhex = $rhex . $ghex . $bhex;
			return '#' . $rgbhex;
		}
	}
}

/**
 * Determine if colour is light/dark
 * Input:   $colour in HEX
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_colourcheck' ) ) {
	function dfu_busacc_fn_colourcheck( $colour ) {
		if ( '#' == $colour[0] ) {
			$colour = substr( $colour, 1 );
		}

		if ( false === strpos( $colour, "rgba" )  ) {
			$r = hexdec( substr( $colour, 0, 2 ) );
			$g = hexdec( substr( $colour, 2, 2 ) );
			$b = hexdec( substr( $colour, 4, 2 ) );
		} else {
			$rgba = dfu_busacc_fn_get_rgba( $colour );
			$r = $rgba['r'];
			$g = $rgba['g'];
			$b = $rgba['b'];
		}
		$txtcolor = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
		return ( $txtcolor >= 128 ) ? 'lt' : 'dk';
	}
}

/**
 * Check number range
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_check_range' ) ) {     
	function dfu_busacc_fn_check_range( $val, $min, $max ) {
		return ( $min <= $val && $val <= $max );
	}
}




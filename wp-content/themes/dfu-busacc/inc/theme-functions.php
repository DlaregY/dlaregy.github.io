<?php

/**
 * Get sidebar
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_sidebar' ) ) {
	function dfu_busacc_fn_get_sidebar( $sidebar ) {
		switch ( $sidebar ) :
			case 'none':
				$sidebar = '';
				break;
			case 'default': // Theme default
				$sidebar = get_theme_mod( 'dba_default_sidebar' );
				if ( 'none' == $sidebar ) {
					$sidebar = '';
				}
		endswitch;
		return $sidebar;
	}
}

/**
 * Display sidebar
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_display_sidebar' ) ) {
	function dfu_busacc_fn_display_sidebar( $sidebar, $width ) {
		if ( is_active_sidebar( $sidebar ) ) {
			if ( '2' == $width ) {
				$colwidth = 'col-md-2';
			} elseif ( '3' == $width ) {
				$colwidth = 'col-md-3';
			} elseif ( '4' == $width ) {
				$colwidth = 'col-md-4';
			} elseif ( '5' == $width ) {
				$colwidth = 'col-md-5';
			} elseif ( '6' == $width ) {
				$colwidth = 'col-md-6';
			}
			$attr = array( 'type' => 1, 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/WPSideBar' );
			?>

			<aside id="secondary" class="<?php echo esc_attr( $colwidth ); ?>" <?php echo apply_filters( 'dfu_busacc_f_sidebar_secondary_microdata', 'itemscope="' . esc_attr( $attr['itemscope'] ) . '" itemtype="' . esc_url( $attr['itemtype'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<div id="widget" class="dba-widget-area">
					<div class="dba-sidebar">
						<?php
						do_action( 'dfu_busacc_a_before_sidebar' );
						dynamic_sidebar( $sidebar );
						do_action( 'dfu_busacc_a_after_sidebar' );
						?>
					</div><!-- dba-sidebar -->
				</div><!-- #widget -->
			</aside><!-- #secondary -->
			
		<?php
		}
	}
}

/**
 * Display horizontal sidebar/widgets
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_display_h_sidebar' ) ) {
	function dfu_busacc_fn_display_h_sidebar( $widgetoutercontainer, $widgetinnercontainer, $sidebarname, $bgcolor ) {
		if ( is_active_sidebar( $sidebarname ) ) :
			echo '<div class="' . esc_attr( $widgetoutercontainer ) . ' py-5"' . ( ( !empty( $bgcolor ) )? ' style="background-color: ' . esc_attr( $bgcolor ) . ';"' : '' ) . '>';
			if ( 'full-width' == $widgetoutercontainer && 'container' == $widgetinnercontainer ) {
				echo '<div class="container">';
			} else {
				echo '<div class="container-fluid">';
			}
			?>
					<div class="row">
						<div class="col-12">
							<?php dynamic_sidebar( $sidebarname ); ?>
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div><!-- cta widget -->
		<?php
		endif;
	}
}

/**
 * Get heading style
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_display_style' ) ) {
	function dfu_busacc_fn_get_display_style( $htype = 1 ) {
		if ( 1 == $htype ) { /* h1 */
			if ( function_exists( 'get_field' ) ) {
				$titlestyle = get_field( 'dbacf_title_style' );
			} else {
				$titlestyle = esc_html( get_post_meta( get_the_ID(), 'dbacf_title_style', true ) );
			}
			if ( $titlestyle && 'none' == $titlestyle ) {
				$titlestyle = '';
			}
			if ( $titlestyle && 'default' == $titlestyle ) {
				$defaulttitlestyle = get_theme_mod( 'dba_default_title_style' );
				$titlestyle = esc_attr( $defaulttitlestyle );
			}
		} elseif ( 2 == $htype ) { /* section title - h2 */
			if ( function_exists( 'get_field' ) ) {
				$titlestyle = get_field( 'dbacf_heading_style' );
			} else {
				$titlestyle = esc_html( get_post_meta( get_the_ID(), 'dbacf_heading_style', true ) );
			}
			if ( $titlestyle && 'none' == $titlestyle ) {
				$titlestyle = '';
			}
			if ( $titlestyle && 'default' == $titlestyle ) {
				$defaulttitlestyle = get_theme_mod( 'dba_default_head_style' );
				$titlestyle = esc_attr( $defaulttitlestyle );
			}
		}
		return $titlestyle;
	}
}

/**
 * Display bottom header
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_display_btm_header' ) ) {
	function dfu_busacc_fn_display_btm_header( $term = '', $pid = false ) {
		// $term can also be a post id
		if ( function_exists( 'get_field' ) ) {
			$headertype = get_field( 'dbacf_header_type', $term );
			if ( $headertype && ( 'img' == $headertype['value'] || 'bgcolour' == $headertype['value'] ) ) {
				if ( 'img' == $headertype['value'] ) {
					$headerimg = get_field( 'dbacf_header_img', $term );
					if ( $headerimg ) { //Image group
						// Image location
						$img_from = $headerimg['dbacf_img_from'];
						if ( $img_from && 'featured' == $img_from ) {
							if ( has_post_thumbnail() ) {
								$url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
							}
						} elseif ( 'upload' == $img_from ) {
							$upl_img = $headerimg['dbacf_upload_img'];
							if ( ! empty( $upl_img ) ) {
								$url = $upl_img['url'];
							}
						}
					}
				}
				//Header
				$img_width = get_field( 'dbacf_header_width', $term );
				if ( empty( $img_width ) ) {
					$img_width = 'full-width';
				}
				//Titles
				$styles = '';
				$showheadertitle = get_field( 'dbacf_show_title_on_header', $term );
				// Subtitle
				$showsubtitle = get_field( 'dbacf_show_subtitle', $term );
				if ( $showsubtitle && true == $showsubtitle ) {
					$headersubtitle = get_field( 'dbacf_header_subtitle', $term );
					$showsubtitlefrom = $headersubtitle['dbacf_show_subtitle_from'];
					if ( $showsubtitlefrom ) {
						switch ( $showsubtitlefrom ) {
						case 'customtext':
							$subtitle = $headersubtitle['dbacf_subtitle'];
							break;
						case 'excerpt':
							if ( is_category() || is_tag() || is_author() ) {
								$subtitle = get_the_archive_description();
							} else {
								$subtitle = ( has_excerpt() ? get_the_excerpt() : '' );
							}
							break;
						case 'customfield':
							$customfieldname = $headersubtitle['dbacf_subtitle_field_name'];
							if ( $customfieldname ) {
								$subtitle = get_field( $customfieldname, $term );
							}
							break;
						}
					}
				}

				if ( ( 'img' == $headertype['value'] && ! empty( $url ) ) || 'bgcolour' == $headertype['value'] ) {
				?>
					<section id="headerimg" class="dba-headerimg">
						<div class="<?php echo esc_attr( $img_width ); ?> px-0">
							<div class="row no-gutters">
								<div class="col">
									<div class="img-cover"></div><!-- img-cover -->
										<?php
										$titleonheader = get_field( 'dbacf_title_style_on_header', $term );
										if ( $titleonheader && 'none' == $titleonheader ) {
											$titleonheader = '';
										}
										if ( $titleonheader && 'default' == $titleonheader ) {
											$defaulttitlestyle = get_theme_mod( 'dba_default_title_style', 'none' );
											if ( 'none' == $defaulttitlestyle ) {
												$titleonheader = '';
											} else {
												$titleonheader = $defaulttitlestyle;
											}
										}
										if ( is_archive() ) {
											$title = get_the_archive_title();
										} elseif ( ! is_archive() ) {
											$title = get_the_title();
										}
										if ( $showheadertitle && true == $showheadertitle ) {
										?>
											<div class="titlepos"><h1 class="entry-title <?php echo esc_attr( $titleonheader ); ?> dba-img-title"><span><?php echo esc_html( $title ); ?></span></h1>
										<?php
										}
										if ( $showsubtitle && true == $showsubtitle ) {
										?>
											<h2 class="subtitlepos dba-img-subtitle"><?php echo wp_kses_post( $subtitle ); ?></h2>
										<?php
										}
										if ( $showheadertitle && true == $showheadertitle ) {
											echo '</div><!-- titlepos -->';
										}
										?>
								</div><!-- img-wrapper -->
							</div><!-- row -->
						</div><!-- container-fluid -->
					</section>
				<?php
				}
			} elseif ( $headertype && 'slider' == $headertype['value'] ) {
				$slider = get_field( 'dbacf_slider' );
				if ( $slider ) {
					$sliderwidth = $slider['dbacf_slider_width'];
					if ( $sliderwidth && 'full' == $sliderwidth ) {
					?>
						<section id="headerslider"><div class="container-fluid">
					<?php
					} elseif ( $sliderwidth && 'container' == $sliderwidth ) {
					?>
						<section id="headerslider"><div class="container">
					<?php
					}
					?>
							<div class="row">
								<?php
								$scode = $slider['dbacf_slider_shortcode'];
								if ( $scode ) {
									echo do_shortcode( esc_html( $scode ) );
								}
								?>
							</div><!-- row -->
						</div><!-- container-fluid -->
						</section>
				<?php
				}
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
								$url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
								$imgid = get_post_thumbnail_id();
							}
						} elseif ( 'upload' == $img_from ) {
							$upl_img = get_post_meta( $cid, 'dbacf_header_img_dbacf_upload_img', true );
							if ( ! empty( $upl_img ) ) {
								$url = wp_get_attachment_image_src( $upl_img, 'full' );
								$imgid = $upl_img;
							};
						}
					}
					//Header
					$img_width = get_post_meta( $cid, 'dbacf_header_width', true );
					if ( empty( $img_width ) ) {
						$img_width = 'full-width';
					}
					//Titles
					$styles = '';
					$showheadertitle = get_post_meta( $cid, 'dbacf_show_title_on_header', true );
					// Subtitle
					$showsubtitle = get_post_meta( $cid, 'dbacf_show_subtitle', true );
					if ( $showsubtitle && true == $showsubtitle ) {
						$showsubtitlefrom = get_post_meta( $cid, 'dbacf_header_subtitle_dbacf_show_subtitle_from', true );
						if ( $showsubtitlefrom ) {
							switch ( $showsubtitlefrom ) {
							case 'customtext':
								$subtitle = get_post_meta( $cid, 'dbacf_header_subtitle_dbacf_subtitle', true );
								break;
							case 'excerpt':
								if ( is_category() || is_tag() || is_author() ) {
									$subtitle = get_the_archive_description();
								} else {
									$subtitle = ( has_excerpt() ? get_the_excerpt() : '' );
								}
								break;
							case 'customfield':
								$customfieldname = get_post_meta( $cid, 'dbacf_header_subtitle_dbacf_subtitle_field_name', true );
								if ( $customfieldname ) {
									$subtitle = get_post_meta( $cid, $customfieldname, true );
								}
								break;
							}
						}
					}

					if ( ( 'img' == $headertype && ! empty( $url ) ) || 'bgcolour' == $headertype ) {
					?>
						<section id="headerimg" class="dba-headerimg">
							<div class="<?php echo esc_attr( $img_width ); ?> px-0">
								<div class="row no-gutters">
									<div class="col">
										<div class="img-cover"></div><!-- img-cover -->
											<?php
											$titleonheader = get_post_meta( $cid, 'dbacf_title_style_on_header', true );
											if ( $titleonheader && 'none' == $titleonheader ) {
												$titleonheader = '';
											}
											if ( $titleonheader && 'default' == $titleonheader ) {
												$defaulttitlestyle = get_theme_mod( 'dba_default_title_style', 'none' );
												if ( 'none' == $defaulttitlestyle ) {
													$titleonheader = '';
												} else {
													$titleonheader = $defaulttitlestyle;
												}
											}
											if ( is_archive() ) {
												$title = get_the_archive_title();
											} elseif ( ! is_archive() ) {
												$title = get_the_title();
											}
											if ( $showheadertitle && true == $showheadertitle ) {
											?>
												<div class="titlepos"><h1 class="entry-title <?php echo esc_attr( $titleonheader ); ?> dba-img-title"><span><?php echo esc_html( $title ); ?></span></h1>
											<?php
											}
											if ( $showsubtitle && true == $showsubtitle ) {
											?>
												<h2 class="subtitlepos dba-img-subtitle"><?php echo wp_kses_post( $subtitle ); ?></h2>
											<?php
											}
											if ( $showheadertitle && true == $showheadertitle ) {
												echo '</div><!-- titlepos -->';
											}
											?>
									</div><!-- img-wrapper -->
								</div><!-- row -->
							</div><!-- container-fluid -->
						</section>
					<?php
					}
				} elseif ( $headertype && 'slider' == $headertype ) {
					$slider = get_post_meta( get_the_ID(), 'dbacf_slider', true );
					if ( $slider ) {
						$sliderwidth = $slider['dbacf_slider_width'];
						if ( $sliderwidth && 'full' == $sliderwidth ) {
						?>
							<section id="headerslider"><div class="container-fluid">
						<?php
						} elseif ( $sliderwidth && 'container' == $sliderwidth ) {
						?>
							<section id="headerslider"><div class="container">
						<?php
						}
						?>
								<div class="row">
									<?php
									$scode = $slider['dbacf_slider_shortcode'];
									if ( $scode ) {
										echo do_shortcode( esc_html( $scode ) );
									}
									?>
								</div><!-- row -->
							</div><!-- container-fluid -->
							</section>
					<?php
					}
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
								$url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
							}
						} elseif ( 'upload' == $img_from ) {
							$upl_img = get_term_meta( $cid, 'dbacf_header_img_dbacf_upload_img', true );
							if ( ! empty( $upl_img ) ) {
								$url = wp_get_attachment_image_src( $upl_img, 'full' );
							};
						}
					}
					//Header
					$img_width = get_term_meta( $cid, 'dbacf_header_width', true );
					if ( empty( $img_width ) ) {
						$img_width = 'full-width';
					}
					//Titles
					$styles = '';
					$showheadertitle = get_term_meta( $cid, 'dbacf_show_title_on_header', true );
					// Subtitle
					$showsubtitle = get_term_meta( $cid, 'dbacf_show_subtitle', true );
					if ( $showsubtitle && true == $showsubtitle ) {
						$showsubtitlefrom = get_term_meta( $cid, 'dbacf_header_subtitle_dbacf_show_subtitle_from', true );
						if ( $showsubtitlefrom ) {
							switch ( $showsubtitlefrom ) {
							case 'customtext':
								$subtitle = get_term_meta( $cid, 'dbacf_header_subtitle_dbacf_subtitle', true );
								break;
							case 'excerpt':
								if ( is_category() || is_tag() || is_author() ) {
									$subtitle = get_the_archive_description();
								} else {
									$subtitle = ( has_excerpt() ? get_the_excerpt() : '' );
								}
								break;
							case 'customfield':
								$customfieldname = get_term_meta( $cid, 'dbacf_header_subtitle_dbacf_subtitle_field_name', true );
								if ( $customfieldname ) {
									$subtitle = get_term_meta( $cid, $customfieldname, true );
								}
								break;
							}
						}
					}
	
					if ( ( 'img' == $headertype && ! empty( $url ) ) || 'bgcolour' == $headertype ) {
					?>
						<section id="headerimg" class="dba-headerimg">
							<div class="<?php echo esc_attr( $img_width ); ?> px-0">
								<div class="row no-gutters">
									<div class="col">
										<div class="img-cover"></div><!-- img-cover -->
											<?php
											$titleonheader = get_term_meta( $cid, 'dbacf_title_style_on_header', true );
											if ( $titleonheader && 'none' == $titleonheader ) {
												$titleonheader = '';
											}
											if ( $titleonheader && 'default' == $titleonheader ) {
												$defaulttitlestyle = get_theme_mod( 'dba_default_title_style', 'none' );
												if ( 'none' == $defaulttitlestyle ) {
													$titleonheader = '';
												} else {
													$titleonheader = $defaulttitlestyle;
												}
											}
											if ( is_archive() ) {
												$title = get_the_archive_title();
											} elseif ( ! is_archive() ) {
												$title = get_the_title();
											}
											if ( $showheadertitle && true == $showheadertitle ) {
											?>
												<div class="titlepos"><h1 class="entry-title <?php echo esc_attr( $titleonheader ); ?> dba-img-title"><span><?php echo esc_html( $title ); ?></span></h1>
											<?php
											}
											if ( $showsubtitle && true == $showsubtitle ) {
											?>
												<h2 class="subtitlepos dba-img-subtitle"><?php echo wp_kses_post( $subtitle ); ?></h2>
											<?php
											}
											if ( $showheadertitle && true == $showheadertitle ) {
												echo '</div><!-- titlepos -->';
											}
											?>
									</div><!-- img-wrapper -->
								</div><!-- row -->
							</div><!-- container-fluid -->
						</section>
					<?php
					}
				} elseif ( $headertype && 'slider' == $headertype ) {
					$slider = get_term_meta( $cid, 'dbacf_slider', true );
					if ( $slider ) {
						$sliderwidth = $slider['dbacf_slider_width'];
						if ( $sliderwidth && 'full' == $sliderwidth ) {
						?>
							<section id="headerslider"><div class="container-fluid">
						<?php
						} elseif ( $sliderwidth && 'container' == $sliderwidth ) {
						?>
							<section id="headerslider"><div class="container">
						<?php
						}
						?>
								<div class="row">
									<?php
									$scode = $slider['dbacf_slider_shortcode'];
									if ( $scode ) {
										echo do_shortcode( esc_html( $scode ) );
									}
									?>
								</div><!-- row -->
							</div><!-- container-fluid -->
							</section>
					<?php
					}
				}
			}
		}
	}
}

/**
 * Get footer width
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_footer_width' ) ) {
	function dfu_busacc_fn_get_footer_width() {
		$fwidth = get_theme_mod( 'dba_footer_width' );
		if ( is_post_type_archive() || ( is_home() && ! is_front_page() ) ) {
			$achiveposttype = get_post_type();
			if ( is_home() ) { // handle case when no post is on site and get_post_type() returns 'page'
				$achiveposttype = 'post';
			} 
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
							$fwidth = dfu_busacc_fn_get_footer_width_class();
						}
						wp_reset_postdata();
					}
				}
			} else {
				$fwidth = dfu_busacc_fn_get_footer_width_class();
			}
		} elseif ( is_category() || is_tag() || is_tax() ) {
			$term = get_queried_object();
			$fwidth = dfu_busacc_fn_get_footer_width_class( $term );
		} else {
			$fwidth = dfu_busacc_fn_get_footer_width_class();
		}
		return $fwidth;
	}
}

if ( ! function_exists( 'dfu_busacc_fn_get_footer_width_class' ) ) {
	function dfu_busacc_fn_get_footer_width_class( $term = '' ) {
		$fwidth = '';
		if ( function_exists( 'get_field' ) ) {
			$fwidth = get_field( 'dbacf_footer_width', $term );
		} else { // ACF not available
			if ( empty( $term ) ) {
				$term = get_the_ID();
			}
			$fwidth = get_post_meta( $term, 'dbacf_footer_width', true );
		}
		if ( '' == $fwidth ) {
			$fwidth = get_theme_mod( 'dba_footer_width', 'container' );
		}
		return $fwidth;
	}
}

/**
 * Bootstrap pagination function
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_bs_paging' ) ) {
	function dfu_busacc_fn_bs_paging( $pages = '', $range = 1 ) {
		$showitems = ( $range * 2 ) + 1;
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		if ( '' == $pages ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}
		if ( 1 != $pages ) {
			echo '<div class="row"><div class="col-12">';
			echo '<nav aria-label="page navigation">';
			echo '<ul class="pagination justify-content-center">';
			echo '<li class="page-item disabled d-none d-sm-block">';
			echo '<a class="page-link" href="#" tabindex="-1">Page ' . esc_html( ( empty( $paged ) ? '1' : $paged ) ) . ' of ' . esc_html( $pages );
			echo '</a></li>';
			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
				echo '<li class="page-item">';
				echo '<a class="page-link" href="' . esc_url( get_pagenum_link( 1 ) ) . '" aria-label="' . esc_attr( 'First page', 'dfu-busacc' ) . '">';
				echo '<span aria-hidden="true">&laquo;</span>';
				echo '<span class="sr-only">' . esc_html__( 'First page', 'dfu-busacc' ) . '</span>';
				echo '</a></li>';
			}
			if ( $paged > 1 && $showitems < $pages ) {
				echo '<li class="page-item">';
				echo '<a class="page-link" href="' . esc_url( get_pagenum_link( $paged - 1 ) ) . '" aria-label="' . esc_attr( 'Previous page', 'dfu-busacc' ) . '">';
				echo '<span aria-hidden="true">&lsaquo;</span>';
				echo '<span class="sr-only">' . esc_attr__( 'Previous page', 'dfu-busacc' ) . '</span>';
				echo '</a></li>';
			}
			for ( $i = 1; $i <= $pages; $i++ ) {
				if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					if ( $paged == $i || ( empty( $paged ) && 1 == $i ) ) {
						echo '<li class="page-item active">';
						echo '<a class="page-link" href="#" tabindex="-1"  aria-label="' . esc_attr( 'Current page', 'dfu-busacc' ) . '">';
						echo '<span>' . esc_attr( $i ) . '</span>';
						echo '<span class="sr-only">' . esc_html__( 'Current page', 'dfu-busacc' ) . '</span>';
						echo '</a></li>';
					} else {
						echo '<li class="page-item">';
						echo '<a class="page-link" href="' . esc_url( get_pagenum_link( $i ) ) . '">';
						echo '<span>' . esc_attr( $i ) . '</span>';
						echo '</a></li>';
					}
				}
			}
			if ( $paged < $pages && $showitems < $pages ) {
				echo '<li class="page-item">';
				echo '<a class="page-link" href="' . esc_url( get_pagenum_link( $paged + 1 ) ) . '" aria-label="' . esc_attr( 'Next page', 'dfu-busacc' ) . '">';
				echo '<span aria-hidden="true">&rsaquo;</span>';
				echo '<span class="sr-only">' . esc_html__( 'Next page', 'dfu-busacc' ) . '</span>';
				echo '</a></li>';
			}
			if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
				echo '<li class="page-item">';
				echo '<a class="page-link" href="' . esc_url( get_pagenum_link( $pages ) ) . '" aria-label="' . esc_attr( 'Last page', 'dfu-busacc' ) . '">';
				echo '<span aria-hidden="true">&raquo;</span>';
				echo '<span class="sr-only">' . esc_html__( 'Last page', 'dfu-busacc' ) . '</span>';
				echo '</a></li>';
			}
			echo '</ul></nav>';
			echo '</div></div>';
		}
	}
}

/**
 * Page divider
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_display_divider' ) ) {
	function dfu_busacc_fn_display_divider( $id, $dstyle, $top, $btm ) {
		if ( ! empty( $dstyle ) && 'none' != $dstyle ) {
		?>
			<div id="divider-<?php echo esc_attr( $id ); ?>" style="overflow: hidden;<?php echo ( ! empty( $btm ) ? ' background-color:' . esc_attr( $btm ) . ';' : '' ); ?>">
				<div class="<?php echo esc_attr( $dstyle ); ?>" style="<?php echo ( ! empty( $top ) ? 'border-top-color:' . esc_attr( $top ) . ';' : '' ); ?>"></div>
			</div>
		<?php
		}
	}
}

/**
 * Get Icon effect display - FontAwesome
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_layer_icon_display' ) ) {
	function dfu_busacc_fn_get_layer_icon_display( $icostyle, $icon ) {
		if ( $icostyle ) :
			if ( 'default' == $icostyle ) {
				$icostyle = get_theme_mod( 'dba_default_ico_style' );
				if ( empty( $icostyle ) ) {
					$icostyle = 'none';
				}
			}
			if ( 'none' == $icostyle ) {
				$dispstr = '<i class="dba-toplayer ' . ' ' . esc_attr( $icon ) . '"></i>';
			} else {
				if ( substr( $icostyle, 0, 3 ) === 'fas' ) {
					$dispstr = '<span class="fa-layers fa-fw"><i class="' . $icostyle . '"></i><i class="dba-toplayer fa-inverse' . ' ' . esc_attr( $icon ) . '" data-fa-transform="shrink-11"></i></span>';
				} else {
					$dispstr = '<span class="fa-layers fa-fw"><i class="' . $icostyle . '"></i><i class="dba-toplayer' . ' ' . esc_attr( $icon ) . '" data-fa-transform="shrink-11"></i></span>';
				}
			}
		endif;
		return $dispstr;
	}
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_blog_header' ) ) {
	function dfu_busacc_fn_blog_header() {
		if ( function_exists( 'get_field' ) ) {
			$showpostdate = get_field( 'dbacf_post_show_date' );
			$showauthor = get_field( 'dbacf_post_show_author' );
		} else {
			$showpostdate = get_post_meta( get_the_ID(), 'dbacf_post_show_date', true );
			$showauthor = get_post_meta( get_the_ID(), 'dbacf_post_show_author', true );
		}
		$showheadicon = get_theme_mod( 'dba_blog_show_header_ico' );
		$datetouse = get_theme_mod( 'dba_blog_date_to_use', 'update' );
		if ( 'update' == $datetouse ) {
			$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="dateModified">%2$s</time><meta itemprop="datePublished" content="%3$s">';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() ),
				esc_attr( get_the_date( DATE_W3C ) )
			);
		} else {
			$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() )
			);
		}

		if ( $showpostdate ) {
			$postontitle = ( 'update' == $datetouse ? esc_html__( 'Last updated', 'dfu-busacc' ) : esc_html__( 'Created', 'dfu-busacc' ) );
			$posted_on = sprintf(
				/* translators: %s: post date. */
				$postontitle . esc_html_x( ' on %s', 'post date', 'dfu-busacc' ),
				'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
			);
			if ( $showheadicon && true == $showheadicon ) {
				if ( true == get_theme_mod( 'dba_load_fa', true ) ) {
					$postedonicon = apply_filters( 'dfu_busacc_f_postedon_faicon', '<i class="fas fa-calendar-day fa-fw" aria-hidden="true"></i>' );
					$posted_on = '<span class="dba-bloghead-ico">' . wp_kses_post( $postedonicon ) .'&nbsp;</span>' . $posted_on;
				} else {
					$postedonicon = apply_filters( 'dfu_busacc_f_postedon_icon', '<span class="iconmoon-dk ico-calendar"></span>' );
					$posted_on = '<span class="dba-bloghead-ico">' . wp_kses_post( $postedonicon ) . '&nbsp;</span>' . $posted_on;
				}
			}
			echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		if ( $showauthor ) {
			if ( function_exists( 'get_field' ) ) {
				$linktoauthor = get_field( 'dbacf_post_link_author' );
			} else {
				$linktoauthor = get_post_meta( get_the_ID(), 'dbacf_post_link_author', true );
			}
			if ( $showpostdate ) { // post date is shown
				if ( $linktoauthor ) {
					$byline = sprintf(
						/* translators: 1: by */
						esc_html_x( ' by %s', 'post author', 'dfu-busacc' ),
						'<span class="author vcard" itemscope itemtype="http://schema.org/Person" itemprop="author"><a class="dba-link url fn n" rel="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></a></span>'
					);
				} else {
					$byline = sprintf(
					/* translators: 1: by */
					esc_html_x( ' by %s', 'post author', 'dfu-busacc' ),
						'<span class="author vcard" itemscope itemtype="http://schema.org/Person" itemprop="author"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></span>'
					);
				}
			} else {
				if ( $linktoauthor ) {
					$byline = sprintf(
					/* translators: 1: Posted by */
					esc_html_x( 'Posted by %s', 'post author', 'dfu-busacc' ),
						'<span class="author vcard" itemscope itemtype="http://schema.org/Person" itemprop="author"><a class="dba-link url fn n" rel="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></a></span>'
					);
				} else {
					$byline = sprintf(
					/* translators: 1: Posted by */
					esc_html_x( 'Posted by %s', 'post author', 'dfu-busacc' ),
						'<span class="author vcard" itemscope itemtype="http://schema.org/Person" itemprop="author"><span itemprop="name">' . esc_html( get_the_author() ) . '</span></span>'
					);
				}
			}
			if ( $showheadicon && true == $showheadicon ) {
				if ( true == get_theme_mod( 'dba_load_fa', true ) ) {
					$postedbyicon = apply_filters( 'dfu_busacc_f_postedby_faicon', '<i class="fas fa-user fa-fw" aria-hidden="true"></i>' );
					$byline = ( $showpostdate ? '&nbsp;' : '' ) . '<span class="dba-bloghead-ico">' . wp_kses_post( $postedbyicon ) . '</span>' . $byline;
				} else {
					$postedbyicon = apply_filters( 'dfu_busacc_f_postedby_icon', '<span class="iconmoon-dk ico-user"></span>' );
					$byline = ( $showpostdate ? '&nbsp;' : '' ) . '<span class="dba-bloghead-ico">' . wp_kses_post( $postedbyicon ) . '</span>' . $byline;
				}
			}
			echo '<span class="byline">' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_blog_footer' ) ) {
	function dfu_busacc_fn_blog_footer() {
		if ( function_exists( 'get_field' ) ) {
			$showcat = get_field( 'dbacf_post_show_category' );
			$showtag = get_field( 'dbacf_post_show_tags' );
		} else {
			$showcat = get_post_meta( get_the_ID(), 'dbacf_post_show_category', true );
			$showtag = get_post_meta( get_the_ID(), 'dbacf_post_show_tags', true );
		}
		$showfooticon = get_theme_mod( 'dba_blog_show_footer_ico' );

		if ( $showfooticon && true == $showfooticon ) {
			if ( true == get_theme_mod( 'dba_load_fa', true ) ) {
				$caticon = apply_filters( 'dfu_busacc_f_cat_faicon', '<i class="fas fa-bookmark fa-fw" aria-hidden="true"></i>' );
				$catline = '<span class="dba-blogfoot-ico">' . wp_kses_post( $caticon ) . '&nbsp;</span>';
			} else {
				$caticon = apply_filters( 'dfu_busacc_f_cat_icon', '<span class="iconmoon-dk ico-bookmark"></span>' );
				$catline = '<span class="dba-blogfoot-ico">' . wp_kses_post( $caticon ) . '&nbsp;</span>';
			}
			if ( true == get_theme_mod( 'dba_load_fa', true ) ) {
				$tagicon = apply_filters( 'dfu_busacc_f_tag_faicon', '<i class="fas fa-tags fa-fw" aria-hidden="true"></i>' );
				$tagline = '<span class="dba-blogfoot-ico">' . wp_kses_post( $tagicon ) . '&nbsp;</span>';
			} else {
				$tagicon = apply_filters( 'dfu_busacc_f_tag_icon', '<span class="iconmoon-dk ico-price-tag"></span>' );
				$tagline = '<span class="dba-blogfoot-ico">' . wp_kses_post( $tagicon ) . '&nbsp;</span>';
			}
		} else {
			$catline = '';
			$tagline = '';
		}

		// category and tag text for posts only.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			if ( $showcat ) {
				$categories_list = get_the_category_list( esc_html__( ', ', 'dfu-busacc' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<div class="cat-links">' . wp_kses_post( $catline ) . esc_html__( 'Posted in %1$s', 'dfu-busacc' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			/* translators: used between list items, there is a space after the comma */
			if ( $showtag ) {
				$tagusebadge = get_theme_mod( 'dba_blog_tag_use_badge', false );
				if ( $tagusebadge ) {
					$tags_list = get_the_tag_list( '<span class="badge badge-pill dba-badge-link">', '</span>&nbsp;<span class="badge badge-pill dba-badge-link">', '</span>' );
				} else {
					$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'dfu-busacc' ) );
				}
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<div class="tag-links">' . wp_kses_post( $tagline ) . esc_html__( 'Tagged %1$s', 'dfu-busacc' ) . '</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
					<meta itemprop="keywords" content="<?php echo esc_attr( strip_tags( get_the_tag_list('',' , ','') ) ); ?>">
				<?php
				}
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<div class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'dfu-busacc' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</div>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'dfu-busacc' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<div class="edit-link">',
			'</div>'
		);
	}
}

/**
 * Get ACF group fields without ACF
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_group_fields' ) ) {
	function dfu_busacc_fn_get_group_fields( $group_name ) {
		$group = get_page_by_title( html_entity_decode( $group_name ), OBJECT, 'acf' );
		if ( empty( $group ) ) {
			return false;
		}
		$meta = get_post_meta( $group->ID );
		$acf_fields = array();
		foreach ( $meta as $key => $value ) {
			$acf_meta_key = stristr( $key, 'field_' ); // acf fields all start with "field_"
			if ( $acf_meta_key ) {
				$acf_fields[] = get_field_object( $key );
			}
		}
		return $acf_fields; // returns an array of field objects
	}
}

/**
 * Get theme colours based on primary and/or secondary colour(s)
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_theme_colours' ) ) {
	function dfu_busacc_fn_theme_colours( $pri, $sec = '' ) {
		$colors = array();
		$colors['pri'] = $pri;
		if ( '' == $sec ) {
			$sec = dfu_busacc_fn_getcomplementarycolour( $pri );
		}
		$colors['sec'] = $sec;
		$themetype = dfu_busacc_fn_colourcheck( $pri );
		if ( 'dk' == $themetype ) {
			$colors['pri_lt20'] = dfu_busacc_fn_hextint( $pri, 0.2, 't' );
			$colors['pri_lt65'] = dfu_busacc_fn_hextint( $pri, 0.65, 't' );
			$colors['pri_lt75'] = dfu_busacc_fn_hextint( $pri, 0.75, 't' );
			$colors['pri_lt85'] = dfu_busacc_fn_hextint( $pri, 0.85, 't' );
			$colors['pri_lt90'] = dfu_busacc_fn_hextint( $pri, 0.9, 't' );
			$colors['pri_lt95'] = dfu_busacc_fn_hextint( $pri, 0.95, 't' );
			$colors['pri_dk30'] = dfu_busacc_fn_hextint( $pri, 0.3, 's' );
			$colors['pri_dk40'] = dfu_busacc_fn_hextint( $pri, 0.4, 's' );

			$colors['sec_lt60'] = dfu_busacc_fn_hextint( $sec, 0.6, 't' );
			$colors['sec_lt70'] = dfu_busacc_fn_hextint( $sec, 0.7, 't' );
			$colors['sec_lt80'] = dfu_busacc_fn_hextint( $sec, 0.8, 't' );
			$colors['sec_lt90'] = dfu_busacc_fn_hextint( $sec, 0.9, 't' );
			$colors['sec_lt95'] = dfu_busacc_fn_hextint( $sec, 0.95, 't' );
			$colors['sec_dk30'] = dfu_busacc_fn_hextint( $sec, 0.3, 's' );
			$colors['sec_dk40'] = dfu_busacc_fn_hextint( $sec, 0.4, 's' );
			$colors['pri_txt'] = dfu_busacc_fn_getcontrastcolour( $pri, 1 );
			$colors['pri_txt_dk'] = dfu_busacc_fn_getcontrastcolour( $pri, 2 );
		} elseif ( 'lt' == $themetype ) {
			$colors['pri_lt20'] = dfu_busacc_fn_hextint( $pri, 0.8, 's' );
			$colors['pri_lt65'] = dfu_busacc_fn_hextint( $pri, 0.7, 's' );
			$colors['pri_lt75'] = dfu_busacc_fn_hextint( $pri, 0.6, 's' );
			$colors['pri_lt85'] = dfu_busacc_fn_hextint( $pri, 0.5, 's' );
			$colors['pri_lt90'] = dfu_busacc_fn_hextint( $pri, 0.85, 't' );
			$colors['pri_lt95'] = dfu_busacc_fn_hextint( $pri, 0.95, 't' );
			$colors['pri_dk30'] = dfu_busacc_fn_hextint( $pri, 0.4, 't' );
			$colors['pri_dk40'] = dfu_busacc_fn_hextint( $pri, 0.3, 't' );

			$colors['sec_lt60'] = dfu_busacc_fn_hextint( $sec, 0.65, 't' );
			$colors['sec_lt70'] = dfu_busacc_fn_hextint( $sec, 0.55, 's' );
			$colors['sec_lt80'] = dfu_busacc_fn_hextint( $sec, 0.45, 's' );
			$colors['sec_lt90'] = dfu_busacc_fn_hextint( $sec, 0.35, 's' );
			$colors['sec_lt95'] = dfu_busacc_fn_hextint( $sec, 0.95, 't' );
			$colors['sec_dk30'] = dfu_busacc_fn_hextint( $sec, 0.4, 't' );
			$colors['sec_dk40'] = dfu_busacc_fn_hextint( $sec, 0.3, 't' );
			$colors['pri_txt'] = dfu_busacc_fn_getcontrastcolour( $pri, 1 );
			$colors['pri_txt_dk'] = dfu_busacc_fn_getcontrastcolour( $pri, 2 );
		}
		return $colors;
	}
}

/**
 * Get footer icon background light or dark
 *******************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_footer_iconbg' ) ) {
	function dfu_busacc_fn_footer_iconbg() {
		$btngrad = get_theme_mod( 'dba_btn_grad', false );
		if ( $btngrad ) {
			$btnbgcolor = get_theme_mod( 'dba_btn_first' );
		} else {
			$btndefault = array(
				'text'  => '#f0f1f2',
				'htext' => '#fcfcfc',
				'bg'    => '#0088cc',
				'hbg'   => '#006191',
			);
			$btncol = get_theme_mod( 'dba_button', $btndefault );
			$btnbgcolor = $btncol['bg'];
		}
		$ctype = dfu_busacc_fn_colourcheck( $btnbgcolor );
		$iconbgcolor = ( 'lt' == $ctype ? 'dk' : 'lt' );
		return $iconbgcolor;
	}
}

if ( ! function_exists( 'dfu_busacc_fn_default_header_slider' ) ) {
	function dfu_busacc_fn_default_header_slider() {
		$dfu_busacc_headerimgs[1] = '/inc/assets/img/1046491-pxhere.jpg';
		$dfu_busacc_headerimgs[2] = '/inc/assets/img/334581-pxhere.jpg';
		$dfu_busacc_j = 0;
		foreach ( $dfu_busacc_headerimgs as $dfu_busacc_headerimg ) {
		?>
			<div class="carousel-item<?php echo ( 0 == $dfu_busacc_j ? ' active' : '' ); ?>">
			<?php
			$width = 2000;
			$height = 1200;
			$imghtml = '<img class="d-block w-100" src="' . get_parent_theme_file_uri( $dfu_busacc_headerimg ) . '" width="' . $width . '" height="' . $height . '" loading="lazy">';
			echo wp_kses_post( $imghtml ); ?>
			</div>
		<?php
			$dfu_busacc_j++;
		}
	}
}

if ( ! function_exists( 'dfu_busacc_fn_get_font_defaults' ) ) {
	function dfu_busacc_fn_get_font_defaults( $element, $greys ) {
		switch ( $element ) {
			case 'default':
				$font = array(
					'font-family'    => 'Montserrat',
					'variant'        => 'regular',
					'font-size'      => '1rem',
					'line-height'    => '1.5',
					'letter-spacing' => '0',
					'color'          => $greys['col8'],
					'text-transform' => 'none',
					'text-align'     => 'left',
				);
				break;
			case 'h1':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => 'regular',
					'font-size'        => '1.8rem',
					'line-height'      => '1.5',
					'letter-spacing'   => '2px',
					'color'            => $greys['col7'],
					'text-transform'   => 'capitalize',
					'text-align'       => 'left',
				);
				break;
			case 'h2':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => 'regular',
					'font-size'        => '1.6rem',
					'line-height'      => '1.5',
					'letter-spacing'   => '1px',
					'color'            => $greys['col7'],
					'text-transform'   => 'capitalize',
					'text-align'       => 'left',
				);
				break;
			case 'h3':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => 'regular',
					'font-size'        => '1.4rem',
					'line-height'      => '1.5',
					'letter-spacing'   => '0',
					'color'            => $greys['col7'],
					'text-transform'   => 'capitalize',
					'text-align'       => 'left',
				);
				break;
			case 'h4':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => 'regular',
					'font-size'        => '1.2rem',
					'line-height'      => '1.5',
					'letter-spacing'   => '0',
					'color'            => $greys['col7'],
					'text-transform'   => 'capitalize',
					'text-align'       => 'left',
				);
				break;
			case 'h5':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => 'regular',
					'font-size'        => '1.1rem',
					'line-height'      => '1.5',
					'letter-spacing'   => '0',
					'color'            => $greys['col7'],
					'text-transform'   => 'none',
					'text-align'       => 'left',
				);
				break;
			case 'h6':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => '600',
					'font-size'        => '1rem',
					'line-height'      => '1.5',
					'letter-spacing'   => '0',
					'color'            => $greys['col7'],
					'text-transform'   => 'none',
					'text-align'       => 'left',
				);
				break;
			case 'topbar':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => '300',
					'font-size'        => '0.8rem',
					'line-height'      => '0.8rem',
					'letter-spacing'   => '0',
					'color'            => $greys['col7'],
					'text-transform'   => 'none',
					'text-align'       => 'left',
				);
				break;
			case 'wcprocttitle':
				$font = array(
					'font-family'      => 'Montserrat',
					'variant'          => 'regular',
					'font-size'        => '1rem',
					'line-height'      => '1.5',
					'letter-spacing'   => '0',
					'color'            => $greys['col7'],
					'text-transform'   => 'none',
				);
				break;
		}
		return $font;
	}
}

/**
 * Return theme's primary & secondary colours
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_get_theme_prisec_colour' ) ) {
	function dfu_busacc_fn_get_theme_prisec_colour() {
		$btndefault = array(
			'text'  => '#f0f1f2',
			'htext' => '#fcfcfc',
			'bg'    => '#0088cc',
			'hbg'   => '#006191',
		);
		$btncol = get_theme_mod( 'dba_button', $btndefault );
		if ( true == get_theme_mod( 'dba_btn_grad' ) ) {
			$p1 = get_theme_mod( 'dba_btn_first', '#0088cc' );
			$p2 = get_theme_mod( 'dba_btn_second', '#006191' );
		} else {
			$p1 = $btncol['bg'];
			$p2 = $btncol['hbg'];
		}
		$val['pri1'] = $p1;
		$val['pri2'] = $p2;

		$lnkdefault = array(
			'text'   => '#cc4400',
			'htext'  => '#7a2800',
		);
		$linkcol = get_theme_mod( 'dba_link', $lnkdefault );
		$val['sec1'] = $linkcol['text'];
		$val['sec2'] = $linkcol['htext'];
		return $val;
	}
}

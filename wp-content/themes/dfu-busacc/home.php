<?php
/**
 * Blog posts index page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DFU_Business_Accelerator
 */

get_header();
?>

	<div class="container py-4">
		<div class="row py-4 dba-main-content">
		<?php
		$showtitleincontent = false; //initialise if no post type info exists for Posts
		$achiveposttype = get_post_type();
		$sidebar = '';
		$sidebarpos = '';
		$sidebarwidth = '';
		if ( class_exists( 'DFU_Busacc_Addon' ) && post_type_exists( 'post_types_info' ) ) {
			$ptiargs = array(
				'post_type'       => 'post_types_info',
				'posts_per_page'  => 1,
				'post_status'     => 'publish',
				'meta_key'        => 'dbacf_ptype',
				'meta_value'      => $achiveposttype,
				'order'           => 'DESC',
				'orderby'         => 'date',
			);
			$ptiquery = new WP_Query( $ptiargs );
			if ( $ptiquery->have_posts() ) {
				while ( $ptiquery->have_posts() ) {
					$ptiquery->the_post();
					$postid = get_the_ID();
					$thetitle = get_the_title();
					if ( function_exists( 'get_field' ) ) {
						$shortdesc = get_field( 'dbacf_ptype_short_desc' );
						$showtitleincontent = get_field( 'dbacf_show_title_in_content' );
						$sidebar = get_field( 'dbacf_sidebar' );
					} else {
						$shortdesc = get_post_meta( get_the_ID(), 'dbacf_ptype_short_desc', true );
						$showtitleincontent = get_post_meta( get_the_ID(), 'dbacf_show_title_in_content', true );
						$sidebar = get_post_meta( get_the_ID(), 'dbacf_sidebar', true );
					} 
					$longdesc = get_the_content();
					$titlestyle = dfu_busacc_fn_get_display_style( 1 );
					if ( ! empty( $sidebar ) ) {
						if ( function_exists( 'get_field' ) ) {
							$sidebarwidth = get_field( 'dbacf_sidebar_width' );
							$sidebarpos = get_field( 'dbacf_sidebar_pos' );
						} else {
							$sidebarwidth = get_post_meta( get_the_ID(), 'dbacf_sidebar_width', true );
							$sidebarpos = get_post_meta( get_the_ID(), 'dbacf_sidebar_pos', true );
						}
						if ( ! $sidebarwidth ) {
							$sidebarwidth = 0;
						}
						$contentwidth = 12 - $sidebarwidth;
						$sidebar = dfu_busacc_fn_get_sidebar( $sidebar );
					}
				}
				wp_reset_postdata();
			}
		} else {
			$sidebarpos = get_theme_mod( 'dba_default_sidebar_pos', 'right' );
			$sidebarwidth = get_theme_mod( 'dba_default_sidebar_width', 3 );
			$contentwidth = 12 - $sidebarwidth;
			$sidebar = 'dba-blog-sidebar';
		}

		if ( 'left' === $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) && ! empty( $sidebarwidth ) ) {
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
				<?php
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) :
						if ( class_exists( 'DFU_Busacc_Addon' ) && post_type_exists( 'post_types_info' ) ) {
							if ( $showtitleincontent && true === $showtitleincontent ) {
								$blogtitle = single_post_title( '', false );
								if ( ! $blogtitle ) {
									$blogtitle = $thetitle;
								}
								?>
								<header class="page-header">
									<h1 class="page-title <?php echo esc_attr( $titlestyle ); ?>"><span><?php echo esc_html( $blogtitle ); ?></span></h1>
								</header>
								<p class="archive-description"><?php echo wp_kses_post( $longdesc ); ?></p>
							<?php
							} elseif ( ! $showtitleincontent ) {
							?>
								<p class="archive-description"><?php echo wp_kses_post( $longdesc ); ?></p>
							<?php
							}
						} else { // theme default without post type info
							$titlestyle = get_theme_mod( 'dba_default_title_style', '' );
							$html = '<header class="page-header"><h1 class="page-title ' . esc_attr( $titlestyle ) . '"><span>' . wp_kses_post( single_post_title( '', false ) ) . '</span></h1></header>';
							echo apply_filters( 'dfu_busacc_f_blog_head', $html ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
					endif;

					$attr = array( 'type' => 1, 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/Blog' );
					?>

					<div <?php echo apply_filters( 'dfu_busacc_f_home_before_content_microdata', 'itemscope="' . esc_attr( $attr['itemscope'] ) . '" itemtype="' . esc_url( $attr['itemtype'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', get_post_format() );
					endwhile;
					?>
					</div>
					<?php
					dfu_busacc_fn_bs_paging();
				else :
					get_template_part( 'template-parts/content/content', 'none' );
				endif;
				?>
				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
			if ( 'right' === $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) && ! empty( $sidebarwidth ) ) {
				dfu_busacc_fn_display_sidebar( $sidebar, $sidebarwidth );
			}
			?>
		</div><!-- row -->
	</div><!-- container -->

<?php
if ( class_exists( 'DFU_Busacc_Addon' ) ) {
	$ptiquery = new WP_Query( $ptiargs );
	if ( $ptiquery->have_posts() ) {
		while ( $ptiquery->have_posts() ) {
			$ptiquery->the_post();
			do_action( 'dfu_busacc_a_after_content' );
		}
		wp_reset_postdata();
	}
}
get_footer();

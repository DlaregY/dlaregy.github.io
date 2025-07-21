<?php
/*
 *	Template Name: Full Width Template
 */

get_header();
?>
	<div class="container-fluid py-4">
		<div class="row py-4 dba-main-content">
		<?php
		$dfu_busacc_sidebar = '';
		$dfu_busacc_sidebarpos = '';
		$dfu_busacc_sidebarwidth = '';
		if ( function_exists( 'get_field' ) ) {
			$dfu_busacc_sidebar = get_field( 'dbacf_sidebar' );
		} else {
			$dfu_busacc_sidebar = get_post_meta( get_the_ID(), 'dbacf_sidebar', true );
		}
		if ( ! empty( $dfu_busacc_sidebar ) ) {
			if ( function_exists( 'get_field' ) ) {
				$dfu_busacc_sidebarwidth = get_field( 'dbacf_sidebar_width' );
				$dfu_busacc_sidebarpos = get_field( 'dbacf_sidebar_pos' );
			} else {
				$dfu_busacc_sidebarwidth = get_post_meta( get_the_ID(), 'dbacf_sidebar_width', true );
				$dfu_busacc_sidebarpos = get_post_meta( get_the_ID(), 'dbacf_sidebar_pos', true );
			}
			if ( ! $dfu_busacc_sidebarwidth ) {
				$dfu_busacc_sidebarwidth = 0;
			}
			$dfu_busacc_contentwidth = 12 - $dfu_busacc_sidebarwidth;
			$dfu_busacc_sidebar = dfu_busacc_fn_get_sidebar( $dfu_busacc_sidebar );
		}

		if ( 'left' === $dfu_busacc_sidebarpos && ! empty( $dfu_busacc_sidebar ) && is_active_sidebar( $dfu_busacc_sidebar ) && ! empty( $dfu_busacc_sidebarwidth ) ) {
			dfu_busacc_fn_display_sidebar( $sidebar, $dfu_busacc_sidebarwidth );
		}

		if ( ! is_active_sidebar( $dfu_busacc_sidebar ) ) {
		?>
			<div id="primary" class="col-md-12 content-area">
		<?php
		} else {
		?>
			<div id="primary" class="col-md-<?php echo esc_attr( $dfu_busacc_contentwidth ); ?> content-area">
		<?php
		}
		?>

				<main id="main" class="site-main">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'page' );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</main><!-- #main -->

			</div><!-- #primary -->
			<?php
			if ( 'right' === $dfu_busacc_sidebarpos && ! empty( $dfu_busacc_sidebar ) && is_active_sidebar( $dfu_busacc_sidebar ) && ! empty( $dfu_busacc_sidebarwidth ) ) {
				dfu_busacc_fn_display_sidebar( $sidebar, $dfu_busacc_sidebarwidth );
			}
			?>
		</div><!-- row -->
	</div><!-- container -->

<?php
do_action( 'dfu_busacc_a_after_content' );
get_footer();

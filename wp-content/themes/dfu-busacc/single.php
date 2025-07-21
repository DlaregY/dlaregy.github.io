<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DFU_Business_Accelerator
 */

get_header();
?>
	<div class="container py-4">
		<div class="row py-4 dba-main-content">
		<?php
		$sidebar = '';
		$sidebarpos = '';
		$sidebarwidth = '';
		if ( function_exists( 'get_field' ) ) {
			$sidebar = get_field( 'dbacf_sidebar' );
		} else {
			$sidebar = get_post_meta( get_the_ID(), 'dbacf_sidebar', true );
		}
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
		$attr = array( 'type' => 1, 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/Blog' );
		?>

				<main id="main" class="site-main">

				<div <?php echo apply_filters( 'dfu_busacc_f_single_before_content_microdata', 'itemscope="' . esc_attr( $attr['itemscope'] ) . '" itemtype="' . esc_url( $attr['itemtype'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', get_post_format() );

					the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
				</div>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php
			if ( 'right' == $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) && ! empty( $sidebarwidth ) ) {
				dfu_busacc_fn_display_sidebar( $sidebar, $sidebarwidth );
			}
			?>
		</div><!-- row -->
	</div><!-- container -->

<?php
do_action( 'dfu_busacc_a_after_content' );
get_footer();

<?php
/**
 * The template for displaying archive pages
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
		$sidebarpos = get_theme_mod( 'dba_default_sidebar_pos', 'right' );
		$sidebarwidth = get_theme_mod( 'dba_default_sidebar_width', 3 );
		$contentwidth = 12 - $sidebarwidth;
		$sidebar = get_theme_mod( 'dba_default_sidebar' );
		if ( 'none' === $sidebar ) {
			$sidebar = '';
		}

		if ( 'left' === $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) ) {
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
				?>

					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', get_post_type() );
					endwhile;
					?>

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
do_action( 'dfu_busacc_a_after_content' );
get_footer();

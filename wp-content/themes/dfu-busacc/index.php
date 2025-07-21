<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content/content', get_post_type() );

					endwhile;

					the_posts_pagination();

				else :

					get_template_part( 'template-parts/content/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php
			if ( 'right' === $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) ) {
				dfu_busacc_fn_display_sidebar( $sidebar, $sidebarwidth );
			}
			?>
		</div><!-- row -->
	</div><!-- container -->

<?php
get_footer();

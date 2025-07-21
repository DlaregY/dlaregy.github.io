<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		$sidebar = 'dba-search-sidebar';

		if ( 'left' === $sidebarpos && is_active_sidebar( $sidebar ) ) {
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
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<h1 class="page-title" itemprop="headline">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'dfu-busacc' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h1>
					</header><!-- .page-header -->
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'search' );
					endwhile;
					dfu_busacc_fn_bs_paging();
				else :
					get_template_part( 'template-parts/content/content', 'none' );
				endif;
				?>
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php
			if ( 'right' === $sidebarpos && is_active_sidebar( $sidebar ) ) {
				dfu_busacc_fn_display_sidebar( $sidebar, $sidebarwidth );
			}
			?>
		</div><!-- row -->
	</div><!-- container -->	
<?php
get_footer();

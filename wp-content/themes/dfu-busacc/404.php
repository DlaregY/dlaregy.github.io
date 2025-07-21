<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
		$sidebar = 'dba-404-sidebar';
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
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dfu-busacc' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dfu-busacc' ); ?></p>

							<?php
							get_search_form();
							?>

							<div class="widget widget_categories">
								<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'dfu-busacc' ); ?></h2>
								<ul>
									<?php
									wp_list_categories(
										array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										)
									);
									?>
								</ul>
							</div><!-- .widget -->

							<?php
							/* translators: %1$s: smiley */
							$dfu_busacc_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'dfu-busacc' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$dfu_busacc_archive_content" );
							?>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->

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

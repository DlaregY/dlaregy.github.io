<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DFU_Business_Accelerator
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( function_exists( 'get_field' ) ) {
			$showtitleincontent = get_field( 'dbacf_show_title_in_content' );
		} else {
			$showtitleincontent = get_post_meta( get_the_ID(), 'dbacf_show_title_in_content', true );
		}
		$titlestyle = dfu_busacc_fn_get_display_style();
		if ( $showtitleincontent && true === $showtitleincontent ) {
			the_title( '<h1 class="entry-title ' . $titlestyle . '"><span>', '</span></h1>' );
		}
		?>
	</header><!-- .entry-header -->

	<?php if ( '' !== get_post()->post_content ) { ?>
	<div class="entry-content" itemprop="mainContentOfPage">
		<?php
		the_content();

		do_action( 'dfu_busacc_a_after_page_content' );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dfu-busacc' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php } ?>

	<?php
	if ( get_edit_post_link() ) :
	?>
		<footer class="entry-footer">
			<?php
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
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php
	endif;
	?>
</article><!-- #post-<?php the_ID(); ?> -->


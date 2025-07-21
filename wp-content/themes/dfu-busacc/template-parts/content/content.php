<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DFU_Business_Accelerator
 */

?>

<?php
do_action( 'dfu_busacc_a_before_post' );
if ( ( is_single() && 'post' == get_post_type() ) || is_home() ) {
	$dfu_busacc_attr = array( 'type' => 2, 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/BlogPosting', 'itemprop' => 'blogPost' );
} else {
	$dfu_busacc_attr = array( 'type' => 2, 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/Article', 'itemprop' => 'mainEntity' );
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); echo apply_filters( 'dfu_busacc_f_content_article_microdata', ' itemscope="' . esc_attr( $dfu_busacc_attr['itemscope'] ) . '" itemtype="' . esc_url( $dfu_busacc_attr['itemtype'] ) . '" itemprop="' . esc_attr( $dfu_busacc_attr['itemprop'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> >
	<header class="entry-header">
		<?php
		if ( is_singular() ) {
			if ( function_exists( 'get_field' ) ) {
				$dfu_busacc_showtitleincontent = get_field( 'dbacf_show_title_in_content' );
			} else {
				$dfu_busacc_showtitleincontent = get_post_meta( get_the_ID(), 'dbacf_show_title_in_content', true );
			}
			$dfu_busacc_titlestyle = dfu_busacc_fn_get_display_style();
			if ( $dfu_busacc_showtitleincontent && true == $dfu_busacc_showtitleincontent ) {
				the_title( '<h1 class="entry-title ' . $dfu_busacc_titlestyle . '" itemprop="headline"><span>', '</span></h1>' );
			} else {
			?>
				<meta itemprop="headline" content="<?php echo esc_attr( the_title() ); ?>">
			<?php	
			}
		} else {
			the_title( '<h2 class="entry-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) {
			?>
			<div class="entry-meta">
				<?php
				dfu_busacc_fn_blog_header();
				?>
			</div><!-- .entry-meta -->
		<?php
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-body">
		<div class="row">
		<?php
		$dfu_busacc_showfeaturedimg = false;
		if ( function_exists( 'get_field' ) ) {
			$dfu_busacc_showfeaturedimg = get_field( 'dbacf_post_show_img' );
		} else {
			$dfu_busacc_showfeaturedimg = get_post_meta( get_the_ID(), 'dbacf_post_show_img', true );
		}
		$dfu_busacc_listimgwidth = get_theme_mod( 'dba_blog_list_width' );
		$dfu_busacc_postimgpc = get_theme_mod( 'dba_blog_img_pc', 50 );
		if ( is_singular( 'post' ) || is_single() ) { // single post or item
		?>
			<div class="col-12">
			<?php
			if ( $dfu_busacc_showfeaturedimg ) {
				if ( has_post_thumbnail() ) {
					echo '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
					$dfu_busacc_img_id = get_post_thumbnail_id();
					$dfu_busacc_sizes = '(min-width: 768px) ' . $dfu_busacc_postimgpc . 'vw, 100vw';
					dfu_busacc_fn_get_responsive_img_display( true, $dfu_busacc_img_id, $dfu_busacc_sizes, 'full', 'url', 'float-left mr-md-3 my-2 dba-singlepost-img' );
					echo '</div>';
				}
			} else {
				do_action( 'dfu_busacc_a_add_image_microdata' );
			}
			?>
			<div class="entry-content" itemprop="articleBody">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dfu-busacc' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);

				do_action( 'dfu_busacc_a_after_post_content' );

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dfu-busacc' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
			</div><!-- col -->
		<?php
		} else { // posts archive
			if ( has_post_thumbnail() ) {
				if ( $dfu_busacc_listimgwidth ) {
					dfu_busacc_fn_display_col_wide( $dfu_busacc_listimgwidth, 1 ); //div col
					$dfu_busacc_img_id = get_post_thumbnail_id();
					$dfu_busacc_sizes = dfu_busacc_fn_get_img_size_wide( $dfu_busacc_listimgwidth );
					echo '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
					dfu_busacc_fn_get_responsive_img_display( true, $dfu_busacc_img_id, $dfu_busacc_sizes, 'full', 'url', 'my-2 dba-post-img' );
					echo '</div>';
					?>
					</div><!-- col -->
				<?php
				}
			}
			if ( ! has_post_thumbnail() ) {
			?>
				<div class="col-md-12">
			<?php
			} else {
				if ( $dfu_busacc_listimgwidth ) {
					if ( '4' == $dfu_busacc_listimgwidth ) {
					?>
						<div class="col-12 col-md-8 col-lg-9">
					<?php
					} elseif ( '3' == $dfu_busacc_listimgwidth ) {
					?>
						<div class="col-12 col-md-6 col-lg-8">
					<?php
					} elseif ( '2' == $dfu_busacc_listimgwidth ) {
					?>
						<div class="col-12 col-md-6">
					<?php
					} elseif ( '1' == $dfu_busacc_listimgwidth ) {
					?>
						<div class="col-12">
					<?php
					}
				}
			}
			?>
							<div class="entry-summary" itemprop="description">
							<?php
							the_excerpt(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'dfu-busacc' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									get_the_title()
								)
							);
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dfu-busacc' ),
									'after'  => '</div>',
								)
							);
							?>
							</div><!-- .entry-summary -->
						</div><!-- col -->
		<?php
		}
		?>

		</div><!-- row -->
	</div><!-- .entry-body -->

	<footer class="entry-footer">
		<?php dfu_busacc_fn_blog_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<?php do_action( 'dfu_busacc_a_before_post_end' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php do_action( 'dfu_busacc_a_after_post' ); ?>

<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DFU_Business_Accelerator
 */

$attr = array( 'type' => 2, 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/Article', 'itemprop' => 'mainEntity' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo apply_filters( 'dfu_busacc_f_content_search_article_microdata', ' itemscope="' . esc_attr( $attr['itemscope'] ) . '" itemtype="' . esc_url( $attr['itemtype'] ) . '" itemprop="' . esc_attr( $attr['itemprop'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			dfu_busacc_fn_blog_header();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-body">
		<div class="row">
		<?php
		if ( has_post_thumbnail() ) {
			$dfu_busacc_listimgwidth = get_theme_mod( 'dba_blog_list_width' );
			if ( $dfu_busacc_listimgwidth ) {
				dfu_busacc_fn_display_col_wide( $dfu_busacc_listimgwidth, 1 ); //div col
				echo '<div itemprop="image" itemscope itemtype="http://schema.org/ImageObject">';
				$img_id = get_post_thumbnail_id();
				$sizes = dfu_busacc_fn_get_img_size_wide( $dfu_busacc_listimgwidth );
				dfu_busacc_fn_get_responsive_img_display( true, $img_id, $sizes, 'full', 'url', 'my-2 dba-post-img' );
				echo '</div>';
				?>
				</div><!-- col -->
			<?php
			}
		} else {
			do_action( 'dfu_busacc_a_add_image_microdata' );
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

						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->
					</div><!-- col -->
		</div><!-- row -->
	</div><!-- .entry-body -->

	<footer class="entry-footer">
		<?php dfu_busacc_fn_blog_footer(); ?>
	</footer><!-- .entry-footer -->

	<?php do_action( 'dfu_busacc_a_before_post_end' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->


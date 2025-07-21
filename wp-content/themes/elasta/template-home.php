<?php
/*
 * Template Name: Hide Title Bar
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */

get_header();
?>
<div class="elst-ele-page-wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-12 elst-page-col">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
					wp_link_pages(
						array(
							'before'           => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'elasta' ),
				      'after'            => '</div>',
				      'link_before'      => '<span>',
				      'link_after'       => '</span>',
				      'next_or_number'   => 'number',
				      'separator'        => ' ',
				      'pagelink'         => '%',
				      'echo'             => 1
						)
					);
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile;
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
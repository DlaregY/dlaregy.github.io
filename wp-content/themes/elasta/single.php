<?php
/*
 * The template for displaying all single posts.
 * Author & Copyright: Elasta
 * URL: https://nicheaddons.com/
 */
get_header();
global $elasta_redux_options;

// Theme Options
$elasta_sidebar_position = (isset($elasta_redux_options['blog_sidebar_position'])) ? $elasta_redux_options['blog_sidebar_position'] : '';
$elasta_blog_widget = (isset($elasta_redux_options['blog_widget'])) ? $elasta_redux_options['blog_widget'] : '';

if ($elasta_blog_widget) {
	$widget_select = $elasta_blog_widget;
} else {
	if (is_active_sidebar('sidebar-1')) {
		$widget_select = 'sidebar-1';
	} else {
		$widget_select = '';
	}
}

// Sidebar Position
if ($widget_select && is_active_sidebar( $widget_select )) {
	if ($elasta_sidebar_position === 'sidebar-hide') {
		$layout_class = 'col-md-12';
		$elasta_sidebar_class = 'hide-sidebar';
	} elseif ($elasta_sidebar_position === 'sidebar-left') {
		$layout_class = 'elst-primary';
		$elasta_sidebar_class = 'left-sidebar';
	} else {
		$layout_class = 'elst-primary';
		$elasta_sidebar_class = 'right-sidebar';
	}
} else {
	$elasta_sidebar_position = 'sidebar-hide';
	$layout_class = 'col-md-12';
	$elasta_sidebar_class = 'hide-sidebar';
}
?>
<div id="elst-content" class="elst-mid-wrap elst-post-single <?php echo esc_attr($elasta_sidebar_class); ?>">
	<div class="container">
    <div class="row">
      <div class="<?php echo esc_attr($layout_class); ?>">
        <div class="elst-unit-fix">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/post/content', 'single' );
							if ( comments_open() || get_comments_number() ) :
			          comments_template();
			        endif;
						endwhile;
					else :
						get_template_part( 'template-parts/post/content', 'none' );
					endif; ?>
				</div><!-- unit-fix -->
			</div><!-- layout -->
			<?php
				if ($elasta_sidebar_position !== 'sidebar-hide') {
					get_sidebar(); // Sidebar
				}
			?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- mid -->
<?php
get_footer();

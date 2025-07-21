<?php
/**
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DFU_Business_Accelerator
 */

get_header();

if ( get_theme_mod( 'dba_hp_custom_header', 'false' ) ) {
	$headertype = get_theme_mod( 'dba_hp_headimg_slider', false );
	$headerstyle = get_theme_mod( 'dba_hp_headimg_style', '1' );
	if ( ! $headertype ) {
		get_template_part( 'template-parts/header/header', 'hpheaderimg' . $headerstyle );
	} else {
		get_template_part( 'template-parts/header/header', 'hpheaderslider' . $headerstyle );
	}
}

$showcta = get_theme_mod( 'dba_hp_cta', false );
if ( $showcta ) {
	get_template_part( 'template-parts/frontpage/content', 'cta' );
}

$showwidget = get_theme_mod( 'dba_hp_cta_widget_below', false );
$ctasidebarname = 'dba-home-head-sidebar';
if ( $showwidget && is_active_sidebar( $ctasidebarname ) ) {
	$ctawidgetcontainer = get_theme_mod( 'dba_hp_cta_widget_below_container', 'full-width' );
	$ctawidgetwidth = get_theme_mod( 'dba_hp_cta_widget_below_width', 'container' );
	if ( $ctawidgetcontainer ) {
		$bgcolor = get_theme_mod( 'dba_hp_cta_widget_below_bgcolor' );
		dfu_busacc_fn_display_h_sidebar( $ctawidgetcontainer, $ctawidgetwidth, $ctasidebarname, $bgcolor );
	}
	do_action( 'dfu_busacc_a_after_cta_widget' );
}
?>

	<div class="container<?php echo ( ( have_posts() && '' !== get_post()->post_content ) ? ' py-4' : '' ); ?>">
		<div class="row dba-main-content<?php echo ( ( have_posts() && '' !== get_post()->post_content ) ? ' py-4' : '' ); ?>">

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

		if ( 'left' === $sidebarpos && ! empty( $sidebar ) && is_active_sidebar( $sidebar ) && ! empty( $sidebarwidth ) ) {
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
				while ( have_posts() ) :
					the_post(); 

					get_template_part( 'template-parts/content/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
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
do_action( 'dfu_busacc_a_hp_sections' );
do_action( 'dfu_busacc_a_hp_after_content' );
get_footer();


<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DFU_Business_Accelerator
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$attr = array( 'type' => 1, 'itemscope' => 'itemscope', 'itemtype' => 'http://schema.org/WPSideBar' );
?>

<aside id="secondary" class="widget-area" <?php echo apply_filters( 'dfu_busacc_f_sidebar_secondary_microdata', 'itemscope="' . esc_attr( $attr['itemscope'] ) . '" itemtype="' . esc_url( $attr['itemtype'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

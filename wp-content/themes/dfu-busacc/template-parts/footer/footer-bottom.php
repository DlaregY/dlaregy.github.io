<?php
$dfu_busacc_fwidth = dfu_busacc_fn_get_footer_width();
?>

<div id="btm-footer" class="pt-4 pb-4 dba-btm-footer">
	<div class="<?php echo esc_attr( $dfu_busacc_fwidth ); ?>">
		<div class="row">
			<div class="col-12 text-center col-md-auto mr-md-auto text-md-left pb-2">
				<?php
				if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'footer-menu' ) ) {
				?>
					<nav id="footer-navigation">
						<?php
						wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );
						?>
					</nav><!-- #site-navigation -->
				<?php
				} else {
					wp_nav_menu(
						array(
							'theme_location'    => 'footer-menu',
							'container'         => 'nav',
							'menu_id'           => 'footer-menu',
							'menu_class'        => 'list-inline small',
							'depth'				=> 1,
							'fallback_cb'       => false,
						)
					);
				}
				?>
			</div><!-- col -->

			<div class="col-12 text-center col-md-auto text-md-right">
				<div id="footer-copyright" class="small">
					<?php
					if ( get_theme_mod( 'dba_busreg_on_copyright', false ) ) {
						echo '<div>' . esc_html( get_theme_mod( 'dba_busreg_label' ) ) . ' ' . esc_html( get_theme_mod( 'dba_busreg_no' ) ) . '</div>';
					}
					if ( get_theme_mod( 'dba_copyright', true ) ) {
						echo '<div>&copy; ' . date_i18n( __( 'Y' , 'dfu-busacc' ) ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a></div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					do_action( 'dfu_busacc_a_below_copyright_msg' );
					?>
				</div><!-- #footer-copyright small -->
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- #btm-footer -->

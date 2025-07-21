<?php
/* Count active footers */
$dfu_busacc_active_sb = 0;
$dfu_busacc_numfooterbar = get_theme_mod( 'dba_footerbar_no', 0 );
for ( $dfu_busacc_x = 0; $dfu_busacc_x < $dfu_busacc_numfooterbar; $dfu_busacc_x++ ) {
	$dfu_busacc_num = $dfu_busacc_x + 1;
	$dfu_busacc_footerbar = 'dba-footerbar-' . $dfu_busacc_num;
	if ( is_active_sidebar( $dfu_busacc_footerbar ) ) {
		++$dfu_busacc_active_sb;
	}
}
if ( $dfu_busacc_active_sb > 0 ) {
	$dfu_busacc_fwidth = dfu_busacc_fn_get_footer_width();
	?>
	<div id="top-footer" class="pt-4 pb-4 dba-top-footer">
		<div class="<?php echo esc_attr( $dfu_busacc_fwidth ); ?>">
			<div class="row">
				<?php
				switch ( $dfu_busacc_active_sb ) {
				case 1:
					$dfu_busacc_coltype1 = 'col-md-12';
					break;
				case 2:
				case 4:
					$dfu_busacc_coltype1 = 'col-md-6';
					break;
				case 3:
					$dfu_busacc_coltype1 = 'col-md-6 col-lg-4';
					$dfu_busacc_coltype2 = 'col-md-12 col-lg-4';
					break;
				}
				$dfu_busacc_currcnt = 0;
				for ( $dfu_busacc_x = 0; $dfu_busacc_x < $dfu_busacc_numfooterbar; $dfu_busacc_x++ ) {
					$dfu_busacc_num = $dfu_busacc_x + 1;
					$dfu_busacc_footerbar = 'dba-footerbar-' . $dfu_busacc_num;
					if ( is_active_sidebar( $dfu_busacc_footerbar ) ) {
						++$dfu_busacc_currcnt;
						?>
						<div class="<?php echo esc_attr( ( 3 == $dfu_busacc_active_sb && 3 == $dfu_busacc_currcnt ? $dfu_busacc_coltype2 : $dfu_busacc_coltype1 ) ); ?>">
							<?php dynamic_sidebar( $dfu_busacc_footerbar ); ?>
						</div><!-- col -->
					<?php
					}
				}
				?>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- #top-footer -->

<?php
}
?>

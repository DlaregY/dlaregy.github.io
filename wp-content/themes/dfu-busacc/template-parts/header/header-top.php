<?php
$dfu_busacc_topbarwidth = get_theme_mod( 'dba_topbar_width', 'container' );
?>
<div id="topbar" class="site-topbar">
	<div class="<?php echo esc_attr( $dfu_busacc_topbarwidth ); ?>">
		<div class="row justify-content-center justify-content-md-start align-items-center">
			<div class="col-12 text-center col-md-auto mr-md-auto text-md-left">
				<?php
				$dfu_busacc_topbarwidgets1 = 'dba-topbar-sidebar-1';
				if ( is_active_sidebar( $dfu_busacc_topbarwidgets1 ) ) {
					dynamic_sidebar( $dfu_busacc_topbarwidgets1 );
				}
				?>
			</div><!-- col -->
			<div class="col-12 text-center col-md-auto text-md-right">
				<?php
				$dfu_busacc_topbarwidgets2 = 'dba-topbar-sidebar-2';
				if ( is_active_sidebar( $dfu_busacc_topbarwidgets2 ) ) {
					dynamic_sidebar( $dfu_busacc_topbarwidgets2 );
				}
				?>
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- container -->                  
</div><!-- #topbar -->

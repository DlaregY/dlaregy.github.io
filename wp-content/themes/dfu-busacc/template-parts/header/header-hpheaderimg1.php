<section id="hp-headerimg" class="hp-header-img">
	<?php $dfu_busacc_cont = get_theme_mod( 'dba_hp_headimg_container', 'full-width' ); ?>
	<div class="<?php echo esc_attr( $dfu_busacc_cont ); ?> dba-hp-header-container">
		<div class="row<?php echo ( 'container' == $dfu_busacc_cont ? '' : ' no-gutters' ); ?>">
			<?php
			$dfu_busacc_lwidth = intval( get_theme_mod( 'dba_hp_headimg_width', '12' ) );
			if ( '12' === $dfu_busacc_lwidth ) {
				$dfu_busacc_rwidth = 12;
			} else {
				$dfu_busacc_rwidth = 12 - $dfu_busacc_lwidth;
			}
			?>

			<div class="px-0 col-12 col-lg-<?php echo esc_attr( $dfu_busacc_lwidth ); ?> dba-hp-header-img">
					<?php
					if ( has_header_image() ) {
						if ( is_random_header_image() ) {
							$dfu_busacc_img_url = get_random_header_image();
							$dfu_busacc_img_id = attachment_url_to_postid( $dfu_busacc_img_url );
						} else {
							$dfu_busacc_img_data = get_theme_mod( 'header_image_data' );
							if ( $dfu_busacc_img_data ) {
								if ( isset( $dfu_busacc_img_data->attachment_id ) ) {
									$dfu_busacc_img_id = $dfu_busacc_img_data->attachment_id;
								}
							}
						}
						if ( isset( $dfu_busacc_img_id ) && 0 !== $dfu_busacc_img_id ) {
							$dfu_busacc_lgsize = $dfu_busacc_lwidth / 12 * 100;
							$dfu_busacc_sizes = '(min-width: 992px) ' . $dfu_busacc_lgsize . 'vw, 100vw';
							dfu_busacc_fn_get_responsive_img_display( true, $dfu_busacc_img_id, $dfu_busacc_sizes );
						} else { // using theme default suggested image
							the_custom_header_markup();
						}
						?>
					<?php
					}
					?>
			</div><!-- col -->

			<div class="px-0 col-12 text-center col-lg-<?php echo esc_attr( $dfu_busacc_rwidth ); ?> align-self-stretch justify-content-center <?php echo ( '12' == $dfu_busacc_lwidth ? '' : 'text-lg-left justify-content-lg-start' ); ?> dba-hp-header-txt">
				<div class="align-self-center dba-hp-header-txt-group pb-5 pb-lg-1">
					<?php 
					$dfu_busacc_hpimghead = get_theme_mod( 'dba_hp_headimg_head' ); 
					$dfu_busacc_hpimgmsg = get_theme_mod( 'dba_hp_headimg_msg' );
					if ( ! empty( $dfu_busacc_hpimghead ) ) {
						echo '<h2 class="d-inline-block text-center text-lg-left dba-header-txt-head">' . esc_html( $dfu_busacc_hpimghead ) . '</h2>';
					}
					if ( ! empty( $dfu_busacc_hpimgmsg ) ) {
						echo '<p class="dba-header-txt-msg">' . esc_html( $dfu_busacc_hpimgmsg ) . '</p>';
					}
					$dfu_busacc_btntext = get_theme_mod( 'dba_hp_headimg_btn_text' );
					if ( ! empty( $dfu_busacc_btntext ) ) {
					?>
						<a class="btn btn-lg dba-header-txt-btn" href="<?php echo esc_url( get_theme_mod( 'dba_hp_headimg_btn_url' ) ); ?>" role="button"><?php echo esc_html( $dfu_busacc_btntext ); ?></a>
					<?php
					}
					?>
				</div>
			</div><!-- col -->

		</div><!-- row -->
	</div><!-- container -->
</section><!-- #hp-headerimg -->

<section id="hp-headerimg" class="hp-header-img">
	<div class="<?php echo ( get_theme_mod( 'dba_hp_headimg_container', 'container' ) == 'container' ? esc_attr( get_theme_mod( 'dba_hp_headimg_container', 'container' ) ) : esc_attr( get_theme_mod( 'dba_hp_headimg_container', 'container' ) ) . ' px-0' ); ?> dba-hp-header-container">
		<div class="row no-gutters">
			<?php
			$dfu_busacc_lwidth = 12;
			$dfu_busacc_rwidth = 12;
			$dfu_busacc_txtypos = get_theme_mod( 'dba_hp_headimg_txtypos', 'centery' );
			$dfu_busacc_txtxpos = get_theme_mod( 'dba_hp_headimg_txtxpos', 'centerx' );
			?>

			<div class="col-12 dba-hp-header-img">
				<?php
				$dfu_busacc_headerimgs = get_uploaded_header_images();
				$dfu_busacc_imgcount = count( $dfu_busacc_headerimgs );
				if ( 0 == $dfu_busacc_imgcount ) {
					$dfu_busacc_imgnum = 2;
				} else {
					$dfu_busacc_imgnum = $dfu_busacc_imgcount;
				}
				$dfu_busacc_i = 0;
				$dfu_busacc_lgsize = $dfu_busacc_lwidth / 12 * 100;
				$dfu_busacc_sizes = '(min-width: 992px) ' . $dfu_busacc_lgsize . 'vw, 100vw';
				?>
				<div id="dbaProductSlider" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						while ( $dfu_busacc_i < $dfu_busacc_imgnum ) {
						?>
							<li data-target="#dbaProductSlider" data-slide-to="<?php echo esc_attr( $dfu_busacc_i ); ?>"<?php ( 0 == $dfu_busacc_i ? ' class="active"' : '' ); ?>></li>
							<?php
							$dfu_busacc_i++;
						}
						?>          
					</ol>
					<div class="carousel-inner">

					<?php
					if ( 0 == $dfu_busacc_imgcount ) {
						dfu_busacc_fn_default_header_slider();
					} else {
						$dfu_busacc_j = 0;
						foreach ( $dfu_busacc_headerimgs as $dfu_busacc_headerimg ) {
						?>
							<div class="carousel-item<?php echo ( 0 == $dfu_busacc_j ? ' active' : '' ); ?>">
							<?php
							$dfu_busacc_img_kses_array = array( 
								'img' => array(
									'src'      => true,
									'srcset'   => true,
									'sizes'    => true,
									'class'    => true,
									'id'       => true,
									'width'    => true,
									'height'   => true,
									'alt'      => true,
									'loading'    => true,
								),
							);
							echo wp_kses( dfu_busacc_fn_get_responsive_slider_img_display( $dfu_busacc_headerimg, $dfu_busacc_sizes ), $dfu_busacc_img_kses_array); ?>
							</div>
						<?php
							$dfu_busacc_j++;
						}
					}
					?>
					</div><!-- carousel-inner -->
					<a class="carousel-control-prev" href="#dbaProductSlider" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#dbaProductSlider" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div><!-- #dbaProductSlider -->

				<div class="dba-hp-header-txtonimg <?php echo esc_attr( $dfu_busacc_txtypos . ' ' . $dfu_busacc_txtxpos ); ?> dba-onslider">
					<div class="dba-hp-header-txtonimg-txt">
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
							<a class="btn btn-lg dba-header-txt-btn" href="<?php echo esc_url( get_theme_mod( 'dba_hp_headimg_btn_url') ); ?>" role="button"><?php echo esc_html( $dfu_busacc_btntext ); ?></a>
						<?php
						}
						?>
					</div>
				</div>
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- container -->
</section><!-- #hp-headerimg -->

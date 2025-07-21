<?php
$parallax = get_theme_mod( 'dba_hp_cta_parallax', false );
if ( $parallax ) {
	$speed = '6';
} else {
	$speed = '0';
}
$ctacontainer = get_theme_mod( 'dba_hp_cta_container', 'full-width' );
?>
<section id="cta" class='hp-cta' data-type="background" data-speed="<?php echo esc_attr( $speed ); ?>">
	<div class="<?php echo ( 'full-width' == $ctacontainer ? 'container-fluid py-5 dba-cta' : '' ); ?>">
		<div class="container<?php echo ( 'full-width' == $ctacontainer ? '' : ' py-5 dba-cta' ); ?>">
		<div class="row text-center">
			<div class="col-12">
				<?php
				$ctahead = get_theme_mod( 'dba_hp_cta_head' );
				$ctamsg = get_theme_mod( 'dba_hp_cta_msg' );
				if ( ! empty( $ctahead ) ) {
				?>
					<h2 class="d-inline-block dba-cta-title text-center"><?php echo esc_html( $ctahead ); ?></h2>
				<?php
				}
				if ( ! empty( $ctamsg ) ) {
				?>
					<p class="lead dba-cta-msg"><?php echo esc_html( $ctamsg ); ?></p>
				<?php
				}
				if ( class_exists( 'Company_Info_SEO_Plugin' ) ) {
					$showphone = get_theme_mod( 'dba_hp_cta_showphone', 'false' );
					if ( $showphone ) {
						$phone = get_field( 'dfucf_pcis_comp_phoneno1', 'option' );
						?>
						<p class="lead dba-cta-phone"><a href="tel:<?php echo esc_attr( str_replace( ' ', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
					<?php
					}
					$showhours = get_theme_mod( 'dba_hp_cta_showhours', 'false' );
					if ( $showhours ) {
						if ( have_rows( 'dfucf_pcis_opening_hours', 'option' ) ) :
							$hours = _x( 'Hours:', 'Text before opening hours', 'dfu-busacc' );
							while ( have_rows( 'dfucf_pcis_opening_hours', 'option' ) ) :
								the_row();
								$businessdays = get_sub_field( 'dfucf_pcis_business_days' );
								$numrows = count( $businessdays );
								$labels = array();
								for ( $j = 0; $j < $numrows; $j++ ) {
									$labels[] = $businessdays[ $j ]['label'];
								}
								$dayslabel = implode( ', ', $labels );
								$allday = get_sub_field( 'dfucf_pcis_all_day' );
								$from = get_sub_field( 'dfucf_pcis_business_hr_from' );
								$to = get_sub_field( 'dfucf_pcis_business_hr_to' );
								$hours .= ' ' . $dayslabel . ( $allday ? '' : '&nbsp;' . $from . '-' . $to );
							endwhile;
						endif;
						?>
						<p class="dba-cta-hours"><?php echo esc_html( $hours ); ?></p>
					<?php
					}
				}
				$dfu_busacc_ctabtntext = get_theme_mod( 'dba_hp_cta_btn_txt' );
				if ( ! empty( $dfu_busacc_ctabtntext ) ) {
					echo '<a class="btn btn-lg dba-cta-btn" href="' . esc_url( get_theme_mod( 'dba_hp_cta_btn_url' ) ) . '" role="button">' . esc_html( get_theme_mod( 'dba_hp_cta_btn_txt' ) ) . '</a>';
				}
				?>
			</div><!-- col -->
		</div><!-- row -->
		</div><!-- container -->
	</div><!-- CTA width -->
</section>



<?php

add_action( 'customize_register', function( $wp_customize ) {
	if ( class_exists( 'WP_Customize_Control' ) ) :
		if ( ! class_exists( 'Dfu_busacc_Custom_Separator_Control' ) ) :
			class Dfu_busacc_Custom_Separator_Control extends WP_Customize_Control {
				public $type = 'separator';
				public function render_content() { ?>
					<hr>
				<?php
				}
			}
		endif;

		if ( ! class_exists( 'Dfu_busacc_Custom_Head_Control' ) ) :
			class Dfu_busacc_Custom_Head_Control extends WP_Customize_Control {
				public $type = 'head';
				public function render_content() {
				?>
					<span class="customize-control-title" style="font-size: 16px; line-height: 26px; color: #00a6b2; border-bottom: 2px solid #00a6b2;"><?php echo esc_html( $this->label ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></span>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></span>
				<?php
				}
			}
		endif;

		if ( ! class_exists( 'Dfu_busacc_Custom_Info_Control' ) ) :
			class Dfu_busacc_Custom_Info_Control extends WP_Customize_Control {
				public $type = 'info';
				public function render_content() {
				?>
					<span class="description customize-control-description" style="color: #00383c; padding: 4px; border: 2px solid #00a6b2; border-radius: 4px;">
					<strong><?php echo esc_html( $this->label ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?><br></strong>
					<?php echo wp_kses_post( $this->description ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?>
					</span>
				<?php
				}
			}
		endif;

		if ( ! class_exists( 'Dfu_busacc_Custom_Warning_Control' ) ) :
			class Dfu_busacc_Custom_Warning_Control extends WP_Customize_Control {
				public $type = 'warning';
				public function render_content() {
				?>
					<span class="description customize-control-description" style="color: #00383c; padding: 4px; border: 2px solid #b20c00; border-radius: 4px;">
					<strong><?php echo esc_html( $this->label ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?><br></strong>
					<?php echo wp_kses_post( $this->description ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?>
					</span>
				<?php
				}
			}
		endif;

		if ( ! class_exists( 'Dfu_busacc_Custom_Steps_Control' ) ) :
			class Dfu_busacc_Custom_Steps_Control extends WP_Customize_Control {
				public $type = 'steps';
				public function render_content() {
				?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></span>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></span>
				<?php
				}
			}
		endif;

		if ( ! class_exists( 'Dfu_busacc_Custom_Guide_Control' ) ) :
			class Dfu_busacc_Custom_Guide_Control extends WP_Customize_Control {
				public $type = 'guide';
				public function render_content() {
				?>
					<span class="customize-control-title" style="font-size: 16px; line-height: 26px; color: #00a6b2;"><?php echo esc_html( $this->label ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></span>
					<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></span>
				<?php
				}
			}
		endif;

		// Reset theme options Control
		if ( ! class_exists( 'Dfu_busacc_Custom_Set_Default_Control' ) ) :
			class Dfu_busacc_Custom_Set_Default_Control extends WP_Customize_Control {
				public $type = 'button';
				public function render_content() {
					$nonce = wp_create_nonce("theme_reset_nonce");
					$link = admin_url('admin-ajax.php?action=dba_theme_reset&nonce='.$nonce);
					?>
					<label>
						<div>
							<a href="#" data-nonce="<?php echo esc_attr( $nonce ); ?>" id="theme_reset_btn" class="button button-primary button-large"><?php echo esc_html( $this->label ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></a>
						</div>
						<div class="set-default-info" style="color: red; margin-top: 4px; padding: 4px;"></div>
					</label>
				<?php
				}
			}
		endif;

		if ( ! class_exists( 'Dfu_busacc_Custom_Set_Theme_Color_Control' ) ) :
			class Dfu_busacc_Custom_Set_Theme_Color_Control extends WP_Customize_Control {
				public $type = 'button';
				public function render_content() {
					$nonce = wp_create_nonce("theme_set_color_nonce");
					$link = admin_url('admin-ajax.php?action=dba_set_theme_color&nonce='.$nonce);
					?>
					<label>
						<div>
							<a href="<?php echo esc_url( $link ); ?>" data-nonce="<?php echo esc_attr( $nonce ); ?>" id="theme_set_color_btn" class="button button-primary button-large"><?php echo esc_html( $this->label ); // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.ThisFoundOutsideClass ?></a>
						</div>
						<div class="set-color-info" style="color: red; margin-top: 4px; padding: 4px;"></div>
					</label>
				<?php
				}
			}
		endif;

		// Register our custom control with Kirki
		add_filter( 'kirki_control_types', function( $controls ) {
			$controls['separator'] = 'Dfu_busacc_Custom_Separator_Control';
			$controls['head'] = 'Dfu_busacc_Custom_Head_Control';
			$controls['info'] = 'Dfu_busacc_Custom_Info_Control';
			$controls['warning'] = 'Dfu_busacc_Custom_Warning_Control';
			$controls['guide'] = 'Dfu_busacc_Custom_Guide_Control';
			$controls['steps'] = 'Dfu_busacc_Custom_Steps_Control';
			$controls['setthemedefault'] = 'Dfu_busacc_Custom_Set_Default_Control';
			$controls['setthemecolor'] = 'Dfu_busacc_Custom_Set_Theme_Color_Control';
			return $controls;
			}
		);

	endif;
} );

?>

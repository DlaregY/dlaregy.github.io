<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package DFU_Business_Accelerator
 *******************************************************************************************************************************************/

if ( function_exists( 'register_block_style' ) ) {
	function dfu_busacc_fn_register_block_styles() {
    	register_block_style(
			'core/button',
			array(
				'name'  => 'dfu-busacc-theme-button',
				'label' => esc_html__( 'Theme button', 'dfu-busacc' ),
			)
		);

		register_block_style(
			'core/table',
			array(
				'name'  => 'dfu-busacc-theme-borderless-table',
				'label' => esc_html__( 'Borderless', 'dfu-busacc' ),
			)
		);

		register_block_style(
			'core/table',
			array(
				'name'  => 'dfu-busacc-theme-borderless-narrow-first-col-table',
				'label' => esc_html__( 'Borderless and narrow first column', 'dfu-busacc' ),
			)
		);

		register_block_style(
			'core/social-links',
			array(
				'name'  => 'dfu-busacc-theme-social-icons-theme-button',
				'label' => esc_html__( 'Theme button style', 'dfu-busacc' ),
			)
		);

		register_block_style(
			'core/social-links',
			array(
				'name'  => 'dfu-busacc-theme-social-icons-primary',
				'label' => esc_html__( 'Theme primary colour', 'dfu-busacc' ),
			)
		);

		register_block_style(
			'core/social-links',
			array(
				'name'  => 'dfu-busacc-theme-social-icons-secondary',
				'label' => esc_html__( 'Theme secondary colour', 'dfu-busacc' ),
			)
		);

		register_block_style(
			'core/list',
			array(
				'name'  => 'dfu-busacc-theme-list-double-right-arrow',
				'label' => esc_html__( 'Theme double right arrow list', 'dfu-busacc' ),
			)
		);

		register_block_style(
			'core/list',
			array(
				'name'  => 'dfu-busacc-theme-list-asterisk',
				'label' => esc_html__( 'Theme asterisk list', 'dfu-busacc' ),
			)
		);

	}
	add_action( 'init', 'dfu_busacc_fn_register_block_styles' );
}

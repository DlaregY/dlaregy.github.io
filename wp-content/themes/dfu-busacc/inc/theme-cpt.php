<?php
/* 
 * ACF
 *******************************************************************************************************************************************/
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_5d662940d0f04',
		'title' => esc_html__( 'Header, Footer and Titles', 'dfu-busacc' ),
		'fields' => array(
			array(
				'key' => 'field_5d81faf183601',
				'label' => esc_html__( 'Header', 'dfu-busacc' ),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5d71c9306a1ac',
				'label' => esc_html__( 'Header type', 'dfu-busacc' ),
				'name' => 'dbacf_header_type',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'none' => esc_html__( 'None', 'dfu-busacc' ),
					'img' => esc_html__( 'Image', 'dfu-busacc' ),
					'bgcolour' => esc_html__( 'Background colour', 'dfu-busacc' ),
					'slider' => esc_html__( 'Slider', 'dfu-busacc' ),
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'array',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d71c9b66a1ad',
				'label' => esc_html__( 'Header background colour', 'dfu-busacc' ),
				'name' => 'dbacf_header_bg_colour',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'img',
						),
					),
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'bgcolour',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#FFFFFF',
			),
			array(
				'key' => 'field_5d71e280b9737',
				'label' => esc_html__( 'Header image', 'dfu-busacc' ),
				'name' => 'dbacf_header_img',
				'type' => 'group',
				'instructions' => esc_html__( 'Note: Must use Upload option for categories & tags.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'img',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5d71ca4b48989',
						'label' => esc_html__( 'Background image size', 'dfu-busacc' ),
						'name' => 'dbacf_bg_img_size',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71c9306a1ac',
									'operator' => '==',
									'value' => 'img',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'contain' => esc_html__( 'contain', 'dfu-busacc' ),
							'cover' => esc_html__( 'cover', 'dfu-busacc' ),
						),
						'default_value' => array(
							0 => 'cover',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5d71cab54898a',
						'label' => esc_html__( 'Image from', 'dfu-busacc' ),
						'name' => 'dbacf_img_from',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71c9306a1ac',
									'operator' => '==',
									'value' => 'img',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'featured' => esc_html__( 'Use featured', 'dfu-busacc' ),
							'upload' => esc_html__( 'Upload', 'dfu-busacc' ),
						),
						'default_value' => array(
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5d71caf74898b',
						'label' => esc_html__( 'Upload image', 'dfu-busacc' ),
						'name' => 'dbacf_upload_img',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71c9306a1ac',
									'operator' => '==',
									'value' => 'img',
								),
								array(
									'field' => 'field_5d71cab54898a',
									'operator' => '==',
									'value' => 'upload',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5d71cc484898d',
						'label' => esc_html__( 'Background position', 'dfu-busacc' ),
						'name' => 'dbacf_bg_position',
						'type' => 'select',
						'instructions' => esc_html__(  'Select background image position', 'dfu-busacc' ),
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71c9306a1ac',
									'operator' => '==',
									'value' => 'img',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'left top' => esc_html__( 'left top', 'dfu-busacc' ),
							'left center' => esc_html__( 'left center', 'dfu-busacc' ),
							'left bottom' => esc_html__( 'left bottom', 'dfu-busacc' ),
							'right top' => esc_html__( 'right top', 'dfu-busacc' ),
							'right center' => esc_html__( 'right center', 'dfu-busacc' ),
							'right bottom' => esc_html__( 'right bottom', 'dfu-busacc' ),
							'center top' => esc_html__( 'center top', 'dfu-busacc' ),
							'center center' => esc_html__( 'center center', 'dfu-busacc' ),
							'center bottom' => esc_html__( 'center bottom', 'dfu-busacc' ),
							'x-y' => esc_html__( 'x% y%', 'dfu-busacc' ),
						),
						'default_value' => array(
							0 => 'center center',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5d71cc8c4898e',
						'label' => esc_html__( 'X position (in %)', 'dfu-busacc' ),
						'name' => 'dbacf_x_position',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71cc484898d',
									'operator' => '==',
									'value' => 'x-y',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 50,
						'placeholder' => '',
						'prepend' => '',
						'append' => '%',
						'min' => 0,
						'max' => 100,
						'step' => '',
					),
					array(
						'key' => 'field_5d71ccef4898f',
						'label' => esc_html__( 'Y position (in %)', 'dfu-busacc' ),
						'name' => 'dbacf_y_position',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71cc484898d',
									'operator' => '==',
									'value' => 'x-y',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 50,
						'placeholder' => '',
						'prepend' => '',
						'append' => '%',
						'min' => 0,
						'max' => 100,
						'step' => '',
					),
					array(
						'key' => 'field_5d71ce1b48994',
						'label' => esc_html__( 'Image filter', 'dfu-busacc' ),
						'name' => 'dbacf_img_filter',
						'type' => 'select',
						'instructions' => esc_html__( 'Must enter Image filter percentage below to enable option.', 'dfu-busacc' ),
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71c9306a1ac',
									'operator' => '==',
									'value' => 'img',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'none' => esc_html__( 'none', 'dfu-busacc' ),
							'grayscale' => esc_html__( 'grayscale', 'dfu-busacc' ),
							'opacity' => esc_html__( 'opacity', 'dfu-busacc' ),
							'sepia' => esc_html__( 'sepia', 'dfu-busacc' ),
						),
						'default_value' => array(
							0 => 'none',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5d71ce7172293',
						'label' => esc_html__( 'Image filter percentage (%)', 'dfu-busacc' ),
						'name' => 'dbacf_img_filter_percent',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71c9306a1ac',
									'operator' => '==',
									'value' => 'img',
								),
								array(
									'field' => 'field_5d71ce1b48994',
									'operator' => '!=',
									'value' => 'none',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => 50,
						'placeholder' => '',
						'prepend' => '',
						'append' => '%',
						'min' => 0,
						'max' => 100,
						'step' => '',
					),
					array(
						'key' => 'field_5da94e533bd39',
						'label' => esc_html__( 'Background repeat', 'dfu-busacc' ),
						'name' => 'dbacf_bg_repeat',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71c9306a1ac',
									'operator' => '==',
									'value' => 'img',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'no-repeat' => esc_html__( 'no-repeat', 'dfu-busacc' ),
							'repeat' => esc_html__( 'repeat', 'dfu-busacc' ),
							'repeat-x' => esc_html__( 'repeat-x', 'dfu-busacc' ),
							'repeat-y' => esc_html__( 'repeat-y', 'dfu-busacc' ),
						),
						'default_value' => array(
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
				),
			),
			array(
				'key' => 'field_5da6f8edb29bc',
				'label' => esc_html__( 'Width', 'dfu-busacc' ),
				'name' => 'dbacf_header_width',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'container' => esc_html__( 'Contained', 'dfu-busacc' ),
					'full-width' => esc_html__( 'Full width', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'full-width',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d71cd1448990',
				'label' => esc_html__( 'Height (in px)', 'dfu-busacc' ),
				'name' => 'dbacf_header_height',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'img',
						),
					),
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'bgcolour',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 280,
				'placeholder' => '',
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5d71cd9d48992',
				'label' => esc_html__( 'Small device height (in px)', 'dfu-busacc' ),
				'name' => 'dbacf_header_smldev_height',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'img',
						),
					),
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'bgcolour',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 200,
				'placeholder' => '',
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5d71e79ebfacf',
				'label' => esc_html__( 'Slider', 'dfu-busacc' ),
				'name' => 'dbacf_slider',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'slider',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5d71e7bebfad0',
						'label' => esc_html__( 'Slider Width', 'dfu-busacc' ),
						'name' => 'dbacf_slider_width',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'full' => esc_html__( 'Full width', 'dfu-busacc' ),
							'container' => esc_html__( 'Boxed width', 'dfu-busacc' ),
						),
						'default_value' => array(
							0 => 'full',
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5d71e810bfad1',
						'label' => esc_html__( 'Slider Shortcode', 'dfu-busacc' ),
						'name' => 'dbacf_slider_shortcode',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5dce47701fde1',
				'label' => esc_html__( 'Footer', 'dfu-busacc' ),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5dce473d1fde0',
				'label' => esc_html__( 'Width', 'dfu-busacc' ),
				'name' => 'dbacf_footer_width',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'container' => esc_html__( 'Contained', 'dfu-busacc' ),
					'container-fluid' => esc_html__( 'Full width', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'container',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d81faff83602',
				'label' => esc_html__( 'Title', 'dfu-busacc' ),
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_5d71ceea72295',
				'label' => esc_html__( 'Show title on header', 'dfu-busacc' ),
				'name' => 'dbacf_show_title_on_header',
				'type' => 'true_false',
				'instructions' => esc_html__( 'Recommend to show title either on header or in content, not both.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'img',
						),
					),
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'bgcolour',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d71e1c3b9736',
				'label' => esc_html__( 'Title style on header', 'dfu-busacc' ),
				'name' => 'dbacf_title_style_on_header',
				'type' => 'select',
				'instructions' => esc_html__( 'Select style to use on header', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71ceea72295',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'default' => 'Theme default',
					'none' => 'None',
					'dba-headstyle1' => esc_html__( 'Title Style 1', 'dfu-busacc' ),
					'dba-headstyle2' => esc_html__( 'Title Style 2', 'dfu-busacc' ),
					'dba-headstyle3' => esc_html__( 'Title Style 3', 'dfu-busacc' ),
					'dba-headstyle4' => esc_html__( 'Title Style 4', 'dfu-busacc' ),
					'dba-headstyle5' => esc_html__( 'Title Style 5', 'dfu-busacc' ),
					'dba-headstyle6' => esc_html__( 'Title Style 6', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'default',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d71e54ebfac9',
				'label' => esc_html__( 'Show subtitle on header', 'dfu-busacc' ),
				'name' => 'dbacf_show_subtitle',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'img',
						),
					),
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'bgcolour',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d71e3c0bfac5',
				'label' => esc_html__( 'Header subtitle', 'dfu-busacc' ),
				'name' => 'dbacf_header_subtitle',
				'type' => 'group',
				'instructions' => esc_html__( 'If Excerpt is chosen, subtitle on Category & Tag would be the Description.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71e54ebfac9',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_5d71e57bbfaca',
						'label' => esc_html__( 'Show subtitle from', 'dfu-busacc' ),
						'name' => 'dbacf_show_subtitle_from',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71e54ebfac9',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'excerpt' => esc_html__( 'Excerpt', 'dfu-busacc' ),
							'customfield' => esc_html__( 'Custom Field', 'dfu-busacc' ),
							'customtext' => esc_html__( 'Custom Text', 'dfu-busacc' ),
						),
						'default_value' => array(
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_5d71e627bfacb',
						'label' => esc_html__( 'Subtitle field name', 'dfu-busacc' ),
						'name' => 'dbacf_subtitle_field_name',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71e57bbfaca',
									'operator' => '==',
									'value' => 'customfield',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5d71e65fbfacc',
						'label' => esc_html__( 'Subtitle', 'dfu-busacc' ),
						'name' => 'dbacf_subtitle',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'field_5d71e57bbfaca',
									'operator' => '==',
									'value' => 'customtext',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
				),
			),
			array(
				'key' => 'field_5d71cf7872297',
				'label' => esc_html__( 'Title/subtitle colour on header', 'dfu-busacc' ),
				'name' => 'dbacf_title_colour_on_header',
				'type' => 'color_picker',
				'instructions' => esc_html__( 'Title & subtitle colour', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71ceea72295',
							'operator' => '==',
							'value' => '1',
						),
					),
					array(
						array(
							'field' => 'field_5d71e54ebfac9',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
			),
			array(
				'key' => 'field_5d74a298d2124',
				'label' => esc_html__( 'Center title/subtitle', 'dfu-busacc' ),
				'name' => 'dbacf_center_title',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'img',
						),
					),
					array(
						array(
							'field' => 'field_5d71c9306a1ac',
							'operator' => '==',
							'value' => 'bgcolour',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d749b5942773',
				'label' => esc_html__( 'Title/subtitle horizontal position', 'dfu-busacc' ),
				'name' => 'dbacf_horizontal_pos',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71ceea72295',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
					array(
						array(
							'field' => 'field_5d71e54ebfac9',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'left' => esc_html__( 'left', 'dfu-busacc' ),
					'right' => esc_html__( 'right', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'left',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d71e695bfacd',
				'label' => esc_html__( 'Title/Subtitle horizontal position (in px)', 'dfu-busacc' ),
				'name' => 'dbacf_title_x',
				'type' => 'number',
				'instructions' => esc_html__( 'Horizontal position relative to image.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71ceea72295',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
					array(
						array(
							'field' => 'field_5d71e54ebfac9',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 10,
				'placeholder' => '',
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5d749b9d42774',
				'label' => esc_html__( 'Title/subtitle vertical position', 'dfu-busacc' ),
				'name' => 'dbacf_vertical_pos',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71ceea72295',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
					array(
						array(
							'field' => 'field_5d71e54ebfac9',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'top' => esc_html__( 'top', 'dfu-busacc' ),
					'bottom' => esc_html__( 'bottom', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'top',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d71e710bface',
				'label' => esc_html__( 'Title/Subtitle vertical position (in px)', 'dfu-busacc' ),
				'name' => 'dbacf_title_y',
				'type' => 'number',
				'instructions' => esc_html__( 'Vertical position relative to image.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71ceea72295',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
					array(
						array(
							'field' => 'field_5d71e54ebfac9',
							'operator' => '==',
							'value' => '1',
						),
						array(
							'field' => 'field_5d74a298d2124',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 10,
				'placeholder' => '',
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5d6629579d03c',
				'label' => esc_html__( 'Show title in content', 'dfu-busacc' ),
				'name' => 'dbacf_show_title_in_content',
				'type' => 'true_false',
				'instructions' => esc_html__( 'Recommend to show title either on header or in content, not both.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d71ceea72295',
							'operator' => '!=',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d6636d33e4cc',
				'label' => esc_html__( 'Title style', 'dfu-busacc' ),
				'name' => 'dbacf_title_style',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d6629579d03c',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'default' => esc_html__( 'Theme default', 'dfu-busacc' ),
					'none' => esc_html__( 'None', 'dfu-busacc' ),
					'dba-headstyle1' => esc_html__( 'Title Style 1', 'dfu-busacc' ),
					'dba-headstyle2' => esc_html__( 'Title Style 2', 'dfu-busacc' ),
					'dba-headstyle3' => esc_html__( 'Title Style 3', 'dfu-busacc' ),
					'dba-headstyle4' => esc_html__( 'Title Style 4', 'dfu-busacc' ),
					'dba-headstyle5' => esc_html__( 'Title Style 5', 'dfu-busacc' ),
					'dba-headstyle6' => esc_html__( 'Title Style 6', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'default',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
				array(
					'param' => 'page_type',
					'operator' => '!=',
					'value' => 'posts_page',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'service',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'pricing',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team_member',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'item',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post_types_info',
				),
			),
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'category',
				),
			),
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'post_tag',
				),
			),
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'product_cat',
				),
			),
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'product_tag',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_5dddf18eccb76',
		'title' => esc_html__( 'Schema', 'dfu-busacc' ),
		'fields' => array(
			array(
				'key' => 'field_5dddf19c5bf9f',
				'label' => esc_html__( 'Type', 'dfu-busacc' ),
				'name' => 'dbacf_schema_type',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'AboutPage' => esc_html__( 'About Page', 'dfu-busacc' ),
					'ContactPage' => esc_html__( 'Contact Page', 'dfu-busacc' ),
					'CollectionPage' => esc_html__( 'Collection Page', 'dfu-busacc' ),
					'ImageGallery' => esc_html__( 'Image Gallery', 'dfu-busacc' ),
					'VideoGallery' => esc_html__( 'Video Gallery', 'dfu-busacc' ),
					'FAQPage' => esc_html__( 'FAQ Page', 'dfu-busacc' ),
					'ItemPage' => esc_html__( 'Item Page (Single Item)', 'dfu-busacc' ),
					'MedicalWebPage' => esc_html__( 'Medical Web Page', 'dfu-busacc' ),
					'ProfilePage' => esc_html__( 'Profile Page', 'dfu-busacc' ),
					'RealEstateListing' => esc_html__( 'Real Estate Listing Page', 'dfu-busacc' ),
					'QAPage' => esc_html__( 'Q&A Page', 'dfu-busacc' ),
					'WebPage' => esc_html__( 'Web Page', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'WebPage',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_5d73545205307',
		'title' => esc_html__( 'Post display', 'dfu-busacc' ),
		'fields' => array(
			array(
				'key' => 'field_5d73547357d34',
				'label' => esc_html__( 'Show featured image in single post?', 'dfu-busacc' ),
				'name' => 'dbacf_post_show_img',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d7354a657d35',
				'label' => esc_html__( 'Post date?', 'dfu-busacc' ),
				'name' => 'dbacf_post_show_date',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 1,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d73554857d36',
				'label' => esc_html__( 'Author?', 'dfu-busacc' ),
				'name' => 'dbacf_post_show_author',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d73559c57d39',
				'label' => esc_html__( 'Link to author?', 'dfu-busacc' ),
				'name' => 'dbacf_post_link_author',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d73554857d36',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d73556157d37',
				'label' => esc_html__( 'Categories?', 'dfu-busacc' ),
				'name' => 'dbacf_post_show_category',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
			array(
				'key' => 'field_5d73557657d38',
				'label' => esc_html__( 'Tags?', 'dfu-busacc' ),
				'name' => 'dbacf_post_show_tags',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 0,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 15,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => 'For posts display',
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_5d3c382cc836d',
		'title' => esc_html__( 'Sidebar', 'dfu-busacc' ),
		'fields' => array(
			array(
				'key' => 'field_5d3c383609f20',
				'label' => esc_html__( 'Sidebar to display', 'dfu-busacc' ),
				'name' => 'dbacf_sidebar',
				'type' => 'select',
				'instructions' => esc_html__( 'For WooCommerce Shop page, use theme customiser option instead.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'default' => esc_html__( 'Theme Default', 'dfu-busacc' ),
					'none' => esc_html__( 'None', 'dfu-busacc' ),
					'dba-sidebar-1' => esc_html__( 'Sidebar 1', 'dfu-busacc' ),
					'dba-footerbar-1' => esc_html__( 'Footer Widget 1', 'dfu-busacc' ),
					'dba-footerbar-2' => esc_html__( 'Footer Widget 2', 'dfu-busacc' ),
					'dba-404-sidebar' => esc_html__( '404 Error Sidebar', 'dfu-busacc' ),
					'dba-search-sidebar' => esc_html__( 'Search Sidebar', 'dfu-busacc' ),
					'dba-blog-sidebar' => esc_html__( 'Blog Sidebar', 'dfu-busacc' ),
					'dba-topbar-sidebar-1' => esc_html__( 'Top Bar Widgets 1', 'dfu-busacc' ),
					'dba-topbar-sidebar-2' => esc_html__( 'Top Bar Widgets 2', 'dfu-busacc' ),
					'dba-home-head-sidebar' => esc_html__( 'Homepage Under CTA', 'dfu-busacc' ),
				),
				'default_value' => array(
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d3c38ac09f21',
				'label' => esc_html__( 'Sidebar Position', 'dfu-busacc' ),
				'name' => 'dbacf_sidebar_pos',
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d3c383609f20',
							'operator' => '!=',
							'value' => 'none',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'right' => esc_html__( 'Right', 'dfu-busacc' ),
					'left' => esc_html__( 'Left', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 'right',
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
			array(
				'key' => 'field_5d3c38cd09f22',
				'label' => esc_html__( 'Sidebar width', 'dfu-busacc' ),
				'name' => 'dbacf_sidebar_width',
				'type' => 'select',
				'instructions' => esc_html__( 'Sidebar width is 1/4 if Narrow, 1/3 if Wide, 5/12 if Extra Wide and 1/2 if Half is set.', 'dfu-busacc' ),
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5d3c383609f20',
							'operator' => '!=',
							'value' => 'none',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					2 => esc_html__( 'Extra Narrow (2/12)', 'dfu-busacc' ),
					3 => esc_html__( 'Narrow (3/12)', 'dfu-busacc' ),
					4 => esc_html__( 'Wide (4/12)', 'dfu-busacc' ),
					5 => esc_html__( 'Extra Wide (5/12)', 'dfu-busacc' ),
					6 => esc_html__( 'Half (6/12)', 'dfu-busacc' ),
				),
				'default_value' => array(
					0 => 3,
				),
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
				array(
					'param' => 'page_type',
					'operator' => '!=',
					'value' => 'posts_page',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'service',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post_types_info',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'portfolio',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'pricing',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team',
				),
			),
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'team_member',
				),
			),
		),
		'menu_order' => 110,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'left',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
endif;

/**
 * ACF load sidebars
 * Field Group: Sidebar
********************************************************************************************************************************************/
if ( ! function_exists( 'dfu_busacc_fn_acf_load_sidebars' ) ) {
	function dfu_busacc_fn_acf_load_sidebars( $field ) {
		// reset choices
		$field['choices'] = array();
		$field['choices']['default'] = 'Theme Default';
		$field['choices']['none'] = 'None';
		foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
			$value = $sidebar['id'];
			$label = ucwords( $sidebar['name'] );
			$field['choices'][ $value ] = $label;
		}
		// return the field
		return $field;
	}
}
add_filter( 'acf/load_field/name=dbacf_sidebar', 'dfu_busacc_fn_acf_load_sidebars' );

<?php

/**
 * WooCommerce
 *******************************************************************************************************************************************/

/**
 * Shop & archive pages (Product catalog)
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'separator',
	'settings'		=> 'dba_wc_prod_catalog_sep1',
	'section'		=> 'woocommerce_product_catalog',
	'priority'		=> 10,
	'capability'	=> 'manage_woocommerce',
] );

// Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
// 	'type'          => 'number',
// 	'settings'      => 'dba_wc_max_prod_row',
// 	'label'         => esc_html__( 'Maximum no. of products per row', 'dfu-busacc' ),
// 	'section'       => 'woocommerce_product_catalog',
// 	'priority'	    => 10,
// 	'capability'	=> 'manage_woocommerce',
// 	'default'       => 3,
// 	'choices'       => [
// 		'min'   => 2,
// 		'max'   => 4,
// 		'step'  => 1,
// 	],
// ] );

// Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
// 	'type'          => 'number',
// 	'settings'      => 'dba_wc_max_prod_page',
// 	'label'         => esc_html__( 'Maximum no. of products per page', 'dfu-busacc' ),
// 	'section'       => 'woocommerce_product_catalog',
// 	'priority'	    => 10,
// 	'capability'	=> 'manage_woocommerce',
// 	'default'       => 12,
// 	'choices'       => [
// 		'min'   => 2,
// 		'max'   => 48,
// 		'step'  => 1,
// 	],
// ] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_prod_listing_info',
	'label'         => esc_html__( 'Product listing', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_wc_product_title_font',
	'label'			=> esc_html__( 'Product title style', 'dfu-busacc' ),
	'section'		=> 'woocommerce_product_catalog',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> 'regular',
		'font-size'			=> '1rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '0',
		'color'				=> '#484b4c',
		'text-transform'	=> 'none',
	],
	'priority'	=> 10,
	'transport'	=> 'auto',
	'output'      => [
		[
			'element' => array( 'h2.woocommerce-loop-product__title',  'a.wc-block-components-product-name:not(.has-text-color)', '.wc-block-grid__product-title' ),
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_qty_simple',
	'label'       	=> esc_html__( 'Add quantity input field?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Quantity input field is show next to add to cart button for simple products within your shop archive pages', 'dfu-busacc' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> 'false',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_add_hover_img',
	'label'       	=> esc_html__( 'Show hover on image on product listings?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Show additional image from first image in product image gallery on product hover in product listings', 'dfu-busacc' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> 'false',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_prod_view',
	'label'		    => esc_html__( 'Product view display', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'original',
	'choices' => array(
		'original'	=> esc_html__( 'WooCommerce original', 'dfu-busacc'),
		'grid' 		=> esc_html__( 'Grid view', 'dfu-busacc' ),
		'list' 		=> esc_html__( 'List view', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_prod_catalog_b4_aft_info',
	'label'         => esc_html__( 'Before & after product listing', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Set up what is displayed in WC Top and Bottom bars in Shop. More can be added in Widgets - WooCommerce before shop (WC top bar) or WooCommerce after shop (WC bottom bar).', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_shop_show_search',
	'label'		    => esc_html__( 'Show product search?', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'top',
	'choices' => array(
		'none' 		=> esc_html__( 'Do not show', 'dfu-busacc' ),
		'top' 		=> esc_html__( 'Before shop listing', 'dfu-busacc' ),
		'btm' 		=> esc_html__( 'After shop listing', 'dfu-busacc' ),
		'both' 		=> esc_html__( 'Both before and after shop listing', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_shop_show_sort',
	'label'		    => esc_html__( 'Show sorting dropdown?', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'top',
	'choices' => array(
		'none' 		=> esc_html__( 'Do not show', 'dfu-busacc' ),
		'top' 		=> esc_html__( 'Before shop listing', 'dfu-busacc' ),
		'btm' 		=> esc_html__( 'After shop listing', 'dfu-busacc' ),
		'both' 		=> esc_html__( 'Both before and after shop listing', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_shop_show_count',
	'label'		    => esc_html__( 'Show result count?', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'btm',
	'choices' => array(
		'none' 		=> esc_html__( 'Do not show', 'dfu-busacc' ),
		'top' 		=> esc_html__( 'Before shop listing', 'dfu-busacc' ),
		'btm' 		=> esc_html__( 'After shop listing', 'dfu-busacc' ),
		'both' 		=> esc_html__( 'Both before and after shop listing', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_shop_show_page',
	'label'		    => esc_html__( 'Show pagination?', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'top',
	'choices' => array(
		'none' 		=> esc_html__( 'Do not show', 'dfu-busacc' ),
		'top' 		=> esc_html__( 'Before shop listing', 'dfu-busacc' ),
		'btm' 		=> esc_html__( 'After shop listing', 'dfu-busacc' ),
		'both' 		=> esc_html__( 'Both before and after shop listing', 'dfu-busacc' ),
	),
] );


// WC Shop widgets
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_wc_show_widgets_sect_head',
    'label'         => esc_html__( 'Shop widgets', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Widgets are displayed under WC Top bar in Shop.', 'dfu-busacc' ),
	'section'	    => 'woocommerce_product_catalog',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_show_widget_b4_prod_catalog',
	'label'       	=> esc_html__( 'Show widget before product listing?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Show widget below the WC Top bar', 'dfu-busacc' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> 'false',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_show_collapsible_button',
	'label'       	=> esc_html__( 'Show collapsible button for widget before shop?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Hide/show widget below the WC Top bar', 'dfu-busacc' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> 'false',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_show_widget_b4_prod_catalog',
			'operator'  => '==',
			'value'     => true,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     		=> 'text',
	'settings' 		=> 'dba_wc_collapsible_btn_text',
	'label'    		=> esc_html__( 'Collapsible button text', 'dfu-busacc' ),
	'section'  		=> 'woocommerce_product_catalog',
	'priority' 		=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'  		=> esc_html__( 'Filters', 'dfu-busacc' ),
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_show_collapsible_button',
			'operator'  => '==',
			'value'     => true,
		],
		[
            'setting'   => 'dba_wc_show_widget_b4_prod_catalog',
            'operator'  => '==',
            'value'     => true,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_show_button_tooltip',
	'label'       	=> esc_html__( 'Show tooltip for collapsible button?', 'dfu-busacc' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> 'false',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_show_collapsible_button',
			'operator'  => '==',
			'value'     => true,
		],
		[
            'setting'   => 'dba_wc_show_widget_b4_prod_catalog',
            'operator'  => '==',
            'value'     => true,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     		=> 'text',
	'settings' 		=> 'dba_wc_collapsible_btn_tooltip',
	'label'    		=> esc_html__( 'Collapsible button tooltip', 'dfu-busacc' ),
	'section'  		=> 'woocommerce_product_catalog',
	'priority' 		=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'  		=> esc_html__( 'Expand/collapse Filters', 'dfu-busacc' ),
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_show_button_tooltip',
			'operator'  => '==',
			'value'     => true,
		],
		[
			'setting'   => 'dba_wc_show_collapsible_button',
			'operator'  => '==',
			'value'     => true,
		],
		[
            'setting'   => 'dba_wc_show_widget_b4_prod_catalog',
            'operator'  => '==',
            'value'     => true,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_show_widget_on_open',
	'label'       	=> esc_html__( 'Show widget on page open?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Show widget below the WC Top bar on page open. Note: Must be on if widget is used and collapsible button is not used', 'dfu-busacc' ),
	'section'     	=> 'woocommerce_product_catalog',
	'default'     	=> 'false',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_show_widget_b4_prod_catalog',
			'operator'  => '==',
			'value'     => true,
		]
	],
] );

/**
 * Single products
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_wc_sglprod', array(
	'title'			    => esc_html__( 'Single Product', 'dfu-busacc' ),
	'panel'   			=> 'woocommerce',
	'priority'		    => 5,
	'active_callback'   => function() { return true === class_exists( 'woocommerce' ); },
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_prodinfo_head',
	'label'         => esc_html__( 'Product information', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_sglprod_img_width',
	'label'		    => esc_html__( 'Product image width', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => '6',
	'choices'       => array(
		'4'		=> esc_html__( 'Extra narrow (4/12)', 'dfu-busacc' ),
		'5'		=> esc_html__( 'Narrow (5/12)', 'dfu-busacc' ),
		'6'		=> esc_html__( 'Half (6/12)', 'dfu-busacc' ),
		'7'		=> esc_html__( 'Wide (7/12)', 'dfu-busacc' ),
		'8'		=> esc_html__( 'Extra wide (8/12)', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_thumbnail_row',
	'label'         => esc_html__( 'No. of thumbnail per row on single product', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 4,
	'choices'       => [
		'min'   => 3,
		'max'   => 5,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_wc_stickysummary_sep',
	'section'	=> 'sect_dba_wc_sglprod',
	'priority'	=> 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_wc_sglprod_sticky_summary',
	'label'       => esc_html__( 'Sticky product summary?', 'dfu-busacc' ),
	'section'     => 'sect_dba_wc_sglprod',
	'default'     => 'false',
	'priority'    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'number',
	'settings'	    => 'dba_wc_sglprod_stickysum_from_wth',
	'label'		    => esc_html__( 'Sticky summary from width (in px)', 'dfu-busacc' ),
	'description'   => esc_html__( 'Set width to display sticky summary. Sticky summary would be displayed on width greater than or equal to value set below (Note: value must be between 768 and 1440).', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'	    => 992,
	'choices'       => [
		'min'   => 768,
		'max'   => 1440,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_sticky_summary',
			'operator'  => '!==',
			'value'     => false,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'			=> 'color',
	'settings'		=> 'dba_wc_sglprod_stickysum_bgcolor',
	'label'			=> esc_attr__( 'Sticky product summary background colour', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_sglprod',
	'default'		=> '',
	'priority'		=> 10,
	'capability'	=> 'manage_woocommerce',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_sticky_summary',
			'operator'  => '!==',
			'value'     => false,
		]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_stickysum_bgopacity',
	'label'         => esc_html__( 'Sticky product summary background opacity', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'		=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 1,
	'choices'       => [
		'min'   => 0,
		'max'   => 1,
		'step'  => 0.05,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_sticky_summary',
			'operator'  => '!==',
			'value'     => false,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_sglprod_stickysum_xpos',
	'label'		    => esc_html__( 'Horizontal position', 'dfu-busacc' ),
	'description'   => esc_html__( 'Sticky product summary horizontal position', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'right',
	'choices'       => array(
		'right'			=> esc_html__( 'Right', 'dfu-busacc' ),
		'original'		=> esc_html__( 'Original', 'dfu-busacc' ),
		'left'			=> esc_html__( 'Left', 'dfu-busacc' ),
	),
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_sticky_summary',
			'operator'  => '!==',
			'value'     => false,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_stickysum_ypos',
	'label'         => esc_html__( 'Position from top', 'dfu-busacc' ),
	'description'   => esc_html__( 'Sticky product summary position from top (in px)', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => '100',
	'choices'       => [
		'min'   => 0,
		'max'   => 1000,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_sticky_summary',
			'operator'  => '!==',
			'value'     => false,
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_wc_sglprod_stickysum_fixwidth',
	'label'       => esc_html__( 'Fixed width?', 'dfu-busacc' ),
	'description' => esc_html__( 'You can specify a fixed width for sticky product summary', 'dfu-busacc' ),
	'section'     => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'     => 'false',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_sticky_summary',
			'operator'  => '!==',
			'value'     => false,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_stickysum_width',
	'label'         => esc_html__( 'Sticky product summary width (in px)', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => '270',
	'choices'       => [
		'min'   => 150,
		'max'   => 550,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_sticky_summary',
			'operator'  => '!==',
			'value'     => false,
		],
		[
			'setting'   => 'dba_wc_sglprod_stickysum_fixwidth',
			'operator'  => '!==',
			'value'     => false,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_wc_sglprod_det_sep',
	'section'	=> 'sect_dba_wc_sglprod',
	'priority'	=> 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_sglprod_det_style',
	'label'		    => esc_html__( 'Product details style', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'accordion',
	'choices'       => array(
		'original'		=> esc_html__( 'Tab style (original)', 'dfu-busacc' ),
		'tabs'			=> esc_html__( 'Tabs', 'dfu-busacc' ),
		'pills'			=> esc_html__( 'Pills', 'dfu-busacc' ),
		'accordion'		=> esc_html__( 'Accordion', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_sglprod_det_tabs_pills',
	'label'		    => esc_html__( 'Product details responsiveness', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'md',
	'choices'       => array(
		'sm'		=> esc_html__( '>= 576px (sm)', 'dfu-busacc' ),
		'md'		=> esc_html__( '>= 768px (md)', 'dfu-busacc' ),
		'lg'		=> esc_html__( '>= 992px (lg)', 'dfu-busacc' ),
		'xl'		=> esc_html__( '>= 1200 (xl)', 'dfu-busacc' ),
	),
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_det_style',
			'operator'  => '!==',
			'value'     => 'accordion',
		],
		[
			'setting'   => 'dba_wc_sglprod_det_style',
			'operator'  => '!==',
			'value'     => 'original',
		],
	]
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_relatedprod_head',
	'label'         => esc_html__( 'Related products', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_sglprod_relatedprod',
	'label'       	=> esc_html__( 'Show related products?', 'dfu-busacc' ),
	'section'     	=> 'sect_dba_wc_sglprod',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'     	=> 'true',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_relprod_max_prod_row',
	'label'         => esc_html__( 'Maximum no. of related products per row', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 3,
	'choices'       => [
		'min'   => 1,
		'max'   => 6,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_relatedprod',
			'operator'  => '==',
			'value'     => true,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_relprod_page',
	'label'         => esc_html__( 'Maximum no. of related products per page', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 3,
	'choices'       => [
		'min'   => 1,
		'max'   => 18,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sglprod_relatedprod',
			'operator'  => '==',
			'value'     => true,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_upsprod_head',
	'label'         => esc_html__( 'Upsell products', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_upsprod_max_prod_row',
	'label'         => esc_html__( 'Maximum no. of upsell products per row', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 3,
	'choices'       => [
		'min'   => 1,
		'max'   => 6,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sglprod_upsprod_page',
	'label'         => esc_html__( 'Maximum no. of upsell products per page', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_sglprod',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 3,
	'choices'       => [
		'min'   => 1,
		'max'   => 18,
		'step'  => 1,
	],
] );

/**
 * Cart
 ********************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_wc_cart_page', array(
	'title'			    => esc_html__( 'Shopping Cart', 'dfu-busacc' ),
	'panel'   			=> 'woocommerce',
	'priority'		    => 5,
	'active_callback'   => function() { return true === class_exists( 'woocommerce' ); },
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_crosssell_head',
	'label'         => esc_html__( 'Cross Sell products', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_cart_xsell_pos',
	'label'		    => esc_html__( 'Cross sell display position', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => '',
	'choices' => array(
		'default'       => __( 'Left of cart totals (WooCommerce default)', 'dfu-busacc' ),
		'undercarttbl'  => __( 'Under the cart table', 'dfu-busacc' ),
		'aftercart'     => __( 'After the cart', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_cart_xsellprod_max_prod_row',
	'label'         => esc_html__( 'Maximum no. of cross sell products per row', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 3,
	'choices'       => [
		'min'   => 1,
		'max'   => 6,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_cart_xsell_pos',
			'operator'  => '!==',
			'value'     => 'default',
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_cart_xsellprod_page',
	'label'         => esc_html__( 'Maximum no. of cross sell products per page', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 3,
	'choices'       => [
		'min'   => 1,
		'max'   => 18,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_cart_menu_head',
	'label'         => esc_html__( 'Cart on menu', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'info',
	'settings'	    => 'dba_wc_cart_menu_info',
	'label'         => esc_html__( 'Cart on menu', 'dfu-busacc' ),
	'description'   => esc_html__( 'Display menu item with no. of cart items and total. If Max Mega Menu is used, also display minicart under menu item.', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_cart_on_menu',
	'label'       	=> esc_html__( 'Cart on menu?', 'dfu-busacc' ),
	'section'     	=> 'sect_dba_wc_cart_page',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'     	=> 'false',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_sticky_cart_icon_head',
	'label'         => esc_html__( 'Sticky cart', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'info',
	'settings'	    => 'dba_wc_cart_icon_info',
	'label'         => esc_html__( 'Cart icon', 'dfu-busacc' ),
	'description'   => esc_html__( 'Sticky cart icon at screen bottom.', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_cart_page',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_cart_icon_btm_mob_only',
	'label'       	=> esc_html__( 'Cart icon on mobile only?', 'dfu-busacc' ),
	'section'     	=> 'sect_dba_wc_cart_page',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'     	=> 'false',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_cart_icon_btm',
	'label'       	=> esc_html__( 'Cart icon?', 'dfu-busacc' ),
	'section'     	=> 'sect_dba_wc_cart_page',
	'default'     	=> 'true',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_cart_icon_btm_mob_only',
			'operator'  => '==',
			'value'     => false,
		]
	],
] );

/**
 * Miscellaneous
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_wc_misc', array(
	'title'			    => esc_html__( 'Miscellaneous', 'dfu-busacc' ),
	'description'	    => esc_html__( 'Miscellaneous WooCommerce settings for the theme', 'dfu-busacc' ),
	'panel'   			=> 'woocommerce',
	'priority'		    => 5,
	'active_callback'   => function() { return true === class_exists( 'woocommerce' ); },
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'multicolor',
	'settings'	=> 'dba_wc_misc_colors',
	'label'		=> esc_html__( 'WooCommerce colours', 'dfu-busacc' ),
	'section'	=> 'sect_dba_wc_misc',
	'priority'	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'	=> [
		'ptxt'			=> '#0088cc',
		'msg'			=> '#0f834d',
		'info'			=> '#1e73be',
		'error'			=> '#e2401c',
	],
	'choices'	=> [
		'ptxt'		=> esc_html__( 'Price colour', 'dfu-busacc' ),
		'msg'		=> esc_html__( 'Message colour', 'dfu-busacc' ),
		'info'		=> esc_html__( 'Info colour', 'dfu-busacc' ),
		'error'		=> esc_html__( 'Error colour', 'dfu-busacc' ),
	],
] );

/**
 * Breadcrumb
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_breadcrumb_head',
	'label'         => esc_html__( 'Breadcrumb', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_breadcrumb',
	'label'       	=> esc_html__( 'Show WooCommerce breadcrumbs?', 'dfu-busacc' ),
	'section'     	=> 'sect_dba_wc_misc',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'     	=> 'false',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'select',
	'settings'		=> 'dba_wc_breadcrumb_sep',
	'label'			=> esc_html__( 'Breadcrumb separator', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_misc',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	=> 1,
	'default'	=> '',
	'choices' => array(
		's1'		=> '&rarr;',
		's2'		=> '&rArr;',
		's3'		=> '&#10511;',
		's4'		=> '&#8680;',
		's5'		=> '&#8702;',
		's6'		=> '&raquo;',
		's7'		=> '&#10139;',
		's8'		=> '&#10144;',
		's9'		=> '&#129178;',
		's10'		=> '&#129082;',
	),
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_breadcrumb',
			'operator'  => '==',
			'value'     => true,
		]
	],
] );

/**
 * Sale tag
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_sale_tag_head',
	'label'         => esc_html__( 'Sale tag', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'select',
	'settings'	    => 'dba_wc_sale_tag_style',
	'label'		    => esc_html__( 'Sale tag style', 'dfu-busacc' ),
	'description'   => esc_html__( 'Note: Not all styles work well on WooCommerce blocks especially if sale tag is placed in center position on product image. Sale tag may also look different when not placed on top of product image.', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'	    => 1,
	'default'	    => 'original',
	'choices' => array(
		'onsale' 		=> esc_html__( 'Original', 'dfu-busacc' ),
		'sale-tag1' 	=> esc_html__( 'Type 1', 'dfu-busacc' ),
		'sale-tag2' 	=> esc_html__( 'Type 2', 'dfu-busacc' ),
		'sale-tag3' 	=> esc_html__( 'Type 3', 'dfu-busacc' ),
		'sale-tag4' 	=> esc_html__( 'Type 4', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     		=> 'text',
	'settings' 		=> 'dba_wc_sale_tag_text',
	'label'    		=> esc_html__( 'Sale tag text', 'dfu-busacc' ),
	'description'   => esc_html__( 'Note: This does not work on WooCommerce blocks with sales tag', 'dfu-busacc' ),
	'section'  		=> 'sect_dba_wc_misc',
	'priority' 		=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'  		=> esc_html__( 'Sale', 'dfu-busacc' ),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sale_border',
	'label'         => esc_html__( 'Sale tag border (in px)', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_misc',
	'priority' 		=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 0,
	'choices'       => [
		'min'   => 0,
		'max'   => 10,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sale_tag_style',
			'operator'  => '==',
			'value'     => 'onsale',
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'          => 'number',
	'settings'      => 'dba_wc_sale_border_radius',
	'label'         => esc_html__( 'Sale tag border radius (in %)', 'dfu-busacc' ),
	'section'       => 'sect_dba_wc_misc',
	'priority' 		=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'       => 50,
	'choices'       => [
		'min'   => 0,
		'max'   => 100,
		'step'  => 1,
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sale_tag_style',
			'operator'  => '==',
			'value'     => 'onsale',
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'			=> 'color',
	'settings'		=> 'dba_wc_sale_border_color',
	'label'			=> esc_attr__( 'Sale tag border colour', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_misc',
	'priority' 		=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'		=> '',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sale_tag_style',
			'operator'  => 'in',
			'value'     => array( 'onsale', 'sale-tag4'),
		]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_wc_sale_tag_gradient',
	'label'       	=> esc_html__( 'Background gradient?', 'dfu-busacc' ),
	'section'     	=> 'sect_dba_wc_misc',
	'priority'    	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'     	=> 'true',
	'active_callback'   => [
		[
			'setting'   => 'dba_wc_sale_tag_style',
			'operator'  => '==',
			'value'     => 'onsale',
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'multicolor',
	'settings'	=> 'dba_wc_sale_color',
	'label'		=> esc_html__( 'Sale tag colours', 'dfu-busacc' ),
	'section'	=> 'sect_dba_wc_misc',
	'priority'	=> 10,
	'capability'	=> 'manage_woocommerce',
	'default'	=> [
		'text'			=> '#f0f1f2',
		'bg'			=> '#0088cc',
	],
	'choices'	=> [
		'text'		=> esc_html__( 'Text colour', 'dfu-busacc' ),
		'bg'		=> esc_html__( 'Background colour', 'dfu-busacc' ),
	],
] );

/**
 * Sidebars
 ********************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
	'settings'	    => 'dba_wc_sidebar_head',
	'label'         => esc_html__( 'Sidebars', 'dfu-busacc' ),
	'description'   => esc_html__( 'Options on sidebars for WooCommerce pages', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

$dfu_busacc_arg1 = array(
	'setting'		=> 'dba_wc_product_sidebar',
	'label'			=> esc_html__( 'Sidebar for single product page', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'		=> '',
);
add_action( 'init', function() use ( $dfu_busacc_arg1 ) { dfu_busacc_fn_customiser_init_load_sidebars( $dfu_busacc_arg1 ); }, 9 );

$dfu_busacc_arg2 = array(
	'setting'		=> 'dba_wc_shop_sidebar',
	'label'			=> esc_html__( 'Sidebar for shop page', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'		=> '',
);
add_action( 'init', function() use ( $dfu_busacc_arg2 ) { dfu_busacc_fn_customiser_init_load_sidebars( $dfu_busacc_arg2 ); }, 9 );

$dfu_busacc_arg3 = array(
	'setting'		=> 'dba_wc_prodcat_sidebar',
	'label'			=> esc_html__( 'Sidebar for product category page', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
	'default'		=> '',
);
add_action( 'init', function() use ( $dfu_busacc_arg3 ) { dfu_busacc_fn_customiser_init_load_sidebars( $dfu_busacc_arg3 ); }, 9 );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'select',
	'settings'		=> 'dba_wc_sidebar_pos',
	'label'			=> esc_html__( 'Sidebar position', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_misc',
	'priority'		=> 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'		=> 1,
	'default'		=> '',
	'choices'		=> array(
		'right'         => esc_html__( 'Right', 'dfu-busacc' ),
		'left'          => esc_html__( 'Left', 'dfu-busacc' ),
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'select',
	'settings'		=> 'dba_wc_sidebar_width',
	'label'			=> esc_html__( 'Sidebar width', 'dfu-busacc' ),
	'section'		=> 'sect_dba_wc_misc',
	'priority'		=> 10,
	'capability'	=> 'manage_woocommerce',
	'multiple'		=> 1,
	'default'		=> '',
	'choices'	=> [
		'2'			=> esc_html__( 'Extra narrow (2/12)', 'dfu-busacc' ),
		'3'			=> esc_html__( 'Narrow (3/12)', 'dfu-busacc' ),
		'4'			=> esc_html__( 'Wide (4/12)', 'dfu-busacc' ),
		'5'			=> esc_html__( 'Extra wide (5/12)', 'dfu-busacc' ),
		'6'			=> esc_html__( 'Half (6/12)', 'dfu-busacc' ),
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'info',
	'settings'	    => 'dba_wc_sidebar_info1',
	'label'         => esc_html__( 'Need additional sidebar?', 'dfu-busacc' ),
	'description'   => esc_html__( 'You may add additional sidebar(s) in Layout under Theme Setup and Options.', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'info',
	'settings'	    => 'dba_wc_sidebar_info2',
	'label'         => esc_html__( 'Sidebar for other Woocommerce pages', 'dfu-busacc' ),
	'description'   => esc_html__( 'Sidebar for WooCommerce cart, checkout and account pages can be set when editing the page.', 'dfu-busacc' ),
	'section'	    => 'sect_dba_wc_misc',
	'priority'	    => 10,
	'capability'	=> 'manage_woocommerce',
] );

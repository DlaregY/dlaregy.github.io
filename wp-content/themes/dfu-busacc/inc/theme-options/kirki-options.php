<?php

Dfu_busacc_Kirki::add_config( 'config_dfubusacc', array(
	'capability'	=> 'edit_theme_options',
	'option_type'	=> 'theme_mod',
) );

/**
 * Panels
 *******************************************************************************************************************************************/
 // Main theme panel with multiple sections 'panel_dba_options' added in customiser.php

/**
 * Initialisation and theme info
 *******************************************************************************************************************************************/
// Section 'sect_dba_info' added in customiser.php
// Fields are added in customiser.php

/**
 * Defaults setup
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_defaults', array(
    'title'			=> esc_html__( 'Theme defaults', 'dfu-busacc' ),
    'panel'			=> 'panel_dba_options',
    'priority'		=> 10,
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_theme_setup_head3',
    'label'         => esc_html__( 'Defaults', 'dfu-busacc' ),
	'section'	    => 'sect_dba_defaults',
	'priority'	    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
    'type'			=> 'multicolor',
    'settings'		=> 'dba_default_title_color',
    'label'			=> esc_html__( 'Title styles colours', 'dfu-busacc' ),
    'section'		=> 'sect_dba_defaults',
    'priority'		=> 10,
    'choices'		=> [
        'highlight'		=> esc_html__( 'Highlight', 'dfu-busacc' ),
		'bg'			=> esc_html__( 'Background', 'dfu-busacc' ),
		'border'		=> esc_html__( 'Border', 'dfu-busacc' ),
		'hborder'		=> esc_html__( 'Hover border', 'dfu-busacc' ),
    ],
    'default'		=> [
        'highlight'	=> '#0088cc',
		'bg'		=> 'rgba(255,255,255,0)',
		'border'	=> 'rgba(255,255,255,0)',
		'hborder'	=> 'rgba(255,255,255,0)',
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_title_style',
	'label'		=> esc_html__( 'Default title (h1)', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> 'dba-headstyle1',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> array(
		'none'              => esc_html__( 'None', 'dfu-busacc' ),
		'dba-headstyle1'	=> esc_html__( 'Title Style 1 - full width solid cut cornered bottom border', 'dfu-busacc' ),
		'dba-headstyle2'	=> esc_html__( 'Title Style 2 - full width dotted bottom border', 'dfu-busacc' ),
		'dba-headstyle3'	=> esc_html__( 'Title Style 3 - full width solid bottom border', 'dfu-busacc' ),
		'dba-headstyle4'	=> esc_html__( 'Title Style 4 - full width dashed bottom border', 'dfu-busacc' ),
		'dba-headstyle5'	=> esc_html__( 'Title Style 5 - dashed bottom border', 'dfu-busacc' ),
		'dba-headstyle6'	=> esc_html__( 'Title Style 6 - full width centered double line on side', 'dfu-busacc' ),
    ),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'info',
	'settings'	    => 'dba_title_style_info',
	'label'         => esc_html__( 'Title Styles', 'dfu-busacc' ),
	'description'   => esc_html__( 'No need to set decoration shape(s) and bottom border width if not using the specific Title Style(s)', 'dfu-busacc' ),
	'section'	    => 'sect_dba_defaults',
	'priority'	    => 20,
] );

$dfu_busacc_arrvalue = array(
	''			=> 'None',
	'\25CF'		=> '&#9679; - Dot',
	'\25FC'		=> '&#9724; - Square',
	'\2691'		=> '&#9873; - Flag',
	'\2724'		=> '&#10020; - Heavy four balloon-spoked asterisk',
	'\273D'		=> '&#10045; - Heavy teardrop-spoked asterisk',
	'\274B'		=> '&#10059; - Heavy eight teardrop-spoked propeller asterisk',
	'\2744'		=> '&#10052; - Snowflake',
	'\00BB'		=> '&raquo; - Double right pointing angle quotation mark',
	'\2AD8'		=> '&#10968; - Link',
);

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_title_style1',
	'label'		=> esc_html__( 'Decoration shape after Title Style 1', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> '\25FC',
	'priority'	=> 20,
	'multiple'	=> 1,
	'choices' => $dfu_busacc_arrvalue,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_title_style2',
	'label'		=> esc_html__( 'Decoration shape after Title Style 2', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> '\25CF',
	'priority'	=> 20,
	'multiple'	=> 1,
	'choices' => $dfu_busacc_arrvalue,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_title_style3',
	'label'		=> esc_html__( 'Decoration shape after Title Style 3', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> '\2724',
	'priority'	=> 20,
	'multiple'	=> 1,
	'choices' => $dfu_busacc_arrvalue,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_title_style4',
	'label'		=> esc_html__( 'Decoration shape after Title Style 4', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> '\273D',
	'priority'	=> 20,
	'multiple'	=> 1,
	'choices' => $dfu_busacc_arrvalue,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_title_style5',
	'label'		=> esc_html__( 'Decoration shape after Title Style 5', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> '\2744',
	'priority'	=> 20,
	'multiple'	=> 1,
	'choices' => $dfu_busacc_arrvalue,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_hover_title_style',
	'label'		=> esc_html__( 'Decoration shape on hover for Title styles', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> '\27A6',
	'priority'	=> 20,
	'multiple'	=> 1,
	'choices' => array(
		''			=> 'None',
		'\2197'		=> '&#8599; - North east arrow',
		'\261B'		=> '&#9755; - Right pointing index',
		'\279A'		=> '&#10138; - North east arrow',
		'\27A6'		=> '&#10150; - Curved up and right arrow',
		'\27B9'		=> '&#10169; - Feathered north east arrow',
		'\27A4'		=> '&#10148; - Right arrowhead',
	),
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_default_title_style1_border',
	'label'     => esc_html__( 'Title Style 1 bottom border (in px)', 'dfu-busacc' ),
	'section'   => 'sect_dba_defaults',
	'default'   => 5,
	'priority'	=> 20,
	'choices'   => [
		'min'   => 0,
		'max'   => 10,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_default_title_style2_border',
	'label'     => esc_html__( 'Title Style 2 bottom border (in px)', 'dfu-busacc' ),
	'section'   => 'sect_dba_defaults',
	'default'   => 2,
	'priority'	=> 20,
	'choices'   => [
		'min'   => 0,
		'max'   => 10,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_default_title_style3_border',
	'label'     => esc_html__( 'Title Style 3 bottom border (in px)', 'dfu-busacc' ),
	'section'   => 'sect_dba_defaults',
	'default'   => 3,
	'priority'	=> 20,
	'choices'   => [
		'min'   => 0,
		'max'   => 10,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_default_title_style4_border',
	'label'     => esc_html__( 'Title Style 4 bottom border (in px)', 'dfu-busacc' ),
	'section'   => 'sect_dba_defaults',
	'default'   => 4,
	'priority'	=> 20,
	'choices'   => [
		'min'   => 0,
		'max'   => 10,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_default_title_style5_border',
	'label'     => esc_html__( 'Title Style 5 bottom border (in px)', 'dfu-busacc' ),
	'section'   => 'sect_dba_defaults',
	'default'   => 5,
	'priority'	=> 20,
	'choices'   => [
		'min'   => 0,
		'max'   => 10,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_default_title_style6_border',
	'label'     => esc_html__( 'Title Style 6 bottom border (in px)', 'dfu-busacc' ),
	'section'   => 'sect_dba_defaults',
	'default'   => 5,
	'priority'	=> 20,
	'choices'   => [
		'min'   => 0,
		'max'   => 10,
		'step'  => 1,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_default_sep1',
	'section'	=> 'sect_dba_defaults',
	'priority'	=> 20,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_header_width',
	'label'		=> esc_html__( 'Default header width', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> 'container',
	'priority'	=> 30,
	'multiple'	=> 1,
	'choices'	=> [
		'container'		=> esc_html__( 'Contained', 'dfu-busacc' ),
		'container-fluid'	=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_footer_width',
	'label'		=> esc_html__( 'Default footer width', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> 'container',
	'priority'	=> 30,
	'multiple'	=> 1,
	'choices'	=> [
		'container'		=> esc_html__( 'Contained', 'dfu-busacc' ),
		'container-fluid'	=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_sidebar_pos',
	'label'		=> esc_html__( 'Default sidebar position', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> 'right',
	'priority'	=> 30,
	'multiple'	=> 1,
	'choices'	=> [
		'right'			=> esc_html__( 'Right', 'dfu-busacc' ),
		'left'			=> esc_html__( 'Left', 'dfu-busacc' ),
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_default_sidebar_width',
	'label'		=> esc_html__( 'Default sidebar width', 'dfu-busacc' ),
	'section'	=> 'sect_dba_defaults',
	'default'	=> '3',
	'priority'	=> 30,
	'multiple'	=> 1,
	'choices'	=> [
		'2'			=> esc_html__( 'Extra narrow (2/12)', 'dfu-busacc' ),
		'3'			=> esc_html__( 'Narrow (3/12)', 'dfu-busacc' ),
		'4'			=> esc_html__( 'Wide (4/12)', 'dfu-busacc' ),
		'5'			=> esc_html__( 'Extra wide (5/12)', 'dfu-busacc' ),
		'6'			=> esc_html__( 'Half (6/12)', 'dfu-busacc' ),
	],
] );

$dfu_busacc_args = array(
    'setting'		=> 'dba_default_sidebar',
	'label'			=> 'Default sidebar',
	'section'		=> 'sect_dba_defaults',
	'default'		=> 'dba-sidebar-1',
);
add_action( 'init', function() use ( $dfu_busacc_args ) { dfu_busacc_fn_customiser_init_load_sidebars( $dfu_busacc_args ); }, 9 );

/**
 * Load sidebar for customiser
********************************************************************************************************************************************/
function dfu_busacc_fn_customiser_init_load_sidebars( $arg ) {
	// reset choices
	$sbar = array();
	$sbar['none'] = 'None';
	if ( isset( $GLOBALS['wp_registered_sidebars'] ) ) {
		$regsidebars = $GLOBALS['wp_registered_sidebars'];
	}
	if ( $regsidebars ) {
		foreach ( $regsidebars as $regsidebar ) {
			if ( strpos( $regsidebar['id'], 'dba-' ) !== false ) {
				$sbar[ $regsidebar['id'] ] = $regsidebar['name'];
			}
		}
	}
	if ( ! class_exists( 'Kirki' ) ) {
		return;
	}
	$lbl = sprintf( esc_attr( '%1$s', 'dfu-busacc' ), $arg['label'] );
	Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
		'type'		=> 'select',
		'settings'	=> $arg['setting'],
		'label'		=> $lbl,
		'section'	=> $arg['section'],
		'default'	=> $arg['default'],
		'priority'	=> 30,
		'multiple'	=> 1,
		'choices'	=> $sbar,
	] );
}

/**
 * Layout
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_layout', array(
    'title'			=> esc_html__( 'Layout', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Theme layout options including top bar, menu, header, sidebars and footer', 'dfu-busacc' ),
    'panel'			=> 'panel_dba_options',
    'priority'		=> 10,
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_layout_head1',
    'label'         => esc_html__( 'Header', 'dfu-busacc' ),
	'section'	    => 'sect_dba_layout',
	'priority'	    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_topbar',
	'label'       => esc_html__( 'Show top bar?', 'dfu-busacc' ),
	'description' => esc_html__( 'If on, top bar would be display above mobile breakpoint only.', 'dfu-busacc' ),
	'section'     => 'sect_dba_layout',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_topbar_width',
	'label'		=> esc_html__( 'Top bar width', 'dfu-busacc' ),
	'section'	=> 'sect_dba_layout',
	'default'	=> 'container',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'container'		=> esc_html__( 'Contained', 'dfu-busacc' ),
		'container-fluid'	=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_topbar',
			'operator'  => '==',
			'value'     => true,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_layout_sep1',
	'section'	=> 'sect_dba_layout',
	'priority'	=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'radio-image',
	'settings'	=> 'dba_header_layout',
	'label'		=> esc_html__( 'Header layout', 'dfu-busacc' ),
	'description' => esc_html__( 'The last type is best if you are replacing your menu which can handle company logo like Mega Menu Pro', 'dfu-busacc' ),
	'section'	=> 'sect_dba_layout',
	'default'	=> '1',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'1'			=> get_template_directory_uri() . '/inc/assets/img/header1.png',
		'2'			=> get_template_directory_uri() . '/inc/assets/img/header2.png',
		'3'			=> get_template_directory_uri() . '/inc/assets/img/header3.png',
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_layout_sep2',
	'section'	=> 'sect_dba_layout',
	'priority'	=> 10,
] );

if( !class_exists( 'Mega_Menu' ) ) {
	Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
		'type'		=> 'select',
		'settings'	=> 'dba_menu_text',
		'label'		=> esc_html__( 'Menu text (Theme menu only)', 'dfu-busacc' ),
		'section'	=> 'sect_dba_layout',
		'default'	=> 'light',
		'priority'	=> 10,
		'multiple'	=> 1,
		'choices'	=> [
			'light'			=> esc_html__( 'Dark', 'dfu-busacc' ),	// for light background
			'dark'			=> esc_html__( 'Light', 'dfu-busacc' ),	// for dark background
		],
	] );

	Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
		'type'      => 'number',
		'settings'  => 'dba_menu_dropdown_border_radius',
		'label'     => esc_html__( 'Dropdown menu border radius (in rem)', 'dfu-busacc' ),
		'section'   => 'sect_dba_layout',
		'default'   => 0,
		'choices'   => [
			'min'   => 0,
			'max'   => 1,
			'step'  => 0.05,
		],
	] );

	Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
		'type'		=> 'select',
		'settings'	=> 'dba_menu_mob_breakpt',
		'label'		=> esc_html__( 'Mobile breakpoint (Theme menu only)', 'dfu-busacc' ),
		'section'	=> 'sect_dba_layout',
		'default'	=> 'md',
		'priority'	=> 10,
		'multiple'	=> 1,
		'choices'	=> [
			'sm'			=> esc_html__( 'Small', 'dfu-busacc' ),
			'md'			=> esc_html__( 'Medium', 'dfu-busacc' ),
			'lg'			=> esc_html__( 'Large', 'dfu-busacc' ),
			'xl'			=> esc_html__( 'Extra large', 'dfu-busacc' ),
		],
	] );

}

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_menu_align1',
	'label'		=> esc_html__( 'Menu align position', 'dfu-busacc' ),
	'section'	=> 'sect_dba_layout',
	'default'	=> 'end',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'start'			=> esc_html__( 'Left', 'dfu-busacc' ),
		'end'			=> esc_html__( 'Right', 'dfu-busacc' ),
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_header_layout',
			'operator'  => '==',
			'value'     => 1,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_menu_align2',
	'label'		=> esc_html__( 'Menu align position', 'dfu-busacc' ),
	'section'	=> 'sect_dba_layout',
	'default'	=> 'start',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'start'			=> esc_html__( 'Left', 'dfu-busacc' ),
		'center'		=> esc_html__( 'Center', 'dfu-busacc' ),
		'end'			=> esc_html__( 'Right', 'dfu-busacc' ),
	],
	'active_callback'   => [
		[
			'setting'   => 'dba_header_layout',
			'operator'  => '==',
			'value'     => 2,
		]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_stickymenu',
	'label'       => esc_html__( 'Sticky menu?', 'dfu-busacc' ),
	'section'     => 'sect_dba_layout',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_stickymenu_logo',
	'label'       => esc_html__( 'Logo on sticky and mobile menu?', 'dfu-busacc' ),
	'section'     => 'sect_dba_layout',
	'default'     => 'false',
	'priority'    => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_stickymenu',
            'operator'  => '!==',
            'value'     => false,
		],
        [
            'setting'   => 'dba_header_layout',
            'operator'  => '==',
            'value'     => 2,
        ]
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_stickymenu_opacity',
	'label'     => esc_html__( 'Sticky menu opacity', 'dfu-busacc' ),
	'section'   => 'sect_dba_layout',
	'default'   => 0.9,
	'choices'   => [
		'min'   => 0,
		'max'   => 1,
		'step'  => 0.05,
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_stickymenu',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_layout_head2',
    'label'         => esc_html__( 'Sidebar', 'dfu-busacc' ),
	'section'	    => 'sect_dba_layout',
	'priority'	    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      	=> 'number',
	'settings'  	=> 'dba_sidebar_no',
	'label'     	=> esc_html__( 'Number of additional sidebars', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Note: This theme includes 7 sidebars with some of them targeted for use in specific areas.', 'dfu-busacc' ),
	'section'   	=> 'sect_dba_layout',
	'default'   	=> 0,
	'choices'   	=> [
		'min'   	=> 0,
		'max'   	=> 20,
		'step'  	=> 1,
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_layout_head3',
    'label'         => esc_html__( 'Footer', 'dfu-busacc' ),
	'section'	    => 'sect_dba_layout',
	'priority'	    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_footerbar_no',
	'label'     => esc_html__( 'Number of footer widget areas', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Note: You will need to refresh Customiser to see the widgets in Customiser\'s widgets area.', 'dfu-busacc' ),
	'section'   => 'sect_dba_layout',
	'default'   => 0,
	'choices'   => [
		'min'   => 0,
		'max'   => 4,
		'step'  => 1,
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_copyright',
	'label'       => esc_html__( 'Show copyright info on bottom footer?', 'dfu-busacc' ),
	'section'     => 'sect_dba_layout',
	'default'     => 'true',
	'priority'    => 10,
] );

/**
 * Typography
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_typography', array(
    'title'			=> esc_html__( 'Typography', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Includes setting for default fonts and headings styles', 'dfu-busacc' ),
    'panel'			=> 'panel_dba_options',
    'priority'		=> 10,
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_default_font',
	'label'			=> esc_html__( 'Default Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> 'regular',
		'font-size'			=> '1rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '0',
		'color'				=> '#28292a',
		'text-transform'	=> 'none',
		'text-align'	    => 'left',
	],
	'priority'	=> 10,
	'transport'	=> 'auto',
	'output'      => [
		[
			'element' => array('body', 'input', 'select', 'optgroup', 'textarea'),
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_h1_font',
	'label'			=> esc_html__( 'H1 Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> 'regular',
		'font-size'			=> '1.8rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '2px',
		'color'				=> '#484b4c',
		'text-transform'	=> 'capitalize',
		'text-align'		=> 'left',
	],
	'priority'	=> 10,
	'transport'	=> 'auto',
	'output'      => [
		[
			'element' => 'h1',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_h2_font',
	'label'			=> esc_html__( 'H2 Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> 'regular',
		'font-size'			=> '1.6rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '1px',
		'color'				=> '#484b4c',
		'text-transform'	=> 'capitalize',
		'text-align'		=> 'left',
	],
	'priority'		=> 10,
	'transport'		=> 'auto',
	'output'      => [
		[
			'element' => 'h2',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_h3_font',
	'label'			=> esc_html__( 'H3 Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> 'regular',
		'font-size'			=> '1.4rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '0',
		'color'				=> '#484b4c',
		'text-transform'	=> 'capitalize',
		'text-align'		=> 'left',
	],
	'priority'		=> 10,
	'transport'		=> 'auto',
	'output'      => [
		[
			'element' => 'h3',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_h4_font',
	'label'			=> esc_html__( 'H4 Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> 'regular',
		'font-size'			=> '1.2rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '0',
		'color'				=> '#484b4c',
		'text-transform'	=> 'capitalize',
		'text-align'		=> 'left',
	],
	'priority'	=> 10,
	'transport'	=> 'auto',
	'output'      => [
		[
			'element' => 'h4',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_h5_font',
	'label'			=> esc_html__( 'H5 Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> 'regular',
		'font-size'			=> '1.1rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '0',
		'color'				=> '#484b4c',
		'text-transform'	=> 'none',
		'text-align'		=> 'left',
	],
	'priority'	=> 10,
	'transport'	=> 'auto',
	'output'      => [
		[
			'element' => 'h5',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_h6_font',
	'label'			=> esc_html__( 'H6 Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> '600',
		'font-size'			=> '1rem',
		'line-height'		=> '1.5',
		'letter-spacing'	=> '0',
		'color'				=> '#484b4c',
		'text-transform'	=> 'none',
		'text-align'		=> 'left',
	],
	'priority'		=> 10,
	'transport'		=> 'auto',
	'output'      => [
		[
			'element' => 'h6',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'typography',
	'settings'		=> 'dba_topbar_font',
	'label'			=> esc_html__( 'Top bar Style', 'dfu-busacc' ),
	'section'		=> 'sect_dba_typography',
	'default'		=> [
		'font-family'		=> 'Montserrat',
		'variant'			=> '300',
		'font-size'			=> '0.8rem',
		'line-height'		=> '0.8rem',
		'letter-spacing'	=> '0',
		'color'				=> '#dee1e2',
		'text-transform'	=> 'none',
		'text-align'		=> 'left',
	],
	'priority'		=> 10,
	'transport'		=> 'auto',
	'active_callback'   => [
        [
            'setting'   => 'dba_topbar',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
	'output'      => [
		[
			'element' => '#topbar',
		],
	],
] );

/**
 * Colors
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_custom_color_head1',
    'label'         => esc_html__( 'Theme custom colours', 'dfu-busacc' ),
	'section'	    => 'colors',
	'priority'	    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
    'type'		=> 'multicolor',
    'settings'	=> 'dba_button',
    'label'		=> esc_html__( 'Buttons', 'dfu-busacc' ),
	'description'   => esc_html__( 'Note: The theme is using the background colour (or the From colour if using background gradient) on buttons as primary colour', 'dfu-busacc' ),
    'section'	=> 'colors',
    'priority'	=> 10,
    'choices'	=> [
        'text'	=> esc_html__( 'Text', 'dfu-busacc' ),
        'htext'	=> esc_html__( 'Text - hover', 'dfu-busacc' ),
        'bg'	=> esc_html__( 'Background', 'dfu-busacc' ),
        'hbg'   => esc_html__( 'Background - hover', 'dfu-busacc' ),
    ],
    'default'	=> [
        'text'	=> '#f0f1f2',
        'htext'	=> '#fcfcfc',
        'bg'	=> '#0088cc',
        'hbg'	=> '#00517a',
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'checkbox',
	'settings'    => 'dba_btn_grad',
	'label'       => esc_html__( 'Button background gradient?', 'dfu-busacc' ),
	'section'     => 'colors',
	'default'     => false,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_gradient_direction',
	'label'		=> esc_html__( 'Gradient direction', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'to right'			=> esc_html__( 'to right', 'dfu-busacc' ),
		'to left'			=> esc_html__( 'to left', 'dfu-busacc' ),
		'to top'			=> esc_html__( 'to top', 'dfu-busacc' ),
		'to bottom'			=> esc_html__( 'to bottom', 'dfu-busacc' ),
		'to left top'		=> esc_html__( 'to left top', 'dfu-busacc' ),
		'to left bottom'	=> esc_html__( 'to left bottom', 'dfu-busacc' ),
		'to right top'		=> esc_html__( 'to right top', 'dfu-busacc' ),
		'to right bottom'	=> esc_html__( 'to right bottom', 'dfu-busacc' ),
	],
    'active_callback'   => [
        [
            'setting'   => 'dba_btn_grad',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_btn_first',
	'label'		=> esc_attr__( 'From colour', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
    'active_callback'   => [
        [
            'setting'   => 'dba_btn_grad',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_btn_second',
	'label'		=> esc_attr__( 'To colour', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
    'priority'	=> 10,
    'active_callback'   => [
        [
            'setting'   => 'dba_btn_grad',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_gradient_hdirection',
	'label'		=> esc_html__( 'Gradient direction on hover', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
        'to right'			=> esc_html__( 'to right', 'dfu-busacc' ),
		'to left'			=> esc_html__( 'to left', 'dfu-busacc' ),
		'to top'			=> esc_html__( 'to top', 'dfu-busacc' ),
		'to bottom'			=> esc_html__( 'to bottom', 'dfu-busacc' ),
		'to left top'		=> esc_html__( 'to left top', 'dfu-busacc' ),
		'to left bottom'	=> esc_html__( 'to left bottom', 'dfu-busacc' ),
		'to right top'		=> esc_html__( 'to right top', 'dfu-busacc' ),
		'to right bottom'	=> esc_html__( 'to right bottom', 'dfu-busacc' ),
	],
    'active_callback'   => [
        [
            'setting'   => 'dba_btn_grad',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_btn_hfirst',
	'label'		=> esc_attr__( 'From colour - hover', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
    'active_callback'   => [
        [
            'setting'   => 'dba_btn_grad',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_btn_hsecond',
	'label'		=> esc_attr__( 'To colour - hover', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
    'active_callback'   => [
        [
            'setting'   => 'dba_btn_grad',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_custom_color_sep2',
	'section'	=> 'colors',
	'priority'	=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
    'type'			=> 'multicolor',
    'settings'		=> 'dba_link',
    'label'			=> esc_html__( 'Text links', 'dfu-busacc' ),
	'description'   => esc_html__( 'Note: The theme is using the Text colour on Text links for secondary colour', 'dfu-busacc' ),
    'section'		=> 'colors',
    'priority'		=> 10,
    'choices'		=> [
        'text'		=> esc_html__( 'Text', 'dfu-busacc' ),
        'htext'		=> esc_html__( 'Text - hover', 'dfu-busacc' ),
    ],
    'default'		=> [
        'text'	=> '#cc4400',
        'htext'	=> '#7a2800',
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_custom_color_sep3',
	'section'	=> 'colors',
	'priority'	=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
    'type'		=> 'multicolor',
    'settings'	=> 'dba_input',
    'label'		=> esc_html__( 'Input/Text Area', 'dfu-busacc' ),
    'section'	=> 'colors',
    'priority'	=> 10,
    'choices'	=> [
        'text'			=> esc_html__( 'Placeholder Text', 'dfu-busacc' ),
        'bg'			=> esc_html__( 'Background', 'dfu-busacc' ),
		'focus'			=> esc_html__( 'Background - focus', 'dfu-busacc' ),
    ],
    'default'	=> [
		'text'			=> '#a0a7ab',
        'bg'			=> '#f0f1f2',
		'focus'			=> '#fcfcfc',
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_ctrl_border',
	'label'     => esc_html__( 'Border width (in px)', 'dfu-busacc' ),
	'section'   => 'colors',
	'default'   => 0,
	'choices'   => [
		'min'   => 0,
		'max'   => 8,
		'step'  => 1,
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_ctrl_border_color',
	'label'		=> esc_attr__( 'Border colour', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_ctrl_border',
            'operator'  => '!==',
            'value'     => '0',
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_ctrl_border_color_focus',
	'label'		=> esc_attr__( 'Border colour - focus', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_ctrl_border',
            'operator'  => '!==',
            'value'     => '0',
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_ctrl_btm_border',
	'label'     => esc_html__( 'Bottom border width (in px)', 'dfu-busacc' ),
	'section'   => 'colors',
	'default'   => 0,
	'choices'   => [
		'min'   => 0,
		'max'   => 8,
		'step'  => 1,
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_ctrl_btm_border_color',
	'label'		=> esc_attr__( 'Bottom border colour', 'dfu-busacc' ),
	'section'	=> 'colors',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_ctrl_btm_border',
            'operator'  => '!==',
            'value'     => '0',
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'			=> 'color',
	'settings'		=> 'dba_ctrl_btm_border_color_focus',
	'label'			=> esc_attr__( 'Bottom border colour - focus', 'dfu-busacc' ),
	'section'		=> 'colors',
	'default'		=> '',
	'priority'		=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_ctrl_btm_border',
            'operator'  => '!==',
            'value'     => '0',
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'			=> 'color',
	'settings'		=> 'dba_ctrl_btm_border_color_focus_inv',
	'label'			=> esc_attr__( 'Bottom border colour - focus invalid', 'dfu-busacc' ),
	'section'		=> 'colors',
	'default'		=> '',
	'priority'		=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_ctrl_btm_border',
            'operator'  => '!==',
            'value'     => '0',
        ]
    ],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'separator',
	'settings'	=> 'dba_custom_color_sep4',
	'section'	=> 'colors',
	'priority'	=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
    'type'		=> 'multicolor',
    'settings'	=> 'dba_widgets',
    'label'		=> esc_html__( 'Widget text', 'dfu-busacc' ),
    'section'	=> 'colors',
    'priority'	=> 10,
    'choices'	=> [
        'sidebar-head'	=> esc_html__( 'Sidebar widget heading', 'dfu-busacc' ),
        'footer-head'	=> esc_html__( 'Footer widget heading', 'dfu-busacc' ),
        'sidebar-text'	=> esc_html__( 'Sidebar widget text', 'dfu-busacc' ),
        'footer-text'	=> esc_html__( 'Footer widget text', 'dfu-busacc' ),
    ],
    'default'	=> [
        'sidebar-head'	=> '#484b4c',
        'footer-head'	=> '#484b4c',
        'sidebar-text'	=> '#28292a',
        'footer-text'	=> '#28292a',
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
    'type'		=> 'multicolor',
    'settings'	=> 'dba_topbar_colour',
    'label'		=> esc_html__( 'Top bar', 'dfu-busacc' ),
    'section'	=> 'colors',
    'priority'	=> 10,
    'choices'	=> [
        'bg'		=> esc_html__( 'Background', 'dfu-busacc' ),
    ],
    'default'	=> [
        'bg'		=> '#28292a',
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_topbar',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
    'type'		=> 'multicolor',
    'settings'	=> 'dba_layout',
    'label'		=> esc_html__( 'Layout background', 'dfu-busacc' ),
    'section'	=> 'colors',
    'priority'	=> 10,
    'choices'	=> [
        'header'		=> esc_html__( 'Header', 'dfu-busacc' ),
        'top-footer'	=> esc_html__( 'Top footer', 'dfu-busacc' ),
		'btm-footer'	=> esc_html__( 'Bottom footer', 'dfu-busacc' ),
    ],
    'default'	=> [
		'header'		=> '#f0f1f2',
        'top-footer'	=> '#f0f1f2',
		'btm-footer'	=> '#f0f1f2',
    ],
] );

/**
 * General
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_general', array(
    'title'			=> esc_html__( 'General', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Settings on various miscellaneous areas for the theme', 'dfu-busacc' ),
    'panel'			=> 'panel_dba_options',
    'priority'		=> 10,
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_ctrl_height',
	'label'     => esc_html__( 'Minimum input and button height (in rem)', 'dfu-busacc' ),
	'section'   => 'sect_dba_general',
	'default'   => 2.5,
	'choices'   => [
		'min'   => 1.6,
		'max'   => 6,
		'step'  => 0.1,
    ],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_ctrl_border_radius',
	'label'     => esc_html__( 'Input/buttons/tables border radius (in rem)', 'dfu-busacc' ),
	'section'   => 'sect_dba_general',
	'default'   => 0,
	'choices'   => [
		'min'   => 0,
		'max'   => 3,
		'step'  => 0.05,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_show_backtotop',
	'label'       => esc_html__( 'Show back to top?', 'dfu-busacc' ),
	'section'     => 'sect_dba_general',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_show_search',
	'label'       => esc_html__( 'Show search?', 'dfu-busacc' ),
	'section'     => 'sect_dba_general',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_load_fa',
	'label'       => esc_html__( 'Load Font Awesome 5 icons to use in HTML?', 'dfu-busacc' ),
	'description' => esc_html__( 'If Font Awesome 5 is not loaded, font awesome icons used will not load unless it is loaded somewhere else.', 'dfu-busacc' ),
	'section'     => 'sect_dba_general',
	'default'     => 'true',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_load_fa_font',
	'label'       => esc_html__( 'Load Font Awesome 5 icons to use in CSS?', 'dfu-busacc' ),
	'description' => esc_html__( 'This theme do not use Font Awesome 5 in CSS, it is not necessary to load unless you are using it elsewhere.', 'dfu-busacc' ),
	'section'     => 'sect_dba_general',
	'default'     => 'false',
	'priority'    => 10,
] );

/**
 * Blog
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_blog', array(
    'title'			=> esc_html__( 'Blog', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Blog options', 'dfu-busacc' ),
    'panel'			=> 'panel_dba_options',
    'priority'		=> 10,
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'select',
	'settings'		=> 'dba_blog_list_width',
	'label'			=> esc_html__( 'Thumbnail width in posts listing', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Including search result listing', 'dfu-busacc' ),
	'section'		=> 'sect_dba_blog',
	'default'		=> '2',
	'priority'		=> 10,
	'multiple'		=> 1,
	'choices'		=> [
		'4'			=> esc_html__( 'One quarter (1/4)', 'dfu-busacc' ),
		'3'			=> esc_html__( 'One third (1/3)', 'dfu-busacc' ),
		'2'			=> esc_html__( 'Half (1/2)', 'dfu-busacc' ),
		'1'			=> esc_html__( 'Full', 'dfu-busacc' ),
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_blog_img_pc',
	'label'     => esc_html__( 'Maximum featured image width in single post page (in %)', 'dfu-busacc' ),
	'section'   => 'sect_dba_blog',
	'default'   => 50,
	'choices'   => [
		'min'   => 0,
		'max'   => 100,
		'step'  => 5,
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_blog_show_header_ico',
	'label'       => esc_html__( 'Show blog header icons?', 'dfu-busacc' ),
	'section'     => 'sect_dba_blog',
	'default'     => 'false',
	'priority'    => 10,
] );


Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_blog_show_footer_ico',
	'label'       => esc_html__( 'Show blog footer icons?', 'dfu-busacc' ),
	'section'     => 'sect_dba_blog',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_blog_header_ico_color',
	'label'		=> esc_attr__( 'Header icon colour', 'dfu-busacc' ),
	'section'	=> 'sect_dba_blog',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_blog_show_header_ico',
            'operator'  => '==',
            'value'     => true,
        ]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_blog_footer_ico_color',
	'label'		=> esc_attr__( 'Footer icon colour', 'dfu-busacc' ),
	'section'	=> 'sect_dba_blog',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_blog_show_footer_ico',
            'operator'  => '==',
            'value'     => true,
        ]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_blog_tag_use_badge',
	'label'       => esc_html__( 'Show tags as badge?', 'dfu-busacc' ),
	'section'     => 'sect_dba_blog',
	'default'     => 'true',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'multicolor',
	'settings'	=> 'dba_blog_badge_color',
	'label'		=> esc_attr__( 'Badge background colour', 'dfu-busacc' ),
	'section'	=> 'sect_dba_blog',
	'priority'	=> 10,
    'choices'		=> [
        'text'		=> esc_html__( 'Text', 'dfu-busacc' ),
		'htext'		=> esc_html__( 'Hove text', 'dfu-busacc' ),
		'bg'		=> esc_html__( 'Background', 'dfu-busacc' ),
		'hbg'		=> esc_html__( 'Hover background', 'dfu-busacc' ),
    ],
    'default'		=> [
        'text'		=> '#f0f1f2',
		'htext'		=> '#fcfcfc',
        'bg'		=> '#0088cc',
        'hbg'		=> '#00517a',
    ],
	'active_callback'   => [
        [
            'setting'   => 'dba_blog_tag_use_badge',
            'operator'  => '==',
            'value'     => true,
        ]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_blog_date_to_use',
	'label'		=> esc_html__( 'Date to use for posts', 'dfu-busacc' ),
	'section'	=> 'sect_dba_blog',
	'default'	=> 'update',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'create'		=> esc_html__( 'Date created', 'dfu-busacc' ),
		'update'		=> esc_html__( 'Date last updated', 'dfu-busacc' ),
	],
] );

/**
 * Business
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_section( 'sect_dba_business', array(
    'title'			=> esc_html__( 'Business', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Set business options to display on site', 'dfu-busacc' ),
    'panel'			=> 'panel_dba_options',
    'priority'		=> 10,
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_busreg_on_copyright',
	'label'       => esc_html__( 'Show business registration info?', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Business registration info shown on bottom footer', 'dfu-busacc' ),
	'section'     => 'sect_dba_business',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'text',
	'settings'	=> 'dba_busreg_label',
	'label'		=> esc_html__( 'Business registration label', 'dfu-busacc' ),
	'section'	=> 'sect_dba_business',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_busreg_on_copyright',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_busreg_no',
	'label'    => esc_html__( 'Business registration number', 'dfu-busacc' ),
	'section'  => 'sect_dba_business',
	'default'	=> '',
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_busreg_on_copyright',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_bus_email',
	'label'    => esc_html__( 'Business contact email address', 'dfu-busacc' ),
	'section'  => 'sect_dba_business',
	'default'	=> esc_html_x( 'info@yourdomain.com', 'Block pattern sample content', 'dfu-busacc' ),
	'priority' => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_bus_phone',
	'label'    => esc_html__( 'Business contact phone number', 'dfu-busacc' ),
	'section'  => 'sect_dba_business',
	'default'	=> esc_html_x( '0123-222-333', 'Block pattern sample content', 'dfu-busacc' ),
	'priority' => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_bus_address1',
	'label'    => esc_html__( 'Business address line 1', 'dfu-busacc' ),
	'section'  => 'sect_dba_business',
	'default'	=> esc_html_x( 'Address line 1', 'Block pattern sample content', 'dfu-busacc' ),
	'priority' => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_bus_address2',
	'label'    => esc_html__( 'Business address line 2', 'dfu-busacc' ),
	'section'  => 'sect_dba_business',
	'default'	=> esc_html_x( 'Address line 2', 'Block pattern sample content', 'dfu-busacc' ),
	'priority' => 10,
] );

/**
 * Homepage
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        	=> 'toggle',
	'settings'    	=> 'dba_hp_custom_header',
	'label'       	=> esc_html__( 'Use header image(s)?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Turn on to use header image(s) on homepage. Turn on Randomise uploaded headers to use a random image or turn on Use image slider to use images on slider.', 'dfu-busacc' ),
	'section'     	=> 'header_image',
	'default'     	=> 'false',
	'priority'    	=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'toggle',
	'settings'		=> 'dba_hp_headimg_slider',
	'label'			=> esc_html__( 'Use image slider?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'Turn on to use header image(s) as slider on homepage', 'dfu-busacc' ),
	'section'		=> 'header_image',
	'default'     => 'false',
	'priority'    => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_headimg_filter',
	'label'		=> esc_html__( 'Header image filter', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> '1',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'none'			=> esc_html__( 'None', 'dfu-busacc' ),
		'grayscale'		=> esc_html__( 'Grayscale', 'dfu-busacc' ),
		'opacity'		=> esc_html__( 'Opacity', 'dfu-busacc' ),
		'sepia'			=> esc_html__( 'Sepia', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'number',
	'settings'    => 'dba_hp_headimg_filter_perc',
	'label'       => esc_html__( 'Header image filter percentage (0-100)', 'dfu-busacc' ),
	'section'     => 'header_image',
	'default'     => 50,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
		],
		[
            'setting'   => 'dba_hp_headimg_filter',
            'operator'  => '!==',
            'value'     => 'none',
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_headimg_style',
	'label'		=> esc_html__( 'Header image section style', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> '1',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'1'		=> esc_html__( 'Text on side', 'dfu-busacc' ),
		'2'		=> esc_html__( 'Text on image', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_headimg_container',
	'label'		=> esc_html__( 'Header image section width', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> 'full-width',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'container'		=> esc_html__( 'Contained', 'dfu-busacc' ),
		'full-width'	=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_hp_headimg_sect_dba_bgcolor',
	'label'		=> esc_attr__( 'Header image section background colour', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_headimg_width',
	'label'		=> esc_html__( 'Header image width', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> '8',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'6'			=> esc_html__( 'Half (1/2)', 'dfu-busacc' ),
		'8'			=> esc_html__( 'Two-third (2/3)', 'dfu-busacc' ),
		'9'			=> esc_html__( 'Three-quarters (3/4)', 'dfu-busacc' ),
		'12'		=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
		],
        [
            'setting'   => 'dba_hp_headimg_style',
            'operator'  => '==',
            'value'     => '1',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_headimg_txtypos',
	'label'		=> esc_html__( 'Header image text vertical position', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> 'centery',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'top'				=> esc_html__( 'Top', 'dfu-busacc' ),
		'centery'			=> esc_html__( 'Center', 'dfu-busacc' ),
		'bottom'			=> esc_html__( 'Bottom', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
		],
        [
            'setting'   => 'dba_hp_headimg_style',
            'operator'  => '==',
            'value'     => '2',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_headimg_txtxpos',
	'label'		=> esc_html__( 'Header image text horizontal position', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> 'centerx',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'left'			=> esc_html__( 'Left', 'dfu-busacc' ),
		'centerx'		=> esc_html__( 'Center', 'dfu-busacc' ),
		'right'			=> esc_html__( 'Right', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
		],
        [
            'setting'   => 'dba_hp_headimg_style',
            'operator'  => '==',
            'value'     => '2',
		],
	],
] );


Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_hp_headimg_bgcolor',
	'label'		=> esc_attr__( 'Header image background colour', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> '',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_hp_headimg_text_bgopacity',
	'label'     => esc_html__( 'Text background opacity', 'dfu-busacc' ),
	'section'   => 'header_image',
	'default'   => 1,
	'choices'   => [
		'min'   => 0,
		'max'   => 1,
		'step'  => 0.05,
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
		],
        [
            'setting'   => 'dba_hp_headimg_style',
            'operator'  => '==',
            'value'     => '2',
		],
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_hp_headimg_txt_bgcolor',
	'label'		=> esc_attr__( 'Header image text background colour', 'dfu-busacc' ),
	'section'	=> 'header_image',
	'default'	=> '#dee1e2',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_hp_headimg_head',
	'label'    => esc_html__( 'Header image heading', 'dfu-busacc' ),
	'section'  => 'header_image',
	'default'  => esc_html__( 'DFU Business Accelerator Setup', 'dfu-busacc' ),
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_hp_headimg_msg',
	'label'    => esc_html__( 'Header image message', 'dfu-busacc' ),
	'section'  => 'header_image',
	'default'  => esc_html__( 'To setup theme follow instructions in DFUBA Theme setup', 'dfu-busacc' ),
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_hp_headimg_btn_text',
	'label'    => esc_html__( 'Header image button text', 'dfu-busacc' ),
	'section'  => 'header_image',
	'default'  => esc_html__( 'Go to theme setup', 'dfu-busacc' ),
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'link',
	'settings' => 'dba_hp_headimg_btn_url',
	'label'    => __( 'Header image button link', 'dfu-busacc' ),
	'section'  => 'header_image',
	'default'  => get_site_url() . '/themes.php?page=reset-theme',
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_custom_header',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

/**
 * Homepage CTA
 *******************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_hp_cta_sect_head',
    'label'         => esc_html__( 'CTA section', 'dfu-busacc' ),
    'description'	=> esc_html__( 'CTA section is displayed under homepage header (if used).', 'dfu-busacc' ),
	'section'	    => 'static_front_page',
	'priority'	    => 10,
] );

 Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_hp_cta',
	'label'       => esc_html__( 'Display CTA section?', 'dfu-busacc' ),
	'section'     => 'static_front_page',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_cta_container',
	'label'		=> esc_html__( 'CTA display width', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> 'full-width',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'container'		=> esc_html__( 'Contained', 'dfu-busacc' ),
		'full-width'	=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_cta_bg_type',
	'label'		=> esc_html__( 'CTA background type', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> 'bgcolor',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'bgcolor'			=> esc_html__( 'Colour only', 'dfu-busacc' ),
		'bgimg'				=> esc_html__( 'Image only', 'dfu-busacc' ),
		'bgboth'			=> esc_html__( 'Colour and image', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'theme_config_id', [
	'type'        => 'image',
	'settings'    => 'dba_hp_cta_bgimg',
	'label'       => esc_html__( 'Background image', 'dfu-busacc' ),
	'section'     => 'static_front_page',
	'default'     => '',
	'choices'     => [
		'save_as' => 'id',
	],
	'active_callback'	=> function() {
		if ( get_theme_mod( 'dba_hp_cta', false ) === true ) {
			if ( get_theme_mod( 'dba_hp_cta_bg_type', 'bgboth' ) === 'bgcolor' ) { return false; } else { return true; }
		} else { return false; }
	},
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_cta_bg_repeat',
	'label'		=> esc_html__( 'CTA image background repeat', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> 'no-repeat',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'repeat' 		=> esc_html__( 'Repeat', 'dfu-busacc' ),
		'repeat-x' 		=> esc_html__( 'Repeat horizontally', 'dfu-busacc' ),
		'repeat-y' 		=> esc_html__( 'Repeat vertically', 'dfu-busacc' ),
		'no-repeat' 	=> esc_html__( 'No repeat', 'dfu-busacc' ),
		'space' 		=> esc_html__( 'Image repeated without clipping', 'dfu-busacc' ),
		'round' 		=> esc_html__( 'Image is repeated to fill the space (no gaps)', 'dfu-busacc' ),
	],
	'active_callback'   => function() {
		if ( get_theme_mod( 'dba_hp_cta', false ) === true ) {
			if ( get_theme_mod( 'dba_hp_cta_bg_type', 'bgboth' ) === 'bgcolor' ) { return false; } else { return true; }
		} else { return false; }
	},
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_cta_bg_attachment',
	'label'		=> esc_html__( 'CTA image background attachment', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> 'fixed',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'scroll'		=> esc_html__( 'Scroll', 'dfu-busacc' ),
		'fixed'			=> esc_html__( 'Fixed', 'dfu-busacc' ),
		'local'			=> esc_html__( 'Local', 'dfu-busacc' ),
	],
	'active_callback'   => function() {
		if ( get_theme_mod( 'dba_hp_cta', false ) === true ) {
			if ( get_theme_mod( 'dba_hp_cta_bg_type', 'bgboth' ) === 'bgcolor' ) { return false; } else { return true; }
		} else { return false; }
	},
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_hp_cta_parallax',
	'label'       => esc_html__( 'Background image parallax?', 'dfu-busacc' ),
	'section'     => 'static_front_page',
	'default'     => 'false',
	'priority'    => 10,
	'active_callback'   => function() {
		if ( get_theme_mod( 'dba_hp_cta', false ) === true ) {
			if ( get_theme_mod( 'dba_hp_cta_bg_type', 'bgboth' ) === 'bgcolor' ) { return false; } else { return true; }
		} else { return false; }
	},
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_hp_cta_bgcolor',
	'label'		=> esc_attr__( 'CTA background colour', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> '#484b4c',
	'priority'	=> 10,
	'active_callback'   => function() {
		if ( get_theme_mod( 'dba_hp_cta', false ) === true ) {
			if ( get_theme_mod( 'dba_hp_cta_bg_type', 'bgboth' ) === 'bgimg' ) { return false; } else { return true; }
		} else { return false; }
	},
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_hp_cta_txtcolor',
	'label'		=> esc_attr__( 'CTA text colour', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> '#fcfcfc',
	'priority'	=> 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
) );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_hp_cta_head',
	'label'    => esc_html__( 'CTA heading', 'dfu-busacc' ),
	'section'  => 'static_front_page',
	'default'  => esc_html__( 'Call to action Heading', 'dfu-busacc' ),
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_hp_cta_msg',
	'label'    => esc_html__( 'CTA message', 'dfu-busacc' ),
	'section'  => 'static_front_page',
	'default'  => esc_html__( 'Put your call to action heading, message and button text in Customiser Home Page and Sections', 'dfu-busacc' ),
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

if ( class_exists( 'Company_Info_SEO_Plugin' ) ) {
	Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
		'type'        => 'toggle',
		'settings'    => 'dba_hp_cta_showphone',
		'label'       => esc_html__( 'Show phone number?', 'dfu-busacc' ),
		'section'     => 'static_front_page',
		'default'     => 'false',
		'priority'    => 10,
		'active_callback'   => [
			[
				'setting'   => 'dba_hp_cta',
				'operator'  => '!==',
				'value'     => false,
			]
		],
	] );

	Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
		'type'        => 'toggle',
		'settings'    => 'dba_hp_cta_showhours',
		'label'       => esc_html__( 'Show opening hours?', 'dfu-busacc' ),
		'section'     => 'static_front_page',
		'default'     => 'false',
		'priority'    => 10,
		'active_callback'   => [
			[
				'setting'   => 'dba_hp_cta',
				'operator'  => '!==',
				'value'     => false,
			]
		],
	] );
}

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'text',
	'settings' => 'dba_hp_cta_btn_txt',
	'label'    => esc_html__( 'CTA button text', 'dfu-busacc' ),
	'section'  => 'static_front_page',
	'default'  => esc_html__( 'CTA button text', 'dfu-busacc' ),
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'     => 'link',
	'settings' => 'dba_hp_cta_btn_url',
	'label'    => __( 'CTA button link', 'dfu-busacc' ),
	'section'  => 'static_front_page',
	'default'  => '#',
	'priority' => 10,
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		    => 'head',
    'settings'	    => 'dba_hp_cta_widget_sect_head',
    'label'         => esc_html__( 'Widgets section', 'dfu-busacc' ),
    'description'	=> esc_html__( 'Widgets section is displayed under homepage CTA section (if used).', 'dfu-busacc' ),
	'section'	    => 'static_front_page',
	'priority'	    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'        => 'toggle',
	'settings'    => 'dba_hp_cta_widget_below',
	'label'       => esc_html__( 'Widget under CTA section?', 'dfu-busacc' ),
	'section'     => 'static_front_page',
	'default'     => 'false',
	'priority'    => 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_cta_widget_below_container',
	'label'		=> esc_html__( 'Under CTA widget container', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> 'full-width',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'container'		=> esc_html__( 'Contained', 'dfu-busacc' ),
		'full-width'	=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta_widget_below',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'		=> 'select',
	'settings'	=> 'dba_hp_cta_widget_below_width',
	'label'		=> esc_html__( 'Widget content width', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> 'container',
	'priority'	=> 10,
	'multiple'	=> 1,
	'choices'	=> [
		'container'		=> esc_html__( 'Contained', 'dfu-busacc' ),
		'full-width'	=> esc_html__( 'Full width', 'dfu-busacc' ),
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta_widget_below',
            'operator'  => '!==',
            'value'     => false,
        ]
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta_widget_below_container',
            'operator'  => '==',
            'value'     => 'full-width',
        ]
	],
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', array(
	'type'		=> 'color',
	'settings'	=> 'dba_hp_cta_widget_below_bgcolor',
	'label'		=> esc_attr__( 'Widget background colour', 'dfu-busacc' ),
	'section'	=> 'static_front_page',
	'default'	=> '',
	'priority'	=> 10,
    'active_callback'   => [
        [
            'setting'   => 'dba_hp_cta_widget_below',
            'operator'  => '!==',
            'value'     => false,
        ]
    ],
) );

/**
 * Background Image
********************************************************************************************************************************************/
Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'toggle',
	'settings'		=> 'dba_bgimg_hponly',
	'label' 		=> esc_html__( 'Background image on homepage only?', 'dfu-busacc' ),
	'section'		=> 'background_image',
	'default'		=> 'true',
	'priority'		=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'toggle',
	'settings'		=> 'dba_bgimg_responsive',
	'label' 		=> esc_html__( 'Use responsive background image?', 'dfu-busacc' ),
	'description'   => esc_html__( 'This may not work well in all situation. If turned off, it would go back to be handle in WordPress default way.', 'dfu-busacc' ),
	'section'		=> 'background_image',
	'default'		=> 'false',
	'priority'		=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'			=> 'toggle',
	'settings'		=> 'dba_bgcolor_ontop',
	'label' 		=> esc_html__( 'Background colour on top?', 'dfu-busacc' ),
	'description'	=> esc_html__( 'If on, content is displayed in a container with background colour on top of background image', 'dfu-busacc' ),
	'section'		=> 'background_image',
	'default'		=> 'false',
	'priority'		=> 10,
] );

Dfu_busacc_Kirki::add_field( 'config_dfubusacc', [
	'type'      => 'number',
	'settings'  => 'dba_bgcolor_ontop_opacity',
	'label'     => esc_html__( 'Background colour opacity', 'dfu-busacc' ),
	'section'   => 'background_image',
	'default'   => 1,
	'choices'   => [
		'min'   => 0,
		'max'   => 1,
		'step'  => 0.05,
	],
	'active_callback'   => [
        [
            'setting'   => 'dba_bgcolor_ontop',
            'operator'  => '==',
            'value'     => true
        ]
	],
] );

/**
 * Customiser changes
 *******************************************************************************************************************************************/
function dfu_busacc_fn_customizer( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->title				= __('Home Page Header', 'dfu-busacc');
	$wp_customize->get_section( 'static_front_page' )->title		= __('Home Page and Sections', 'dfu-busacc');
	$wp_customize->get_section( 'static_front_page' )->priority     = '61';

	// $wp_customize->add_setting( 'dba_theme_set_default' , array(
	// 	'transport' => 'postMessage',
	// ) );

	// $wp_customize->add_control( new Dfu_busacc_Custom_Set_Default_Control( $wp_customize, 'dba_theme_set_default', array(
	// 	'label'		=> esc_html__( 'Set or reset the theme colours to default', 'dfu-busacc' ),
	// 	'section'	=> 'sect_dba_info',
	// 	'priority'	=> 20,
	// ) ) );

	}
add_action( 'customize_register', 'dfu_busacc_fn_customizer' );

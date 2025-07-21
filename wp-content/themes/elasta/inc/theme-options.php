<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */
if ( !class_exists( 'Redux' ) ) {
    return;
}
// This is your option name where all the Redux data is stored.
$elasta_opt_name = "elasta_redux_options";
$elasta_opt_name = apply_filters( 'redux_demo/opt_name', $elasta_opt_name );
// Args
$elasta_theme = wp_get_theme();
$elasta_args = array(
    'opt_name'             => $elasta_opt_name,
    'display_name'         => $elasta_theme->get( 'Name' ),
    'display_version'      => $elasta_theme->get( 'Version' ),
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => __( 'Elasta Options', 'elasta' ),
    'page_title'           => __( 'Elasta Options', 'elasta' ),
    'google_api_key'       => '',
    'google_update_weekly' => false,
    'async_typography'     => false,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-awards',
    'admin_bar_priority'   => 50,
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => true,
    'page_priority'        => '4',
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => 'dashicons-awards',
    'last_tab'             => '',
    'page_icon'            => 'dashicons-awards',
    'page_slug'            => '',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    'output_tag'           => true,
    'database'             => '',
    'use_cdn'              => true,
);
Redux::setArgs( $elasta_opt_name, $elasta_args );
// is_premium
// Header Parent
Redux::setSection( $elasta_opt_name, array(
    'title' => esc_html__( 'Header', 'elasta' ),
    'id'    => 'theme_header_tab',
    'icon'  => 'fa fa-bars',
) );
// Only for free users
if ( ela_fs()->is_free_plan() ) {
    // Design
    Redux::setSection( $elasta_opt_name, array(
        'title'      => esc_html__( 'Design', 'elasta' ),
        'id'         => 'theme_header_tab-design',
        'icon'       => 'fa fa-pencil-square-o',
        'subsection' => true,
        'fields'     => array(
        array(
        'id'      => 'header_style',
        'type'    => 'image_select',
        'title'   => esc_html__( 'Header Styles', 'elasta' ),
        'options' => array(
        'one'   => array(
        'alt' => 'Style One',
        'img' => ELASTA_IMAGES . '/img/1.png',
    ),
        'two'   => array(
        'alt' => 'Style Two',
        'img' => ELASTA_IMAGES . '/img/2.png',
    ),
        'three' => array(
        'alt' => 'Style Three',
        'img' => ELASTA_IMAGES . '/img/3.png',
    ),
        'four'  => array(
        'alt' => 'Style Four',
        'img' => ELASTA_IMAGES . '/img/4.png',
    ),
        'five'  => array(
        'alt' => 'Style Five',
        'img' => ELASTA_IMAGES . '/img/5.png',
    ),
        'six'   => array(
        'alt' => 'Style Six',
        'img' => ELASTA_IMAGES . '/img/6.png',
    ),
    ),
        'default' => 'one',
    ),
        array(
        'id'       => 'scl_icn',
        'type'     => 'info',
        'style'    => 'success',
        'title'    => __( 'Social Icons', 'elasta' ),
        'desc'     => esc_html__( '<div class="elst-social">
                          <a href="#0"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                          <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <a href="#0"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>', 'elasta' ),
        'required' => array( 'header_style', '=', array( 'five', 'six' ) ),
    ),
        array(
        'id'       => 'header_scodes',
        'type'     => 'ace_editor',
        'title'    => __( 'Header Shortcodes', 'elasta' ),
        'subtitle' => __( 'Enter Your shortcodes here.', 'elasta' ),
        'mode'     => 'html',
        'theme'    => 'monokai',
        'required' => array( 'header_style', '=', array( 'five', 'six' ) ),
        'default'  => '<div class="elst-social">
                        <a href="#0"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                        <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#0"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                      </div>',
    ),
        array(
        'id'       => 'top_bar',
        'type'     => 'ace_editor',
        'title'    => __( 'Top Bar Content', 'elasta' ),
        'subtitle' => __( 'Enter Your Topbar content here.', 'elasta' ),
        'mode'     => 'html',
        'theme'    => 'monokai',
        'required' => array( 'header_style', '=', array( 'four', 'five' ) ),
        'default'  => '<p><i class="fa fa-bell" aria-hidden="true"></i> Various versions have evolved over the (years) - <a href="#0" class="elst-link">learn more</a></p>',
    )
    ),
    ) );
}
// is_premium
// Icons
Redux::setSection( $elasta_opt_name, array(
    'title'      => esc_html__( 'Icons', 'elasta' ),
    'id'         => 'theme_header_tab-links',
    'icon'       => 'fa fa-link',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'      => 'need_search',
    'type'    => 'switch',
    'title'   => esc_html__( 'Need Search Icon', 'elasta' ),
    'default' => false,
),
    array(
    'id'      => 'need_contact',
    'type'    => 'switch',
    'title'   => esc_html__( 'Need Contact Icon', 'elasta' ),
    'default' => false,
),
    array(
    'id'          => 'contact_icon',
    'type'        => 'text',
    'title'       => esc_html__( 'Contact Icon', 'elasta' ),
    'placeholder' => esc_html__( 'fa fa-headphones', 'elasta' ),
    'required'    => array( 'need_contact', '=', true ),
),
    array(
    'id'          => 'contact_link',
    'type'        => 'text',
    'title'       => esc_html__( 'Contact Link', 'elasta' ),
    'placeholder' => esc_html__( 'http://', 'elasta' ),
    'required'    => array( 'need_contact', '=', true ),
),
    array(
    'id'          => 'icon_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Icon Color', 'elasta' ),
    'output'      => array(
    'color' => '.header-icon-links a',
),
),
    array(
    'id'          => 'icon_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Icon Hover Color', 'elasta' ),
    'output'      => array(
    'color' => '[class*="header-style"] .header-icon-links a:hover',
),
)
),
) );
// Buttons
Redux::setSection( $elasta_opt_name, array(
    'title'      => esc_html__( 'Buttons', 'elasta' ),
    'id'         => 'header_design_tab',
    'icon'       => 'fa fa-magic',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'      => 'need_content',
    'type'    => 'switch',
    'title'   => esc_html__( 'Need Header Buttons', 'elasta' ),
    'default' => false,
),
    array(
    'id'       => 'fbtn',
    'type'     => 'info',
    'style'    => 'info',
    'title'    => esc_html__( 'First Button', 'elasta' ),
    'required' => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'btn_one_text',
    'type'        => 'text',
    'title'       => esc_html__( 'Button Text', 'elasta' ),
    'placeholder' => esc_html__( 'Log in', 'elasta' ),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'btn_one_icon',
    'type'        => 'text',
    'title'       => esc_html__( 'Button Icon', 'elasta' ),
    'placeholder' => esc_html__( 'fa fa-comment-o', 'elasta' ),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'btn_one_link',
    'type'        => 'text',
    'title'       => esc_html__( 'Button Link', 'elasta' ),
    'placeholder' => esc_html__( 'http://', 'elasta' ),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'       => 'sbtn',
    'type'     => 'info',
    'style'    => 'info',
    'title'    => esc_html__( 'Second Button', 'elasta' ),
    'required' => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'btn_text',
    'type'        => 'text',
    'title'       => esc_html__( 'Button Text', 'elasta' ),
    'placeholder' => esc_html__( 'Sign up', 'elasta' ),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'btn_icon',
    'type'        => 'text',
    'title'       => esc_html__( 'Button Icon', 'elasta' ),
    'placeholder' => esc_html__( 'fa fa-comment-o', 'elasta' ),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'btn_link',
    'type'        => 'text',
    'title'       => esc_html__( 'Button Link', 'elasta' ),
    'placeholder' => esc_html__( 'http://', 'elasta' ),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'       => 'fbtnlink_info',
    'type'     => 'info',
    'style'    => 'info',
    'title'    => esc_html__( 'First Button Colors', 'elasta' ),
    'required' => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'fbutton_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Text Color', 'elasta' ),
    'output'      => array(
    'color' => '.header-right-btn .elst-trans-btn',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'fbutton_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Text Hover Color', 'elasta' ),
    'output'      => array(
    'color' => '.header-right-btn .elst-trans-btn:hover',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'fbutton_bg_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Background Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.header-right-btn .elst-trans-btn',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'fbutton_bg_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Background Hover Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.header-right-btn .elst-trans-btn:hover',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'fbutton_border_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Border Color', 'elasta' ),
    'output'      => array(
    'border-color' => '.header-right-btn .elst-trans-btn',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'fbutton_border_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Border Hover Color', 'elasta' ),
    'output'      => array(
    'border-color' => '.header-right-btn .elst-trans-btn:hover',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'       => 'sbtnlink_info',
    'type'     => 'info',
    'style'    => 'info',
    'title'    => esc_html__( 'Second Button Colors', 'elasta' ),
    'required' => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'sbutton_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Text Color', 'elasta' ),
    'output'      => array(
    'color' => '.header-right-btn .elst-black-btn',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'sbutton_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Text Hover Color', 'elasta' ),
    'output'      => array(
    'color' => '.header-right-btn .elst-black-btn:hover',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'sbutton_bg_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Background Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.header-right-btn .elst-black-btn',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'sbutton_bg_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Background Hover Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.header-right-btn .elst-black-btn:hover',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'sbutton_border_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Border Color', 'elasta' ),
    'output'      => array(
    'border-color' => '.header-right-btn .elst-black-btn',
),
    'required'    => array( 'need_content', '=', true ),
),
    array(
    'id'          => 'sbutton_border_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Button Border Hover Color', 'elasta' ),
    'output'      => array(
    'border-color' => '.header-right-btn .elst-black-btn:hover',
),
    'required'    => array( 'need_content', '=', true ),
)
),
) );
// Only for free users
if ( ela_fs()->is_free_plan() ) {
    // Title Bar
    Redux::setSection( $elasta_opt_name, array(
        'title'      => esc_html__( 'Title Bar', 'elasta' ),
        'id'         => 'theme_header_tab-banner',
        'icon'       => 'fa fa-bullhorn',
        'subsection' => true,
        'fields'     => array(
        array(
        'id'      => 'titlebar_style',
        'type'    => 'image_select',
        'title'   => esc_html__( 'Title Bar Styles', 'elasta' ),
        'options' => array(
        'one'   => array(
        'alt' => 'Style One',
        'img' => ELASTA_IMAGES . '/img/1.png',
    ),
        'two'   => array(
        'alt' => 'Style Two',
        'img' => ELASTA_IMAGES . '/img/2.png',
    ),
        'three' => array(
        'alt' => 'Style Three',
        'img' => ELASTA_IMAGES . '/img/3.png',
    ),
        'four'  => array(
        'alt' => 'Style Four',
        'img' => ELASTA_IMAGES . '/img/4.png',
    ),
        'five'  => array(
        'alt' => 'Style Five',
        'img' => ELASTA_IMAGES . '/img/5.png',
    ),
    ),
        'default' => 'one',
    ),
        array(
        'id'      => 'need_breadcrumb',
        'type'    => 'switch',
        'title'   => esc_html__( 'Need Breadcrumb', 'elasta' ),
        'default' => true,
    ),
        array(
        'id'          => 'title_color',
        'type'        => 'color',
        'transparent' => false,
        'title'       => esc_html__( 'Title Color', 'elasta' ),
        'output'      => array(
        'color' => '.elst-page-title h2',
    ),
    ),
        array(
        'id'          => 'title_bg_color',
        'type'        => 'color_rgba',
        'transparent' => false,
        'title'       => esc_html__( 'Overlay (or) Background Color', 'elasta' ),
        'output'      => array(
        'background-color' => '.elst-page-title, .elst-page-title.has-bg:after',
    ),
    )
    ),
    ) );
}
// is_premium
// Normal Menu
Redux::setSection( $elasta_opt_name, array(
    'title'      => esc_html__( 'Normal Menu', 'elasta' ),
    'id'         => 'header_color_section-normal',
    'icon'       => 'fa fa-crosshairs',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'          => 'header_bg',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Header Background', 'elasta' ),
    'output'      => array(
    'background-color' => 'header.elst-header[class*="header-style"]',
),
),
    array(
    'id'    => 'menu_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Main Menu Colors', 'elasta' ),
),
    array(
    'id'          => 'menu_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Menu Normal Color', 'elasta' ),
    'output'      => array(
    'color' => '.elst-navigation > ul > li > a',
),
),
    array(
    'id'          => 'menu_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Menu Hover (or) Active Color', 'elasta' ),
    'output'      => array(
    'color'        => '[class*="header-style"] .elst-navigation > ul > li:hover > a, [class*="header-style"] .elst-navigation > ul > li.current-menu-ancestor > a, [class*="header-style"] .elst-navigation > ul > li.active > a, .elst-fixed-wrap .elst-navigation > ul > li:hover > a, .elst-fixed-wrap .elst-navigation > ul > li.current-menu-ancestor > a, .elst-fixed-wrap .elst-navigation > ul > li.active > a',
    'border-color' => '.elst-navigation .nav-text .nav-dots, .elst-navigation .nav-text .nav-dots:before, .elst-navigation .nav-text .nav-dots:after',
),
),
    array(
    'id'    => 'submenu_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Sub Menu Colors', 'elasta' ),
),
    array(
    'id'          => 'submenu_bg_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Sub Menu Background Color', 'elasta' ),
    'output'      => array(
    'background-color'    => '.dropdown-nav',
    'border-bottom-color' => '.dropdown-nav:before',
),
),
    array(
    'id'          => 'submenu_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Sub Menu Normal Color', 'elasta' ),
    'output'      => array(
    'color' => '.elst-navigation ul .dropdown-nav li a',
),
),
    array(
    'id'          => 'submenu_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Sub Menu Hover Color', 'elasta' ),
    'output'      => array(
    'color' => '.dropdown-nav > li:hover > a, .dropdown-nav > li.active > a, .dropdown-nav .current_page_ancestor > a',
),
)
),
) );
// Mobile Menu
Redux::setSection( $elasta_opt_name, array(
    'title'      => esc_html__( 'Mobile Menu', 'elasta' ),
    'id'         => 'header_color_section-mobile',
    'icon'       => 'fa fa-crosshairs',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'    => 'mobile_menu_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Mobile Menu Colors', 'elasta' ),
),
    array(
    'id'          => 'mobile_menu_toggle_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Menu Toggle Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.mean-container a.meanmenu-reveal span, .mean-container a.meanmenu-reveal span:before, .mean-container a.meanmenu-reveal span:after, .mean-container a.meanmenu-reveal.meanclose span:before',
    'border-color'     => '.mean-container a.meanmenu-reveal',
),
),
    array(
    'id'          => 'mobile_menu_bg_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Menu Background Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.mean-container .mean-nav',
),
),
    array(
    'id'          => 'mobile_menu_border_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Menu Border Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.mean-container .dropdown-nav.normal-style .current-menu-parent > a, .mean-container .mean-nav ul li li a, .mean-nav .dropdown-nav li.active > a, .mean-container .mean-nav ul > li a',
),
),
    array(
    'id'    => 'mobile_menu_info_link',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Menu Link Colors', 'elasta' ),
),
    array(
    'id'          => 'mobile_menu_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Menu Normal Color', 'elasta' ),
    'output'      => array(
    'color' => '.mean-container .mean-nav ul li a',
),
),
    array(
    'id'          => 'mobile_menu_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Menu Hover Color', 'elasta' ),
    'output'      => array(
    'color' => '.mean-container .mean-nav > ul > li:hover > a, .mean-container .mean-nav > ul > li.current-menu-ancestor > a, .mean-container .mean-nav > ul > li.active > a, .mean-container .mean-nav .dropdown-nav > li:hover > a, .mean-container .mean-nav .dropdown-nav > li.active > a',
),
),
    array(
    'id'    => 'expand_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Menu Expand Color', 'elasta' ),
),
    array(
    'id'          => 'expand_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Expand Color', 'elasta' ),
    'output'      => array(
    'color' => '.mean-container .mean-nav ul li a.mean-expand',
),
),
    array(
    'id'          => 'expand_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Expand Hover Color', 'elasta' ),
    'output'      => array(
    'color' => '.mean-container .mean-nav ul li a.mean-expand:hover, .mean-container .mean-nav ul li a.mean-expand:focus, .mean-container .mean-nav ul li:hover > a.mean-expand, .mean-container .mean-nav ul li:focus > a.mean-expand, .elst-header .mean-container .dropdown-nav > li:hover > a.mean-expand, .elst-header .mean-container .dropdown-nav > li:focus > a.mean-expand',
),
),
    array(
    'id'          => 'expand_bg_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Expand Background Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.mean-container .mean-nav ul li a.mean-expand',
),
),
    array(
    'id'          => 'expand_bg_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Expand Background Hover Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.mean-container .mean-nav ul li a.mean-expand:hover, .mean-container .mean-nav ul li a.mean-expand:focus, .mean-container .mean-nav ul li:hover > a.mean-expand, .mean-container .mean-nav ul li:focus > a.mean-expand, .elst-header .mean-container .dropdown-nav > li:hover > a.mean-expand, .elst-header .mean-container .dropdown-nav > li:focus > a.mean-expand',
),
)
),
) );
// Only for free users
if ( ela_fs()->is_free_plan() ) {
    // Blog
    Redux::setSection( $elasta_opt_name, array(
        'title'  => esc_html__( 'Blog', 'elasta' ),
        'id'     => 'blog_section',
        'icon'   => 'fa fa-edit',
        'fields' => array( array(
        'id'       => 'blog_sidebar_position',
        'type'     => 'select',
        'title'    => esc_html__( 'Sidebar Position', 'elasta' ),
        'options'  => array(
        'sidebar-right' => esc_html__( 'Right', 'elasta' ),
        'sidebar-left'  => esc_html__( 'Left', 'elasta' ),
        'sidebar-hide'  => esc_html__( 'Hide', 'elasta' ),
    ),
        'default'  => 'sidebar-right',
        'desc'     => esc_html__( 'This style will apply, default blog pages - Like : Archive, Category, Tags, Search, Single & Author.', 'elasta' ),
        'subtitle' => esc_html__( 'Default option : Right', 'elasta' ),
    ), array(
        'id'       => 'blog_widget',
        'type'     => 'select',
        'title'    => esc_html__( 'Sidebar Widget', 'elasta' ),
        'data'     => 'sidebars',
        'desc'     => esc_html__( 'Default option : Main Widget Area', 'elasta' ),
        'required' => array( 'blog_sidebar_position', 'equals', array( 'sidebar-right', 'sidebar-left' ) ),
    ) ),
    ) );
}
// is_premium
// Content Colors
Redux::setSection( $elasta_opt_name, array(
    'title' => esc_html__( 'Content Colors', 'elasta' ),
    'id'    => 'content_section',
    'icon'  => 'fa fa-crosshairs',
) );
// Content Text
Redux::setSection( $elasta_opt_name, array(
    'title'      => esc_html__( 'Content Text', 'elasta' ),
    'id'         => 'content_text_section',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'    => 'cnt_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Body Content', 'elasta' ),
),
    array(
    'id'          => 'body_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Body & Content Text Color', 'elasta' ),
    'output'      => array(
    'color' => 'body, p, span, .elst-mid-wrap p, .elst-mid-wrap span, li, .news-info p, .news-detail-wrap p, .elst-post-single p, .bullets-list li',
),
),
    array(
    'id'          => 'body_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Body & Content Link Color', 'elasta' ),
    'output'      => array(
    'color' => 'a, .elst-mid-wrap a, .elst-mid-wrap ul li a, .elst-post-single a, .bullets-list li a, .elst-mid-wrap .elst-social a',
),
),
    array(
    'id'          => 'body_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Body & Content Link Hover Color', 'elasta' ),
    'output'      => array(
    'color' => 'a:hover, .elst-mid-wrap a:hover, .elst-mid-wrap ul li a:hover, .elst-post-single a:hover, .bullets-list li a:hover, .elst-mid-wrap .elst-social a:hover',
),
),
    array(
    'id'    => 'sidebor_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Sidebar Content', 'elasta' ),
),
    array(
    'id'          => 'sidebar_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Sidebar Text Color', 'elasta' ),
    'output'      => array(
    'color' => '.elst-secondary p, .elst-secondary .elst-widget, .elst-secondary .widget_rss .rssSummary, .elst-secondary .news-time, .elst-secondary .recentcomments, .elst-secondary input[type="text"], .elst-secondary .nice-select, .elst-secondary caption, .elst-secondary table td, .elst-secondary .elst-widget input[type="search"], .elst-widget ul li',
),
),
    array(
    'id'          => 'sidebar_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Sidebar Link Color', 'elasta' ),
    'output'      => array(
    'color' => '.elst-secondary a, .elst-mid-wrap .elst-secondary a, .elst-secondary .elst-widget ul li a, .elst-widget ul li a, .widget_list_style ul a, .widget_categories ul a, .widget_archive ul a, .widget_recent_comments ul a, .widget_recent_entries ul a, .widget_meta ul a, .widget_pages ul a, .widget_rss ul a, .widget_nav_menu ul a, .widget_layered_nav ul a, .post-widget .nav-tabs a.nav-link, .widget_product_categories ul a',
),
),
    array(
    'id'          => 'sidebar_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Sidebar Link Hover Color', 'elasta' ),
    'output'      => array(
    'color' => '.elst-secondary a:hover, .elst-widget ul li a:hover, .elst-widget ul li a:focus, .elst-mid-wrap .elst-secondary a:hover, .elst-mid-wrap .elst-secondary a:focus, .elst-secondary .elst-widget ul li a:hover, .widget_list_style ul a:hover, .widget_list_style ul a:focus, .widget_categories ul a:hover, .widget_categories ul a:focus, .widget_archive ul a:hover, .widget_archive ul a:focus, .widget_recent_comments ul a:hover, .widget_recent_comments ul a:focus, .widget_recent_entries ul a:hover, .widget_recent_entries ul a:focus, .widget_meta ul a:hover, .widget_meta ul a:focus, .widget_pages ul a:hover, .widget_pages ul a:focus, .post-widget .nav-tabs a.nav-link:hover, .post-widget .nav-tabs a.nav-link:focus, .post-widget .nav-tabs a.nav-link.active, .post-widget .nav-tabs a.nav-link.active:hover, .post-widget .nav-tabs a.nav-link.active:focus, .widget_rss ul a:hover, .widget_rss ul a:focus, .widget_nav_menu ul a:hover, .widget_nav_menu ul a:focus, .widget_layered_nav ul a:hover, .widget_layered_nav ul a:focus, .widget_product_categories ul a:hover, .widget_product_categories ul a:focus',
),
)
),
) );
// Headings
Redux::setSection( $elasta_opt_name, array(
    'title'      => esc_html__( 'Headings', 'elasta' ),
    'id'         => 'content_heading_section',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'    => 'bdy_heading_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Content Heading Color', 'elasta' ),
),
    array(
    'id'          => 'content_heading_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Content Heading', 'elasta' ),
    'output'      => array(
    'color' => 'h1,  h2,  h3,  h4,  h5,  h1, .elst-mid-wrap h1, .elst-mid-wrap h2, .elst-mid-wrap h3, .elst-mid-wrap h4, .elst-mid-wrap h5, .elst-mid-wrap h6, .elst-primary h1, .elst-primary h2, .elst-primary h3, .elst-primary h4, .elst-primary h5, .elst-primary h6, .meta-label, .elst-mid-wrap h2 span',
),
),
    array(
    'id'    => 'sidebor_heading_info',
    'type'  => 'info',
    'style' => 'info',
    'title' => esc_html__( 'Sidebar Heading Color', 'elasta' ),
),
    array(
    'id'          => 'sidebar_heading_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Sidebar Heading', 'elasta' ),
    'output'      => array(
    'color' => '.elst-secondary h1, .elst-secondary h2, .elst-secondary h3, .elst-secondary h4, .elst-secondary h5, .elst-secondary h6, .elst-widget .widget-title',
),
)
),
) );
// Footer
Redux::setSection( $elasta_opt_name, array(
    'title' => esc_html__( 'Footer', 'elasta' ),
    'id'    => 'footer_section',
    'icon'  => 'fa fa-bars',
) );
// Only for free users
if ( ela_fs()->is_free_plan() ) {
    // Widget Block
    Redux::setSection( $elasta_opt_name, array(
        'title'      => esc_html__( 'Widget Block', 'elasta' ),
        'id'         => 'footer_widget_section',
        'icon'       => 'fa fa-th',
        'subsection' => true,
        'fields'     => array(
        array(
        'id'      => 'footer_style',
        'type'    => 'image_select',
        'title'   => esc_html__( 'Footer Styles', 'elasta' ),
        'options' => array(
        'one'   => array(
        'alt' => 'Style One',
        'img' => ELASTA_IMAGES . '/img/1.png',
    ),
        'two'   => array(
        'alt' => 'Style Two',
        'img' => ELASTA_IMAGES . '/img/2.png',
    ),
        'three' => array(
        'alt' => 'Style Three',
        'img' => ELASTA_IMAGES . '/img/3.png',
    ),
        'four'  => array(
        'alt' => 'Style Four',
        'img' => ELASTA_IMAGES . '/img/4.png',
    ),
    ),
        'default' => 'one',
    ),
        array(
        'id'       => 'footer_dot',
        'type'     => 'checkbox',
        'title'    => esc_html__( 'Footer Widgets Dot Option', 'elasta' ),
        'subtitle' => esc_html__( 'Selected Widget Shows Dot.', 'elasta' ),
        'options'  => array(
        '1' => 'Widget 1',
        '2' => 'Widget 2',
        '3' => 'Widget 3',
        '4' => 'Widget 4',
    ),
        'default'  => array(
        '1' => '0',
        '2' => '1',
        '3' => '1',
        '4' => '1',
    ),
        'required' => array( 'footer_style', '=', 'one' ),
    ),
        array(
        'id'       => 'copyright_left',
        'type'     => 'ace_editor',
        'title'    => __( 'Copyright Left Shortcodes', 'elasta' ),
        'subtitle' => __( 'Enter Your shortcodes here.', 'elasta' ),
        'mode'     => 'html',
        'theme'    => 'monokai',
        'required' => array( 'header_style', '=', array( 'five', 'six' ) ),
        'default'  => '<p>&copy; 2020. NicheAddons</p>',
        'required' => array( 'footer_style', '=', array( 'three', 'four' ) ),
    ),
        array(
        'id'       => 'copyright_center',
        'type'     => 'ace_editor',
        'title'    => __( 'Copyright Center Shortcodes', 'elasta' ),
        'subtitle' => __( 'Enter Your shortcodes here.', 'elasta' ),
        'mode'     => 'html',
        'theme'    => 'monokai',
        'required' => array( 'footer_style', '=', array( 'four' ) ),
    ),
        array(
        'id'       => 'copyright_right',
        'type'     => 'ace_editor',
        'title'    => __( 'Copyright Right Shortcodes', 'elasta' ),
        'subtitle' => __( 'Enter Your shortcodes here.', 'elasta' ),
        'mode'     => 'html',
        'theme'    => 'monokai',
        'required' => array( 'header_style', '=', array( 'five', 'six' ) ),
        'default'  => '<ul><li><a href="#0">Privacy Policy</a></li><li><a href="#0">Terms & Conditions</a></li></ul>',
        'required' => array( 'footer_style', '=', array( 'three', 'four' ) ),
    )
    ),
    ) );
}
// is_premium
// Footer Colors
Redux::setSection( $elasta_opt_name, array(
    'title'      => esc_html__( 'Footer Colors', 'elasta' ),
    'id'         => 'footer_widget_colors',
    'icon'       => 'fa fa-crosshairs',
    'subsection' => true,
    'fields'     => array(
    array(
    'id'          => 'footer_bg_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Footer Background Color', 'elasta' ),
    'output'      => array(
    'background-color' => '.elst-footer',
),
),
    array(
    'id'          => 'footer_heading_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Footer Heading Color', 'elasta' ),
    'output'      => array(
    'color' => '.footer-widget h4, .elst-footer h1, .elst-footer h2, .elst-footer h3, .elst-footer h4, .footer-widget-title, .footer-widget .widget-title',
),
),
    array(
    'id'          => 'heading_dot_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Dot Color', 'elasta' ),
    'output'      => array(
    'background-color' => 'span.footer-wdot',
),
),
    array(
    'id'          => 'footer_text_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Footer Text Color', 'elasta' ),
    'output'      => array(
    'color' => 'footer.elst-footer .footer-widget-area, footer.elst-footer .footer-widget, footer.elst-footer .elst-widget p, footer.elst-footer .elst-widget p span, footer.elst-footer .elst-widget span, footer.elst-footer .elst-widget ul li, footer.elst-footer .footer-widget-area, footer.elst-footer .elst-widget p, footer.elst-footer .elst-recent-blog .widget-bdate, .elst-footer-wrap, footer.elst-footer table td, footer.elst-footer caption, .elst-footer .footer-item p, footer.elst-footer .elst-widget input[type="email"], .footer-widget .tp_recent_tweets ul li, footer.elst-footer .widget_archive ul li, .footer-widget.widget_calendar caption, .footer-widget .nice-select .current, .footer-widget .nice-select ul li, .footer-widget ul li, footer.elst-footer .widget_search form input[type="text"], .footer-widget p',
),
),
    array(
    'id'          => 'footer_link_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Footer Link Color', 'elasta' ),
    'output'      => array(
    'color' => 'footer.elst-footer a, footer.elst-footer .footer-widget .elst-widget ul li a, footer.elst-footer .elst-widget a span, footer.elst-footer .widget_list_style ul a, footer.elst-footer .widget_categories ul a, footer.elst-footer .widget_archive ul a, footer.elst-footer .widget_recent_comments ul a, footer.elst-footer .widget_recent_entries ul a, footer.elst-footer .widget_meta ul a, footer.elst-footer .widget_pages ul a, footer.elst-footer .widget_rss ul a, footer.elst-footer .widget_nav_menu ul a, footer.elst-footer table td a, .elst-footer ul li a, .elst-footer .footer-item a, footer.elst-footer .footer-widget .elst-widget ul li a, .footer-widget .tp_recent_tweets ul li a, .footer-widget.widget_calendar a',
),
),
    array(
    'id'          => 'footer_link_hover_color',
    'type'        => 'color',
    'transparent' => false,
    'title'       => esc_html__( 'Footer Link Hover Color', 'elasta' ),
    'output'      => array(
    'color' => 'footer.elst-footer a:hover, footer.elst-footer .footer-widget .elst-widget ul li a:hover, footer.elst-footer .elst-widget a:hover span, footer.elst-footer .widget_list_style ul a:hover, footer.elst-footer .widget_categories ul a:hover, footer.elst-footer .widget_archive ul a:hover, footer.elst-footer .widget_recent_comments ul a:hover, footer.elst-footer .widget_recent_entries ul a:hover, footer.elst-footer .widget_meta ul a:hover, footer.elst-footer .widget_pages ul a:hover, footer.elst-footer .widget_rss ul a:hover, footer.elst-footer .widget_nav_menu ul a:hover, footer.elst-footer table td a:hover, .elst-footer ul li a:hover, .elst-footer .footer-item a:hover, footer.elst-footer .footer-widget .elst-widget ul li a:hover, .footer-widget .tp_recent_tweets ul li a:hover, .footer-widget .tp_recent_tweets ul li a:focus, .footer-widget.widget_calendar a:hover, .footer-widget.widget_calendar a:focus',
),
)
),
) );
// Only for free users
if ( ela_fs()->is_free_plan() ) {
    // Copyright Block
    Redux::setSection( $elasta_opt_name, array(
        'title'      => esc_html__( 'Copyright Block', 'elasta' ),
        'id'         => 'copyright_section',
        'icon'       => 'fa fa-copyright',
        'subsection' => true,
        'fields'     => array(
        array(
        'id'          => 'copyright_bg_color',
        'type'        => 'color',
        'transparent' => false,
        'title'       => esc_html__( 'Copyright Background Color', 'elasta' ),
        'output'      => array(
        'background-color' => '.elst-copyright',
    ),
    ),
        array(
        'id'          => 'copyright_border_color',
        'type'        => 'color',
        'transparent' => false,
        'title'       => esc_html__( 'Copyright Border Color', 'elasta' ),
        'output'      => array(
        'border-color' => '.elst-copyright',
    ),
    ),
        array(
        'id'          => 'copyright_text_color',
        'type'        => 'color',
        'transparent' => false,
        'title'       => esc_html__( 'Copyright Text Color', 'elasta' ),
        'output'      => array(
        'color' => '.alt-copyright p, .elst-copyright, .elst-footer .elst-copyright .copyright-wrap p, .elst-footer .elst-copyright .copyright-links li',
    ),
    ),
        array(
        'id'          => 'copyright_link_color',
        'type'        => 'color',
        'transparent' => false,
        'title'       => esc_html__( 'Copyright Link Color', 'elasta' ),
        'output'      => array(
        'color' => 'footer.elst-footer .elst-copyright a',
    ),
    ),
        array(
        'id'          => 'copyright_link_hover_color',
        'type'        => 'color',
        'transparent' => false,
        'title'       => esc_html__( 'Copyright Link Hover Color', 'elasta' ),
        'output'      => array(
        'color' => 'footer.elst-footer .elst-copyright a:hover',
    ),
    )
    ),
    ) );
}
// is_premium
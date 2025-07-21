<?php

/**
 * Nav walker class based on bootstrap 4.
 */
class DFABA_Walker extends Walker_Nav_Menu {
    
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $object      = $item->object;
        $type        = $item->type;
        $title       = $item->title;
        $description = $item->description;
        $permalink   = $item->url;

        $active_class = '';
        if( in_array('current-menu-item', $item->classes) ) {
            $active_class = ' active';
        }

        $dropdown_class = '';
        if( $args->walker->has_children && $depth == 0 ) {
            $dropdown_class = ' dropdown';
            $dropdown_link_class = ' dropdown-toggle';
        }

        $menuid = 'menu-item-'. $item->ID;
        $output .= '<li class="nav-item' . $active_class . $dropdown_class . implode(" ", $item->classes) . '" id="' . $menuid . '">';
        if( $args->walker->has_children && $depth == 0 ) {
            $output .= '<a class="nav-link' . $dropdown_link_class . '" href="' . esc_url($permalink) . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        } elseif ( $depth !== 0 ) {
            $output .= '<a role="menuitem" class="nav-link dropdown-item" href="' . esc_url($permalink) . '">';
        } else {
            $output .= '<a role="menuitem" class="nav-link" href="' . esc_url($permalink) . '">';
        }

        $output .= $title;
        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }
        $output .= '</a>';
    }

    function start_lvl( &$output, $depth=0, $args = array() ){
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= '<ul class="dropdown-menu ' . $submenu . 'depth_' . $depth . '">';
}

}
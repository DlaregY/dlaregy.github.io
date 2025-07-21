<?php

// Only for free users
if ( ela_fs()->is_free_plan() ) {
    $mobile_logo_class = '';
}
// is_premium
$elasta_custom_logo_id = get_theme_mod( 'custom_logo' );
$elasta_logo = wp_get_attachment_image_url( $elasta_custom_logo_id, 'full' );

if ( has_custom_logo() ) {
    $elasta_logo_class = ' has-logo';
} else {
    $elasta_logo_class = '';
}


if ( get_header_textcolor() ) {
    $elasta_tag_color = ' style = color:#' . get_header_textcolor() . ';';
} else {
    $elasta_tag_color = '';
}

?>
<div class="elst-brand<?php 
echo  esc_attr( $elasta_logo_class . $mobile_logo_class ) ;
?>">
	<a href="<?php 
echo  esc_url( home_url( '/' ) ) ;
?>">
	<?php 

if ( has_custom_logo() ) {
    echo  '<img src="' . esc_url( $elasta_logo ) . '" class="desk-logo" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">' ;
} elseif ( display_header_text() == true ) {
    if ( get_bloginfo( 'name' ) ) {
        echo  '<h1 class="elst-text-logo">' . esc_html( get_bloginfo( 'name' ) ) . '</h1>' ;
    }
    if ( get_bloginfo( 'description' ) ) {
        echo  '<h2 class="elst-site-tagline"' . esc_attr( $elasta_tag_color ) . '>' . esc_html( get_bloginfo( 'description' ) ) . '</h2>' ;
    }
}

// is_premium
?>
	</a>
</div>

<?php

if ( has_header_image() ) {
    $bg_class = ' has-bg';
} else {
    $bg_class = '';
}

global  $elasta_redux_options ;
$titlebar_style = ( isset( $elasta_redux_options['titlebar_style'] ) ? $elasta_redux_options['titlebar_style'] : '' );
$need_breadcrumb = ( isset( $elasta_redux_options['need_breadcrumb'] ) ? $elasta_redux_options['need_breadcrumb'] : '' );
$style_class = ( $titlebar_style ? ' title-style-' . $titlebar_style : '' );

if ( is_singular( 'post' ) ) {
    $elasta_large_image = wp_get_attachment_image_src(
        get_post_thumbnail_id( get_the_ID() ),
        'fullsize',
        false,
        ''
    );
    $elasta_large_image = $elasta_large_image[0];
    
    if ( $elasta_large_image ) {
        $bg_class = ' has-bg';
    } else {
        $bg_class = '';
    }
    
    ?>
<!-- Elasta Page Title -->
<div class="elst-page-title elst-single-title<?php 
    echo  esc_attr( $bg_class ) ;
    ?>" style="background-image: url(<?php 
    echo  esc_url( $elasta_large_image ) ;
    ?>)">
  <div class="container">
  	<div class="elst-news-cats">
	    <?php 
    $elasta_categories = get_the_category();
    if ( $elasta_categories ) {
        foreach ( $elasta_categories as $elasta_category ) {
            ?>
          <a href="<?php 
            echo  esc_url( get_category_link( $elasta_category->term_id ) ) ;
            ?>"><?php 
            echo  esc_html( $elasta_category->name ) ;
            ?></a>
        <?php 
        }
    }
    ?>
  	</div>
    <h2 class="page-title"><?php 
    elasta_title_area();
    ?></h2>
    <div class="elst-news-btm-meta">
			<span><?php 
    echo  esc_html( get_the_date() ) ;
    ?></span>
  		<span><?php 
    esc_html_e( ' By', 'elasta' );
    ?> <a href="<?php 
    echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID', $wp_query->post->post_author ) ) ) ;
    ?>"><?php 
    echo  esc_html( get_the_author_meta( 'display_name', $wp_query->post->post_author ) ) ;
    ?></a></span>
  	</div>
  </div>
</div>
<?php 
} else {
    // Only for free users
    
    if ( ela_fs()->is_free_plan() ) {
        ?>
  <div class="elst-page-title<?php 
        echo  esc_attr( $bg_class . $style_class ) ;
        ?>" style="background-image: url(<?php 
        header_image();
        ?>)">
    <div class="container">
      <?php 
        
        if ( $titlebar_style == 'three' ) {
            ?>
        <h2 class="page-title" page-title="<?php 
            echo  esc_attr( elasta_title_area() ) ;
            ?>"><?php 
            elasta_title_area();
            ?></h2>
      <?php 
        } elseif ( $titlebar_style == 'four' ) {
            ?>
        <h2 class="page-title"><?php 
            elasta_title_area();
            ?><span></span></h2>
      <?php 
        } else {
            ?>
        <h2 class="page-title"><?php 
            elasta_title_area();
            ?></h2>
      <?php 
        }
        
        ?>
      <?php 
        if ( $need_breadcrumb ) {
            if ( function_exists( 'breadcrumb_trail' ) ) {
                breadcrumb_trail();
            }
        }
        ?>
    </div>
  </div>
<?php 
    }
    
    // is_premium
}

<?php

/**
 * Template part for displaying posts.
 */
global  $elasta_redux_options ;
global  $post ;
$elasta_large_image = wp_get_attachment_image_src(
    get_post_thumbnail_id( get_the_ID() ),
    'fullsize',
    false,
    ''
);
$elasta_large_image = $elasta_large_image[0];

if ( is_sticky() ) {
    $elasta_sticky_class = ' sticky';
} else {
    $elasta_sticky_class = '';
}


if ( $elasta_large_image ) {
    $elasta_img_class = '';
} else {
    $elasta_img_class = ' no-img';
}

// Only for free users

if ( ela_fs()->is_free_plan() ) {
    ?>
	<div class="elst-news-item<?php 
    echo  esc_attr( $elasta_sticky_class . $elasta_img_class ) ;
    ?>">
		<div id="post-<?php 
    the_ID();
    ?>" <?php 
    post_class( 'elst-blog-post' );
    ?>>
			<?php 
    
    if ( $elasta_large_image ) {
        ?>
			  <div class="elst-image">
			    <a href="<?php 
        echo  esc_url( get_permalink() ) ;
        ?>"><?php 
        the_post_thumbnail();
        ?></a>
			  </div>
			<?php 
    }
    
    ?>
		  <div class="elst-news-info">
		    <div class="elst-news-meta">
		      <div class="row">
		        <div class="col-md-12">
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
		        	<?php 
    the_title( '<h3 class="elst-news-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
    ?>
		        </div>
		      </div>
		    </div>
		    <?php 
    echo  '<div class="elst-news-info-content">' ;
    the_excerpt();
    echo  '</div>' ;
    wp_link_pages( array(
        'before'         => '<div class="wp-link-pages">' . esc_html__( 'Pages:', 'elasta' ),
        'after'          => '</div>',
        'link_before'    => '<span>',
        'link_after'     => '</span>',
        'next_or_number' => 'number',
        'separator'      => ' ',
        'pagelink'       => '%',
        'echo'           => 1,
    ) );
    ?>
				<div class="elst-news-btm-meta">
					<span><?php 
    echo  esc_html( get_the_date() ) ;
    ?></span>
		  		<span><?php 
    esc_html_e( ' By', 'elasta' );
    ?> <a href="<?php 
    echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ;
    ?>"><?php 
    echo  esc_html( get_the_author() ) ;
    ?></a></span>
		  	</div>
		    <div class="elst-btn-wrap">
		      <a href="<?php 
    echo  esc_url( get_permalink() ) ;
    ?>" class="elst-btn elst-small-btn"><?php 
    esc_html_e( 'Read More', 'elasta' );
    ?></a>
		    </div>
		  </div>
		</div>
	</div>
	<!-- #post-## -->
<?php 
}

// is_premium
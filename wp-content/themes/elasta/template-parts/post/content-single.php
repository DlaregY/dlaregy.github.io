<?php

/**
 * Single Post.
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
// Single Theme Option

if ( $elasta_large_image ) {
    $img_class = '';
} else {
    $img_class = ' no-img';
}

$cat_list = get_the_category();
$tag_list = get_the_tags();
// Only for free users

if ( ela_fs()->is_free_plan() ) {
    ?>
	<div id="post-<?php 
    the_ID();
    ?>" <?php 
    post_class( 'elst-blog-post' );
    ?>>
		<div class="elst-news-detail no-img">
			<div class="elst-news-detail-wrap">
		    <!-- Content -->
				<?php 
    the_content();
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
				<!-- Content -->
				<div class="single-news-meta">
					<div class="row">
						<div class="col-md-6">
							<?php 
    if ( function_exists( 'elasta_wp_share_option' ) ) {
        elasta_wp_share_option();
    }
    ?>
						</div>
						<div class="col-md-6">
							<?php 
    $tags = get_the_tags();
    
    if ( $tags ) {
        ?>
				        <div class="news-meta-tags">
						      <?php 
        foreach ( $tags as $post_tag ) {
            ?>
					          <span class="meta-tag"><a href="<?php 
            echo  esc_url( get_tag_link( $post_tag->term_id ) ) ;
            ?>"><?php 
            echo  esc_html( $post_tag->name ) ;
            ?></a></span>
						      <?php 
        }
        ?>
				        </div>
				      <?php 
    }
    
    ?>
						</div>
					</div>
	      </div>
			</div>
	  </div>
		<!-- Author Info -->
		<?php 
    
    if ( get_the_author_meta( 'url' ) ) {
        $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
        $weburl_site = get_the_author_meta( 'url' );
        $target = 'target="_blank"';
    } else {
        $author_url = get_author_posts_url( get_the_author_meta( 'ID' ) );
        $weburl_site = get_author_posts_url( get_the_author_meta( 'ID' ) );
        $target = '';
    }
    
    $author_content = get_the_author_meta( 'description' );
    
    if ( $author_content ) {
        ?>
	    <div class="elst-author-info">
	      <div class="author-content">
	        <a href="<?php 
        echo  esc_url( $author_url ) ;
        ?>" class="author-name"><?php 
        echo  esc_html( get_the_author_meta( 'first_name' ) ) . ' ' . esc_html( get_the_author_meta( 'last_name' ) ) ;
        ?></a>
	        <p><?php 
        echo  esc_html( get_the_author_meta( 'description' ) ) ;
        ?></p>
	      </div>
	    </div>
	  <?php 
    }
    
    ?>
	</div><!-- #post-## -->
<?php 
}

// is_premium
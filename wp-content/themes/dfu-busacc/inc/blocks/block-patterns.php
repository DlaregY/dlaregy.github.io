<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package DFU_Business_Accelerator
 * @since Dfu-busacc 1.1.4
 *******************************************************************************************************************************************/

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

    register_block_pattern_category(
		'dfu-busacc',
		array( 'label' => esc_html__( 'DFU Business Accelerator', 'dfu-busacc' ) )
	);
}

/**
 * Register Block Patterns.
 *******************************************************************************************************************************************/
if ( function_exists( 'register_block_pattern' ) ) {

    $dfu_busacc_email = get_theme_mod('dba_bus_email', 'info@yourdomain.com');
    $dfu_busacc_phoneno = get_theme_mod('dba_bus_phone', '0123-222-333');
    $dfu_busacc_addr1 = get_theme_mod('dba_bus_address1', 'Address line 1');
    $dfu_busacc_addr2 = get_theme_mod('dba_bus_address2', 'Address line 2');

    register_block_pattern(
      'dfu-busacc/contact-information1',
      array(
        'title'       => esc_html__( 'Simple contact information (set up in Customiser)', 'dfu-busacc' ),
        'categories'  => array( 'dfu-busacc' ),
        'keywords'         => array( 'social', 'contact' ),
        'description' => esc_html_x( 'A simple block that display contact information. Contact information can be set in Customiser, in Business under Theme Setup and Options.', 'Block pattern description', 'dfu-busacc' ),
        'content'     => '
          <!-- wp:group -->
          <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading -->
          <h2>' . esc_html_x( 'Contact Us', 'Block pattern sample heading', 'dfu-busacc' ) . '</h2>
          <!-- /wp:heading -->
          
          <!-- wp:paragraph -->
          <p><a href="mailto:info@yourdomain.com" data-type="mailto" data-id="mailto:' . esc_html( $dfu_busacc_email ) . '">' . esc_html( $dfu_busacc_email ) . '</a><br><a href="tel:' . esc_html( $dfu_busacc_phoneno ) . '">' . esc_html( $dfu_busacc_phoneno ) . '</a><br>' . esc_html( $dfu_busacc_addr1 ) . '<br>' . esc_html( $dfu_busacc_addr2 ) . '</p>
          <!-- /wp:paragraph -->
          
          <!-- wp:social-links {"className":"is-style-dfu-busacc-theme-social-icons is-style-dfu-busacc-theme-social-icons-primary"} -->
          <ul class="wp-block-social-links is-style-dfu-busacc-theme-social-icons is-style-dfu-busacc-theme-social-icons-primary"><!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->
          
          <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /--></ul>
          <!-- /wp:social-links --></div></div>
          <!-- /wp:group -->',
      )
    );

    register_block_pattern(
      'dfu-busacc/contact-information2',
      array(
        'title'       => esc_html__( 'Contact information (set up in Customiser) in table', 'dfu-busacc' ),
        'categories'  => array( 'dfu-busacc' ),
        'keywords'         => array( 'social', 'contact' ),
        'description' => esc_html_x( 'A block that display contact information in a table. Contact information can be set in Customiser, in Business under Theme Setup and Options.', 'Block pattern description', 'dfu-busacc' ),
        'content'     => '
          <!-- wp:group -->
          <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading -->
          <h2>' . esc_html_x( 'Contact Us', 'Block pattern sample heading', 'dfu-busacc' ) . '</h2>
          <!-- /wp:heading -->
          
          <!-- wp:group -->
          <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:table {"className":"is-style-dfu-busacc-theme-borderless-narrow-first-col-table"} -->
          <figure class="wp-block-table is-style-dfu-busacc-theme-borderless-narrow-first-col-table">
          <table><tbody>
          <tr><td>Email</td><td><a href="mailto:' . esc_html( $dfu_busacc_email ) . '">' . esc_html( $dfu_busacc_email ) . '</a></td></tr>
          <tr><td>Phone</td><td><a href="tel:' . esc_html( $dfu_busacc_phoneno ) . '">' . esc_html( $dfu_busacc_phoneno ) . '</a></td></tr>
          <tr><td>Address</td><td>' . esc_html( $dfu_busacc_addr1 ) . '<br>' . esc_html( $dfu_busacc_addr2 ) . '</td></tr>
          </tbody></table></figure>
          <!-- /wp:table -->
          <!-- wp:social-links {"className":"is-style-dfu-busacc-theme-social-icons is-style-dfu-busacc-theme-social-icons-theme-button"} -->
          <ul class="wp-block-social-links is-style-dfu-busacc-theme-social-icons is-style-dfu-busacc-theme-social-icons-theme-button">
          <!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->
          <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /--></ul>
          <!-- /wp:social-links -->
          </div></div>
          <!-- /wp:group --></div></div>
          <!-- /wp:group -->',
      )
    );

    register_block_pattern(
      'dfu-busacc/contact-information3',
      array(
        'title'       => esc_html__( 'Contact information (set up in Customiser) in table with fontawesome icons', 'dfu-busacc' ),
        'categories'  => array( 'dfu-busacc' ),
        'keywords'         => array( 'social', 'contact' ),
        'description' => esc_html_x( 'A block that display contact information in a table. Contact information can be set in Customiser, in Business under Theme Setup and Options > Business', 'Block pattern description', 'dfu-busacc' ),
        'content'     => '
          <!-- wp:group -->
          <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading -->
          <h2>' . esc_html_x( 'Contact Us', 'Block pattern sample heading', 'dfu-busacc' ) . '</h2>
          <!-- /wp:heading -->
          
          <!-- wp:group -->
          <div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:table {"className":"is-style-dfu-busacc-theme-borderless-narrow-first-col-table"} -->
          <figure class="wp-block-table is-style-dfu-busacc-theme-borderless-narrow-first-col-table">
          <table><tbody>
          <tr><td><i class="far fa-envelope fa-fw dba-fa-contact-ico"></i></td><td><a href="mailto:' .esc_html( $dfu_busacc_email ) . '">' . esc_html( $dfu_busacc_email ) . '</a></td></tr>
          <tr><td><i class="fas fa-phone fa-fw dba-fa-contact-ico"></i></td><td><a href="tel:' . esc_html( $dfu_busacc_phoneno ) . '">' . esc_html( $dfu_busacc_phoneno ) . '</a></td></tr>
          <tr><td><i class="fas fa-map-marker-alt fa-fw dba-fa-contact-ico"></i></td><td>' . esc_html( $dfu_busacc_addr1 ) . '<br>' . esc_html( $dfu_busacc_addr2 ) . '</td></tr>
          </tbody></table></figure>
          <!-- /wp:table -->
          <!-- wp:social-links {"className":"is-style-dfu-busacc-theme-social-icons is-style-dfu-busacc-theme-social-icons-theme-button"} -->
          <ul class="wp-block-social-links is-style-dfu-busacc-theme-social-icons is-style-dfu-busacc-theme-social-icons-theme-button">
          <!-- wp:social-link {"url":"https://www.facebook.com/","service":"facebook"} /-->
          <!-- wp:social-link {"url":"https://www.instagram.com/","service":"instagram"} /--></ul>
          <!-- /wp:social-links -->
          </div></div>
          <!-- /wp:group --></div></div>
          <!-- /wp:group -->',
      )
    );


}


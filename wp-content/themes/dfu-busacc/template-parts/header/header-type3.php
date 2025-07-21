<?php
$dfu_busacc_headerwidth = get_theme_mod( 'dba_header_width', 'container' );
?>
<div id="mainnav" class="site-mainnav">
	<div id="menu-container" class="<?php echo esc_attr( $dfu_busacc_headerwidth ); ?>">
		<?php
		$dfu_busacc_stickymenu = get_theme_mod( 'dba_stickymenu', false );
		$dfu_busacc_stickylogo = get_theme_mod( 'dba_stickymenu_logo', false );
		$dfu_busacc_attr = array( 'type' => 3, 'itemscope' => 'itemscope', 'itemtype' => 'https://schema.org/Organization', 'itemid' => esc_url( home_url() . '/' . '#organization' ) );
		?>
		<span <?php echo apply_filters( 'dfu_busacc_f_org_microdata', 'itemscope="' . esc_attr( $dfu_busacc_attr['itemscope'] ) . '" itemtype="' . esc_url( $dfu_busacc_attr['itemtype'] ) . '" itemid="' . esc_attr( $dfu_busacc_attr['itemid'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> id="organization">
			<meta itemprop="name" content="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>">
			<?php
			$dfu_busacc_site_description = get_bloginfo( 'description', 'display' );
			if ( $dfu_busacc_site_description ) {
			?>
			<meta itemprop="slogan" content="<?php echo esc_html( $dfu_busacc_site_description ); ?>">
			<?php
			}
			?>
		</span>
		<nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'dfu-busacc' ); ?>">
			<?php
			wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
			?>
		</nav><!-- #site-navigation -->
	</div><!-- container -->                  
</div><!-- #mainnav -->

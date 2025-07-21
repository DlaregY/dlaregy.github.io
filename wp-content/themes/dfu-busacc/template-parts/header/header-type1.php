<?php
$dfu_busacc_headerwidth = get_theme_mod( 'dba_header_width', 'container' );
?>
<div id="mainnav" class="site-mainnav">
	<div id="menu-container" class="<?php echo esc_attr( $dfu_busacc_headerwidth ); ?>">
		<?php
		$dfu_busacc_stickymenu = get_theme_mod( 'dba_stickymenu', false );
		$dfu_busacc_attr = array( 'type' => 3, 'itemscope' => 'itemscope', 'itemtype' => 'https://schema.org/Organization', 'itemid' => esc_url( home_url() . '/' . '#organization' ) );

		if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
		?>
			<nav id="site-navigation" class="navbar" aria-label="<?php esc_attr_e( 'Main Menu', 'dfu-busacc' ); ?>">
				<div <?php echo apply_filters( 'dfu_busacc_f_org_microdata', 'itemscope="' . esc_attr( $dfu_busacc_attr['itemscope'] ) . '" itemtype="' . esc_url( $dfu_busacc_attr['itemtype'] ) . '" itemid="' . esc_attr( $dfu_busacc_attr['itemid'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> id="organization" class="navbar-brand">
					<a id="homepage"<?php echo ( has_custom_logo() ? ' class="site-logo"' : '' ); ?> itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
					<?php
					$dfu_busacc_site_description = get_bloginfo( 'description', 'display' );
					if ( has_custom_logo() ) {
						$dfu_busacc_customlogoid = get_theme_mod( 'custom_logo' );
						$dfu_busacc_sizes = '100vw';
						dfu_busacc_fn_get_responsive_img_display( true, $dfu_busacc_customlogoid, $dfu_busacc_sizes, 'full', 'logo' );
						?>
						<meta itemprop="name" content="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>">
						<?php
						if ( $dfu_busacc_site_description ) :
						?>
						<meta itemprop="slogan" content="<?php echo esc_html( $dfu_busacc_site_description ); ?>">
						<?php
						endif;
					} else {
						if ( is_front_page() ) {
						?>
							<h1 itemprop="name" class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
						<?php
						} else {
						?>
							<div itemprop="name" class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
						<?php
						}
						if ( $dfu_busacc_site_description || is_customize_preview() ) :
						?>
							<div itemprop="slogan" class="site-description"><?php echo esc_html( $dfu_busacc_site_description ); ?></div>
						<?php
						endif;
					}
					?>
					</a>
				</div><!-- .navbar-brand -->

				<?php
				wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
				?>
			</nav><!-- #site-navigation -->
		<?php
		} else {
			$dfu_busacc_breakpt = get_theme_mod( 'dba_menu_mob_breakpt', 'md' );
			?>
			
			<nav id="site-navigation" class="navbar navbar-expand-<?php echo esc_attr( $dfu_busacc_breakpt ); ?> navbar-<?php echo esc_attr( get_theme_mod( 'dba_menu_text', 'light' ) ); ?> dba-navbar-custom" aria-label="<?php esc_attr_e( 'Main Menu', 'dfu-busacc' ); ?>">
				<div <?php echo apply_filters( 'dfu_busacc_f_org_microdata', 'itemscope="' . esc_attr( $dfu_busacc_attr['itemscope'] ) . '" itemtype="' . esc_url( $dfu_busacc_attr['itemtype'] ) . '" itemid="' . esc_attr( $dfu_busacc_attr['itemid'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> id="organization" class="navbar-brand">
					<a id="homepage"<?php echo ( has_custom_logo() ? ' class="site-logo"' : '' ); ?> itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
					<?php
					$dfu_busacc_site_description = get_bloginfo( 'description', 'display' );
					if ( has_custom_logo() ) {
						$dfu_busacc_customlogoid = get_theme_mod( 'custom_logo' );
						$dfu_busacc_sizes = '100vw';
						dfu_busacc_fn_get_responsive_img_display( true, $dfu_busacc_customlogoid, $dfu_busacc_sizes, 'full', 'logo' );
						?>
						<span itemprop="name" class="d-none"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
						<?php
						if ( $dfu_busacc_site_description ) :
						?>
							<span itemprop="slogan" class="d-none"><?php echo esc_html( $dfu_busacc_site_description ); ?></span>
						<?php
						endif;
					} else {
						if ( is_front_page() ) {
						?>
							<h1 itemprop="name" class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
						<?php
						} else {
						?>
							<div itemprop="name" class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></div>
						<?php
						}
						if ( $dfu_busacc_site_description || is_customize_preview() ) :
						?>
							<div itemprop="slogan" class="site-description"><?php echo esc_html( $dfu_busacc_site_description ); ?></div>
						<?php
						endif;
					}
					?>
					</a>
				</div><!-- .navbar-brand -->

				<button class="navbar-toggler dba-toggler" type="button" data-toggle="collapse" data-target="#dba-primary-navbar-collapse" aria-controls="dba-primary-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="dba-toggler-icon">&nbsp;</span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location'    => 'main-menu',
						'menu_id'           => 'dba-mainmenu',
						'container'         => 'div',
						'items_wrap' 		=> '<ul id="%1$s" class="%2$s" role="menu">%3$s</ul>',
						'depth'             => 2,
						'container_class'   => 'collapse navbar-collapse justify-content-' . get_theme_mod( 'dba_menu_align1', 'start' ),
						'container_id'      => 'dba-primary-navbar-collapse',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'     	=> '__return_false',
						'walker'          	=> new DFABA_Walker()
					)
				);
				?>
			</nav><!-- #site-navigation -->
		<?php
		}
		?>
	</div><!-- container -->                  
</div><!-- #mainnav -->

<?php
$dfu_busacc_attr = array( 'type' => 3, 'itemscope' => 'itemscope', 'itemtype' => 'https://schema.org/Organization', 'itemid' => esc_url( home_url() . '/' . '#organization' ) );
$dfu_busacc_headerwidth = get_theme_mod( 'dba_header_width', 'container' );
?>
<div id="siteinfo" class="site-info">
	<div class="<?php echo esc_attr( $dfu_busacc_headerwidth ); ?>">
		<div class="row">
			<div class="col-auto">
				<div <?php echo apply_filters( 'dfu_busacc_f_org_microdata', 'itemscope="' . esc_attr( $dfu_busacc_attr['itemscope'] ) . '" itemtype="' . esc_url( $dfu_busacc_attr['itemtype'] ) . '" itemid="' . esc_attr( $dfu_busacc_attr['itemid'] ) . '"' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?> id="organization" class="navbar-brand">
					<a id="homepage"<?php echo ( has_custom_logo() ? ' class="site-logo"' : '' ); ?> itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
					<?php
					$dfu_busacc_site_description = get_bloginfo( 'description', 'display' );
					if ( has_custom_logo() ) {
						$dfu_busacc_customlogoid = get_theme_mod( 'custom_logo' );
						$dfu_busacc_sizes = '100vw';
						$dfu_busacc_logo = dfu_busacc_fn_get_responsive_img_display( false, $dfu_busacc_customlogoid, $dfu_busacc_sizes, 'full', 'logo' );
						echo $dfu_busacc_logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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
							<div itemprop="slogan" class="site-description"><?php echo esc_html($dfu_busacc_site_description); ?></div>
						<?php
						endif;
					}
					?>
					</a>
				</div><!-- .navbar-brand -->
			</div><!-- col -->
			<div class="ml-auto col">
				<?php
				$dfu_busacc_header2widgets = 'dba-headertype2-sidebar';
				if ( is_active_sidebar( $dfu_busacc_header2widgets ) ) {
					dynamic_sidebar( $dfu_busacc_header2widgets );
				}
				?>
			</div><!-- col -->
		</div><!-- row -->
	</div><!-- container -->   
</div><!-- siteinfo -->

<div id="mainnav" class="site-mainnav">
	<div id="menu-container" class="<?php echo esc_attr( $dfu_busacc_headerwidth ); ?>">
		<?php
		$dfu_busacc_stickymenu = get_theme_mod( 'dba_stickymenu', false );
		$dfu_busacc_stickylogo = get_theme_mod( 'dba_stickymenu_logo', false );
		if ( $dfu_busacc_stickymenu && $dfu_busacc_stickylogo && has_custom_logo() ) {
			$dfu_busacc_addbtnclass = '';
		} else {
			$dfu_busacc_addbtnclass = ' justify-content-end';
		}

		if ( class_exists( 'Mega_Menu' ) && max_mega_menu_is_enabled( 'main-menu' ) ) {
		?>
			<nav id="site-navigation" class="navbar<?php echo esc_attr( $dfu_busacc_addbtnclass ); ?>" aria-label="<?php esc_attr_e( 'Main Menu', 'dfu-busacc' ); ?>">
				<?php
				if ( $dfu_busacc_stickymenu && $dfu_busacc_stickylogo && has_custom_logo() ) {
				?>
				<a id="sticky-logo" itemprop="url" class="navbar-brand dba-stickylogo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
					<?php echo $dfu_busacc_logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</a>
				<?php
				}
				?>
				<?php
				wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
				?>
			</nav><!-- #site-navigation -->
		<?php
		} else {
			$dfu_busacc_breakpt = get_theme_mod( 'dba_menu_mob_breakpt', 'md' );
			?>

			<nav id="site-navigation" class="navbar navbar-expand-<?php echo esc_attr( $dfu_busacc_breakpt ); ?> navbar-<?php echo esc_attr( get_theme_mod( 'dba_menu_text', 'light' ) ); ?> dba-navbar-custom<?php echo esc_attr( $dfu_busacc_addbtnclass ); ?>" aria-label="<?php esc_attr_e( 'Main Menu', 'dfu-busacc' ); ?>">
			<?php
			if ( $dfu_busacc_stickymenu && $dfu_busacc_stickylogo && has_custom_logo() ) {
			?>
			<a id="sticky-logo" itemprop="url" class="navbar-brand dba-stickylogo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
				<?php echo $dfu_busacc_logo; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
			<?php
			}
			?>

			<button class="navbar-toggler dba-toggler" type="button" data-toggle="collapse" data-target="#dba-primary-navbar-collapse" aria-controls="dba-primary-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="dba-toggler-icon">&nbsp;</span>
			</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location'    => 'main-menu',
					'menu_id'           => 'dba-mainmenu',
					'container'         => 'div',
					'depth'             => 2,
					'container_class'   => 'collapse navbar-collapse justify-content-' . get_theme_mod( 'dba_menu_align2', 'start' ),
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

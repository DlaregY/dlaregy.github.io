<form role="search" method="get" class="dba-search-form my-1" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input id="search-input" type="search" class="form-control dba-search-field" size="15" placeholder="<?php echo esc_attr_x( 'Search text...', 'placeholder', 'dfu-busacc' ); ?>"
		aria-label="<?php echo esc_attr_x( 'Enter search text', 'Text to search on', 'dfu-busacc' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Enter search text', 'Text to search on', 'dfu-busacc' ); ?>" />
		<div class="input-group-append">
			<input type="submit" class="btn dba-search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'dfu-busacc' ); ?>" />
		</div>
	</div>
</form>


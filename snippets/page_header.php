<header class="entry-header text-center py-3 mb-3">
	<?php if ( is_tax() ) {
		single_term_title( '<h1 class="h1 page-title pt-5 mb-0">', '</h1>' );
	} else if ( is_search() ) { ?>
		<h1 class="h1 page-title pt-5 mb-0">
		<?php printf( /* translators: %s: query term */
				esc_html__( 'Search Results for: %s', 'understrap' ),
				'<span>' . get_search_query() . '</span>'
			); ?>
		</h1>
	<?php } else {
		the_title( '<h1 class="h1 page-title pt-5 mb-0">', '</h1>' );
	} ?>
</header><!-- .entry-header -->
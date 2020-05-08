<header class="entry-header text-center py-5">
	<?php if ( is_tax() ) {
		single_term_title( '<h1 class="page-title">', '</h1>' );
	} else if ( is_search() ) { ?>
		<h1 class="page-title">
		<?php printf( /* translators: %s: query term */
				esc_html__( 'Search Results for: %s', 'understrap' ),
				'<span>' . get_search_query() . '</span>'
			); ?>
		</h1>
	<?php } else {
		the_title( '<h1 class="page-title">', '</h1>' );
	} ?>
</header><!-- .entry-header -->
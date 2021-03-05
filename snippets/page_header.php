<header class="entry-header text-center py-3">
	<?php if ( is_tax() ) { ?>
		<h1 class="h1 page-title pt-5 mb-3 tax-title"><?php single_term_title(); ?></h1>
		<a href = "/all-models" class="back d-flex justify-content-center align-items-center">
		<i class="fa fa-chevron-left mr-2" aria-hidden="true"></i><h5 class = "gold mb-0">Back to All Models</h5>
		</a><!-- #back -->
	<?php }  else if ( is_search() ) { ?>
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
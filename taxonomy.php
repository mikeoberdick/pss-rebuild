<?php
/**
 * The template for displaying the model custom taxonomy pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="modelTaxonomy" class = "py-5">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<div class="entry-content container">
					<section class = "row mb-3 justify-content-center">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php $id = get_the_ID(); ?>     
						<div class="product <?php if ( $id == 131 || $id == 132) {echo 'offset-md-4 offset-right-4 col-md-4 ';} else {echo 'col-md-4 ';}; ?>mb-4 mb-md-0" > 
							<div class="product-link d-flex flex-column justify-content-center align-items-center " data-link = "<?php the_permalink(); ?>">
								<div class = "mb-3">
									<?php the_post_thumbnail( 'medium' ); ?>	
								</div>
			    				<div class = "w-100">
			    					<button role = 'button' class = 'w-100 btn black-button mb-3'><?php the_title(); ?></button>	
			    				</div>	
							</div><!-- .product-link -->
		    				<div>
		    					<p class = "product-description"><?php the_field('product_description'); ?></p>
		    				</div>
		    			</div><!-- .product -->
					<?php endwhile; endif; wp_reset_query(); ?>
					</section><!-- .row -->
				</div><!-- .container -->
			</article>
		</main><!-- .site-main -->
	</div><!-- #content -->
</div><!-- #modelTaxonomy -->

<?php get_footer(); ?>
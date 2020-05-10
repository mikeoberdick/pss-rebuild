<?php
/**
 * Template Name: All Models
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="allModels" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $hero = get_field('hero'); ?>
				<div id="hero" style = "background: url('<?php echo $hero['background']['url']; ?>');" class = "inset">
					<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
					<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
				</div><!-- #hero -->
				
				<!-- Desktop Sorting -->
				<div class="fancy my-3 controls">
					<a class = "catButton" data-filter=".all"><h4 class = "mb-0">All Models</h4></a>
						<?php $terms = get_terms( array ('taxonomy'=> 'model') ); ?>
		    		<?php foreach ( $terms as $term ) { ?>
		    		<a class = "catButton" data-filter=".<?php echo $term->slug; ?>"><h4 class = "mb-0"><?php echo $term->name; ?></h4></a>
		        	<?php } ?>
				</div><!-- .controls -->

				<div class = "container">
					<div class="row">
						<div id="catCurrentlyShown" class = "mb-3 col-sm-12 text-center">
							<h5>Currently Viewing: <span id = "currentCat">All Models</span></h5>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->

				<div class="container">
					<div id="cars" class="row">
						<?php $custom_query_args = array(
							'post_type' => 'car',
							'posts_per_page' => -1
						);
						$custom_query = new WP_Query( $custom_query_args );
						if ( $custom_query->have_posts() ) : while( $custom_query->have_posts() ) : $custom_query->the_post();
							$taxonomy = 'model';
							$tax_terms = wp_get_post_terms($post->ID, $taxonomy, array("fields" => "all")); ?>
				
				<div class = "col-md-4 mb-3 car mix all <?php foreach( $tax_terms as $tax_term ): ?><?php echo $tax_term->slug; ?> <?php endforeach; ?>">
					
					<article <?php post_class(); ?> data-link = "<?php the_permalink(); ?>">
						<?php
							$gallery = get_field('images');
							$img = $gallery[0];
						?>
						<img class = "mb-3" src = "<?php echo $img['sizes']['medium']; ?>">
						<h5><?php the_title(); ?></h5>
				    </article>

				</div><!-- .car -->
				<?php endwhile; wp_reset_postdata(); endif; ?>

					</div><!-- .row -->
				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #allModels -->
<?php get_footer(); ?>
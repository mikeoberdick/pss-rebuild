<?php
/**
 * Template Name: Inventory
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="inventory" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<!-- Desktop Sorting -->
				<div class="fancy my-3 controls">
					<?php $terms = get_terms( array ('taxonomy'=> 'model', 'parent' => 0, 'hide_empty' => false, 'orderby' => 'term_group' ) ); ?>
		    		<?php foreach ( $terms as $term ) { ?>
		    		<a class = "catButton" data-filter=".<?php echo $term->slug; ?>"><h4 class = "mb-0"><?php echo $term->name; ?></h4></a>
		        	<?php } ?>
				</div><!-- .controls -->

				<div class = "container">
					<div class="row">
						<div id="catCurrentlyShown" class = "mb-3 col-sm-12 text-center">
							<h5>Currently Viewing: <span id = "currentCat">ALL</span></h5>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->

				<div class="container">
					<div id="cars" class="row">
						<div class = "col-md-4 text-center mb-3 all car mix <?php echo $parent->slug; ?>">
											
									<article <?php post_class(); ?> data-link = "<?php echo get_term_link( $the_term ) ?>">
										<?php
										$image = get_field('transparent_thumbnail', $the_term->taxonomy . '_' . $the_term->term_id);
										$size = 'blog-large';
    									$thumb = $image['sizes'][ $size ];
										?>
										<img class = "mb-3" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<h5><?php echo $the_term->name;; ?></h5>
								    </article>

								</div><!-- .car -->
						    <?php } ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #allModels -->
<?php get_footer(); ?>
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
						<?php $terms = get_terms( array ('taxonomy'=> 'model', 'parent' => 0, 'hide_empty' => true ) ); ?>
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

						<?php $taxonomyName = "model";
						$parent_terms = get_terms( $taxonomyName, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => true ) );   

						foreach ( $parent_terms as $pterm ) {
						    $terms = get_terms( $taxonomyName, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => true ) );
						    foreach ( $terms as $term ) { ?>

						    	<div class = "col-md-4 mb-3 car mix all <?php echo $pterm->slug; ?>">
											
									<article <?php post_class(); ?> data-link = "<?php echo get_term_link( $term ) ?>">
										<?php $image = get_field('hero_image', $term->taxonomy . '_' . $term->term_id); ?>
										<img class = "mb-3" src = "<?php echo $image['url']; ?>">
										<h5><?php echo $term->name;; ?></h5>
								    </article>

								</div><!-- .car -->
						    <?php }
						} ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #allModels -->
<?php get_footer(); ?>
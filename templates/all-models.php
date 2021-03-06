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
				<div class="fancy my-3 controls d-none d-lg-flex">
					<?php $terms = get_terms( array ('taxonomy'=> 'model', 'parent' => 0, 'hide_empty' => false, 'orderby' => 'term_group', 'exclude' => array( 241, 274, 786 ), ) ); ?>
		    		<?php foreach ( $terms as $term ) { ?>
		    		<a class = "catButton" data-filter=".<?php echo $term->slug; ?>"><h4 class = "mb-0"><?php echo $term->name; ?></h4></a>
		        	<?php } ?>
				</div><!-- .controls -->

				<!-- MOBILE Sorting -->
				<div id="mobileControls" class = "d-lg-none px-3 my-3">
					<select>
						<?php $terms = get_terms( array ('taxonomy'=> 'model', 'parent' => 0, 'hide_empty' => false, 'orderby' => 'term_group', 'exclude' => array( 241, 274, 786 ), ) ); ?>
		    		<?php foreach ( $terms as $term ) { ?>
		    		<option value = "<?php echo $term->name; ?>" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
		        	<?php } ?>
					</select>

				</div><!-- #mobileControls -->

				<div class = "container">
					<div class="row">
						<div id="catCurrentlyShown" class = "mb-3 col-sm-12 text-center">
							<h5>Currently Viewing: <span id = "currentCat">Hearses</span></h5>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->

				<div class="container">
					<div id="models" class="row">

						<?php $models = get_terms( array ('taxonomy'=> 'model', 'hide_empty' => false, 'orderby' => 'term_group' ) );  
						//Get an array of their IDs
						$term_ids = wp_list_pluck($models,'term_id');

						//Get array of parents - 0 is not a parent
						$parents = array_filter(wp_list_pluck($models,'parent'));

						//Get array of IDs of terms which are not parents.
						$term_ids_not_parents = array_diff($term_ids,  $parents);

						//Get corresponding term objects
						$terms_not_parents = array_intersect_key($models,  $term_ids_not_parents);

						    foreach ( $terms_not_parents as $the_term ) {

						    $parent  = get_term( $the_term, 'model' );
						    
						    while ( $parent->parent != '0' ) {
						        $term_id = $parent->parent;
						        $parent  = get_term( $term_id, 'model');
						    } ?>

							<?php if ( get_field('show_hide', $the_term->taxonomy . '_' . $the_term->term_id) != 'hide' ) : ?>
						    <div class = "col-md-4 text-center mb-3 model mix <?php echo $parent->slug; ?>">
											
									<div class = 'model-wrapper link' data-link = "<?php echo get_term_link( $the_term ) ?>">
										<?php
										$image = get_field('transparent_thumbnail', $the_term->taxonomy . '_' . $the_term->term_id);
										$size = 'blog-large';
    									$thumb = $image['sizes'][ $size ];
										?>
										<img class = "mb-3 lazy" data-src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<h5><?php echo $the_term->name;; ?></h5>
								    </div><!-- .model-wrapper -->
								</div><!-- .model -->
						    <?php endif; } ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #allModels -->
<?php get_footer(); ?>
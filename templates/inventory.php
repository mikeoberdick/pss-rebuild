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
		    		<a class = "catButton" data-filter=".all"><h4 class = "mb-0">All</h4></a>
		    		<a class = "catButton" data-filter=".new_car"><h4 class = "mb-0">New</h4></a>
		    		<a class = "catButton" data-filter=".pre_owned"><h4 class = "mb-0">Pre-Owned</h4></a>
		    		
		    		<?php //if there are auction cars we need to include a button for sorting
		    		$query = new WP_Query(array(
	    				'post_type' => 'car',
	    				'meta_key' => 'flag',
						'meta_value' => 'Parks Auction'
					));
					?>

					<?php if( $query->have_posts() ) { ?>
						    <a class = "catButton" data-filter=".parks_auction"><h4 class = "mb-0">Auction</h4></a>
						<?php } else {
						    //do nothing
						} ?>
						<?php wp_reset_postdata(); ?>

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
						<?php $args = array(  
				        'post_type' => 'car',
				        'post_status' => 'publish',
				        'posts_per_page' => -1, 
        				'orderby' => 'title', 
        				'order' => 'DESC', 
    					);

    					$loop = new WP_Query( $args );
    					while ( $loop->have_posts() ) : $loop->the_post(); ?>

    					<?php
    					
    					$status = strtolower(get_field('new-preowned'));
    					if ( !empty($status) ) {
	    					$status = preg_replace("/[^a-z0-9_\s-]/", "", $status);
	    					$status = preg_replace("/[\s-]+/", " ", $status);
	    					$status = ' ' . preg_replace("/[\s_]/", "_", $status);
    					} else {
    						$status = '';
    					}
    					
    					$year = strtolower(get_field('year'));
    					if ( !empty($year) ) {
	    					$year = preg_replace("/[^a-z0-9_\s-]/", "", $year);
	    					$year = preg_replace("/[\s-]+/", " ", $year);
	    					$year = ' ' . preg_replace("/[\s_]/", "_", $year);
	    				} else {
	    					$year = '';
	    				}
    					
    					$make = strtolower(get_field('coachbuilder'));
    					if ( !empty($make) ) {
    					$make = preg_replace("/[^a-z0-9_\s-]/", "", $make);
    					$make = preg_replace("/[\s-]+/", " ", $make);
    					$make = ' ' . preg_replace("/[\s_]/", "_", $make);
	    				} else {
	    					$make = '';
	    				}
    					
    					$model = strtolower(get_field('model'));
    					if ( !empty($model) ) {
    					$model = preg_replace("/[^a-z0-9_\s-]/", "", $model);
    					$model = preg_replace("/[\s-]+/", " ", $model);
    					$model = ' ' . preg_replace("/[\s_]/", "_", $model);
    					} else {
	    					$model = '';
	    				}
    					
    					$price = get_field('price');
    					if ( is_numeric($price) && !empty($price) ) {
							$price = number_format($price);
							$price = strtolower($price);
	    					$price = preg_replace("/[^a-z0-9_\s-]/", "", $price);
	    					$price = preg_replace("/[\s-]+/", " ", $price);
	    					$price = ' ' . preg_replace("/[\s_]/", "_", $price);
    					} else {
    						$price = ' call_for_pricing';
    					}
    					
    					$flag = get_field('flag');
    					//May need to add an additional condition to make it if it's not empty and it's equal to 'auction'
    					if (!empty($flag)) {
    						$flag = strtolower(get_field('flag'));
    						$flag = preg_replace("/[^a-z0-9_\s-]/", "", $flag);
    					$flag = preg_replace("/[\s-]+/", " ", $flag);
    					$flag = ' ' . preg_replace("/[\s_]/", "_", $flag);
    					} else {
    						$flag = '';
    					}
    					?>

    					<?php //grab variables to use for sorting
    					$vars = $status . $year . $make . $model . $price . $flag;
    					?>

						<div class = "col-md-4 car mb-3 all<?php echo $vars; ?> mix">
											
						<?php get_template_part( 'snippets/car'); ?>

						</div><!-- .col-md-4 -->
					<?php endwhile; wp_reset_postdata(); ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #allModels -->
<?php get_footer(); ?>
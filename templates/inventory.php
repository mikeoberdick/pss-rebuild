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

				<?php $hero = get_field('hero'); ?>
				<div id="hero" style = "background: url('<?php echo $hero['background']['url']; ?>');" class = "inset">
					<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
					<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
				</div><!-- #hero -->
				
				<!-- Desktop Sorting -->
				<form class = "fancy mt-3">
				<div data-filter-group id = "status" class="mb-0 controls d-none d-lg-inline-flex">
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

				<div data-filter-group id = "body" class="controls d-none d-lg-inline-flex">
					<a class = "catButton" data-filter=".hearse"><h4 class = "mb-0">Hearse</h4></a>
		    		<a class = "catButton" data-filter=".limousine"><h4 class = "mb-0">Limousine</h4></a>
		    		<a class = "catButton" data-filter=".first_call"><h4 class = "mb-0">First Call Van</h4></a>
		    		<a class = "catButton" data-filter=".flower_car"><h4 class = "mb-0">Flower Car</h4></a>
				</div><!-- .controls -->
			</form>

				<!-- MOBILE Sorting -->
				<div id="mobileControls" class = "d-lg-none">
				
				<div data-filter-group id = "mobileStatus" class = "mobile-control-wrapper">
					<select>
						<option value=".all">ALL</option>
						<option value=".new_car">NEW</option>
						<option value=".pre_owned">PRE-OWNED</option>

		    		<?php //if there are auction cars we need to include a button for sorting
		    		$query = new WP_Query(array(
	    				'post_type' => 'car',
	    				'meta_key' => 'flag',
						'meta_value' => 'Parks Auction'
					));
					?>

					<?php if( $query->have_posts() ) { ?>
						<option value="AUCTION" data-filter=".parks_auction">AUCTION</option>
						<?php } else {
						    //do nothing
						} ?>
						<?php wp_reset_postdata(); ?>
					</select>
				</div><!-- #mobileStatus -->

				<div data-filter-group id = "mobileBody" class = "mobile-control-wrapper">
					<select>
						<option value=".hearse">HEARSE</option>
						<option value=".limousine">LIMOUSINE</option>
						<option value=".first_call">FIRST CALL VAN</option>
						<option value=".flower_car">FLOWER CAR</option>
					</select>
				</div><!-- #mobileBody -->
				
				</div><!-- #mobileControls -->

				<div class = "container">
					<div class="row">
						<div id="catCurrentlyShown" class = "mb-3 col-sm-12 text-center">
							<h3>Currently Viewing: <span id = "first">ALL</span> <span id = "second">VEHICLES</span></h3>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->

				<div id="cars" class="container mb-5">
					<div class="row">
						<div class="fail-message col-sm-12"><h3>No vehicles were found</h3></div>

					<?php $args = array(  
			        'post_type' => 'car',
			        'post_status' => 'publish',
			        'posts_per_page' => -1, 
    				'orderby' => 'title', 
    				'order' => 'DESC',
					'meta_key' => 'flag', 
					'meta_value' => 'sold', 
					'meta_compare' => '!='
					);

					$loop = new WP_Query( $args ); $i = 1;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php $status = strtolower(get_field('new-preowned'));
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

    				$body = strtolower(get_field('body'));
					if ( !empty($body) ) {
					$body = preg_replace("/[^a-z0-9_\s-]/", "", $body);
					$body = preg_replace("/[\s-]+/", " ", $body);
					$body = ' ' . preg_replace("/[\s_]/", "_", $body);
					} else {
    					$body = '';
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
					$vars = $status . $year . $make . $model . $price . $flag . $body;
					?>

					<div class = "col-md-6 col-lg-4 car mb-3 all<?php echo $vars; ?> mix">					
						<?php get_template_part( 'snippets/car'); ?>
					</div><!-- .col-md-6 -->

					<?php endwhile; wp_reset_postdata(); ?>
				</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #allModels -->
<?php get_footer(); ?>
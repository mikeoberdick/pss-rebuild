<?php
/**
 * Template Name: Tour
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="virtualTour" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<?php get_template_part( 'snippets/page_header'); ?>
				
				<div class="container mt-3">
					<div class="row">
						<div class="col-sm-12">
							<h3 class = "mb-3 gold text-center"><?php the_field('header'); ?></h3>
							<h5 class = "mb-3"><?php the_field('subheader'); ?></h5>
							<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class="row mb-5">
						<div class="col-md-6 d-flex flex-column">
							<h3 class = "mb-3 gold">Building 1 & 2</h3>
							<h5 class="mb-3">Office, New Car Showroom, Service Center, Detail & Body Shop.</h5>
							<div class = "mt-auto"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!4v1513177707104!6m8!1m7!1sCAoSLEFGMVFpcE1NalQ4Sm9vQ0phZ3h3TnRPZjRYOGdqWE1FVmRZMU5qc0NhVXo1!2m2!1d41.986961188443!2d-72.483777040775!3f343!4f-6!5f0.7820865974627469" width="550" height="375" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
						</div><!-- .col-md-6 -->
						<div class="col-md-6 d-flex flex-column">
							<h3 class = "mb-3 gold">Building 3</h3>
							<h5 class="mb-3">Pre-Owned Car Showroom</h5>
							<div class = "mt-auto"><iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!4v1513177767702!6m8!1m7!1sCAoSLEFGMVFpcE5PWkRYSG9MVkI4RzIyb3didVpia3BmNUM2al9PRTg1WGdPczNK!2m2!1d41.987332246305!2d-72.484816595538!3f289.72!4f-2.25!5f0.7820865974627469" width="500" height="375" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div>
						</div><!-- .col-md-6 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #virtualTour -->
<?php get_footer(); ?>
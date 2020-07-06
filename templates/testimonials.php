<?php
/**
 * Template Name: Testimonials
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="testimonials" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style = "background: url('<?php echo $hero['background']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->

				<h3 class="fancy"><?php the_field('testimonial_headline'); ?></h3>

				<div id="customerTestimonials" class = "container">
					<div class="row">
						<?php $rows = get_field('testimonials'); ?>
						<?php if ($rows) {
							shuffle($rows);
							foreach(array_slice($rows, 0, 8) as $row ) { ?>
								<div class="col-sm-12 mb-5">
									<div class="content-wrapper p-4">
									<h3 class = "mb-3"><i class="fa fa-quote-left mr-3" aria-hidden="true"></i><?php echo $row['header']; ?></h3>
									<div class = "d-flex align-items-end">
									<p class="mb-0"><?php echo $row['testimonial']; ?></p><h3><i class="fa fa-quote-right ml-3" aria-hidden="true"></i></h3>	
									</div>
									<hr>
									<p class = "font-weight-bold mb-2"><?php echo $row['author']; ?></p>
									<p class = "font-weight-bold"><?php echo $row['company']; ?></p>
									</div><!-- .content-wrapper -->
								</div><!-- .col-sm-12 -->
							<?php }
							} ?>

					</div><!-- .row -->
				</div><!-- #customerTestimonials -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #landingPageBuckets -->
<?php get_footer(); ?>
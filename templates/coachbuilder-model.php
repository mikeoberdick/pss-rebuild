<?php
/**
 * Template Name: Coachbuilder Model
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="coachbuilderModel" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style = "background: url('<?php echo $hero['hero_image']['url']; ?>');">
					<?php if ($hero['header']) : ?>
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
								<?php if ($hero['sub_header']) : ?>
								<h3 class = "text-shadow mb-0"><?php echo $hero['sub_header']; ?></h3>
								<?php endif; ?>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
					<?php endif; ?>
				</div><!-- #hero -->
				
				<?php $intro = get_field('introductory_section'); ?>
				<div id="introductorySection" class = "container">
					<div class="row">
						<div class="col-sm-12 mb-5">
							<div>
								<h3 class = "mb-3 text-center gold"><?php echo $intro['header']; ?></h3>
								<div class="wysiwyg"><?php echo $intro['copy']; ?></div>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- #introductorySection -->

				<?php $sectionOne = get_field('section_one'); ?>
				<div id="sectionOne" class = "container">
					<div class="row">
						<div class="col-sm-12 mb-5">
							<div class="content-wrapper p-4">
								<img class = "mb-3" src="<?php echo $sectionOne['image']['url']; ?>" alt="<?php echo $sectionOne['image']['alt']; ?>">
								<h3 class = "mb-3 text-center"><?php echo $sectionOne['header']; ?></h3>
								<p><?php echo $sectionOne['copy']; ?></p>
								<div class="button-links d-flex justify-content-center">
									<?php $one = $sectionOne['button_link_one']; ?>
									<a class = "mr-3" href = "<?php echo $one['button_link']; ?>"><button role = "button" class = "btn gold-button"><?php echo $one["button_text"] . ' ' . $location; ?></button></a>
									<?php $two = $sectionOne['button_link_two']; ?>
									<a href = "<?php echo $two['button_link']; ?>"><button role = "button" class = "btn gold-button"><?php echo $two["button_text"] . ' ' . $location; ?></button></a>
								</div><!-- .button-links -->
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- #sectionOne -->

				<div id="links" class = "container-fluid">
					<div class="row">
						<?php if ( have_rows('links') ) : while ( have_rows('links') ) : the_row(); ?>
						<div class="col-sm-12 mb-3">
							<a href="<?php the_sub_field('link_destination');  ?>"><h3 class = "text-center"><?php the_sub_field('link_text'); ?></h3></a>
						</div><!-- .col-sm-12 -->
					<?php endwhile; endif; ?>
					</div><!-- .row -->
				</div><!-- #links -->

				<?php $sectionTwo = get_field('section_two'); ?>
				<div id="sectionTwo" class = "container">
					<div class="row">
						<div class="col-sm-12 mb-5">
							<div class="content-wrapper p-4">
								<h3 class = "mb-3 text-center"><?php echo $sectionTwo['header']; ?></h3>
								<p><?php echo $sectionTwo['copy']; ?></p>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- #sectionTwo -->

				<?php get_template_part( 'snippets/about_video'); ?>

				<?php $testimonial = get_field('testimonial'); ?>
				<div id="testimonial" class = "container my-5">
					<div class="row">
						<div class="col-md-6">
							<h4 class = "mb-3 gold"><?php echo $testimonial['testimonial_header'];?></h4>
							<p>"<?php echo $testimonial['testimonial_copy']; ?>"</p>
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<img src="<?php echo $testimonial['testimonial_image']['url']; ?>" alt="<?php echo $testimonial['testimonial_image']['alt']; ?>">
						</div><!-- .col-md-6 -->
					</div><!-- .row -->
				</div><!-- #testimonial -->

				<div id="images" class = "container">
					<div class="row">
						<?php if ( have_rows('image_gallery') ) : while ( have_rows('image_gallery') ) : the_row(); ?>
						<div class="col-md-4">
							<?php $image = get_sub_field('image'); ?>
							<a href="<?php the_sub_field('link_destination');  ?>">
								<img class = "mb-3" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</a>
							<p class="caption gold small text-center text-uppercase"><?php the_sub_field('caption'); ?></p>
						</div><!-- .col-md-4 -->
						<?php endwhile; endif; ?>
					</div><!-- .row -->
				</div><!-- #images -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #coachbuilderModel -->
<?php get_footer(); ?>
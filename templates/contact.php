<?php
/**
 * Template Name: Contact
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="contactUs" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<?php get_template_part( 'snippets/page_header'); ?>
				
				<div class="container mt-3">
					<div class="row">
						<div class="col-sm-12">
							<p><?php the_field('copy'); ?></p>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class="row mt-3">
						<div class="col-md-6 mb-5">
							<div id = "contactFormWrapper">
								<?php $logo = get_field('logo', 'option'); ?>
								<img id = "logo" class = "mb-3" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
								<?php echo do_shortcode('[ninja_form id=3]'); ?>
							</div><!-- .contactFormWrapper -->
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<div id="contactInfo" class = "mb-3">
								<?php $hours = get_field('hours'); ?>
								<h5 class = "text-uppercase gold"><?php echo $hours['header']; ?></h5>
								<p><?php echo $hours['hours']; ?></p>
								<h5 class = "text-uppercase gold">Address</h5>
								<p><?php the_field('address_line_1', 'option'); ?><br/><?php the_field('address_line_2', 'option'); ?></p>
								<h5 class = "text-uppercase gold">Phone</h5>
								<p><?php the_field('phone_number', 'option'); ?></p>
								<h5 class = "text-uppercase gold">E-Mail Address</h5>
								<p><?php the_field('email_address', 'option'); ?></p>
							</div><!-- #contactInfo -->
							<h5 class = "text-uppercase gold">Directions</h5>
							<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5931.226567120522!2d-72.483781!3d41.987112!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x91c9b902fa998b0b!2sParks+Superior+Sales%2C+Inc.!5e0!3m2!1sen!2sus!4v1521828517045" width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
						</div><!-- .col-md-6 -->
					</div><!-- .row -->
				</div><!-- .container -->
				
				<?php $tour = get_field('tour'); ?>
				<section id="virtualTour" style = "background: url('<?php echo $tour['background']['url']; ?>');" class = "py-5 text-center inset">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1 class="mb-3 text-shadow"><?php echo $tour['header']; ?></h1>
								<p class = "mb-5"><?php echo $tour['copy']; ?></p>
								<div>
								<a href = '<?php echo $tour['button_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $tour['button_text']; ?></button></a>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionSix -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #contactUs -->
<?php get_footer(); ?>
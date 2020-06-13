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
								<p><?php the_field('international_phone_number', 'option'); ?><span class = "small"> (INTERNATIONAL)</span></p>
								<h5 class = "text-uppercase gold">E-Mail Address</h5>
								<p><?php the_field('email_address', 'option'); ?></p>
							</div><!-- #contactInfo -->
							<h5 class = "text-uppercase gold">Virtual Tours</h5>
							<h5 class = "mb-3">Building 1 & 2</h5>
							<div class="embed-responsive embed-responsive-16by9 mb-3">
							<iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!4v1513177707104!6m8!1m7!1sCAoSLEFGMVFpcE1NalQ4Sm9vQ0phZ3h3TnRPZjRYOGdqWE1FVmRZMU5qc0NhVXo1!2m2!1d41.986961188443!2d-72.483777040775!3f343!4f-6!5f0.7820865974627469" width="550" height="375" allowfullscreen="allowfullscreen"></iframe>	
							</div>
							<h5 class = "mb-3">Building 3</h5>
							<div class="embed-responsive embed-responsive-16by9 mb-3">
							<iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!4v1513177767702!6m8!1m7!1sCAoSLEFGMVFpcE5PWkRYSG9MVkI4RzIyb3didVpia3BmNUM2al9PRTg1WGdPczNK!2m2!1d41.987332246305!2d-72.484816595538!3f289.72!4f-2.25!5f0.7820865974627469" width="500" height="375" allowfullscreen="allowfullscreen"></iframe>	
							</div>
							
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
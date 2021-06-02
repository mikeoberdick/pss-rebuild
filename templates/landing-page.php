<?php
/**
 * Template Name: Landing Page
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="landingPageBuckets" class = "page-wrapper landing-page">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $hero = get_field('hero'); ?>
				<?php if ($hero['hero_link']) {
					echo '<a href="' . get_field('hero_link') . '">';
				} ?>
				<div id="hero" class = "mb-5 <?php if ( $hero['header'] ) { echo 'inset'; } ?>" style = "background: url('<?php echo $hero['background']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->
				<?php if ($hero['hero_link']) {
					echo '</a>';
				} ?>

				<?php if ( get_field('content') ) : ?>
				<div class="container mb-5">
					<div class="row">
						<div class="col-sm-12">
							<div class="p-4 content-wrapper">
								<?php the_field('content'); ?>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				<?php endif; ?>
				
				<div id="buckets" class = "container pb-5">
					<div class="row">
						<?php $count = count( get_field('buckets')) ?>
						<?php while( have_rows('buckets') ): the_row(); ?>
							<?php
							$image = get_sub_field('image');
							$header = get_sub_field('header');
							$copy = get_sub_field('copy');
							$text = get_sub_field('button_text');
							$link = get_sub_field('link');
							$widthSetting = get_sub_field('width');
							?>
							<?php if ($widthSetting) {
								$width = $widthSetting;
							} else if ($count == 2) {
								$width = 'col-md-6';
							} else {
								$width = 'col-md-4';
							} ?>
							<div class="<?php echo $width; ?> service-bucket d-flex flex-column mb-5">
								<img class = "mb-3" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
								<h4 class = "text-center gold mb-3"><?php echo $header; ?></h4>
								<p class = "mb-3 text-center text-lg-left"><?php echo $copy; ?></p>
								<div class = "text-center mt-auto">
									<a href = '<?php echo $link; ?>'><button role = 'button' class = 'btn text-center gold-button'><?php echo $text; ?></button></a>
								</div>
							</div><!-- .col-md-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- #serviceBuckets -->

				<?php if (get_field('additional_text')) : ?>
				<div class="container my-5">
					<div class="row">
						<div class="col-sm-12">
							<?php the_field('additional_text'); ?>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				<?php endif; ?>

				<div id="additionalSectionOne" class = "additional-section mb-5">
					<h3 class="fancy">Why Choose Parks Superior Sales</h3>
					<div class="mt-4 mt-lg-0 container">
						<div class="row">
							<div class="col-sm-12">
								<p class = "mb-3 text-center">Our Family business has been helping your Family Business find funeral vehicles for over 70 years!</p>
								<p class = "mb-3 text-center">For three generations, our reputation for honesty & professionalism been the pillar of our business. We offer our customers the largest selection of new & pre-owned hearse, limousines, first call vans & flower cars in the world. We carry all the major Coachbuilders in the Funeral Industry. At Parks Superior Sales, we offer you more than just a car sale. You get an unmatched selection to choose from, full range of serves including, state of the art In-House Mechanical & Body Shop, Paint Shop, Detail Center and EASY financing.  We make it easy to shop for your perfect hearse, limousine or first call van. 70 years later, we are still taking care of our customers, one customer at a time.</p>
								<div class="row mb-3">
									<div class="col-lg-6 offset-lg-3">
										<div class = "embed-responsive embed-responsive-16by9">
											<?php $aboutVideo = get_field('about_video', 'option'); ?>
											<?php echo $aboutVideo['video']; ?>
										</div>	
								</div>
								</div>
								<div class="d-flex justify-content-center">
								<a class = "w-50 mx-auto" href = "/inventory"><button role = "button" class = "btn gold-button w-100">INVENTORY</button></a>	
								</div>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #addtionalSectionOne -->
				
				<div id="additionalSectionTwo" class = "additional-section pb-5">
					<h3 class="fancy">Finance</h3>
					<div class="mt-4 mt-lg-0 container">
						<div class="row">
							<div class="col-sm-12">
								<p class = "mb-3 text-center">We specialize in financing & leasing of both New & Pre-Owned Funeral Cars. We offer a simple half page credit application, and can have you all approved in about an hour. Offering terms from 24 to 72 months, we will custom tailor a finance or lease program around your specific needs. Call today to find out just how quick and easy it is to get into the funeral car of your dreams.</p>
								<div class="two-buttons">
									<?php $creditApp = get_field('credit_application_file', 270); ?>
									<a target = "_blank" class = "mx-auto" href = "<?php echo $creditApp['url']; ?>"><button role = "button" class = "btn gold-button">DOWNLOAD CREDIT APPLICATION</button></a>	
									<a class = "mx-auto" href = "/financing"><button role = "button" class = "btn gold-button">FINANCING</button></a>	
								</div>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #addtionalSectionTwo -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #landingPageBuckets -->
<?php get_footer(); ?>
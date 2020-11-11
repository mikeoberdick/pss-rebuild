<?php
/**
 * Template Name: SEO Landing Page
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="seoLandingPage" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-3 inset" style = "background: url('<?php echo $hero['background_image']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['headline']; ?></h1>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->

				<div id="introductorySection" class = "mb-5">
					<?php $intro = get_field('introductory_section'); ?>
					<h3 class="fancy"><?php echo $intro['headline']; ?></h3>
					<div class="mt-4 mt-lg-0 container">
						<div class="row">
							<div class="col-sm-12">
								<p><?php echo $intro['copy']; ?></p>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #introductorySection -->

				<div id="cars">
					<div class="container">
						<div class="row car-wrapper">
							<?php $i = 1; while( have_rows('cars') ) : the_row(); ?>
							<?php if ($i >2 && $i % 2 != 0) {echo '<div class = "row car-wrapper">';} ?>
								<div class="car col-lg-6<?php if($i >2) {echo ' pt-3';} ?>">
									<?php $img = get_sub_field('image'); ?>
									<img class = "mb-3" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
									<h3 class = "mb-2 text-center font-weight-bold"><span class = "gold"><?php the_sub_field('year'); ?> </span><?php the_sub_field('title'); ?></h3>
									<a href="<?php the_sub_field('link'); ?>"><h5 class = "text-center">Click Here For More</h5></a>
									<div class="row">
										<?php $url = get_sub_field('video_1');  $video = substr($url, strrpos($url, '/') + 1); ?>
											<?php if ($url) : ?>
										<div class="offset-md-2 col-md-8 mb-3">
											<div class="embed-responsive embed-responsive-16by9 mb-1">
												<iframe class = "embed-item" src="<?php echo 'https://www.youtube.com/embed/' . $video . '?t=20s'; ?>" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen"></iframe>
											</div><!-- .embed-responsive -->
											<h5 class = "text-center"><?php the_sub_field('video_1_title'); ?></h5>
										</div><!-- .col-md-8 -->
									<?php endif; ?>
									<?php $url = get_sub_field('video_2');  $video = substr($url, strrpos($url, '/') + 1); ?>
									<?php if ($url) : ?>
										<div class="offset-md-2 col-md-8 mb-3">
											<?php $url = get_sub_field('video_2');  $video = substr($url, strrpos($url, '/') + 1); ?>
											<div class="embed-responsive embed-responsive-16by9 mb-1">
												<iframe class = "embed-item" src="<?php echo 'https://www.youtube.com/embed/' . $video . '?t=20s'; ?>" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen"></iframe>
											</div><!-- .embed-responsive -->
											<h5 class = "text-center"><?php the_sub_field('video_2_title'); ?></h5>
										</div><!-- .col-md-8 -->
									<?php endif; ?>
									</div><!-- .row -->
									<div class="colors">
										<h3 class = "text-center font-weight-bold">Colors</h3>
										<?php $colors = get_sub_field('colors'); ?>
										<img class = "mb-1 d-block mx-auto" src="<?php echo $colors['url']; ?>" alt="<?php echo $colors['alt']; ?>">
										<p class = "text-center"><?php the_sub_field('color_names'); ?></p>
									</div><!-- .colors -->
									<div class="warranty">
										<h3 class = "text-center font-weight-bold">Warranty</h3>
										<p class = "text-center"><?php the_sub_field('warranty'); ?></p>
									</div><!-- .colors -->
								</div><!-- .col-lg-6 -->
								<?php if($i % 2 == 0) {echo '</div>';} ?>
							
							<?php $i++; endwhile; ?>
					</div><!-- .container -->
				</div><!-- #cars -->
				
				<div id="additionalSectionOne" class = "additional-section mb-5">
					<?php $one = get_field('additional_section_one'); ?>
					<h3 class="fancy"><?php echo $one['headline']; ?></h3>
					<div class="mt-4 mt-lg-0 container">
						<div class="row">
							<div class="col-sm-12">
								<p class = "mb-3"><?php echo $one['copy']; ?></p>
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

				<div id="additionalSectionTwo" class = "additional-section mb-5">
					<?php $two = get_field('additional_section_two'); ?>
					<h3 class="fancy"><?php echo $two['headline']; ?></h3>
					<div class="mt-4 mt-lg-0 container">
						<div class="row">
							<div class="col-sm-12">
								<p class = "mb-3"><?php echo $two['copy']; ?></p>
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
</div><!-- #seoLandingPage -->
<?php get_footer(); ?>
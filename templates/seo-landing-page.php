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
				<div id="hero" class = "mb-3" style = "background: url('<?php echo $hero['background_image']['url']; ?>');">
					<?php if ($hero['headline']) : ?>
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['headline']; ?></h1>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
					<?php endif; ?>
				</div><!-- #hero -->
				
				<?php $intro = get_field('introductory_section'); ?>
				<div id="introductorySection" class = "text-center mb-5">
					<?php echo $intro['copy']; ?>
					<?php if ($intro['button_text']) : ?>
						<a href = "<?php echo $intro['button_link']; ?>"><button role = "button" class = "btn gold-button"><?php echo $intro['button_text']; ?></button></a>
					<?php endif; ?>
				</div><!-- #introductorySection -->

				<div id="cars">
					<div class="container">
						<div class="row car-wrapper">
							<?php $i = 1; while( have_rows('cars') ) : the_row(); ?>
							<?php if ($i >2 && $i % 2 != 0) {echo '<div class = "row car-wrapper">';} ?>
								<div class="car col-lg-6<?php if($i >2) {echo ' pt-3';} ?>">
									
								<div class = "gallery-carousel">
								<?php $images = get_sub_field('images'); $count = count($images);?>

										<img class = "large-gallery-image mb-3 d-block mx-auto" src="<?php echo $images[0]["sizes"]["large"]; ?>">
										<?php if ( $count >= 2 ) : ?>
										<div class="gallery-wrapper position-relative">
										<div class = "seo-image-gallery">
										<?php foreach( $images as $image ): ?>
							                <div class = "slide gallery-thumb">
							                    <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
							                </div>
							            <?php endforeach; ?>  	
										</div><!-- .seo-image-gallery -->
									<div class="arrows"></div>	
										</div><!-- .gallery-wrapper p-relative -->
										<?php endif; ?>
								</div><!-- .gallery-carousel -->

									<h3 class = "mb-2 text-center font-weight-bold"><span class = "gold"><?php the_sub_field('year'); ?> </span><?php the_sub_field('title'); ?></h3>
									<h5 class = "text-center">Click <a class = "gold" href="<?php the_sub_field('link'); ?>">Here</a> For More</h5>
									<div class="row">
										<?php $url = get_sub_field('video_1'); ?>
											<?php if ($url) : ?>
										<div class="col-sm-12 mb-3">
											<div class="embed-responsive embed-responsive-16by9 mb-1">
												<iframe lazy-loading class = "embed-item" src="<?php echo $url; ?>" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen"></iframe>
											</div><!-- .embed-responsive -->
											<h5 class = "text-center gold"><?php the_sub_field('video_1_title'); ?></h5>
										</div><!-- .col-md-8 -->
									<?php endif; ?>
									<?php $url = get_sub_field('video_2'); ?>
									<?php if ($url) : ?>
										<div class="col-sm-12 mb-3">
											<?php $url = get_sub_field('video_2'); ?>
											<div class="embed-responsive embed-responsive-16by9 mb-1">
												<iframe class = "embed-item" src="<?php echo $url; ?>" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen"></iframe>
											</div><!-- .embed-responsive -->
											<h5 class = "text-center gold"><?php the_sub_field('video_2_title'); ?></h5>
										</div><!-- .col-md-8 -->
									<?php endif; ?>
									</div><!-- .row -->
									<?php 
										$images = get_sub_field('colors');
										if( $images ): ?>
											<div class="colors">
												<h3 class = "text-center font-weight-bold">Colors</h3>
												<div id = "colorSwatchWrapper">
										        <?php foreach( $images as $image ): ?>
										        	<div class="color-wrapper">
										        	<img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
													<p class = "small"><?php echo esc_html($image['caption']); ?></p>
													</div><!-- .color-wrapper -->
										        <?php endforeach; ?>
										    </div><!-- #colorSwatchWrapper -->
											</div><!-- .colors -->
										<?php endif; ?>
									<div class="warranty">
										<h3 class = "text-center font-weight-bold">Warranty</h3>
										<p class = "text-center"><?php the_sub_field('warranty'); ?></p>
									</div><!-- .colors -->
									<div class="contact-options d-flex justify-content-around align-items-center mb-3">
										<p class = "h5 gold font-weight-bold mb-3 mb-md-0">Call to Save! <a href="tel:8002295008">800-229-5008</a></p>
										<a href = "mailto:info@parkssuperior.com" target = "_blank" class="email">
											<i class="fa fa-envelope-o" aria-hidden="true"></i>
											<span>Message Us</span>
										</a><!-- .email -->
									</div><!-- .contact-options -->
								</div><!-- .col-lg-6 -->
								<?php if($i % 2 == 0) {echo '</div>';} ?>
							
							<?php $i++; endwhile; ?>
					</div><!-- .container -->
				</div><!-- #cars -->
				
				<?php $one = get_field('additional_section_one'); ?>
				<?php if ($one['show_or_hide'] == 'show') : ?>
				<div id="additionalSectionOne" class = "additional-section mb-5">
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
				<?php endif; ?>
				
				<?php $two = get_field('additional_section_two'); ?>
				<?php if ($two['show_or_hide'] == 'show') : ?>
				<div id="additionalSectionTwo" class = "additional-section mb-5">
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
			<?php endif; ?>

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #seoLandingPage -->
<?php get_footer(); ?>
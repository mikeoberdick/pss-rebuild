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

								<?php $images = get_sub_field('images');?>
								<div class="gallery-wrapper position-relative">
									<div class = "single-image-gallery">
									<?php foreach( $images as $image ): ?>
						                <div class = "slide" style = "background-image: url('<?php echo esc_url($image['sizes']['large']); ?>')">
						                </div>
						            <?php endforeach; ?>  	
									</div><!-- .single-image-gallery -->
								<div class="arrows"></div>	
								</div><!-- .gallery-wrapper p-relative -->

									<h3 class = "mb-2 text-center font-weight-bold"><span class = "gold"><?php the_sub_field('year'); ?> </span><?php the_sub_field('title'); ?></h3>

									<div class="row">
										<?php $url = get_sub_field('video_1'); ?>
											<?php if ($url) : ?>
												<div class="col-sm-12">
												<h5 class = "text-center">Click <a class = "gold" data-toggle="modal" data-target="#videoModal">Here</a> to see video.</h5>	
												</div><!-- .col-sm-12 -->

												<div class="modal fade p-5" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo get_sub_field('year') . ' ' . get_sub_field('title'); ?>" aria-hidden="true">
												  <div class="modal-dialog modal-xl" role="document">
												    <div class="modal-content">
												      <div class="modal-body p-5">
												        <a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
<h5 class = "text-center gold mb-3"><?php the_sub_field('video_1_title'); ?></h5>
															<div class = "text-center embed-responsive embed-responsive-16by9">
																<iframe lazy-loading class = "embed-item" src="<?php echo $url; ?>" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen"></iframe>
															</div>
															
												      </div><!-- .modal-body -->
												    </div><!-- .modal-content -->
												  </div><!-- .modal-dialog -->
												</div><!-- .modal -->
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
									<?php if (get_sub_field('warranty')) : ?>
									<div class="warranty">
										<h3 class = "text-center font-weight-bold">Warranty</h3>
										<p class = "text-center"><?php the_sub_field('warranty'); ?></p>
									</div><!-- .warranty -->
									<?php endif; ?>
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
				
				<?php if (get_field('additional_text')) : ?>
				<div class="container my-5">
					<div class="row">
						<div class="col-sm-12">
							<?php the_field('additional_text'); ?>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				<?php endif; ?>
				
				<?php $one = get_field('additional_section_one'); ?>
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
				
				<?php $two = get_field('additional_section_two'); ?>
				<div id="additionalSectionTwo" class = "additional-section mb-5">
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
</div><!-- #seoLandingPage -->
<?php get_footer(); ?>
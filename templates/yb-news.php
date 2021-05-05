<?php
/**
 * Template Name: YB News
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="ybNews" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<?php $heroType = get_field('hero_type'); ?>
				
				<?php if ($heroType == 'image') { ?>
				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-3" style = "background: url('<?php echo $hero['background_image']['url']; ?>');">
					<?php if ($hero['headline']) : ?>
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['headline']; ?></h1>
								<?php if ($hero['subheader']) : ?>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
								<?php endif; ?>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
					<?php endif; ?>
				</div><!-- #hero -->
			<?php } else { ?>
				<?php $hero = get_field('video_hero'); ?>
				<section id="hero" class = "mb-3">
					<div id = "videoWrapper">
						<video playsinline autoplay muted loop width = "100%" height = "100%" poster="<?php echo get_stylesheet_directory_uri() . '/img/transparent.png'; ?>" class = "d-flex">
						  <source src="/wp-content/themes/understrap-child/vids/yb_news_video_short.mov" type="video/mp4">
						</video>	
					</div><!-- #videoWrapper -->
					<?php if ($hero['headline']) : ?>
					<div class="text-holder container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['headline']; ?></h1>
								<?php if ($hero['subheader']) : ?>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
								<?php endif; ?>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
					<?php endif; ?>
				</section><!-- #hero -->
			<?php } ?>
				
				<?php $intro = get_field('introductory_section'); ?>
				<div id="introductorySection" class = "text-center my-4">
					<?php echo $intro['copy']; ?>
					<?php if ($intro['button_text']) : ?>
						<a href = "<?php echo $intro['button_link']; ?>"><button role = "button" class = "btn gold-button"><?php echo $intro['button_text']; ?></button></a>
					<?php endif; ?>
				</div><!-- #introductorySection -->
				
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
			
			<?php $pdf = get_field('pdf_file'); ?>
			<div class="embed-responsive embed-responsive-1by1" style = "height: 1850px;">
			<iframe src="https://docs.google.com/viewer?embedded=true&url=<?php echo $pdf['url']; ?>" style="width: 100%; height: 1850px; border: none;"></iframe>
			</div>

			<section class="container mt-5 mb-4">
				<div class="row">
					<div class="col-sm-12">
						<div class="contact-options d-flex flex-column justify-content-around align-items-center">
							<h3 class = "gold font-weight-bold mb-3 mb-md-0">Call to Save! <a href="tel:8002295008">800-229-5008</a></h3>
							<a href = "mailto:info@parkssuperior.com" target = "_blank" class="email">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<span>Message Us</span>
							</a><!-- .email -->
						</div><!-- .contact-options -->
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</section><!-- .container -->

			<section class = "container mb-5 d-flex justify-content-center">
				<div class="row">
					<div class="col-sm-12">
						<div class="buttons">
						<a href = "/inventory"><button role = "button" class = "btn gold-button w-100 mb-3">INVENTORY</button></a>
						<a href = "/financing"><button role = "button" class = "btn gold-button w-100">FINANCING</button></a>
						</div><!-- .buttons -->
					</div><!-- .col-sm-12 -->
				</div><!-- .row -->
			</section><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #ybNews -->
<?php get_footer(); ?>
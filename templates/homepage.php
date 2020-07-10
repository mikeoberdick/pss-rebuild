<?php
/**
 * Template Name: Homepage
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="homepage" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php $hero = get_field('hero'); ?>

				<?php if ( $hero['video_background'] ) { ?>
				<section id="hero">
					<video autoplay muted loop>
					  <source src="<?php echo $hero['video_background']['url']; ?>" type="video/mp4">
					</video>
					
					<div class="container position-absolute">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-5 text-shadow"><?php echo $hero['header']; ?></h1>
								<a href = '<?php echo $hero['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $hero['button_text']; ?></button></a>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
					
				</section><!-- #hero -->

				<?php } else { ?>
					<section id="hero" style = "background: url('<?php echo $hero['background']['url']; ?>');" class = "inset">
					<div class="container p-relative">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-5 text-shadow"><?php echo $hero['header']; ?></h1>
								<a href = '<?php echo $hero['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $hero['button_text']; ?></button></a>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #hero -->
				<?php } ?>

				<?php $sectionOne = get_field('section_one'); ?>
				<section id="sectionOne" class = "py-5 p-relative">
					<h1 class="h3 fancy"><?php echo $sectionOne['header']; ?></h1>
					[ SLIDER HERE ]
				</section><!-- #sectionOne -->

				<?php $sectionTwo = get_field('section_two'); ?>
				<section id="sectionTwo" style = "background: url('<?php echo $sectionTwo['background']['url']; ?>');" class = "py-5">
					<div class="container h-100">
						<div class="row d-flex flex-column justify-content-center h-100">
							<div class="col-md-4">
								<h1 class = "mb-3 text-shadow"><?php echo $sectionTwo['header']; ?></h1>
								<a href = '<?php echo $sectionTwo['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $sectionTwo['button_text']; ?></button></a>
							</div><!-- .col-md-4 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionTwo -->

				<?php get_template_part( 'snippets/about_video'); ?>

				<?php $sectionFour = get_field('section_four'); ?>
				<section id="sectionFour" class="d-flex flex-column justify-content-center" style = "background: url('<?php echo $sectionFour['background']['url']; ?>');" class = "py-5">
					<div class="container">
						<div class="row">
							<div id = "testimonialContent" class="col-md-5">
								<h1 class="mb-3 text-shadow"><?php echo $sectionFour['header']; ?></h1>
								<p class = "mb-5"><?php echo $sectionFour['sub_header']; ?></p>
								<a href = '<?php echo $sectionFour['page_link']; ?>'><button role = 'button' class = 'btn black-button'><?php echo $sectionFour['button_text']; ?></button></a>
							</div><!-- .col-md-5 -->
							<div class="col-md-7">
								<div>
									<?php echo $sectionFour['video']; ?>	
								</div>
							</div><!-- .col-md-7 -->
						</div><!-- .row -->	
					</div><!-- .container -->
				</section><!-- #sectionFour -->

				<?php $sectionFive = get_field('section_five'); ?>
				<section id="sectionFive" class="d-flex flex-column justify-content-center" style = "background: url('<?php echo $sectionFive['background']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-md-5 offset-md-7 text-right">
							<h1 class="mb-3 text-shadow"><?php echo $sectionFive['header']; ?></h1>
							<p class = "mb-3"><?php echo $sectionFive['sub_header']; ?></p>
							<!-- Constant Contact Inline Form -->
							<div class="ctct-inline-form" data-form-id="93ac4dba-c1c0-447f-a6a1-aaf4b874b73b"></div>
							<!-- End Constant Contact Form -->
						</div><!-- .col-md-5 offset-md-7 -->	
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionFive -->

				<?php $sectionSix = get_field('section_six'); ?>
				<section id="sectionSix" style = "background: url('<?php echo $sectionSix['background']['url']; ?>');" class = "py-5 text-center inset">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1 class="mb-3 text-shadow"><?php echo $sectionSix['header']; ?></h1>
								<h5 class = "mb-3"><?php echo $sectionSix['sub_header']; ?></h5>
								<p class = "mb-5"><?php echo $sectionSix['copy']; ?></p>
								<div>
								<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
								<a class = "mr-3" href="tel:<?php echo $phone ?>"><button role = 'button' class = 'btn gold-button'>Call Us</button></a>
								<a href = '/contact-us'><button role = 'button' class = 'btn gold-button'>Contact Us</button></a>	
							</div>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionSix -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- .page-wrapper -->
<?php get_footer(); ?>
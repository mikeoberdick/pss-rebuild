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
				<section id="hero" style = "background: url('<?php echo $hero['background']['url']; ?>');" class = "inset">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-5 text-shadow"><?php echo $hero['header']; ?></h1>
								<a href = '<?php echo $hero['button_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $hero['button_text']; ?></button></a>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
					
				</section><!-- #hero -->

				<?php $sectionOne = get_field('section_one'); ?>
				<section id="sectionOne" class = "py-5">
					<h1 class="h3 fancy"><?php echo $sectionOne['header']; ?></h1>
					[ SLIDER HERE ]
				</section><!-- #sectionOne -->

				<?php $sectionTwo = get_field('section_two'); ?>
				<section id="sectionTwo" style = "background: url('<?php echo $sectionTwo['background']['url']; ?>');" class = "py-5">
					<div class="container h-100">
						<div class="row d-flex flex-column justify-content-center h-100">
							<div class="col-md-4">
								<h1 class = "mb-3 text-shadow"><?php echo $sectionTwo['header']; ?></h1>
								<a href = '<?php echo $sectionTwo['button_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $sectionTwo['button_text']; ?></button></a>
							</div><!-- .col-md-4 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionTwo -->

				<?php $sectionThree = get_field('section_three'); ?>
				<section id="sectionThree" style = "background: url('<?php echo $sectionThree['background']['url']; ?>');" class = "py-5 d-flex flex-column justify-content-center">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<a data-toggle="modal" data-target="#hpModal">
								<h1 class="mb-3  text-shadow text-center"><?php echo $sectionThree['header']; ?></h1>
								<i class="fa fa-youtube-play fa-5x" aria-hidden="true"></i>
								</a>
							</div><!-- .col-sm-12 -->
							<div class="modal fade p-5" id="hpModal" tabindex="-1" role="dialog" aria-labelledby="About Parks Superior Video" aria-hidden="true">
							  <div class="modal-dialog modal-xl" role="document">
							    <div class="modal-content">
							      <div class="modal-body p-5">
							        <a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
										<div class = "text-center">
											<?php echo $sectionThree['video']; ?>
										</div>
							      </div><!-- .modal-body -->
							    </div><!-- .modal-content -->
							  </div><!-- .modal-dialog -->
							</div><!-- .modal -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionThree -->

				<?php $sectionFour = get_field('section_four'); ?>
				<section id="sectionFour" style = "background: url('<?php echo $sectionFour['background']['url']; ?>');" class = "py-5">
					<div class="container h-100">
						<div class="row d-flex flex-column justify-content-center h-100">
							<div id = "testimonialContent" class="col-md-5">
								<h1 class="mb-3 text-shadow"><?php echo $sectionFour['header']; ?></h1>
								<p class = "mb-5"><?php echo $sectionFour['sub_header']; ?></p>
								<a href = '<?php echo $sectionFour['button_link']; ?>'><button role = 'button' class = 'btn black-button'><?php echo $sectionFour['button_text']; ?></button></a>
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
				<section id="sectionFive" style = "background: url('<?php echo $sectionFive['background']['url']; ?>');">
					<div class="container h-100">
						<div class="row d-flex flex-column justify-content-center h-100">
							<div class="col-md-5 offset-md-7 text-right">
							<h1 class="mb-3 text-shadow"><?php echo $sectionFive['header']; ?></h1>
							<p class = "mb-5"><?php echo $sectionFive['sub_header']; ?></p>
							<div>[ FORM HERE ]<?php echo $sectionFive['button_text']; ?></div>
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
								<a href = '<?php echo $sectionSix['button_one_link']; ?>' class = "mr-3"><button role = 'button' class = 'btn gold-button'><?php echo $sectionSix['button_one_text']; ?></button></a>
								<a href = '<?php echo $sectionSix['button_two_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $sectionSix['button_two_text']; ?></button></a>	
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
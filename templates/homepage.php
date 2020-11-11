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

			<?php get_template_part( 'snippets/hp-hero-two'); ?>

				<?php $posts = get_posts(array(
					'post_type' => 'car',
					'posts_per_page' => 8,
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'creation_date',
						),
						array(
							'key' => 'flag',
							'value' => 'Sold',
							'compare' => '!='
						),
						array(
							'key' => 'flag',
							'value' => 'Deal Pending',
							'compare' => '!='
						),
						array(
							'key' => 'flag',
							'value' => 'Coming Soon',
							'compare' => '!='
						),
					),
					'orderby' => 'meta_value title',
					'order' => 'DESC'
    				));

				//If we are alphabetizing so newest years show first
				//foreach ($posts as $key => $value) {
				    //$returned_posts[] = get_the_ID();
				//}

				//$sorted = get_posts( array(
				    //'post_type'         => 'car',
				    //'post__in'          =>  $returned_posts,
				    //'orderby'           => 'title',
				    //'order'             => 'DESC',
				//);

    		//if( $sorted ):

			if( $posts ): ?>
			<?php $sectionOne = get_field('section_one'); ?>
			<section id="sectionOne" class = "py-5 p-relative container-fluid">
				<div class="row">
					<div class="col-sm-12 p-0">
						<h1 class="h2 fancy"><?php echo $sectionOne['header']; ?></h1>	
					</div><!-- .col-sm-12 -->	
				</div><!-- .row -->

				<div class="row position-relative">
					<div id="featuredSlider" class="col-sm-10 offset-sm-1">
					<?php //foreach( $sorted as $post ): setup_postdata( $post ); ?>
					<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
						
						<?php get_template_part( 'snippets/car'); ?>
					
					<?php endforeach; ?>
					</div><!-- #featuredSlider -->
					<div class="arrows"></div>
				</div><!-- .row -->
			</section><!-- #sectionOne -->
	
				<?php wp_reset_postdata(); ?>

				<?php endif; ?>
	
				<?php $sectionTwo = get_field('section_two'); ?>
				<section id="sectionTwo" class = "lazy py-5" data-bg = "<?php echo $sectionTwo['background']['url']; ?>" >
					<div class="container h-100">
						<div class="row d-flex flex-column justify-content-center h-100">
							<div class="col-lg-4 text-center text-lg-left">
								<h1 class = "mb-3 text-shadow"><?php echo $sectionTwo['header']; ?></h1>
								<a href = '<?php echo $sectionTwo['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $sectionTwo['button_text']; ?></button></a>
							</div><!-- .col-lg-4 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionTwo -->

				<?php get_template_part( 'snippets/about_video'); ?>

				<?php $sectionFour = get_field('section_four'); ?>
				<section id="sectionFour" class="d-flex flex-column justify-content-center lazy py-5" data-bg = "<?php echo $sectionFour['background']['url']; ?>">
					<div class="container">
						<div class="row">
							<div id = "testimonialContent" class="col-lg-5 text-center text-lg-left mb-3 mb-lg-0">
								<h1 class="mb-3 text-shadow"><?php echo $sectionFour['header']; ?></h1>
								<p class = "mb-5"><?php echo $sectionFour['sub_header']; ?></p>
								<a href = '<?php echo $sectionFour['page_link']; ?>'><button role = 'button' class = 'btn black-button'><?php echo $sectionFour['button_text']; ?></button></a>
							</div><!-- .col-lg-5 -->
							<div class="col-lg-7 mb-3 mb-lg-0">
								<?php 
								$images = $sectionFour['image_gallery'];
								$rand = array_rand($images, 1);
	
								if( $images ): ?>
									<div class = "img-fluid">
										<img src="<?php echo $images[$rand]['url']; ?>" alt="<?php echo $images[$rand]['alt']; ?>">
									</div><!-- .img-fluid -->
								<?php endif; ?>

								<div class = "img-fluid">
									<img src="<?php echo $sectionFour['image']['url']; ?>" alt="<?php echo $sectionFour['image']['alt']; ?>">
								</div>
							</div><!-- .col-md-7 -->
						</div><!-- .row -->	
					</div><!-- .container -->
				</section><!-- #sectionFour -->

				<?php $sectionFive = get_field('section_five'); ?>
				<section id="sectionFive" class="d-flex flex-column justify-content-center lazy" data-bg = "<?php echo $sectionFive['background']['url']; ?>">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 offset-lg-6 text-center text-lg-right">
							<h1 class="mb-3 text-shadow"><?php echo $sectionFive['header']; ?></h1>
							<p class = "mb-3"><?php echo $sectionFive['sub_header']; ?></p>
							<a data-toggle = "modal" data-target = "#carRequestModal"><button role = "button" class = "btn black-button w-100">Tell Us Your Dream Car</button></a>
						</div><!-- .col-lg-6 offset-lg-6 -->	
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #sectionFive -->

				<div class="modal fade contact-modal" id="carRequestModal" tabindex="-1" role="dialog" aria-labelledby="Request a Specific Car Contact Form" aria-hidden="true">
				  	<div class="modal-dialog modal-xl modal-dialog-centered" role="document" style = "background: url('/wp-content/themes/understrap-child/img/contact_bg.png');">
					    <div class="modal-content">
					    	<div class="modal-body p-3 p-md-5">
					    		<a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
								<div class="row">
									<div class="col-sm-12">
										<div class="text-center">
											<?php $logo = get_field('logo', 'options'); ?>
										<img id = "logo" class = "d-block mx-auto" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>">
										</div>
										<h3>Get the Car you’re looking for!</h3>
									<?php echo do_shortcode('[ninja_form id=7]'); ?>
									</div><!-- .col-sm-12 -->   	
								</div><!-- .row -->
					    	</div><!-- .modal-body -->
					  	</div><!-- .modal-content -->
					</div><!-- .modal-dialog -->
				</div><!-- .modal -->

				<?php $sectionSix = get_field('section_six'); ?>
				<section id="sectionSix" data-bg = "<?php echo $sectionSix['background']['url']; ?>" class = "py-5 text-center inset lazy">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<h1 class="mb-3 text-shadow"><?php echo $sectionSix['header']; ?></h1>
								<h5 class = "mb-3"><?php echo $sectionSix['sub_header']; ?></h5>
								<p class = "mb-5"><?php echo $sectionSix['copy']; ?></p>
								<div>
								<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
								<a class = "mr-3" href="tel:<?php echo $phone ?>"><button role = 'button' class = 'btn gold-button mb-3 mb-md-0'>Call Us</button></a>
								<a data-toggle = "modal" data-target = "#headerContactModal"><button role = 'button' class = 'btn gold-button'>Contact Us</button></a>	
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
<?php
/**
 * The template for displaying the single staff member page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="singleStaff" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<?php $bg = get_field('staff_page_hero_image', 'options'); ?>
				<section id = "hero" style = "background: url('<?php echo $bg['url']; ?>')">
					<div id="staffHero">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h1><?php the_field('staff_page_title', 'options'); ?></h1>
								</div><!-- .col-sm-12 -->
							</div><!-- .row -->
						</div><!-- .container -->
					</div><!-- #staffHero -->
				</section>

				<section id = "staffBio" class = "py-5">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="inner-container">
								<div class="wysiwyg">
									<?php the_field('bio'); ?>
								</div><!-- .wysiwyg -->	
								<h3 class = "gold mb-0"><?php the_title(); ?></h3>
								<?php if (get_field('phone_number')) : ?>
								<?php $office = preg_replace('/[^0-9]/', '', get_field('phone_number')); ?>
								<a class = "text-white" href="tel:<?php echo $office ?>"><?php the_field('phone_number'); ?></button></a>
							<?php endif; ?>
								</div><!-- .inner-container -->
							</div><!-- .col-md-6 -->
							<div class="col-md-6 d-flex justify-content-center align-items-center">
								<div class="inner-container">
								<?php $img = get_field('bio_image'); ?>
								<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">	
								</div><!-- .inner-container -->
							</div><!-- .col-md-6 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section>

				<section id = "featuredCars" class = "mb-5">
					<?php
					$fullName = get_the_title();
					$arr = explode(' ',trim($fullName));
					$firstName = $arr[0]; ?>
					<h3 class = "fancy gold"><?php echo $firstName . "'s "; ?>Featured Cars</h3>
					<div class="container">
						<?php $cars = get_field('featured_cars'); ?>
						<div class="row">
						<?php foreach ($cars as $post) { ?>
							<div class="col-md-6 car-wrapper text-center">
								<?php $imageList = get_field('images');
								$images = explode(',', $imageList); ?>
								<img class = "mb-3" src = "<?php echo $images[0]; ?>">
								<h5><?php the_title(); ?></h5>
								<a href = "<?php the_permalink(); ?>"><button role = "button" class = "btn gold-button w-50 font-weight-bold">See More</button></a>
							</div><!-- .car-wrapper -->
						<?php } wp_reset_postdata(); ?>
					</div><!-- .row -->
					</div><!-- .container -->
				</section>

				<section class = "mb-5">
					<div class="container">
						<div class="row content-wrapper p-5">
							<div class="col-md-5 text-right">
								<?php $img = get_field('profile_picture'); ?>
								<img class = "pr-lg-3 w-100 mb-3 mb-md-0" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							</div><!-- .col-md-5 -->
							<div class="col-md-7 contact-border text-center text-lg-left">
								<div class="pl-lg-3">
								<h3 class = "mb-0 red"><?php the_title(); ?></h3>
								<h5 class = "mb-3 gray font-weight-bold"><?php the_field('title'); ?></h5>
								<?php if (get_field('phone_number')) : ?>
								<?php $office = preg_replace('/[^0-9]/', '', get_field('phone_number')); ?>

								<a href="tel:<?php echo $office ?>"><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-phone mr-3" aria-hidden="true"></i>Call Office</button></a>
								<?php endif; ?>
								<a target = '_blank' href = 'mailto:<?php the_field('email'); ?>'><button role = 'button' class = 'btn gold-button w-100'><i class="fa fa-envelope-o mr-3" aria-hidden="true"></i>Email <?php echo $firstName; ?></button></a>	
								</div>
							</div><!-- .col-md-7 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section>

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #singleStaff -->
<?php get_footer(); ?>
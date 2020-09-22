<?php
/**
 * Template Name: Location Limo Page
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php
$location = get_field('location_variable');
$towns = get_field('town_list');
?>

<div id="locationLimo" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $hero = get_field('limo_hero', 'option' ); ?>
				<div id="hero" class = "mb-5 inset" style = "background: url('<?php echo $hero['hero_image']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['header'] . ' ' . $location; ?></h1>
								<h3 class = "text-shadow mb-0"><?php echo $hero['sub_header'] . ' ' . $location; ?></h3>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->
				
				<?php $intro = get_field('limo_introductory_section', 'option'); ?>
				<div id="introductorySection" class = "container">
					<div class="row">
						<div class="col-sm-12 mb-5">
							<div>
								<h3 class = "mb-3 text-center gold"><?php echo $intro['header'] . ' ' . $location; ?></h3>
								<p>Our 2020 inventory of New and Pre-Owned Hearses is ready for <?php echo $location; ?> customers. Looking for a dependable and affordable hearse for your business and not sure where to start? Start with Parks! We serve all of <?php echo $location; ?> and are known throughout the U.S. for our quality and with nearly 70 years in business.</p>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- #introductorySection -->

				<?php $sectionOne = get_field('limo_section_one', 'option'); ?>
				<div id="sectionOne" class = "container">
					<div class="row">
						<div class="col-sm-12 mb-5">
							<div class="content-wrapper p-4">
								<img class = "mb-3" src="<?php echo $sectionOne['image']['url']; ?>" alt="<?php echo $sectionOne['image']['alt']; ?>">
								<h3 class = "mb-3 text-center"><?php echo $sectionOne['header']; ?></h3>
								<p><?php echo $sectionOne['copy']; ?></p>
								<div class="button-links d-flex justify-content-center">
									<?php $one = $sectionOne['button_link_one']; ?>
									<a class = "mr-3" href = "<?php echo $one['button_link']; ?>"><button role = "button" class = "btn gold-button"><?php echo $one["button_text"] . ' ' . $location; ?></button></a>
									<?php $two = $sectionOne['button_link_two']; ?>
									<a href = "<?php echo $two['button_link']; ?>"><button role = "button" class = "btn gold-button"><?php echo $two["button_text"] . ' ' . $location; ?></button></a>
								</div><!-- .button-links -->
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- #sectionOne -->

				<div id="links" class = "container-fluid">
					<div class="row">
						<?php if ( have_rows('limo_links', 'option') ) : while ( have_rows('limo_links', 'option') ) : the_row(); ?>
						<div class="col-sm-12 mb-3">
							<a href="<?php the_sub_field('link_destination');  ?>"><h3 class = "text-center"><?php the_sub_field('link_text'); ?></h3></a>
						</div><!-- .col-sm-12 -->
					<?php endwhile; endif; ?>
					</div><!-- .row -->
				</div><!-- #links -->

				<?php $sectionTwo = get_field('limo_section_two', 'option'); ?>
				<div id="sectionTwo" class = "container">
					<div class="row">
						<div class="col-sm-12 mb-5">
							<div class="content-wrapper p-4">
								<h3 class = "mb-3 text-center"><?php echo $sectionTwo['header'] . ' ' . $location; ?></h3>
								<?php if ( $towns ) : ?>
								<p>Parks Superior Sales supports funeral business to the following towns in <?php echo $location; ?>:</p>
								<p><?php echo $towns; ?></p>
								<?php endif; ?>
								<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
								<p>We are just a phone call away: <a class = "gold" href="tel:<?php echo $phone ?>"><?php the_field('phone_number', 'option'); ?></a>. Dependability and Affordability is what Parks Superior Sales is all about.</p>
								<p>No other dealer has the inventory of new and pre-owned hearses for sale to <?php echo $location; ?> customers than we do. Parks Superior Sales - 70 years *  Eagle Coach 30+ years * Federal Coach 40+ years and Platinum Coach/MK Coach companies brought us in at their start a few years ago.</p>
								<p>At Parks Superior Sales, we have the experience in providing equipment financing to the funeral industry. We are experts at providing finance solutions that meet the needs of our customers through a unique combination of industry knowledge, exceptional services, tailored products and financial strength.</p>
								<p><?php echo $sectionTwo['copy']; ?></p>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- #sectionTwo -->

				<?php get_template_part( 'snippets/about_video'); ?>

				<?php $testimonial = get_field('limo_testimonial', 'option'); ?>
				<div id="testimonial" class = "container my-5">
					<div class="row">
						<div class="col-md-6">
							<h4 class = "mb-3 gold"><?php echo $testimonial['testimonial_header'];?></h4>
							<p>"<?php echo $testimonial['testimonial_copy']; ?>"</p>
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<img src="<?php echo $testimonial['testimonial_image']['url']; ?>" alt="<?php echo $testimonial['testimonial_image']['alt']; ?>">
						</div><!-- .col-md-6 -->
					</div><!-- .row -->
				</div><!-- #testimonial -->

				<div id="images" class = "container">
					<div class="row">
						<?php if ( have_rows('limo_image_gallery', 'option') ) : while ( have_rows('limo_image_gallery', 'option') ) : the_row(); ?>
						<div class="col-md-4">
							<?php $image = get_sub_field('image'); ?>
							<a href="<?php the_sub_field('link_destination');  ?>">
								<img class = "mb-3" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
							</a>
							<p class="caption gold small text-center text-uppercase"><?php the_sub_field('caption'); ?></p>
						</div><!-- .col-md-4 -->
						<?php endwhile; endif; ?>
					</div><!-- .row -->
				</div><!-- #images -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #locationLimo -->
<?php get_footer(); ?>
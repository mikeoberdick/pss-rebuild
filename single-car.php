<?php
/**
 * The template for displaying the single car page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="singleCar">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>

				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="back">
								<i class="fa fa-chevron-left mr-3" aria-hidden="true"></i><h5>Back to Inventory</h5>
							</div><!-- #back -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class = "row">
						<div class="col-md-8">
							<div>
								<?php the_field('video'); ?>
							</div>
						</div><!-- .col-md-8 -->
						<div class="col-md-4">
							<div class="price mb-3">
								<?php the_field('price'); ?>
							</div><!-- .price -->
							<div class="contact-buttons mb-3">
								<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
								<a href = 'tel:<?php echo $phone ?>'><button role = 'button' class = 'btn gold-button'><i class="fa fa-phone mr-3" aria-hidden="true"></i>Call Us</button></a>
								<a href = ''><button role = 'button' class = 'btn outline-button'><i class="fa fa-envelope mr-3" aria-hidden="true"></i>Message Us</button></a>
							</div><!-- .contact-buttons -->
							<div class="spec">
								<div class="icon-title">
									<img src="" alt="" class="mr-3"> Coachbuilder
								</div><!-- .icon-title -->
								<div class="value">
									<?php the_field('coachbuilder'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="" alt="" class="mr-3"> Drivetrain
								</div><!-- .icon-title -->
								<div class="value">
									<?php the_field('drivetrain'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="" alt="" class="mr-3"> Model
								</div><!-- .icon-title -->
								<div class="value">
									<?php the_field('model'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="" alt="" class="mr-3"> Miles
								</div><!-- .icon-title -->
								<div class="value">
									<?php echo get_field('miles') . ' miles'; ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="" alt="" class="mr-3"> Stock #
								</div><!-- .icon-title -->
								<div class="value">
									<?php the_field('stock'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="" alt="" class="mr-3"> Transmission
								</div><!-- .icon-title -->
								<div class="value">
									<?php the_field('transmission'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="" alt="" class="mr-3"> Engine Size
								</div><!-- .icon-title -->
								<div class="value">
									<?php the_field('engine'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
						</div><!-- .col-md-4 -->
					</div><!-- .row -->
					<div class="row mb-3">
						<?php $images = get_field('images'); ?>
						<?php foreach( $images as $image_id ): ?>
				            <div class = "col-md-2">
				                <?php echo wp_get_attachment_image( $image_id, $size ); ?>
				            </div><!-- .col-md-2 -->
				        <?php endforeach; ?>
				        <div class="col-sm-12 more-photos">
				        	<h5>More Photos<i class="fa fa-caret ml-3" aria-hidden="true"></i></h5>
				        </div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Description</h3>

				<div class="container mb-3">
					<div id = "description" class="row">
						<?php $description = get_field('description'); ?>
						<div class="col-sm-12">
							<div class="content-wrapper p-5">
								<h3 class = "mb-3"><?php echo $description['headline']; ?></h3>
								<p><?php the_title(); ?></p>
								<p class = "mb-3"><?php echo $description['vin']; ?></p>
								<p class = "mb-0"><?php echo $description['content']; ?></p>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Buyer's Guide</h3>

				<div class="container mb-3">
					<div id = "description" class="row">
						<?php $guide = get_field('buyers_guide'); ?>
						<div class="col-sm-12">
							<div class="content-wrapper p-5">
								<h3 class = "mb-3"><?php echo $guide['headline']; ?></h3>
								<p class = "mb-0"><?php echo $guide['copy']; ?></p>
							</div><!-- .description-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Specifications</h3>

				<div class="container mb-3">
					<div id = "specifications" class="row">
						<?php $guide = get_field('buyers_guide'); ?>
						<div class="col-sm-12">
							<div class="content-wrapper p-5">
								<ul class = "list-unstyled">
								  <?php
								    $list = get_field('body');
								    $items = explode(PHP_EOL, $list);
								    foreach($items as $item) {
								    echo '<li class = "d-flex">' . $item . '</li>';
								  } ?>
								</ul>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #specifications -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Financing</h3>

				<div class="container mb-3">
					<div id = "financing" class="row">
						<div class="col-sm-12">
							<div class="content-wrapper pt-3">
								<p id = "finance-bullets" class = "font-weight-bold mb-5">Same Day Approval &middot Simple Process &middot Competitive Rates &middot Industry Experts &middot We Cater to the Funeral Industry</p>
								<p class = "mb-3">We specialize in financing & leasing of both New and Pre-Owned Funeral Cars.</p>
								<p class = "mb-3">We offer a simple half page credit application, and can have you all approved in about an hour.  Offering terms from 24 to 72 months, we will custom tailor a finance or lease program around your specific needs.  Call today to find out just how quick and easy it is to get into the funeral car of your dreams.</p>
								<div class="mb-3">
									<a href = '#' class = "mr-3"><button role = 'button' class = 'btn gold-button'>Download Credit Application</button></a>
									<a href = '/financing'><button role = 'button' class = 'btn gold-button'>Learn More</button></a>
								</div>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

<?php get_template_part( 'snippets/about_video'); ?>

				<div class="container mb-3">
					<div id = "contactForm" class="row">
						<div class="col-sm-12">
							[ CONTACT FORM ]
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Related Cars</h3>

				<div class="container pb-5">
					<div id = "relatedCars" class="row">
						<div class="col-sm-12">
							[ RELATED CARS ]
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #singleCar -->
<?php get_footer(); ?>
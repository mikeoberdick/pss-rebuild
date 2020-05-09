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
				
				<?php $images = get_field('images'); ?>

				<div class="container">
					<div class="row mb-3">
						<div class="col-sm-12 text-right">
							<a href = "/inventory" class="back d-flex justify-content-end align-items-center">
								<i class="fa fa-chevron-left mr-2" aria-hidden="true"></i><h5 class = "gold mb-0">Back to Inventory</h5>
							</a><!-- #back -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class = "row mb-3">
						<div class="col-md-8">
							<?php if ( get_field('video') ) : ?>
								<div class = 'hero-content'>
									<?php the_field('video'); ?>
								</div>
							<?php else : ?>
								<img src="<?php echo $images[0]['url']; ?>" alt="Featured Image">
								
							<?php endif; ?>
						</div><!-- .col-md-8 -->
						<div class="col-md-4">
							<h3 class="price mb-3"><?php echo '$' . get_field('price'); ?></h3>
							<div class="contact-buttons mb-3">
								<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
								<a href = 'tel:<?php echo $phone ?>'><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-phone mr-2" aria-hidden="true"></i>Call Us</button></a>
								<a href = '#'><button role = 'button' class = 'btn white-outline-button w-100'><i class="fa fa-envelope mr-2" aria-hidden="true"></i>Message Us</button></a>
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
					<div id = "carGallery" class="row mb-3">
						<?php $i = 0; ?>
						<?php foreach( $images as $image ): ?>
				            <div class = "col-md-2 gallery-photo mb-3<?php if ( $i >= 12 ) {echo ' hidden';} ?>">
				                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
				            </div><!-- .col-md-2 -->
				            <?php $i++; ?>
				        <?php endforeach; ?>
				        <div class="col-sm-12">
				        	<div class="more-photos">
				        		<h5><span>More Photos</span><i class="fa fa-caret-down ml-3" aria-hidden="true"></i></h5>
				        	</div><!-- .more-photos -->
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
								<p><?php echo $description['content']; ?></p>
								<p class = "mb-0 callout">We love these cars...let us show you the Parks Difference! Call us today at <a href = 'tel:<?php echo $phone ?>'><?php the_field('phone_number', 'option'); ?>.</a></p>
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

				<div id = "specifications" class="container mb-3">
					<div class="col-sm-12">
						
						<ul class="nav mb-3 d-flex" id="pills-tab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="pills-mechanics-tab" data-toggle="pill" href="#pills-mechanics" role="tab" aria-controls="pills-mechanics" aria-selected="true"><h4 class = "text-center mb-0 black">Mechanics</h4></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="pills-body-tab" data-toggle="pill" href="#pills-body" role="tab" aria-controls="pills-body" aria-selected="false"><h4 class = "text-center mb-0 black">Body</h4></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="pills-interior-tab" data-toggle="pill" href="#pills-interior" role="tab" aria-controls="pills-interior" aria-selected="false"><h4 class = "text-center mb-0 black">Interior</h4></a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="pills-exterior-tab" data-toggle="pill" href="#pills-exterior" role="tab" aria-controls="pills-exterior" aria-selected="false"><h4 class = "text-center mb-0 black">Exterior</h4></a>
						  </li>
						</ul>

						<div class="tab-content content-wrapper p-5" id="pills-tabContent p-5">
						  
						<div class="tab-pane fade show active" id="pills-mechanics" role="tabpanel" aria-labelledby="pills-mechanics-tab">
							<ul class = "list-unstyled">
							  <?php
							    $list = get_field('mechanics');
							    $items = explode(PHP_EOL, $list);
							    foreach($items as $item) {
							    echo '<li class = "d-flex">' . $item . '</li>';
							  } ?>
							</ul>
						</div>

						<div class="tab-pane fade" id="pills-body" role="tabpanel" aria-labelledby="pills-body-tab">
							<ul class = "list-unstyled">
							  <?php
							    $list = get_field('body');
							    $items = explode(PHP_EOL, $list);
							    foreach($items as $item) {
							    echo '<li class = "d-flex">' . $item . '</li>';
							  } ?>
							</ul>
						</div>

						<div class="tab-pane fade" id="pills-interior" role="tabpanel" aria-labelledby="pills-interior-tab">
							<ul class = "list-unstyled">
							  <?php
							    $list = get_field('interior');
							    $items = explode(PHP_EOL, $list);
							    foreach($items as $item) {
							    echo '<li class = "d-flex">' . $item . '</li>';
							  } ?>
							</ul>
						</div>

						<div class="tab-pane fade" id="pills-exterior" role="tabpanel" aria-labelledby="pills-exterior-tab">
							<ul class = "list-unstyled">
							  <?php
							    $list = get_field('exterior');
							    $items = explode(PHP_EOL, $list);
							    foreach($items as $item) {
							    echo '<li class = "d-flex">' . $item . '</li>';
							  } ?>
							</ul>
						</div>

						</div><!-- .content-wrapper -->
					</div><!-- .row -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Financing</h3>

				<div class="container mb-3">
					<div id = "financing" class="row">
						<div class="col-sm-12">
							<div class="content-wrapper pt-4 pb-5 text-center">
								<p id = "financeBullets" class = "font-weight-bold mb-5">Same Day Approval &middot Simple Process &middot Competitive Rates &middot Industry Experts &middot We Cater to the Funeral Industry</p>
								<div class="px-5">
									<p class = "mb-3">We specialize in financing & leasing of both New and Pre-Owned Funeral Cars.</p>
									<p class = "mb-5">We offer a simple half page credit application, and can have you all approved in about an hour.  Offering terms from 24 to 72 months, we will custom tailor a finance or lease program around your specific needs.  Call today to find out just how quick and easy it is to get into the funeral car of your dreams.</p>
									<div>
										<a href = '#' class = "mr-3"><button role = 'button' class = 'btn gold-button'>Download Credit Application</button></a>
										<a href = '/financing'><button role = 'button' class = 'btn gold-button'>Learn More</button></a>	
									</div>
								</div>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

				<?php get_template_part( 'snippets/about_video'); ?>
				
				<?php $contact = get_field('contact_form', 'option'); ?>
					<div id = "contactForm" style = "background: url('/wp-content/themes/understrap-child/img/contact_bg.png');" class = 'py-5'>
						<div class="container">
							<div class="row">
								<div class="col-sm-12 text-center">
									<h3 class = "mb-0 black text-shadow">See Something You Like?</h3>
									<h1 class="black text-shadow">Contact Us</h1>
									<p class = "mb-5 black text-shadow">Send an email to our team using the form below and a member of our staff will contact you as soon as possible.</p>
									<?php echo do_shortcode('[ninja_form id=1]'); ?>
								</div><!-- .col-sm-12 -->	
							</div><!-- .row -->
						</div><!-- .container -->
					</div><!-- #contactForm -->

					<div id="relatedCars" class = "py-5">
						<h3 class="fancy mb-3">Related Cars</h3>
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-12">
									[ RELATED CARS WILL SHOW FOUR MOST RECENT CARS POSTED IN THIS TAXONOMY ]
								</div><!-- .col-sm-12 -->
							</div><!-- .row -->
						</div><!-- .container-fluid -->
					</div><!-- #relatedCars -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #singleCar -->
<?php get_footer(); ?>
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

<div id="singleCar" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $imageList = get_field('images');
				$images = explode(',', $imageList); ?>

				<div class="container mt-3">
					<div class="row mb-3">
						<div class="col-sm-12 text-right">
						<a href = "/inventory" id = "backToInventory" class="back d-inline-flex justify-content-end align-items-center">
								<i class="fa fa-chevron-left mr-2" aria-hidden="true"></i><h5 class = "gold mb-0">Back to Inventory</h5>
							</a><!-- #back -->	
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class = "row mb-3">
						<div class="col-md-8">
							<div id="imageViewer" class = "position-relative">
								<img src="<?php echo $images[0]; ?>" alt="Featured Image">
								<div id="galleryNav" class = "position-absolute">
									<div id="prev">
										<div class = "icon-wrapper">
										<i class="fa fa-chevron-circle-left" aria-hidden="true" title = "Previous Image"></i></div>	
										</div>
									<div id="next">
										<div class="icon-wrapper">
										<i class="fa fa-chevron-circle-right" aria-hidden="true" title = "Next Image"></i>	
										</div>
									</div>
								</div><!-- #galleryNav -->
							</div><!-- #imageViewer -->
							<div id="videoViewer" class = "d-none embed-responsive embed-responsive-16by9">
								<?php $iframe = get_field('video');
								preg_match('/src="(.+?)"/', $iframe, $matches);
								$src = $matches[1];
								$params = array(
								    'controls'  => 0,
								    'hd'        => 1,
								    'autohide'  => 1
								);
								$new_src = add_query_arg($params, $src);
								$iframe = str_replace($src, $new_src, $iframe);
								$attributes = 'frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

echo $iframe; ?>


								</div>
						</div><!-- .col-md-8 -->
						<div class="col-md-4">
							<?php $price = get_field('price'); ?>
							<h3 class="price mb-3"><?php if ($price) {echo '$' . $price;} else { echo 'Call For Pricing'; }
								?>
							</h3>
							<div class="contact-buttons mb-3">
								<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
								<a href = 'tel:<?php echo $phone ?>'><button id = "callUs" role = 'button' class = 'mr-2 btn gold-button'><i class="fa fa-phone mr-2" aria-hidden="true"></i>Call Us</button></a>
								<a href = '#'><button role = 'button' class = 'btn white-outline-button'><i class="fa fa-envelope mr-2" aria-hidden="true"></i>Message Us</button></a>
							</div><!-- .contact-buttons -->
							<div class="spec">
								<div class="icon-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/coachbuilder.png" alt="" class="mr-3"> Coachbuilder
								</div><!-- .icon-title -->
								<div class="value gold">
									<?php the_field('coachbuilder'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/model.png" alt="" class="mr-3"> Model
								</div><!-- .icon-title -->
								<div class="value gold">
									<?php the_field('model'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/miles.png" alt="" class="mr-3"> Mileage
								</div><!-- .icon-title -->
								<div class="value gold">
									<?php echo get_field('miles') . ' miles'; ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="spec">
								<div class="icon-title">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/stock_number.png" alt="" class="mr-3"> Stock #
								</div><!-- .icon-title -->
								<div class="value gold">
									<?php the_field('stock'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="jump-link">
								<a href="#specifications"><h5 class = "gold text-center"><span>More Details</span> <i class="ml-1 fa fa-arrow-down" aria-hidden="true"></i></h5></a>
							</div><!-- .jump-link -->
						</div><!-- .col-md-4 -->
					</div><!-- .row -->
					<div id = "carGallery" class="row mb-3">
<div class = "col-md-2 video-thumb mb-3">
	<div class="video-image-wrapper position-relative d-flex justify-content-center align-items-center">
		<img src="http://placehold.it/550x350" alt="">
		<i class="fa fa-youtube-play" aria-hidden="true"></i>
	</div>
</div>
						<?php $i = 0; ?>
						<?php foreach ($images as $image) { ?>
<div class = "col-md-2 gallery-thumb mb-3 <?php if ( $i === 0 ) {echo 'selected';} ?><?php if ( $i >= 11 ) {echo 'hidden';} ?>">
							<div class="image-wrapper position-relative">
								<img src="<?php echo $image; ?>" alt="">
							</div><!-- .image-wrapper -->
				        </div><!-- .col-md-2 -->
						<?php $i++; } ?>
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
						<div class="col-sm-12">
							<div class="content-wrapper p-5 text-center">
								<h3><?php the_title(); ?></h3>
								<h5 class = "mb-3"><span class = "font-weight-bold">Stock Number: </span><?php the_field('stock'); ?></h5>
								<p><?php the_field('description'); ?></p>
								<p class = "mb-0 callout">We love these cars...let us show you the Parks Difference! Call us today at <a href = 'tel:<?php echo $phone ?>'><?php the_field('phone_number', 'option'); ?>.</a></p>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Buyer's Guide</h3>

				<div class="container mb-3">
					<div id = "buyersGuide" class="row">
						<div class="col-sm-12">
							<div class="content-wrapper p-5">
								<ul class = "list-info list-inline">
									<li><h4 class = "mr-3 gold">Warranty</h4><h4><?php the_field('warranty'); ?></h4></li>

									
									<?php if (get_field('warranty_other')) : ?>
									<li><h4 class = "mr-3 gold">Warranty Other</h4><h4><?php the_field('warranty_other'); ?></h4></li>
								<?php endif; ?>
								</ul>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #buyersGuide -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Specifications</h3>

				<div id = "specifications" class="container mb-3">
					<div class="col-sm-12">
						
						<ul class="nav mb-3 d-flex" id="pills-tab" role="tablist">

						<li class="nav-item">
						    <a class="nav-link active" id="pills-options-tab" data-toggle="pill" href="#pills-options" role="tab" aria-controls="pills-options" aria-selected="true"><h4 class = "text-center mb-0 black">Options</h4></a>
						  </li>
						  
						  <li class="nav-item">
						    <a class="nav-link" id="pills-mechanical-tab" data-toggle="pill" href="#pills-mechanical" role="tab" aria-controls="pills-mechanical" aria-selected="false"><h4 class = "text-center mb-0 black">Mechanical</h4></a>
						  </li>
						  
						  <li class="nav-item">
						    <a class="nav-link" id="pills-colors-tab" data-toggle="pill" href="#pills-colors" role="tab" aria-controls="pills-colors" aria-selected="false"><h4 class = "text-center mb-0 black">Colors</h4></a>
						  </li>
						</ul>

						<div class="tab-content content-wrapper p-5" id="pills-tabContent p-5">
						  
						<div class="tab-pane fade show active" id="pills-options" role="tabpanel" aria-labelledby="pills-options-tab">
							<ul class = "list-unstyled">
							  <?php
							    $list = get_field('options');
							    $items = explode('-', $list);
							    foreach($items as $item) {
							    echo '<li><h5>' . $item . '</h5></li>';
							  } ?>
							</ul>
						</div>

						<div class="tab-pane fade" id="pills-mechanical" role="tabpanel" aria-labelledby="pills-mechanical-tab">
							<ul class = "list-info list-inline">
								<li><h4 class = "mr-3 gold">Drivetrain</h4><h4><?php the_field('drivetrain'); ?></h4></li>
								<li><h4 class = "mr-3 gold">Transmision</h4><h4><?php the_field('transmission'); ?></h4></li>
								<li><h4 class = "mr-3 gold">Engine</h4><h4><?php the_field('engine'); ?></h4></li>
								</ul>
						</div>

						<div class="tab-pane fade" id="pills-colors" role="tabpanel" aria-labelledby="pills-colors-tab">
							<ul class = "list-info list-inline">
								<li>
								<h4 class = "mr-3 gold">Exterior Color</h4>
								<h4><?php the_field('exterior_color'); ?></h4>
								</li>
								<li>
								<h4 class = "mr-3 gold">Interior Color</h4>
								<h4><?php the_field('interior_color'); ?></h4>
								</li>
								<li>
								<h4 class = "mr-3 gold">Top Color</h4>
								<h4><?php the_field('top_color'); ?></h4>
								</li>
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
								<p id = "financeBullets" class = "font-weight-bold mb-5">Same Day Approval &middot Simple Process &middot Competitive Rates &middot Industry Experts &middot We Cater to the Funeral Industry Specialists</p>
								<div class="px-5">
									<p class = "mb-3">We specialize in financing & leasing of both New and Pre-Owned Funeral Cars.</p>
									<p class = "mb-5">We offer a simple half page credit application, and can have you all approved in about an hour.  Offering terms from 24 to 72 months, we will custom tailor a finance or lease program around your specific needs.  Call today to find out just how quick and easy it is to get into the funeral car of your dreams.</p>
									<div>
										<?php $creditApp = get_field('credit_application_file', 270); ?>
							<a target = "_blank" href = '<?php echo $creditApp['url']; ?>'><button role = 'button' class = 'btn gold-button mr-3'><i class="fa fa-check-circle mr-3" aria-hidden="true"></i>Download Credit Application</button></a>
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
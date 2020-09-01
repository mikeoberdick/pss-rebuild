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
				<?php $imageCount = count($images); ?>

				<div class="container mt-3">
					<div class="row mb-3">
						<div class="col-sm-12 text-right">
						<a href = "/inventory" class="back d-inline-flex justify-content-end align-items-center">
								<i class="fa fa-chevron-left mr-2" aria-hidden="true"></i><h5 class = "gold mb-0">Back to Inventory</h5>
							</a><!-- #back -->	
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->

					<div id = "mainInfo" class = "row mb-3">
						<div class="col-lg-8">
							<?php $flag = get_field('flag'); ?>
							<div id="imageViewer" class = "position-relative">
								<?php if ($flag === 'Parks Auction') : ?>
									<a href="http://auction.parkssuperior.com/">
									<img id = "auctionLink" src="<?php echo get_stylesheet_directory_uri() . '/img/parks_auction_button.png' ?>" alt="Parks Auction Car: Click to Bid!"></a>
								<?php endif;?>
								<?php if ($flag === 'EBay Auction') : ?>
									<a target = "_blank" href="https://www.ebay.com/str/parkssuperiorsalesinc">
									<img id = "auctionLink" src="<?php echo get_stylesheet_directory_uri() . '/img/ebay_auction_button.png' ?>" alt="Parks Auction Car: Click to Bid!"></a>
								<?php endif;?>
								<?php if ($imageCount > 1) : ?>
								<div data-toggle="modal" data-target="#exampleModal">
								<a id = "modalLauncher" class = "position-absolute"  data-target="#carouselExample" data-slide-to="0" class = "position-absolute" href = '<?php echo bloginfo('url'); ?>/'><button role = 'button' class = 'btn gold-button'>VIEW HD IMAGES</button></a></div>
								<?php endif; ?>
								<img id = "featuredImage" class = "w-100" src="<?php echo $images[0] . '?h=460&w=730'; ?>" alt="Featured Image" data-slide-to = "0">
								<?php if ($imageCount > 1) : ?>
								<div id="galleryNav" class = "position-absolute">
									<div id="prev" class = "mb-3">
										<img src="<?php echo get_stylesheet_directory_uri() . '/img/prev.png' ?>" alt="Previous Image">
									</div>	
									<div id="next">
										<img src="<?php echo get_stylesheet_directory_uri() . '/img/next.png' ?>" alt="Next Image">	
									</div>
								</div><!-- #galleryNav -->
							<?php endif; ?>
							</div><!-- #imageViewer -->
							
							<?php //Get the video url and then strip everything after and including the ? so it's just the ID
							$videoURL = get_field('video');
							$videoID = strtok($videoURL, '?'); ?>
							<?php if ($videoURL) : ?>
							<div id="videoViewer" class = "d-none embed-responsive embed-responsive-16by9">
								<iframe class = "embed-responsive-item lazy" width="560" height="315" data-src="https://www.youtube.com/embed/<?php echo $videoID; ?>?version=3&loop=1&playlist=<?php echo $videoID; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div><!-- #videoViewer -->
						<?php endif; ?>
						</div><!-- .col-lg-8 -->
						<div class="col-lg-4 mt-3 mt-lg-0">
							<?php $price = get_field('price'); ?>
							<h3 class="price mb-3 text-center">
								<?php if ( !empty($price) ) {
								$formattedPrice = number_format($price);
								echo '$' . $formattedPrice;
							} else { echo 'Call For Pricing'; }
								?>
							</h3>
							<div class="contact-buttons mb-3">
								<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
								<a href = 'tel:<?php echo $phone ?>'><button id = "callUs" role = 'button' class = 'mr-2 btn gold-button mb-3'><i class="fa fa-phone mr-2" aria-hidden="true"></i>Call Us</button></a>
								<a data-toggle = "modal" data-target = "#contactModal"><button role = 'button' class = 'btn white-outline-button'><i class="fa fa-envelope mr-2" aria-hidden="true"></i>Message Us</button></a>
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
								<div id = "stock" class="value gold">
									<?php the_field('stock'); ?>
								</div><!-- .value -->
							</div><!-- .spec -->
							<div class="jump-link">
								<a href="#specifications"><h5 class = "gold text-center"><span>More Details</span> <i class="ml-1 fa fa-arrow-down" aria-hidden="true"></i></h5></a>
							</div><!-- .jump-link -->
						</div><!-- .col-lg-4 -->
					</div><!-- .row -->
					<?php if ($imageCount > 1) : ?>
					<div id = "carGallery" class="row mb-3">
<?php if ($videoURL) : ?>
<div class = "col-6 col-md-2 thumb video-thumb mb-3">
	<div class="video-image-wrapper position-relative d-flex justify-content-center align-items-center">

		<img src="http://img.youtube.com/vi/<?php echo $videoID ?>/1.jpg" alt="">
		<i class="fa fa-youtube-play" aria-hidden="true"></i>
	</div>
</div><!-- .video-thumb -->
<?php endif; ?>
						<?php $i = 0; ?>
						<?php foreach ($images as $image) { ?>
<div class = "col-6 col-md-2 thumb gallery-thumb mb-3 <?php if ( $i === 0 ) {echo 'selected';} ?><?php if ( $i >= 11 && !empty($videoURL) ) {echo 'hidden';} elseif ( $i >= 12 && empty($videoURL) ) {echo 'hidden';} ?>">
							<div class="image-wrapper position-relative">
								<img src="<?php echo $image . '?h=180&w=240'; ?>" alt="" data-slide-to = "<?php echo $i; ?>">
							</div><!-- .image-wrapper -->
				        </div><!-- .col-md-2 -->
						<?php $i++; } ?>
						
						<?php if($imageCount >= 10) : ?>
				        <div class="col-sm-12">
				        	<div class="more-photos">
				        		<h5><span>More Photos</span><i class="fa fa-caret-down ml-3" aria-hidden="true"></i></h5>
				        	</div><!-- .more-photos -->
				        </div><!-- .col-sm-12 -->
						<?php endif; ?>
					</div><!-- .row -->
				<?php endif; ?>
				</div><!-- .container -->

				<h3 class="fancy mb-3">Description</h3>

				<div class="container mb-3">
					<div id = "description" class="row">
						<div class="col-sm-12">
							<div class="content-wrapper p-5 text-center">
								<h3><?php the_title(); ?></h3>
								<h5 class = "mb-3"><span class = "font-weight-bold">Stock Number: </span><?php the_field('stock'); ?></h5>
								<p><?php the_field('description'); ?></p>
								<p class = "mb-0 callout"><?php the_field('description_box_footer','option'); ?></p>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

			<?php if ( get_field('warranty') || get_field('warranty_other') ) : ?>
				<h3 class="fancy mb-3">Buyer's Guide</h3>

				<div class="container mb-3">
					<div id = "buyersGuide" class="row">
						<div class="col-sm-12">
							<div class="content-wrapper p-5">
								<ul class = "list-info list-inline">
									<?php if (get_field('warranty')) : ?>
									<li><h4 class = "mr-3 gold">Warranty</h4><h4><?php the_field('warranty'); ?></h4></li>
									<?php endif; ?>
									
									<?php if (get_field('warranty_other')) : ?>
									<li><h4 class = "mr-3 gold">Details</h4><h4><?php the_field('warranty_other'); ?></h4></li>
								<?php endif; ?>
								</ul>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #buyersGuide -->
				</div><!-- .container -->
			<?php endif; ?>

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
							    $items = explode(' - ', $list);
							    foreach($items as $item) {
							    echo '<li><h5>' . $item . '</h5></li>';
							  } ?>
							</ul>
						</div>

						<div class="tab-pane fade" id="pills-mechanical" role="tabpanel" aria-labelledby="pills-mechanical-tab">
							<ul class = "list-info list-inline">
								<?php if ( get_field('drivetrain') ) : ?>
								<li><h4 class = "mr-3 gold">Drivetrain</h4><h4><?php the_field('drivetrain'); ?></h4></li>
								<?php endif; ?>
								<?php if ( get_field('transmission') ) : ?>
								<li><h4 class = "mr-3 gold">Transmision</h4><h4><?php the_field('transmission'); ?></h4></li>
								<?php endif; ?>
								<?php if ( get_field('engine') ) : ?>
								<li><h4 class = "mr-3 gold">Engine</h4><h4><?php the_field('engine'); ?></h4></li>
								<?php endif; ?>
								</ul>
						</div>

						<div class="tab-pane fade" id="pills-colors" role="tabpanel" aria-labelledby="pills-colors-tab">
							<ul class = "list-info list-inline">
							<?php if ( get_field('exterior_color') ) : ?>
								<li>
								<h4 class = "mr-3 gold">Exterior Color</h4>
								<h4><?php the_field('exterior_color'); ?></h4>
								</li>
							<?php endif; ?>
							<?php if ( get_field('interior_color') ) : ?>
								<li>
								<h4 class = "mr-3 gold">Interior Color</h4>
								<h4><?php the_field('interior_color'); ?></h4>
								</li>
							<?php endif; ?>
							<?php if ( get_field('top_color') ) : ?>
								<li>
								<h4 class = "mr-3 gold">Top Color</h4>
								<h4><?php the_field('top_color'); ?></h4>
								</li>
							<?php endif; ?>
							</ul>
						</div>
						</div><!-- .content-wrapper -->
					</div><!-- .row -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Financing</h3>

				<div class="container">
					<div id = "financing" class="row">
						<div class="col-sm-12 pb-5">
							<div class="content-wrapper pt-4 pb-5 text-center" style = "background: url('<?php echo get_stylesheet_directory_uri() . '/img/finance_bg.png' ?>');">
								<p id = "financeBullets" class = "font-weight-bold mb-5">Same Day Approval &middot Simple Process &middot Competitive Rates &middot Industry Experts &middot We Cater to the Funeral Industry Specialists</p>
								<div class="px-5">
									<p class = "mb-3">We specialize in financing & leasing of both New and Pre-Owned Funeral Cars.</p>
									<p class = "mb-5">We offer a simple half page credit application, and can have you all approved in about an hour.  Offering terms from 24 to 72 months, we will custom tailor a finance or lease program around your specific needs.  Call today to find out just how quick and easy it is to get into the funeral car of your dreams.</p>
									<div>
										<?php $creditApp = get_field('credit_application_file', 270); ?>
							<a target = "_blank" href = '<?php echo $creditApp['url']; ?>'><button role = 'button' class = 'btn gold-button mr-3 mb-3 mb-md-0'><i class="fa fa-check-circle mr-3" aria-hidden="true"></i>Download Credit Application</button></a>
							<a href = '/financing'><button role = 'button' class = 'btn gold-button'><i class="fa fa-question mr-3" aria-hidden="true"></i>Learn More</button></a>	
									</div>
								</div>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- #description -->
				</div><!-- .container -->

<?php
$year = get_field('year');
$make = get_field('make');
$body = get_field('body');

//Set the query to car post type, get 4 published posts, randomly ordered, and including the model taxonomy terms for this car
$args = array(
    'post_type' => 'car',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'orderby' => 'rand',
    'post__not_in' => array ($post->ID),
    'meta_query' => array(
    	'relation' => 'AND',
    	array(
            'key' => 'year',
            'value' => $year,
            'compare' => '='
        ),
        array(
            'key' => 'body',
            'value' => $body,
            'compare' => '='
        )
	),
);

//the query
$relatedPosts = new WP_Query( $args );
$relatedCount = $relatedPosts->post_count;

if ($relatedCount < 4) { ?>
<?php //get the IDs of the related posts so we don't show them again
	if ( $relatedPosts->have_posts() ) : $relatedPostIds = array(); while ( $relatedPosts->have_posts() ) :  $relatedPosts-> the_post();
		$relatedPostIds[] = get_the_ID();
	endwhile; endif; wp_reset_postdata();

	$newCount = 4 - $relatedCount;
	$args = array(
    'post_type' => 'car',
    'post_status' => 'publish',
    'posts_per_page' => $newCount,
    'orderby' => 'rand',
    'post__not_in' => array($relatedPostIds, $post->ID)
);
}
$secondaryPosts = new WP_Query( $args );
		
		//Loop through the query
		if ( $relatedPosts->have_posts() || $secondaryPosts->have_posts()  ) { ?>
			<div id="relatedCars" class = "py-5">
				<h3 class="fancy mb-3">Related Cars</h3>
				<?php  ?>
					<div class="container-fluid">
						<div class="row">
						    <?php while ( $relatedPosts->have_posts() ) { 
						        $relatedPosts-> the_post(); ?>
						        <div class="col-sm-6 col-lg-3 related-post mb-3 mb-lg-0">
						        	<?php get_template_part( 'snippets/car'); ?>
						        </div><!-- .col-md-3 -->
							<?php } ?>
							<?php if ($relatedCount < 4) :
								while ( $secondaryPosts->have_posts() ) { 
						        $secondaryPosts-> the_post(); ?>
						        <div class="col-sm-6 col-lg-3 secondary-post mb-3 mb-lg-0">
						        	<?php get_template_part( 'snippets/car'); ?>
						        </div><!-- .col-md-3 -->
							<?php } endif; ?>
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</div><!-- #relatedCars -->
		<?php } else {
			echo 'no posts';
		}

		//restore original post data
		wp_reset_postdata();

		?>
		<div id = "backToInventory" class = "text-center pb-5">
			<a href="/inventory" class="d-inline-flex justify-content-end align-items-center">
				<i class="fa fa-3x fa-chevron-left mr-4" aria-hidden="true"></i><h1 class="gold mb-0">Back to Inventory</h1>
			</a>	
		</div><!-- #backToInventory -->

		<?php get_template_part( 'snippets/about_video' ); ?>
		<?php get_template_part( 'snippets/contact_form' ); ?>

					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="mb-3">
      <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
          	<?php $i = 1; ?>
						<?php foreach ($images as $image) { ?>


<div class="carousel-item <?php if ( $i === 1 ) {echo 'active';} ?>">
              <img class="img-fluid" src="<?php echo $image; ?>" data-slide-to = "<?php echo $i; ?>">
            </div>
						<?php $i++; } ?> 
          </div>
        </div>
      </div>
      <div class="d-flex mb-3 justify-content-center align-items-center">
      	<a class="" href="#carouselExample" role="button" data-slide="prev">
            <i class="fa fa-chevron-left mr-5 fa-2x" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
        <button type="button" class="btn gold-button" data-dismiss="modal">Close</button>
        <a class="" href="#carouselExample" role="button" data-slide="next">
            <i class="fa fa-chevron-right ml-5 fa-2x" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade contact-modal" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="Contact Form" aria-hidden="true">
  	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
	    <div class="modal-content">
	    	<div class="modal-body p-3 p-md-5">
	    		<a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center">
							<?php $logo = get_field('logo', 'options'); ?>
						<img id = "logo" class = "d-block mx-auto" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>">
						</div>
						<h3>Like what you see?</h3>
					<?php echo do_shortcode('[ninja_form id=6]'); ?>
					</div><!-- .col-sm-12 -->   	
				</div><!-- .row -->
	    	</div><!-- .modal-body -->
	  	</div><!-- .modal-content -->
	</div><!-- .modal-dialog -->
</div><!-- .modal -->




			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #singleCar -->
<?php get_footer(); ?>
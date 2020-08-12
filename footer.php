<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<div class="modal fade p-5" id="aboutVideoModal" tabindex="-1" role="dialog" aria-labelledby="About Parks Superior Video" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body p-5">
        <a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
			<div class = "text-center embed-responsive embed-responsive-16by9">
				<?php $aboutVideoModal = get_field('about_video', 'option'); ?>
				<?php echo $aboutVideoModal['video']; ?>
			</div>
      </div><!-- .modal-body -->
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->

<footer id="wrapper-footer" class="wrapper pb-5">

	<div id = "footerNavWrapper" class="container-fluid mb-5 d-none d-lg-block">
		<div class="container">
			<div class="row">
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu',
						'container_class' => 'col-sm-12 justify-content-center',
						'container_id'    => 'footerNav',
						'menu_class'      => 'list-unstyled d-flex justify-content-center mb-0 align-items-center',
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => 1,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #footerNavWrapper -->

	<div class="container mt-5 mt-lg-0">
		<div class="row">
			<div class="col-xl-1 text-center text-xl-left">
				<?php $bbb = get_field('bbb_logo', 'options'); ?>
				<img class = "mb-3 mb-xl-0" src="<?php echo $bbb['url']; ?>" alt="Better Business Bureau A+ Rating">
			</div><!-- .col-xl-1 -->
			<div class="col-xl-11 mb-5">
				<div class = "row">
					<div class="col-xl-9 mb-3">
						<?php
						$addy1 = get_field('address_line_1', 'option');
						$addy2 = get_field('address_line_2', 'option');
						$phone = get_field('phone_number', 'option');
						$phoneLink = preg_replace('/[^0-9]/', '', $phone);
						$email = get_field('email_address', 'option');
						?>
						<div class = "text-center text-xl-left">
							<p class = "mb-0 d-inline">
								<?php echo $addy1; ?>
							</p>
							
							<p class = "mb-0 d-inline">
							<?php echo $addy2; ?>
							</p>
							<span class = "mx-1 d-none d-md-inline"> | </span>
							<p class = "d-block d-md-inline">Email: <a href = "mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
							
							<p class = "mb-0 d-block d-md-inline-block gold">Phone: <a class = "gold" href="tel:<?php echo $phoneLink; ?>">
								<?php echo $phone; ?>
								</a>
							
							<span class = "mx-1 d-none d-md-inline"> | </span>
							<span class = "mb-0 d-block d-md-inline gold">International:1(860)-749-2218</span></p>
							
						</div>
					</div><!-- .col-xl-9 -->
					<div id = "footerSocial" class="col-xl-3">
						<ul class="list-unstyled d-inline-flex w-100 justify-content-center justify-content-xl-around">
							<li class = "mr-3 mr-xl-0"><a target = "_blank" href="<?php the_field('youtube_url', 'option'); ?>"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a></li>
							<li class = "mr-3 mr-xl-0"><a target = "_blank" href="<?php the_field('facebook_url', 'option'); ?>"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
							<li class = "mr-3 mr-xl-0"><a target = "_blank" href="<?php the_field('linkedin_url', 'option'); ?>"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
							<li><a target = "_blank" href="<?php the_field('instagram_url', 'option'); ?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
						</ul>
					</div><!-- .col-xl-3 -->
				</div><!-- .row -->
				<div class="row">
					<div class="col-xl-6 text-center text-xl-left mb-3 mb-xl-0">
						<p class = "mb-0">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
					</div><!-- .col-xl-6 -->
					<div class="col-xl-6 justify-content-center justify-content-xl-end d-inline-flex">
						<ul class="list-unstyled d-flex">
							<li><a href="/privacy-policy">Privacy Policy</a></li>
							<li><span class = "mx-1">|</span></li>
							<li><a href="/terms-and-conditions">Terms & Conditions</a></li>
						</ul>
					</div><!-- .col-xl-6 -->
				</div><!-- .row -->
			</div><!-- .col-xl-11 -->
			<div class="col-sm-12 text-center">
				POWERED BY <a target = "_blank" href="https://www.designs4theweb.com"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/d4tw.png" alt="Another WordPress website by Designs 4 The Web"></a>
				<a class = "d-block small" href="https://parksmgmt.org/staff/login.htm">STAFF LOGIN</a>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

			

		</div><!-- row end -->

	</div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here from header file -->

<?php wp_footer(); ?>

<?php if ( is_page( 'all-models' ) ) { ?>
	<script>
	    var containerEl = document.querySelector('#models');
	    var mixer = mixitup(containerEl, {
	    	load: {
	        	filter: '.hearse'
	    	}
		});
		jQuery('#mobileControls select').on('change', function(){
			mixer.filter(jQuery(this).find(':selected').data('filter'));
		});
	</script>
<?php } ?>

<?php if ( is_page( 'inventory' ) ) { ?>
	<script>
	    var containerEl = document.querySelector('#cars');
	    var mixer = mixitup(containerEl, {
	    	load: {
	        	filter: '.all'
	    	},
	    	multifilter: {
        	enable: true // enable the multifilter extension for the mixer
    		}
		});
		jQuery('#mobileControls select').on('change', function(){
			mixer.filter(jQuery(this).find(':selected').data('filter'));
		});
	</script>
<?php } ?>

<?php if ( is_page_template( 'templates/homepage.php' ) ) { ?>
<!-- Begin Constant Contact Active Forms -->
<script> var _ctct_m = "e3a16cb0afe1e33e72196768d25c80a5"; </script>
<script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
<!-- End Constant Contact Active Forms -->

<script>
	jQuery('#featuredSlider').slick({
	    infinite: true,
	    slidesToShow: 4,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		//autoplay: true,
  		autoplaySpeed: 2000,
  		responsive: [
  		{
	      breakpoint: 991,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 575,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    ]
  	});
</script>

<script>
    var offset = jQuery('.navbar').height();
    jQuery("#scrollDown").on( "click", function(e) {
    	e.preventDefault();
        jQuery("html, body").animate({
            scrollTop: jQuery('#homepage #sectionOne').offset().top - offset}, 0);
    });
</script>
<?php } ?>

<?php if ( is_page_template('templates/service.php') ) { ?>
	<script>
		jQuery('#sliderGallery').slick({
			adaptiveHeight: true,
		    infinite: true,
		    dots: true,
		    fade: true,
		    arrows: true,
		    appendArrows: '.arrows',
		    nextArrow: '<i class="fa fa-angle-right next-arrow text-shadow"></i>',
	  		prevArrow: '<i class="fa fa-angle-left prev-arrow text-shadow"></i>',
		    cssEase: 'linear'
	  	});
	</script>
<?php } ?>

<?php if ( is_tax() ) { ?>
	<script>
		jQuery('#imageCarousel').slick({
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 1,
		    arrows: true,
		    centerMode: true,
		    centerPadding: '40px'
	  	});
	  	jQuery('#alternateImageCarousel').slick({
			infinite: true,
			slidesToShow: 5,
			slidesToScroll: 1,
		    arrows: true,
		    centerMode: true,
		    centerPadding: '40px'
	  	});
	</script>
<?php } ?>

<?php if ( is_page_template( 'templates/accessories.php' ) ) { ?>
	<script>
		jQuery('.accessory-image-gallery' ).each( function() {
			jQuery(this).slick({
				adaptiveHeight: true,
			    infinite: true,
			    dots: true,
			    fade: true,
				slidesToShow: 1,
				slidesToScroll: 1,
			    arrows: true,
			    appendArrows: jQuery(this).parents('#imageGallery').find('.arrows'),
			    nextArrow: '<i class="fa fa-angle-right next-arrow text-shadow"></i>',
		  		prevArrow: '<i class="fa fa-angle-left prev-arrow text-shadow"></i>'
		  	});
		  });
	</script>
<?php } ?>

<?php if ( is_page_template( 'templates/parts.php') ) { ?>
	<script>
		jQuery('.parts-image-gallery' ).each( function() {
			jQuery(this).slick({
			    infinite: true,
			    dots: true,
			    fade: true,
				slidesToShow: 1,
				slidesToScroll: 1,
			    arrows: true,
			    appendArrows: jQuery(this).parents('.part').find('.arrows'),
			    nextArrow: '<i class="fa fa-angle-right next-arrow text-shadow"></i>',
		  		prevArrow: '<i class="fa fa-angle-left prev-arrow text-shadow"></i>'
		  	});
		  });
	</script>
<?php } ?>

<?php if ( is_page_template( array('templates/accessories.php', 'templates/parts.php') ) ) { ?>
	<script>
		jQuery('.accessory-image-gallery' ).each( function() {
			jQuery(this).slick({
				adaptiveHeight: true,
			    infinite: true,
			    dots: true,
			    fade: true,
				slidesToShow: 1,
				slidesToScroll: 1,
			    arrows: true,
			    appendArrows: jQuery(this).parents('#imageGallery').find('.arrows'),
			    nextArrow: '<i class="fa fa-angle-right next-arrow text-shadow"></i>',
		  		prevArrow: '<i class="fa fa-angle-left prev-arrow text-shadow"></i>'
		  	});
		  });
	</script>
<?php } ?>

<?php if ( is_page_template('templates/auction.php') ) { ?>
	<script>
		jQuery('#auctionSlider').slick({
		    infinite: true,
		    slidesToShow: 4,
			slidesToScroll: 1,
			dots: true,
			arrows: false,
			autoplay: true,
	  		autoplaySpeed: 2000,
	  	});
	</script>
<?php } ?>

</body>

</html>
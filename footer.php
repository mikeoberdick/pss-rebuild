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
			<div class="col-xl-11">
				<div class = "row">
					<div class="col-xl-9 mb-3">
						<?php
						$phone = get_field('phone_number', 'option');
						$phoneLink = preg_replace('/[^0-9]/', '', $phone);
						$email = get_field('email_address', 'option');
						?>
						<div class = "text-center text-xl-left">
							<p class = "d-block d-md-inline">Email: <a href = "mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
							<span class = "mx-1 d-none d-md-inline"> | </span>
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
			<div class="col-sm-12 text-center my-3">
				<h4 class = "gold font-weight-bold mb-0">Subscribe To The Parks Newsletter</h4>
				<!-- Constant Contact Inline Form -->
				<div class="ctct-inline-form" data-form-id="93ac4dba-c1c0-447f-a6a1-aaf4b874b73b"></div>
				<!-- End Constant Contact Form -->
			</div><!-- .col-sm-12 -->
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

<!-- Begin Constant Contact Active Forms -->
<script> var _ctct_m = "e3a16cb0afe1e33e72196768d25c80a5"; </script>
<script id="signupScript" src="//static.ctctcdn.com/js/signup-form-widget/current/signup-form-widget.min.js" async defer></script>
<!-- End Constant Contact Active Forms -->

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

<?php if ( is_page( 'inventory' ) ) {  ?>
	<script>
	    var containerEl = document.querySelector('#cars');
	    //allow for custom urls such as inventory/#new&hearse
	    var filters = document.location.hash.substring(1).split('&');
	    if (filters) {
	   		var firstFilter = '.' + filters[0];
	    	var secondFilter = '.' + filters[1];
	    	//If only one filter is used we will just use that for the query
	    	var query = secondFilter === '.undefined' ? firstFilter : firstFilter + secondFilter
	    }
	    var mixer = mixitup(containerEl, {
	    	load: {
			filter: document.location.hash == '' ? '.all' : (query)
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

<script src = "https://www.youtube.com/iframe_api"></script>

<script type="text/javascript">

		var player;
		function onYouTubeIframeAPIReady() {
		    var elems1 = document.getElementsByClassName('embed-player');
		    for(var i = 0; i < elems1.length; i++) {
		        player = new YT.Player(elems1[i], {
		            events: {
		                'onStateChange': onPlayerStateChange
		            }
		        });
		    }
		}

		function handleVideo(playerStatus) {
		    if (playerStatus == 0) {
		    	//player.seekTo(0);
		    	jQuery('.main-slider').slick('slickNext').slick('slickPlay');
		    }
		}

		function onPlayerStateChange(event) {
	    	handleVideo(event.data);
	  	}

		var slideWrapper = jQuery(".main-slider"),
	    iframes = slideWrapper.find('.embed-player'),
	    lazyImages = slideWrapper.find('.slide-image'),
	    lazyCounter = 0;

		// POST commands to YouTube
		function postMessageToPlayer(player, command){
		  if (player == null || command == null) return;
		  player.contentWindow.postMessage(JSON.stringify(command), "*");
		}

		// When the slide is changing
		function playPauseVideo(slick, control){
		  var currentSlide, slideType, startTime, player, video;

		  currentSlide = slick.find(".slick-current");
		  slideType = currentSlide.find(".item").attr("class").split(" ")[1];
		  player = currentSlide.find("iframe").get(0);
		  //startTime = currentSlide.data("video-start");
		  startTime = '0';

		  if (slideType === "youtube") {
			slideWrapper.slick('slickPause');
		    switch (control) {
		      case "play":
		        postMessageToPlayer(player, {
		          "event": "command",
		          "func": "mute"
		        });
		        postMessageToPlayer(player, {
		          "event": "command",
		          "func": "playVideo"
		        });
		        break;
		      case "pause":
		        postMessageToPlayer(player, {
		          "event": "command",
		          "func": "pauseVideo"
		        });
		        break;
		    }
		  }
		}

		// Resize player
		function resizePlayer(iframes, ratio) {
		  if (!iframes[0]) return;
		  var win = jQuery(".main-slider"),
		      width = win.width(),
		      playerWidth,
		      height = win.height(),
		      playerHeight,
		      ratio = ratio || 16/9;

		  iframes.each(function(){
		    var current = jQuery(this);
		    if (width / ratio < height) {
		      playerWidth = Math.ceil(height * ratio);
		      current.width(playerWidth).height(height).css({
		        left: (width - playerWidth) / 2,
		         top: 0
		        });
		    } else {
		      playerHeight = Math.ceil(width / ratio);
		      current.width(width).height(playerHeight).css({
		        left: 0,
		        top: (height - playerHeight) / 2
		      });
		    }
		  });
		}

		// DOM Ready
		jQuery(function() {
		  slideWrapper.on("init", function(slick){
		    slick = jQuery(slick.currentTarget);
		    setTimeout(function(){
		      playPauseVideo(slick,"play");
		    }, 1000);
		    resizePlayer(iframes, 16/9);
		  });

		  slideWrapper.on("beforeChange", function(event, slick, currentSlide) {
		  	slick = jQuery(slick.$slider);
		    player.seekTo(0);
		    playPauseVideo(slick,"play");
		  });

		  slideWrapper.on("afterChange", function(event, slick) {
		    slick = jQuery(slick.$slider);
		    playPauseVideo(slick,"play");
		  });


		  	//start the slider
		  	slideWrapper.slick({
		    fade:true,
		    autoplay: true,
		    infinite: true,
		    autoPlaySpeed:10000,
		    speed:600,
		    arrows:false,
		    dots:false,
		    slidesToShow: 1,
		    slidesToScroll: 1,
		    pauseOnHover: true,
		    pauseOnFocus: true,
		    draggable: true,
		    swipe: true,
		    adaptiveHeight: true,
		    //cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)"
		  });


});

// Resize event
jQuery(window).on("resize.slickVideoPlayer", function(){  
  resizePlayer(iframes, 16/9);
});
</script>




<script>
	jQuery('#featuredSlider').slick({
	    infinite: true,
	    slidesToShow: 4,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
		appendArrows: '.arrows',
	    nextArrow: '<i class="fa fa-angle-right next-arrow text-shadow"></i>',
  		prevArrow: '<i class="fa fa-angle-left prev-arrow text-shadow"></i>',
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
		    dots: false,
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

<?php if ( is_page_template('templates/seo-landing-page.php') ) { ?>
	<script>
		jQuery('.seo-image-gallery').each( function() {
			jQuery(this).slick({
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 1,
			    arrows: true,
			    appendArrows: jQuery(this).siblings('.arrows'),
			    nextArrow: '<i class="fa fa-angle-right next-arrow text-shadow"></i>',
		  		prevArrow: '<i class="fa fa-angle-left prev-arrow text-shadow"></i>',
			});
		});
	</script>
<?php } ?>

<?php if ( is_page_template( 'templates/accessories.php' ) ) { ?>
	<script>
		jQuery('.accessory-image-gallery' ).each( function() {
			jQuery(this).slick({
				adaptiveHeight: true,
			    infinite: true,
			    dots: false,
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
			    dots: false,
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
			    dots: false,
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
			dots: false,
			arrows: false,
			autoplay: true,
	  		autoplaySpeed: 2000,
	  	});
	</script>
<?php } ?>

<script>
var lazyLoadInstance = new LazyLoad({
  // Your custom settings go here
});	
</script>

</body>

</html>
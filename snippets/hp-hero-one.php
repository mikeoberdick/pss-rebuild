<?php $hero = get_field('hero'); ?>
<?php if ( $hero['video_background'] ) { ?>
<section id="hero">
	<div id = "videoWrapper">
	<video autoplay muted loop width = "100%" height = "100%" poster="<?php echo get_stylesheet_directory_uri() . '/img/transparent.png'; ?>" class = "d-flex">
	  <source src="<?php echo $hero['video_background']['url']; ?>" type="video/mp4">
	</video>	
	</div><!-- #videoWrapper -->
	<div id = "heroContent" class="container position-absolute">
		<div class="row">
			<div class="col-sm-12 text-center mb-3 mb-lg-5">
				<h1 class = "mb-3 mb-lg-5 text-shadow"><?php echo $hero['header']; ?></h1>
				<div class="buttons">
					<a href = '/2020nfdaconvention/'><button role = 'button' class = 'btn gold-button mr-md-3'>2020 NFDA CONVENTION</button></a>
					<a href = '<?php echo $hero['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $hero['button_text']; ?></button></a>
				</div><!-- .buttons -->
				
			</div><!-- .col-sm-12 -->
			<div class="col-sm-12 text-center d-none d-md-block">
				<a href = "#sectionOne" id="scrollDown" style = "bottom: inherit; left: 50%; transform: translateX(-50%);">
					<i class="fa fa-arrow-down fa-2x mb-4" aria-hidden="true"></i><br>
					<h5 class = "d-none d-lg-inline-block">SCROLL DOWN</h5>
				</a><!-- #scrollDown -->
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #hero -->

<?php } else { ?>
	<section id="hero" class = "lazy" data-bg = "<?php echo $hero['background']['url']; ?>" class = "inset">
	<div class="container p-relative">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1 class = "mb-5 text-shadow"><?php echo $hero['header']; ?></h1>
				<a href = '<?php echo $hero['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $hero['button_text']; ?></button></a>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #hero -->
<?php } ?>
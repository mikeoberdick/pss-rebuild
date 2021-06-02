<?php $hero = get_field('hero'); ?>
<?php if ( $hero['video_background'] ) { ?>

<section id="hero" class = "video-hero-header">
<?php

// Load value.
$iframe = $hero['video_background'];

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];
$playlist = null;

// Add extra parameters to src and replcae HTML.
$params = array(
    'controls'  => 0,
    'rel' => 0,
    'autohide' => 1,
    'autoplay' => 1,
    'mute' => 1,
    'loop' => 1,
    'playlist' => 'hfv5bJkSAvs'
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

?>

	<div id = "videoWrapper">
		<?php echo $iframe; ?>
	</div><!-- #videoWrapper -->
	<div id = "heroContent" class="container position-absolute">
		<div class="row">
			<div class="col-sm-12 text-center mb-3 mb-lg-5">
				<?php if ( $hero['header'] ) : ?>
				<h1 class = "mb-3 mb-lg-5 text-shadow"><?php echo $hero['header']; ?></h1>
			<?php endif; ?>
				<a href = '<?php echo $hero['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $hero['button_text']; ?></button></a>
				
			</div><!-- .col-sm-12 -->
			<div class="col-sm-12 text-center d-none d-md-block">
				<a href = "#sectionOne" id="scrollDown">
					<i class="fa fa-arrow-down fa-2x mb-4" aria-hidden="true"></i><br>
					<h5 class = "d-none d-lg-inline-block">SCROLL DOWN</h5>
				</a><!-- #scrollDown -->
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #hero -->

<?php } else { ?>
	<section id="hero" class = "image-hero-header lazy" data-bg = "<?php echo $hero['background']['url']; ?>" class = "inset">
	<div class="container p-relative">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php if ( $hero['header'] ) : ?>
				<h1 class = "mb-5 text-shadow"><?php echo $hero['header']; ?></h1>
			<?php endif; ?>
				<a href = '<?php echo $hero['page_link']; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $hero['button_text']; ?></button></a>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #hero -->
<?php } ?>
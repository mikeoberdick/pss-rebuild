<?php $aboutVideo = get_field('about_video', 'option'); ?>
<section id="aboutVideo" data-bg = "<?php echo $aboutVideo['background']['url']; ?>" class = "py-5 d-flex flex-column justify-content-center lazy">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<a data-toggle="modal" data-target="#aboutVideoModal">
				<h1 class="mb-3  text-shadow text-center"><?php echo $aboutVideo['header']; ?></h1>
				<i class="fa fa-youtube-play fa-5x" aria-hidden="true"></i>
				</a>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #aboutvideo -->
<?php
$images = get_field('images');
$imageList = explode (",", $images);
?>

<div class="car link" data-link = "<?php the_permalink(); ?>">
	<img src="<?php echo $imageList[0]; ?>">
	<div class="featured-info content-wrapper p-3 mt-auto">
    	<h5 class = "mb-3"><?php the_title(); ?></h5>
    	<hr>
    	<div class="d-flex justify-content-between align-items-center">
    		<div class="price">
    			<h4 class = "font-weight-bold">
    				<?php $price = get_field('price'); ?>
    				<?php if (!empty($price)) {
    					$formattedPrice = number_format($price); 
    					echo '$' . $formattedPrice; } else {
						echo 'Call For Pricing';
    				} ?></h4>
    		</div><!-- .price -->
    		<?php if (get_field('video')) : ?>
    		<div class="video-icon d-flex justify-content-center align-items-center">
    			<i class="gold fa-2x fa fa-youtube-play mr-2" aria-hidden="true"></i>
    			<span class = "gold h5">Video<br>Available</span>
    		</div><!-- .video-icon -->
    		<?php endif; ?>
    	</div>
    </div><!-- .featured-info -->	
</div><!-- .car -->  
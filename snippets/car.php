<?php //vars
$images = get_field('images');
$imageList = explode (",", $images);

$year = get_field('year'); //2020
$make = get_field('make'); //Cadillac
$coachbuilder = get_field('coachbuilder');  //Platinum Coach
$model = get_field('model'); //Phoenix
$chassis = get_field('chassis'); //XTS
$body = get_field('body'); //Hearse
?>

<div class="link" data-link = "<?php the_permalink(); ?>">
    <div class="car-wrapper">
        <div class="image-wrapper position-relative">
        <img class = "lazy w-100" src="<?php echo $imageList[0] . '?auto=compress&fit=clamp&h=340&w=510'; ?>">  
        <?php $flag = get_field('flag'); ?>
        <?php if ( $flag != 'New' && $flag != 'Pre-Owned' && $flag != 'Featured' && $flag != 'Sold' ) { ?>

        <div class="ribbon<?php if($flag === 'Deal Pending') {echo ' deal-pending';} elseif ($flag === 'Consignment') {echo ' consignment';} elseif ($flag === 'Parks Auction') {echo ' parks-auction';} elseif ($flag === 'As Is') {echo ' as-is';} elseif ($flag === 'EBay Auction') {echo ' ebay-auction';}; ?>"><span><?php the_field('flag'); ?></span></div>
        <?php } ?>
        </div><!-- .image-wrapper -->
        
        <div class="featured-info content-wrapper p-3">
            <div>
            <h5 class = "mb-3 font-weight-bold"><span class = 'gold'><?php echo $year . ' ' . $make; ?></span> <?php echo $coachbuilder . ' ' . $chassis . ' ' . $model . ' ' . $body; ?></h5>
            <div class="details small">
                <p>Stock #: <?php the_field('stock'); ?>
                <?php //limit the length of options string
                $options = get_field('options');
                if ($options) {
                $options = mb_strimwidth($options, 0, 65, "..."); ?>
                | <?php echo $options; ?></p>
                <?php } ?>
            <hr>
            </div><!-- .details -->    
            </div>
            <div class="d-flex justify-content-between align-items-center mt-auto">
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
                    <i class="gold fa fa-youtube-play mr-2" aria-hidden="true"></i>
                    <span class = "gold h5 small mb-0">Video<br>Available</span>
                </div><!-- .video-icon -->
                <?php endif; ?>
            </div>
        </div><!-- .featured-info -->
    </div><!-- .car-wrapper -->	
</div><!-- .car -->
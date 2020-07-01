<?php
/**
 * Template Name: General
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="general" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php
	  				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	  				$video = get_field('video');
	  				$videoUrl = $video['video']['url'];
	  				$videoLocation = $video['location'];
  				?>

				<?php if ( $videoUrl && $videoLocation == 1 ) { ?>
				
				<section id="hero" class = "mb-5">
					<video autoplay muted loop>
					  <source src="<?php echo $videoUrl; ?>" type="video/mp4">
					</video>
					<div class="container position-absolute">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-0 text-shadow"><?php the_field('hero_title'); ?></h1>
									<h3><?php the_field('hero_subtitle'); ?></h3>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #hero -->

				<?php } else { ?>
					<div id="hero" class = "mb-5 inset" style="background-image: url('<?php echo $image[0]; ?>')">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 text-center">
									<h1 class = "mb-0 text-shadow"><?php the_field('hero_title'); ?></h1>
									<h3><?php the_field('hero_subtitle'); ?></h3>
								</div><!-- .col-sm-12 -->
							</div><!-- .row -->
						</div><!-- .container -->
					</div><!-- #hero -->
				<?php } ?>
				
				<?php $content = get_field('content_section'); ?>
				
				<?php if ($videoUrl && $videoLocation == 2 ) { ?>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<h4 class = "gold mb-3"><?php echo $content['header']; ?></h4>
								<p><?php echo $content['copy']; ?></p>
							</div><!-- .col-md-6 -->
							<div class="col-md-6">
								<h4 class = "gold mb-3"><?php echo $video['header']; ?></h4>
								<div class="embed-responsive embed-responsive-16by9">
									<video controls>
									  <source src="<?php echo $videoUrl; ?>" type="video/mp4">
									</video>
								</div><!-- .embed-responsive -->
								<p class = "mt-3"><?php echo $video['copy']; ?></p>
							</div><!-- .col-md-6 -->
						</div><!-- .row -->
					</div><!-- .container -->

				<?php } elseif ( $videoUrl && $videoLocation == 1 || !$videoUrl ) { ?>
					<h3 class = "fancy"><?php echo $content['header']; ?></h3>
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<?php echo $content['copy']; ?>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				<?php } ?>

				<?php 
				$images = get_field('slideshow');
				$count = count( array($images));
				if( $images ): ?>
					<h3 class = "fancy">Image Gallery</h3>
					<div class="container mb-5">
						<div class="row">
							<?php if ( $count > 4 ) { ?>
							<div class="col-md-8 offset-md-2">
								<div id="sliderGallery">
				        			<?php foreach( $images as $image ): ?>
				                		<div class = "slide">
				                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				                    		<p class = 'slide-caption'><?php echo esc_html($image['caption']); ?></p>
				                		</div>
				            		<?php endforeach; ?>
				            	</div><!-- #sliderGallery -->
				            	<div class="arrows"></div><!-- .arrows -->
							</div><!-- .col-md-8 -->
							<?php } else { ?>
			        			<?php foreach( $images as $image ): ?>
			                		<div class = "col-md-3">
			                    		<img class = "mb-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			                    		<p class = 'image-caption'><?php echo esc_html($image['caption']); ?></p>
			                		</div>
			            		<?php endforeach; ?>
							<?php } ?>
						</div><!-- .row -->
					</div><!-- .container -->
				<?php endif; ?>
				
				<?php $contact = get_field('contact'); ?>
				<h3 class = "fancy">Contact The <?php echo $contact['department']; ?> Today</h3>
				<div class="container mb-5">
					<div class="row content-wrapper p-5">
						<div class="col-md-5 text-right">
							<?php $img = $contact['image']; ?>
							<img class = "pr-3 w-100" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-md-5 -->
						<div class="col-md-7 contact-border">
							<div class="pl-3">
							<h3 class = "mb-0 red"><?php echo $contact['name']; ?></h3>
							<h5 class = "mb-3 gray font-weight-bold"><?php echo $contact['title']; ?></h5>
							<?php $office = preg_replace('/[^0-9]/', '', $contact['office_number']); ?>

							<a href="tel:<?php echo $office ?>"><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-phone mr-3" aria-hidden="true"></i>Call Office</button></a>
							
							<?php $mobile = preg_replace('/[^0-9]/', '', $contact['mobile_number']); ?>
							<a href="tel:<?php echo $mobile ?>"><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-mobile mr-3" aria-hidden="true"></i>Call Mobile</button></a>
							<?php $first = explode(' ',trim($contact['name'])); ?>
							<a target = '_blank' href = 'mailto:<?php echo $contact['email']; ?>'><button role = 'button' class = 'btn gold-button w-100'><i class="fa fa-envelope-o mr-3" aria-hidden="true"></i>Email <?php echo $first[0]; ?></button></a>	
							</div>
							
						</div><!-- .col-md-7 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #general -->
<?php get_footer(); ?>
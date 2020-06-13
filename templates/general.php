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
				
				<section id="hero">
					<video autoplay muted loop>
					  <source src="<?php echo $videoUrl; ?>" type="video/mp4">
					</video>
					<div class="container position-absolute">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-0 text-shadow"><?php the_title(); ?></h1>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #hero -->

				<?php } else { ?>
					<div id="hero" class = "mb-5 inset" style="background-image: url('<?php echo $image[0]; ?>')">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 text-center">
									<h1 class = "mb-0 text-shadow"><?php the_title(); ?></h1>
								</div><!-- .col-sm-12 -->
							</div><!-- .row col-sm-12 -->
						</div><!-- .container -->
					</div><!-- #hero -->
				<?php } ?>

				<?php if ($videoUrl && $videoLocation == 2 ) : ?>

					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<h5 class = "mb-3"><?php echo $video['header']; ?></h5>
								<p><?php echo $video['copy']; ?></p>
							</div><!-- .col-md-4 -->
							<div class="col-md-8">
								<div class="embed-responsive embed-responsive-16by9">
									<video controls>
									  <source src="<?php echo $videoUrl; ?>" type="video/mp4">
									</video>
								</div>
							</div><!-- .col-md-8 -->
						</div><!-- .row -->
					</div><!-- .container -->

				<?php endif; ?>

				<?php
				if( have_rows('sections') ):
				    while ( have_rows('sections') ) : the_row(); ?>
				    <h3 class = "fancy my-3"><?php the_sub_field('header'); ?></h3>
				        <div id="contentWrapper" class="container mb-5">
							<div class="row">
								<div class="col-sm-12">
									<?php the_sub_field('copy'); ?>
								</div><!-- .col-sm-12 -->
							</div><!-- .row -->
						</div><!-- #contentWrapper.container -->

				    <?php endwhile;
				endif; ?>

				<?php $images = get_field('slideshow');
				if( $images ): ?>
					<div class="container mb-5">
						<div class="row">
							<div class="col-sm-12">
								<div id="sliderGallery">
				        			<?php foreach( $images as $image ): ?>
				                		<div class = "slide">
				                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				                    		<p class = 'slide-caption'><?php echo esc_html($image['caption']); ?></p>
				                		</div>
				            		<?php endforeach; ?>
				            	</div><!-- #sliderGallery -->
				            	<div class="arrows"></div><!-- .arrows -->
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				<?php endif; ?>
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #general -->
<?php get_footer(); ?>
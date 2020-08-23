<?php
/**
 * Template Name: Service
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="service" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<?php get_template_part( 'snippets/page_header'); ?>

  				<?php
	  			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	  			$video = get_field('video');
  				?>
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
				
				<?php $content = get_field('content_section'); ?>
				
				<?php if ($video['url']) { ?>
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<h4 class = "gold mb-3"><?php echo $content['header']; ?></h4>
								<div class = "wp-editor"><?php echo $content['copy']; ?></div>
							</div><!-- .col-md-6 -->
							<div class="col-md-6">
								<h4 class = "gold mb-3"><?php echo $video['header']; ?></h4>
								<div class="embed-responsive embed-responsive-16by9">
    							<?php echo $video['url']; ?>
								</div><!-- .embed-responsive -->
								<p class = "mt-3"><?php echo $video['copy']; ?></p>
							</div><!-- .col-md-6 -->
						</div><!-- .row -->
					</div><!-- .container -->

				<?php } elseif ( !$video['url'] ) { ?>
					<h3 class = "fancy"><?php echo $content['header']; ?></h3>
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<?php echo $content['copy']; ?>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				<?php } ?>

				<?php if ( have_rows('service_options') ) : ?>
					<div class="container">
				<?php while( have_rows('service_options') ): the_row(); ?>
					<h3 class = "mb-3 text-center gold"><?php the_sub_field('header'); ?></h3>
				<?php if( have_rows('services') ): ?>
					<div class="row">
				<?php while( have_rows('services') ): the_row(); ?>
					<div class="col-md-4 text-center">
						<?php $icon = get_sub_field('icon'); ?>
						<img class = "mb-3" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
						<h5 class="gold mb-3"><?php the_sub_field('header'); ?></h5>
						<p><?php the_sub_field('copy'); ?></p>
					</div><!-- .col-md-4 -->
				<?php endwhile; ?>
					</div><!-- .row -->
				<?php endif; ?>
			<?php endwhile; ?>
		</div><!-- .container -->
	<?php endif; ?>
				

				<?php 
				$images = get_field('slideshow');
				$count = count($images);
				if( $images ): ?>
					<h3 class = "fancy">Image Gallery</h3>
					<div class="container mb-5">
						<div class="row">
							<?php if ( $count > 4 ) { ?>
							<div class="col-lg-8 offset-lg-2">
								<div id="sliderGallery">
				        			<?php foreach( $images as $image ): ?>
				                		<div class = "slide">
				                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				                    		<?php if ($image['caption']) : ?>
				                    		<p class = 'slide-caption'><?php echo esc_html($image['caption']); ?></p>
				                    		<?php endif; ?>
				                		</div>
				            		<?php endforeach; ?>
				            	</div><!-- #sliderGallery -->
				            	<div class="arrows"></div><!-- .arrows -->
							</div><!-- .col-lg-8 -->
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

				<?php 
					if( have_rows('service_videos') ): ?>
						<h3 class = "fancy">Service Videos</h3>
						<div class="container mb-5">
							<div class="row">
					<?php while( have_rows('service_videos') ) : the_row(); ?>
					<div class="col-md-6 mb-3 d-flex flex-column">
						<h5 class="mb-3"><?php the_sub_field('video_title'); ?></h5>
						<div class="embed-responsive embed-responsive-16by9 mt-auto">
    						<?php the_sub_field('video_url'); ?>
						</div><!-- .embed-responsive -->
					</div><!-- .col-md-6 -->
				<?php endwhile; ?>
			</div><!-- .row -->
		</div><!-- .container -->
	<?php endif; ?>
						
				<?php get_template_part( 'snippets/contact-box'); ?>
				
				<h3 class="fancy">Additional Services</h3>
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
						<ul class="additional-services-buttons list-unstyled d-flex justify-content-center w-100">
				<?php wp_list_pages(array(
				    'child_of' => $post->post_parent,
				    'exclude' => $post->ID,
				    'title_li' => '',
				    'link_before' => '<button role="button" class="btn gold-button mb-3">',
				    'link_after' => '</button>'
				)) ?>	
				</ul>		
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				
				</div><!-- .container -->
				
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #service -->
<?php get_footer(); ?>
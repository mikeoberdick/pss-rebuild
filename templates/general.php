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

  				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				
				<div id="hero" class = "mb-5 inset" style="background-image: url('<?php echo $image[0]; ?>')">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-0 text-shadow"><?php the_title(); ?></h1>
							</div><!-- .col-sm-12 -->
						</div><!-- .row col-sm-12 -->
					</div><!-- .container -->
				</div><!-- #hero -->

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
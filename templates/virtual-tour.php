<?php
/**
 * Template Name: Tour
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="virtualTour" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<?php get_template_part( 'snippets/page_header'); ?>

				<div class="container mt-3 mb-5">
					<div class="row">
						<div class="col-sm-12">
							<h3 class = "mb-3 gold text-center"><?php the_field('header'); ?></h3>
							<h5 class = "mb-3"><?php the_field('subheader'); ?></h5>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			
			<?php if( have_rows('videos') ): ?>
				<div class="container mb-5">
					<div class="row">
			<?php while ( have_rows('videos') ) : the_row(); ?>
					<div class="col-md-6">
						<div class = "video-wrapper h-100 d-flex flex-column">
							<div class="content-wrapper text-center p-3">
						<h3 class = "mb-3"><?php the_sub_field('header'); ?></h3>
						<p><?php the_sub_field('copy'); ?></p>	
						</div>
						
						<?php $video = get_sub_field('video'); ?>
						<div class="embed-responsive embed-responsive-16by9 mt-auto">
							<video controls>
							  <source src="<?php echo $video['url']; ?>" type="video/mp4">
							</video>
						</div><!-- .embed-responsive -->
					</div><!-- .video-wrapper -->
					</div><!-- .col-md-6 -->
			<?php endwhile; ?>
				</div><!-- .row -->
			</div><!-- .container -->
		<?php endif; ?>
					
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #virtualTour -->
<?php get_footer(); ?>
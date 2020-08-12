<?php
/**
 * Template Name: Parts
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="parts" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>

				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style = "background: url('<?php echo $hero['background']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
							<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
							<h3 class = "mb-3 text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->

				<div class="container mb-5">
					<div class="row">
						<div class="col-sm-12">
							<div class="p-4 content-wrapper">
								<?php the_field('content'); ?>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

				<h3 class="fancy">Parts</h3>
				<div id="partsCatalog" class = "container">
					<div class="row">
						<?php while ( have_rows('parts') ) : the_row(); ?>
							<div class="part col-md-4 mb-3">
								<div class="image-wrapper position-relative">
									<?php $images = get_sub_field('images');
									$count = count($images); ?>
									<?php if( $count == 1 ) { ?>
									<img class = "mb-3" src="<?php echo $images[0]['url']; ?>" alt="<?php echo $images[0]['alt']; ?>">
									<?php } else { ?>
									<div class = "parts-image-gallery">
					        			<?php foreach( $images as $image ): ?>
					                		<div class = "slide">
					                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					                		</div>
					            		<?php endforeach; ?>
					            	</div><!-- .parts-image-gallery -->
				            	<div class="arrows"></div><!-- .arrows -->
								<?php } ?>
								</div><!-- .image-wrapper -->
								<h4 class="gold mb-3 text-center"><?php the_sub_field('name'); ?></h4>
								<p><?php the_sub_field('description'); ?></p>
							</div><!-- .col-md-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- #partsCatalog -->

				<?php get_template_part( 'snippets/contact-box'); ?>

				<h3 class="fancy">Related Department</h3>
				<div class="container mb-5">
					<div class="row">
						<div class="col-sm-12 text-center">
						<a href="/parts-accessories/accessories"><button role="button" class="btn gold-button mb-3">Accessories</button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				
				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #parts -->
<?php get_footer(); ?>
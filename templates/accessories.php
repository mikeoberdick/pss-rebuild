<?php
/**
 * Template Name: Accessories
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="accessoryDetail" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php
	  			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  				?>
  				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style="background-image: url('<?php echo $image[0]; ?>')">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-0 text-shadow"><?php echo $hero['hero_title']; ?></h1>
								<h3><?php echo $hero['hero_subtitle']; ?></h3>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->

				<?php if ( have_rows('accessory_detail') ) : ?>
					<div class="container">
						<div class="row">
							<?php $i = 0; ?>
				<?php while( have_rows('accessory_detail') ): the_row(); ?>
					<div class="col-sm-12 accessory-section">
						<div class="row">
							<div class="col-md-6">
								<h3 class = "mb-3"><?php the_sub_field('header'); ?></h3>
								<p><?php the_sub_field('copy'); ?></p>
							</div><!-- .col-md-6 -->
							<div id = "imageGallery" class="col-md-6">
								<h3 class = "mb-3 gold"><?php the_sub_field('image_gallery_header'); ?></h3>
								<?php $images = get_sub_field('image_gallery'); $count = count($images); ?>
								<?php if ( $count > 1 ) { ?>
								<div id="gallery-<?php echo $i; ?>" class = "accessory-image-gallery">
				        			<?php foreach( $images as $image ): ?>
				                		<div class = "slide">
				                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				                    		<p class = 'slide-caption'><?php echo esc_html($image['caption']); ?></p>
				                		</div>
				            		<?php endforeach; ?>
				            	</div><!-- .accessory-image-gallery -->
				            	<div class="arrows"></div><!-- .arrows -->
							<?php } else { ?>
			        			<?php foreach( $images as $image ): ?>
			                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			                    		<p class = 'image-caption'><?php echo esc_html($image['caption']); ?></p>
			            		<?php endforeach; ?>
							<?php } ?>
							</div><!-- .col-md-6 -->
							<hr>
						</div><!-- .row -->
					</div><!-- .col-sm-12 -->
					<?php $i++; ?>
				<?php endwhile; ?>
			</div><!-- .row -->
		</div><!-- .container -->
	<?php endif; ?>

	<?php get_template_part( 'snippets/contact-box'); ?>
	<img class = "d-block mx-auto" src="<?php echo get_stylesheet_directory_uri() . '/img/credit_cards.png'; ?>" alt="Credit Cards Accepted">
				
				<h3 class="fancy">Additional Accessories</h3>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
						<ul class="additional-services-buttons list-unstyled d-flex align-items-center w-100">
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
				</div><!-- .container-fluid -->

				<h3 class="fancy">Related Department</h3>
				<div class="container mb-5">
					<div class="row">
						<div class="col-sm-12 text-center">
						<a href="/parts-accessories/parts"><button role="button" class="btn gold-button mb-3">Parts</button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #accessoryDetail -->
<?php get_footer(); ?>
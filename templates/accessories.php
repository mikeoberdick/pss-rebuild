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
							<?php if ($contact['office_number']) : ?>
							<?php $office = preg_replace('/[^0-9]/', '', $contact['office_number']); ?>

							<a href="tel:<?php echo $office ?>"><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-phone mr-3" aria-hidden="true"></i>Call Office</button></a>
							<?php endif; ?>
							<?php if ($contact['mobile_number']) : ?>
							<?php $mobile = preg_replace('/[^0-9]/', '', $contact['mobile_number']); ?>
							<a href="tel:<?php echo $mobile ?>"><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-mobile mr-3" aria-hidden="true"></i>Call Mobile</button></a>
							<?php endif; ?>
							<?php $first = explode(' ',trim($contact['name'])); ?>
							<a target = '_blank' href = 'mailto:<?php echo $contact['email']; ?>'><button role = 'button' class = 'btn gold-button w-100'><i class="fa fa-envelope-o mr-3" aria-hidden="true"></i>Email <?php echo $first[0]; ?></button></a>	
							</div>
						</div><!-- .col-md-7 -->
					</div><!-- .row -->
				</div><!-- .container -->
				
				<h3 class="fancy">Additional Accessories</h3>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
						<ul class="additional-services-buttons list-unstyled d-flex justify-content-around w-100">
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
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #accessoryDetail -->
<?php get_footer(); ?>
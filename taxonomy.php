<?php
/**
 * The template for displaying the model custom taxonomy pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="modelTaxonomy" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php
				get_template_part( 'snippets/page_header'); 
				$term = get_queried_object();
				$tax = 'model_' . $term->term_id;
				$background = get_field('hero_image', $tax); ?>
				
				<div id="taxHero" class = "mb-3" style = "background: url('<?php echo $background['url']; ?>');">
				</div><!-- #taxHero -->

				<h3 class="fancy mb-3">Description</h1>

					<div class="container">
						<div id = "description" class="row mb-5">
							<div class="col-sm-12">
								<div class="content-wrapper p-5">
									<h3 class = "mb-3 text-center"><?php echo get_field('headline', $tax); ?></h3>
									<p class = "mb-3"><?php echo get_field('copy', $tax); ?></p>
									<?php $pdf = get_field('pdf', $tax); ?>
									<div class="text-center mb-3">
										<a href = '<?php echo $pdf['url']; ?>'><button role = 'button' class = 'btn gold-button'>Download PDF</button></a>
									</div>
									<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
									<p class = "mb-0 callout">We love these cars...let us show you the Parks Difference! Call us today at <a href = 'tel:<?php echo $phone; ?>'><?php the_field('phone_number', 'option'); ?>.</a></p>
								</div><!-- .content-wrapper -->
							</div><!-- .col-sm-12 -->
						</div><!-- #description -->
					</div><!-- .container -->

					<h3 class="mb-3 text-center underlined d-block"><?php the_field('gallery_title', $tax) ?></h3>

					<div id = "primaryCarousel" class="container mb-5">
						<?php $images = get_field('gallery', $tax); ?>
						<div class="row mb-3">
							<div class="col-sm-12">
								<img src="<?php echo $images[0]["sizes"]["large"]; ?>" id = "largeImage">
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
						<div class="row">
							<div id = "imageCarousel" class="col-sm-12">

							<?php foreach( $images as $image ): ?>
				                <div class = "slide gallery-thumb">
				                    <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
				                </div>
				            <?php endforeach; ?>
				            <div class="arrows"></div>	
						</div><!-- #imageCarousel -->
						</div><!-- .row -->
					</div><!-- .container -->

					<?php if ( get_field('alternate_gallery_title', $tax) ) : ?>
					<h3 class="mb-3 text-center underlined d-block"><?php the_field('alternate_gallery_title', $tax) ?></h3>
					<?php endif; ?>
					<?php if( get_field('alternate_gallery', $tax) ) : ?>
					<div id = "secondaryCarousel" class="mb-5 container">
						<?php $altImages = get_field('alternate_gallery', $tax); ?>
						<div class="row mb-3">
							<div class="col-sm-12">
								<img src="<?php echo $altImages[0]["sizes"]["large"]; ?>" id = "altLargeImage">
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
						<div class="row">
							<div id = "alternateImageCarousel" class="col-sm-12">

							<?php foreach( $altImages as $altImage ): ?>
				                <div class = "slide gallery-thumb">
				                    <img src="<?php echo esc_url($altImage['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($altImage['alt']); ?>">
				                </div>
				            <?php endforeach; ?>
				            <div class="arrows"></div>	
						</div><!-- #alternateIageCarousel -->
						</div><!-- .row -->
					</div><!-- .container -->
				<?php endif; ?>

				<h3 class="fancy mb-3">Video</h1>
					
				<div class="container">
					<div class="row mb-3">
						<div class="col-sm-12">
							<?php echo get_field('video', $tax); ?>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

				<h3 class="fancy mb-3">Options</h1>

			<div class="container">
		<?php if( have_rows( 'options', $tax ) ): ?>
				<div id = "carOptions" class="row mb-5">
		<?php while( have_rows( 'options', $tax ) ): the_row(); ?>
					<div class="col-md-6 option-group mb-3">
							<h3 class = "mb-3"><?php the_sub_field('header'); ?></h3>
					<?php $images = get_sub_field('gallery'); ?>
				<?php if( $images ) : ?>
					<div class="row">
        		<?php $count = count($images); $i = 1; 
        		foreach( $images as $image ) : ?>
					<div class="option col-md-6 <?php if ( $i >= 3 ) {echo 'hidden';} ?>">
	      			<img class = "w-100 mb-3" src="<?php echo $image['sizes']['blog-small']; ?>" alt="<?php echo $image['alt']; ?>" />
	      		<?php if ( $image['caption'] ) : ?>
	      			<p class = "small font-italic text-center px-3"><?php echo $image['caption']; ?></p>
	  			<?php endif; ?>
	  				</div><!-- .col-md-6 -->
        		<?php $i++; endforeach; ?>
        <?php if ( $count >= 3 ) : ?>
	        <div class="col-sm-12">
	        	<div class="more-photos">
	        		<h5><span>More Photos</span><i class="fa fa-caret-down ml-3" aria-hidden="true"></i></h5>
	        	</div><!-- .more-photos -->
	        </div><!-- .col-sm-12 -->
    	<?php endif; ?>
    			</div><!-- .row for images -->
     <?php endif; ?><!-- if( $images ) -->
     </div><!-- .col-md-6 -->
 <?php endwhile; ?>
<?php endif; ?>	
						
					</div><!-- .row -->
				</div><!-- .container -->

				<?php $footerHero = get_field('footer_hero_image', $tax); ?>
				<img src="<?php echo $footerHero['url']; ?>" alt="<?php echo $footerImg['alt']; ?>">
				
			</article>
		</main><!-- .site-main -->
	</div><!-- #content -->
</div><!-- #modelTaxonomy -->

<?php get_footer(); ?>
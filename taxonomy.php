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
									
									<p class = "mb-0 callout">We love these cars...let us show you the Parks Difference! Call us today at <a href = 'tel:<?php echo $phone ?>'><?php the_field('phone_number', 'option'); ?>.</a></p>
								</div><!-- .content-wrapper -->
							</div><!-- .col-sm-12 -->
						</div><!-- #description -->

						<div class="row mb-3">
							<div class="col-sm-12">
								<?php echo get_field('video', $tax); ?>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
						
						<?php $images = get_field('gallery', $tax); ?>
						<div id = "carGallery" class="row mb-5">
						<?php $i = 0; ?>
						<?php foreach( $images as $image ): ?>
				            <div class = "col-md-2 gallery-photo mb-3<?php if ( $i >= 12 ) {echo ' hidden';} ?>">
				                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
				            </div><!-- .col-md-2 -->
				            <?php $i++; ?>
				        <?php endforeach; ?>
				        <div class="col-sm-12">
				        	<div class="more-photos">
				        		<h5><span>More Photos</span><i class="fa fa-caret-down ml-3" aria-hidden="true"></i></h5>
				        	</div><!-- .more-photos -->
				        </div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				
				<?php $footerHero = get_field('footer_hero_image', $tax); ?>
				<img src="<?php echo $footerHero['url']; ?>" alt="<?php echo $footerImg['alt']; ?>">
				
			</article>
		</main><!-- .site-main -->
	</div><!-- #content -->
</div><!-- #modelTaxonomy -->

<?php get_footer(); ?>
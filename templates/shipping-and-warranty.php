<?php
/**
 * Template Name: Shipping & Warranty
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php //get the page title for use as the main container ID
$id = get_the_ID();
if ( $id === 272 ) {
	$pageTitle = 'shipping';
	} else if ( $id === 284 ) {
		$pageTitle = 'warranty';
	} 
$bg = get_field('page_background');
?>
<div id="<?php echo $pageTitle; ?>" class = "page-wrapper" <?php if ($pageTitle === 'shipping') { echo 'style = background:url("' . $bg['url'] . '");'; } ?>>
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

				<div class="container mb-5">
					<div class="row">
						<div class="col-sm-12">
							<p><?php the_field('intro_text') ?></p>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

				<div class="container mb-5">
					<div class="row">
						<?php if( have_rows('buckets') ): while( have_rows('buckets') ) : the_row(); ?>
							<div class="col-md-4 mb-3 mb-md-0">
								<?php $img = get_sub_field('image'); ?>
								<img class = "mb-3" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<h5 class = "gold text-center"><?php the_sub_field('header'); ?></h5>
							</div><!-- .col-md-4 -->
						<?php endwhile; endif; ?>
					</div><!-- .row -->
				</div><!-- .container -->
				
				<?php $content = get_field('content_section'); ?>
				<h3 class="fancy mb-3"><?php echo $content['header']; ?></h3>
				<div class="container mb-5">
					<div class="row">
						<div class="col-sm-12">
							<p class = "text-center"><?php echo $content['copy']; ?></p>
						</div><!-- .col-md-4 -->
					</div><!-- .row -->
				</div><!-- .container -->
				
				<?php if( have_rows('callout_graphics') ) : ?>
				<div class="container mb-5">
					<div class="row">
						<?php while( have_rows('callout_graphics') ) : the_row(); ?>
							<div class="col-md-3">
								<?php $img = get_sub_field('image'); ?>
								<img class = "mb-3" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<h5 class = "gold text-center"><?php the_sub_field('header'); ?></h5>
							</div><!-- .col-md-3 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- .container -->
				<?php endif; ?>

				<?php get_template_part( 'snippets/contact-box'); ?>
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #shipping -->
<?php get_footer(); ?>
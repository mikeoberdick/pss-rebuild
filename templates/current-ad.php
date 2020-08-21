<?php
/**
 * Template Name: Current Ad
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="currentAd" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php get_template_part( 'snippets/page_header'); ?>

				<?php $ad = get_field('current_ad', 'option'); ?>
				<h3 class="fancy"><?php echo $ad['header']; ?></h3>
				<div class="container my-5">
					<div class="row">
						<div class="col-sm-12">
							<p class = "mb-5"><?php echo $ad['blurb']; ?></p>
							<img class = "mb-3" src="<?php echo $ad['image']['url']; ?>" alt="<?php echo $ad['image']['alt']; ?>">
							<div class="text-center">
								<a target = "_blank" href = '<?php echo $ad['file']['url']; ?>'><button role = 'button' class = 'btn gold-button w-100 w-lg-50'><?php echo $ad['button_text']; ?></button></a>
							</div>
							
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #currentAd -->
<?php get_footer(); ?>
<?php
/**
 * Template Name: Landing Page
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="Landing Page Buckets" class = "page-wrapper landing-page">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style = "background: url('<?php echo $hero['background']['url']; ?>');">
					<div class="container">
						<div class="row col-sm-12">
							<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
							<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
						</div><!-- .row col-sm-12 -->
					</div><!-- .container -->
				</div><!-- #hero -->
				
				<div id="buckets" class = "container pb-5">
					<div class="row">
						<?php $count = count( get_field('buckets')) ?>
						<?php while( have_rows('buckets') ): the_row(); ?>
							<?php
							$image = get_sub_field('image');
							$header = get_sub_field('header');
							$copy = get_sub_field('copy');
							$text = get_sub_field('button_text');
							$link = get_sub_field('link');
							?>
							<div class="<?php if ($count == 2) {echo 'col-md-6 ';} else {echo 'col-md-4 ';} ?> service-bucket d-flex flex-column">
								<img class = "mb-3" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
								<h4 class = "text-center gold mb-3"><?php echo $header; ?></h4>
								<p class = "mb-3"><?php echo $copy; ?></p>
								<div class = "text-center mt-auto">
									<a href = '<?php echo $link; ?>'><button role = 'button' class = 'btn text-center gold-button'><?php echo $text; ?></button></a>
								</div>
							</div><!-- .col-md-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- #serviceBuckets -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #partsAndAccessories -->
<?php get_footer(); ?>
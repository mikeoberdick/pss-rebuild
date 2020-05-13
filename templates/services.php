<?php
/**
 * Template Name: Services
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="services" class = "page-wrapper">
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
				
				<div id="serviceBuckets" class = "container mb-5">
					<div class="row">
						<?php while( have_rows('buckets') ): the_row(); ?>
							<?php
							$image = get_sub_field('image');
							$header = get_sub_field('header');
							$copy = get_sub_field('copy');
							$text = get_sub_field('button_text');
							$link = get_sub_field('link'); ?>
							<div class="col-md-4">
								<img class = "mb-3" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
								<h4 class = "text-center gold mb-3"><?php echo $header; ?></h4>
								<p class = "mb-3"><?php echo $copy; ?></p>
								<div class = "text-center">
									<a href = '<?php echo $link; ?>'><button role = 'button' class = 'btn text-center gold-button'><?php echo $text; ?></button></a>
								</div>
							</div><!-- .col-md-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- #serviceBuckets -->

				<div id="serviceCallouts" class="container mb-5">
					<div class="row">
						<?php while( have_rows('callouts') ): the_row(); ?>
							<?php
							$image = get_sub_field('background');
							$header1 = get_sub_field('header_one');
							$header2 = get_sub_field('header_two');
							$subheader = get_sub_field('subheader');
							$copy = get_sub_field('copy'); ?>
						<div class="col-md-6 text-center">
							<div class = "callout-wrapper d-flex flex-column justify-content-center align-content-center p-5 inset" style = "background: url('<?php echo $image['url']; ?>');">
								<h2 class = "text-shadow"><?php echo $header1 ?></h2>
								<h3 class = "text-shadow"><?php echo $header2 ?></h3>
							</div>
							<div class = "content-wrapper p-3">
								<h5 class = "mb-3 font-weight-bold black"><?php echo $subheader; ?></h5>
								<p><?php echo $copy; ?></p>
							</div>
						</div><!-- .col-md-6 -->
					<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- #serviceCallouts.container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #services -->
<?php get_footer(); ?>
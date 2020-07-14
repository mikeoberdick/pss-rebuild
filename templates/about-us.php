<?php
/**
 * Template Name: About Us
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="aboutUs" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php get_template_part( 'snippets/page_header'); ?>
				<div class="embed-responsive embed-responsive-16by9">
				    <?php the_field('video_url'); ?>
				</div>
				<?php $team = get_field('meet_the_team'); ?>
				<h3 class="fancy"><?php echo $team['header']; ?></h3>
				<div class="container my-5">
					<div class="row">
						<div class="col-sm-12">
							<img src="<?php echo $team['image']['url']; ?>" alt="<?php echo $team['image']['alt']; ?>">
							<div class="content-wrapper p-5 text-center">
							<p class = "mb-3"><?php echo $team['copy']; ?></p>
							<a href = '/meet-the-team'><button role = 'button' class = 'btn gold-button'><?php echo $team['button_text']; ?></button></a>
						</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

				<?php $process = get_field('our_process'); ?>
				<h3 class="fancy"><?php echo $process['header']; ?></h3>
				<div class="container my-5">
					<div class="row">
						<div class="col-sm-12">
							<img src="<?php echo $process['image']['url']; ?>" alt="<?php echo $process['image']['alt']; ?>">
							<div class="content-wrapper p-5 text-center">
							<p class = "mb-3"><?php echo $process['copy']; ?></p>
							<a href = '/our-process'><button role = 'button' class = 'btn gold-button'><?php echo $process['button_text']; ?></button></a>
						</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
				<h3 class="fancy"><?php echo $process['header']; ?></h3>
				<div class="container my-5">
					<div class="row">
						<div class="col-sm-12">
							<div class="content-wrapper p-5">
							<h3 class = "mb-3"><?php echo $process['subheading']; ?></h3>
							<p><?php echo $process['copy']; ?></p>	
							</div>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #aboutUs -->
<?php get_footer(); ?>
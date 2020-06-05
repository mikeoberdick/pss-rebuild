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
				
				<div class="container mt-3">
					<div class="row">
						<div class="col-sm-12">
							<?php $img = get_field('group_image'); ?>
							<img class = "mb-3" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<p class = "mb-3"><?php the_field('copy'); ?></p>
							<?php $process = get_field('our_process'); ?>
							<h3 class="underlined d-flex"><?php echo $process['header']; ?></h3>
							<p><?php echo $process['copy']; ?></p>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #aboutUs -->
<?php get_footer(); ?>
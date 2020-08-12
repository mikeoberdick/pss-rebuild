<?php
/**
 * Template Name: Our Process
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="ourProcess" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php get_template_part( 'snippets/page_header'); ?>
				
				<div class="container mt-5">
					<div class="row mb-5">
						<div class="col-sm-12">
							<p class = "p-3"><?php the_field('copy'); ?></p>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class="row mt-3">
						<div class="col-sm-12 text-center">
							<h3 class = "mb-3"><?php the_field('header'); ?></h3>
						</div><!-- .col-sm-12 -->
						<?php
						if( have_rows('steps') ): $i = 1; while ( have_rows('steps') ) : the_row(); ?>

							<div class="col-md-6 mb-5 d-flex">
								<div class="d-flex flex-column step-wrapper text-center">
									<h3 class="mb-3 p-4">Step <?php echo $i; ?></h3>
									<h4 class = "mb-3 px-4"><?php the_sub_field('header'); ?></h4>
									<p class = "px-4"><?php the_sub_field('copy'); ?></p>
									<?php $img = get_sub_field('image'); ?>
									<div class = "mt-auto">
									<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">	
									</div>
					    		</div><!-- .step-wrapper -->
							</div><!-- .col-md-6 -->
    							<?php $i++; endwhile; endif; ?>
					</div><!-- .row -->
				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #ourProcess -->
<?php get_footer(); ?>
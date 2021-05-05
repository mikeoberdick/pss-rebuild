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

  				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style = "background: url('<?php echo $hero['background']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->

				<div class="container-fluid">
					<div class="row mt-3">
						<div id = "stepsContainer" class="col-sm-10 offset-sm-1">
						<?php
						if( have_rows('steps') ): $i = 1; while ( have_rows('steps') ) : the_row(); ?>
							<div class="d-flex flex-column step-wrapper text-center">
								<h3 class="mb-3 p-4">Step <?php echo $i; ?></h3>
								<h4 class = "mb-3 px-4"><?php the_sub_field('header'); ?></h4>
								<div class = "px-4"><?php the_sub_field('copy'); ?></div>
								<?php $img = get_sub_field('image'); ?>
								<?php $imgTwo = get_sub_field('image_two'); ?>
								<div class = "mt-auto">
									<div class="images<?php if($imgTwo){echo ' two-images';} ?> ">
										<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
										<?php if ($imgTwo) : ?>
											<img src="<?php echo $imgTwo['url']; ?>" alt="<?php echo $imgTwo['alt']; ?>">
										<?php endif; ?>
									</div><!-- .images -->
								</div><!-- .mt-auto -->
				    		</div><!-- .step-wrapper -->
    					<?php $i++; endwhile; endif; ?>
    				</div><!-- .col-sm-8 -->
					</div><!-- .row -->
				</div><!-- .container-fluid -->

				<div class="container mt-5">
					<div class="row mb-5">
						<div class="col-sm-12">
							<?php the_field('copy'); ?>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="buttons">
								<?php while(have_rows('buttons')) : the_row(); ?>
								<a href = '<?php the_sub_field('button_link'); ?>'><button role = 'button' class = 'btn text-center gold-button'><?php the_sub_field('button_text'); ?></button></a>
							<?php endwhile; ?>
							</div><!-- .buttons -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #ourProcess -->
<?php get_footer(); ?>
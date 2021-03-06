<?php
/**
 * Template Name: General Landing Page
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="generalLandingPage" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				
				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "<?php if ( $hero['header'] ) { echo 'inset'; } ?>" style = "background: url('<?php echo $hero['background_image']['url']; ?>');">
					
					<div class="container">
						<div class="row">
							<?php if ( $hero['header'] ) : ?>
							
							<div class="col-sm-12 text-center">
								<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
								<?php if ( $hero['subheader'] ) : ?>
								<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
							</div><!-- .col-sm-12 -->
							<?php endif; ?>
							<?php while ( have_rows('hero') ) : the_row(); ?>
							<?php if ( have_rows('buttons') ) : ?>
								<div class="col-sm-12 mt-3 button-group text-center">
								<?php while( have_rows('buttons') ) : the_row();
	              					$btnLink = get_sub_field('button_link');
	              					$btnText = get_sub_field('button_text'); ?>
	              					<a href = '<?php echo $btnLink; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $btnText; ?></button></a>
            					<?php endwhile; ?>
            					</div><!-- .hero-button-group -->
            				<?php endif; endwhile; ?>
            				<?php endif; ?>
						</div><!-- .row -->
					</div><!-- .container -->					
				</div><!-- #hero -->

				<?php if ( !$hero['header'] ) : ?>
					<?php while ( have_rows('hero') ) : the_row(); ?>
						<?php if ( have_rows('buttons') ) : ?>
							<div class="section below-hero container mt-3">
								<div class="row">
									<div class="col-sm-12 mt-3 button-group text-center">
										<?php while( have_rows('buttons') ) : the_row();
				          					$btnLink = get_sub_field('button_link');
				          					$btnText = get_sub_field('button_text'); ?>
				          					<a href = '<?php echo $btnLink; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $btnText; ?></button></a>
				    					<?php endwhile; ?>
	    							</div><!-- .hero-button-group -->
								</div><!-- .row -->
							</div><!-- .container -->
	    				<?php endif; ?>
            		<?php endwhile; ?>
				<?php endif; ?>

				<?php if ( have_rows('section') ) : while ( have_rows('section') ) : the_row(); ?>
					<div class="section mt-3">
						<?php if (get_sub_field('title')) : ?>
						<h3 class="fancy"><?php the_sub_field('title'); ?></h3>
						<?php endif; ?>
						<?php $bg = get_sub_field('background_image'); ?>
						<div <?php if ($bg) {echo 'class = "has-bg-img mt-5" style = "background: url(' . $bg['url'] . ');"';} ?>>
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<div class="wysiwyg">
										<?php the_sub_field('copy'); ?>	
										</div><!-- .wysiwyg -->
									</div><!-- .col-sm-12 -->
							<?php if ( have_rows('buttons') ) : ?>
								<div class="col-sm-12 mt-3 button-group text-center">
								<?php while( have_rows('buttons') ) : the_row();
	              					$btnLink = get_sub_field('button_link');
	              					$btnText = get_sub_field('button_text'); ?>
	              					<a href = '<?php echo $btnLink; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $btnText; ?></button></a>
            					<?php endwhile; ?>
            					</div><!-- .hero-button-group -->
            				<?php endif; ?>
								</div><!-- .row -->
							</div><!-- .container -->
						</div>
					</div><!-- .section -->
				<?php endwhile; endif; ?>

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #landingPageBuckets -->
<?php get_footer(); ?>
<?php
/**
 * Template Name: Interior Page
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="interiorPage" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				
				<div id="hero" class = "mb-5 inset" style="background-image: url('<?php echo $image[0]; ?>')">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-0 text-shadow"><?php the_title(); ?></h1>
							</div><!-- .col-sm-12 -->
						</div><!-- .row col-sm-12 -->
					</div><!-- .container -->
				</div><!-- #hero -->
				
				<div id="contentWrapper" class="container">
					<div class="row">
						<div class="col-sm-12">
							<?php if (have_posts()) :
							   while (have_posts()) :
							      the_post();
							         the_content();
							   endwhile;
							endif; ?>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- #contentWrapper.container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #auction -->
<?php get_footer(); ?>
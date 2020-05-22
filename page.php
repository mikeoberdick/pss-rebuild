<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="generalPage" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>
				<div class="container mt-5">
					<div class="row">
						<div class="col-sm-12">
						<?php while ( have_posts() ) : the_post(); ?>
							<div id="theContent">
								<?php the_content(); ?>
							</div><!-- #theContent -->
						<?php endwhile; ?>
						</div><!-- .col-sm-12 -->
					</div><!-- .row-->
				</div><!-- .container -->
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #services -->
<?php get_footer(); ?>
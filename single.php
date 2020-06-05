<?php
/**
 * The template for displaying the single blog page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="singlePost" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<?php get_template_part( 'snippets/page_header'); ?>

				<div class="container mt-5">
					<div class="row">
						<div class="col-sm-12">
							<div id="theContent">
								<?php the_content(); ?>
							</div><!-- #theContent -->
							<div id="socialShare" class = "d-flex flex-column align-items-start mb-3">
								<h5 class = "h6 mb-3 brotheres">Share This Post</h5><?php echo do_shortcode('[addtoany]'); ?>
							</div><!-- #socialShare -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
					
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #singlePost -->
<?php get_footer(); ?>
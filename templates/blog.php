<?php
/**
 * Template Name: Blog
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="blog" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<?php get_template_part( 'snippets/page_header'); ?>

				<div class="container mt-3">
					<div id = "featuredPost" class = "row mb-5">
					<?php $args = array(
						'post_type' => 'post',
						'posts_per_page' => 1
					); ?>
					<?php $query = new WP_Query($args); ?>
					<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-md-6">
							<div class="mb-3 mb-md-0 pr-md-5">
								<?php the_post_thumbnail(); ?>
							</div><!-- .mb-3 mb-md-0 -->
						</div><!-- .col-md-6 -->
						<div class="col-md-6 d-flex align-items-center">
							<article>
								<h3><?php the_title(); ?></h3>
								<div><?php the_excerpt(); ?></div>
								<a href = '<?php the_permalink(); ?>'><button role = 'button' class = 'btn black-button'>READ NOW</button></a>	
							</article>
						</div><!-- .col-md-6 -->
					<?php endwhile; endif; ?>
					<?php wp_reset_postdata(); ?>
					</div><!-- #featuredPost -->

					<div class="row mb-4">
						<div class="cat-search col-sm-12 d-flex justify-content-between">	
						<?php $terms  = get_terms('category'); ?>
				    	<?php if (count($terms)) : ?>
							<div id="ajaxFilter" data-paged="4" class="sc-ajax-filter">
                				<ul class="nav-filter list-unstyled d-flex flex-wrap mb-2">
				                    <li class="active">
				                        <a href="#" data-filter="<?php echo $terms[1]->taxonomy; ?>" data-term="all-terms" data-page="1" class = "h5">
				                            All Topics
				                        </a>
				                    </li>
				                    <?php foreach ($terms as $term) : ?>
				                        <li<?php if ($term->term_id == $a['active']) :?> class="active"<?php endif; ?>>
				                            <a href="<?php echo get_term_link( $term, $term->taxonomy ); ?>" data-filter="<?php echo $term->taxonomy; ?>" data-term="<?php echo $term->slug; ?>" data-page="1" class = "h5">
				                                <?php echo $term->name; ?>
				                            </a>
				                        </li>
				                    <?php endforeach; ?>
                				</ul>
            				</div>
		        		<?php endif; ?>
						</div><!-- .cat-search -->
					</div><!-- .row -->

					<?php $args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
						'offset' => 1
					); ?>
					<?php $post_query = new WP_Query($args); ?>
						<div id = "ajaxPosts" class="row posts">
					<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
							<article class="col-sm-12 mb-5">
								<h3 class="mb-3"><?php the_title(); ?></h3>
								<div class="row">
									<div class="col md-5">
										<div class = "mb-3"><?php the_post_thumbnail('blog-large'); ?></div>
									</div><!-- .col md-5 -->
									<div class="col-md-7">
										<div><?php the_excerpt(); ?></div>
										<a href = '<?php the_permalink(); ?>'><button role = 'button' class = 'btn black-button w-100 mb-3 mb-lg-0'>READ NOW</button></a>
									</div><!-- .col-md-7 -->
									</div><!-- .row -->
								</article>
						<?php endwhile; ?>
							<nav id = "pagination" class = "container mt-3 text-center navigation">
					            <div class="row">
					                <div class="col-sm-12">
					                    <?php psc_ajax_pager($post_query,$page); ?>
					                </div><!-- .col-sm-12 -->
					            </div><!-- .row -->
					        </nav>
						</div><!-- .row -->
					<?php wp_reset_postdata(); ?>
					
				</div><!-- .container -->
					
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #blog -->
<?php get_footer(); ?>
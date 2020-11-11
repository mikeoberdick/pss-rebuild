<?php
/**
 * Template Name: Auction
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="auction" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				
				<?php get_template_part( 'snippets/page_header'); ?>

				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style = "background: url('<?php echo $hero['background']['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<img class = "img-fluid" src="<?php echo $hero['banner_image']['url']; ?>" alt="Parks Superior Auction">
							</div><!-- .col-sm-12 -->
						</div><!-- .row col-sm-12 -->
					</div><!-- .container -->
				</div><!-- #hero -->

				<?php $content = get_field('content_box'); ?>

				<?php $posts = get_posts(array(
					'posts_per_page'	=> -1,
					'post_type'			=> 'car',
					'meta_key'		=> 'flag',
					'meta_value'	=> 'Parks Auction'
				));

				//If there are cars marked as parks_featured
				if( $posts ): ?>
					<h3 class="fancy mb-0">
						Currently Up For Auction
					</h3><!-- .fancy -->
					
					<section id="auctioncars" class = "py-3 p-relative container-fluid">
						<div class="row">
							<div id="auctionSlider" class="col-sm-12">
							<?php foreach( $posts as $post ): setup_postdata( $post ); ?>
								
								<?php get_template_part( 'snippets/car'); ?>
							
							<?php endforeach; ?>
							</div><!-- #auctionSlider -->
						</div><!-- .row -->
					</section><!-- #auctionCars -->
					
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
					
					<div class="text-center mb-5">
						<a target = "_blank" href = '<?php echo $content['auction_link']; ?>'><button role = 'button' class = 'btn gold-button'><img class = "mr-3" src="/wp-content/themes/understrap-child/img/gavel.png" alt="Auction Gavel">Enter Auction</button></a>
					</div><!-- .text-center -->

				
				
				<div id="auctionContent" class="container mb-5">
					<div class="row">
						<div class="col-md-8">
							<div class="p-3 content-wrapper">
								<div id = "auctionHeader">
									<h3><?php echo $content['header']; ?></h3>
								</div><!-- #auctionHeader -->
									
								<h5 class = "font-weight-bold"><?php echo $content['subheader']; ?></h5>
									
								<div class="pl-3 float-right">
									<img class = "mb-3" src="<?php echo $content['auctioneer_image']['url']; ?>" alt="Heather Palmer: Auctioneer">
									<p class="small text-center font-italic mb-0">
											<?php echo $content['auctioneer_title']; ?>
									</p><!-- .small -->
									<h5 class = "text-center font-italic mb-0"><?php echo $content['auctioneer_name']; ?></h5>
									<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
									<a href="tel:<?php echo $phone ?>">
									  <h4 class = "red text-center"><?php the_field('phone_number', 'option'); ?></h4>
									</a>
								</div><!-- .float-right -->
									
								<p><?php echo $content['copy']; ?></p>
							</div><!-- .content-wrapper -->
						</div><!-- .col-md-8 -->
						<div class="col-md-4">
							<div id="faqHeader" class = "d-flex p-3">
								<img class = 'mr-3' src="/wp-content/themes/understrap-child/img/question.png" alt="Frequently Asked Questions">
								<h5 class = "font-weight-bold">Frequently Asked Questions</h5>
							</div><!-- #faqHeader -->
							<div id="faqWrapper" class = "p-3">
								<?php  $i = 0; ?>
							<?php while ( have_rows('frequently_asked_questions') ) : the_row(); ?>

								<div class="question-wrapper">
									<a class = "mb-3 question font-weight-bold text-white" data-toggle="collapse" href="#question-<?php echo $i; ?>" role="button" aria-expanded="false" aria-controls="question-<?php echo $i; ?>"><h5><?php the_sub_field('question'); ?><i class="ml-2 fa fa-chevron-down" aria-hidden="true"></i></h5></a>
					        		<div class = "answer collapse" id="question-<?php echo $i; ?>"><p class = "card-body black mb-3"><?php the_sub_field('answer'); ?></p></div>
								</div><!-- .question-wrapper -->
								<?php $i++; ?>
   							<?php endwhile;	?>
							</div><!-- #faqWrapper -->
						</div><!-- .col-md-4 -->
					</div><!-- .row -->
				</div><!-- #auctionContent -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #auction -->
<?php get_footer(); ?>
<?php
/**
 * Template Name: Financing
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="financing" class = "page-wrapper">
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
							<h3 class = "mb-3 text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
							<a href = '<?php echo $hero['button_link']; ?>'><button role = 'button' class = 'btn btn-primary gold-button'><?php echo $hero['button_text']; ?></button></a>	
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->
				
				<?php $main = get_field('main_copy'); ?>
				<h3 class = "fancy"><?php echo $main['header']; ?></h3>
				<div class="container">
					<div class="row mb-5">
						<div class="col-sm-12 text-center">
							<p><?php echo $main['copy']; ?></p>
							<?php $creditApp = get_field('credit_application_file'); ?>
							<a target = "_blank" href = '<?php echo $creditApp['url']; ?>'><button role = 'button' class = 'btn gold-button'><i class="fa fa-check-circle mr-3" aria-hidden="true"></i>Download Credit Application</button></a>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class="row mb-5">
						<div class="col-sm-12">
							<div class="p-4 content-wrapper">
								<?php while( have_rows('content_boxes') ) : the_row(); ?>
									<div class="content-box row mb-3">
									<div class="col-md-6">
										<?php $img = get_sub_field('image'); ?>
										<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
									</div><!-- .col-md-6 -->
									<div class="col-md-6">
										<h3 class="underlined">
											<?php the_sub_field('header'); ?>
										</h3>
										<div class = "wp-editor"><?php the_sub_field('copy'); ?></div>
									</div><!-- .col-md-6 -->	
									</div>
								<?php endwhile; ?>
							</div><!-- .container-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					<div class="row mb-5">
						<div class="col-md-6 mb-3 mb-md-0">
							<a target = "_blank" href = '<?php echo $creditApp['url']; ?>'><button role = 'button' class = 'btn gold-button w-100'><i class="fa fa-check-circle mr-3" aria-hidden="true"></i>Download Credit Application</button></a>
						</div><!-- .col-md-6 -->
						<div class="col-md-6">
							<a data-toggle="modal" data-target="#submitCreditApplication"><button role = 'button' class = 'btn gold-button w-100'><i class="fa fa-upload mr-3" aria-hidden="true"></i>Submit A Credit Application</button></a>
						</div><!-- .col-md-6 -->
					</div><!-- .row -->
					<div class="row mb-5">
						<?php while( have_rows('callouts') ) : the_row(); ?>
							<div class="col-md-4 d-flex flex-column justify-content-center align-items-center mb-3 mb-md-0">
								<?php $icon = get_sub_field('icon'); ?>
								<div class="icon-wrapper mb-3">
								<img class = "callout-icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>"></div>
								<h4 class="gold text-center mt-auto"><?php the_sub_field('header'); ?></h4>
							</div><!-- .col-md-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- .container -->
				<h3 class="fancy">Frequently Asked Questions</h3>
				<section id = "faqs">
					<div class="container">
				<?php if( have_rows('frequently_asked_questions') ): ?>
					<div class="w-100 accordion md-accordion" id="faqAccordion" role="tablist" aria-multiselectable="true">
						<?php $i = 0; ?>
 				<?php while ( have_rows('frequently_asked_questions') ) : the_row(); ?>
			        <div class="question">
			        	<div class="card-wrapper text-center" role="tab" id="<?php echo 'question-' . $i; ?>">
      						<a data-toggle="collapse" data-target="<?php echo '#collapse-question-' . $i; ?>" aria-expanded="<?php if ( $i == 0 ) {echo 'true';} else {echo 'false';}; ?>" aria-controls="<?php echo 'collapse-question-' . $i; ?>">
        					<h3 class="mb-3"><?php the_sub_field('question'); ?><i class="ml-3 fa fa-angle-down" aria-hidden="true"></i></h2>
        					
        				<div id="<?php echo 'collapse-question-' . $i; ?>"
        					class = "<?php if ( $i == 0 ) {echo 'collapse show';} else {echo 'collapse';}; ?>" role="tabpanel" aria-labelledby="<?php echo 'question-' . $i; ?>" data-parent="#faqAccordion">
					      <div class="card-body">
							<?php the_sub_field('answer'); ?>
					      </div><!-- .card-body -->
    					</div><!-- .collapse -->
      					</a>
    					</div><!-- card-wrapper -->
    				</div><!-- .question -->
    				<?php $i++ ?>
				<?php endwhile; ?>
				</div><!-- .accordion -->
			<?php endif; ?>				
			</div><!-- .container -->
		</section><!-- #questions -->

		<?php get_template_part( 'snippets/contact-box'); ?>

				<div class="modal fade p-5" id="submitCreditApplication" tabindex="-1" role="dialog" aria-labelledby="Submit Credit Application" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-body p-5">
        <a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
			<div class = "text-center">
				<?php echo do_shortcode('[ninja_form id=4]'); ?>
			</div>
      </div><!-- .modal-body -->
    </div><!-- .modal-content -->
  </div><!-- .modal-dialog -->
</div><!-- .modal -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #financing -->
<?php get_footer(); ?>
<?php
/**
 * Template Name: Parts
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="parts" class = "page-wrapper">
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

				<div class="container mb-5">
					<div class="row">
						<div class="col-sm-12">
							<div class="p-4 content-wrapper">
								<?php the_field('content'); ?>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->

				<h3 class="fancy">Parts</h3>
				<div id="partsCatalog" class = "container">
					<div class="row">
						<?php while ( have_rows('parts') ) : the_row(); ?>
							<div class="col-md-4 mb-3">
								<?php $img = get_sub_field('image'); ?>
								<img class = "mb-3" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								<h4 class="gold mb-3 text-center"><?php the_sub_field('name'); ?></h4>
								<p><?php the_sub_field('description'); ?></p>
							</div><!-- .col-md-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- #partsCatalog -->

				<?php $contact = get_field('contact'); ?>
				<h3 class = "fancy">Contact The <?php echo $contact['department']; ?> Today</h3>
				<div class="container mb-5">
					<div class="row content-wrapper p-5">
						<div class="col-md-5 text-right">
							<?php $img = $contact['image']; ?>
							<img class = "pr-3 w-100" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
						</div><!-- .col-md-5 -->
						<div class="col-md-7 contact-border">
							<div class="pl-3">
							<h3 class = "mb-0 red"><?php echo $contact['name']; ?></h3>
							<h5 class = "mb-3 gray font-weight-bold"><?php echo $contact['title']; ?></h5>
							<?php if ($contact['office_number']) : ?>
							<?php $office = preg_replace('/[^0-9]/', '', $contact['office_number']); ?>

							<a href="tel:<?php echo $office ?>"><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-phone mr-3" aria-hidden="true"></i>Call Office</button></a>
							<?php endif; ?>
							<?php if ($contact['mobile_number']) : ?>
							<?php $mobile = preg_replace('/[^0-9]/', '', $contact['mobile_number']); ?>
							<a href="tel:<?php echo $mobile ?>"><button role = 'button' class = 'btn gold-button w-100 mb-3'><i class="fa fa-mobile mr-3" aria-hidden="true"></i>Call Mobile</button></a>
							<?php endif; ?>
							<?php $first = explode(' ',trim($contact['name'])); ?>
							<a target = '_blank' href = 'mailto:<?php echo $contact['email']; ?>'><button role = 'button' class = 'btn gold-button w-100'><i class="fa fa-envelope-o mr-3" aria-hidden="true"></i>Email <?php echo $first[0]; ?></button></a>	
							</div>
						</div><!-- .col-md-7 -->
					</div><!-- .row -->
				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #parts -->
<?php get_footer(); ?>
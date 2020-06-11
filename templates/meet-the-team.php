<?php
/**
 * Template Name: Meet The Team
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="meetTheTeam" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php get_template_part( 'snippets/page_header'); ?>
				
				<div class="container mt-3">
					
					<div class="row">
						<div class="col-sm-12">
							<p><?php the_field('general_copy'); ?></p>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
					
					<div class="row mt-3">
						<div class="col-sm-12 mb-3">
							<h3 class = "gold d-flex underlined">Sales</h3>
						</div><!-- .col-sm-12 -->
						<?php $salesCount = 0; ?>
						<?php while( have_rows('sales_staff') ): the_row(); ?>
						<div class="col-md-3 col-lg-4 mb-5 text-center">
							<div class="mb-3 staff-pic">
								<img src="<?php echo wp_get_attachment_image_src( get_sub_field('image'), 'staff-small' )[0]; ?>" alt="">
							</div>
							<h5 class = "mb-0"><?php the_sub_field('name'); ?></h5>
							<div class = "mb-3"><span class = "font-italic gold"><?php the_sub_field('title'); ?></span></div>
							<strong>Office: </strong>800.229.5008
							<?php if( get_sub_field('mobile_number') ): ?>
								<div><strong>Mobile: </strong><?php the_sub_field('mobile_number'); ?></div>
							<?php endif; ?>
							<?php if( get_sub_field('email') ): ?>
								<div><strong>Email: </strong><a href="mailto:<?php the_sub_field('email') ?>"><?php the_sub_field('email'); ?></a></div>
							<?php endif; ?>
							<?php if( get_sub_field('bio') ): ?>
								<?php
								$name = get_sub_field('name');
								$arr = explode(' ',trim($name)); ?>
								<button role = 'button' class = 'd-none mt-3 btn gold-button modal-trigger' data-toggle="modal" data-target="#sales<?php echo $salesCount; ?>">More About <?php echo $arr[0]; ?></button>

								<!-- Modal -->
								<div class="modal fade" id="sales<?php echo $salesCount; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php the_sub_field('name'); ?>" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        [ CONTENT HERE ABOUT <?php the_sub_field('name'); ?> ]
								      </div>
								    </div>
								  </div>
								</div>
							<?php endif; ?>
						</div>
						<?php $salesCount++; endwhile; ?>
					</div><!-- .row -->

					<div class="row mt-3">
						<div class="col-sm-12 mb-3">
							<h3 class = "gold d-flex underlined">Service</h3>
						</div><!-- .col-sm-12 -->
						<?php $serviceCount = 0; ?>
						<?php while( have_rows('service_staff') ): the_row(); ?>
						<div class="col-md-3 col-lg-4 mb-3 text-center">
							<div class="mb-3 staff-pic">
								<img src="<?php echo wp_get_attachment_image_src( get_sub_field('image'), 'staff-small' )[0]; ?>" alt="">
							</div>
							<h5 class = "mb-0"><?php the_sub_field('name'); ?></h5>
							<div class = "mb-3"><span class = "font-italic gold"><?php the_sub_field('title'); ?></span></div>
							<strong>Office: </strong>800.229.5008
							<?php if( get_sub_field('mobile_number') ): ?>
								<div><strong>Mobile: </strong><?php the_sub_field('mobile_number'); ?></div>
							<?php endif; ?>
							<?php if( get_sub_field('email') ): ?>
								<div><strong>Email: </strong><a href="mailto:<?php the_sub_field('email') ?>"><?php the_sub_field('email'); ?></a></div>
							<?php endif; ?>
							<?php if( get_sub_field('bio') ): ?>
								<?php
								$name = get_sub_field('name');
								$arr = explode(' ',trim($name)); ?>
								<button role = 'button' class = 'd-none mt-3 btn gold-button modal-trigger' data-toggle="modal" data-target="#service<?php echo $serviceCount; ?>">More About <?php echo $arr[0]; ?></button>

								<!-- Modal -->
								<div class="modal fade" id="sales<?php echo $serviceCount; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php the_sub_field('name'); ?>" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        [ CONTENT HERE ABOUT <?php the_sub_field('name'); ?> ]
								      </div>
								    </div>
								  </div>
								</div>
							<?php endif; ?>
						</div>
						<?php $serviceCount++; endwhile; ?>
					</div><!-- .row -->

					<div class="row mt-3">
						<div class="col-sm-12 mb-3">
							<h3 class = "gold d-flex underlined">Office</h3>
						</div><!-- .col-sm-12 -->
						<?php $officeCount = 0; ?>
						<?php while( have_rows('office_staff') ): the_row(); ?>
						<div class="col-md-3 col-lg-4 mb-5 text-center">
							<div class="mb-3 staff-pic">
								<img src="<?php echo wp_get_attachment_image_src( get_sub_field('image'), 'staff-small' )[0]; ?>" alt="">
							</div>
							<h5 class = "mb-0"><?php the_sub_field('name'); ?></h5>
							<div class = "mb-3"><span class = "font-italic gold"><?php the_sub_field('title'); ?></span></div>
							<strong>Office: </strong>800.229.5008
							<?php if( get_sub_field('mobile_number') ): ?>
								<div><strong>Mobile: </strong><?php the_sub_field('mobile_number'); ?></div>
							<?php endif; ?>
							<?php if( get_sub_field('email') ): ?>
								<div><strong>Email: </strong><a href="mailto:<?php the_sub_field('email') ?>"><?php the_sub_field('email'); ?></a></div>
							<?php endif; ?>
							<?php if( get_sub_field('bio') ): ?>
								<?php
								$name = get_sub_field('name');
								$arr = explode(' ',trim($name)); ?>
								<button role = 'button' class = 'd-none mt-3 btn gold-button modal-trigger' data-toggle="modal" data-target="#office<?php echo $salesCount; ?>">More About <?php echo $arr[0]; ?></button>

								<!-- Modal -->
								<div class="modal fade" id="office<?php echo $officeCount; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php the_sub_field('name'); ?>" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        [ CONTENT HERE ABOUT <?php the_sub_field('name'); ?> ]
								      </div>
								    </div>
								  </div>
								</div>
							<?php endif; ?>
						</div>
						<?php $salesCount++; endwhile; ?>
					</div><!-- .row -->

					<div class="row mt-3">
						<div class="col-sm-12 mb-3">
							<h3 class = "gold d-flex underlined">Drivers</h3>
						</div><!-- .col-sm-12 -->
						<?php $driversCount = 0; ?>
						<?php while( have_rows('drivers_staff') ): the_row(); ?>
						<div class="col-md-3 col-lg-4 mb-5 text-center">
							<div class="mb-3 staff-pic">
								<img src="<?php echo wp_get_attachment_image_src( get_sub_field('image'), 'staff-small' )[0]; ?>" alt="">
							</div>
							<h5 class = "mb-0"><?php the_sub_field('name'); ?></h5>
							<div class = "mb-3"><span class = "font-italic gold"><?php the_sub_field('title'); ?></span></div>
							<strong>Office: </strong>800.229.5008
							<?php if( get_sub_field('mobile_number') ): ?>
								<div><strong>Mobile: </strong><?php the_sub_field('mobile_number'); ?></div>
							<?php endif; ?>
							<?php if( get_sub_field('email') ): ?>
								<div><strong>Email: </strong><a href="mailto:<?php the_sub_field('email') ?>"><?php the_sub_field('email'); ?></a></div>
							<?php endif; ?>
							<?php if( get_sub_field('bio') ): ?>
								<?php
								$name = get_sub_field('name');
								$arr = explode(' ',trim($name)); ?>
								<button role = 'button' class = 'd-none mt-3 btn gold-button modal-trigger' data-toggle="modal" data-target="#drivers<?php echo $salesCount; ?>">More About <?php echo $arr[0]; ?></button>

								<!-- Modal -->
								<div class="modal fade" id="driver<?php echo $driversCount; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php the_sub_field('name'); ?>" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        [ CONTENT HERE ABOUT <?php the_sub_field('name'); ?> ]
								      </div>
								    </div>
								  </div>
								</div>
							<?php endif; ?>
						</div>
						<?php $salesCount++; endwhile; ?>
					</div><!-- .row -->

				</div><!-- .container -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #meetTheTeam -->
<?php get_footer(); ?>
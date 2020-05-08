<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div id="js-heightControl" style="height: 0;">&nbsp;</div>

<footer id="wrapper-footer" class="wrapper pb-5">

	<div id = "footerNavWrapper" class="container-fluid mb-5">
		<div class="container">
			<div class="row">
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu',
						'container_class' => 'col-sm-12 justify-content-center',
						'container_id'    => 'footerNav',
						'menu_class'      => 'list-unstyled d-flex justify-content-center mb-0 align-items-center',
						'fallback_cb'     => '',
						'menu_id'         => '',
						'depth'           => 1,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #footerNavWrapper -->

	<div class="container">
		<div class="row">
			<div class="col-xl-1 text-center text-xl-left">
				<?php $bbb = get_field('bbb_logo', 'options'); ?>
				<img class = "mb-3 mb-xl-0" src="<?php echo $bbb['url']; ?>" alt="Better Business Bureau A+ Rating">
			</div><!-- .col-xl-1 -->
			<div class="col-xl-11 mb-5">
				<div class = "row">
					<div class="col-xl-9 mb-3">
						<?php
						$addy1 = get_field('address_line_1', 'option');
						$addy2 = get_field('address_line_2', 'option');
						$phone = get_field('phone_number', 'option');
						$phoneLink = preg_replace('/[^0-9]/', '', $phone);
						$email = get_field('email_address', 'option');
						?>
						<div class = "text-center text-xl-left">
							<p class = "mb-0 d-inline">
								<?php echo $addy1; ?>
							</p>
							<p class = "mb-0 d-inline">
							<?php echo $addy2; ?>
							</p>
							<span class = "mx-1 d-none d-md-inline"> | </span>
							<p class = "mb-0 d-block d-md-inline">Phone: 	<a href="tel:<?php echo $phoneLink; ?>">
								<?php echo $phone; ?>
								</a>
							</p>
							<span class = "mx-1 d-none d-md-inline"> | </span>
							<p class = "d-block d-md-inline">Email: <a href = "mailto:<?php echo $email; ?>"><?php echo $email; ?></a>						</div>
					</div><!-- .col-xl-9 -->
					<div id = "footerSocial" class="col-xl-3">
						<ul class="list-unstyled d-inline-flex w-100 justify-content-center justify-content-xl-around">
							<li class = "mr-3 mr-xl-0"><a target = "_blank" href="<?php the_field('youtube_url', 'option'); ?>"><i class="fa fa-youtube fa-2x" aria-hidden="true"></i></a></li>
							<li class = "mr-3 mr-xl-0"><a target = "_blank" href="<?php the_field('facebook_url', 'option'); ?>"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
							<li class = "mr-3 mr-xl-0"><a target = "_blank" href="<?php the_field('linkedin_url', 'option'); ?>"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
							<li><a target = "_blank" href="<?php the_field('instagram_url', 'option'); ?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
						</ul>
					</div><!-- .col-xl-3 -->
				</div><!-- .row -->
				<div class="row">
					<div class="col-xl-6 text-center text-xl-left mb-3 mb-xl-0">
						<p class = "mb-0">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.</p>
					</div><!-- .col-xl-6 -->
					<div class="col-xl-6 justify-content-center justify-content-xl-end d-inline-flex">
						<ul class="list-unstyled d-flex">
							<li><a href="/privacy-policy">Privacy Policy</a></li>
							<li><span class = "mx-1">|</span></li>
							<li><a href="/terms-and-conditions">Terms & Conditions</a></li>
							<li><span class = "mx-1">|</span></li>
							<li><a href="/disclosures-and-fees">Disclosures & Fees</a></li>
						</ul>
					</div><!-- .col-xl-6 -->
				</div><!-- .row -->
			</div><!-- .col-xl-11 -->
			<div class="col-sm-12 text-center">
				POWERED BY <a target = "_blank" href="https://www.designs4theweb.com"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/d4tw.png" alt="Another WordPress website by Designs 4 The Web"></a>
			</div><!-- .col-sm-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

			

		</div><!-- row end -->

	</div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here from header file -->

<?php wp_footer(); ?>

</body>

</html>
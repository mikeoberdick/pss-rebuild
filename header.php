<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- OPTIONAL GOOGLE TRACKING ID SET WITH CUSTOM FIELD -->
	<?php if( get_field('tracking_code', 'option') ): $tracking_code = get_field('tracking_code', 'option'); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $tracking_code; ?>"></script>
	<script>
	  	window.dataLayer = window.dataLayer || [];
	  	function gtag(){dataLayer.push(arguments);}
	  	gtag('js', new Date());

		gtag('config', '<?php echo $tracking_code; ?>');
	</script>
	<?php endif; ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- STOPS GOOGLE FROM INDEXING SITE ON STAGING -->
	<!-- NEED TO REMOVE ON PRODUCTION -->
	<meta name="robots" content="noindex">
	<!-- NEED TO REMOVE ON PRODUCTION -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite" class = "position-relative">
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

    	<nav class="navbar navbar-expand-lg">
			<div class="container justify-content-around">
				<div class="row w-100">
					<div id = "menuLeft" class="col-md-4 d-flex flex-column">
						<div class = "align-items-center underlined mb-3 d-none d-lg-flex">
							<i class="fa fa-question-circle-o fa-2x gold mr-2" aria-hidden="true"></i>
							<h4 class = "gold mb-0">Ask a Question</h4>
						</div>
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'menu-left',
								'container_class' => 'collapse navbar-collapse align-items-end',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav split-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu-left',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div><!-- .col-md-4 -->

					<div class="col-md-4 position-relative">
						<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
						<?php $logo = get_field('logo', 'options'); ?>
						<img id = "logo" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
							<i class="fa fa-bars fa-2x" aria-hidden="true"></i>
						</button>
					</div><!-- .col-md-4 -->

					<div id = "menuRight" class="col-md-4 d-flex flex-column">
						<div class = "align-items-center justify-content-end underlined mb-3 d-none d-lg-flex">
							<i class="fa fa-phone fa-2x gold mr-2" aria-hidden="true"></i>
							<?php $phone = preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>
							<h4 class = "gold mb-0">
								<a href="tel:<?php echo $phone ?>">
  								<?php the_field('phone_number', 'option'); ?>
								</a>
							</h4>	
						</div>
						
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'menu-right',
								'container_class' => 'collapse navbar-collapse align-items-end',
								'container_id'    => '',
								'menu_class'      => 'navbar-nav split-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu-right',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						); ?>
					</div><!-- .col-md-4 -->
				</div><!-- .row -->
			</div><!-- .container -->

		</nav><!-- .site-navigation -->
	</div><!-- #wrapper-navbar end -->
<div id="floatingSocial">
	<a class = "social-link youtube mb-2" rel="noreferrer" target = "_blank" href="<?php the_field('youtube_url', 'options') ?>"><i class="fa fa-youtube" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">YouTube</span></a>	
	<a class = "social-link facebook mb-2" rel="noreferrer" target = "_blank" href="<?php the_field('facebook_url', 'options') ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Facebook</span></a>
	<a class = "social-link linked-in mb-2" rel="noreferrer" target = "_blank" href="<?php the_field('linkedin_url', 'options') ?>"><i class="fa fa-linkedin" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Linked In</span></a>
	<a class = "social-link instagram" rel="noreferrer" target = "_blank" href="<?php the_field('instagram_url', 'options') ?>"><i class="fa fa-instagram" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Instagram</span></a>
</div><!-- #floatingSocial -->
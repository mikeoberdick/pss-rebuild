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
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37665217-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-37665217-1');
	</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>

<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5YnpUu6uHmrXRG0F7RgUBRKy1gO7K4vk";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite" class = "fixed-top">
		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

    	<nav class="navbar navbar-expand-lg">
			<div class="container justify-content-around">
				<div class="row w-100">
					<div id = "menuLeft" class="col-lg-4 d-flex flex-column">
						<div class = "align-items-center underlined mb-3 d-none d-lg-flex">
							<i class="fa fa fa-question-circle fa-2x gold mr-2" aria-hidden="true"></i>
							<a data-toggle = "modal" data-target = "#headerContactModal"><h4 class = "gold mb-0">Ask a Question</h4></a>
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

					<div class="mobile-menu-container col-lg-4 position-relative">
						<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url">
						<?php $logo = get_field('logo', 'options'); ?>
						<img id = "logo" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="modal" data-target="#modalNav" aria-controls="modalNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
							<i class="fa fa-2x fa-bars" aria-hidden="true"></i>
						</button>
					</div><!-- .col-md-4 -->

					<div id = "menuRight" class="col-lg-4 d-flex flex-column">
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

	<!-- MODAL NAV -->
	<div class="modal fade" id="modalNav" tabindex="-1" role="dialog" aria-labelledby="Mobile Navigation" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-body p-4">
	      	<div id = "modalTop" class = "d-flex align-items-center justify-content-center">
		      	<a rel = "home" data-itemprop="url" title="<?php echo esc_attr( get_bloginfo( 'name') ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img id = "headerLogo" src = "<?php echo get_stylesheet_directory_uri() . '/img/logo.png' ?>" alt = "<?php echo esc_attr( get_bloginfo( 'name') ); ?>">
				</a>
				<div>
				<a class="modal-close" data-dismiss="modal"><i class="fa fa-times-thin" aria-hidden="true"></i></a>	
				</div>
	        		
	      	</div>
	      	<div>
	      	<?php wp_nav_menu(
				array(
					'theme_location'  => 'menu-left',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'mobile-nav list-unstyled',
					'fallback_cb'     => '',
					'menu_id'         => 'mobile-menu',
					'depth'           => 2,
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			); ?>
	      	</div>
	      </div><!-- .modal-body -->
	    </div><!-- .modal-content -->
	  </div><!-- .modal-dialog -->
	</div><!-- .modal -->

<div class="modal fade contact-modal" id="headerContactModal" tabindex="-1" role="dialog" aria-labelledby="Header Contact Form" aria-hidden="true">
  	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
	    <div class="modal-content">
	    	<div class="modal-body p-3 p-md-5">
	    		<a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
				<div class="row">
					<div class="col-sm-12">
						<div class="text-center">
							<?php $logo = get_field('logo', 'options'); ?>
						<img id = "logo" class = "d-block mx-auto" src="<?php echo $logo['url']; ?>" alt="<?php echo get_bloginfo( 'name'); ?>">
						</div>
						<h3>How can we help?</h3>
					<?php echo do_shortcode('[ninja_form id=1]'); ?>
					</div><!-- .col-sm-12 -->   	
				</div><!-- .row -->
	    	</div><!-- .modal-body -->
	  	</div><!-- .modal-content -->
	</div><!-- .modal-dialog -->
</div><!-- .modal -->
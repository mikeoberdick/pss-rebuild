<?php $contact = get_field('contact_form', 'option'); ?>
<?php if(is_singular('car')) {
		$subtitle = 'See Something you Like?';
		$form = 6;
	} else if ( is_page_template( array('templates/inventory.php', 'templates/homepage.php') ) ) {
		$subtitle = 'Get The Car You Want!';
		$form = 7;
	} else {
		$subtitle = 'How Can We Help?';
		$form = 1;
	} ?>
			<div id = "contactForm" style = "background: url('/wp-content/themes/understrap-child/img/contact_bg.png');" class = 'py-5'>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h3 class = "mb-0 black text-shadow"><?php echo $subtitle; ?></h3>
							<h1 class="black text-shadow">Contact Us</h1>
							<p class = "mb-5 black text-shadow">Send an email to our team using the form below and a member of our staff will contact you as soon as possible.</p>
							<?php echo do_shortcode('[ninja_form id=' . $form . ']'); ?>
						</div><!-- .col-sm-12 -->	
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- #contactForm -->
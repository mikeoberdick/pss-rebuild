<?php $contact = get_field('contact_form', 'option'); ?>
			<div id = "contactForm" style = "background: url('/wp-content/themes/understrap-child/img/contact_bg.png');" class = 'py-5'>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h3 class = "mb-0 black text-shadow">See Something You Like?</h3>
							<h1 class="black text-shadow">Contact Us</h1>
							<p class = "mb-5 black text-shadow">Send an email to our team using the form below and a member of our staff will contact you as soon as possible.</p>
							<?php if(is_singular('car')) {
								echo do_shortcode('[ninja_form id=6]'); 
							} else {
								echo do_shortcode('[ninja_form id=1]');
							} ?>
						</div><!-- .col-sm-12 -->	
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- #contactForm -->
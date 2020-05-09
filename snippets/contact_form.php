<?php $contact = get_field('contact_form', 'option'); ?>
<div id = "contactForm" style = "background: url('<?php echo $contact['background']['url']; ?>');" class = 'py-5'>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<?php echo do_shortcode('[ninja_form id=1]'); ?>
			</div><!-- .col-sm-12 -->	
		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- #contactForm -->
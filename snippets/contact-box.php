<?php $contact = get_field('contact'); ?>
<?php if ($contact['department']) : ?>

<h3 class = "fancy">Contact The <?php echo $contact['department']; ?> Today</h3>
<div class="container mb-5">
	<div class="row content-wrapper p-5">
		<div class="col-md-5 text-right">
			<?php $img = $contact['image']; ?>
			<img class = "pr-lg-3 w-100 mb-3 mb-md-0" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
		</div><!-- .col-md-5 -->
		<div class="col-md-7 contact-border text-center text-lg-left">
			<div class="pl-lg-3">
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
<?php endif; ?>
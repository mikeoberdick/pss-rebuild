<div id="mainSliderWrapper" class = "position-relative">
  <div class="main-slider">

    <?php while( have_rows('hero_slider') ) : the_row();
      $type = get_sub_field('image_or_video');
      $header = get_sub_field('header');

    if ( $type === 'image' ) {
      $bgImage = get_sub_field('background_image'); ?>
    
      <div class = "item image image-slide lazy position-relative slide" data-bg = "<?php echo $bgImage['url']; ?>" class = "inset">
        <div class="hero-content container position-absolute">
          <div class="row">
            <?php if ($header || have_rows('page_links')) : ?>
            <div class="col-sm-12 text-center mb-3 mb-lg-5">
              <?php if ($header) : ?>
              <h1 class = "mb-5 text-shadow"><?php echo $header; ?></h1>
              <?php endif; ?>
              <?php if ( have_rows('page_links') ) : while( have_rows('page_links') ) : the_row();
                $btnLink = get_sub_field('button_link');
                $btnText = get_sub_field('button_text'); ?>
                <a href = '<?php echo $btnLink; ?>'><button role = 'button' class = 'btn gold-button'><?php echo $btnText; ?></button></a>
              <?php endwhile; endif; ?>
            </div><!-- .col-sm-12 -->
          <?php endif; ?>
          
          </div><!-- .row -->
        </div><!-- .container -->
      </div><!-- .image-slide -->
    <?php } else if ( $type === 'video' ) {
        $bgVideo = get_sub_field('background_video'); ?>

      <div class="item youtube slide">
        
        <iframe class="embed-player slide-media" width="980" height="520" src="<?php echo $bgVideo; ?>?enablejsapi=1&controls=0&fs=0&iv_load_policy=3&rel=0&showinfo=0&loop=1" frameborder="0" allowfullscreen></iframe>
        
        <div class="hero-content container position-absolute">
          <div class="row">
          <?php if ($header || have_rows('page_links')) : ?>
            <div class="col-sm-12 text-center mb-3 mb-lg-5">
              <?php if ($header) : ?>
              <h1 class = "mb-3 mb-lg-5 text-shadow"><?php echo $header; ?></h1>
            <?php endif; ?>
              <?php if ( have_rows('page_links') ) : while( have_rows('page_links') ) : the_row();
                $btnLink = get_sub_field('button_link');
                $btnText = get_sub_field('button_text'); ?>
                <a href = '<?php echo $btnLink; ?>'><button role = 'button' class = 'btn gold-button mr-3 mb-3 mb-md-0'><?php echo $btnText; ?></button></a>
              <?php endwhile; endif; ?>
            </div><!-- .col-sm-12 -->
          <?php endif; ?>

        </div><!-- .row -->
      </div><!-- #heroContent -->
    </div><!-- .video -->
    <?php } endwhile; ?>
  </div><!-- .main-slider -->
  <div id = "scrollDown" class="col-sm-12 text-center d-none d-md-block">
    <a href = "#sectionOne">
      <i class="fa fa-arrow-down fa-2x mb-4" aria-hidden="true"></i><br>
      <h5 class = "d-none d-lg-inline-block">SCROLL DOWN</h5>
    </a><!-- #scrollDown -->
  </div><!-- .col-sm-12 -->
</div><!-- #mainSliderWrapper -->
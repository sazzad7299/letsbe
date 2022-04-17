<?php get_header();?>
<section class="page-title parallax">
<?php  $fetrued_img = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
  <div data-parallax="scroll" data-image-src="<?php echo esc_url($fetrued_img) ?>" class="parallax-bg"></div>
  <div class="parallax-overlay">
    <div class="centrize">
      <div class="v-center">
        <div class="container">
          <div class="title center">
            <h1 class="upper"><?php wp_title($title); ?><span class="red-dot"></span></h1>
            <h4>We have a few tips for you.</h4>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
    <?php woocommerce_content(); ?>
</div>

<?php  get_footer();?>
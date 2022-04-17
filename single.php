<?php get_header(); ?>

<section class="page-title parallax">
  <div data-parallax="scroll" data-image-src="images/bg/15.jpg" class="parallax-bg"></div>
  <div class="parallax-overlay">
    <div class="centrize">
      <div class="v-center">
        <div class="container">
          <div class="title center">
            <h1 class="upper">This is our blog<span class="red-dot"></span></h1>
            <h4>We have a few tips for you.</h4>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <section>
      <div class="container">
        <div class="col-md-8">
          <?php while(have_posts()):the_post();?>
          <article class="post-single">
                <div class="post-info">
                <h2><a href="#"><?php the_title()?></a></h2>
                <h6 class="upper"><span>By</span><a href="<?php the_author()?>"> <?php the_author()?></a><span class="dot"></span><span><?php the_time( 'd F Y '); ?></span><span class="dot"></span><a href="#" class="post-tag"><?php the_category()?></a></h6>
                </div>
                <div class="post-media">
                    <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail()?>
                    </a>
                </div>
                <div class="post-body">
                <p><?php the_content(); ?></p>
                </div>
            </article>
          <?php endwhile;?>
          <?php comments_template();?>
          <div id="respond">
            <h5 class="upper">Leave a comment</h5>
            <div class="comment-respond">
              <form class="comment-form">
                <div class="form-double">
                  <div class="form-group">
                    <input name="author" type="text" placeholder="Name" class="form-control">
                  </div>
                  <div class="form-group last">
                    <input name="email" type="text" placeholder="Email" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <textarea placeholder="Comment" class="form-control"></textarea>
                </div>
                <div class="form-submit text-right">
                  <button type="button" class="btn btn-color-out">Post Comment</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </section>

<?php get_footer(); ?>
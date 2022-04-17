<article class="post-single">
    <div class="post-info">
    <h2><a href="#"><?php the_title()?></a></h2>
    <h6 class="upper"><span>By</span><a href="<?php the_author() ?>"> <?php the_author();?></a><span class="dot"></span><span><?php the_time( 'd F Y '); ?></span><span class="dot"></span><a href="#" class="post-tag"><?php the_category(); ?></a></h6>
    </div>
    <div class="post-body">
    <p><?php the_content()?></p>
    <p><a href="<?php the_permalink()?>" class="btn btn-color btn-sm">Read More</a></p>
    </div>
</article>
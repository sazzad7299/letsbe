<?php
add_shortcode('home-slider', 'comet_home_slider');
function comet_home_slider(){
    ob_start();?>
        <section id="home">
            <div id="home-slider" class="flexslider">
                <ul class="slides">
                <?php $slider = new WP_Query(array(
                    'post_type' =>'letsbe-sliders',
                    'post_per_page'=>3,
                ));
                 while($slider->have_posts()):$slider->the_post();?>
                 <li><?php echo the_post_thumbnail();?>
                    <div class="slide-wrap">
                    <div class="slide-content">
                        <div class="container">
                        <h1><?php echo the_title();?><span class="red-dot"></span></h1>
                        <h6><?php echo get_post_meta( get_the_id(), '_for-subtitle',true);?></h6>
                        <p><a href="<?php echo the_permalink()?>" class="btn btn-light-out">Read More</a><a href="#" class="btn btn-color btn-full">Services</a></p>
                        </div>
                    </div>
                    </div>
                </li>
                
               <?php endwhile; ?>

                


                </ul>
            </div>
        </section>
    <?php return ob_get_clean();
}

add_shortcode('about-section', 'comet_about_section');


function comet_about_section($attr, $content = null){

  $attributes = extract( shortcode_atts(array(
    'title' => '',
    'subtitle' => ''
  ), $attr) );


  ob_start(); ?>

  <section id="about">
      <div class="container">
        <div class="title center">
          <h4 class="upper"><?php echo $subtitle; ?></h4>
          <h2><?php echo $title; ?><span class="red-dot"></span></h2>
          <hr>
        </div>
        <div class="section-content">
          <div class="col-md-8 col-md-offset-2">
            <p class="lead-text serif text-center"><?php echo do_shortcode( $content ); ?></p>
          </div>
        </div>
      </div>
    </section>

  <?php return ob_get_clean();



}

add_shortcode('expertise-section', 'comet_expertise_section');


function comet_expertise_section($attr, $content = null){

  $attributes = extract( shortcode_atts(array(
    'title'             => 'Expertise',
    'subtitle'          => 'This is what we love to do.',
    'bgimage'           => '',
    'first_front_icon'  => 'focus',
    'first_title'       => 'Branding',
    'first_content'      => 'Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup.',
    'second_front_icon'  => 'focus',
    'second_title'       => 'Interactive',
    'second_content'      => 'Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup.',
    'third_front_icon'  => 'focus',
    'third_title'       => 'Production',
    'third_content'      => 'Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup.',
    'last_front_icon'  => 'focus',
    'last_title'       => 'Production',
    'last_content'      => 'Facilis doloribus illum quis, expedita mollitia voluptate non iure, perspiciatis repellat eveniet volup.'


  ), $attr) );


	ob_start(); ?>

	<section class="p-0 b-0">
      <div class="col-md-6 col-sm-4 img-side img-left mb-0">
        <div class="img-holder"><img src="<?php echo $bgimage; ?>" alt="" class="bg-img">
          <div class="centrize">
            <div class="v-center">
              <div class="title txt-xs-center">
                <h4 class="upper"><?php echo $subtitle; ?></h4>
                <h3><?php echo $title; ?><span class="red-dot"></span></h3>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-md-offset-6 col-sm-8 col-sm-offset-4">
        <div class="row">
          <div class="services">
            <div class="col-sm-6 border-bottom border-right">
              <div class="service"><i class="icon-<?php echo $first_front_icon; ?>"></i><span class="back-icon"><i class="icon-<?php echo $first_front_icon; ?>"></i></span>
                <h4><?php echo $first_title; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $first_content; ?></p>
              </div>
            </div>
            <div class="col-sm-6 border-bottom">
              <div class="service"><i class="icon-<?php echo $second_front_icon; ?>"></i><span class="back-icon"><i class="icon-<?php echo $second_front_icon; ?>"></i></span>
                <h4><?php echo $second_title; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $second_content; ?></p>
              </div>
            </div>
            <div class="col-sm-6 border-bottom">
              <div class="service"><i class="icon-<?php echo $third_front_icon; ?>"></i><span class="back-icon"><i class="icon-<?php echo $third_front_icon; ?>"></i></span>
                <h4><?php echo $third_title; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $third_content; ?></p>
              </div>
            </div>
            <div class="col-sm-6 border-bottom">
              <div class="service"><i class="icon-<?php echo $last_front_icon; ?>"></i><span class="back-icon"><i class="icon-<?php echo $last_front_icon; ?>"></i></span>
                <h4><?php echo $last_title; ?></h4>
                <hr>
                <p class="alt-paragraph"><?php echo $last_content; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<?php return ob_get_clean();
}



add_shortcode('filter-portfolio', 'comet_isotope_functionality');

function comet_isotope_functionality($jkonokisu, $contentsssss){


   extract( shortcode_atts(array(
    'title' => 'Selected Works'
  ), $jkonokisu) );

  ob_start(); ?>

  <section id="portfolio" class="pb-0">
    <div class="container">
      <div class="col-md-6">
        <div class="title m-0 txt-xs-center txt-sm-center">
            <h2 class="upper"><?php echo $title; ?><span class="red-dot"></span></h2>
            <hr>
        </div>
      </div>
      <div class="col-md-6">
        <ul id="filters" class="no-fix mt-25">
          <li data-filter="*" class="active">All</li>
            <?php 

              $terms = get_terms( array(
                'taxonomy' => 'letsbe-portfolio-tax',
                'hide_empty' => true,
              ) );

              foreach($terms as $term) : 

            ?>
          <li data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>

            <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="section-content pb-0">     
      <div id="works" class="four-col wide mt-50">
        <?php 

        $portfolio = new WP_Query(array(
          'post_type' => 'letsbe-portfolio'
        ));

        while($portfolio->have_posts()) : $portfolio->the_post();?>

        <div class="work-item <?php $terms = get_the_terms( (int) get_the_id(), 'letsbe-portfolio-tax' );if ( !empty( $terms ) ) { foreach($terms as $term){ echo $term->slug.' ';}}?>">
          <div class="work-detail">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>
              <div class="work-info">
                <div class="centrize">
                  <div class="v-center">
                    <h3><?php the_title(); ?></h3>
                    <p>                      
                      <?php $terms = get_the_terms( (int) get_the_id(), 'letsbe-portfolio-tax' );if ( !empty( $terms ) ) { foreach($terms as $term){ echo $term->name;}}?>
                    </p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

      <?php endwhile; ?>

      </div>
    </div>
  </section>

  <?php return ob_get_clean();



}

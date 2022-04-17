<?php
function hstngr_register_widget() {
    register_widget( 'hstngr_widget' );
}
add_action( 'widgets_init', 'hstngr_register_widget' );

class hstngr_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
        // widget ID
        'hstngr_widget',
        // widget name
        __('Hostinger Sample Widget', ' hstngr_widget_domain'),
        // widget description
        array( 'description' => __( 'Hostinger Widget Tutorial', 'hstngr_widget_domain' ), )
        );
    }
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        //if title is present
        if ( ! empty( $title ) )
        echo $args['before_title'] . $title . $args['after_title'];
        //output
        echo __( 'Greetings from Hostinger.com!', 'hstngr_widget_domain' );
        echo $args['after_widget'];
    }
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
        $title = $instance[ 'title' ];
        else
        $title = __( 'Latest Posts', 'hstngr_widget_domain' );
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

class comet_latest_post extends WP_Widget {


	public function __construct(){

		parent::__construct('comet-latest-post', 'Comet Latest Posts', array(
			'description' => 'Custom Latest Post Widget by Comet Theme'
		));

	}


	public function widget($jkono, $hello){ ?>

		<?php echo $jkono['before_widget']; ?>
            <h6 class="upper"><?php echo $hello['title'] ?></h6>
		     <?php 
		     	$posts = new WP_Query(array(
		     		'post_type' => 'post',
		     		'posts_per_page' => $hello['kotogula']
		     	));
		     ?>
		      <ul class="nav">

				<?php while($posts->have_posts()): $posts->the_post(); ?>
		        	<li>
		        		<a href="<?php the_permalink(); ?>"><?php the_title(); ?><i class="ti-arrow-right"></i>
							<?php if( $hello['date'] == 'show' ) : ?>
		        				<span><?php the_time('d M, Y'); ?></span>
							<?php endif; ?>
		        		</a>
		        	</li>
		        <?php endwhile; ?>

		      </ul>
			
		      
		    
		    
		<?php echo $jkono['after_widget']; ?>

	<?php }


	public function form($showkorao){ ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title: </label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" class="widefat" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $showkorao['title']; ?>">
		</p>

		<p><label for="<?php echo $this->get_field_id('kotogula'); ?>">Number of posts to show:</label>
		<input class="tiny-text" id="<?php echo $this->get_field_id('kotogula'); ?>" name="<?php echo $this->get_field_name('kotogula'); ?>" step="1" min="1" value="<?php echo $showkorao['kotogula']; ?>" type="number"></p>

		<?php 

			if($showkorao['date'] == 'show'){
				$show = "checked='checked'";
			}else {
				$hide = "checked='checked'";
			}

		?>
		<p>
			<input type="radio" value="show" id="<?php echo $this->get_field_id('dateshow'); ?>" name="<?php echo $this->get_field_name('date'); ?>" 


				<?php if(isset($show)){echo $show;} ?>

				>
			<label for="<?php echo $this->get_field_id('dateshow'); ?>">Show Date</label>
		</p>
		<p>
			<input type="radio" value="hide" id="<?php echo $this->get_field_id('datehide'); ?>" name="<?php echo $this->get_field_name('date'); ?>" <?php if(isset($hide)){echo $hide;} ?>>
			<label for="<?php echo $this->get_field_id('datehide'); ?>">Hide Date</label>
		</p>



	<?php }



}


add_action('widgets_init', 'latest_post_widget');


function latest_post_widget(){
	register_widget('comet_latest_post');
}
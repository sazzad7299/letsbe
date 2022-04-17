<?php


add_action('after_setup_theme','letsbe_setup');

function letsbe_setup(){
    //add textdomain
    load_theme_textdomain( 'letsbe', get_template_directory().'/lang');

    //Theme Supporst
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');

    add_theme_support('title-tag');
    add_theme_support('post-formats',array(
        'video',
        'quote',
        'gallery',
        'audio',
    ));
   register_post_type( 'letsbe-portfolio', array(
    'labels'=>array(
        'name' =>__('Portfolio', 'letsbe'),
        'singular_name'=>__('Portfolio', 'letsbe'),
        'add_new_item'=>__('Add New', 'letsbe'),
    ),
    'public'=>true,
    'menu_position'=>45,
    'menu_icon'   => 'dashicons-groups',
    'supports'     => array('title','editor','thumbnail'),
   ));
   register_taxonomy('letsbe-portfolio-tax','letsbe-portfolio',array(
    'labels'=>array(
        'name'          =>__('Categories', 'letsbe'),
        'singular_name' =>__('Category', 'letsbe'),
        'add_new_item'  =>__('Add New', 'letsbe'),
    ),
    'public'        =>true,
    'hierarchical'  =>true,
   ));
   register_post_type( 'letsbe-sliders', array(
    'labels'=>array(
        'name' =>__('Sliders', 'letsbe'),
        'singular_name'=>__('Slider', 'letsbe'),
        'add_new_item'=>__('Add New', 'letsbe'),
    ),
    'public'=>true,
    
    'menu_position'=>75,
    'menu_icon'   => 'dashicons-slides',
    'supports'     =>array('title', 'thumbnail')
   ));
   register_nav_menu('main-menu',__('Header Menu', 'letsbe'));


}

add_action('widgets_init','sidebar_areas');

function sidebar_areas(){
    register_sidebar( 
        array(
        'name'           => __('Right Sidebar','letsbe'),
        'description'    => __('Widgers Are showing on Right Sidebar','letsbe'),
        'id'             =>'right-sidebar',
        'before_widget' =>'<div class="widget">',
        'after_widget'  =>'</div>',
        'before_title'   =>'<h6 class="upper">',
        'after_title'    => '</h6>'
    ));
    register_sidebar( 
        array(
        'name'           => __('Footer left Sidebar','letsbe'),
        'description'    => __('Widgers Are showing on footer Sidebar','letsbe'),
        'id'             =>'footer-left-sidebar',
        'before_widget' =>'<div class="col-sm-4"><div class="widget">',
        'after_widget'  =>'</div></div>',
        'before_title'   =>'<h6 class="upper">',
        'after_title'    => '</h6>'
    ));
    register_sidebar( 
        array(
        'name'           => __('Footer Right Sidebar','letsbe'),
        'description'    => __('Widgers Are showing on footer Sidebar','letsbe'),
        'id'             =>'footer-right-sidebar',
        'before_widget' =>'<div class="widget">',
        'after_widget'  =>'</div>',
        'before_title'   =>'<h6 class="upper">',
        'after_title'    => '</h6>'
    ));
}
//including styling files
add_action('wp_enqueue_scripts','letsbe_styles');

// import theme fonts 

function get_letsbe_fonts(){
   
    $fonts =array();
    $fonts[] ='Montserrat:400,700';
    $fonts[]= 'Raleway:300,400,500';
    $fonts[]= 'Halant:300,400';

    

    return(add_query_arg(array('family' => urlencode(implode('|',$fonts))),'https://fonts.googleapis.com/css'));
}
function letsbe_styles(){
    wp_enqueue_style('bundle',get_template_directory_uri().'/css/bundle.css');
    wp_enqueue_style('style',get_template_directory_uri().'/css/style.css');
    wp_enqueue_style('custom-style',get_template_directory_uri().'/style.css');
    wp_enqueue_style( 'fonts', get_letsbe_fonts());
    wp_enqueue_style('comment-reply');
}

//add conditional scripts
add_action('wp_enqueue_scripts','conditional_scripts');
function conditional_scripts(){
    wp_enqueue_script('html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js',array(),'', false);
    wp_script_add_data('html5shim', 'conditional', 'lt IE 9' );
    wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js',array(),'', false);
    wp_script_add_data('respond', 'conditional', 'lt IE 9' );
    
}

// add main scripts

add_action('wp_enqueue_scripts','letsbe_scripts');

function letsbe_scripts(){
    wp_enqueue_script('jq',get_template_directory_uri().'/js/jquery.js','','',true);
    wp_enqueue_script('bundle',get_template_directory_uri().'/js/bundle.js',array('jq'),'',true);
    wp_enqueue_script('map','https://maps.googleapis.com/maps/api/js?v=3.exp', array('jq'),'' ,true);
    wp_enqueue_script('main',get_template_directory_uri().'/js/main.js',array('jq','bundle'),'',true);
    wp_enqueue_script('comment-reply');

}


//blog gellary custom desing

if(file_exists(dirname(__FILE__).'/gallery.php')){
    require_once(dirname(__FILE__).'/gallery.php');
}
if(file_exists(dirname(__FILE__).'/custom_nav_walker.php')){
    require_once(dirname(__FILE__).'/custom_nav_walker.php');
}
if(file_exists(dirname(__FILE__).'/custom-widgets/latest-post.php')){
    require_once(dirname(__FILE__).'/custom-widgets/latest-post.php');
}
if(file_exists(dirname(__FILE__).'/inc/redux-core/framework.php')){
    require_once(dirname(__FILE__).'/inc/redux-core/framework.php');
}
if(file_exists(dirname(__FILE__).'/inc/sample/config.php')){
    require_once(dirname(__FILE__).'/inc/sample/config.php');
}
if(file_exists(dirname(__FILE__).'/inc/metabox/init.php')){
    require_once(dirname(__FILE__).'/inc/metabox/init.php');
}
if(file_exists(dirname(__FILE__).'/inc/metabox/config.php')){
    require_once(dirname(__FILE__).'/inc/metabox/config.php');
}
if(file_exists(dirname(__FILE__).'/shortcodes/shortcode.php')){
    require_once(dirname(__FILE__).'/shortcodes/shortcode.php');
}
if(file_exists(dirname(__FILE__).'/plugins/required.php')){
    require_once(dirname(__FILE__).'/plugins/required.php');
}
register_activation_hook(__FILE__,'flush_rewrite_start');
function flush_rewrite_start(){
    flush_rewrite_rules();
}



//Custom Visual Composer
vc_map(array(
    'name'=>'Letsbe Slider',
    'base'=>'home-slider',
    'show_settings_on_create'=>false,
));
vc_map(array(
    'name'=>'About Section',
    'base'=>'about-section',
   'params'=> array(
       array(
           'heading'=>'Title',
           'param_name'=>'title',
           'type'=>'textfield',
           'value'=>'Who We Are',
       ),
       array(
        'heading'=>'Subtitle',
        'param_name'=>'subtitle',
        'type'=>'textfield',
        'value'=>'We are driven by creative.',
       ),
        array(
            'heading'=>'Content',
            'param_name'=>'content',
            'type'=>'textarea',
            'value'=>'We are driven by creative.',
        )
   )
));

//woocommerce correction and customijation

add_filter('woocommerce_show_page_title',function(){
    return;
});

//selected page jQuery

add_action('admin_print_scripts','add_jquery_post_formate',1000);


function add_jquery_post_formate()
{
    if(get_post_type() == 'post'):?>
    <script>
        jQuery(document).ready(function(){
            var id = jQuery('input[name="post_format"]:checked').attr('id');
            
            if(id == 'post-format-video'){
                jQuery('.cmb2-id--for-audio').hide();
                jQuery('.cmb2-id--for-gallery').hide();
                jQuery('.cmb2-id--for-video').show();
            }
            if(id== 'post-format-audio'){
                jQuery('.cmb2-id--for-gallery').hide();
                jQuery('.cmb2-id--for-video').hide();
                jQuery('.cmb2-id--for-audio').show();
            }
            if(id== 'post-format-gallery'){
                jQuery('.cmb2-id--for-audio').hide();
                jQuery('.cmb2-id--for-video').hide();
                jQuery('.cmb2-id--for-gallery').show();
                
            }
            jQuery('input[name="post_format"]').change(function(){
                jQuery('.cmb2-id--for-audio').hide();
                jQuery('.cmb2-id--for-video').hide();
                jQuery('.cmb2-id--for-gallery').hide();

                var id = jQuery('input[name="post_format"]:checked').attr('id');
                
                if(id == 'post-format-video'){
                    jQuery('.cmb2-id--for-audio').hide();
                    jQuery('.cmb2-id--for-gallery').hide();
                    jQuery('.cmb2-id--for-video').show();
                }
                if(id== 'post-format-audio'){
                    jQuery('.cmb2-id--for-gallery').hide();
                    jQuery('.cmb2-id--for-video').hide();
                    jQuery('.cmb2-id--for-audio').show();
                }
                if(id== 'post-format-gallery'){
                    jQuery('.cmb2-id--for-audio').hide();
                    jQuery('.cmb2-id--for-video').hide();
                    jQuery('.cmb2-id--for-gallery').show();
                    
                }
            });
        });
    </script>
    <?php endif;
}
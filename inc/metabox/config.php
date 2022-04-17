<?php

add_action('cmb2_admin_init','metabox_for_post');

function metabox_for_post(){
     $box=new_cmb2_box(array(
        'id'         =>'aditional-box',
        'object_types'=>array('post'),
        'title'      =>__('Aditional Fields', 'letsbe'),
    ));

     $box->add_field(array(
        'id'        => '_for-video',
        'type'      =>'text',
        'name'      =>'Video Url',
        'default'  =>'https://youtube.com'
    ));
    $box->add_field(array(
        'id'        => '_for-audio',
        'type'      =>'text',
        'name'      =>'Audio Url',
        'default'  =>'https://youtube.com'
    ));
    $box->add_field( array(
        'name' => 'Gallery Images',
        'desc' => '',
        'id'   => '_for-gallery',
        'type' => 'file_list',
    ) );

    $sliders= new_cmb2_box(array(
        'id'         =>'sliders-box',
        'object_types'=>array('letsbe-sliders'),
        'title'      =>__('Aditional Fields', 'letsbe'),
    ));
    $sliders->add_field( array(
        'name' => 'Subtitle',
        'desc' => '',
        'id'   => '_for-subtitle',
        'type' => 'text',
    ));
}

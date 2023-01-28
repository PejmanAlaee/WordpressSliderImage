<?php

add_action('init', 'postTypeSlider');

function postTypeSlider() {

    $labels = array(
        'name' => _x('اسلایدر', 'post type general name'),
        'singular_name' => _x('اسلایدر', 'post type singular name'),
        'menu_name' => _x('اسلایدر', 'admin menu'),
        'name_admin_bar' => _x('اسلاید', 'add new on admin bar'),
        'add_new' => _x('اضافه کردن اسلایدر', 'slider'),
        'add_new_item' => __('اضافه کردن اسلایدر جدید'),
        'new_item' => __('اسلایدر جدید'),
        'edit_item' => __('ویرایش اسلایدر'),
        'view_item' => __('View Slider'),
        'all_items' => __('همه اسلایدر ها'),
        'search_items' => __('جست و جو همه اسلایدر ها'),
        'not_found' => __('هیچ اسلایدری یافت نشد'),
        'not_found_in_trash' => __('هیچ اسلایدری در سطل زباله یافت نشد !')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.'),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => false,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title'),
        'register_meta_box_cb' => 'slider_metabox'
    );

    register_post_type('image-slider', $args);


}
function slider_metabox(){
    wp_register_script('lightboxme',  WF_slider_URL . 'assets/js/lib/jquery.lightbox_me.js');
    wp_register_script('lightboxme',  WF_slider_URL . 'assets/js/lib/js1.js');
    wp_register_script('lightboxme',  WF_slider_URL . 'assets/js/lib/js2.js');
    wp_enqueue_script('lightboxme');



    wp_register_script('sortable',  WF_slider_URL . 'assets/js/lib/jquery.sortable.js');
    wp_enqueue_script('sortable');

    wp_register_script('metabox-script',WF_slider_URL . 'assets/js/sliderMetaboxSlider.js?v=version234.2',['jquery'],['lightboxme'],['media-upload'],['thickbox'],['sortable']);
    wp_localize_script('metabox-script', 'data', array(
        'default_image_url' => NO_ICON_URL,
        'edit'              => __('ویرایش', 'image-slider'),
    ));
    wp_enqueue_script('metabox-script');

    wp_enqueue_style('metabox-style', WF_slider_URL . 'assets/css/metaboxStyle.css?v=version76.8', array('thickbox'));



    add_meta_box('metaboxSlider', 'sliderShow', function ($post) {
        include WF_slider_INC . 'sliderMetabox.php';
    });
    add_meta_box('shortCodeShow', 'shortCode', function ($post) {
        include WF_slider_INC . 'showShortCode.php';
    });

}
add_action('save_post', 'save_slides');
add_action('edit_post', 'save_slides');

function save_slides( $post_id ){

    if( !isset($_POST['slide_images']) )
        return;


    $slides = array();

    for($i = 0; $i < count( $_POST['slide_images'] ); $i++){
        $slides[$i]['image'] = esc_url_raw($_POST['slide_images'][$i]);
    }
    print_r($slides);
    update_post_meta($post_id, 'post_slides', $slides);

}
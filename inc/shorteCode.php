<?php

add_action('wp_enqueue_scripts', function(){

    wp_register_script('swipe', WF_slider_URL . 'assets/js/lib/jquery.event.swipe.js', array('jquery'));
    wp_register_script('billboard', WF_slider_URL . 'assets/js/lib/jquery.billboard.js', array('jquery', 'swipe'));
    wp_register_script('easing', WF_slider_URL . 'assets/js/lib/jquery.easing.js', array('jquery'));

    wp_register_style('billboard', WF_slider_URL . 'assets/css/lib/jquery.billboard.css');
    wp_enqueue_style('billboard');

});


add_action('init', 'slideSh');

function frontShow($sliderId , $uid){
    include WF_slider_tpl . 'sliderShow.php';
}

function slideSh(){
    add_shortcode('myslideshow', 'sliderCallback');

}
function sliderCallback($atts, $content = null){

    extract(shortcode_atts(array(
        'id' => 0,
    ), $atts));

        $uid = 'shortcode-' . uniqid();


    $suffix = build_query(array(
        'uid' =>    $uid,
    ));

    wp_enqueue_script('sliderimage-script-' . $uid, WF_slider_URL . 'assets/js/imageSc.php?' . $suffix, array('jquery', 'billboard', 'swipe', 'easing'));
   // wp_enqueue_script('sliderimage-script' , WF_slider_URL . 'assets/js/sliderScript.js?v=version38.8' , array('jquery', 'billboard', 'swipe', 'easing'));
   // wp_register_script('sliderimage-script',WF_slider_URL . 'assets/js/sliderScript.js?v=version122.2',['jquery'],['billboard'],['swipe'],['easing']);


    ob_start();
    frontShow($id , $uid);
    return ob_get_clean();

}






<?php

/*
Plugin Name: slider
Plugin URI: www.pejmanalaee.it
Description: .
Author: pejman
Author URI: /
Text Domain: wordpress-auth
Domain Path: /languages/
Version: 5.6.1
*/

define('WF_slider_DIR', plugin_dir_path(__FILE__));
define('WF_slider_URL', plugin_dir_url(__FILE__));
define('WF_slider_INC', WF_slider_DIR . '/inc/');
define('WF_slider_tpl', WF_slider_DIR . '/tpl/');
define('WF_slider_assets', WF_slider_DIR . 'assets/');
define('WF_slider_image', WF_slider_DIR . 'image/');
define('NO_ICON_URL', plugin_dir_url(__FILE__) . 'assets/image/no-icon.png');
define('imageAddImage', plugin_dir_url(__FILE__) . 'assets/image/newSlidePicture.png');

defined('ABSPATH') || exit;

include(WF_slider_INC . 'postTypeSlider.php');

include(WF_slider_INC . 'shorteCode.php');

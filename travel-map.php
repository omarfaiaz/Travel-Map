<?php

/**
 * Travel Map
 * Plugin Name:       Travel Map
 * Plugin URI:        https://www.advancedcustomfields.com
 * Description:       Customize WordPress with powerful, professional and intuitive fields.
 * Version:           1.0.0
 * Author:            Omar Faiaz
 * Author URI:        https://github.com/omarfaiaz
 * Text Domain:       travel-map

 */


defined('ABSPATH') || die;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('TM_PLUGIN_URL', plugin_dir_url(plugin_basename(__FILE__)));
define('TM_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));


use Inc\Base\Activate;
use Inc\Base\Deactivate;
use Inc\Base\Enqueue;
use Inc\Shortcode\Map;

final class Travel_Map
{
    function __construct()
    {
        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);

        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_shortcode('map_sidebar', [$this, 'map_sidebar']);
    }


    function activate()
    {
        Activate::activate();
    }

    function deactivate()
    {
        Deactivate::deactivate();
    }

    function enqueue_scripts()
    {
        Enqueue::tm_enqueue();
    }

    function map_sidebar()
    {
        Map::tm_map_sidebar();
    }
}

new Travel_Map();

<?php

/**
 * Enqueue
 */

namespace Inc\Base;

class Enqueue
{
    public static function tm_enqueue()
    {
        wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.css');
        wp_enqueue_style('style', TM_PLUGIN_URL . 'assets/css/style.css', [], time());


        wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.8.0/dist/leaflet.js', [], false, true);
        wp_enqueue_script('main', TM_PLUGIN_URL . 'assets/js/main.js', ['leaflet-js'], time(), true);
        wp_enqueue_script('map-search', TM_PLUGIN_URL . 'assets/js/map-search.js', ['leaflet-js', 'main'], time(), true);

        wp_localize_script('main', 'assets', [
            'url' => TM_PLUGIN_URL . 'assets'
        ]);
    }
}

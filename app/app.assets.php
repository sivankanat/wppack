<?php

/**
 * WPPack App Assets
 *
 * @package wppack
 * @author <sivankanat@gmail.com>
 * @since 1.0.0
 *
 */

class AppAssets extends App
{

    public function __construct()
    {
        // add_action('wp_enqueue_scripts', array($this, 'assets_css'));
        // add_action('wp_enqueue_scripts', array($this, 'assets_js'));
    }

    public function assets_css()
    {
        wp_enqueue_style('app-css', self::uri('assets/dist/css/app.css'), array(), $this->version, 'all');
    }

    public function assets_js()
    {
        wp_enqueue_script('app-js', self::uri('assets/dist/js/app.js'), array(), $this->version, true);
    }

    public function add_footer()
    {
        # code ..

    }
}

<?php

/**
 * WPPack App Panel
 *
 * @package wppack
 * @author <sivankanat@gmail.com>
 * @since 1.0.0
 *
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

// Start Class
if (!class_exists('AppPanel')) {

  class AppPanel
  {

    public $textdomain = "zirvechat";

    public function __construct()
    {
      if (is_admin()) :
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));
      endif;
    }

    /**
     * Add sub menu page
     * 
     */
    public function add_admin_menu()
    {
      add_menu_page(
        esc_html__('App Panel', $this->textdomain),
        esc_html__('App Panel', $this->textdomain),
        'manage_options',
        'app_settings',
        array($this, 'create_home')
      );
    }


    /**
     * Register a setting and its sanitization callback.
     *
     */
    public function register_settings()
    {
      register_setting('app_options', 'app_options', array($this, 'sanitize'));
    }

    /**
     * Sanitize callback
     * 
     */
    public function sanitize($options)
    {

      return $options;

      //print_r($options);
      //wp_die();
    }

    /**
     * Settings page output
     *
     * @since 1.0.0
     */
    public function create_home()
    {
      include __DIR__ . "/panel/render/home.php";
    }

    /**
     *
     * @uses AppPanel::get_options()
     *  
     */
    public static function get_options()
    {
      return get_option('app_options');
    }

    /**
     * Get Option
     * @uses AppPanle::get_option('id')
     *
     */
    public static function get_option($id = "")
    {
      $options = self::get_options();
      if (isset($options[$id])) {
        return $options[$id];
      }
    }

    /**
     * Admin Assets
     * 
     */
    public function admin_enqueue()
    {
      wp_enqueue_style('app_panel_style', get_template_directory_uri() . '/app/panel/assets/dist/css/app.panel.css');
      wp_enqueue_script('app_panel_script', get_template_directory_uri() . '/app/panel/assets/dist/js/app.panel.js', array(), null, true);
    }
  }
}

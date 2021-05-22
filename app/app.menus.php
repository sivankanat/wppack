<?php

/**
 * WPPack App Menus
 *
 * @package wppack
 * @author <sivankanat@gmail.com>
 * @since 1.0.0
 *
 */

class AppMenus
{

    public static function check_menu($menu = "")
    {
        if (($locations = get_nav_menu_locations()) && isset($locations[$menu])) {
            $menu  = wp_get_nav_menu_object($locations[$menu]);
            $items = wp_get_nav_menu_items($menu->term_id);
            return $items;
        }
    }

    public static function navbar($menu_id = "")
    {
        $menu  = "";
        $items = self::check_menu($menu_id);
        if ($items) :
            foreach ((array) $items as $item) :
            # $item->url
            # $item->title
            # $item->ID;
            # code ..
            endforeach;
        endif;
        return $menu;
    }

    /* menu title */
    public static function get_menu_title($name = "")
    {
        $locations = get_nav_menu_locations();
        $menu_id   = $locations[$name];
        $title     = wp_get_nav_menu_object($menu_id)->name;
        return htmlspecialchars_decode($title);
    }
    public static function display_menu_title($name = "")
    {
        if (!empty(self::get_menu_title($name))) :
            echo self::get_menu_title($name);
        else :
            echo '<i class="fas fa-bars"></i><span>Menu</span>';
        endif;
    }
}

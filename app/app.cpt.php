<?php

/**
 * WPPack App Custm Post types
 *
 * @package wppack
 * @author <sivankanat@gmail.com>
 * @since 1.0.0
 *
 */

class AppCPT extends App
{
    public function __construct()
    {
        // add_action('init', array($this, 'cpt_register'));

        // add_action('add_meta_boxes', array($this, 'create_meta_box'));
        // add_action('save_post', array($this, 'save_custom_fields'));
    }

    public function cpt_register()
    {
        /* post type */
        $post_type = array(
            "single"   => "Name",
            "slug"     => "name",
            "restbase" => "names",
            "plural"   => "Names",
            "position" => 4,
            "publicly" => true,
            "archive"  => true,
            "supports" => ["title", "editor", "thumbnail", "custom-fields", "page-attributes", "excerpt", "post-formats"],
            "icon"     => "dashicons-heart",
        );
        register_post_type("Name", $this->cpt_args($post_type));

        /* tax */
        $taxonomy = array("plural" => "Tests", "single" => "Test", "slug" => "test", "hierarchical" => true);
        register_taxonomy("test", array("name"), $this->tax_args($taxonomy));
    }
    public function cpt_args($req)
    {
        $args = [
            "label"                 => __($req['plural'], "textdomain"),
            "labels"                => [
                "name"                     => __($req['plural'], "textdomain"),
                "singular_name"            => __("{$req['single']}", "textdomain"),
                "menu_name"                => __("{$req['plural']}", "textdomain"),
                "all_items"                => __("All {$req['plural']}", "textdomain"),
                "add_new"                  => __("Add new", "textdomain"),
                "add_new_item"             => __("Add new {$req['single']}", "textdomain"),
                "edit_item"                => __("Edit {$req['single']}", "textdomain"),
                "new_item"                 => __("New {$req['single']}", "textdomain"),
                "view_item"                => __("View {$req['single']}", "textdomain"),
                "view_items"               => __("View {$req['plural']}", "textdomain"),
                "search_items"             => __("Search {$req['plural']}", "textdomain"),
                "not_found"                => __("No {$req['plural']} found", "textdomain"),
                "not_found_in_trash"       => __("No {$req['plural']} found in trash", "textdomain"),
                "parent"                   => __("Parent {$req['single']}:", "textdomain"),
                "featured_image"           => __("Featured image for this {$req['single']}", "textdomain"),
                "set_featured_image"       => __("Set featured image for this {$req['single']}", "textdomain"),
                "remove_featured_image"    => __("Remove featured image for this {$req['single']}", "textdomain"),
                "use_featured_image"       => __("Use as featured image for this {$req['single']}", "textdomain"),
                "archives"                 => __("{$req['single']} archives", "textdomain"),
                "insert_into_item"         => __("Insert into {$req['single']}", "textdomain"),
                "uploaded_to_this_item"    => __("Upload to this {$req['single']}", "textdomain"),
                "filter_items_list"        => __("Filter {$req['plural']} list", "textdomain"),
                "items_list_navigation"    => __("{$req['plural']} list navigation", "textdomain"),
                "items_list"               => __("{$req['plural']} list", "textdomain"),
                "attributes"               => __("{$req['plural']} attributes", "textdomain"),
                "name_admin_bar"           => __("{$req['single']}", "textdomain"),
                "item_published"           => __("{$req['single']} published", "textdomain"),
                "item_published_privately" => __("{$req['single']} published privately.", "textdomain"),
                "item_reverted_to_draft"   => __("{$req['single']} reverted to draft.", "textdomain"),
                "item_scheduled"           => __("{$req['single']} scheduled", "textdomain"),
                "item_updated"             => __("{$req['single']} updated.", "textdomain"),
                "pacustom_item_colon"      => __("Parent {$req['single']}:", "textdomain"),
            ],
            "description"           => "",
            "public"                => true,
            "publicly_queryable"    => $req['publicly'],
            "show_ui"               => true,
            "show_in_rest"          => true,
            "rest_base"             => $req['restbase'],
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive"           => $req['archive'],
            "show_in_menu"          => true,
            "show_in_nav_menus"     => true,
            "delete_with_user"      => false,
            "exclude_from_search"   => false,
            "capability_type"       => "post",
            "map_meta_cap"          => true,
            "hierarchical"          => false,
            "rewrite"               => ["slug" => $req['slug'], "with_front" => true],
            "query_var"             => true,
            "menu_position"         => $req['position'],
            "menu_icon"             => $req['icon'],
            "supports"              => $req['supports'],
        ];
        return $args;
    }

    /**
     * 
     * Taxonomy args
     * 
     */
    public function tax_args($tax)
    {
        $args = [
            "label"                 => __("{$tax['plural']}", "textdomain"),
            "labels"                => [
                "name"                       => __("{$tax['plural']}", "textdomain"),
                "singular_name"              => __("{$tax['single']}", "textdomain"),
                "menu_name"                  => __("{$tax['plural']}", "textdomain"),
                "all_items"                  => __("All {$tax['plural']}", "textdomain"),
                "edit_item"                  => __("Edit {$tax['single']}", "textdomain"),
                "view_item"                  => __("View {$tax['single']}", "textdomain"),
                "update_item"                => __("Update {$tax['single']} name", "textdomain"),
                "add_new_item"               => __("Add new {$tax['single']}", "textdomain"),
                "new_item_name"              => __("New {$tax['single']} name", "textdomain"),
                "pacustom_item"              => __("Parent {$tax['single']}", "textdomain"),
                "pacustom_item_colon"        => __("Parent {$tax['single']}:", "textdomain"),
                "search_items"               => __("Search {$tax['plural']}", "textdomain"),
                "popular_items"              => __("Popular {$tax['plural']}", "textdomain"),
                "separate_items_with_commas" => __("Separate {$tax['plural']} with commas", "textdomain"),
                "add_or_remove_items"        => __("Add or remove {$tax['plural']}", "textdomain"),
                "choose_from_most_used"      => __("Choose from the most used {$tax['plural']}", "textdomain"),
                "not_found"                  => __("No {$tax['plural']} found", "textdomain"),
                "no_terms"                   => __("No {$tax['plural']}", "textdomain"),
                "items_list_navigation"      => __("{$tax['plural']} list navigation", "textdomain"),
                "items_list"                 => __("{$tax['plural']} list", "textdomain"),
                "back_to_items"              => __("Back to {$tax['plural']}", "textdomain"),
            ],
            "public"                => true,
            "publicly_queryable"    => true,
            "hierarchical"          => $tax['hierarchical'],
            "show_ui"               => true,
            "show_in_menu"          => true,
            "show_in_nav_menus"     => true,
            "query_var"             => true,
            "rewrite"               => ['slug' => "{$tax['slug']}", "with_front" => true],
            "show_admin_column"     => false,
            "show_in_rest"          => true,
            "rest_base"             => "{$tax['slug']}",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit"    => false,
        ];
        return $args;
    }

    /**
     * features
     * 
     */
    public function create_meta_box()
    {
        $post_types = array('post_type_slug1', 'post_type_slug2');
        return add_meta_box(
            'custom_fields_meta_box',
            'Custom Fields',
            array($this, 'render_meta_box'),
            $post_types,
            'advanced',
            'high'
        );
    }
    public function render_meta_box()
    {
        global $post;
        /* $meta  = ($x = get_post_meta($post->ID, 'custom_fields', true)) ? $x : []; */
        $nonce = wp_create_nonce(basename(__FILE__));
        echo '<input type="hidden" name="custom_fields_nonce" value="' . $nonce . '">';
        $the_post_type = $post->post_type; /* get the post type */

        /* create post type folder in the dir */
        include ADMINDIR . '/render//' . $the_post_type . '/table.php';
    }

    public function save_custom_fields($post_id)
    {
        if (isset($_POST['custom_fields'])) :

            if (!wp_verify_nonce($_POST['custom_fields_nonce'], basename(__FILE__))) :
                return $post_id;
            endif;

            if (!current_user_can('edit_post', $post_id)) :
                return $post_id;
            endif;

            foreach ($_POST['custom_fields'] as $key => $val) :
                update_post_meta($post_id, $key, $val);
            endforeach;

        endif;
    }
    public function getmeta($key)
    {
        global $post;
        $meta = get_post_meta($post->ID, $key, true);
        if ($meta) :
            return $meta;
        endif;
        return "";
    }
    public function get_all_meta()
    {
        global $post;
        $meta = get_post_meta($post->ID);
        return $meta;
    }
    public static function __editor($cont, $id, $args = [])
    {
        $set = ['editor_height' => 105, 'textarea_rows' => 50, "media_buttons" => false];
        return wp_editor($cont, $id, $set);
    }
}

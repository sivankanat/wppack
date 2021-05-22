<?php

/**
 * 
 * Samle Options
 * @since 1.0
 * 
 */
$panel_options = array(
  "default_tab_icon" => "dashicons-admin-tools",
);

$panel_options['tabs'] = array(
  array(
    "title" => "Welcome",
    "id" => 'welcome',
    "icon" => "dashicons-admin-home",

    'fields' => array(
      array(
        'title' => 'Input Title',
        'desc' => 'Input Desc',
        'id' => 'test_input',
        'type' => "text",
        'default_text' => "Welcome!"
      ),
      array(
        'title' => 'Textarea Title',
        'desc' => 'Textarea Desc',
        'id' => 'text_textarea',
        'type' => "textarea",
        'default_text' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium cupiditate odit quam vero nesciunt delectus voluptates.."
      ),
    ),
  ),
);

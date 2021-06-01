<?php

/**
 * WPPack Functions
 * 
 * @see https://github.com/sivankanat/wppack
 * @package wppack
 * @since 1.0.1
 *
 */

define('THEMEDIR', dirname(__FILE__));
define('ADMINDIR', dirname(__FILE__) . '/admin');
define('PARTDIR', dirname(__FILE__) . '/parts');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) :
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

new App;
new AppSetup;
new AppAssets;
new AppPanel;

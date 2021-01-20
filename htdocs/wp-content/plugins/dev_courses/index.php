<?php

/**
 *
 * Plugin Name: Cours de développement Web - Plugin WP 
 * Plugin URI: http://thomasflorentin.net/
 * Description: Plugin de support de cours en dév web.
 * Version: 1.0.0
 * Author: Thomas Florentin
 * Author URI: http://thomasflorentin.net
 * Text Domain: webdevcourses-plugin
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;


/**
 * DEFINE PATHS
 */
define('DEVPLUG_PATH', plugin_dir_path(__FILE__));
define('DEVPLUG_FUNC_PATH', DEVPLUG_PATH . 'functions/');
define('DEVPLUG_ACF_PATH', DEVPLUG_PATH . 'acf/');
define('DEVPLUG_UTILS_PATH', DEVPLUG_PATH . 'utils/');


/**
 * DEFINE SOCIAL ACCOMPTS
 */
define('FACEBOOK', '');


/**
 * Post Types & Taxonomies
 */
require_once(DEVPLUG_PATH . 'cpt.php');
require_once(DEVPLUG_PATH . 'taxonomies.php');


/**
 * Custom fields. Need ACF plugin.
 */
require_once(DEVPLUG_PATH . 'acf.php');






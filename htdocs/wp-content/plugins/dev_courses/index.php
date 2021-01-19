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
define('ODY_PATH', plugin_dir_path(__FILE__));
define('ODY_FUNC_PATH', ODY_PATH . 'functions/');
define('ODY_PT_PATH', ODY_PATH . 'post_types/');
define('ODY_TAXO_PATH', ODY_PATH . 'taxonomies/');
define('ODY_ACF_PATH', ODY_PATH . 'acf/');
define('ODY_UTILS_PATH', ODY_PATH . 'utils/');


/**
 * DEFINE SOCIAL ACCOMPTS
 */
define('FACEBOOK', '');



/**
 * Post Types & Taxonomies
 */
require_once(ODY_PATH . 'cpt.php');


/**
 * Custom fields. Need ACF plugin.
 */
require_once(ODY_PATH . 'acf.php');






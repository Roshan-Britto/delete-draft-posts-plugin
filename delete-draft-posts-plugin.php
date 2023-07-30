<?php

/*
 * Plugin Name:       Draft Posts Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle to delete the Draft posts with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Roshan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

use DDP\App\Route ;


 defined( 'ABSPATH' ) || exit ;
 defined( 'DDP_PLUGIN_FILE' ) || define( 'DDP_PLUGIN_FILE' , __FILE__ ) ;
 defined( 'DDP_PLUGIN_PATH' ) || define( 'DDP_PLUGIN_PATH' , plugin_dir_path( __FILE__ ) ) ;

 //autoloads
if( file_exists ( DDP_PLUGIN_PATH . '/vendor/autoload.php' ) ) 
{
    require DDP_PLUGIN_PATH . '/vendor/autoload.php';
}
else
{
    wp_die('Error During Autoload');
}


if( class_exists ( '\DDP\App\Route' ) ) 
{
    $route = new Route();
    $route->routeFunction();
}

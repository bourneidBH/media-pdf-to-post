<?php
/*
  Plugin Name: Media PDF to Post
  Plugin URI:  https://github.com/bourneidBH/media-pdf-to-post
  Description: A plugin to generate blog posts from PDFs in media library
  Version:     1.0
  Author:      BourneidBH
  Author URI:  https://github.com/bourneidBH/
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'MPP_PLUGIN_NAME', 'Media PDF to Post' );
define( 'MPP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

include 'inc/functions.php';
include 'inc/init.php';
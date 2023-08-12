<?php

function mpp_styles() {
  wp_enqueue_style('mpp-css', plugin_dir_url(__DIR__) . 'css/styles.css');
}
add_action('wp_enqueue_scripts', 'mpp_styles');
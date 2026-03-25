<?php
// On charge notre menu
function declarer_menu() {
  register_nav_menu('main-menu', 'Menu principal');
}
add_action('after_setup_theme', 'declarer_menu');

// Charger notre style.css
function theme_charger_style() {
  wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_charger_style');
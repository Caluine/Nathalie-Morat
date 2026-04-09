<?php
// On charge nos 2 menus
function declarer_menu() {
  register_nav_menu('main-menu', 'Menu principal');
  register_nav_menu('footer-menu', 'Menu footer');
}
add_action('after_setup_theme', 'declarer_menu');

// Charger notre style.css
function theme_charger_style() {
  wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_charger_style');

// Chargement du JS
function theme_charger_scripts() {
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'theme_charger_scripts');


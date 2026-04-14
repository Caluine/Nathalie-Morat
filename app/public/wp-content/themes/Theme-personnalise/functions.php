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


// Rajout du chemin du fichier AJAX
function ajouter_ajax_url() {
  wp_localize_script('main-script', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'ajouter_ajax_url');

// Pagination
function charger_plus() {

  $page = $_POST['page']; 

  $query = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 8,
    'paged' => $page
  ]);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>

      <a class="photo_accueil" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium'); ?>
      </a>

    <?php endwhile;
  endif;

  wp_die();
}

add_action('wp_ajax_charger_plus', 'charger_plus');
add_action('wp_ajax_nopriv_charger_plus', 'charger_plus');

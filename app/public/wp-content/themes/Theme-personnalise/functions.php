<?php
// On charge nos 2 menus
function declarer_menu()
{
  register_nav_menu('main-menu', 'Menu principal');
  register_nav_menu('footer-menu', 'Menu footer');
}
add_action('after_setup_theme', 'declarer_menu');

// Charger notre style.css
function theme_charger_style()
{
  wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_charger_style');

// Chargement du JS
function theme_charger_scripts()
{
  wp_enqueue_script('main-script', get_template_directory_uri() . '/js/script.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'theme_charger_scripts');



// Rajout du chemin du fichier AJAX
function ajouter_ajax_url()
{
  wp_localize_script('main-script', 'ajaxurl', admin_url('admin-ajax.php'));
  wp_localize_script('main-script', 'nonce', wp_create_nonce('mota-photo'));
}
add_action('wp_enqueue_scripts', 'ajouter_ajax_url');

// Pagination
function charger_plus()
{

  $page = $_POST['page'];
  $tri = isset($_POST['tri']) ? $_POST['tri'] : 'DESC';
  $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : '';
  $format = isset($_POST['format']) ? $_POST['format'] : '';
  // Controle sécurité jeton nonce
  $nonce = $_POST['nonce'];
  //  $nonce = 123;
  if (
    ! isset($nonce) or
    ! wp_verify_nonce($nonce, 'mota-photo')
  ) {
    wp_send_json_error("Vous n’avez pas l’autorisation d’effectuer cette action.", 403);
  }


  $query = new WP_Query([
    'post_type' => 'photo',
    'posts_per_page' => 8,
    'paged' => $page,
    'orderby' => 'date',
    'order' => $tri,

    'tax_query' => [
      'relation' => 'AND',

      [
        'taxonomy' => 'categorie_photo',
        'field' => 'slug',
        'terms' => $categorie,
        'operator' => $categorie ? 'IN' : 'EXISTS'
      ],

      [
        'taxonomy' => 'format',
        'field' => 'slug',
        'terms' => $format,
        'operator' => $format ? 'IN' : 'EXISTS'
      ]

    ]
  ]);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();

      // On utilise le même template que front-page
      get_template_part('template_part/lightbox');

    endwhile;
  endif;
  wp_die();
}

add_action('wp_ajax_charger_plus', 'charger_plus');
add_action('wp_ajax_nopriv_charger_plus', 'charger_plus');



// Select2
function charger_select2() {
    // jQuery (WordPress en a déjà un)
    wp_enqueue_script('jquery');

    // CSS Select2
    wp_enqueue_style(
        'select2-css',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
    );

    // JS Select2
    wp_enqueue_script(
        'select2-js',
        'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
        array('jquery'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'charger_select2');
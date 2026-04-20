<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="menu-header">
    <!-- On affiche le logo -->
    <div class="logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo">
      </a>
    </div>
  <nav>
    <!-- On affiche notre menu "menu principal" -->
    <?php
      wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'container' => false,
        'menu_class' => 'main-menu'
      ));
    ?>
  </nav>
  <div class="burger">
  <span></span>
  <span></span>
  <span></span>
</div>
  </div>
</header>
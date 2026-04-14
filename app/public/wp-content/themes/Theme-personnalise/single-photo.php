
<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="conteneur-photo">

      <!-- Colonne gauche  -->
      <div class="infos-photo">

        <h1><?php the_title(); ?></h1>

        <p>Référence : <?php echo get_field('references'); ?></p>

        <p>Catégorie :
          <?php
          $categories = get_the_terms(get_the_ID(), 'categorie_photo');
          if ($categories && !is_wp_error($categories)) {
            echo $categories[0]->name;
          }
          ?>
        </p>

        <p>Format :
          <?php
          $formats = get_the_terms(get_the_ID(), 'format');
          if ($formats && !is_wp_error($formats)) {
            echo $formats[0]->name;
          }
          ?>
        </p>

        <p>Type : <?php echo get_field('type'); ?></p>

        <p>Année : <?php echo get_the_date('Y'); ?></p>

      </div>

      <!-- Colonne droite -->
      <div class="photographie">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large'); ?>
        <?php endif; ?>
      </div>

    </div>

  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>

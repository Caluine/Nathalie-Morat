
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
     <div class="contact-navigation">
      <div class="contact-flex">
        <p>Cette photo vous intéresse ?</p>
        <button class="contact-btn">Contact</button>
      </div>

      <div class="navigation-photo">
        <div class="nav-thumbnail">
            </div>
        <div class="nav-links">
          <?php 
            previous_post_link('%link', '←'); 
            next_post_link('%link', '→'); 
          ?>
        </div>
      </div>
    </div>

    <div class="suggestions-container">
      <h3>VOUS AIMEREZ AUSSI</h3>
      <div class="suggestions-photos">
        <?php
        // Logique de recommandation
        $category_slug = ($categories) ? $categories[0]->slug : '';
        $args = [
          'post_type' => 'photo',
          'posts_per_page' => 2,
          'post__not_in' => [get_the_ID()],
          'tax_query' => [
            [
              'taxonomy' => 'categorie_photo',
              'field' => 'slug',
              'terms' => $category_slug
            ]
          ]
        ];
        $query = new WP_Query($args);

        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post(); ?>
            <div class="suggestion-item">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium'); ?>
              </a>
            </div>
          <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>

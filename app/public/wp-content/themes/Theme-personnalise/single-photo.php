<?php get_header(); ?>

<main>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="conteneur-photo">

                <!-- Colonne gauche avec les descriptifs -->
                <div class="infos-photo">

                    <h2><?php the_title(); ?></h2>

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

                <!-- Colonne droite avec l'image-->
                <div class="photographie">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                </div>

            </div>

            <!-- Contact et navigation des photos-->
            <div class="contact-navigation">

                <!-- Partie gauche -->
                <div class="contact-alignement">
                    <p>Cette photo vous intéresse ?</p>
                    <button class="contact-btn" data-reference="<?php echo esc_attr(get_field('references')); ?>">Contact</button>
                </div>

                <!-- Partie droite -->
                <div class="navigation-visuelle">

                    <div class="navigation-miniature">
                        <?php
                        $prev = get_previous_post();
                        $next = get_next_post();

                        if ($prev) {
                            echo get_the_post_thumbnail($prev->ID, 'thumbnail', ['class' => 'img-prev']);
                        }

                        if ($next) {
                            echo get_the_post_thumbnail($next->ID, 'thumbnail', ['class' => 'img-next']);
                        }
                        ?>
                    </div>

                    <!-- FLECHES -->
                    <div class="navigation-liens">
                        <?php previous_post_link('%link', '←'); ?>
                        <?php next_post_link('%link', '→'); ?>
                    </div>

                </div>

            </div>

            <!--Suggestions-->
            <div class="bloc-suggestions">

                <h3>VOUS AIMEREZ AUSSI</h3>

                <div class="suggestions-galerie">

                    <?php
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
                            <div class="suggestion-carte">
                                <?php
                                // On appelle le même bloc photo que front-page
                                get_template_part('template_part/lightbox');
                                ?>
                            </div>

                    <?php endwhile;
                    endif;

                    wp_reset_postdata();
                    ?>

                </div>

            </div>

    <?php endwhile;
    endif; ?>

</main>

<?php get_footer(); ?>
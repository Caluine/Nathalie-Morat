<div class="photo_accueil">
    <a href="<?php the_permalink(); ?>" class="lien-photo">
        <?php the_post_thumbnail('medium', [
            'data-full' => wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]
        ]); ?>

        <div class="survol-photo">
            <span class="icone-oeil">
                <i class="fa-solid fa-eye"></i>
            </span>
            <div class="infos-bas">
                <span class="titre"><?php the_title(); ?></span>
                <span class="categorie">
                    <?php
                    $cats = get_the_terms(get_the_ID(), 'categorie_photo');
                    if ($cats && !is_wp_error($cats)) {
                        echo $cats[0]->name;
                    }
                    ?>
                </span>
            </div>
        </div>
    </a>

    <button class="bouton-plein-ecran" data-ref="<?php echo esc_attr(get_field('references')); ?>">
        <i class="fa-solid fa-expand"></i>
    </button>
</div>
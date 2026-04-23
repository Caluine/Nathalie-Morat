<?php get_header(); ?>

<div class="accueil">
    <img src="<?php echo get_template_directory_uri(); ?>/images/nathalie-11.jpeg" alt="Photo de la page d'accueil">
    <h1>Photographe event</h1>
</div>

<!-- Partie des filtres -->
<div class="filtres">

    <!-- Categorie -->
    <select id="filtre-categorie">
        <option value="">Catégories</option>
        <?php
        $categories = get_terms([   // permet de recuperer automatiquements les taxonomies
            'taxonomy' => 'categorie_photo',
            'hide_empty' => false // Affiche meme les categories vide
        ]);

        foreach ($categories as $cat) {
            echo '<option value="' . $cat->slug . '">' . $cat->name . '</option>'; //Boucle pour afficher toutes les categories
        }
        ?>
    </select>

    <!-- Formats (meme chose que categorie)-->
    <select id="filtre-format">
        <option value="">Formats</option>
        <?php
        $formats = get_terms([
            'taxonomy' => 'format',
            'hide_empty' => false
        ]);

        foreach ($formats as $format) {
            echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
        }
        ?>
    </select>

    <!-- Tri avec les valeurs descendant et ascendant-->
    <select id="filtre-tri">
        <option value="" disabled selected hidden>TRIER PAR</option>
        <option value="DESC">Plus récentes</option>
        <option value="ASC">Plus anciennes</option>
    </select>

</div>


<div class="galerie_accueil" id="gallery">
    <?php
    $query = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => 8 // On affiche que 8 photo
    ]);
    // On fait la boucle WP pour afficher toutes les photos 
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();

            // On appelle la lightbox

            get_template_part('template_part/lightbox');

        endwhile;
    endif;

    wp_reset_postdata();
    ?>
</div>

<!-- Bouton pour la pagination -->
<div class="bouton_pagination">
    <button type="button">Charger plus</button>
</div>


<?php get_footer(); ?>
<footer>
    <!-- On affiche notre menu "menu footer" -->
    <?php
    wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'container' => false,
        'menu_class' => 'footer-menu'
    ));
    ?>
</footer>
<?php get_template_part('template_part/modale-contact'); ?>
<?php wp_footer(); ?>

<!-- Lightbox -->

<div id="lightbox" class="lightbox">
    <span class="close-lightbox">×</span>

    <button class="nav precedent">← Précédente</button>

    <div class="lightbox-contenu">
        <img id="lightbox-img" src="" alt="">

        <div class="lightbox-infos">
            <span id="lb-ref" class="ref"></span>
            <span id="lb-cat" class="cat"></span>
        </div>
    </div>

    <button class="nav suivant">Suivante →</button>
</div>

</body>

</html>
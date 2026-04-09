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
</body>
</html>
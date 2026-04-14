
<div id="contactModal" class="modal">
    <div class="contenu-modal">
        <img src="<?php echo get_template_directory_uri(); ?>/images/contact.png" alt="Image de la modale de contact">
        <?php
        // Affiche le formulaire Contact Form 7
        if ( function_exists('wpcf7') ) {
            echo do_shortcode('[contact-form-7 id="e43af88" title="Contact"]');
        }
        ?>
    </div>
</div>
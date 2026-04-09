
<div id="contactModal" class="modal">
    <div class="contenu-modal">
        <!-- Remplacer h2 par l'image 'contactcontactcontact' -->
        <h2>Contact</h2>
        <?php
        // Affiche le formulaire Contact Form 7
        if ( function_exists('wpcf7') ) {
            echo do_shortcode('[contact-form-7 id="e43af88" title="Contact"]');
        }
        ?>
    </div>
</div>
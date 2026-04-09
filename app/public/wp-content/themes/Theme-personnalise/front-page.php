
<?php get_header(); ?>

<div class="accueil">
  <img src="<?php echo get_template_directory_uri(); ?>/images/accueil.png" alt="Photo de la page d'accueil">
</div>

<!-- Boucle WP pour afficher toutes les photos -->
<?php $query = new WP_Query([
  'post_type' => 'photo'
]);
while ( $query->have_posts() ) : $query->the_post();
    the_post_thumbnail(); // On affiche l'image
endwhile;  
?>

<!-- On récupère nos champs ACF pour les photos  -->
<?php echo get_field('type'); ?>
<?php echo get_field('references'); ?>

<?php get_footer(); ?>

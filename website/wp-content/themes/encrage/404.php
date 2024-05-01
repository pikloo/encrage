<?php
get_header();
get_template_part('partials/header', 'header');
?>
<main class="overflow-hidden main pt-28">
    <h1>Page non trouvée</h1>
    <div class="pl-4 text-center text-2xl mb-8">
        <p>Vous vous êtes perdu(e) ?</p>
        <p>Pas de panique !</p>
    </div>
    <a href="<?= esc_url(get_home_url()) ?>" class="button ">Revenez à notre page d'accueil</a>
</main>

<?php
get_template_part('partials/footer', 'footer');
get_footer();
?>
<?php
get_header();
$logo_site = get_option('encrage_theme_options')['encrage_logo'];
$logo_site_attachment_id = $logo_site ? pippin_get_image_id($logo_site) : null; 

get_template_part('partials/header', 'header', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
?>
<main class="overflow-hidden main pt-28">
    <h1>Page non trouvée</h1>
    <div class="pl-4 text-center text-2xl mb-8">
        <p>Vous vous êtes perdu(e) ?</p>
        <p>Pas de panique !</p>
    </div>
    <a href="<?= esc_url(get_home_url()) ?>" aria-label="Revenez à notre page d'accueil" class="button ">Revenez à notre page d'accueil</a>
</main>

<?php
get_template_part('partials/footer', 'footer', [
    'logo_site_attachment_id' => $logo_site_attachment_id
]);
get_footer();
?>
<?php
/**
 * 404 — dead air, recovered with a route back to the network.
 *
 * @package Bangla_LED
 */

get_header();
?>

<section class="min-h-screen flex items-center px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto pt-20">
    <div class="max-w-3xl flex flex-col items-start gap-8">
        <span class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest">
            <?php esc_html_e( 'Error 404', 'bangla-led' ); ?>
        </span>
        <h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase m-0">
            <?php esc_html_e( 'Signal Lost', 'bangla-led' ); ?>
        </h1>
        <p class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6 max-w-xl">
            <?php esc_html_e( 'The page you requested is off-air. The network, however, is fully operational.', 'bangla-led' ); ?>
        </p>
        <div class="flex flex-wrap gap-4">
            <a class="glass-button px-8 py-4 text-label-caps uppercase text-primary tracking-widest no-underline" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php esc_html_e( 'Back To Home', 'bangla-led' ); ?>
            </a>
            <a class="px-8 py-4 text-label-caps uppercase text-on-surface-variant hover:text-primary tracking-widest transition-colors no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>">
                <?php esc_html_e( 'View All Locations', 'bangla-led' ); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>

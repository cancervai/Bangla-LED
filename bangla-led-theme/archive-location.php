<?php
/**
 * Location archive — the full network inventory.
 *
 * @package Bangla_LED
 */

get_header();
?>

<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <div class="max-w-3xl mb-20">
        <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
            <?php esc_html_e( 'The Network', 'bangla-led' ); ?>
        </span>
        <h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
            <?php esc_html_e( 'All Billboard Locations', 'bangla-led' ); ?>
        </h1>
        <p class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6">
            <?php esc_html_e( 'Every screen on the network, with verified impression volume, audience composition, and technical specifications. Filter by city or neighborhood to find the corridor your audience moves through.', 'bangla-led' ); ?>
        </p>
    </div>

    <?php
    $cities = get_terms( array( 'taxonomy' => 'city', 'hide_empty' => true ) );
    $hoods  = get_terms( array( 'taxonomy' => 'neighborhood', 'hide_empty' => true ) );
    if ( ( $cities && ! is_wp_error( $cities ) ) || ( $hoods && ! is_wp_error( $hoods ) ) ) :
        ?>
        <div class="flex flex-wrap gap-3 mb-16">
            <?php if ( $cities && ! is_wp_error( $cities ) ) : foreach ( $cities as $term ) : ?>
                <a class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest hover:bg-white/10 transition-colors no-underline" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                    <?php echo esc_html( $term->name ); ?>
                </a>
            <?php endforeach; endif; ?>
            <?php if ( $hoods && ! is_wp_error( $hoods ) ) : foreach ( $hoods as $term ) : ?>
                <a class="chip px-4 py-2 text-mono-label uppercase text-on-surface-variant tracking-widest hover:bg-white/10 hover:text-primary transition-colors no-underline" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                    <?php echo esc_html( $term->name ); ?>
                </a>
            <?php endforeach; endif; ?>
        </div>
    <?php endif; ?>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
            <?php
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/location-card' );
            endwhile;
            ?>
        </div>

        <div class="mt-20 flex justify-center gap-6 text-label-caps uppercase tracking-widest">
            <?php
            the_posts_pagination( array(
                'prev_text' => esc_html__( '&larr; Previous', 'bangla-led' ),
                'next_text' => esc_html__( 'Next &rarr;', 'bangla-led' ),
            ) );
            ?>
        </div>
    <?php else : ?>
        <p class="text-body-lg text-on-surface-variant"><?php esc_html_e( 'New placements are being added. Join the list below to be notified first.', 'bangla-led' ); ?></p>
    <?php endif; ?>
</section>

<!-- Network-wide enquiry -->
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="booking">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div>
            <h2 class="text-display-lg-mobile font-black text-primary uppercase mb-6"><?php esc_html_e( 'Not Sure Which Screen?', 'bangla-led' ); ?></h2>
            <p class="text-body-lg text-on-surface-variant max-w-md">
                <?php esc_html_e( 'Tell us the audience you need and the dates you need them. Our placement team will map your campaign across the network for maximum share of voice.', 'bangla-led' ); ?>
            </p>
        </div>
        <?php get_template_part( 'template-parts/lead-form', null, array( 'button_text' => __( 'Request Network Media Kit', 'bangla-led' ) ) ); ?>
    </div>
</section>

<?php get_footer(); ?>

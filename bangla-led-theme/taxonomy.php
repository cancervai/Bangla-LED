<?php
/**
 * City / Neighborhood silo pages — "Digital Billboards in {Term}".
 *
 * These pages anchor the local-SEO silo: one indexable hub per
 * geography, linking down to every placement inside it.
 *
 * @package Bangla_LED
 */

get_header();

$term = get_queried_object();
$term_name = ( $term && ! is_wp_error( $term ) ) ? $term->name : __( 'Bangladesh', 'bangla-led' );
?>

<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <nav class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-10" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bangla-led' ); ?>">
        <a class="text-on-surface-variant hover:text-primary no-underline transition-colors" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>"><?php esc_html_e( 'Locations', 'bangla-led' ); ?></a>
        <span class="px-2" aria-hidden="true">/</span>
        <span class="text-primary"><?php echo esc_html( $term_name ); ?></span>
    </nav>

    <div class="max-w-3xl mb-20">
        <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
            <?php esc_html_e( 'Premium Media Placements', 'bangla-led' ); ?>
        </span>
        <h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
            <?php
            printf(
                /* translators: %s: term name. */
                esc_html__( 'Digital Billboards in %s', 'bangla-led' ),
                esc_html( $term_name )
            );
            ?>
        </h1>
        <div class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6">
            <?php
            if ( $term && ! is_wp_error( $term ) && $term->description ) {
                echo wp_kses_post( wpautop( $term->description ) );
            } else {
                printf(
                    '<p>%s</p>',
                    esc_html( sprintf(
                        /* translators: %s: term name. */
                        __( 'Every cinema-grade screen we operate in %s — each placement documented with verified traffic volume, audience composition, dwell time, and full technical specifications.', 'bangla-led' ),
                        $term_name
                    ) )
                );
            }
            ?>
        </div>
    </div>

    <?php
    /* Area guide — link the silo hub to its editorial branch article. */
    $area_guide = ( $term && ! is_wp_error( $term ) )
        ? get_page_by_path( 'billboard-advertising-in-' . $term->slug, OBJECT, 'post' )
        : null;
    if ( $area_guide ) :
        ?>
        <div class="glass-panel p-8 md:p-10 mb-16 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div>
                <div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'The Corridor Guide', 'bangla-led' ); ?></div>
                <div class="text-headline-lg font-bold text-primary uppercase tracking-tight"><?php echo esc_html( $area_guide->post_title ); ?></div>
            </div>
            <a class="glass-button px-8 py-4 text-label-caps uppercase tracking-widest no-underline shrink-0" href="<?php echo esc_url( get_permalink( $area_guide ) ); ?>">
                <?php
                printf(
                    /* translators: %s: term name. */
                    esc_html__( 'Read The %s Guide', 'bangla-led' ),
                    esc_html( $term_name )
                );
                ?>
            </a>
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
        <p class="text-body-lg text-on-surface-variant">
            <?php
            printf(
                /* translators: %s: term name. */
                esc_html__( 'Placements in %s are coming online soon. Join the list below for first access.', 'bangla-led' ),
                esc_html( $term_name )
            );
            ?>
        </p>
    <?php endif; ?>
</section>

<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="booking">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div>
            <h2 class="text-display-lg-mobile font-black text-primary uppercase mb-6">
                <?php
                printf(
                    /* translators: %s: term name. */
                    esc_html__( 'Own %s', 'bangla-led' ),
                    esc_html( $term_name )
                );
                ?>
            </h2>
            <p class="text-body-lg text-on-surface-variant max-w-md">
                <?php esc_html_e( 'Request the media kit for this area — availability calendar, audience data, and current rates delivered within one business day.', 'bangla-led' ); ?>
            </p>
        </div>
        <?php
        get_template_part( 'template-parts/lead-form', null, array(
            'location'    => $term_name,
            'button_text' => __( 'Request Area Media Kit', 'bangla-led' ),
        ) );
        ?>
    </div>
</section>

<?php get_footer(); ?>

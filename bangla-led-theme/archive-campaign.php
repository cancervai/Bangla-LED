<?php
/**
 * Campaign archive — the portfolio.
 *
 * @package Bangla_LED
 */

get_header();
?>

<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <div class="max-w-3xl mb-20">
        <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
            <?php esc_html_e( 'Proof Of Work', 'bangla-led' ); ?>
        </span>
        <h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
            <?php esc_html_e( 'Campaigns', 'bangla-led' ); ?>
        </h1>
        <p class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6">
            <?php esc_html_e( 'A record of the brands that chose to own Dhaka\'s most valuable digital airspace — and how each flight was engineered for share of voice, not just reach.', 'bangla-led' ); ?>
        </p>
    </div>

    <?php if ( have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            <?php
            while ( have_posts() ) :
                the_post();
                $client = get_post_meta( get_the_ID(), '_bl_client', true );
                $sector = get_post_meta( get_the_ID(), '_bl_sector', true );
                ?>
                <article class="group border border-white/10 hover:border-white/40 transition-colors duration-500 flex flex-col">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="block relative aspect-video overflow-hidden no-underline">
                            <?php the_post_thumbnail( 'bangla-led-wide', array(
                                'class'   => 'w-full h-full object-cover grayscale opacity-60 group-hover:opacity-90 transition-opacity duration-700',
                                'loading' => 'lazy',
                            ) ); ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-background/80 to-transparent"></div>
                        </a>
                    <?php endif; ?>
                    <div class="p-8 md:p-10 flex flex-col gap-5 flex-1">
                        <div class="flex flex-wrap gap-3">
                            <?php if ( $sector ) : ?>
                                <span class="chip px-3 py-2 text-mono-label uppercase text-primary tracking-widest"><?php echo esc_html( $sector ); ?></span>
                            <?php endif; ?>
                            <?php if ( $client ) : ?>
                                <span class="chip px-3 py-2 text-mono-label uppercase text-on-surface-variant tracking-widest"><?php echo esc_html( $client ); ?></span>
                            <?php endif; ?>
                        </div>
                        <h2 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0">
                            <a href="<?php the_permalink(); ?>" class="no-underline text-primary"><?php the_title(); ?></a>
                        </h2>
                        <p class="text-body-md text-on-surface-variant m-0"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_content() ), 30 ) ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="mt-auto inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest no-underline">
                            <?php esc_html_e( 'View Case', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </article>
            <?php endwhile; ?>
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
        <p class="text-body-lg text-on-surface-variant"><?php esc_html_e( 'Case studies are being prepared. In the meantime, request the media kit to see current network performance data.', 'bangla-led' ); ?></p>
    <?php endif; ?>
</section>

<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="booking">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div>
            <h2 class="text-display-lg-mobile font-black text-primary uppercase mb-6"><?php esc_html_e( 'Your Campaign, Next', 'bangla-led' ); ?></h2>
            <p class="text-body-lg text-on-surface-variant max-w-md">
                <?php esc_html_e( 'Flights are booked by the quarter and prime placements rarely return to market. Secure your dates before they are publicly listed.', 'bangla-led' ); ?>
            </p>
        </div>
        <?php get_template_part( 'template-parts/lead-form', null, array( 'button_text' => __( 'Plan My Campaign', 'bangla-led' ) ) ); ?>
    </div>
</section>

<?php get_footer(); ?>

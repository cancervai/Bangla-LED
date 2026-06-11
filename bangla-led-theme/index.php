<?php
/**
 * Fallback template — blog index and anything without a dedicated template.
 *
 * @package Bangla_LED
 */

get_header();
?>

<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
    <div class="max-w-3xl mb-20">
        <h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
            <?php
            if ( is_home() && ! is_front_page() ) {
                single_post_title();
            } elseif ( is_search() ) {
                printf(
                    /* translators: %s: search query. */
                    esc_html__( 'Results for &ldquo;%s&rdquo;', 'bangla-led' ),
                    esc_html( get_search_query() )
                );
            } elseif ( is_archive() ) {
                the_archive_title();
            } else {
                esc_html_e( 'Latest', 'bangla-led' );
            }
            ?>
        </h1>
    </div>

    <?php if ( have_posts() ) : ?>
        <div class="flex flex-col gap-gutter">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article class="border border-white/10 hover:border-white/40 transition-colors duration-500 p-8 md:p-12 flex flex-col gap-4">
                    <div class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php echo esc_html( get_the_date() ); ?></div>
                    <h2 class="text-headline-xl font-bold text-primary uppercase tracking-tight leading-tight m-0">
                        <a href="<?php the_permalink(); ?>" class="no-underline text-primary"><?php the_title(); ?></a>
                    </h2>
                    <p class="text-body-md text-on-surface-variant m-0"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_excerpt() ), 32 ) ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest no-underline">
                        <?php esc_html_e( 'Read', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
                    </a>
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
        <p class="text-body-lg text-on-surface-variant"><?php esc_html_e( 'Nothing found.', 'bangla-led' ); ?></p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>

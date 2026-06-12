<?php
/**
 * Location card — used on the homepage grid, archives, and related lists.
 *
 * @package Bangla_LED
 */

$location_id  = get_the_ID();
$impressions  = bangla_led_meta( $location_id, '_bl_impressions', '100,000+' );
$demographic  = bangla_led_meta( $location_id, '_bl_demographic', 'Affluent Urban Audience' );
$dimensions   = bangla_led_meta( $location_id, '_bl_dimensions', "30' x 15'" );
$hoods        = get_the_terms( $location_id, 'neighborhood' );
$hood_name    = ( $hoods && ! is_wp_error( $hoods ) ) ? $hoods[0]->name : '';
/* Alternate the two live network photos so fallback cards read as real inventory, not placeholders. */
$card_fallback = ( $location_id % 2 ) ? BANGLA_LED_DEFAULT_HERO : BANGLA_LED_DEFAULT_HERO_ALT;
$card_image    = has_post_thumbnail() ? get_the_post_thumbnail_url( $location_id, 'bangla-led-card' ) : $card_fallback;
?>
<article class="group relative border border-white/10 hover:border-white/40 transition-colors duration-500 flex flex-col">
    <a href="<?php the_permalink(); ?>" class="block relative aspect-[4/5] overflow-hidden no-underline">
        <img
            src="<?php echo esc_url( $card_image ); ?>"
            alt="<?php echo esc_attr( sprintf( /* translators: %s: location title. */ __( 'Digital billboard placement at %s', 'bangla-led' ), get_the_title() ) ); ?>"
            class="w-full h-full object-cover opacity-85 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700"
            loading="lazy"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/40 to-transparent"></div>

        <?php if ( $hood_name ) : ?>
            <span class="absolute top-6 left-6 chip px-3 py-2 text-mono-label uppercase text-primary tracking-widest backdrop-blur-sm">
                <?php echo esc_html( $hood_name ); ?>
            </span>
        <?php endif; ?>

        <div class="absolute bottom-0 inset-x-0 p-6 md:p-8 flex flex-col gap-3">
            <h3 class="text-headline-lg font-bold tracking-tight text-primary uppercase leading-tight">
                <?php the_title(); ?>
            </h3>
            <div class="flex flex-wrap gap-x-6 gap-y-2 text-mono-label uppercase text-on-surface-variant tracking-widest">
                <span><?php echo esc_html( $impressions ); ?> <?php esc_html_e( 'Daily Views', 'bangla-led' ); ?></span>
                <span><?php echo esc_html( $dimensions ); ?></span>
            </div>
            <div class="text-mono-label uppercase text-on-surface-variant tracking-widest">
                <?php echo esc_html( $demographic ); ?>
            </div>
            <span class="mt-3 inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                <?php esc_html_e( 'View Placement', 'bangla-led' ); ?>
                <span aria-hidden="true">&rarr;</span>
            </span>
        </div>
    </a>
</article>

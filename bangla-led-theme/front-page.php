<?php
/**
 * Front page — the network's flagship presentation.
 *
 * Hero → Top Locations → Featured Locations → Technology & Audience
 * → Campaigns + client marquee → Lead capture.
 *
 * @package Bangla_LED
 */

get_header();

$hero_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : BANGLA_LED_DEFAULT_HERO;
?>

<!-- Hero -->
<section class="relative min-h-screen flex items-center pt-20">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-t from-background via-background/80 to-background/30 z-10"></div>
        <img
            src="<?php echo esc_url( $hero_image ); ?>"
            alt="<?php esc_attr_e( 'A cinematic night view of a Bangla LED digital billboard dominating a Dhaka intersection', 'bangla-led' ); ?>"
            class="w-full h-full object-cover object-center grayscale opacity-60"
            fetchpriority="high"
        />
    </div>

    <div class="container mx-auto px-margin-mobile md:px-margin-desktop max-w-container-max relative z-20 flex flex-col items-start w-full">
        <div class="max-w-4xl">
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
                <?php esc_html_e( 'Premium DOOH Network &middot; Bangladesh', 'bangla-led' ); ?>
            </span>
            <h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
                <?php esc_html_e( 'Dominate Dhaka\'s Digital Airspace', 'bangla-led' ); ?>
            </h1>
            <p class="text-body-lg text-on-surface-variant max-w-2xl mb-12 border-l border-white/20 pl-6">
                <?php esc_html_e( 'Bangla LED operates the country\'s most valuable digital media placements — cinema-grade screens positioned where Bangladesh\'s wealth, influence, and decision-making power moves every single day.', 'bangla-led' ); ?>
            </p>
            <div class="flex flex-wrap gap-4">
                <a class="inline-flex items-center justify-center glass-button px-8 py-4 text-label-caps uppercase text-primary tracking-widest gap-2 group no-underline" href="#booking">
                    <?php esc_html_e( 'Check Availability &amp; Pricing', 'bangla-led' ); ?>
                    <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                </a>
                <a class="inline-flex items-center justify-center px-8 py-4 text-label-caps uppercase text-on-surface-variant hover:text-primary tracking-widest transition-colors no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>">
                    <?php esc_html_e( 'Explore The Network', 'bangla-led' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Top Billboard Locations -->
<?php $top_locations = bangla_led_get_top_locations( 3 ); ?>
<?php if ( $top_locations->have_posts() ) : ?>
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="locations">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
        <div class="max-w-2xl">
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
                <?php esc_html_e( '01 &mdash; The Network', 'bangla-led' ); ?>
            </span>
            <h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight">
                <?php esc_html_e( 'Top Billboard Locations', 'bangla-led' ); ?>
            </h2>
        </div>
        <p class="text-body-md text-on-surface-variant max-w-md">
            <?php esc_html_e( 'Every placement is selected for one reason: an audience worth owning. Verified traffic volume, documented dwell time, and demographics that justify premium media spend.', 'bangla-led' ); ?>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
        <?php
        while ( $top_locations->have_posts() ) :
            $top_locations->the_post();
            get_template_part( 'template-parts/location-card' );
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>
<?php endif; ?>

<!-- Featured Locations / View All -->
<?php
$more_locations = new WP_Query( array(
    'post_type'      => 'location',
    'posts_per_page' => 2,
    'offset'         => 3,
    'no_found_rows'  => true,
) );
?>
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
        <div class="max-w-2xl">
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
                <?php esc_html_e( '02 &mdash; Featured Placements', 'bangla-led' ); ?>
            </span>
            <h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight">
                <?php esc_html_e( 'Featured Billboard Locations', 'bangla-led' ); ?>
            </h2>
        </div>
        <a class="glass-button self-start md:self-end px-8 py-4 text-label-caps uppercase text-primary tracking-widest no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>">
            <?php esc_html_e( 'View All Locations', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
        </a>
    </div>

    <?php if ( $more_locations->have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
            <?php
            while ( $more_locations->have_posts() ) :
                $more_locations->the_post();
                get_template_part( 'template-parts/location-card' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    <?php else : ?>
        <p class="text-body-md text-on-surface-variant border-l border-white/20 pl-6 max-w-xl">
            <?php esc_html_e( 'New placements are added as the network expands across Dhaka, Chattogram, and Sylhet. Browse the full inventory for current availability.', 'bangla-led' ); ?>
        </p>
    <?php endif; ?>
</section>

<!-- Authority — Technology & Audience Intelligence -->
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="network">
    <div class="max-w-3xl mb-20">
        <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
            <?php esc_html_e( '03 &mdash; The Standard', 'bangla-led' ); ?>
        </span>
        <h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight mb-8">
            <?php esc_html_e( 'Engineered For Visual Supremacy', 'bangla-led' ); ?>
        </h2>
        <p class="text-body-lg text-on-surface-variant">
            <?php esc_html_e( 'Most outdoor media in Bangladesh competes on size. We compete on fidelity, placement science, and the quality of the audience standing in front of the screen. This is the difference between being seen and being remembered.', 'bangla-led' ); ?>
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter md:gap-section-gap">
        <!-- Display engineering -->
        <div class="glass-panel p-8 md:p-16 flex flex-col justify-between">
            <div>
                <h3 class="text-headline-lg font-bold text-primary uppercase mb-4"><?php esc_html_e( 'Cinema-Grade Fidelity', 'bangla-led' ); ?></h3>
                <p class="text-body-md text-on-surface-variant mb-12">
                    <?php esc_html_e( 'Every screen on the network is specified against one benchmark: your creative must look better here than anywhere else it runs.', 'bangla-led' ); ?>
                </p>
            </div>
            <ul class="flex flex-col gap-6 list-none p-0 m-0">
                <li class="flex justify-between items-center border-b border-white/10 pb-4">
                    <span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Pixel Pitch', 'bangla-led' ); ?></span>
                    <span class="text-label-caps uppercase text-primary tracking-widest"><?php esc_html_e( 'P4 &ndash; P10 Outdoor', 'bangla-led' ); ?></span>
                </li>
                <li class="flex justify-between items-center border-b border-white/10 pb-4">
                    <span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Peak Brightness', 'bangla-led' ); ?></span>
                    <span class="text-label-caps uppercase text-primary tracking-widest"><?php esc_html_e( '5,500&ndash;7,000 nits', 'bangla-led' ); ?></span>
                </li>
                <li class="flex justify-between items-center border-b border-white/10 pb-4">
                    <span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Contrast Ratio', 'bangla-led' ); ?></span>
                    <span class="text-label-caps uppercase text-primary tracking-widest">5,000:1</span>
                </li>
                <li class="flex justify-between items-center border-b border-white/10 pb-4">
                    <span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Refresh Rate', 'bangla-led' ); ?></span>
                    <span class="text-label-caps uppercase text-primary tracking-widest">&ge; 3,840 Hz</span>
                </li>
                <li class="flex justify-between items-center border-b border-white/10 pb-4">
                    <span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Creative Formats', 'bangla-led' ); ?></span>
                    <span class="text-label-caps uppercase text-primary tracking-widest">MP4 / HTML5</span>
                </li>
                <li class="flex justify-between items-center pb-2">
                    <span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Network Uptime', 'bangla-led' ); ?></span>
                    <span class="text-label-caps uppercase text-primary tracking-widest">99.7%</span>
                </li>
            </ul>
        </div>

        <!-- Audience intelligence -->
        <div class="flex flex-col gap-12 border-l border-white/10 pl-8 md:pl-gutter">
            <h3 class="text-headline-lg font-bold text-primary uppercase"><?php esc_html_e( 'Audience Intelligence', 'bangla-led' ); ?></h3>
            <div class="grid grid-cols-1 gap-8">
                <div class="border-b border-white/10 pb-6">
                    <div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'Network Daily Impressions', 'bangla-led' ); ?></div>
                    <div class="text-headline-xl font-bold text-primary tracking-tight">750,000+</div>
                    <p class="text-body-md text-on-surface-variant mt-3 m-0">
                        <?php esc_html_e( 'Counted against verified municipal traffic data, not estimates — vehicle flow, pedestrian crossings, and adjacent retail footfall.', 'bangla-led' ); ?>
                    </p>
                </div>
                <div class="border-b border-white/10 pb-6">
                    <div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'Average Signal Dwell Time', 'bangla-led' ); ?></div>
                    <div class="text-headline-xl font-bold text-primary tracking-tight"><?php esc_html_e( '60&ndash;90 Seconds', 'bangla-led' ); ?></div>
                    <p class="text-body-md text-on-surface-variant mt-3 m-0">
                        <?php esc_html_e( 'Our placements sit at signalised intersections by design. A ten-second creative loop completes six to nine full plays per stop — the equivalent of a captive cinema audience, outdoors.', 'bangla-led' ); ?>
                    </p>
                </div>
                <div class="pb-6">
                    <div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'Audience Composition', 'bangla-led' ); ?></div>
                    <div class="text-headline-xl font-bold text-primary tracking-tight"><?php esc_html_e( 'AB-Segment Dominant', 'bangla-led' ); ?></div>
                    <p class="text-body-md text-on-surface-variant mt-3 m-0">
                        <?php esc_html_e( 'Gulshan, Banani, and the CBD corridors concentrate Bangladesh\'s executives, diplomats, and high-net-worth households. You are not buying impressions — you are buying share of voice with the people who move markets.', 'bangla-led' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Campaigns / Portfolio -->
<?php
$campaigns = new WP_Query( array(
    'post_type'      => 'campaign',
    'posts_per_page' => 3,
    'no_found_rows'  => true,
) );
?>
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="campaigns">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
        <div class="max-w-2xl">
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
                <?php esc_html_e( '04 &mdash; Proof Of Work', 'bangla-led' ); ?>
            </span>
            <h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight">
                <?php esc_html_e( 'Latest Campaigns', 'bangla-led' ); ?>
            </h2>
        </div>
        <a class="glass-button self-start md:self-end px-8 py-4 text-label-caps uppercase text-primary tracking-widest no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'campaign' ) ); ?>">
            <?php esc_html_e( 'Show All Campaigns', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
        </a>
    </div>

    <?php if ( $campaigns->have_posts() ) : ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-20">
            <?php
            while ( $campaigns->have_posts() ) :
                $campaigns->the_post();
                $client = get_post_meta( get_the_ID(), '_bl_client', true );
                $sector = get_post_meta( get_the_ID(), '_bl_sector', true );
                ?>
                <article class="border border-white/10 hover:border-white/40 transition-colors duration-500 p-8 md:p-10 flex flex-col gap-6">
                    <?php if ( $sector ) : ?>
                        <span class="chip self-start px-3 py-2 text-mono-label uppercase text-primary tracking-widest"><?php echo esc_html( $sector ); ?></span>
                    <?php endif; ?>
                    <h3 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0">
                        <a href="<?php the_permalink(); ?>" class="no-underline text-primary"><?php the_title(); ?></a>
                    </h3>
                    <?php if ( $client ) : ?>
                        <div class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php echo esc_html( $client ); ?></div>
                    <?php endif; ?>
                    <p class="text-body-md text-on-surface-variant m-0"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( get_the_content() ), 26 ) ); ?></p>
                    <a href="<?php the_permalink(); ?>" class="mt-auto inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest no-underline">
                        <?php esc_html_e( 'View Case', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
                    </a>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php endif; ?>

    <!-- Client trust marquee -->
    <div class="border-y border-white/10 py-10">
        <div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-8 text-center">
            <?php esc_html_e( 'Trusted by the brands that define Bangladesh', 'bangla-led' ); ?>
        </div>
        <div class="marquee" aria-hidden="true">
            <div class="marquee-track items-center gap-16 md:gap-24">
                <?php
                /* Two identical passes make the CSS loop seamless. */
                $marquee_clients = array(
                    'PREMIER BANK', 'GRAMEEN TELECOM', 'CITY GROUP', 'NAVANA MOTORS',
                    'SQUARE', 'BEXIMCO', 'PRAN-RFL', 'AARONG',
                );
                for ( $pass = 0; $pass < 2; $pass++ ) :
                    foreach ( $marquee_clients as $client_name ) :
                        ?>
                        <span class="text-headline-lg font-black uppercase tracking-tighter text-white/30 whitespace-nowrap px-6"><?php echo esc_html( $client_name ); ?></span>
                    <?php endforeach;
                endfor;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Lead capture -->
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative border-t border-white/10" id="booking">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div>
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
                <?php esc_html_e( '05 &mdash; Access', 'bangla-led' ); ?>
            </span>
            <h2 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-6">
                <?php esc_html_e( 'Join The Exclusive List', 'bangla-led' ); ?>
            </h2>
            <p class="text-body-lg text-on-surface-variant max-w-md">
                <?php esc_html_e( 'Premium placements sell by the quarter and rarely return to market. Submit your details to receive the network media kit, availability calendar, and current rate structure before they are publicly listed.', 'bangla-led' ); ?>
            </p>
        </div>
        <?php get_template_part( 'template-parts/lead-form', null, array( 'button_text' => __( 'Request Media Kit', 'bangla-led' ) ) ); ?>
    </div>
</section>

<?php get_footer(); ?>

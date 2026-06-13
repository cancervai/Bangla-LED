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
            alt="<?php esc_attr_e( 'A live Bangla LED digital billboard cluster glowing over a busy Dhaka intersection at night', 'bangla-led' ); ?>"
            class="w-full h-full object-cover object-center opacity-70"
            fetchpriority="high"
        />
    </div>

    <div class="container mx-auto px-margin-mobile md:px-margin-desktop max-w-container-max relative z-20 flex flex-col items-start w-full">
        <div class="max-w-4xl">
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
                <?php esc_html_e( 'Premium LED Billboard Advertising &middot; Bangladesh', 'bangla-led' ); ?>
            </span>
            <h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
                <?php esc_html_e( 'Dominate Dhaka\'s Digital Airspace', 'bangla-led' ); ?>
            </h1>
            <p class="text-body-lg text-on-surface-variant max-w-2xl mb-12 border-l border-white/20 pl-6">
                <?php esc_html_e( 'Cinema-grade LED billboards at Gulshan, Banani, Dhanmondi, Uttara, and 30+ more corridors across 10 cities — the screens Bangladesh\'s biggest brands book first. Rates, availability, and audience data delivered within one business day.', 'bangla-led' ); ?>
            </p>
            <div class="flex flex-wrap gap-4">
                <?php bangla_led_call_button( array( 'label' => __( 'Call Now', 'bangla-led' ) ) ); ?>
                <a class="inline-flex items-center justify-center px-8 py-4 text-label-caps uppercase text-primary tracking-widest gap-2 group no-underline border border-white/25 hover:border-white/60 transition-colors" href="#booking">
                    <?php esc_html_e( 'Get Availability &amp; Pricing', 'bangla-led' ); ?>
                    <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                </a>
                <a class="inline-flex items-center justify-center px-8 py-4 text-label-caps uppercase text-on-surface-variant hover:text-primary tracking-widest transition-colors no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>">
                    <?php esc_html_e( 'View Locations', 'bangla-led' ); ?>
                </a>
            </div>

            <!-- Above-the-fold proof strip (CRO: trust signals near the hero) -->
            <div class="mt-14 grid grid-cols-2 md:grid-cols-4 gap-6 w-full max-w-3xl border-t border-white/15 pt-8">
                <div>
                    <div class="text-headline-lg font-black text-primary tracking-tight">59</div>
                    <div class="text-mono-label uppercase tracking-widest text-on-surface-variant"><?php esc_html_e( 'Premium Screens', 'bangla-led' ); ?></div>
                </div>
                <div>
                    <div class="text-headline-lg font-black text-primary tracking-tight">10</div>
                    <div class="text-mono-label uppercase tracking-widest text-on-surface-variant"><?php esc_html_e( 'Cities Covered', 'bangla-led' ); ?></div>
                </div>
                <div>
                    <div class="text-headline-lg font-black text-primary tracking-tight">750K+</div>
                    <div class="text-mono-label uppercase tracking-widest text-on-surface-variant"><?php esc_html_e( 'Daily Impressions', 'bangla-led' ); ?></div>
                </div>
                <div>
                    <div class="text-headline-lg font-black text-primary tracking-tight">&lt; 24h</div>
                    <div class="text-mono-label uppercase tracking-widest text-on-surface-variant"><?php esc_html_e( 'Quote Response', 'bangla-led' ); ?></div>
                </div>
            </div>
            <p class="mt-6 text-mono-label uppercase tracking-widest text-white/70">
                <?php esc_html_e( 'Trusted by Premier Bank &middot; Grameen Telecom &middot; City Group &middot; Square &middot; PRAN-RFL', 'bangla-led' ); ?>
            </p>
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

<!-- Advertising categories / service lines -->
<?php get_template_part( 'template-parts/advertising-categories' ); ?>

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

<!-- Live network photography I -->
<section class="relative h-[55vh] md:h-[75vh] overflow-hidden border-y border-white/10">
    <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/network-1.jpg' ); ?>"
        alt="<?php esc_attr_e( 'Bangla LED digital billboard cluster glowing over a rain-soaked Dhaka intersection', 'bangla-led' ); ?>"
        class="w-full h-full object-cover"
        loading="lazy"
    />
    <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-background/40" aria-hidden="true"></div>
    <div class="absolute bottom-0 inset-x-0 px-margin-mobile md:px-margin-desktop pb-10 flex flex-col md:flex-row md:items-end md:justify-between gap-4 max-w-container-max mx-auto">
        <span class="chip self-start px-4 py-2 text-mono-label uppercase text-primary tracking-widest backdrop-blur-sm bg-black/40">
            <?php esc_html_e( 'Live From The Network &mdash; Dhaka', 'bangla-led' ); ?>
        </span>
        <p class="text-mono-label uppercase tracking-widest text-on-surface-variant m-0 md:text-right">
            <?php esc_html_e( 'Monsoon, rush hour, and the only thing still glowing.', 'bangla-led' ); ?>
        </p>
    </div>
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
            <a class="inline-flex items-center justify-center glass-button self-start px-8 py-4 text-label-caps uppercase tracking-widest gap-2 group no-underline" href="#booking">
                <?php esc_html_e( 'Get The Audience File & Rates', 'bangla-led' ); ?>
                <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
            </a>
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
                        <span class="text-headline-lg font-black uppercase tracking-tighter text-white/80 whitespace-nowrap px-6"><?php echo esc_html( $client_name ); ?></span>
                    <?php endforeach;
                endfor;
                ?>
            </div>
        </div>
    </div>

    <div class="mt-12 text-center">
        <a class="inline-flex items-center justify-center glass-button px-8 py-4 text-label-caps uppercase tracking-widest gap-2 group no-underline" href="#booking">
            <?php esc_html_e( 'Run Your Campaign Here', 'bangla-led' ); ?>
            <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
        </a>
    </div>
</section>

<!-- Live network photography II -->
<section class="relative h-[55vh] md:h-[75vh] overflow-hidden border-y border-white/10">
    <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/network-2.jpg' ); ?>"
        alt="<?php esc_attr_e( 'Multi-screen Bangla LED installation commanding a busy Dhaka street corner at dusk', 'bangla-led' ); ?>"
        class="w-full h-full object-cover"
        loading="lazy"
    />
    <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-background/40" aria-hidden="true"></div>
    <div class="absolute bottom-0 inset-x-0 px-margin-mobile md:px-margin-desktop pb-10 flex flex-col md:flex-row md:items-end md:justify-between gap-4 max-w-container-max mx-auto">
        <span class="chip self-start px-4 py-2 text-mono-label uppercase text-primary tracking-widest backdrop-blur-sm bg-black/40">
            <?php esc_html_e( 'Five Screens, One Corner', 'bangla-led' ); ?>
        </span>
        <p class="text-mono-label uppercase tracking-widest text-on-surface-variant m-0 md:text-right">
            <?php esc_html_e( 'When the screen is the brightest thing on the street, the street looks at the screen.', 'bangla-led' ); ?>
        </p>
    </div>
</section>

<!-- FAQ — peak-keyword questions, each backed by a dedicated article -->
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="faq">
    <div class="max-w-3xl mb-16">
        <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
            <?php esc_html_e( '05 &mdash; Intelligence Briefing', 'bangla-led' ); ?>
        </span>
        <h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight mb-6">
            <?php esc_html_e( 'Questions Media Buyers Ask', 'bangla-led' ); ?>
        </h2>
        <p class="text-body-lg text-on-surface-variant">
            <?php esc_html_e( 'Straight answers first, full intelligence one click deeper. Every question links to a complete field guide.', 'bangla-led' ); ?>
        </p>
    </div>

    <div class="flex flex-col border-t border-white/10">
        <?php foreach ( bangla_led_faqs() as $i => $faq ) : ?>
            <div class="bl-faq-item border-b border-white/10">
                <button type="button" class="bl-faq-toggle w-full flex items-center justify-between gap-6 py-8 text-left bg-transparent border-0 cursor-pointer group" aria-expanded="false" aria-controls="bl-faq-panel-<?php echo (int) $i; ?>">
                    <span class="flex items-baseline gap-6">
                        <span class="text-mono-label text-white/30 font-black tracking-widest"><?php echo esc_html( str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
                        <span class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight"><?php echo esc_html( $faq['q'] ); ?></span>
                    </span>
                    <span class="bl-faq-icon text-headline-lg font-black text-primary transition-transform duration-300 shrink-0" aria-hidden="true">+</span>
                </button>

                <div id="bl-faq-panel-<?php echo (int) $i; ?>" class="bl-faq-panel" hidden>
                    <div class="relative overflow-hidden border border-white/10 mb-10">
                        <img
                            src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/network-' . ( ( $i % 2 ) + 1 ) . '.jpg' ); ?>"
                            alt=""
                            class="absolute inset-0 w-full h-full object-cover blur-md scale-110 opacity-40"
                            loading="lazy"
                            aria-hidden="true"
                        />
                        <div class="absolute inset-0 bg-gradient-to-r from-background via-background/70 to-background/30" aria-hidden="true"></div>
                        <div class="relative z-10 p-8 md:p-14 grid grid-cols-1 md:grid-cols-12 gap-gutter items-center">
                            <p class="md:col-span-8 text-body-lg text-on-surface-variant m-0">
                                <?php echo esc_html( $faq['a'] ); ?>
                            </p>
                            <div class="md:col-span-4 flex md:justify-end">
                                <a class="glass-button px-8 py-4 text-label-caps uppercase tracking-widest no-underline inline-flex items-center gap-2 group" href="<?php echo esc_url( home_url( '/' . $faq['slug'] . '/' ) ); ?>">
                                    <?php esc_html_e( 'Read The Full Answer', 'bangla-led' ); ?>
                                    <span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Articles carousel -->
<?php get_template_part( 'template-parts/articles-carousel' ); ?>

<!-- Download proposal — gated lead-gen -->
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
    <div class="glass-panel p-8 md:p-16 grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div>
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6"><?php esc_html_e( 'Media Kit', 'bangla-led' ); ?></span>
            <h2 class="text-display-lg-mobile font-black text-primary uppercase mb-6"><?php esc_html_e( 'Download The Full Proposal', 'bangla-led' ); ?></h2>
            <p class="text-body-lg text-on-surface-variant max-w-md"><?php esc_html_e( 'The complete national deck — 59 placements across 10 cities, with real photos, audience data, specifications, and indicative rates. Fill the form once and it unlocks instantly, print-ready.', 'bangla-led' ); ?></p>
        </div>
        <div class="flex flex-col gap-4 md:items-end">
            <a class="glass-button px-8 py-5 text-label-caps uppercase tracking-widest no-underline text-center w-full md:w-auto" href="<?php echo esc_url( home_url( '/proposal/' ) ); ?>">
                <?php esc_html_e( 'Get The Proposal', 'bangla-led' ); ?> &rarr;
            </a>
            <?php bangla_led_call_button( array( 'label' => __( 'Or Call', 'bangla-led' ), 'classes' => 'px-8 py-4 text-label-caps uppercase tracking-widest border border-white/20 hover:border-white/50 text-primary transition-colors w-full md:w-auto justify-center' ) ); ?>
        </div>
    </div>
</section>

<!-- Lead capture -->
<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative border-t border-white/10" id="booking">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div>
            <span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
                <?php esc_html_e( '06 &mdash; Rates &amp; Availability', 'bangla-led' ); ?>
            </span>
            <h2 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-6">
                <?php esc_html_e( 'Request Rates &amp; Availability', 'bangla-led' ); ?>
            </h2>
            <p class="text-body-lg text-on-surface-variant max-w-md mb-8">
                <?php esc_html_e( 'Tell us who you are and when you want to be on air. Within one business day you\'ll receive placement-level rates, the availability calendar, and the full audience file for every screen on your shortlist.', 'bangla-led' ); ?>
            </p>
            <ul class="flex flex-col gap-3 list-none p-0 m-0 text-mono-label uppercase tracking-widest text-on-surface-variant max-w-md">
                <li class="flex items-center gap-3"><span class="text-primary" aria-hidden="true">&#10003;</span> <?php esc_html_e( 'Placement-level rate card &mdash; no public pricing games', 'bangla-led' ); ?></li>
                <li class="flex items-center gap-3"><span class="text-primary" aria-hidden="true">&#10003;</span> <?php esc_html_e( 'Live availability calendar by quarter', 'bangla-led' ); ?></li>
                <li class="flex items-center gap-3"><span class="text-primary" aria-hidden="true">&#10003;</span> <?php esc_html_e( 'Just researching? The same form gets you the 2026 media kit', 'bangla-led' ); ?></li>
            </ul>
        </div>
        <?php get_template_part( 'template-parts/lead-form', null, array( 'button_text' => __( 'Get Rates & Availability', 'bangla-led' ) ) ); ?>
    </div>
</section>

<!-- Sticky mobile CTA (CRO: never lose the action while scrolling) -->
<div id="bl-sticky-cta" class="fixed bottom-0 inset-x-0 z-40 md:hidden p-3 bg-black/80 border-t border-white/15 grid grid-cols-2 gap-2" style="backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);" hidden>
    <a class="glass-button flex items-center justify-center py-4 text-label-caps uppercase tracking-widest gap-2 no-underline" href="tel:<?php echo esc_attr( BANGLA_LED_PHONE_TEL ); ?>" data-bl-call="1">
        <span aria-hidden="true">&#9742;</span> <?php esc_html_e( 'Call', 'bangla-led' ); ?>
    </a>
    <a class="flex items-center justify-center py-4 text-label-caps uppercase tracking-widest gap-2 no-underline border border-white/25 text-primary" href="#booking">
        <?php esc_html_e( 'Pricing', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
    </a>
</div>

<?php get_footer(); ?>

<?php
/**
 * Theme footer — minimalist, border-top, monochrome.
 *
 * @package Bangla_LED
 */
?>
</main>

<!-- Pre-footer: services + call band -->
<section class="w-full border-t border-white/10 bg-surface px-margin-mobile md:px-margin-desktop py-section-gap-mobile md:py-16">
    <div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
        <div>
            <div class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-3"><?php esc_html_e( 'Speak to a media planner', 'bangla-led' ); ?></div>
            <a href="tel:<?php echo esc_attr( BANGLA_LED_PHONE_TEL ); ?>" data-bl-call="1" class="text-display-lg-mobile font-black text-primary tracking-tight no-underline inline-flex items-center gap-3 hover:opacity-80 transition-opacity">
                <span aria-hidden="true">&#9742;</span> <?php echo esc_html( BANGLA_LED_PHONE ); ?>
            </a>
        </div>
        <div class="flex flex-wrap gap-x-8 gap-y-3 md:justify-end text-mono-label uppercase tracking-widest">
            <a class="text-on-surface-variant hover:text-white transition-colors no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>"><?php esc_html_e( 'Services', 'bangla-led' ); ?></a>
            <a class="text-on-surface-variant hover:text-white transition-colors no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>"><?php esc_html_e( 'Locations', 'bangla-led' ); ?></a>
            <a class="text-on-surface-variant hover:text-white transition-colors no-underline" href="<?php echo esc_url( home_url( '/news/' ) ); ?>"><?php esc_html_e( 'News', 'bangla-led' ); ?></a>
            <a class="text-on-surface-variant hover:text-white transition-colors no-underline" href="<?php echo esc_url( home_url( '/#booking' ) ); ?>"><?php esc_html_e( 'Get Pricing', 'bangla-led' ); ?></a>
        </div>
    </div>
</section>

<footer class="w-full border-t border-white/5 bg-surface text-primary py-12 px-margin-mobile md:px-margin-desktop flex flex-col md:flex-row justify-between items-center gap-6">
    <div class="text-headline-lg font-black tracking-tighter uppercase">
        <?php echo esc_html( get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : 'BANGLA LED' ); ?>
    </div>

    <div class="flex flex-wrap justify-center gap-6 text-mono-label uppercase">
        <?php
        if ( has_nav_menu( 'footer' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false,
                'depth'          => 1,
            ) );
            ?>
            <style>
                footer .menu-item { list-style: none; display: inline-block; }
                footer .menu-item a { color: #c4c7c8; text-decoration: none; transition: color .3s ease; }
                footer .menu-item a:hover { color: #ffffff; }
            </style>
            <?php
        } else {
            $privacy_url = function_exists( 'get_privacy_policy_url' ) ? get_privacy_policy_url() : '';
            $footer_links = array(
                __( 'Privacy Policy', 'bangla-led' )      => $privacy_url ? $privacy_url : home_url( '/privacy-policy/' ),
                __( 'Terms of Service', 'bangla-led' )    => home_url( '/terms-of-service/' ),
                __( 'Installation Specs', 'bangla-led' )  => home_url( '/#network' ),
                __( 'Sustainability', 'bangla-led' )      => home_url( '/sustainability/' ),
            );
            foreach ( $footer_links as $label => $url ) :
                ?>
                <a class="text-on-surface-variant hover:text-white transition-colors no-underline" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
            <?php endforeach;
        }
        ?>
    </div>

    <div class="text-mono-label uppercase text-on-surface-variant">
        &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( strtoupper( get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : 'BANGLA LED' ) ); ?>. <?php esc_html_e( 'ALL RIGHTS RESERVED.', 'bangla-led' ); ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Theme footer — minimalist, border-top, monochrome.
 *
 * @package Bangla_LED
 */
?>
</main>

<footer class="w-full border-t border-white/5 bg-surface text-primary py-12 px-margin-mobile md:px-margin-desktop mt-section-gap-mobile md:mt-section-gap flex flex-col md:flex-row justify-between items-center gap-6">
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

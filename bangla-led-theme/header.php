<?php
/**
 * Theme header — Tailwind CDN config, glass navigation.
 *
 * @package Bangla_LED
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="dark">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        corePlugins: { preflight: true },
        theme: {
            extend: {
                "colors": {
                    "surface-variant": "#353434",
                    "outline": "#8e9192",
                    "surface-bright": "#3a3939",
                    "on-background": "#e5e2e1",
                    "primary-container": "#e2e2e2",
                    "surface-container-highest": "#353434",
                    "on-primary-container": "#636565",
                    "secondary": "#c6c6c6",
                    "surface-dim": "#141313",
                    "on-surface": "#e5e2e1",
                    "surface-tint": "#c6c6c7",
                    "on-secondary": "#303030",
                    "on-primary": "#2f3131",
                    "surface-container-low": "#1c1b1b",
                    "secondary-container": "#474747",
                    "surface-container-high": "#2a2a2a",
                    "on-surface-variant": "#c4c7c8",
                    "primary": "#ffffff",
                    "outline-variant": "#444748",
                    "surface": "#141313",
                    "on-secondary-container": "#b5b5b5",
                    "inverse-surface": "#e5e2e1",
                    "tertiary": "#ffffff",
                    "surface-container-lowest": "#0e0e0e",
                    "surface-container": "#201f1f",
                    "background": "#000000",
                    "inverse-on-surface": "#313030"
                },
                "borderRadius": {
                    "DEFAULT": "0",
                    "lg": "0",
                    "xl": "0",
                    "full": "9999px"
                },
                "spacing": {
                    "unit": "8px",
                    "section-gap": "160px",
                    "section-gap-mobile": "96px",
                    "margin-desktop": "80px",
                    "gutter": "32px",
                    "margin-mobile": "24px",
                    "container-max": "1440px"
                },
                "fontFamily": {
                    "sans": ["Inter", "ui-sans-serif", "system-ui", "sans-serif"]
                },
                "fontSize": {
                    "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "display-lg": ["72px", {"lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "900"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "letterSpacing": "0", "fontWeight": "400"}],
                    "headline-xl": ["40px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "display-lg-mobile": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.04em", "fontWeight": "900"}],
                    "mono-label": ["11px", {"lineHeight": "1", "letterSpacing": "0.05em", "fontWeight": "500"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "letterSpacing": "0", "fontWeight": "400"}],
                    "label-caps": ["12px", {"lineHeight": "1", "letterSpacing": "0.2em", "fontWeight": "700"}]
                }
            }
        }
    }
</script>
<style>
    /* Custom scrollbar */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #141313; }
    ::-webkit-scrollbar-thumb { background: #3a3939; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #636565; }

    /* Glassmorphism utilities — duplicated inline for instant first paint */
    .glass-panel {
        background: rgba(20, 19, 19, 0.4);
        backdrop-filter: blur(24px);
        -webkit-backdrop-filter: blur(24px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .glass-button {
        background: rgba(217, 4, 41, 0.92);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 64, 87, 0.6);
        color: #ffffff !important;
        transition: border-color 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-button:hover {
        border-color: #ffffff;
        background: #e50914;
        box-shadow: 0 0 24px rgba(229, 9, 20, 0.45);
    }
    .input-glass {
        background: transparent;
        border: none;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 0;
        transition: all 0.3s ease;
    }
    .input-glass:focus {
        outline: none;
        box-shadow: none;
        border-color: #ffffff;
        background: rgba(255, 255, 255, 0.05);
    }
    .chip {
        border: 1px solid rgba(255, 255, 255, 0.3);
        background: transparent;
    }
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-background text-on-background antialiased font-sans selection:bg-primary selection:text-surface overflow-x-hidden' ); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'bangla-led' ); ?></a>

<!-- TopNavBar -->
<nav class="glass-nav fixed top-0 w-full z-50 backdrop-blur-xl border-b border-white/10 flex justify-between items-center h-20 px-margin-mobile md:px-margin-desktop" aria-label="<?php esc_attr_e( 'Primary', 'bangla-led' ); ?>">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-headline-lg md:text-headline-xl font-black tracking-tighter text-primary uppercase no-underline" rel="home">
        <?php
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            echo esc_html( get_bloginfo( 'name' ) ? get_bloginfo( 'name' ) : 'BANGLA LED' );
        }
        ?>
    </a>

    <div class="hidden md:flex gap-gutter items-center text-label-caps uppercase">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false,
                'depth'          => 1,
                'link_before'    => '',
                'link_after'     => '',
                'walker'         => null,
            ) );
            ?>
            <style>
                nav .menu-item a { color: #c4c7c8; transition: color .3s ease; text-decoration: none; }
                nav .menu-item a:hover, nav .menu-item.current-menu-item a { color: #ffffff; }
                nav .menu-item { list-style: none; display: inline-block; }
            </style>
            <?php
        } else {
            $nav_links = array(
                __( 'Locations', 'bangla-led' ) => get_post_type_archive_link( 'location' ),
                __( 'Networks', 'bangla-led' )  => home_url( '/#network' ),
                __( 'Campaigns', 'bangla-led' ) => get_post_type_archive_link( 'campaign' ),
                __( 'Contact', 'bangla-led' )   => home_url( '/#booking' ),
            );
            foreach ( $nav_links as $label => $url ) :
                if ( ! $url ) {
                    continue;
                }
                ?>
                <a class="text-on-surface-variant hover:text-primary transition-colors duration-300 no-underline" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
            <?php endforeach;
        }
        ?>
    </div>

    <div class="flex items-center gap-4">
        <a class="hidden md:inline-block glass-button px-6 py-3 text-label-caps uppercase text-primary tracking-widest no-underline" href="<?php echo esc_url( is_singular( 'location' ) ? '#booking' : home_url( '/#booking' ) ); ?>">
            <?php esc_html_e( 'BOOK NOW', 'bangla-led' ); ?>
        </a>

        <button id="bl-menu-toggle" class="md:hidden glass-button p-3 text-primary" aria-expanded="false" aria-controls="bl-mobile-menu" aria-label="<?php esc_attr_e( 'Toggle menu', 'bangla-led' ); ?>">
            <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <rect width="20" height="2" fill="currentColor"/>
                <rect y="6" width="20" height="2" fill="currentColor"/>
                <rect y="12" width="20" height="2" fill="currentColor"/>
            </svg>
        </button>
    </div>
</nav>

<!-- Mobile menu -->
<div id="bl-mobile-menu" class="mobile-menu fixed top-20 inset-x-0 z-40 flex-col gap-6 px-margin-mobile py-10 text-label-caps uppercase md:hidden" hidden>
    <?php
    $mobile_links = array(
        __( 'Locations', 'bangla-led' ) => get_post_type_archive_link( 'location' ),
        __( 'Networks', 'bangla-led' )  => home_url( '/#network' ),
        __( 'Campaigns', 'bangla-led' ) => get_post_type_archive_link( 'campaign' ),
        __( 'Contact', 'bangla-led' )   => home_url( '/#booking' ),
    );
    foreach ( $mobile_links as $label => $url ) :
        if ( ! $url ) {
            continue;
        }
        ?>
        <a class="block py-4 text-on-surface-variant hover:text-primary border-b border-white/10 no-underline" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
    <?php endforeach; ?>
    <a class="glass-button block text-center px-6 py-4 mt-4 text-primary tracking-widest no-underline" href="<?php echo esc_url( home_url( '/#booking' ) ); ?>"><?php esc_html_e( 'BOOK NOW', 'bangla-led' ); ?></a>
</div>

<main id="main">

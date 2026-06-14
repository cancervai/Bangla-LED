<?php
/**
 * Bangla LED Premium — theme functions.
 *
 * Sets up the cinema-grade DOOH theme: supports, fonts, the Locations
 * programmatic-SEO engine (CPT + City/Neighborhood silo taxonomies),
 * the Campaigns portfolio, native meta boxes, secure lead capture,
 * structured data, and one-time demo content seeding.
 *
 * @package Bangla_LED
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BANGLA_LED_VERSION', '1.5.0' );

/**
 * Sitewide contact number — drives every click-to-call CTA.
 */
define( 'BANGLA_LED_PHONE', '+880 1341-250342' );
define( 'BANGLA_LED_PHONE_TEL', '+8801341250342' );

/**
 * Render a standard click-to-call CTA button.
 *
 * @param array $args label, classes, show_number.
 */
function bangla_led_call_button( $args = array() ) {
	$label       = isset( $args['label'] ) ? $args['label'] : __( 'Call Now', 'bangla-led' );
	$classes     = isset( $args['classes'] ) ? $args['classes'] : 'glass-button px-8 py-4 text-label-caps uppercase tracking-widest';
	$show_number = ! isset( $args['show_number'] ) || $args['show_number'];
	printf(
		'<a class="inline-flex items-center justify-center gap-2 no-underline %1$s" href="tel:%2$s" data-bl-call="1"><span aria-hidden="true">&#9742;</span> %3$s%4$s</a>',
		esc_attr( $classes ),
		esc_attr( BANGLA_LED_PHONE_TEL ),
		esc_html( $label ),
		$show_number ? ' <span class="opacity-90">' . esc_html( BANGLA_LED_PHONE ) . '</span>' : ''
	);
}

require_once get_template_directory() . '/inc/demo-articles.php';
require_once get_template_directory() . '/inc/demo-services.php';

/**
 * Resolve a location's photo: featured image → bundled photo by slug → network fallback.
 *
 * @param int    $post_id Location ID.
 * @param string $size    Image size for the featured image.
 * @return string Image URL.
 */
function bangla_led_location_photo( $post_id, $size = 'large' ) {
	if ( has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail_url( $post_id, $size );
	}
	$slug = get_post_field( 'post_name', $post_id );
	$file = '/assets/locations/' . $slug . '.jpg';
	if ( $slug && file_exists( get_template_directory() . $file ) ) {
		return get_template_directory_uri() . $file;
	}
	return BANGLA_LED_DEFAULT_HERO;
}

/**
 * Default cinematic imagery (used when no featured image is set).
 *
 * Local assets — the previous remote CDN placeholder could fail to load,
 * leaving grey cards and a blank hero (flagged in CRO review).
 */
define( 'BANGLA_LED_DEFAULT_HERO', get_template_directory_uri() . '/assets/img/network-1.jpg' );
define( 'BANGLA_LED_DEFAULT_HERO_ALT', get_template_directory_uri() . '/assets/img/network-2.jpg' );
define( 'BANGLA_LED_DEFAULT_MAP', 'https://lh3.googleusercontent.com/aida-public/AB6AXuBoXX0_leU3d_VBMuBqk-vm83tN_DLfBMJgiuSOIMHmaQQK41NqioDptAlS4ZCXnQq4exw5Ul-Q2VyHLIUYDlM2KIdxlJ-e6-tu1ezjc9FE7neEfHIvk_lh35ncsqY9ne3pSkLZepHlUxNG84NXzILSj5hZf8CwqqlReN_a9OcjL1SkDtQjbGMm4TtfFzIY0m1N0EiiOQY-63Ux9u8aT0mThqXAjbPgF3PtF_x7G61za-WRTauyTtCBGybGt_JQYDF7CVk3saCcMp1M' );

/* -------------------------------------------------------------------------
 * Theme setup
 * ---------------------------------------------------------------------- */

function bangla_led_setup() {
	load_theme_textdomain( 'bangla-led', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 320,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'bangla-led' ),
		'footer'  => __( 'Footer Navigation', 'bangla-led' ),
	) );

	add_image_size( 'bangla-led-card', 800, 1000, true );
	add_image_size( 'bangla-led-wide', 1600, 900, true );
}
add_action( 'after_setup_theme', 'bangla_led_setup' );

/* -------------------------------------------------------------------------
 * Assets — Inter font, theme styles, vanilla JS
 * ---------------------------------------------------------------------- */

function bangla_led_assets() {
	wp_enqueue_style(
		'bangla-led-inter',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'bangla-led-style',
		get_stylesheet_uri(),
		array( 'bangla-led-inter' ),
		BANGLA_LED_VERSION
	);

	wp_enqueue_script(
		'bangla-led-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		BANGLA_LED_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'bangla_led_assets' );

/**
 * Preconnect to the font origins for faster first paint.
 */
function bangla_led_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com' );
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'bangla_led_resource_hints', 10, 2 );

/* -------------------------------------------------------------------------
 * Custom Post Types & Taxonomies — the programmatic SEO silo
 * ---------------------------------------------------------------------- */

function bangla_led_register_post_types() {

	/* Locations — one indexable page per billboard placement. */
	register_post_type( 'location', array(
		'labels' => array(
			'name'               => __( 'Locations', 'bangla-led' ),
			'singular_name'      => __( 'Location', 'bangla-led' ),
			'add_new'            => __( 'Add New Location', 'bangla-led' ),
			'add_new_item'       => __( 'Add New Location', 'bangla-led' ),
			'edit_item'          => __( 'Edit Location', 'bangla-led' ),
			'new_item'           => __( 'New Location', 'bangla-led' ),
			'view_item'          => __( 'View Location', 'bangla-led' ),
			'search_items'       => __( 'Search Locations', 'bangla-led' ),
			'not_found'          => __( 'No locations found', 'bangla-led' ),
			'all_items'          => __( 'All Locations', 'bangla-led' ),
			'menu_name'          => __( 'Locations', 'bangla-led' ),
		),
		'public'        => true,
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'locations', 'with_front' => false ),
		'menu_icon'     => 'dashicons-location-alt',
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'show_in_rest'  => true,
	) );

	register_taxonomy( 'city', 'location', array(
		'labels' => array(
			'name'          => __( 'Cities', 'bangla-led' ),
			'singular_name' => __( 'City', 'bangla-led' ),
			'search_items'  => __( 'Search Cities', 'bangla-led' ),
			'all_items'     => __( 'All Cities', 'bangla-led' ),
			'edit_item'     => __( 'Edit City', 'bangla-led' ),
			'add_new_item'  => __( 'Add New City', 'bangla-led' ),
			'menu_name'     => __( 'Cities', 'bangla-led' ),
		),
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'billboards', 'with_front' => false ),
		'show_in_rest'      => true,
	) );

	register_taxonomy( 'neighborhood', 'location', array(
		'labels' => array(
			'name'          => __( 'Neighborhoods', 'bangla-led' ),
			'singular_name' => __( 'Neighborhood', 'bangla-led' ),
			'search_items'  => __( 'Search Neighborhoods', 'bangla-led' ),
			'all_items'     => __( 'All Neighborhoods', 'bangla-led' ),
			'edit_item'     => __( 'Edit Neighborhood', 'bangla-led' ),
			'add_new_item'  => __( 'Add New Neighborhood', 'bangla-led' ),
			'menu_name'     => __( 'Neighborhoods', 'bangla-led' ),
		),
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'area', 'with_front' => false ),
		'show_in_rest'      => true,
	) );

	/* Campaigns — the portfolio / proof-of-work layer. */
	register_post_type( 'campaign', array(
		'labels' => array(
			'name'          => __( 'Campaigns', 'bangla-led' ),
			'singular_name' => __( 'Campaign', 'bangla-led' ),
			'add_new_item'  => __( 'Add New Campaign', 'bangla-led' ),
			'edit_item'     => __( 'Edit Campaign', 'bangla-led' ),
			'all_items'     => __( 'All Campaigns', 'bangla-led' ),
			'menu_name'     => __( 'Campaigns', 'bangla-led' ),
		),
		'public'        => true,
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'campaigns', 'with_front' => false ),
		'menu_icon'     => 'dashicons-megaphone',
		'menu_position' => 6,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'  => true,
	) );

	/* Services — money-keyword advertising-format landing pages. */
	register_post_type( 'service', array(
		'labels' => array(
			'name'          => __( 'Services', 'bangla-led' ),
			'singular_name' => __( 'Service', 'bangla-led' ),
			'add_new_item'  => __( 'Add New Service', 'bangla-led' ),
			'edit_item'     => __( 'Edit Service', 'bangla-led' ),
			'all_items'     => __( 'All Services', 'bangla-led' ),
			'menu_name'     => __( 'Services', 'bangla-led' ),
		),
		'public'        => true,
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'services', 'with_front' => false ),
		'menu_icon'     => 'dashicons-screenoptions',
		'menu_position' => 6,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'  => true,
	) );

	/* Leads — private storage so no enquiry is ever lost in transit. */
	register_post_type( 'bl_lead', array(
		'labels' => array(
			'name'          => __( 'Leads', 'bangla-led' ),
			'singular_name' => __( 'Lead', 'bangla-led' ),
			'menu_name'     => __( 'Leads', 'bangla-led' ),
		),
		'public'              => false,
		'show_ui'             => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'menu_icon'           => 'dashicons-email-alt',
		'menu_position'       => 7,
		'supports'            => array( 'title', 'editor' ),
		'capabilities'        => array( 'create_posts' => 'do_not_allow' ),
		'map_meta_cap'        => true,
	) );
}
add_action( 'init', 'bangla_led_register_post_types' );

/* -------------------------------------------------------------------------
 * Location data — native meta boxes (no plugin dependencies)
 * ---------------------------------------------------------------------- */

/**
 * The full data model for a billboard placement.
 *
 * @return array<string, array{label:string, placeholder:string}>
 */
function bangla_led_location_fields() {
	return array(
		'_bl_impressions'   => array( 'label' => __( 'Daily Impressions', 'bangla-led' ), 'placeholder' => '150,000+' ),
		'_bl_total_traffic' => array( 'label' => __( 'Total Monthly Traffic', 'bangla-led' ), 'placeholder' => '4.5M+' ),
		'_bl_gender_split'  => array( 'label' => __( 'Gender Split', 'bangla-led' ), 'placeholder' => '64% Male / 36% Female' ),
		'_bl_age_groups'    => array( 'label' => __( 'Age Profile', 'bangla-led' ), 'placeholder' => '25–44 core (58%)' ),
		'_bl_professions'   => array( 'label' => __( 'Dominant Professions', 'bangla-led' ), 'placeholder' => 'Executives, Bankers, Entrepreneurs' ),
		'_bl_exposure'      => array( 'label' => __( 'Exposure Estimate', 'bangla-led' ), 'placeholder' => '6–9 full plays per signal stop' ),
		'_bl_facing'        => array( 'label' => __( 'Facing / Sightline', 'bangla-led' ), 'placeholder' => 'Hatirjheel & GMG Mor' ),
		'_bl_demographic'   => array( 'label' => __( 'Core Demographic', 'bangla-led' ), 'placeholder' => 'Corporate Executives' ),
		'_bl_dimensions'    => array( 'label' => __( 'Screen Dimensions', 'bangla-led' ), 'placeholder' => "30' x 15'" ),
		'_bl_resolution'    => array( 'label' => __( 'Resolution / Pixel Pitch', 'bangla-led' ), 'placeholder' => 'P4 Outdoor' ),
		'_bl_brightness'    => array( 'label' => __( 'Brightness (nits)', 'bangla-led' ), 'placeholder' => '5,500 nits' ),
		'_bl_peak_hours'    => array( 'label' => __( 'Peak Hours', 'bangla-led' ), 'placeholder' => '08:00–11:00 / 17:00–21:00' ),
		'_bl_dwell_time'    => array( 'label' => __( 'Average Dwell Time', 'bangla-led' ), 'placeholder' => '90+ seconds' ),
		'_bl_hours'         => array( 'label' => __( 'Operating Hours', 'bangla-led' ), 'placeholder' => '18h Daily' ),
		'_bl_traffic_note'  => array( 'label' => __( 'Traffic Context', 'bangla-led' ), 'placeholder' => 'High Traffic Intersection' ),
		'_bl_lat'           => array( 'label' => __( 'Latitude', 'bangla-led' ), 'placeholder' => '23.7806' ),
		'_bl_lng'           => array( 'label' => __( 'Longitude', 'bangla-led' ), 'placeholder' => '90.4193' ),
		'_bl_map_embed'     => array( 'label' => __( 'Google Maps Embed URL (optional)', 'bangla-led' ), 'placeholder' => 'https://www.google.com/maps/embed?...' ),
	);
}

function bangla_led_add_meta_boxes() {
	add_meta_box(
		'bangla_led_location_data',
		__( 'Placement Intelligence', 'bangla-led' ),
		'bangla_led_location_meta_box',
		'location',
		'normal',
		'high'
	);

	add_meta_box(
		'bangla_led_campaign_data',
		__( 'Campaign Details', 'bangla-led' ),
		'bangla_led_campaign_meta_box',
		'campaign',
		'side',
		'default'
	);

	add_meta_box(
		'bangla_led_service_data',
		__( 'Service Details', 'bangla-led' ),
		'bangla_led_service_meta_box',
		'service',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'bangla_led_add_meta_boxes' );

function bangla_led_location_meta_box( $post ) {
	wp_nonce_field( 'bangla_led_save_location', 'bangla_led_location_nonce' );

	$featured = get_post_meta( $post->ID, '_bl_featured', true );
	?>
	<p>
		<label>
			<input type="checkbox" name="_bl_featured" value="1" <?php checked( $featured, '1' ); ?> />
			<strong><?php esc_html_e( 'Feature on homepage (Top Locations grid)', 'bangla-led' ); ?></strong>
		</label>
	</p>
	<table class="form-table">
		<?php foreach ( bangla_led_location_fields() as $key => $field ) :
			$value = get_post_meta( $post->ID, $key, true );
			?>
			<tr>
				<th scope="row">
					<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label>
				</th>
				<td>
					<input
						type="text"
						class="regular-text"
						id="<?php echo esc_attr( $key ); ?>"
						name="<?php echo esc_attr( $key ); ?>"
						value="<?php echo esc_attr( $value ); ?>"
						placeholder="<?php echo esc_attr( $field['placeholder'] ); ?>"
					/>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php
}

function bangla_led_campaign_meta_box( $post ) {
	wp_nonce_field( 'bangla_led_save_campaign', 'bangla_led_campaign_nonce' );
	$client = get_post_meta( $post->ID, '_bl_client', true );
	$sector = get_post_meta( $post->ID, '_bl_sector', true );
	?>
	<p>
		<label for="_bl_client"><strong><?php esc_html_e( 'Client / Brand Name', 'bangla-led' ); ?></strong></label>
		<input type="text" class="widefat" id="_bl_client" name="_bl_client" value="<?php echo esc_attr( $client ); ?>" />
	</p>
	<p>
		<label for="_bl_sector"><strong><?php esc_html_e( 'Sector (e.g. Banking, Telecom, Luxury)', 'bangla-led' ); ?></strong></label>
		<input type="text" class="widefat" id="_bl_sector" name="_bl_sector" value="<?php echo esc_attr( $sector ); ?>" />
	</p>
	<p class="description"><?php esc_html_e( 'Set the featured image to the client logo or campaign creative for the homepage marquee.', 'bangla-led' ); ?></p>
	<?php
}

function bangla_led_save_location_meta( $post_id ) {
	if ( ! isset( $_POST['bangla_led_location_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bangla_led_location_nonce'] ) ), 'bangla_led_save_location' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	update_post_meta( $post_id, '_bl_featured', isset( $_POST['_bl_featured'] ) ? '1' : '' );

	foreach ( array_keys( bangla_led_location_fields() ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			$raw = wp_unslash( $_POST[ $key ] );
			$value = ( '_bl_map_embed' === $key ) ? esc_url_raw( $raw ) : sanitize_text_field( $raw );
			update_post_meta( $post_id, $key, $value );
		}
	}
}
add_action( 'save_post_location', 'bangla_led_save_location_meta' );

function bangla_led_save_campaign_meta( $post_id ) {
	if ( ! isset( $_POST['bangla_led_campaign_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bangla_led_campaign_nonce'] ) ), 'bangla_led_save_campaign' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	foreach ( array( '_bl_client', '_bl_sector' ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
		}
	}
}
add_action( 'save_post_campaign', 'bangla_led_save_campaign_meta' );

function bangla_led_service_meta_box( $post ) {
	wp_nonce_field( 'bangla_led_save_service', 'bangla_led_service_nonce' );
	$icon     = get_post_meta( $post->ID, '_bl_service_icon', true );
	$tagline  = get_post_meta( $post->ID, '_bl_service_tagline', true );
	$keywords = get_post_meta( $post->ID, '_bl_service_keywords', true );
	?>
	<p>
		<label for="_bl_service_icon"><strong><?php esc_html_e( 'Icon Glyph', 'bangla-led' ); ?></strong></label>
		<input type="text" class="widefat" id="_bl_service_icon" name="_bl_service_icon" value="<?php echo esc_attr( $icon ); ?>" placeholder="◧" />
	</p>
	<p>
		<label for="_bl_service_tagline"><strong><?php esc_html_e( 'Card Tagline', 'bangla-led' ); ?></strong></label>
		<textarea class="widefat" rows="2" id="_bl_service_tagline" name="_bl_service_tagline"><?php echo esc_textarea( $tagline ); ?></textarea>
	</p>
	<p>
		<label for="_bl_service_keywords"><strong><?php esc_html_e( 'Target Keywords', 'bangla-led' ); ?></strong></label>
		<input type="text" class="widefat" id="_bl_service_keywords" name="_bl_service_keywords" value="<?php echo esc_attr( $keywords ); ?>" />
	</p>
	<?php
}

function bangla_led_save_service_meta( $post_id ) {
	if ( ! isset( $_POST['bangla_led_service_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bangla_led_service_nonce'] ) ), 'bangla_led_save_service' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['_bl_service_icon'] ) ) {
		update_post_meta( $post_id, '_bl_service_icon', sanitize_text_field( wp_unslash( $_POST['_bl_service_icon'] ) ) );
	}
	if ( isset( $_POST['_bl_service_tagline'] ) ) {
		update_post_meta( $post_id, '_bl_service_tagline', sanitize_text_field( wp_unslash( $_POST['_bl_service_tagline'] ) ) );
	}
	if ( isset( $_POST['_bl_service_keywords'] ) ) {
		update_post_meta( $post_id, '_bl_service_keywords', sanitize_text_field( wp_unslash( $_POST['_bl_service_keywords'] ) ) );
	}
}
add_action( 'save_post_service', 'bangla_led_save_service_meta' );

/**
 * Read a location meta value with a graceful default.
 *
 * @param int    $post_id  Location ID.
 * @param string $key      Meta key (with _bl_ prefix).
 * @param string $fallback Value when meta is empty.
 * @return string
 */
function bangla_led_meta( $post_id, $key, $fallback = '' ) {
	$value = get_post_meta( $post_id, $key, true );
	return ( '' !== $value && null !== $value ) ? $value : $fallback;
}

/* -------------------------------------------------------------------------
 * Lead capture — secure native handler (no form plugins required)
 * ---------------------------------------------------------------------- */

function bangla_led_handle_lead() {
	if ( ! isset( $_POST['bangla_led_lead_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['bangla_led_lead_nonce'] ) ), 'bangla_led_lead' ) ) {
		wp_safe_redirect( add_query_arg( 'lead', 'error', wp_get_referer() ? wp_get_referer() : home_url( '/' ) ) );
		exit;
	}

	/* Honeypot — bots fill every field, humans never see this one. */
	if ( ! empty( $_POST['bl_company_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'lead', 'success', wp_get_referer() ? wp_get_referer() : home_url( '/' ) ) );
		exit;
	}

	$name     = isset( $_POST['bl_name'] ) ? sanitize_text_field( wp_unslash( $_POST['bl_name'] ) ) : '';
	$brand    = isset( $_POST['bl_brand'] ) ? sanitize_text_field( wp_unslash( $_POST['bl_brand'] ) ) : '';
	$email    = isset( $_POST['bl_email'] ) ? sanitize_email( wp_unslash( $_POST['bl_email'] ) ) : '';
	$dates    = isset( $_POST['bl_dates'] ) ? sanitize_text_field( wp_unslash( $_POST['bl_dates'] ) ) : '';
	$location = isset( $_POST['bl_location'] ) ? sanitize_text_field( wp_unslash( $_POST['bl_location'] ) ) : '';
	$desig    = isset( $_POST['bl_designation'] ) ? sanitize_text_field( wp_unslash( $_POST['bl_designation'] ) ) : '';
	$company  = isset( $_POST['bl_company'] ) ? sanitize_text_field( wp_unslash( $_POST['bl_company'] ) ) : '';
	$phone    = isset( $_POST['bl_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['bl_phone'] ) ) : '';
	$intent   = isset( $_POST['bl_intent'] ) ? sanitize_key( wp_unslash( $_POST['bl_intent'] ) ) : '';
	$referer  = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	/* For the proposal/popup forms, company stands in for brand if brand is absent. */
	if ( '' === $brand && '' !== $company ) {
		$brand = $company;
	}

	if ( '' === $name || '' === $brand ) {
		wp_safe_redirect( add_query_arg( 'lead', 'error', $referer ) );
		exit;
	}

	$body  = "New media kit / placement enquiry\n\n";
	$body .= 'Name:           ' . $name . "\n";
	$body .= 'Designation:    ' . $desig . "\n";
	$body .= 'Company:        ' . $company . "\n";
	$body .= 'Brand / Agency: ' . $brand . "\n";
	$body .= 'Phone:          ' . $phone . "\n";
	$body .= 'Email:          ' . $email . "\n";
	$body .= 'Campaign Dates: ' . $dates . "\n";
	$body .= 'Location:       ' . ( $location ? $location : 'General / Network-wide' ) . "\n";
	$body .= 'Intent:         ' . ( $intent ? $intent : 'enquiry' ) . "\n";
	$body .= 'Submitted from: ' . $referer . "\n";

	/* Persist first — email transport can fail silently on shared hosts. */
	$lead_id = wp_insert_post( array(
		'post_type'    => 'bl_lead',
		'post_status'  => 'private',
		'post_title'   => sprintf( '%s — %s', $brand, $name ),
		'post_content' => $body,
	) );

	if ( $lead_id && ! is_wp_error( $lead_id ) ) {
		update_post_meta( $lead_id, '_bl_lead_email', $email );
		update_post_meta( $lead_id, '_bl_lead_location', $location );
		update_post_meta( $lead_id, '_bl_lead_phone', $phone );
		update_post_meta( $lead_id, '_bl_lead_designation', $desig );
		update_post_meta( $lead_id, '_bl_lead_company', $company );
		update_post_meta( $lead_id, '_bl_lead_intent', $intent );
	}

	$subject = sprintf( '[BANGLA LED] New lead: %s', $brand );
	$headers = array();
	if ( $email && is_email( $email ) ) {
		$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
	}
	wp_mail( get_option( 'admin_email' ), $subject, $body, $headers );

	/* Proposal download intent → unlock the print-ready proposal. */
	if ( 'proposal' === $intent ) {
		$target = isset( $_POST['bl_proposal_url'] ) ? esc_url_raw( wp_unslash( $_POST['bl_proposal_url'] ) ) : home_url( '/proposal/' );
		setcookie( 'bl_proposal_unlocked', '1', time() + 2 * DAY_IN_SECONDS, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN );
		wp_safe_redirect( add_query_arg( 'unlocked', '1', $target ) );
		exit;
	}

	wp_safe_redirect( add_query_arg( 'lead', 'success', $referer . '#booking' ) );
	exit;
}
add_action( 'admin_post_bangla_led_lead', 'bangla_led_handle_lead' );
add_action( 'admin_post_nopriv_bangla_led_lead', 'bangla_led_handle_lead' );

/* -------------------------------------------------------------------------
 * Technical SEO — meta description, Open Graph, JSON-LD
 * ---------------------------------------------------------------------- */

/**
 * Build a context-aware meta description without keyword cannibalization.
 */
function bangla_led_meta_description() {
	if ( is_front_page() ) {
		return __( 'Bangla LED operates Bangladesh\'s premier cinema-grade DOOH network — high-impact digital media placements across Dhaka\'s most valuable intersections, engineered for brands that demand total share of voice.', 'bangla-led' );
	}
	if ( is_singular( 'location' ) ) {
		$impressions = bangla_led_meta( get_the_ID(), '_bl_impressions', '100,000+' );
		$demo        = bangla_led_meta( get_the_ID(), '_bl_demographic', 'affluent urban audiences' );
		return sprintf(
			/* translators: 1: location title, 2: daily impressions, 3: demographic. */
			__( '%1$s — a premium digital media placement on the Bangla LED network. %2$s daily impressions reaching %3$s. Request the media kit and current availability.', 'bangla-led' ),
			get_the_title(),
			$impressions,
			$demo
		);
	}
	if ( is_post_type_archive( 'location' ) ) {
		return __( 'Every premium digital screen on the Bangla LED network — browse placements by city and neighborhood, with verified impression volume, audience data, and technical specifications.', 'bangla-led' );
	}
	if ( is_tax( 'city' ) || is_tax( 'neighborhood' ) ) {
		$term = get_queried_object();
		if ( $term && ! is_wp_error( $term ) ) {
			return sprintf(
				/* translators: %s: term name. */
				__( 'Premium digital media placements in %s — verified traffic data, audience intelligence, and screen specifications from the Bangla LED DOOH network.', 'bangla-led' ),
				$term->name
			);
		}
	}
	if ( is_singular() && has_excerpt() ) {
		return wp_strip_all_tags( get_the_excerpt() );
	}
	return get_bloginfo( 'description' );
}

/**
 * Keyword-led front-page title tag (CRO/SEO review recommendation).
 */
function bangla_led_front_page_title( $title ) {
	if ( is_front_page() ) {
		return __( 'LED Billboard Advertising in Dhaka & Bangladesh | Bangla LED', 'bangla-led' );
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'bangla_led_front_page_title' );

function bangla_led_head_seo() {
	$description = bangla_led_meta_description();
	if ( $description ) {
		echo '<meta name="description" content="' . esc_attr( $description ) . '" />' . "\n";
	}

	/* Open Graph */
	echo '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
	echo '<meta property="og:type" content="' . ( is_singular() && ! is_front_page() ? 'article' : 'website' ) . '" />' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( wp_get_document_title() ) . '" />' . "\n";
	if ( $description ) {
		echo '<meta property="og:description" content="' . esc_attr( $description ) . '" />' . "\n";
	}

	$og_image = '';
	if ( is_singular() && has_post_thumbnail() ) {
		$og_image = get_the_post_thumbnail_url( get_the_ID(), 'bangla-led-wide' );
	}
	if ( ! $og_image ) {
		$og_image = BANGLA_LED_DEFAULT_HERO;
	}
	echo '<meta property="og:image" content="' . esc_url( $og_image ) . '" />' . "\n";
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";

	/* Theme color for mobile browser chrome. */
	echo '<meta name="theme-color" content="#000000" />' . "\n";
}
add_action( 'wp_head', 'bangla_led_head_seo', 5 );

function bangla_led_json_ld() {
	$schema = array();

	/* Organization — sitewide entity. */
	$schema[] = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'Organization',
		'name'        => 'Bangla LED',
		'url'         => home_url( '/' ),
		'description' => __( 'Premium cinema-grade digital out-of-home (DOOH) advertising network in Bangladesh.', 'bangla-led' ),
		'telephone'   => BANGLA_LED_PHONE_TEL,
		'areaServed'  => array(
			'@type' => 'Country',
			'name'  => 'Bangladesh',
		),
		'contactPoint' => array(
			'@type'       => 'ContactPoint',
			'telephone'   => BANGLA_LED_PHONE_TEL,
			'contactType' => 'sales',
			'areaServed'  => 'BD',
		),
	);

	if ( is_singular( 'location' ) ) {
		$post_id = get_the_ID();
		$lat     = bangla_led_meta( $post_id, '_bl_lat' );
		$lng     = bangla_led_meta( $post_id, '_bl_lng' );
		$cities  = get_the_terms( $post_id, 'city' );
		$city    = ( $cities && ! is_wp_error( $cities ) ) ? $cities[0]->name : 'Dhaka';

		$place = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Place',
			'name'        => get_the_title(),
			'url'         => get_permalink(),
			'description' => bangla_led_meta_description(),
			'address'     => array(
				'@type'           => 'PostalAddress',
				'addressLocality' => $city,
				'addressCountry'  => 'BD',
			),
		);
		if ( $lat && $lng ) {
			$place['geo'] = array(
				'@type'     => 'GeoCoordinates',
				'latitude'  => $lat,
				'longitude' => $lng,
			);
		}
		$schema[] = $place;

		/* Breadcrumbs reinforce the silo for crawlers. */
		$crumbs = array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => __( 'Locations', 'bangla-led' ),
				'item'     => get_post_type_archive_link( 'location' ),
			),
		);
		if ( $cities && ! is_wp_error( $cities ) ) {
			$crumbs[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => $cities[0]->name,
				'item'     => get_term_link( $cities[0] ),
			);
		}
		$crumbs[] = array(
			'@type'    => 'ListItem',
			'position' => count( $crumbs ) + 1,
			'name'     => get_the_title(),
			'item'     => get_permalink(),
		);
		$schema[] = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $crumbs,
		);
	}

	if ( is_singular( 'service' ) ) {
		$schema[] = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'name'        => get_the_title(),
			'description' => wp_strip_all_tags( get_the_excerpt() ),
			'url'         => get_permalink(),
			'serviceType' => get_the_title(),
			'areaServed'  => array(
				'@type' => 'Country',
				'name'  => 'Bangladesh',
			),
			'provider'    => array(
				'@type'     => 'Organization',
				'name'      => 'Bangla LED',
				'url'       => home_url( '/' ),
				'telephone' => BANGLA_LED_PHONE_TEL,
			),
		);
	}

	if ( is_front_page() && function_exists( 'bangla_led_faqs' ) ) {
		$faq_items = array();
		foreach ( bangla_led_faqs() as $faq ) {
			$faq_items[] = array(
				'@type'          => 'Question',
				'name'           => $faq['q'],
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => $faq['a'],
				),
			);
		}
		$schema[] = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $faq_items,
		);
	}

	foreach ( $schema as $block ) {
		echo '<script type="application/ld+json">' . wp_json_encode( $block, JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
	}
}
add_action( 'wp_head', 'bangla_led_json_ld', 20 );

/* -------------------------------------------------------------------------
 * Query helpers used by templates
 * ---------------------------------------------------------------------- */

/**
 * Fetch homepage locations — featured first, latest as fallback.
 *
 * @param int $count Number of locations.
 * @return WP_Query
 */
function bangla_led_get_top_locations( $count = 3 ) {
	$featured = new WP_Query( array(
		'post_type'      => 'location',
		'posts_per_page' => $count,
		'meta_key'       => '_bl_featured',
		'meta_value'     => '1',
		'no_found_rows'  => true,
	) );

	if ( $featured->have_posts() ) {
		return $featured;
	}

	return new WP_Query( array(
		'post_type'      => 'location',
		'posts_per_page' => $count,
		'no_found_rows'  => true,
	) );
}

/* -------------------------------------------------------------------------
 * One-time demo content — populates the network on first activation
 * ---------------------------------------------------------------------- */

/**
 * Find a post ID by exact title (replacement for deprecated get_page_by_title).
 *
 * @param string $title Post title.
 * @param string $type  Post type.
 * @return int Post ID or 0.
 */
function bangla_led_find_by_title( $title, $type ) {
	$found = get_posts( array(
		'post_type'   => $type,
		'title'       => $title,
		'post_status' => 'any',
		'numberposts' => 1,
		'fields'      => 'ids',
	) );
	return $found ? (int) $found[0] : 0;
}

function bangla_led_seed_demo_content() {
	if ( get_option( 'bangla_led_seeded_v5' ) ) {
		flush_rewrite_rules();
		return;
	}

	/* CPTs are registered on init; activation can run before that. */
	bangla_led_register_post_types();

	require_once get_template_directory() . '/inc/demo-content.php';
	require_once get_template_directory() . '/inc/demo-content-extra.php';
	require_once get_template_directory() . '/inc/demo-articles.php';
	require_once get_template_directory() . '/inc/demo-services.php';

	/* Editorial categories — the topic clusters that organise the news hub. */
	$category_map = array(
		'area-guides'   => __( 'Area & Corridor Guides', 'bangla-led' ),
		'buying-guides' => __( 'Billboard Buying Guides', 'bangla-led' ),
		'insights'      => __( 'Industry Insights', 'bangla-led' ),
	);
	$cat_ids = array();
	foreach ( $category_map as $slug => $name ) {
		$existing = term_exists( $slug, 'category' );
		if ( ! $existing ) {
			$existing = wp_insert_term( $name, 'category', array( 'slug' => $slug ) );
		}
		if ( ! is_wp_error( $existing ) ) {
			$cat_ids[ $slug ] = (int) $existing['term_id'];
		}
	}

	/* Terms — cities and their neighborhoods (base + extended). */
	$all_terms = bangla_led_demo_terms();
	foreach ( bangla_led_demo_terms_extra() as $city => $hoods ) {
		$all_terms[ $city ] = isset( $all_terms[ $city ] )
			? array_merge( $all_terms[ $city ], $hoods )
			: $hoods;
	}

	$city_ids = array();
	$hood_ids = array();
	foreach ( $all_terms as $city => $hoods ) {
		$existing = term_exists( $city, 'city' );
		$term     = $existing ? $existing : wp_insert_term( $city, 'city' );
		if ( ! is_wp_error( $term ) ) {
			$city_ids[ $city ] = (int) $term['term_id'];
		}
		foreach ( $hoods as $hood ) {
			$existing = term_exists( $hood, 'neighborhood' );
			$term     = $existing ? $existing : wp_insert_term( $hood, 'neighborhood' );
			if ( ! is_wp_error( $term ) ) {
				$hood_ids[ $hood ] = (int) $term['term_id'];
			}
		}
	}

	/* Locations — skip any title that already exists so re-seeding is safe. */
	$all_locations = array_merge( bangla_led_demo_locations(), bangla_led_demo_locations_extra() );
	foreach ( $all_locations as $loc ) {
		$existing = bangla_led_find_by_title( $loc['title'], 'location' );
		if ( $existing ) {
			$post_id = $existing;
		} else {
			$post_id = wp_insert_post( array(
				'post_type'    => 'location',
				'post_status'  => 'publish',
				'post_title'   => $loc['title'],
				'post_excerpt' => $loc['excerpt'],
				'post_content' => $loc['content'],
			) );
		}
		if ( ! $post_id || is_wp_error( $post_id ) ) {
			continue;
		}

		if ( isset( $city_ids[ $loc['city'] ] ) ) {
			wp_set_object_terms( $post_id, array( $city_ids[ $loc['city'] ] ), 'city' );
		}
		if ( isset( $hood_ids[ $loc['hood'] ] ) ) {
			wp_set_object_terms( $post_id, array( $hood_ids[ $loc['hood'] ] ), 'neighborhood' );
		}
		update_post_meta( $post_id, '_bl_featured', $loc['featured'] );
		foreach ( $loc['meta'] as $key => $value ) {
			update_post_meta( $post_id, $key, $value );
		}
	}

	/* Campaign case studies. */
	foreach ( bangla_led_demo_campaigns() as $camp ) {
		if ( bangla_led_find_by_title( $camp['title'], 'campaign' ) ) {
			continue;
		}
		$post_id = wp_insert_post( array(
			'post_type'    => 'campaign',
			'post_status'  => 'publish',
			'post_title'   => $camp['title'],
			'post_content' => $camp['content'],
		) );
		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, '_bl_client', $camp['client'] );
			update_post_meta( $post_id, '_bl_sector', $camp['sector'] );
		}
	}

	/* SEO editorial posts — categorised as Industry Insights. */
	foreach ( bangla_led_demo_posts() as $article ) {
		$existing = bangla_led_find_by_title( $article['title'], 'post' );
		if ( $existing ) {
			if ( isset( $cat_ids['insights'] ) ) {
				wp_set_object_terms( $existing, array( $cat_ids['insights'] ), 'category' );
			}
			continue;
		}
		$post_id = wp_insert_post( array(
			'post_type'     => 'post',
			'post_status'   => 'publish',
			'post_title'    => $article['title'],
			'post_excerpt'  => $article['excerpt'],
			'post_content'  => $article['content'],
			'post_category' => isset( $cat_ids['insights'] ) ? array( $cat_ids['insights'] ) : array(),
		) );
	}

	/* Area guides → Area & Corridor Guides cluster. */
	foreach ( bangla_led_demo_area_articles() as $article ) {
		$existing = bangla_led_find_by_title( $article['title'], 'post' );
		if ( $existing ) {
			if ( isset( $cat_ids['area-guides'] ) ) {
				wp_set_object_terms( $existing, array( $cat_ids['area-guides'] ), 'category' );
			}
			continue;
		}
		wp_insert_post( array(
			'post_type'     => 'post',
			'post_status'   => 'publish',
			'post_title'    => $article['title'],
			'post_name'     => $article['slug'],
			'post_excerpt'  => $article['excerpt'],
			'post_content'  => $article['content'],
			'post_category' => isset( $cat_ids['area-guides'] ) ? array( $cat_ids['area-guides'] ) : array(),
		) );
	}

	/* Question / buying-guide articles → Billboard Buying Guides cluster. */
	foreach ( bangla_led_demo_faq_articles() as $article ) {
		$existing = bangla_led_find_by_title( $article['title'], 'post' );
		if ( $existing ) {
			if ( isset( $cat_ids['buying-guides'] ) ) {
				wp_set_object_terms( $existing, array( $cat_ids['buying-guides'] ), 'category' );
			}
			continue;
		}
		wp_insert_post( array(
			'post_type'     => 'post',
			'post_status'   => 'publish',
			'post_title'    => $article['title'],
			'post_name'     => $article['slug'],
			'post_excerpt'  => $article['excerpt'],
			'post_content'  => $article['content'],
			'post_category' => isset( $cat_ids['buying-guides'] ) ? array( $cat_ids['buying-guides'] ) : array(),
		) );
	}

	/* Advertising service lines — the money-keyword landing pages. */
	foreach ( bangla_led_demo_services() as $service ) {
		if ( bangla_led_find_by_title( $service['title'], 'service' ) ) {
			continue;
		}
		$post_id = wp_insert_post( array(
			'post_type'    => 'service',
			'post_status'  => 'publish',
			'post_title'   => $service['title'],
			'post_name'    => $service['slug'],
			'post_excerpt' => $service['excerpt'],
			'post_content' => $service['content'],
			'menu_order'   => isset( $service['menu'] ) ? (int) $service['menu'] : 0,
		) );
		if ( $post_id && ! is_wp_error( $post_id ) ) {
			update_post_meta( $post_id, '_bl_service_icon', $service['icon'] );
			update_post_meta( $post_id, '_bl_service_tagline', $service['tagline'] );
			update_post_meta( $post_id, '_bl_service_keywords', $service['keywords'] );
		}
	}

	/* Create the News page if it doesn't exist. */
	if ( ! bangla_led_find_by_title( 'News', 'page' ) ) {
		wp_insert_post( array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => 'News',
			'post_name'    => 'news',
			'post_content' => 'This page displays the latest news and articles from Bangla LED.',
		) );
	}

	/* Create the gated Proposal download page (uses page-proposal.php). */
	if ( ! bangla_led_find_by_title( 'Proposal', 'page' ) ) {
		wp_insert_post( array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => 'Proposal',
			'post_name'    => 'proposal',
			'post_content' => 'Download the Bangla LED national billboard proposal.',
		) );
	}

	update_option( 'bangla_led_seeded_v5', 1 );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bangla_led_seed_demo_content' );

/**
 * Run pending seeds on a normal request too.
 *
 * WP Pusher (and git-based deploys) update theme files in place without
 * re-activating the theme, so `after_switch_theme` never fires. This
 * guard makes new seed versions apply on the next page load instead.
 */
function bangla_led_maybe_seed() {
	if ( ! get_option( 'bangla_led_seeded_v5' ) ) {
		bangla_led_seed_demo_content();
	}
}
add_action( 'wp_loaded', 'bangla_led_maybe_seed' );

/* -------------------------------------------------------------------------
 * Admin polish
 * ---------------------------------------------------------------------- */

/**
 * Surface lead contact details in the Leads list table.
 */
function bangla_led_lead_columns( $columns ) {
	$columns['bl_email']    = __( 'Email', 'bangla-led' );
	$columns['bl_location'] = __( 'Location', 'bangla-led' );
	return $columns;
}
add_filter( 'manage_bl_lead_posts_columns', 'bangla_led_lead_columns' );

function bangla_led_lead_column_content( $column, $post_id ) {
	if ( 'bl_email' === $column ) {
		echo esc_html( get_post_meta( $post_id, '_bl_lead_email', true ) );
	}
	if ( 'bl_location' === $column ) {
		$location = get_post_meta( $post_id, '_bl_lead_location', true );
		echo esc_html( $location ? $location : '—' );
	}
}
add_action( 'manage_bl_lead_posts_custom_column', 'bangla_led_lead_column_content', 10, 2 );

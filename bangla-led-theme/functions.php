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

define( 'BANGLA_LED_VERSION', '1.0.0' );

/**
 * Default cinematic imagery (used when no featured image is set).
 */
define( 'BANGLA_LED_DEFAULT_HERO', 'https://lh3.googleusercontent.com/aida-public/AB6AXuCTljPfboRqYk-g1iMSziUtjUlj1FffTbsRdMeiybvTZ-RTlMXaHyUV2G_AFpHrIBpe5od4AFwI76b-XLe8JmyoM0GcutFpJ5VE9lkDx0hCyAY4a3OtFoTIE1P6wNSyOIZ2eHIbKcLJp6CfKqeyOhSWNNBaVHBOzaQXI70WYJ3Vgd1hWaNPU85YGyce0OHPYnmbfVbEtf7xq8wxkKH7nPpPsey7-O33UOkzTz8c3Ugpk5iMOyeD4AfcjcnLB84dj62ySW7K9KsoHaXD' );
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
	$referer  = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	if ( '' === $name || '' === $brand ) {
		wp_safe_redirect( add_query_arg( 'lead', 'error', $referer ) );
		exit;
	}

	$body  = "New media kit / placement enquiry\n\n";
	$body .= 'Name:           ' . $name . "\n";
	$body .= 'Brand / Agency: ' . $brand . "\n";
	$body .= 'Email:          ' . $email . "\n";
	$body .= 'Campaign Dates: ' . $dates . "\n";
	$body .= 'Location:       ' . ( $location ? $location : 'General / Network-wide' ) . "\n";
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
	}

	$subject = sprintf( '[BANGLA LED] New lead: %s', $brand );
	$headers = array();
	if ( $email && is_email( $email ) ) {
		$headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
	}
	wp_mail( get_option( 'admin_email' ), $subject, $body, $headers );

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
		'areaServed'  => array(
			'@type' => 'Country',
			'name'  => 'Bangladesh',
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

function bangla_led_seed_demo_content() {
	if ( get_option( 'bangla_led_seeded' ) ) {
		flush_rewrite_rules();
		return;
	}

	/* CPTs are registered on init; activation can run before that. */
	bangla_led_register_post_types();

	$dhaka = wp_insert_term( 'Dhaka', 'city' );
	$dhaka_id = ( ! is_wp_error( $dhaka ) ) ? (int) $dhaka['term_id'] : 0;

	$hoods = array();
	foreach ( array( 'Gulshan', 'Banani', 'Tejgaon', 'Uttara', 'Motijheel' ) as $hood ) {
		$term = wp_insert_term( $hood, 'neighborhood' );
		if ( ! is_wp_error( $term ) ) {
			$hoods[ $hood ] = (int) $term['term_id'];
		}
	}

	$locations = array(
		array(
			'title'        => 'Police Plaza South Side',
			'neighborhood' => 'Gulshan',
			'featured'     => '1',
			'excerpt'      => 'Command the attention of corporate executives with 150,000+ daily views in the heart of Gulshan.',
			'content'      => '<p>Positioned at the southern face of Police Plaza Concord, this screen owns the sightline of one of Dhaka\'s most affluent corridors. Traffic moving between Gulshan 1, Hatirjheel, and the central business district passes directly beneath the display, with signal-controlled stops producing exceptional dwell time during peak hours.</p><p>The audience profile here is unmatched in Bangladesh: C-suite executives, diplomats, private bankers, and the decision-makers of every major corporate headquarters within a two-kilometre radius. For premium brands, this is the single highest-value piece of digital airspace in the city.</p>',
			'meta'         => array(
				'_bl_impressions'  => '150,000+',
				'_bl_demographic'  => 'Corporate Executives',
				'_bl_dimensions'   => "30' x 15'",
				'_bl_resolution'   => 'P4 Outdoor',
				'_bl_brightness'   => '5,500 nits',
				'_bl_peak_hours'   => '08:00–11:00 / 17:00–21:00',
				'_bl_dwell_time'   => '90+ seconds',
				'_bl_hours'        => '18h Daily',
				'_bl_traffic_note' => 'High Traffic Intersection',
				'_bl_lat'          => '23.7806',
				'_bl_lng'          => '90.4143',
			),
		),
		array(
			'title'        => 'Kamal Ataturk Avenue Gateway',
			'neighborhood' => 'Banani',
			'featured'     => '1',
			'excerpt'      => 'The commercial spine of Banani — 120,000+ daily impressions across banking, airline, and agency headquarters traffic.',
			'content'      => '<p>Kamal Ataturk Avenue concentrates more corporate signage spend than any other street in Bangladesh, and this placement anchors its busiest gateway. The screen faces four lanes of slow-moving commuter traffic flanked by bank head offices, airline sales centres, and multinational agencies.</p><p>Dwell time here is driven by the avenue\'s signalised crossings; creative running 10-second loops achieves near-total audience coverage during morning and evening peaks.</p>',
			'meta'         => array(
				'_bl_impressions'  => '120,000+',
				'_bl_demographic'  => 'Banking & Agency Professionals',
				'_bl_dimensions'   => "24' x 12'",
				'_bl_resolution'   => 'P4 Outdoor',
				'_bl_brightness'   => '5,000 nits',
				'_bl_peak_hours'   => '08:30–11:00 / 17:00–20:30',
				'_bl_dwell_time'   => '75+ seconds',
				'_bl_hours'        => '18h Daily',
				'_bl_traffic_note' => 'Signalised Commercial Corridor',
				'_bl_lat'          => '23.7937',
				'_bl_lng'          => '90.4043',
			),
		),
		array(
			'title'        => 'Tejgaon Link Road Tower',
			'neighborhood' => 'Tejgaon',
			'featured'     => '1',
			'excerpt'      => 'A monolithic screen above Dhaka\'s industrial-commercial crossover, capturing 180,000+ vehicles daily.',
			'content'      => '<p>The Tejgaon Link Road placement sits at the convergence of industrial logistics, new-economy office campuses, and the arterial route into Gulshan. Its elevated mount and unobstructed 200-metre approach make it visible far earlier than any competing structure in the corridor.</p><p>This is volume with quality: fleet decision-makers, media-buying agencies headquartered in the Tejgaon commercial belt, and the daily flow of Dhaka\'s upwardly mobile workforce.</p>',
			'meta'         => array(
				'_bl_impressions'  => '180,000+',
				'_bl_demographic'  => 'Urban Professionals & Fleet Buyers',
				'_bl_dimensions'   => "32' x 16'",
				'_bl_resolution'   => 'P5 Outdoor',
				'_bl_brightness'   => '6,000 nits',
				'_bl_peak_hours'   => '07:30–10:30 / 16:30–21:00',
				'_bl_dwell_time'   => '60+ seconds',
				'_bl_hours'        => '18h Daily',
				'_bl_traffic_note' => 'Elevated Arterial Approach',
				'_bl_lat'          => '23.7639',
				'_bl_lng'          => '90.4067',
			),
		),
		array(
			'title'        => 'Uttara Jashimuddin Crossing',
			'neighborhood' => 'Uttara',
			'featured'     => '',
			'excerpt'      => 'The northern gateway to Dhaka — airport traffic, new wealth, and 140,000+ daily impressions.',
			'content'      => '<p>Every airport arrival entering the city by road passes this crossing. The placement reaches international travellers, NRB investors, and the fast-growing affluent households of Dhaka North, with extended evening dwell from the sector\'s retail and dining cluster.</p>',
			'meta'         => array(
				'_bl_impressions'  => '140,000+',
				'_bl_demographic'  => 'Travellers & Affluent Households',
				'_bl_dimensions'   => "28' x 14'",
				'_bl_resolution'   => 'P5 Outdoor',
				'_bl_brightness'   => '5,500 nits',
				'_bl_peak_hours'   => '09:00–12:00 / 18:00–22:00',
				'_bl_dwell_time'   => '70+ seconds',
				'_bl_hours'        => '18h Daily',
				'_bl_traffic_note' => 'Airport Gateway Corridor',
				'_bl_lat'          => '23.8610',
				'_bl_lng'          => '90.4004',
			),
		),
		array(
			'title'        => 'Motijheel Shapla Chattar',
			'neighborhood' => 'Motijheel',
			'featured'     => '',
			'excerpt'      => 'The financial heart of Bangladesh — central bank, stock exchange, and 160,000+ daily impressions.',
			'content'      => '<p>Shapla Chattar is the symbolic and literal centre of Bangladeshi finance. This screen addresses the country\'s densest concentration of institutional decision-makers — central bankers, brokerage houses, and corporate treasury teams — during the longest commute dwell windows in the city.</p>',
			'meta'         => array(
				'_bl_impressions'  => '160,000+',
				'_bl_demographic'  => 'Finance & Institutional Leaders',
				'_bl_dimensions'   => "26' x 13'",
				'_bl_resolution'   => 'P4 Outdoor',
				'_bl_brightness'   => '5,000 nits',
				'_bl_peak_hours'   => '08:00–10:30 / 17:30–20:00',
				'_bl_dwell_time'   => '85+ seconds',
				'_bl_hours'        => '18h Daily',
				'_bl_traffic_note' => 'CBD Roundabout',
				'_bl_lat'          => '23.7330',
				'_bl_lng'          => '90.4172',
			),
		),
	);

	foreach ( $locations as $loc ) {
		$post_id = wp_insert_post( array(
			'post_type'    => 'location',
			'post_status'  => 'publish',
			'post_title'   => $loc['title'],
			'post_excerpt' => $loc['excerpt'],
			'post_content' => $loc['content'],
		) );

		if ( ! $post_id || is_wp_error( $post_id ) ) {
			continue;
		}

		if ( $dhaka_id ) {
			wp_set_object_terms( $post_id, array( $dhaka_id ), 'city' );
		}
		if ( isset( $hoods[ $loc['neighborhood'] ] ) ) {
			wp_set_object_terms( $post_id, array( $hoods[ $loc['neighborhood'] ] ), 'neighborhood' );
		}
		update_post_meta( $post_id, '_bl_featured', $loc['featured'] );
		foreach ( $loc['meta'] as $key => $value ) {
			update_post_meta( $post_id, $key, $value );
		}
	}

	$campaigns = array(
		array(
			'title'   => 'National Bank — Quarter-End Deposit Drive',
			'client'  => 'Premier National Bank',
			'sector'  => 'Banking',
			'content' => '<p>A four-week share-of-voice takeover across the Gulshan and Motijheel screens, synchronised with branch-level promotions. Creative rotated by daypart to match commuter mindset — savings messaging in the morning, wealth management in the evening peak.</p>',
		),
		array(
			'title'   => 'Telecom 5G Launch — City-Wide Domination',
			'client'  => 'National Telecom Operator',
			'sector'  => 'Telecom',
			'content' => '<p>Simultaneous launch creative across the full network at 20:00 on launch night, followed by a two-week sustained flight. The campaign delivered total visibility across every major commuter corridor in Dhaka within a single evening.</p>',
		),
		array(
			'title'   => 'Luxury Watchmaker — Flagship Opening',
			'client'  => 'Swiss Luxury Maison',
			'sector'  => 'Luxury',
			'content' => '<p>A precision placement on the Police Plaza screen only — monochrome cinematic creative engineered for the exact audience that buys at this level. Proof that one perfect screen outperforms ten average ones.</p>',
		),
	);

	foreach ( $campaigns as $camp ) {
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

	update_option( 'bangla_led_seeded', 1 );
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bangla_led_seed_demo_content' );

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

<?php
/**
 * Lead-gated, print-ready national proposal — rendered live from the
 * location network. Visitors unlock it by submitting the download form
 * (name, designation, company, phone, email); their details are captured
 * as a lead. Once unlocked, the page is print-to-PDF ready.
 *
 * @package Bangla_LED
 */

$unlocked = ( isset( $_GET['unlocked'] ) && '1' === $_GET['unlocked'] )
	|| ( isset( $_COOKIE['bl_proposal_unlocked'] ) && '1' === $_COOKIE['bl_proposal_unlocked'] );

get_header();

if ( ! $unlocked ) :
	?>
	<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
			<div>
				<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6"><?php esc_html_e( 'Media Kit &amp; Proposal', 'bangla-led' ); ?></span>
				<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-6"><?php esc_html_e( 'Download The Full Proposal', 'bangla-led' ); ?></h1>
				<p class="text-body-lg text-on-surface-variant max-w-md mb-8"><?php esc_html_e( 'The complete Bangla LED national proposal — 59 placements across 10 cities, with real photos, verified traffic, audience data, specifications, and indicative rates. Tell us who you are and it unlocks instantly, print-ready.', 'bangla-led' ); ?></p>
				<ul class="flex flex-col gap-3 list-none p-0 m-0 text-mono-label uppercase tracking-widest text-on-surface-variant max-w-md">
					<li class="flex items-center gap-3"><span class="text-primary" aria-hidden="true">&#10003;</span> <?php esc_html_e( 'Every screen, photographed &amp; specified', 'bangla-led' ); ?></li>
					<li class="flex items-center gap-3"><span class="text-primary" aria-hidden="true">&#10003;</span> <?php esc_html_e( 'Audience intelligence per placement', 'bangla-led' ); ?></li>
					<li class="flex items-center gap-3"><span class="text-primary" aria-hidden="true">&#10003;</span> <?php esc_html_e( 'Print to PDF in one click', 'bangla-led' ); ?></li>
				</ul>
			</div>
			<div class="glass-panel p-8 md:p-12">
				<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" class="flex flex-col gap-6">
					<input type="hidden" name="action" value="bangla_led_lead" />
					<input type="hidden" name="bl_intent" value="proposal" />
					<input type="hidden" name="bl_proposal_url" value="<?php echo esc_url( get_permalink() ); ?>" />
					<?php wp_nonce_field( 'bangla_led_lead', 'bangla_led_lead_nonce' ); ?>
					<div class="absolute -left-[9999px]" aria-hidden="true"><input type="text" name="bl_company_website" tabindex="-1" autocomplete="off" /></div>

					<div class="flex flex-col gap-2">
						<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="p_name"><?php esc_html_e( 'Full Name', 'bangla-led' ); ?></label>
						<input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="p_name" name="bl_name" type="text" required />
					</div>
					<div class="flex flex-col gap-2">
						<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="p_desig"><?php esc_html_e( 'Professional Designation', 'bangla-led' ); ?></label>
						<input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="p_desig" name="bl_designation" type="text" placeholder="<?php esc_attr_e( 'e.g. Head of Marketing', 'bangla-led' ); ?>" required />
					</div>
					<div class="flex flex-col gap-2">
						<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="p_company"><?php esc_html_e( 'Company', 'bangla-led' ); ?></label>
						<input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="p_company" name="bl_company" type="text" required />
					</div>
					<div class="flex flex-col gap-2">
						<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="p_phone"><?php esc_html_e( 'Phone Number', 'bangla-led' ); ?></label>
						<input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="p_phone" name="bl_phone" type="tel" required />
					</div>
					<div class="flex flex-col gap-2">
						<label class="text-mono-label uppercase text-on-surface-variant tracking-widest" for="p_email"><?php esc_html_e( 'Work Email', 'bangla-led' ); ?></label>
						<input class="input-glass w-full py-3 px-0 text-body-md text-primary" id="p_email" name="bl_email" type="email" required />
					</div>
					<button class="mt-2 glass-button w-full py-4 text-label-caps uppercase text-primary tracking-widest" type="submit"><?php esc_html_e( 'Unlock The Proposal', 'bangla-led' ); ?> &rarr;</button>
				</form>
			</div>
		</div>
	</section>
	<?php
	get_footer();
	return;
endif;

/* ---- Unlocked: render the live proposal ---- */
$locations = get_posts( array( 'post_type' => 'location', 'posts_per_page' => 70, 'orderby' => 'title', 'order' => 'ASC' ) );
$by_city   = array();
foreach ( $locations as $loc ) {
	$terms = wp_get_post_terms( $loc->ID, 'city', array( 'fields' => 'names' ) );
	$city  = $terms ? $terms[0] : 'Bangladesh';
	$by_city[ $city ][] = $loc;
}
$city_order = array( 'Dhaka', 'Chattogram', "Cox's Bazar", 'Cumilla', 'Rajshahi', 'Sylhet', 'Rangpur', 'Bogura', 'Narayanganj', 'Feni' );
foreach ( array_keys( $by_city ) as $c ) {
	if ( ! in_array( $c, $city_order, true ) ) {
		$city_order[] = $c;
	}
}
?>
<style>
	@media print {
		nav.glass-nav, #bl-mobile-menu, footer, .footer-band, #bl-sticky-cta, #bl-popup, .no-print { display:none !important; }
		body, html { background:#000 !important; -webkit-print-color-adjust:exact; print-color-adjust:exact; }
		.prop-loc { break-inside:avoid; page-break-inside:avoid; }
		@page { size:A4; margin:12mm; }
	}
	.prop-loc .ph { aspect-ratio:16/9; }
</style>

<section class="pt-32 pb-12 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
	<div class="flex items-center justify-between gap-6 mb-10 no-print">
		<span class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest"><?php esc_html_e( 'Proposal Unlocked', 'bangla-led' ); ?></span>
		<button onclick="window.print()" class="glass-button px-6 py-3 text-label-caps uppercase tracking-widest"><?php esc_html_e( 'Print / Save PDF', 'bangla-led' ); ?></button>
	</div>
	<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-4"><?php esc_html_e( 'National LED Billboard Proposal', 'bangla-led' ); ?></h1>
	<p class="text-body-lg text-on-surface-variant max-w-2xl border-l border-white/20 pl-6 mb-2"><?php printf( esc_html__( '%1$d placements across %2$d cities. Every screen links to its live page with verified data.', 'bangla-led' ), count( $locations ), count( array_filter( $by_city ) ) ); ?></p>
	<p class="text-mono-label uppercase tracking-widest text-on-surface-variant">&#9742; <?php echo esc_html( BANGLA_LED_PHONE ); ?> &middot; <?php echo esc_url( home_url( '/locations/' ) ); ?></p>
</section>

<?php foreach ( $city_order as $city ) :
	if ( empty( $by_city[ $city ] ) ) { continue; }
	?>
	<section class="pb-12 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
		<h2 class="text-headline-xl font-black text-primary uppercase tracking-tight mb-8 border-t border-white/10 pt-8"><?php echo esc_html( $city ); ?> &mdash; <?php echo count( $by_city[ $city ] ); ?> <?php esc_html_e( 'Placements', 'bangla-led' ); ?></h2>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
			<?php foreach ( $by_city[ $city ] as $loc ) :
				$id = $loc->ID;
				$rows = array(
					__( 'Facing', 'bangla-led' )       => get_post_meta( $id, '_bl_facing', true ),
					__( 'Screen Size', 'bangla-led' )   => get_post_meta( $id, '_bl_dimensions', true ),
					__( 'Resolution', 'bangla-led' )    => get_post_meta( $id, '_bl_resolution', true ),
					__( 'Daily Impressions', 'bangla-led' ) => get_post_meta( $id, '_bl_impressions', true ),
					__( 'Monthly Traffic', 'bangla-led' )   => get_post_meta( $id, '_bl_total_traffic', true ),
					__( 'Gender', 'bangla-led' )        => get_post_meta( $id, '_bl_gender_split', true ),
					__( 'Age', 'bangla-led' )           => get_post_meta( $id, '_bl_age_groups', true ),
					__( 'Professions', 'bangla-led' )   => get_post_meta( $id, '_bl_professions', true ),
					__( 'Dwell', 'bangla-led' )         => get_post_meta( $id, '_bl_dwell_time', true ),
				);
				?>
				<article class="prop-loc border border-white/10 flex flex-col">
					<div class="ph w-full overflow-hidden bg-surface-container border-b border-white/10">
						<img src="<?php echo esc_url( bangla_led_location_photo( $id, 'bangla-led-wide' ) ); ?>" alt="<?php echo esc_attr( $loc->post_title ); ?>" class="w-full h-full object-cover" />
					</div>
					<div class="p-6 flex flex-col gap-3">
						<h3 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0"><?php echo esc_html( $loc->post_title ); ?></h3>
						<a href="<?php echo esc_url( get_permalink( $id ) ); ?>" class="text-mono-label text-primary tracking-widest no-underline break-all">&#9656; <?php echo esc_url( get_permalink( $id ) ); ?></a>
						<div class="flex flex-col">
							<?php foreach ( $rows as $label => $val ) :
								if ( ! $val ) { continue; }
								?>
								<div class="flex justify-between gap-4 py-2 border-b border-white/10 text-xs">
									<span class="text-on-surface-variant uppercase tracking-widest"><?php echo esc_html( $label ); ?></span>
									<span class="text-primary font-semibold text-right"><?php echo esc_html( $val ); ?></span>
								</div>
							<?php endforeach; ?>
						</div>
						<a href="tel:<?php echo esc_attr( BANGLA_LED_PHONE_TEL ); ?>" class="no-print mt-2 text-center py-3 glass-button text-label-caps uppercase tracking-widest no-underline">&#9742; <?php esc_html_e( 'Book This Screen', 'bangla-led' ); ?></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</section>
<?php endforeach; ?>

<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10 text-center">
	<h2 class="text-display-lg-mobile font-black text-primary uppercase mb-4"><?php esc_html_e( 'Reserve Your Placements', 'bangla-led' ); ?></h2>
	<div class="text-headline-xl font-black text-primary mb-6">&#9742; <?php echo esc_html( BANGLA_LED_PHONE ); ?></div>
	<?php bangla_led_call_button( array( 'label' => __( 'Call To Book', 'bangla-led' ) ) ); ?>
</section>

<?php get_footer(); ?>

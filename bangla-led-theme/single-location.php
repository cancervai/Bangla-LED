<?php
/**
 * Single Location — the programmatic SEO placement page.
 *
 * One indexable, data-rich page per billboard: hero, context map,
 * audience intelligence, tech specs, and a placement-specific
 * media kit request form.
 *
 * @package Bangla_LED
 */

get_header();

while ( have_posts() ) :
	the_post();

	$location_id = get_the_ID();
	$impressions = bangla_led_meta( $location_id, '_bl_impressions', '100,000+' );
	$demographic = bangla_led_meta( $location_id, '_bl_demographic', 'Affluent Urban Audience' );
	$dimensions  = bangla_led_meta( $location_id, '_bl_dimensions', "30' x 15'" );
	$resolution  = bangla_led_meta( $location_id, '_bl_resolution', 'P4 Outdoor' );
	$brightness  = bangla_led_meta( $location_id, '_bl_brightness', '5,500 nits' );
	$peak_hours  = bangla_led_meta( $location_id, '_bl_peak_hours', '08:00–11:00 / 17:00–21:00' );
	$dwell_time  = bangla_led_meta( $location_id, '_bl_dwell_time', '60+ seconds' );
	$op_hours    = bangla_led_meta( $location_id, '_bl_hours', '18h Daily' );
	$traffic     = bangla_led_meta( $location_id, '_bl_traffic_note', 'High Traffic Intersection' );
	$map_embed   = bangla_led_meta( $location_id, '_bl_map_embed' );

	$hoods     = get_the_terms( $location_id, 'neighborhood' );
	$hood_name = ( $hoods && ! is_wp_error( $hoods ) ) ? $hoods[0]->name : '';
	$cities    = get_the_terms( $location_id, 'city' );
	$city_name = ( $cities && ! is_wp_error( $cities ) ) ? $cities[0]->name : 'Dhaka';
	$area_name = $hood_name ? $hood_name : $city_name;

	$hero_image = has_post_thumbnail() ? get_the_post_thumbnail_url( $location_id, 'full' ) : BANGLA_LED_DEFAULT_HERO;
	?>

	<!-- Hero -->
	<section class="relative min-h-screen flex items-center pt-20">
		<div class="absolute inset-0 z-0">
			<div class="absolute inset-0 bg-gradient-to-t from-background via-background/80 to-background/30 z-10"></div>
			<img
				src="<?php echo esc_url( $hero_image ); ?>"
				alt="<?php echo esc_attr( sprintf( /* translators: %s: location title. */ __( 'Digital billboard at %s', 'bangla-led' ), get_the_title() ) ); ?>"
				class="w-full h-full object-cover object-center grayscale opacity-60"
				fetchpriority="high"
			/>
		</div>

		<div class="container mx-auto px-margin-mobile md:px-margin-desktop max-w-container-max relative z-20 flex flex-col items-start w-full">
			<div class="max-w-4xl">
				<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
					<?php
					printf(
						/* translators: %s: city name. */
						esc_html__( 'Premium DOOH Network in %s', 'bangla-led' ),
						esc_html( $city_name )
					);
					?>
				</span>
				<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
					<?php
					printf(
						/* translators: %s: location title. */
						esc_html__( 'Digital Billboard Advertising at %s', 'bangla-led' ),
						esc_html( get_the_title() )
					);
					?>
				</h1>
				<p class="text-body-lg text-on-surface-variant max-w-2xl mb-12 border-l border-white/20 pl-6">
					<?php
					printf(
						/* translators: 1: demographic, 2: impressions, 3: area name. */
						esc_html__( 'Command the attention of %1$s with %2$s daily views in the heart of %3$s.', 'bangla-led' ),
						esc_html( $demographic ),
						esc_html( $impressions ),
						esc_html( $area_name )
					);
					?>
				</p>
				<a class="inline-flex items-center justify-center glass-button px-8 py-4 text-label-caps uppercase text-primary tracking-widest gap-2 group no-underline" href="#booking">
					<?php esc_html_e( 'Check Availability &amp; Pricing', 'bangla-led' ); ?>
					<span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
				</a>
			</div>
		</div>
	</section>

	<!-- Location context + map -->
	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
		<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter items-center">
			<div class="md:col-span-5 flex flex-col gap-8">
				<h2 class="text-headline-xl font-bold text-primary uppercase tracking-tight">
					<?php
					printf(
						/* translators: %s: neighborhood or city name. */
						esc_html__( 'Dominate %s', 'bangla-led' ),
						esc_html( $area_name )
					);
					?>
				</h2>

				<div class="entry-content text-body-md text-on-surface-variant">
					<?php
					if ( get_the_content() ) {
						the_content();
					} else {
						printf(
							'<p>%s</p>',
							esc_html( sprintf(
								/* translators: 1: area, 2: demographic. */
								__( 'Strategically positioned in %1$s, this screen captures %2$s with an unobstructed sightline that guarantees maximum impact during peak commute hours.', 'bangla-led' ),
								$area_name,
								strtolower( $demographic )
							) )
						);
					}
					?>
				</div>

				<div class="flex flex-wrap gap-4 mt-4">
					<span class="chip px-3 py-2 text-mono-label uppercase text-primary tracking-widest"><?php echo esc_html( $impressions ); ?> <?php esc_html_e( 'Daily Views', 'bangla-led' ); ?></span>
					<span class="chip px-3 py-2 text-mono-label uppercase text-primary tracking-widest"><?php echo esc_html( $traffic ); ?></span>
				</div>
			</div>

			<div class="md:col-span-7 relative h-[420px] md:h-[600px] bg-surface-variant w-full overflow-hidden grayscale contrast-125 border border-white/10">
				<?php if ( $map_embed ) : ?>
					<iframe
						src="<?php echo esc_url( $map_embed ); ?>"
						class="absolute inset-0 w-full h-full opacity-60"
						style="border:0; filter: grayscale(1) invert(0.9) contrast(1.1);"
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						title="<?php echo esc_attr( sprintf( /* translators: %s: location title. */ __( 'Map of %s', 'bangla-led' ), get_the_title() ) ); ?>"
					></iframe>
				<?php else : ?>
					<img
						src="<?php echo esc_url( BANGLA_LED_DEFAULT_MAP ); ?>"
						alt="<?php echo esc_attr( sprintf( /* translators: %s: area name. */ __( 'Stylized map of %s', 'bangla-led' ), $area_name ) ); ?>"
						class="absolute inset-0 w-full h-full object-cover opacity-50"
						loading="lazy"
					/>
					<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4 h-4 bg-primary rounded-full map-pin" aria-hidden="true"></div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Audience intelligence + tech specs -->
	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter md:gap-section-gap">
			<div class="flex flex-col gap-12 border-l border-white/10 pl-8 md:pl-gutter">
				<h3 class="text-headline-lg font-bold text-primary uppercase"><?php esc_html_e( 'Audience Intelligence', 'bangla-led' ); ?></h3>
				<div class="grid grid-cols-1 gap-8">
					<div class="border-b border-white/10 pb-6">
						<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'Daily Impressions', 'bangla-led' ); ?></div>
						<div class="text-headline-xl font-bold text-primary tracking-tight"><?php echo esc_html( $impressions ); ?></div>
					</div>
					<div class="border-b border-white/10 pb-6">
						<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'Core Demographic', 'bangla-led' ); ?></div>
						<div class="text-headline-xl font-bold text-primary tracking-tight"><?php echo esc_html( $demographic ); ?></div>
					</div>
					<div class="border-b border-white/10 pb-6">
						<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'Average Dwell Time', 'bangla-led' ); ?></div>
						<div class="text-headline-xl font-bold text-primary tracking-tight"><?php echo esc_html( $dwell_time ); ?></div>
					</div>
					<div class="pb-6">
						<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-2"><?php esc_html_e( 'Peak Hours', 'bangla-led' ); ?></div>
						<div class="text-headline-xl font-bold text-primary tracking-tight"><?php echo esc_html( $peak_hours ); ?></div>
					</div>
				</div>
			</div>

			<div class="glass-panel p-8 md:p-16 flex flex-col justify-between">
				<div>
					<h3 class="text-headline-lg font-bold text-primary uppercase mb-4"><?php esc_html_e( 'Cinema Grade Fidelity', 'bangla-led' ); ?></h3>
					<p class="text-body-md text-on-surface-variant mb-12"><?php esc_html_e( 'Engineered for absolute visual supremacy.', 'bangla-led' ); ?></p>
				</div>
				<ul class="flex flex-col gap-6 list-none p-0 m-0">
					<li class="flex justify-between items-center border-b border-white/10 pb-4">
						<span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Dimensions', 'bangla-led' ); ?></span>
						<span class="text-label-caps uppercase text-primary tracking-widest"><?php echo esc_html( $dimensions ); ?></span>
					</li>
					<li class="flex justify-between items-center border-b border-white/10 pb-4">
						<span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Resolution', 'bangla-led' ); ?></span>
						<span class="text-label-caps uppercase text-primary tracking-widest"><?php echo esc_html( $resolution ); ?></span>
					</li>
					<li class="flex justify-between items-center border-b border-white/10 pb-4">
						<span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Brightness', 'bangla-led' ); ?></span>
						<span class="text-label-caps uppercase text-primary tracking-widest"><?php echo esc_html( $brightness ); ?></span>
					</li>
					<li class="flex justify-between items-center border-b border-white/10 pb-4">
						<span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Format', 'bangla-led' ); ?></span>
						<span class="text-label-caps uppercase text-primary tracking-widest">MP4 / HTML5</span>
					</li>
					<li class="flex justify-between items-center pb-2">
						<span class="text-mono-label uppercase text-on-surface-variant tracking-widest"><?php esc_html_e( 'Operating Hours', 'bangla-led' ); ?></span>
						<span class="text-label-caps uppercase text-primary tracking-widest"><?php echo esc_html( $op_hours ); ?></span>
					</li>
				</ul>
			</div>
		</div>
	</section>

	<!-- Lead capture -->
	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative border-t border-white/10" id="booking">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
			<div>
				<h2 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-6"><?php esc_html_e( 'Secure This Placement', 'bangla-led' ); ?></h2>
				<p class="text-body-lg text-on-surface-variant max-w-md">
					<?php esc_html_e( 'Availability is strictly limited. Submit your details to request the media kit and current pricing structure for this location.', 'bangla-led' ); ?>
				</p>
			</div>
			<?php
			get_template_part( 'template-parts/lead-form', null, array(
				'location'    => get_the_title(),
				'button_text' => __( 'Request Media Kit for this Location', 'bangla-led' ),
			) );
			?>
		</div>
	</section>

	<!-- Related placements — internal links that reinforce the city silo -->
	<?php
	$related_args = array(
		'post_type'      => 'location',
		'posts_per_page' => 3,
		'post__not_in'   => array( $location_id ),
		'no_found_rows'  => true,
	);
	if ( $cities && ! is_wp_error( $cities ) ) {
		$related_args['tax_query'] = array(
			array(
				'taxonomy' => 'city',
				'field'    => 'term_id',
				'terms'    => $cities[0]->term_id,
			),
		);
	}
	$related = new WP_Query( $related_args );
	if ( $related->have_posts() ) :
		?>
		<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
			<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
				<h2 class="text-headline-xl font-black text-primary uppercase tracking-tight">
					<?php
					printf(
						/* translators: %s: city name. */
						esc_html__( 'More Placements in %s', 'bangla-led' ),
						esc_html( $city_name )
					);
					?>
				</h2>
				<a class="glass-button self-start md:self-end px-8 py-4 text-label-caps uppercase text-primary tracking-widest no-underline" href="<?php echo esc_url( get_post_type_archive_link( 'location' ) ); ?>">
					<?php esc_html_e( 'View All Locations', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
				</a>
			</div>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
				<?php
				while ( $related->have_posts() ) :
					$related->the_post();
					get_template_part( 'template-parts/location-card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section>
	<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>

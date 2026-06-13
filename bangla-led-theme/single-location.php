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

	$total_traffic = bangla_led_meta( $location_id, '_bl_total_traffic', '3M+' );
	$gender_split  = bangla_led_meta( $location_id, '_bl_gender_split', '64% Male / 36% Female' );
	$age_groups    = bangla_led_meta( $location_id, '_bl_age_groups', '25–44 core (58%)' );
	$professions   = bangla_led_meta( $location_id, '_bl_professions', 'Executives, Entrepreneurs, Professionals' );
	$exposure      = bangla_led_meta( $location_id, '_bl_exposure', '6–9 full plays per signal stop' );
	$facing        = bangla_led_meta( $location_id, '_bl_facing', '' );

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
				<div class="flex flex-col sm:flex-row gap-4">
					<?php bangla_led_call_button( array( 'label' => __( 'Call Now', 'bangla-led' ) ) ); ?>
					<a class="inline-flex items-center justify-center px-8 py-4 text-label-caps uppercase text-primary tracking-widest gap-2 group no-underline border border-white/25 hover:border-white/60 transition-colors" href="#booking">
						<?php esc_html_e( 'Check Availability &amp; Pricing', 'bangla-led' ); ?>
						<span class="group-hover:translate-x-1 transition-transform" aria-hidden="true">&rarr;</span>
					</a>
				</div>
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

	<!-- Traffic & audience profile -->
	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
		<div class="max-w-3xl mb-16">
			<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
				<?php esc_html_e( 'Verified Audience Data', 'bangla-led' ); ?>
			</span>
			<h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight mb-6">
				<?php esc_html_e( 'Who Actually Sees This Screen', 'bangla-led' ); ?>
			</h2>
			<p class="text-body-lg text-on-surface-variant">
				<?php esc_html_e( 'We don\'t sell guesses. Every figure below is built from municipal traffic counts, signal-cycle timing, and on-ground audits — the same numbers we stand behind in your post-campaign log reports.', 'bangla-led' ); ?>
			</p>
		</div>

		<div class="grid grid-cols-2 md:grid-cols-3 gap-px bg-white/10 border border-white/10">
			<div class="bg-background p-8 md:p-10">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-3"><?php esc_html_e( 'Daily Traffic', 'bangla-led' ); ?></div>
				<div class="text-headline-xl font-black text-primary tracking-tight"><?php echo esc_html( $impressions ); ?></div>
			</div>
			<div class="bg-background p-8 md:p-10">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-3"><?php esc_html_e( 'Total Monthly Traffic', 'bangla-led' ); ?></div>
				<div class="text-headline-xl font-black text-primary tracking-tight"><?php echo esc_html( $total_traffic ); ?></div>
			</div>
			<div class="bg-background p-8 md:p-10">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-3"><?php esc_html_e( 'Gender Split', 'bangla-led' ); ?></div>
				<div class="text-headline-lg font-bold text-primary tracking-tight"><?php echo esc_html( $gender_split ); ?></div>
			</div>
			<div class="bg-background p-8 md:p-10">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-3"><?php esc_html_e( 'Age Profile', 'bangla-led' ); ?></div>
				<div class="text-headline-lg font-bold text-primary tracking-tight"><?php echo esc_html( $age_groups ); ?></div>
			</div>
			<div class="bg-background p-8 md:p-10">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-3"><?php esc_html_e( 'Dominant Professions', 'bangla-led' ); ?></div>
				<div class="text-headline-lg font-bold text-primary tracking-tight"><?php echo esc_html( $professions ); ?></div>
			</div>
			<div class="bg-background p-8 md:p-10">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-3"><?php esc_html_e( 'Average Dwell', 'bangla-led' ); ?></div>
				<div class="text-headline-lg font-bold text-primary tracking-tight"><?php echo esc_html( $dwell_time ); ?></div>
			</div>
		</div>

		<!-- Exposure estimation -->
		<div class="glass-panel mt-gutter p-8 md:p-16 grid grid-cols-1 md:grid-cols-12 gap-gutter items-center">
			<div class="md:col-span-5">
				<div class="text-mono-label uppercase text-on-surface-variant tracking-widest mb-3"><?php esc_html_e( 'Exposure Estimation', 'bangla-led' ); ?></div>
				<div class="text-display-lg-mobile font-black text-primary uppercase tracking-tight leading-none"><?php echo esc_html( $exposure ); ?></div>
			</div>
			<div class="md:col-span-7 text-body-md text-on-surface-variant">
				<p class="m-0">
					<?php
					printf(
						/* translators: 1: peak hours, 2: dwell time. */
						esc_html__( 'Here\'s the math that matters: during peak windows (%1$s), the signal cycle holds vehicles in the screen\'s sightline for %2$s. A 10-second creative completes multiple full plays per stop — not a glance, a viewing. Multiply that by every signal cycle, every day of your flight, and you get frequency that digital ads can\'t buy and static billboards can\'t prove.', 'bangla-led' ),
						esc_html( $peak_hours ),
						esc_html( $dwell_time )
					);
					?>
				</p>
			</div>
		</div>
	</section>

	<!-- Why this location -->
	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter md:gap-section-gap">
			<div class="flex flex-col gap-10">
				<h2 class="text-headline-xl font-black text-primary uppercase tracking-tight">
					<?php
					printf(
						/* translators: %s: area name. */
						esc_html__( 'Why %s Works', 'bangla-led' ),
						esc_html( $area_name )
					);
					?>
				</h2>
				<ul class="flex flex-col gap-6 list-none p-0 m-0">
					<?php if ( $facing ) : ?>
					<li class="border-l border-white/20 pl-6">
						<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'Unobstructed Sightline', 'bangla-led' ); ?></div>
						<p class="text-body-md text-on-surface-variant m-0">
							<?php
							printf(
								/* translators: %s: facing description. */
								esc_html__( 'The screen faces %s — traffic sees it long before the stop line, and nothing stands in the way.', 'bangla-led' ),
								esc_html( $facing )
							);
							?>
						</p>
					</li>
					<?php endif; ?>
					<li class="border-l border-white/20 pl-6">
						<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'Captive Dwell, By Design', 'bangla-led' ); ?></div>
						<p class="text-body-md text-on-surface-variant m-0"><?php echo esc_html( $traffic ); ?> — <?php esc_html_e( 'the signal does the work. Your audience is stationary, facing forward, with nothing else to look at.', 'bangla-led' ); ?></p>
					</li>
					<li class="border-l border-white/20 pl-6">
						<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'The Right Wallets', 'bangla-led' ); ?></div>
						<p class="text-body-md text-on-surface-variant m-0">
							<?php
							printf(
								/* translators: 1: professions, 2: area. */
								esc_html__( '%1$s dominate this corridor. If your brand needs %2$s\'s decision-makers, this is where they physically are — twice a day, every working day.', 'bangla-led' ),
								esc_html( $professions ),
								esc_html( $area_name )
							);
							?>
						</p>
					</li>
					<li class="border-l border-white/20 pl-6">
						<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'Cinema-Grade Output', 'bangla-led' ); ?></div>
						<p class="text-body-md text-on-surface-variant m-0">
							<?php
							printf(
								/* translators: 1: resolution, 2: brightness. */
								esc_html__( '%1$s panel at %2$s — your creative stays vivid at high noon and dominant after dark, %3$s.', 'bangla-led' ),
								esc_html( $resolution ),
								esc_html( $brightness ),
								esc_html( $op_hours )
							);
							?>
						</p>
					</li>
				</ul>
			</div>

			<!-- What to expect -->
			<div class="glass-panel p-8 md:p-16 flex flex-col gap-10">
				<h2 class="text-headline-lg font-bold text-primary uppercase tracking-tight m-0"><?php esc_html_e( 'What To Expect', 'bangla-led' ); ?></h2>
				<ol class="flex flex-col gap-8 list-none p-0 m-0">
					<li class="flex gap-6">
						<span class="text-headline-xl font-black text-white/20 leading-none">01</span>
						<div>
							<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'Media Kit Within 24 Hours', 'bangla-led' ); ?></div>
							<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Full specs, audience data, availability calendar, and the current rate structure for this exact placement.', 'bangla-led' ); ?></p>
						</div>
					</li>
					<li class="flex gap-6">
						<span class="text-headline-xl font-black text-white/20 leading-none">02</span>
						<div>
							<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'Dates Held, Creative Checked', 'bangla-led' ); ?></div>
							<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'We hold your flight dates while our team QCs your MP4/HTML5 creative against the panel\'s exact pixel map — free.', 'bangla-led' ); ?></p>
						</div>
					</li>
					<li class="flex gap-6">
						<span class="text-headline-xl font-black text-white/20 leading-none">03</span>
						<div>
							<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'Live On Schedule', 'bangla-led' ); ?></div>
							<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Your campaign starts on the agreed date, at the agreed loop frequency. No bumping, no quiet downgrades.', 'bangla-led' ); ?></p>
						</div>
					</li>
					<li class="flex gap-6">
						<span class="text-headline-xl font-black text-white/20 leading-none">04</span>
						<div>
							<div class="text-label-caps uppercase text-primary tracking-widest mb-2"><?php esc_html_e( 'Proof, Not Promises', 'bangla-led' ); ?></div>
							<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Daily play-out log summaries and periodic photo/video verification, delivered to your inbox for the life of the flight.', 'bangla-led' ); ?></p>
						</div>
					</li>
				</ol>
				<a class="glass-button px-8 py-4 text-label-caps uppercase tracking-widest text-center no-underline" href="#booking">
					<?php esc_html_e( 'Get Pricing For This Location', 'bangla-led' ); ?>
				</a>
			</div>
		</div>
	</section>

	<!-- Why pick us -->
	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
		<div class="max-w-3xl mb-16">
			<h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight mb-6">
				<?php esc_html_e( 'Why Bangla LED', 'bangla-led' ); ?>
			</h2>
			<p class="text-body-lg text-on-surface-variant">
				<?php esc_html_e( 'Plenty of operators can rent you a screen. We operate a network built on one uncomfortable promise: every claim we make is one you can verify.', 'bangla-led' ); ?>
			</p>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
			<div class="border border-white/10 p-8 flex flex-col gap-4">
				<div class="text-headline-xl font-black text-primary">99.7%</div>
				<div class="text-label-caps uppercase text-primary tracking-widest"><?php esc_html_e( 'Network Uptime', 'bangla-led' ); ?></div>
				<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Redundant power and remote monitoring on every panel. Dark screens don\'t bill — and don\'t happen.', 'bangla-led' ); ?></p>
			</div>
			<div class="border border-white/10 p-8 flex flex-col gap-4">
				<div class="text-headline-xl font-black text-primary"><?php esc_html_e( 'Daily', 'bangla-led' ); ?></div>
				<div class="text-label-caps uppercase text-primary tracking-widest"><?php esc_html_e( 'Play-Out Logs', 'bangla-led' ); ?></div>
				<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Timestamped log summaries prove every play of every loop. You audit us, not the other way around.', 'bangla-led' ); ?></p>
			</div>
			<div class="border border-white/10 p-8 flex flex-col gap-4">
				<div class="text-headline-xl font-black text-primary">6</div>
				<div class="text-label-caps uppercase text-primary tracking-widest"><?php esc_html_e( 'Cities, One Buy', 'bangla-led' ); ?></div>
				<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Dhaka, Chattogram, Cox\'s Bazar, Cumilla, Rajshahi, and Sylhet — one contract, one creative spec, national reach.', 'bangla-led' ); ?></p>
			</div>
			<div class="border border-white/10 p-8 flex flex-col gap-4">
				<div class="text-headline-xl font-black text-primary">24h</div>
				<div class="text-label-caps uppercase text-primary tracking-widest"><?php esc_html_e( 'Response Standard', 'bangla-led' ); ?></div>
				<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Media kit, availability, and pricing in one business day. Your launch window is our deadline.', 'bangla-led' ); ?></p>
			</div>
		</div>
	</section>

	<!-- Lead capture -->
	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto relative border-t border-white/10" id="booking">
		<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
			<div>
				<h2 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-6"><?php esc_html_e( 'Secure This Placement', 'bangla-led' ); ?></h2>
				<p class="text-body-lg text-on-surface-variant max-w-md mb-8">
					<?php esc_html_e( 'Availability is strictly limited and prime flights sell by the quarter. Submit your details and the full rate card, media kit, and availability calendar for this location land in your inbox within one business day.', 'bangla-led' ); ?>
				</p>
				<div class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-3"><?php esc_html_e( 'Prefer to talk now?', 'bangla-led' ); ?></div>
				<?php bangla_led_call_button( array( 'label' => __( 'Call', 'bangla-led' ) ) ); ?>
			</div>
			<?php
			get_template_part( 'template-parts/lead-form', null, array(
				'location'    => get_the_title(),
				'button_text' => __( 'Get Pricing For This Location', 'bangla-led' ),
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

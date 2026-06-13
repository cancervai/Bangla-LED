<?php
/**
 * Single service — money-keyword landing page with click-to-call + lead form.
 *
 * @package Bangla_LED
 */

get_header();

while ( have_posts() ) :
	the_post();
	$service_id = get_the_ID();
	$tagline    = get_post_meta( $service_id, '_bl_service_tagline', true );
	?>

	<article>
		<!-- Hero -->
		<section class="pt-40 pb-16 px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
			<nav class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-10" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bangla-led' ); ?>">
				<a class="text-on-surface-variant hover:text-primary no-underline transition-colors" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'bangla-led' ); ?></a>
				<span class="px-2" aria-hidden="true">/</span>
				<a class="text-on-surface-variant hover:text-primary no-underline transition-colors" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>"><?php esc_html_e( 'Services', 'bangla-led' ); ?></a>
				<span class="px-2" aria-hidden="true">/</span>
				<span class="text-primary"><?php the_title(); ?></span>
			</nav>

			<div class="max-w-4xl">
				<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
					<?php esc_html_e( 'Advertising Service', 'bangla-led' ); ?>
				</span>
				<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8"><?php the_title(); ?></h1>
				<?php if ( $tagline ) : ?>
					<p class="text-body-lg text-on-surface-variant max-w-2xl border-l border-white/20 pl-6 mb-10"><?php echo esc_html( $tagline ); ?></p>
				<?php endif; ?>
				<div class="flex flex-col sm:flex-row gap-4">
					<?php bangla_led_call_button( array( 'label' => __( 'Call Now', 'bangla-led' ) ) ); ?>
					<a class="inline-flex items-center justify-center px-8 py-4 text-label-caps uppercase text-on-surface-variant hover:text-primary tracking-widest transition-colors no-underline" href="#booking">
						<?php esc_html_e( 'Request Rates &amp; Availability', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
					</a>
				</div>
			</div>
		</section>

		<!-- Body -->
		<section class="pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10 pt-16">
			<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
				<div class="lg:col-span-2 bl-article text-body-lg text-on-surface-variant max-w-none">
					<?php the_content(); ?>
				</div>

				<!-- Sticky call + enquiry rail -->
				<aside class="lg:col-span-1">
					<div class="lg:sticky lg:top-28 glass-panel p-8 flex flex-col gap-6">
						<div class="text-mono-label uppercase tracking-widest text-on-surface-variant"><?php esc_html_e( 'Get Started', 'bangla-led' ); ?></div>
						<p class="text-body-md text-on-surface-variant m-0"><?php esc_html_e( 'Call our media team for instant rates, availability, and creative guidance — or request the media kit and we will respond within one business day.', 'bangla-led' ); ?></p>
						<?php bangla_led_call_button( array( 'label' => __( 'Call', 'bangla-led' ), 'classes' => 'glass-button w-full py-4 text-label-caps uppercase tracking-widest' ) ); ?>
						<a class="inline-flex items-center justify-center gap-2 w-full py-4 text-label-caps uppercase text-primary tracking-widest border border-white/20 hover:border-white/50 transition-colors no-underline" href="#booking">
							<?php esc_html_e( 'Request Media Kit', 'bangla-led' ); ?>
						</a>
					</div>
				</aside>
			</div>
		</section>

		<!-- Other services -->
		<?php
		$siblings = new WP_Query( array(
			'post_type'      => 'service',
			'posts_per_page' => 3,
			'post__not_in'   => array( $service_id ),
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'no_found_rows'  => true,
		) );
		if ( $siblings->have_posts() ) :
			?>
			<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
				<h2 class="text-headline-xl font-black text-primary uppercase tracking-tight mb-12"><?php esc_html_e( 'Other Advertising Services', 'bangla-led' ); ?></h2>
				<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
					<?php
					while ( $siblings->have_posts() ) :
						$siblings->the_post();
						$icon = get_post_meta( get_the_ID(), '_bl_service_icon', true );
						?>
						<a href="<?php the_permalink(); ?>" class="group glass-panel p-8 flex flex-col gap-4 no-underline hover:border-white/40 transition-colors duration-500">
							<span class="text-3xl text-primary leading-none" aria-hidden="true"><?php echo esc_html( $icon ? $icon : '◧' ); ?></span>
							<h3 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0"><?php the_title(); ?></h3>
							<span class="inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest"><?php esc_html_e( 'Explore', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span></span>
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</section>
		<?php endif; ?>

		<!-- Lead capture -->
		<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="booking">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter items-center">
				<div>
					<h2 class="text-display-lg-mobile font-black text-primary uppercase mb-6"><?php esc_html_e( 'Request Rates &amp; Availability', 'bangla-led' ); ?></h2>
					<p class="text-body-lg text-on-surface-variant max-w-md mb-8"><?php esc_html_e( 'Tell us what you want to run and where. We respond within one business day with rates, availability, and a recommended plan.', 'bangla-led' ); ?></p>
					<div class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-3"><?php esc_html_e( 'Prefer to talk now?', 'bangla-led' ); ?></div>
					<?php bangla_led_call_button( array( 'label' => __( 'Call', 'bangla-led' ) ) ); ?>
				</div>
				<?php
				get_template_part( 'template-parts/lead-form', null, array(
					'location'    => get_the_title(),
					'button_text' => __( 'Get Rates & Availability', 'bangla-led' ),
				) );
				?>
			</div>
		</section>
	</article>

<?php endwhile; ?>

<?php get_footer(); ?>

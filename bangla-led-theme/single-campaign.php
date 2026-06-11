<?php
/**
 * Single Campaign — case study page.
 *
 * @package Bangla_LED
 */

get_header();

while ( have_posts() ) :
	the_post();
	$client = get_post_meta( get_the_ID(), '_bl_client', true );
	$sector = get_post_meta( get_the_ID(), '_bl_sector', true );
	$hero_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : BANGLA_LED_DEFAULT_HERO;
	?>

	<section class="relative min-h-[70vh] flex items-end pt-20 pb-20">
		<div class="absolute inset-0 z-0">
			<div class="absolute inset-0 bg-gradient-to-t from-background via-background/70 to-background/30 z-10"></div>
			<img
				src="<?php echo esc_url( $hero_image ); ?>"
				alt="<?php echo esc_attr( get_the_title() ); ?>"
				class="w-full h-full object-cover object-center grayscale opacity-50"
				fetchpriority="high"
			/>
		</div>
		<div class="container mx-auto px-margin-mobile md:px-margin-desktop max-w-container-max relative z-20">
			<div class="max-w-4xl flex flex-col gap-6">
				<div class="flex flex-wrap gap-3">
					<?php if ( $sector ) : ?>
						<span class="chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest"><?php echo esc_html( $sector ); ?></span>
					<?php endif; ?>
					<?php if ( $client ) : ?>
						<span class="chip px-4 py-2 text-mono-label uppercase text-on-surface-variant tracking-widest"><?php echo esc_html( $client ); ?></span>
					<?php endif; ?>
				</div>
				<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase m-0">
					<?php the_title(); ?>
				</h1>
			</div>
		</div>
	</section>

	<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10">
		<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
			<div class="md:col-span-7 entry-content text-body-lg text-on-surface-variant">
				<?php the_content(); ?>
			</div>
			<aside class="md:col-span-4 md:col-start-9">
				<div class="glass-panel p-8 md:p-10 flex flex-col gap-6">
					<h2 class="text-headline-lg font-bold text-primary uppercase tracking-tight m-0"><?php esc_html_e( 'Run Yours', 'bangla-led' ); ?></h2>
					<p class="text-body-md text-on-surface-variant m-0">
						<?php esc_html_e( 'Want this level of presence for your brand? Request the media kit and our placement team will build the flight plan.', 'bangla-led' ); ?>
					</p>
					<a class="glass-button px-8 py-4 text-label-caps uppercase text-primary tracking-widest text-center no-underline" href="<?php echo esc_url( home_url( '/#booking' ) ); ?>">
						<?php esc_html_e( 'Request Media Kit', 'bangla-led' ); ?>
					</a>
				</div>
			</aside>
		</div>
	</section>

<?php endwhile; ?>

<?php get_footer(); ?>

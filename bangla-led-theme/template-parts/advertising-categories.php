<?php
/**
 * Homepage advertising-categories grid — links to every service line.
 *
 * Spokes of the topic cluster: each card points to a money-keyword
 * landing page, building the internal-link web from the front door.
 *
 * @package Bangla_LED
 */

$services = new WP_Query( array(
	'post_type'      => 'service',
	'posts_per_page' => 6,
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'no_found_rows'  => true,
) );

if ( ! $services->have_posts() ) {
	return;
}
?>

<section class="py-section-gap-mobile md:py-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto border-t border-white/10" id="services">
	<div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16">
		<div class="max-w-2xl">
			<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
				<?php esc_html_e( 'What We Do', 'bangla-led' ); ?>
			</span>
			<h2 class="text-headline-xl md:text-display-lg-mobile font-black text-primary uppercase tracking-tight">
				<?php esc_html_e( 'Advertising Categories', 'bangla-led' ); ?>
			</h2>
		</div>
		<p class="text-body-md text-on-surface-variant max-w-md">
			<?php esc_html_e( 'Every way to put your brand in front of Bangladesh — from cinema-grade fixed billboards to mobile LED, metro screens, and turnkey installation.', 'bangla-led' ); ?>
		</p>
	</div>

	<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
		<?php
		while ( $services->have_posts() ) :
			$services->the_post();
			$icon    = get_post_meta( get_the_ID(), '_bl_service_icon', true );
			$tagline = get_post_meta( get_the_ID(), '_bl_service_tagline', true );
			?>
			<a href="<?php the_permalink(); ?>" class="group glass-panel p-8 md:p-10 flex flex-col gap-5 no-underline hover:border-white/40 transition-colors duration-500">
				<span class="text-4xl text-primary leading-none" aria-hidden="true"><?php echo esc_html( $icon ? $icon : '◧' ); ?></span>
				<h3 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0">
					<?php the_title(); ?>
				</h3>
				<p class="text-body-md text-on-surface-variant m-0 flex-1">
					<?php echo esc_html( $tagline ? $tagline : wp_trim_words( get_the_excerpt(), 18 ) ); ?>
				</p>
				<span class="inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest group-hover:gap-3 transition-all">
					<?php esc_html_e( 'Explore', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
				</span>
			</a>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
	</div>

	<div class="mt-12 flex flex-col sm:flex-row gap-4 sm:items-center">
		<a class="glass-button px-8 py-4 text-label-caps uppercase tracking-widest no-underline text-center" href="<?php echo esc_url( get_post_type_archive_link( 'service' ) ); ?>">
			<?php esc_html_e( 'View All Services', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
		</a>
		<?php bangla_led_call_button( array( 'label' => __( 'Or Call', 'bangla-led' ), 'classes' => 'px-8 py-4 text-label-caps uppercase tracking-widest border border-white/20 hover:border-white/50 text-primary transition-colors' ) ); ?>
	</div>
</section>

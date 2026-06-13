<?php
/**
 * Services archive — the advertising-formats hub.
 *
 * @package Bangla_LED
 */

get_header();
?>

<section class="pt-40 pb-section-gap-mobile md:pb-section-gap px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
	<nav class="text-mono-label uppercase tracking-widest text-on-surface-variant mb-10" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bangla-led' ); ?>">
		<a class="text-on-surface-variant hover:text-primary no-underline transition-colors" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home', 'bangla-led' ); ?></a>
		<span class="px-2" aria-hidden="true">/</span>
		<span class="text-primary"><?php esc_html_e( 'Services', 'bangla-led' ); ?></span>
	</nav>

	<div class="max-w-3xl mb-16">
		<span class="inline-block chip px-4 py-2 text-mono-label uppercase text-primary tracking-widest mb-6">
			<?php esc_html_e( 'Advertising Categories', 'bangla-led' ); ?>
		</span>
		<h1 class="text-display-lg-mobile md:text-display-lg font-black text-primary uppercase mb-8">
			<?php esc_html_e( 'LED & Outdoor Advertising Services', 'bangla-led' ); ?>
		</h1>
		<div class="text-body-lg text-on-surface-variant border-l border-white/20 pl-6">
			<p><?php esc_html_e( 'Every format Bangla LED operates across Bangladesh — fixed digital billboards, portable and caravan LED, metro rail screens, static hoardings, and turnkey LED installation. Pick the medium that fits your goal, or call us and we will plan the mix.', 'bangla-led' ); ?></p>
		</div>
	</div>

	<div class="mb-16">
		<?php bangla_led_call_button( array( 'label' => __( 'Talk To A Media Planner', 'bangla-led' ) ) ); ?>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-gutter">
			<?php
			while ( have_posts() ) :
				the_post();
				$icon    = get_post_meta( get_the_ID(), '_bl_service_icon', true );
				$tagline = get_post_meta( get_the_ID(), '_bl_service_tagline', true );
				?>
				<a href="<?php the_permalink(); ?>" class="group glass-panel p-8 md:p-10 flex flex-col gap-5 no-underline hover:border-white/40 transition-colors duration-500">
					<span class="text-4xl text-primary leading-none" aria-hidden="true"><?php echo esc_html( $icon ? $icon : '◧' ); ?></span>
					<h2 class="text-headline-lg font-bold text-primary uppercase tracking-tight leading-tight m-0"><?php the_title(); ?></h2>
					<p class="text-body-md text-on-surface-variant m-0 flex-1"><?php echo esc_html( $tagline ? $tagline : wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
					<span class="inline-flex items-center gap-2 text-label-caps uppercase text-primary tracking-widest group-hover:gap-3 transition-all">
						<?php esc_html_e( 'Explore', 'bangla-led' ); ?> <span aria-hidden="true">&rarr;</span>
					</span>
				</a>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</section>

<?php get_footer(); ?>
